<div class="milestones row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Html->link(__('List Milestones'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercises'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="milestones span10">
<?php echo $this->Form->create('Milestone', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Add Milestone'); ?></legend>
	<?php
		echo $this->Form->input('exercises_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('text');
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'exercises', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>