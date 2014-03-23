<div class="rankings view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit Ranking'), array('action' => 'edit', $ranking['Ranking']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ranking'), array('action' => 'delete', $ranking['Ranking']['id']), null, __('Are you sure you want to delete # %s?', $ranking['Ranking']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Places'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Ranking');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ranking['User']['id'], array('controller' => 'users', 'action' => 'view', $ranking['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Places'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ranking['Places']['name'], array('controller' => 'places', 'action' => 'view', $ranking['Places']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['rating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Review'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['review']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
