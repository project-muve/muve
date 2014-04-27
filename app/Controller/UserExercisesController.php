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
		//Allow admins with rights to view exercises for all users
		if ($this->userHasPermission($this->Auth->user(),PERMISSION_EXERCISES))
		{
			$this->set('userExercises', $this->Paginator->paginate('UserExercise'));
		}
		else
		{
			return $this->redirect(array('controller' =>'users','action'=>'profile'));
		}
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
		return true;
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
			if (!$this->userHasPermission($this->Auth->user(),PERMISSION_EXERCISES))
			{
				$this->UserExercise->set('user_id', $this->Auth->user('id'));
			}
			if ($this->UserExercise->save($this->request->data)) {
				$this->Session->setFlash(__('The user exercise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user exercise could not be saved. Please, try again.'));
			}
		}

		$exercises = $this->UserExercise->Exercise->find('list');

		$exerciseData=array();
		
		foreach($this->UserExercise->Exercise->find('all',array('recursive'=>0))as $exercise)
		{
			$exerciseData[$exercise['Exercise']['id']]=$exercise['Exercise'];
		}
		$this->set('exerciseData', $exerciseData);
		$users = $this->UserExercise->User->find('list');
		$this->set(compact('exercises','users'));
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

		$exercises = $this->UserExercise->Exercise->find('list');
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
