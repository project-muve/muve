<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('add', 'logout');
}

public function login() {
    if ($this->request->is('post')) {
		if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Invalid username or password, try again'));
   	}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}


	private function facebookAuthenticate() {
		if (isset($this->request->query['code'])){
			//@todo: Move API Credentials to config file
					$exchange_url = "https://graph.facebook.com/oauth/access_token?client_id=301374523349587&client_secret=96f60f63bd908020b0894fc24a85c1d6&code=".$this->request->query['code'] . "&redirect_uri=http://localhost/muve/index.php/users/view/1";

			$resp = file_get_contents($exchange_url);
			parse_str($resp,$output);
			$access_token = $output['access_token'];

			$extend_url = "https://graph.facebook.com/oauth/access_token?client_id=301374523349587&client_secret=96f60f63bd908020b0894fc24a85c1d6&grant_type=fb_exchange_token&fb_exchange_token=$access_token";

			$resp = file_get_contents($extend_url);

			parse_str($resp,$output);

			return $output['access_token'];
		}
		return null;
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$user=$this->User->find('first', $options);
		$this->User->create($user);
		$this->set('user', $user );

	//Check for Facebook Account
	$extended_token=$this->facebookAuthenticate();
	if ($extended_token != null)
	{
		$this->User->saveField('fb_token',$extended_token);
	}
	else
	{
		$extended_token=$user['User']['fb_token'];
	}
	$this->facebook->setAccessToken($extended_token);

	if ($this->facebook->getUser()){
	//See if they've authorized the App, and that we have a valid access token.
     	try {
        	$this->facebook->api('/me','GET');
      	} catch(FacebookApiException $e) {
	//Either they haven't authorized the App or we have an expired token
	// Pass the login URL to the view
        $this->set('facebookLogin',$this->facebook->getLoginUrl()); 
      }   
    } else {
	//the User is not signed into Facebook, pass the login URL to the view
        $this->set('facebookLogin',$this->facebook->getLoginUrl()); 

    }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'),'flashSuccess');
				if ($this->Auth->login()) {
					return $this->redirect($this->Auth->redirect());
				}
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'flashFailure');
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function isAuthorized($user) {
		if (parent::isAuthorized($user)){
			return true;
		}
				
		//Determine the id of the user we're looking up
		if(sizeof($this->request['named'])===0)
		{
			$userID = isset($this->request['pass'][0]) ? $this->request['pass'][0] : null;
		}
		else 
		{
			$userID = isset($this->request['named']['id']) ? $this->request['named']['id'] : null;
		}		

		//If we're not looking up the user who is logged in, make sure we have the proper admin permissions
		if ($user['id'] != $userID)
		{
			if ($this->action === 'view' || $this->action === 'edit' || $this->action === 'delete')
			{
				return $this->userHasPermission($user,PERMISSION_USEREDIT);
			}
		}
		return true;
	}
	}
