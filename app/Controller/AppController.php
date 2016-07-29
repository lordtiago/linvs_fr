<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	/* *Bootstrap Helpers* */
	public $helpers = array(
	'Html' => array('AppController' => 'BootstrapHtml'),
	'Form' => array('AppController' => 'BootstrapForm'),
	'Paginator' => array('AppController' => 'BootstrapPaginator'),
	'Js',
	'Session',
    'Usermgmt.UserAuth',
    'Usermgmt.Image'        
	);
    
    public $components = array('Session', 'RequestHandler', 'Usermgmt.UserAuth', 'Security' );
    
    function beforeFilter() {
        $this->userAuth();
    }
    
    private	function userAuth() {
        $this->UserAuth->beforeFilter($this);
    }
    
    /**
        Função para obter a data limite que considera um dizimista ativo no sistema
    */
    public function get_limit_date($limit = NULL){
        if(!isset($limit)){
           $limit = 6; 
        }
        $months = array(-5=>7,-4=>8,-3=>9,-2=>10,-1=>11,0=>12,);
        $thisMonth = date("m");
        $thisYear = date("Y");
        $limitMonth = $thisMonth-$limit;
        if($limitMonth <= 0){
            $limitMonth = $months[$limitMonth];
            $thisYear= $thisYear-1;
        }
        if($limitMonth < 10){
            $limitMonth = "0".$limitMonth;
        }
        return $limitDate = $thisYear.$limitMonth;        
    }
}
