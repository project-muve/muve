<?php
App::uses('AppController', 'Controller');
/**
 * Places Controller
 *
 * @property Place $Place
 * @property PaginatorComponent $Paginator
 */
class PlacesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->Paginator->paginate());
	}
/**
 * isAuthorized method
 *
 * @return boolean
 */
	public function isAuthorized($user) {
		if (parent::isAuthorized($user)){
			return true;
		}
		if ($this->action === 'add' || $this->action === 'edit' || $this->action === 'delete')
		{
			return $this->userHasPermission($user,PERMISSION_PLACES);
		}
		if ($this->action === 'rate' && empty($userData)) { return false;  }
		return true;
	}
	public function beforeFilter(){
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('index', 'view','rate');	
		
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id),'recursive'=>2);
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			$this->Place->set('user_id', $this->Auth->user('id'));
			$this->Article->set('time_added',date("Y-m-d H:i:s"));
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'));
			}
		}
		$users = $this->Place->User->find('list');
		$this->set(compact('users'));
		$this->set('markers',$this->getMarkerIcons());
	}

	public function rate($id = null) {
		$this->viewClass = 'Json';

		if ($this->request->is('ajax')) {
			$this->loadModel('PlaceRanking');
			$this->PlaceRanking->create();
			$this->PlaceRanking->set('user_id', $this->Auth->user('id'));
			
			if ($this->PlaceRanking->save($this->request->data)) {
				$this->set('data',$this->request->data);
			} else {
				$this->set('data','no');
			}
		}
		

	}

private function getMarkerIcons()
{
	$markers =  scandir(APP . DIRECTORY_SEPARATOR. "webroot" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "markers");
	return array_slice($markers,2);
}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
		}
		$users = $this->Place->User->find('list');
		$this->set(compact('users'));
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
		$this->set('markers',$this->getMarkerIcons());
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__('Invalid place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__('The place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
