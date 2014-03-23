<div class="userExercises index row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('New User Exercise'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercises'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="span10">
	<h2><?php echo __('User Exercises');?></h2>
	<table class="table table-condensed" style="white-space:nowrap;">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('exercises_id');?></th>
			<th><?php echo $this->Paginator->sort('ts_completed');?></th>
			<th><?php echo $this->Paginator->sort('duration');?></th>
			<th><?php echo $this->Paginator->sort('amount');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($userExercises as $userExercise): ?>
	<tr>
		<td><?php echo h($userExercise['UserExercise']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userExercise['User']['id'], array('controller' => 'users', 'action' => 'view', $userExercise['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($userExercise['Exercises']['title'], array('controller' => 'exercises', 'action' => 'view', $userExercise['Exercises']['id'])); ?>
		</td>
		<td><?php echo h($userExercise['UserExercise']['ts_completed']); ?>&nbsp;</td>
		<td><?php echo h($userExercise['UserExercise']['duration']); ?>&nbsp;</td>
		<td><?php echo h($userExercise['UserExercise']['amount']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $userExercise['UserExercise']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userExercise['UserExercise']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userExercise['UserExercise']['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $userExercise['UserExercise']['id'])); ?>
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

