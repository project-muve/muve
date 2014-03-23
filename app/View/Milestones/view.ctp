<div class="milestones view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit Milestone'), array('action' => 'edit', $milestone['Milestone']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Milestone'), array('action' => 'delete', $milestone['Milestone']['id']), null, __('Are you sure you want to delete # %s?', $milestone['Milestone']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Milestones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Milestone'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercises'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Milestone');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($milestone['Milestone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exercises'); ?></dt>
		<dd>
			<?php echo $this->Html->link($milestone['Exercises']['title'], array('controller' => 'exercises', 'action' => 'view', $milestone['Exercises']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($milestone['Milestone']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($milestone['Milestone']['text']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
