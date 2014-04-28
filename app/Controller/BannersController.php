<?php
App::uses('AppController', 'Controller');
/**
 * Banners Controller
 *
 * @property Banner $Banner
 * @property PaginatorComponent $Paginator
 */
class BannersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	
	
	public function beforeFilter(){
    parent::beforeFilter();

    $this->Auth->allow('display');
		
	}
	public function isAuthorized($user) {
		if (parent::isAuthorized($user)){
			return true;
		}
		if ($this->action === 'index' || $this->action === 'add' || $this->action === 'edit' || $this->action === 'delete')
		{
			return $this->userHasPermission($user,PERMISSION_HOMEPAGE);
		}
		return true;
	}	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Banner->recursive = 0;
		$this->set('banners', $this->Paginator->paginate());
	}


	public function display() {
		 $banners = $this->Banner->find('all',array('conditions'=>array('published'=>true)));
	if(isset($this->params['requested']))
	{
		return $banners;
	}
	$this->set('banners',$banners);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Banner->create();
			if ($this->uploadFile() && $this->Banner->save($this->request->data)) {
				$this->Session->setFlash(__('The banner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
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
		if (!$this->Banner->exists($id)) {
			throw new NotFoundException(__('Invalid banner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Banner']['file']))
			{
				unlink(APP . DIRECTORY_SEPARATOR . "webroot" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "banners" . DIRECTORY_SEPARATOR  . $this->request->data['Banner']['image']);
				
				$this->uploadFile();

			}
			if ($this->Banner->save($this->request->data)) {
				$this->Session->setFlash(__('The banner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
			$this->request->data = $this->Banner->find('first', $options);
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
		$this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid banner'));
		}
		$this->request->onlyAllow('post', 'delete');
			$options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
			$this->request->data = $this->Banner->find('first', $options);
		if ($this->Banner->delete()) {
		unlink(APP . DIRECTORY_SEPARATOR . "webroot" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "banners" . DIRECTORY_SEPARATOR  . $this->request->data['Banner']['image']);
			$this->Session->setFlash(__('The banner has been deleted.'));
		} else {
			$this->Session->setFlash(__('The banner could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
 function uploadFile() {
  $file = $this->data['Banner']['file'];
  if ($file['error'] === UPLOAD_ERR_OK) {
    $id = String::uuid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    if (move_uploaded_file($file['tmp_name'], APP . DIRECTORY_SEPARATOR . "webroot" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "banners" . DIRECTORY_SEPARATOR . $id)) {
      $this->request->data['Banner']['image'] = $id;

      return true;
    }
  }
  return false;
}
	
	}
