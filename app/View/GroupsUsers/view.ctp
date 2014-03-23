<div class="groupsUsers view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit Groups User'), array('action' => 'edit', $groupsUser['GroupsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Groups User'), array('action' => 'delete', $groupsUser['GroupsUser']['id']), null, __('Are you sure you want to delete # %s?', $groupsUser['GroupsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groups User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Groups User');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($groupsUser['GroupsUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupsUser['User']['id'], array('controller' => 'users', 'action' => 'view', $groupsUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupsUser['Group']['id'], array('controller' => 'groups', 'action' => 'view', $groupsUser['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Join Date'); ?></dt>
		<dd>
			<?php echo h($groupsUser['GroupsUser']['join_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Admin'); ?></dt>
		<dd>
			<?php echo h($groupsUser['GroupsUser']['is_admin']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
