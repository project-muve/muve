<div class="groups row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Group.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Group.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Exercises'), array('controller' => 'group_exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Exercise'), array('controller' => 'group_exercises', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="groups span10">
<?php echo $this->Form->create('Group', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('group_name');
		echo $this->Form->input('privacy');
		echo $this->Form->input('description');
		echo $this->Form->input('visible');
		echo $this->Form->input('open_to_join');
		echo $this->Form->input('user_id');
		echo $this->Form->input('User');
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'users', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>