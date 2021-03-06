<?php 
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
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
    $this->Auth->allow('register', 'logout','passwordreset','passwordchange');
}

public function login() {
	if ($this->Auth->user())
	{
		return $this->redirect($this->Auth->redirectUrl());
	}
    if ($this->request->is('post')) {
		if ($this->Auth->login()) {
			return $this->redirect(array('controller' => 'users','action' => 'profile'));
			}
			$this->Session->setFlash(__('Invalid username or password, try again'),'flashFailure');
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
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function profile() {
;
		$options = array('recursive'=>2, 'conditions' => array('User.' . $this->User->primaryKey => $this->Auth->user('id')));
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
 * register method
 *
 * @return void
 */
	public function register() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Your account has been created.'),'flashSuccess');
				$Email = new CakeEmail();
				$Email->from(array('MUVE@missouri.edu' => 'MUVE'))
					->sender('MUVE@missouri.edu', 'MUVE')
					->to($this->request->data['User']['email'])
					->subject('Welcome to MUVE')
					->send('Welcome to MUVE');
				if ($this->Auth->login()) {
					return $this->redirect($this->Auth->redirect());
				}
			} else {
				$this->Session->setFlash(__('Sorry, we could not create your account. Please, try again.'),'flashFailure');
			}
		}
	}

	/**
	 * passwordReset method
	 * Creates a password reset key to reset a user's password and sends the key to ther user's email
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function passwordReset() {
		if ($this->request->is('post')) {
			$options = array('recursive'=>0, 'conditions' => array('User.email'  => $this->request->data['User']['email']));
			if ($this->User->find('count',$options))
			{
				$user=$this->User->find('first', $options);
				$this->User->create($user);
				$key=md5(rand()*time() * $user['User']['id']);
				$this->User->id=$user['User']['id'];
				$this->User->saveField('password_key', $key);
				$Email = new CakeEmail('default');
				$Email->template('passwordReset','default')
					->emailFormat('both')
					->to($user['User']['email'])
					->subject('Password Reset')
					->viewVars(array('name' => $user['User']['f_name'],'key'=>$key))
					->send();
			}
			else
			{
				$this->Session->setFlash(__('Sorry, we could find an account with that email.'),'flashFailure');
			}
		}
	}

	/**
	 * passwordChange method
	 * 
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function passwordChange($key=null) {
		if (empty($key)) {
			throw new BadRequestException(__('Invalid password key'));
		}
		if ($this->request->is('post') && $key !=null) {
			$options = array('recursive'=>0, 'conditions' => array('User.password_key'  => $key));
			if ($this->User->find('count',$options))
			{
				$user=$this->User->find('first', $options);
				$this->User->id=$user['User']['id'];
				$this->User->saveField('password_key', null);
				$this->User->saveField('password', $this->request->data['User']['password']);
				$this->Session->setFlash(__('Your password has been changed. You may now login.'),'flashSuccess');
				$Email = new CakeEmail('default');
				$Email->template('passwordChanged','default')
					->emailFormat('both')
					->to($user['User']['email'])
					->subject('Password Changed')
					->viewVars(array('name' => $user['User']['f_name']))
					->send();
				return $this->redirect(array('controller' => 'users','action' => 'login'));
			}
			else
			{
				$this->Session->setFlash(__('Sorry, this appears to be an invalid password key.'),'flashFailure');
			}
		}
		$this->set('key',$key);
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
			if (empty($this->request->data['User']['password']))
			{
				$this->User->validator()->remove('password');
				$this->User->validator()->remove('password2');
				unset($this->request->data['User']['password']);
			}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'),'flashSuccess');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'flashFailure');
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
			$this->Session->setFlash(__('The user has been deleted.'),'flashSuccess');
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'),'flashFailure');
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
