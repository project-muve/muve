<div class="articles row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Article.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Article.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="articles span10">
<?php echo $this->Form->create('Article', array('class' => 'form-horizontal', 'inputDefaults'=>array('error' => array(
        'attributes' => array('wrap' => 'span', 'class' => 'alert-error')
    ))));?>
	<fieldset>
		<legend><?php echo __('Edit Article'); ?></legend>
	<?php
		echo $this->Form->input('id');
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
