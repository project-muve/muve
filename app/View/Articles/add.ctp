<?php echo $this->Html->css('form'); ?>
<div class="articles row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="articles span10">
<?php echo $this->Form->create('Article', array('class' => 'form-horizontal','inputDefaults'=>array('error' => array(
        'attributes' => array('wrap' => 'span', 'class' => 'text-error')
    ))));?>
	<fieldset>
		<legend><?php echo __('Add Article'); ?></legend>
	<?php

		echo $this->Form->input('title');
	?>
    <label for="articleDescription">Content</label>
    <?php echo $this->Tinymce->textarea('Article.description'); ?>

	<?php
		echo $this->Form->input('icon');
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'submit-button','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'users', 'action' => 'index'),array('class'=>'submit-button'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>
