<div class="exercises view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit Exercise'), array('action' => 'edit', $exercise['Exercise']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Exercise'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to delete # %s?', $exercise['Exercise']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercise'), array('action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Exercise');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Units'); ?></dt>
		<dd>
			<?php echo h($exercise['Exercise']['units']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
