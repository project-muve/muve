<?php
App::uses('AppController', 'Controller');
/**
 * Milestones Controller
 *
 * @property Milestone $Milestone
 * @property PaginatorComponent $Paginator
 */
class MilestonesController extends AppController {

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
		$this->Milestone->recursive = 0;
		$this->set('milestones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Milestone->exists($id)) {
			throw new NotFoundException(__('Invalid milestone'));
		}
		$options = array('conditions' => array('Milestone.' . $this->Milestone->primaryKey => $id));
		$this->set('milestone', $this->Milestone->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Milestone->create();
			if ($this->Milestone->save($this->request->data)) {
				$this->Session->setFlash(__('The milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The milestone could not be saved. Please, try again.'));
			}
		}
		$exercises = $this->Milestone->Exercise->find('list');
		$this->set(compact('exercises'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Milestone->exists($id)) {
			throw new NotFoundException(__('Invalid milestone'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Milestone->save($this->request->data)) {
				$this->Session->setFlash(__('The milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The milestone could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Milestone.' . $this->Milestone->primaryKey => $id));
			$this->request->data = $this->Milestone->find('first', $options);
		}
		$exercises = $this->Milestone->Exercise->find('list');
		$this->set(compact('exercises'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Milestone->id = $id;
		if (!$this->Milestone->exists()) {
			throw new NotFoundException(__('Invalid milestone'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Milestone->delete()) {
			$this->Session->setFlash(__('The milestone has been deleted.'));
		} else {
			$this->Session->setFlash(__('The milestone could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
