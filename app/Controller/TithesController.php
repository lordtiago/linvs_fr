<?php
App::uses('AppController', 'Controller');
/**
 * Tithes Controller
 *
 * @property Tithe $Tithe
 * @property PaginatorComponent $Paginator
 */
class TithesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	

    public $order = array(
                'Person.street DESC',
                'Person.name ASC'
            );
    
    public $fields = array(
                'Person.street as street',
                'Person.number as number',
                'Person.name as name',
                'Person.tel as tel',
                'Person.cel as cel',
                'data'
            );
    
    public $group = array(
                'Person.id'
            );
    
    public $joins = array(
            array('table' => 'tithes',
                'alias' => 'Tithe',
                'type' => 'INNER',
                'conditions' => array(
                    'Person.id = Tithe.person_id',
                )
            )
        );
    
    public $subquery = "SELECT Concat(LPAD(month,2,0),'/',year) as data FROM tithes WHERE person_id = Person.id ORDER BY id DESC Limit 1";
/**
 * index method
 *
 * @return void
 */
	public function index($month = null, $year = null) {
		$this->Tithe->recursive = 0;
		
		if(!isset($month)) $month = date("m");
		if(!isset($year)) $year = date("Y");
		$sum = $this->Tithe->find('first',array(
			'conditions' => array(					
				'Tithe.month =' => $month,
				'Tithe.year =' => $year), //array of conditions
			'recursive' => 0, //int
			//array of field names
			'fields' => array('SUM(Tithe.value) as total'),			
			)
		);

		$this->Paginator->settings = array(
		        	'limit' => 50,
					'order' => array(
							'day' => 'ASC'
					)
				);
		
		$this->set('tithes', $this->Paginator->paginate(
				'Tithe',
		    	array(
					'Tithe.month =' => $month,
					'Tithe.year =' => $year
				),
				array(
					'value',
					'day',
					'month',
					'month_ref',
					'year',
					'Person.name',

				)
			)
		);
		
		$this->set('sum',$sum);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tithe->exists($id)) {
			throw new NotFoundException(__('Invalid tithe'));
		}
		$options = array('conditions' => array('Tithe.' . $this->Tithe->primaryKey => $id));
		$this->set('tithe', $this->Tithe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is('post')) {
			$this->Tithe->create();
			if ($this->Tithe->save($this->request->data)) {
				$this->Session->setFlash(__('The tithe has been saved.'),'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tithe could not be saved. Please, try again.'),'flash_error');
			}
		}
		$people = $this->Tithe->Person->find('list',array('order' => array('Person.name ASC')));
		$this->request->data["Tithe"]["month"] = date("m");
		$this->request->data["Tithe"]["month_ref"] = date("m");
		$this->request->data["Tithe"]["year"] = date("Y");
		$this->set(compact('people'));
		$this->set('person_id', $id);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tithe->exists($id)) {
			throw new NotFoundException(__('Invalid tithe'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tithe->save($this->request->data)) {
				$this->Session->setFlash(__('The tithe has been saved.'),'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tithe could not be saved. Please, try again.'),'flash_error');
			}
		} else {
			$options = array('conditions' => array('Tithe.' . $this->Tithe->primaryKey => $id));
			$this->request->data = $this->Tithe->find('first', $options);
		}
		$people = $this->Tithe->Person->find('list');
		$this->set(compact('people'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tithe->id = $id;
		if (!$this->Tithe->exists()) {
			throw new NotFoundException(__('Invalid tithe'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tithe->delete()) {
			$this->Session->setFlash(__('The tithe has been deleted.'),'flash_success');
		} else {
			$this->Session->setFlash(__('The tithe could not be deleted. Please, try again.'),'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
    
    public function facade_get_people($type = null){
        if($type != null){
            if($type == "all"){
                return $this->get_all_tithing();
            }else if ($type == "active"){
                return $this->get_active_tithing();
            }else if ($type == "inactive_3"){
                return $this->get_inactive_tithing(4);
            }
            else if ($type == "inactive_6"){
                return $this->get_inactive_tithing(7);
            }
        }
    }
    
    public function facade_get_title($type = null){
        if($type != null){
            if($type == "all"){
                return "Relatório de Dizimistas agrupados por Rua";
            }else if ($type == "active"){
                return "Relatório de Dizimistas Ativos (que apresentaram nos últimos 06 meses) agrupados por Rua";
            }else if ($type == "inactive_3"){
                return "Relatório de Dizimistas Inativos que não apresentaram o dízimo nos últimos 3 meses (agrupados por Rua)";
            }else if ($type == "inactive_6"){
                return "Relatório de Dizimistas Inativos que não apresentaram o dízimo nos últimos 6 meses (agrupados por Rua)";
            }
        }
    }    
    
    public function get_all_tithing(){
        $this->Tithe->Person->virtualFields['data'] = $this->subquery;
         $people = $this->Tithe->Person->find('all',array(
                    'fields'=> $this->fields,
                    'order'=> $this->order,
                    'recursive'=>0
            ));
        return $people;
    }

    public function get_active_tithing(){
        $limitDate = $this->get_limit_date();
        $this->Tithe->Person->virtualFields['data'] = $this->subquery;
        
        $options = array(
                'fields'=> $this->fields,
                'conditions'=>array(
                    'CONCAT(Tithe.year,LPAD(Tithe.month,2,0)) >='=>$limitDate
                ),
                'group'=> $this->group, 
                'order'=> $this->order,
                'recursive'=>0
        );
        
        $options['joins'] = $this->joins; 
        $people = $this->Tithe->Person->find('all',$options);
        
        return $people;
    }

    public function get_inactive_tithing($limit = NULL){
        $limitDate =  $this->get_limit_date($limit);
        $this->Tithe->Person->virtualFields['data'] = $this->subquery;
        
        $ids = $this->get_people_id($limitDate);
        
        $options = array(
                'fields'=> $this->fields,
                'conditions'=>array(
                    "Tithe.person_id NOT IN $ids",
                ),
                'group'=> $this->group, 
                'order'=> $this->order,
                'recursive'=>0
        );
        
        $options['joins'] = $this->joins; 
        $people = $this->Tithe->Person->find('all',$options);        
        return $people;
    }
    
    public function get_people_id($limitDate){
                $options = array(
                'fields'=> array(
                    'Person.id as id',
                ),
                'conditions'=>array(
                    'CONCAT(Tithe.year,LPAD(Tithe.month,2,0)) >'=>$limitDate
                ),
                'group'=>$this->group, 
                'order'=> array(
                    'Person.id ASC'
                ),
                'recursive'=>0
        );
        
        $options['joins'] = $this->joins;
        $people = $this->Tithe->Person->find('all',$options);
        $ids = "(0";
        foreach($people as $person){
            $ids .= ",".$person["Person"]["id"];
        }
        return $ids .=")";
    }
    
    public function report_main_panel(){
        $this->layout = 'framework7';
        $report_simplify_year = $this->Tithe->find('list',array(
                'fields'=>array(
                        'Tithe.year'						
                ),
                'group'=>array(
                        'Tithe.year'
                ),
                'recursive'=>0
        ));
		
		$this->set('report_simplify_year', $report_simplify_year);
        $this->render();
    }


    public function report_simplify($month = null, $year = null){
		
		$meses = array(__('January'),__('February'),__('March'),__('April'),__('May'),__('June'),__('July'),__('August'),__('September'),
					__('October'),__('November'),__('December'));				

            $tithes = $this->Tithe->find('all',array(
                    'fields'=>array(
                            'SUM(Tithe.value) as value',
							'Concat(Tithe.year,"-",Tithe.month,"-",Tithe.day) as data',
							'DATE(Tithe.created) as created'						
                    ),
					'conditions'=>array(
						'Tithe.month'=>$month, 
						'Tithe.year'=>$year
					),
                    'group'=>array(
                            'DAY(data)'
                    ),
                    'recursive'=>0
            ));
			$total = $this->Tithe->find('first',array(
                    'fields'=>array(
                            'SUM(Tithe.value) as value',						
                    ),
					'conditions'=>array(
						'Tithe.month'=>$month, 
						'Tithe.year'=>$year
					),
                    'recursive'=>0
            ));
            $this->layout = 'report';	
			$this->set('month',$meses[$month-1]);		
            $this->set('tithes',$tithes);
			$this->set('total',$total[0]['value']);
            $this->render();
    }

    public function report_tithing_street($type = null){			
//SELECT * FROM people WHERE 1 ORDER BY `people`.`street` DESC
            $people = $this->facade_get_people($type);
            $title = $this->facade_get_title($type);
            $this->layout = 'report';		
            $this->set('people',$people);
            $this->set('title',$title);
            $this->render();
    }  

    public function report_yearly($year = null){				

            $tithes = $this->Tithe->find('all',array(
                    'fields'=>array(
                            'SUM(Tithe.value) as value',
							'Tithe.month',					
                    ),
					'conditions'=>array(
						'Tithe.year'=>$year
					),
                    'group'=>array(
                            'Tithe.month'
                    ),
                    'recursive'=>0
            ));
			$total = $this->Tithe->find('first',array(
                    'fields'=>array(
                            'SUM(Tithe.value) as value',						
                    ),
					'conditions'=>array(
						'Tithe.year'=>$year
					),
                    'recursive'=>0
            ));
            $this->layout = 'report';
            $this->set('year',$year);
            $this->set('tithes',$tithes);
			$this->set('total',$total[0]['value']);
            $this->render();
    }
}