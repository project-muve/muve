<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 */
class GroupsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter(){
    parent::beforeFilter();
    
    $this->Auth->allow('index');	
		
	}
	public function isAuthorized($user) {
		if (parent::isAuthorized($user)){
			return true;
		}
		if ($this->action === 'add' && $this->Auth->user())
		{
			return true;
		}
		if (( $this->action === 'edit' || $this->action === 'delete') && $this->Auth->user())
		{

			return true;
		}
		return true;
	}
	
	private function userGroups()
	{
		return $this->Group->GroupsUser->find('list',array('fields'=>array('group_id'), 'conditions'=>array('user_id'=>$this->Auth->user('id'))));
	}
	private function userGroupsAdmin()
	{
		return $this->Group->GroupsUser->find('list',array('fields'=>array('group_id'), 'conditions'=>array('user_id'=>$this->Auth->user('id'),'is_admin'=>1)));
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Group->recursive = 0;
		
		if (!$this->userHasPermission($this->Auth->user(),PERMISSION_USEREDIT))
		{
			 $this->Paginator->settings=array(
			     'joins' => array(
				   array(
					  'table' => 'groups_users',
					  'alias' => 'GroupsUsers',
					  'type' => 'LEFT',
					  'conditions' => array(
						 'GroupsUsers.group_id = Group.id'
					  )
				   )
			    ),
			    'conditions' => array(
				'OR'=>array(
				   array('GroupsUsers.id' => $this->Auth->user('id')),
				   array('Group.visible'=>1)
			    )),
			    'fields' => array('Group.*'),
			    'order' => 'Group.group_name ASC'
			);
		}
		$this->set('groups', $this->Paginator->paginate());

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$group = $this->Group->find('first', $options);
		
		if (!$this->userHasPermission($this->Auth->user(),PERMISSION_USEREDIT) && 
			!in_array($id,$this->userGroups()) &&
			$group['Group']['visible']==0
			)
		{
			throw new ForbiddenException(__('Not Authorized'));
		}

		$this->set('group', $group);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			$this->Group->set('user_id', $this->Auth->user('id'));
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		}
		$users = $this->Group->User->find('list');
		$users = $this->Group->User->find('list');
		$this->set(compact('users', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$group = $this->Group->find('first', $options);
		
		if ((!$this->userHasPermission($this->Auth->user(),PERMISSION_USEREDIT) && 
			!in_array($id,$this->userGroupsAdmin())) 
			)
		{
			throw new ForbiddenException(__('Not Authorized'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $group;
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
		$this->Group->id = $id;
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}

		if ((!$this->userHasPermission($this->Auth->user(),PERMISSION_USEREDIT) && 
			!in_array($id,$this->userGroupsAdmin())) 
			)
		{
			throw new ForbiddenException(__('Not Authorized'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('The group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
