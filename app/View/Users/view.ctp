<div class="users view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
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
	<div class="span10">
		<h2><?php  echo __('User');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('F Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['f_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('L Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['l_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Okay Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['okay_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fbid'); ?></dt>
		<dd>
			<?php echo h($user['User']['fbid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Twid'); ?></dt>
		<dd>
			<?php echo h($user['User']['twid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fb Token'); ?></dt>
		<dd>
			<?php echo h($user['User']['fb_token']); ?>
			&nbsp;
<?php if (isset($facebookLogin)) { echo '<a href="' . $facebookLogin . '" target="_blank" class="btn btn-primary">Connect with Facebook</a>'; } ?>
		</dd>
		<dt><?php echo __('Tw Token'); ?></dt>
		<dd>
			<?php echo h($user['User']['tw_token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin Level'); ?></dt>
		<dd>
			<?php echo h($user['User']['admin_level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Show Prof Pic'); ?></dt>
		<dd>
			<?php echo h($user['User']['show_prof_pic']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
	<div class="row">
		<div class="related span10 offset2">
			<hr>
			<h3><?php echo __('Related Articles');?></h3>
			<div class="btn-toolbar">
			<?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add'), array('class'=>'btn btn-mini'));?>			</div>
	<?php if (!empty($user['Article'])):?>
			<table class="table">
				<tr>
							<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Ts Posted'); ?></th>
		<th><?php echo __('Ts Updated'); ?></th>
		<th><?php echo __('Icon'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
					<?php
		$i = 0;
		foreach ($user['Article'] as $article): ?>
		<tr>
			<td><?php echo $article['id'];?></td>
			<td><?php echo $article['user_id'];?></td>
			<td><?php echo $article['title'];?></td>
			<td><?php echo $article['description'];?></td>
			<td><?php echo $article['ts_posted'];?></td>
			<td><?php echo $article['ts_updated'];?></td>
			<td><?php echo $article['icon'];?></td>
			<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
				<?php echo $this->Html->link(__('View'), array('controller' => 'articles', 'action' => 'view', $article['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'articles', 'action' => 'edit', $article['id']), array('class' => 'btn btn-mini')); ?>
				</div>
				<div class="btn-group">
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'articles', 'action' => 'delete', $article['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $article['id'])); ?>
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
			<h3><?php echo __('Related Group Exercises');?></h3>
			<div class="btn-toolbar">
			<?php echo $this->Html->link(__('New Group Exercise'), array('controller' => 'group_exercises', 'action' => 'add'), array('class'=>'btn btn-mini'));?>			</div>
	<?php if (!empty($user['GroupExercise'])):?>
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
		foreach ($user['GroupExercise'] as $groupExercise): ?>
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
			<h3><?php echo __('Related Groups');?></h3>
			<div class="btn-toolbar">
			<?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add'), array('class'=>'btn btn-mini'));?>			</div>
	<?php if (!empty($user['Group'])):?>
			<table class="table">
				<tr>
							<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Group Name'); ?></th>
		<th><?php echo __('Privacy'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('User Id'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
					<?php
		$i = 0;
		foreach ($user['Group'] as $group): ?>
		<tr>
			<td><?php echo $group['id'];?></td>
			<td><?php echo $group['group_name'];?></td>
			<td><?php echo $group['privacy'];?></td>
			<td><?php echo $group['description'];?></td>
			<td><?php echo $group['user_id'];?></td>
			<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
				<?php echo $this->Html->link(__('View'), array('controller' => 'groups', 'action' => 'view', $group['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'groups', 'action' => 'edit', $group['id']), array('class' => 'btn btn-mini')); ?>
				</div>
				<div class="btn-group">
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'groups', 'action' => 'delete', $group['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $group['id'])); ?>
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
			<h3><?php echo __('Related Places');?></h3>
			<div class="btn-toolbar">
			<?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add'), array('class'=>'btn btn-mini'));?>			</div>
	<?php if (!empty($user['Place'])):?>
			<table class="table">
				<tr>
							<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Time Added'); ?></th>
		<th><?php echo __('Icon'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Fbid'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
					<?php
		$i = 0;
		foreach ($user['Place'] as $place): ?>
		<tr>
			<td><?php echo $place['id'];?></td>
			<td><?php echo $place['location'];?></td>
			<td><?php echo $place['name'];?></td>
			<td><?php echo $place['description'];?></td>
			<td><?php echo $place['user_id'];?></td>
			<td><?php echo $place['time_added'];?></td>
			<td><?php echo $place['icon'];?></td>
			<td><?php echo $place['url'];?></td>
			<td><?php echo $place['fbid'];?></td>
			<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
				<?php echo $this->Html->link(__('View'), array('controller' => 'places', 'action' => 'view', $place['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'places', 'action' => 'edit', $place['id']), array('class' => 'btn btn-mini')); ?>
				</div>
				<div class="btn-group">
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'places', 'action' => 'delete', $place['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $place['id'])); ?>
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
			<h3><?php echo __('Related Rankings');?></h3>
			<div class="btn-toolbar">
			<?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add'), array('class'=>'btn btn-mini'));?>			</div>
	<?php if (!empty($user['Ranking'])):?>
			<table class="table">
				<tr>
							<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Places Id'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Review'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
					<?php
		$i = 0;
		foreach ($user['Ranking'] as $ranking): ?>
		<tr>
			<td><?php echo $ranking['id'];?></td>
			<td><?php echo $ranking['user_id'];?></td>
			<td><?php echo $ranking['places_id'];?></td>
			<td><?php echo $ranking['rating'];?></td>
			<td><?php echo $ranking['review'];?></td>
			<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rankings', 'action' => 'view', $ranking['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rankings', 'action' => 'edit', $ranking['id']), array('class' => 'btn btn-mini')); ?>
				</div>
				<div class="btn-group">
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'rankings', 'action' => 'delete', $ranking['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $ranking['id'])); ?>
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
			<h3><?php echo __('Related User Exercises');?></h3>
			<div class="btn-toolbar">
			<?php echo $this->Html->link(__('New User Exercise'), array('controller' => 'user_exercises', 'action' => 'add'), array('class'=>'btn btn-mini'));?>			</div>
	<?php if (!empty($user['UserExercise'])):?>
			<table class="table">
				<tr>
							<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Exercises Id'); ?></th>
		<th><?php echo __('Ts Completed'); ?></th>
		<th><?php echo __('Duration'); ?></th>
		<th><?php echo __('Amount'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
					<?php
		$i = 0;
		foreach ($user['UserExercise'] as $userExercise): ?>
		<tr>
			<td><?php echo $userExercise['id'];?></td>
			<td><?php echo $userExercise['user_id'];?></td>
			<td><?php echo $userExercise['exercises_id'];?></td>
			<td><?php echo $userExercise['ts_completed'];?></td>
			<td><?php echo $userExercise['duration'];?></td>
			<td><?php echo $userExercise['amount'];?></td>
			<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_exercises', 'action' => 'view', $userExercise['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_exercises', 'action' => 'edit', $userExercise['id']), array('class' => 'btn btn-mini')); ?>
				</div>
				<div class="btn-group">
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'user_exercises', 'action' => 'delete', $userExercise['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $userExercise['id'])); ?>
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
			<h3><?php echo __('Related User Milestones');?></h3>
			<div class="btn-toolbar">
			<?php echo $this->Html->link(__('New User Milestone'), array('controller' => 'user_milestones', 'action' => 'add'), array('class'=>'btn btn-mini'));?>			</div>
	<?php if (!empty($user['UserMilestone'])):?>
			<table class="table">
				<tr>
							<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Milestones Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
					<?php
		$i = 0;
		foreach ($user['UserMilestone'] as $userMilestone): ?>
		<tr>
			<td><?php echo $userMilestone['id'];?></td>
			<td><?php echo $userMilestone['user_id'];?></td>
			<td><?php echo $userMilestone['milestones_id'];?></td>
			<td><?php echo $userMilestone['date'];?></td>
			<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_milestones', 'action' => 'view', $userMilestone['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_milestones', 'action' => 'edit', $userMilestone['id']), array('class' => 'btn btn-mini')); ?>
				</div>
				<div class="btn-group">
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'user_milestones', 'action' => 'delete', $userMilestone['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $userMilestone['id'])); ?>
				</div>
			</div>
			</td>
		</tr>
	<?php endforeach; ?>
			</table>
	<?php endif; ?>

		</div>
	</div>
