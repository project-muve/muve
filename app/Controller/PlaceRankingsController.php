<?php
App::uses('AppController', 'Controller');
/**
 * PlaceRankings Controller
 *
 * @property PlaceRanking $PlaceRanking
 * @property PaginatorComponent $Paginator
 */
class PlaceRankingsController extends AppController {

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
		$this->PlaceRanking->recursive = 0;
		$this->set('placeRankings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlaceRanking->exists($id)) {
			throw new NotFoundException(__('Invalid place ranking'));
		}
		$options = array('conditions' => array('PlaceRanking.' . $this->PlaceRanking->primaryKey => $id));
		$this->set('placeRanking', $this->PlaceRanking->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlaceRanking->create();
			if ($this->PlaceRanking->save($this->request->data)) {
				$this->Session->setFlash(__('The place ranking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place ranking could not be saved. Please, try again.'));
			}
		}
		$users = $this->PlaceRanking->User->find('list');
		$places = $this->PlaceRanking->Place->find('list');
		$this->set(compact('users', 'places'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PlaceRanking->exists($id)) {
			throw new NotFoundException(__('Invalid place ranking'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PlaceRanking->save($this->request->data)) {
				$this->Session->setFlash(__('The place ranking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place ranking could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PlaceRanking.' . $this->PlaceRanking->primaryKey => $id));
			$this->request->data = $this->PlaceRanking->find('first', $options);
		}
		$users = $this->PlaceRanking->User->find('list');
		$places = $this->PlaceRanking->Place->find('list');
		$this->set(compact('users', 'places'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PlaceRanking->id = $id;
		if (!$this->PlaceRanking->exists()) {
			throw new NotFoundException(__('Invalid place ranking'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceRanking->delete()) {
			$this->Session->setFlash(__('The place ranking has been deleted.'));
		} else {
			$this->Session->setFlash(__('The place ranking could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
