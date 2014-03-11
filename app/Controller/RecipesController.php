<?php
class RecipesController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('recipes', $this->Recipe->find('all'));
    }
	
	 public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $recipe = $this->Recipe->findById($id);
        if (!$recipe) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('recipe', $recipe);
    }
	 public function add() {
        if ($this->request->is('recipe')) {
            $this->Recipe->create();
            if ($this->Recipe->save($this->request->data)) {
                $this->Session->setFlash(__('Your recipe has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your recipe.'));
        }
    }
	public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $recipe = $this->Recipe->findById($id);
    if (!$recipe) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('recipe', 'put'))) {
        $this->Recipe->id = $id;
        if ($this->Recipe->save($this->request->data)) {
            $this->Session->setFlash(__('Your recipe has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your recipe.'));
    }
    if (!$this->request->data) {
        $this->request->data = $recipe;
    }
	}	
}
?>