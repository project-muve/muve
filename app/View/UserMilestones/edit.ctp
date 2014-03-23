<div class="userMilestones row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserMilestone.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UserMilestone.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Milestones'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Milestones'), array('controller' => 'milestones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Milestones'), array('controller' => 'milestones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="userMilestones span10">
<?php echo $this->Form->create('UserMilestone', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit User Milestone'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('milestones_id');
		echo $this->Form->input('date');
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'milestones', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>