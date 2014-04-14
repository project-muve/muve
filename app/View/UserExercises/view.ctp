<div class="userExercises view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit User Exercise'), array('action' => 'edit', $userExercise['UserExercise']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Exercise'), array('action' => 'delete', $userExercise['UserExercise']['id']), null, __('Are you sure you want to delete # %s?', $userExercise['UserExercise']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Exercises'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Exercise'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercises'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('User Exercise');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userExercise['UserExercise']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exercises'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userExercise['Exercise']['title'], array('controller' => 'exercises', 'action' => 'view', $userExercise['Exercise']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ts Completed'); ?></dt>
		<dd>
			<?php echo h($userExercise['UserExercise']['ts_completed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duration'); ?></dt>
		<dd>
			<?php echo h($userExercise['UserExercise']['duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($userExercise['UserExercise']['amount']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
