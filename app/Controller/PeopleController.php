<?php
App::uses('AppController', 'Controller');
/**
 * People Controller
 *
 * @property Person $Person
 * @property PaginatorComponent $Paginator
 */
class PeopleController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Person->recursive = 0;
		$search_box = $this->Person->find("all",array('order' => array('Person.name ASC')));
		$this->Paginator->settings = array(
		        'limit' => 50,
		        'order' => array(
							'Person.name' => 'asc'
						)
		);
		$this->set('people', $this->Paginator->paginate());
		$this->set('search_box', $search_box);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Person->exists($id)) {
			throw new NotFoundException(__('Invalid person'),'flash_error');
		}
		$options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
		$person = $this->Person->find('first', $options);
		$options2 = array('conditions' => array('Person.' . $this->Person->primaryKey => $person['Person']['father_id']));
		$options3 = array('conditions' => array('Person.' . $this->Person->primaryKey => $person['Person']['father2_id']));
		$options4 = array('conditions' => array('Person.' . $this->Person->primaryKey => $person['Person']['spouse_id']));
		$options_child = array('conditions' => array('Person.father_id' => $person['Person']['id']));
		$options_child2 = array('conditions' => array('Person.father2_id' => $person['Person']['id']));
		$options_child = array_merge($options_child, $options_child2);
		$this->set(compact('person'));
		$this->set('father', $this->Person->find('first', $options2));
		$this->set('father2', $this->Person->find('first', $options3));
		$this->set('spouse', $this->Person->find('first', $options4));
		$this->set('childs', $this->Person->find('all', $options_child));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($modal = null) {
		if($modal){
			$this->layout = 'modal';
			$this->set("dialog",true);
		}else{
			$this->set("dialog",false);
		}

		if ($this->request->is('post')) {
			$this->Person->create();
			//In the future to check, what is the parish that user work
			//$this->request->data["Person"]["parish_id"] = 1;

			//transformando cadastro em maiusculas
			$this->request->data["Person"]["name"] = strtoupper($this->request->data["Person"]["name"]);
			$spouse = $this->request->data["Person"]["spouse_id"];
			$marriage = $this->request->data["Person"]["marriage"];
			if ($this->Person->save($this->request->data)) {
				if($spouse != 0){
					//set in spouse, the same value
					$options = array('conditions' => array('Person.id' => $spouse));
					$spouse = $this->Person->find('first', $options);
					$spouse["Person"]["spouse_id"] = $this->Person->id;
					$spouse["Person"]["marriage"] = $marriage;
					$this->Person->save($spouse);					
				}else{
					$options = array('conditions' => array('Person.spouse_id' => $this->Person->id));
					$spouse = $this->Person->find('first', $options);
					$spouse["Person"]["spouse_id"] = 0;
					$spouse["Person"]["marriage"] = null;
					$this->Person->save($spouse);										
				}				
				if(!$modal){
					$this->Session->setFlash(__('The person has been saved.'),'flash_success');
					return $this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash(__('The person has been saved.'));
				}				
			} else {
				$this->Session->setFlash(__('The person could not be saved. Please, try again.'),'flash_error');
			}
		}
		$parishes = $this->Person->Parish->find('list');
		$fathers = $spouses = $this->Person->find("list",array('order' => array('Person.name ASC')));
		$this->set(compact('fathers'));
		$this->set(compact('spouses'));
		$this->set(compact('parishes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Person->exists($id)) {
			throw new NotFoundException(__('Invalid person'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//In the future to check, what is the parish that user work
			//$this->request->data["Person"]["parish_id"] = 1;
			$this->request->data["Person"]["name"] = strtoupper($this->request->data["Person"]["name"]);
			//$spouse = $this->request->data["Person"]["spouse_id"];
			//$marriage = $this->request->data["Person"]["marriage"];
			
			if ($this->Person->save($this->request->data)) {/*
				if($spouse != 0){
					//set in spouse, the same value
					$options = array('conditions' => array('Person.id' => $spouse));
					$spouse = $this->Person->find('first', $options);
					//var_dump($spouse);exit;
					$spouse["Person"]["spouse_id"] = $this->request->data["Person"]["id"];
					$spouse["Person"]["marriage"] = $marriage;
					$this->Person->save($spouse);					
				}else{
					$options = array('conditions' => array('Person.spouse_id' => $this->request->data["Person"]["id"]));
					$spouse = $this->Person->find('first', $options);
					$spouse["Person"]["spouse_id"] = 0;
					$spouse["Person"]["marriage"] = null;
					$this->Person->save($spouse);										
				}*/
				
				$this->Session->setFlash(__('The person has been saved.'),'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The person could not be saved. Please, try again.'),'flash_error');
			}
		} else {
			$options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
			$this->request->data = $this->Person->find('first', $options);
		}
		$parishes = $this->Person->Parish->find('list');
		$fathers = $spouses = $this->Person->find("list",array('order' => array('Person.name ASC')));
		$this->set(compact('fathers'));
		$this->set(compact('spouses'));
		$this->set(compact('parishes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Person->id = $id;
		if (!$this->Person->exists()) {
			throw new NotFoundException(__('Invalid person'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Person->delete()) {
			$this->Session->setFlash(__('The person has been deleted.'),'flash_success');
		} else {
			$this->Session->setFlash(__('The person could not be deleted. Please, try again.'),'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function toList(){	
		$this->autoRender = false;	
        if($this->request->is('ajax')){
			$this->layout='ajax';			
            $result = $this->Person->find('list',
                    array('fields' => array('Person.name','Person.id'),
                          'order' => array('Person.name ASC')));			
            echo json_encode($result);
        }
	}
	
    public function report_birthday($month = null){
        
        $limitDate = $this->get_limit_date();
		
		$meses = array(__('January'),__('February'),__('March'),__('April'),__('May'),__('June'),__('July'),__('August'),__('September'),
					__('October'),__('November'),__('December'));
        $options = array(
                'fields'=>array(
                        'Person.name as name',
                        'Person.birth as birth',
                ),
                'conditions'=>array(
                    'MONTH(birth)'=>$month,
                    'CONCAT(Tithe.year,Tithe.month) >='=>$limitDate
                ),
                'group'=>array(
                        'Person.id'
                ),            
                'order'=>array(
                    'DAY(Person.birth) ASC',
                ),
                'recursive'=>0
        );
        $options['joins'] = array(
            array('table' => 'tithes',
                'alias' => 'Tithe',
                'type' => 'INNER',
                'conditions' => array(
                    'Person.id = Tithe.person_id',
                )
            )
        );

            $people = $this->Person->find('all', $options);
            $this->layout = 'report';	
			$this->set('month',$meses[$month-1]);		
            $this->set('people',$people);
            $this->render();
    }
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->blackHoleCallback = 'blackhole';
    }

    public function blackhole($type) {
        // handle errors.
        if($type =="auth"){
            $this->Session->setFlash(__('Erro de validação do formulário. Deslogue e faça login novamente.'),'flash_error');
            throw new Exception( 'Erro de validação do formulário. Deslogue e faça login novamente.' );
        }elseif($type =="csrf"){
            $this->Session->setFlash(__('Erro de csrf contate o suporte.'),'flash_error');
            throw new Exception( 'Erro de csrf contate o suporte.' );
        }elseif($type =="get"){
            $this->Session->setFlash(__('Falha de requisição GET, contate o suporte.'),'flash_error');
            throw new Exception( 'Falha de requisição GET, contate o suporte.' );
        }elseif($type =="post"){
            $this->Session->setFlash(__('Falha de restrição POST, o suporte.'),'flash_error');
            throw new Exception( 'Falha de restrição POST, o suporte.' );
        }
    }    
}
