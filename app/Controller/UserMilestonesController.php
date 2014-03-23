<?php
App::uses('AppController', 'Controller');
/**
 * UserMilestones Controller
 *
 * @property UserMilestone $UserMilestone
 * @property PaginatorComponent $Paginator
 */
class UserMilestonesController extends AppController {

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
		$this->UserMilestone->recursive = 0;
		$this->set('userMilestones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserMilestone->exists($id)) {
			throw new NotFoundException(__('Invalid user milestone'));
		}
		$options = array('conditions' => array('UserMilestone.' . $this->UserMilestone->primaryKey => $id));
		$this->set('userMilestone', $this->UserMilestone->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserMilestone->create();
			if ($this->UserMilestone->save($this->request->data)) {
				$this->Session->setFlash(__('The user milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user milestone could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserMilestone->User->find('list');
		$milestones = $this->UserMilestone->Milestone->find('list');
		$this->set(compact('users', 'milestones'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserMilestone->exists($id)) {
			throw new NotFoundException(__('Invalid user milestone'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserMilestone->save($this->request->data)) {
				$this->Session->setFlash(__('The user milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user milestone could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserMilestone.' . $this->UserMilestone->primaryKey => $id));
			$this->request->data = $this->UserMilestone->find('first', $options);
		}
		$users = $this->UserMilestone->User->find('list');
		$milestones = $this->UserMilestone->Milestone->find('list');
		$this->set(compact('users', 'milestones'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserMilestone->id = $id;
		if (!$this->UserMilestone->exists()) {
			throw new NotFoundException(__('Invalid user milestone'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserMilestone->delete()) {
			$this->Session->setFlash(__('The user milestone has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user milestone could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
