<div class="muveTools view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit Muve Tool'), array('action' => 'edit', $muveTool['MuveTool']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Muve Tool'), array('action' => 'delete', $muveTool['MuveTool']['id']), null, __('Are you sure you want to delete # %s?', $muveTool['MuveTool']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Muve Tools'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Muve Tool'), array('action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Muve Tool');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($muveTool['MuveTool']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($muveTool['MuveTool']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($muveTool['MuveTool']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($muveTool['MuveTool']['url']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
