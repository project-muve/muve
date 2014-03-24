<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
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

define('PERMISSION_ARTICLES',		bindec('00000000001'));
define('PERMISSION_USEREDIT',		bindec('00000000010'));

class AppController extends Controller {
    public $helpers = array(
        'Wysiwyg.Tinymce' => array(
				'menubar' =>  false,
            'plugins'=>'advlist autolink link image lists charmap print preview table', 
        ),
        'Session'
    );
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home'
            ),
            'authorize' => array('Controller')
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('display');
    }
    public function beforeRender() {
    $this->set('userData', $this->Auth->user());	
    	
    }
    
    public function isAuthorized($user) {
    	//@todo: Include authorization logic
    	return false;
	}
	public function userHasPermission($user,$permission)
	{
		return ($user['admin_level'] & $permission);
	}
}
