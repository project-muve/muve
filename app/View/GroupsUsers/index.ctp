<div class="groupsUsers index row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('New Groups User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="span10">
	<h2><?php echo __('Groups Users');?></h2>
	<table class="table table-condensed" style="white-space:nowrap;">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('group_id');?></th>
			<th><?php echo $this->Paginator->sort('join_date');?></th>
			<th><?php echo $this->Paginator->sort('is_admin');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($groupsUsers as $groupsUser): ?>
	<tr>
		<td><?php echo h($groupsUser['GroupsUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($groupsUser['User']['id'], array('controller' => 'users', 'action' => 'view', $groupsUser['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($groupsUser['Group']['id'], array('controller' => 'groups', 'action' => 'view', $groupsUser['Group']['id'])); ?>
		</td>
		<td><?php echo h($groupsUser['GroupsUser']['join_date']); ?>&nbsp;</td>
		<td><?php echo h($groupsUser['GroupsUser']['is_admin']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $groupsUser['GroupsUser']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $groupsUser['GroupsUser']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $groupsUser['GroupsUser']['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $groupsUser['GroupsUser']['id'])); ?>
				</div>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
    <div class="well">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</div>

	<div class="paging btn-group">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array('class' => 'prev btn'), null, array('class' => 'prev disabled btn'));
		echo $this->Paginator->numbers(array('separator' => '', 'class' => 'btn', 'currentClass' => 'active'));
		echo $this->Paginator->next(__('next') . ' >', array('class' => 'next btn'), null, array('class' => 'next disabled btn'));
	?>
	</div>
</div>
</div>

