<div class="userMilestones view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit User Milestone'), array('action' => 'edit', $userMilestone['UserMilestone']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Milestone'), array('action' => 'delete', $userMilestone['UserMilestone']['id']), null, __('Are you sure you want to delete # %s?', $userMilestone['UserMilestone']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Milestones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Milestone'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Milestones'), array('controller' => 'milestones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Milestones'), array('controller' => 'milestones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('User Milestone');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userMilestone['UserMilestone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userMilestone['User']['id'], array('controller' => 'users', 'action' => 'view', $userMilestone['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Milestones'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userMilestone['Milestones']['id'], array('controller' => 'milestones', 'action' => 'view', $userMilestone['Milestones']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($userMilestone['UserMilestone']['date']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
