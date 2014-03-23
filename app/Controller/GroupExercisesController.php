<?php
App::uses('AppController', 'Controller');
/**
 * GroupExercises Controller
 *
 * @property GroupExercise $GroupExercise
 * @property PaginatorComponent $Paginator
 */
class GroupExercisesController extends AppController {

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
		$this->GroupExercise->recursive = 0;
		$this->set('groupExercises', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GroupExercise->exists($id)) {
			throw new NotFoundException(__('Invalid group exercise'));
		}
		$options = array('conditions' => array('GroupExercise.' . $this->GroupExercise->primaryKey => $id));
		$this->set('groupExercise', $this->GroupExercise->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GroupExercise->create();
			if ($this->GroupExercise->save($this->request->data)) {
				$this->Session->setFlash(__('The group exercise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group exercise could not be saved. Please, try again.'));
			}
		}
		$users = $this->GroupExercise->User->find('list');
		$groups = $this->GroupExercise->Group->find('list');
		$exercises = $this->GroupExercise->Exercise->find('list');
		$this->set(compact('users', 'groups', 'exercises'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->GroupExercise->exists($id)) {
			throw new NotFoundException(__('Invalid group exercise'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->GroupExercise->save($this->request->data)) {
				$this->Session->setFlash(__('The group exercise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group exercise could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GroupExercise.' . $this->GroupExercise->primaryKey => $id));
			$this->request->data = $this->GroupExercise->find('first', $options);
		}
		$users = $this->GroupExercise->User->find('list');
		$groups = $this->GroupExercise->Group->find('list');
		$exercises = $this->GroupExercise->Exercise->find('list');
		$this->set(compact('users', 'groups', 'exercises'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->GroupExercise->id = $id;
		if (!$this->GroupExercise->exists()) {
			throw new NotFoundException(__('Invalid group exercise'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GroupExercise->delete()) {
			$this->Session->setFlash(__('The group exercise has been deleted.'));
		} else {
			$this->Session->setFlash(__('The group exercise could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
