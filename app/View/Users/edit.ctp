<div class="users row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Exercises'), array('controller' => 'group_exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Exercise'), array('controller' => 'group_exercises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Exercises'), array('controller' => 'user_exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Exercise'), array('controller' => 'user_exercises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Milestones'), array('controller' => 'user_milestones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Milestone'), array('controller' => 'user_milestones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="users span10">
<?php echo $this->Form->create('User', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('f_name');
		echo $this->Form->input('l_name');
		echo $this->Form->input('okay_email');
		echo $this->Form->input('fbid');
		echo $this->Form->input('twid');
		echo $this->Form->input('fb_token');
		echo $this->Form->input('tw_token');
		echo $this->Form->input('admin_level');
		echo $this->Form->input('show_prof_pic');
		echo $this->Form->input('Group');
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'groups', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>