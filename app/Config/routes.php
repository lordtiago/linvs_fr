<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	//Router::connect('/', array('controller' => 'people', 'action' => 'index', 'home'));
    Router::connect('/', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard', 'admin' => true));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));


//my custom routes	
	Router::connect(
	    '/tithes/:month/:year',
	    array('controller' => 'tithes', 'action' => 'index'),
	    array('pass'=>array('month','year'), 'month' => '0?[1-9]|1[012]','year' => '[12][0-9]{3}')
	);
	
//portuguese routes

Router::connect(
    '/dizimo/:month/:year',
    array('controller' => 'tithes', 'action' => 'index'),
    array('pass'=>array('month','year'), 'month' => '0?[1-9]|1[012]','year' => '[12][0-9]{3}')
);	

Router::connect('/dizimo', array('controller' => 'tithes', 'action' => 'index'));
Router::connect('/dizimo/cadastrar', array('controller' => 'tithes', 'action' => 'add'));
Router::connect('/dizimo/editar', array('controller' => 'tithes', 'action' => 'edit'));
Router::connect('/dizimo/editar/:id', array('controller' => 'tithes', 'action' => 'edit'),array('pass' => array('id'),'id' => '[0-9]+'));
Router::connect('/dizimo/ver', array('controller' => 'tithes', 'action' => 'view'));
Router::connect('/dizimo/ver/:id', array('controller' => 'tithes', 'action' => 'view'),array('pass' => array('id'),'id' => '[0-9]+'));

Router::connect('/pessoa', array('controller' => 'people', 'action' => 'index'));
Router::connect('/pessoa/cadastrar', array('controller' => 'people', 'action' => 'add'));
Router::connect('/pessoa/editar', array('controller' => 'people', 'action' => 'edit'));
Router::connect('/pessoa/editar/:id', array('controller' => 'people', 'action' => 'edit'),array('pass' => array('id'),'id' => '[0-9]+'));
Router::connect('/pessoa/ver', array('controller' => 'people', 'action' => 'view')); 
Router::connect('/pessoa/ver/:id', array('controller' => 'people', 'action' => 'view'),array('pass' => array('id'),'id' => '[0-9]+'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
