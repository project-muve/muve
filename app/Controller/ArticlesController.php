<?php
App::uses('AppController', 'Controller');
/**
 * Articles Controller
 *
 * @property Article $Article
 * @property PaginatorComponent $Paginator
 */
class ArticlesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter(){
    parent::beforeFilter();
    // Allow users to register and logout.
    $this->Auth->allow('view');	
		
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Article->recursive = 1;
		$this->set('articles', $this->Paginator->paginate());
	}

	public function isAuthorized($user) {
		if (parent::isAuthorized($user)){
			return true;
		}
		if ($this->action === 'add' || $this->action === 'edit' || $this->action === 'delete')
		{
			return $this->userHasPermission($user,PERMISSION_ARTICLES);
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
	public function view($title = null) {
		
   $article = $this->Article->find('first', array('conditions' => array('Article.title' => $title)));
    if (!$article) {
        throw new NotFoundException(__('Invalid article') . $title);
    }
		$this->set('article', $article);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Article->create();
			$this->Article->set('user_id', $this->Auth->user('id'));
			$this->Article->set('ts_posted',date("Y-m-d H:i:s"));
			$this->Article->set('ts_modified',date("Y-m-d H:i:s"));
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved.'),'flashSuccess');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'),'flashFailure');
			}
		}
		$users = $this->Article->User->find('list');
		$this->set(compact('users'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Article->exists($id)) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Article->set('ts_modified',date("Y-m-d H:i:s"));
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved.'),'flashSuccess');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'),'flashFailure');
			}
		} else {
			$options = array('conditions' => array('Article.' . $this->Article->primaryKey => $id));
			$this->request->data = $this->Article->find('first', $options);
		}
		$users = $this->Article->User->find('list');
		$this->set(compact('users'));
	}
/*     Function to display most recent article posts!      */
public function lastpost($limit = 4) {

	$articles = $this->Article->find('all', array('fields'=>array('Article.id', 'Article.title', 'Article.ts_posted'),
							   'recursive'=>0,
							   'order'=>array('Article.ts_posted description'),
							   'limit'=>$limit));
 
	if(isset($this->params['requested']))
	{
		return $articles;
	}
 
	$this->set('lastpost', $articles);
}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Article->delete()) {
			$this->Session->setFlash(__('The article has been deleted.'),'flashSuccess');
		} else {
			$this->Session->setFlash(__('The article could not be deleted. Please, try again.'),'flashFailure');
		}
		return $this->redirect(array('action' => 'index'));
	}}
	
	
  
