<?php
App::uses('AppController', 'Controller');
/**
 * MuveTools Controller
 *
 * @property MuveTool $MuveTool
 * @property PaginatorComponent $Paginator
 */
class MuveToolsController extends AppController {

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
		$this->MuveTool->recursive = 0;
		$this->set('muveTools', $this->MuveTool->find('all'));
		$this->set('canEdit',$this->userHasPermission($this->Auth->user(),PERMISSION_TOOLS));
	}

	public function isAuthorized($user) {
		if (parent::isAuthorized($user)){
			return true;
		}
		if ($this->action === 'add' || $this->action === 'edit' || $this->action === 'delete')
		{
			return $this->userHasPermission($user,PERMISSION_TOOLS);
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
		if (!$this->MuveTool->exists($id)) {
			throw new NotFoundException(__('Invalid muve tool'));
		}
		$options = array('conditions' => array('MuveTool.' . $this->MuveTool->primaryKey => $id));
		$this->set('muveTool', $this->MuveTool->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MuveTool->create();
			if ($this->MuveTool->save($this->request->data)) {
				$this->Session->setFlash(__('The muve tool has been saved.'),'flashSuccess');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The muve tool could not be saved. Please, try again.'),'flashFailure');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MuveTool->exists($id)) {
			throw new NotFoundException(__('Invalid muve tool'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MuveTool->save($this->request->data)) {
				$this->Session->setFlash(__('The muve tool has been saved.'),'flashSuccess');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The muve tool could not be saved. Please, try again.'),'flashFailure');
			}
		} else {
			$options = array('conditions' => array('MuveTool.' . $this->MuveTool->primaryKey => $id));
			$this->request->data = $this->MuveTool->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MuveTool->id = $id;
		if (!$this->MuveTool->exists()) {
			throw new NotFoundException(__('Invalid muve tool'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MuveTool->delete()) {
			$this->Session->setFlash(__('The muve tool has been deleted.'),'flashSuccess');
		} else {
			$this->Session->setFlash(__('The muve tool could not be deleted. Please, try again.'),'flashFailure');
		}
		return $this->redirect(array('action' => 'index'));
	}}
