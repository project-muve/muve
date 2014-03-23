<div class="groupExercises view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit Group Exercise'), array('action' => 'edit', $groupExercise['GroupExercise']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group Exercise'), array('action' => 'delete', $groupExercise['GroupExercise']['id']), null, __('Are you sure you want to delete # %s?', $groupExercise['GroupExercise']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Exercises'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Exercise'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercises'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Group Exercise');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($groupExercise['GroupExercise']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupExercise['User']['id'], array('controller' => 'users', 'action' => 'view', $groupExercise['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupExercise['Group']['id'], array('controller' => 'groups', 'action' => 'view', $groupExercise['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exercises'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupExercise['Exercises']['title'], array('controller' => 'exercises', 'action' => 'view', $groupExercise['Exercises']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ts Completed'); ?></dt>
		<dd>
			<?php echo h($groupExercise['GroupExercise']['ts_completed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duration'); ?></dt>
		<dd>
			<?php echo h($groupExercise['GroupExercise']['duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($groupExercise['GroupExercise']['amount']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
