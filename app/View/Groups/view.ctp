<div class="groups view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group'), array('action' => 'delete', $group['Group']['id']), null, __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Exercises'), array('controller' => 'group_exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Exercise'), array('controller' => 'group_exercises', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Group');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['group_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Privacy'); ?></dt>
		<dd>
			<?php echo h($group['Group']['privacy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($group['Group']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visible'); ?></dt>
		<dd>
			<?php echo h($group['Group']['visible']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Open to Join'); ?></dt>
		<dd>
			<?php echo h($group['Group']['open_to_join']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($group['User']['id'], array('controller' => 'users', 'action' => 'view', $group['User']['id'])); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
	<div class="row">
		<div class="related span10 offset2">
			<hr>
			<h3><?php echo __('Related Group Exercises');?></h3>
			<div class="btn-toolbar">
			<?php echo $this->Html->link(__('New Group Exercise'), array('controller' => 'group_exercises', 'action' => 'add'), array('class'=>'btn btn-mini'));?>			</div>
	<?php if (!empty($group['GroupExercise'])):?>
			<table class="table">
				<tr>
							<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Exercises Id'); ?></th>
		<th><?php echo __('Ts Completed'); ?></th>
		<th><?php echo __('Duration'); ?></th>
		<th><?php echo __('Amount'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
					<?php
		$i = 0;
		foreach ($group['GroupExercise'] as $groupExercise): ?>
		<tr>
			<td><?php echo $groupExercise['id'];?></td>
			<td><?php echo $groupExercise['user_id'];?></td>
			<td><?php echo $groupExercise['group_id'];?></td>
			<td><?php echo $groupExercise['exercises_id'];?></td>
			<td><?php echo $groupExercise['ts_completed'];?></td>
			<td><?php echo $groupExercise['duration'];?></td>
			<td><?php echo $groupExercise['amount'];?></td>
			<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
				<?php echo $this->Html->link(__('View'), array('controller' => 'group_exercises', 'action' => 'view', $groupExercise['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'group_exercises', 'action' => 'edit', $groupExercise['id']), array('class' => 'btn btn-mini')); ?>
				</div>
				<div class="btn-group">
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'group_exercises', 'action' => 'delete', $groupExercise['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $groupExercise['id'])); ?>
				</div>
			</div>
			</td>
		</tr>
	<?php endforeach; ?>
			</table>
	<?php endif; ?>

		</div>
	</div>
	<div class="row">
		<div class="related span10 offset2">
			<hr>
			<h3><?php echo __('Related Users');?></h3>
			<div class="btn-toolbar">
			<?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class'=>'btn btn-mini'));?>			</div>
	<?php if (!empty($group['User'])):?>
			<table class="table">
				<tr>
							<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('F Name'); ?></th>
		<th><?php echo __('L Name'); ?></th>
		<th><?php echo __('Okay Email'); ?></th>
		<th><?php echo __('Fbid'); ?></th>
		<th><?php echo __('Twid'); ?></th>
		<th><?php echo __('Fb Token'); ?></th>
		<th><?php echo __('Tw Token'); ?></th>
		<th><?php echo __('Admin Level'); ?></th>
		<th><?php echo __('Show Prof Pic'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
					<?php
		$i = 0;
		foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['f_name'];?></td>
			<td><?php echo $user['l_name'];?></td>
			<td><?php echo $user['okay_email'];?></td>
			<td><?php echo $user['fbid'];?></td>
			<td><?php echo $user['twid'];?></td>
			<td><?php echo $user['fb_token'];?></td>
			<td><?php echo $user['tw_token'];?></td>
			<td><?php echo $user['admin_level'];?></td>
			<td><?php echo $user['show_prof_pic'];?></td>
			<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'btn btn-mini')); ?>
				</div>
				<div class="btn-group">
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $user['id'])); ?>
				</div>
			</div>
			</td>
		</tr>
	<?php endforeach; ?>
			</table>
	<?php endif; ?>

		</div>
	</div>
