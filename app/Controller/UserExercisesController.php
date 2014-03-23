<?php
App::uses('AppController', 'Controller');
/**
 * UserExercises Controller
 *
 * @property UserExercise $UserExercise
 * @property PaginatorComponent $Paginator
 */
class UserExercisesController extends AppController {

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
		$this->UserExercise->recursive = 0;
		$this->set('userExercises', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserExercise->exists($id)) {
			throw new NotFoundException(__('Invalid user exercise'));
		}
		$options = array('conditions' => array('UserExercise.' . $this->UserExercise->primaryKey => $id));
		$this->set('userExercise', $this->UserExercise->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserExercise->create();
			if ($this->UserExercise->save($this->request->data)) {
				$this->Session->setFlash(__('The user exercise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user exercise could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserExercise->User->find('list');
		$exercises = $this->UserExercise->Exercise->find('list');
		$this->set(compact('users', 'exercises'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserExercise->exists($id)) {
			throw new NotFoundException(__('Invalid user exercise'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserExercise->save($this->request->data)) {
				$this->Session->setFlash(__('The user exercise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user exercise could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserExercise.' . $this->UserExercise->primaryKey => $id));
			$this->request->data = $this->UserExercise->find('first', $options);
		}
		$users = $this->UserExercise->User->find('list');
		$exercises = $this->UserExercise->Exercise->find('list');
		$this->set(compact('users', 'exercises'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserExercise->id = $id;
		if (!$this->UserExercise->exists()) {
			throw new NotFoundException(__('Invalid user exercise'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserExercise->delete()) {
			$this->Session->setFlash(__('The user exercise has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user exercise could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
