<div class="exercises row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Exercise.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Exercise.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="exercises span10">
<?php echo $this->Form->create('Exercise', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Exercise'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('units');
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => '', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>