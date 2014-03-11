<h1>Add Post</h1>
<?php
echo $this->Form->create('Recipe');
echo $this->Form->input('title');
echo $this->Form->input('ingredients', array('rows' => '10'));
echo $this->Form->input('serves');
echo $this->Form->end('Save Recipe');
?>