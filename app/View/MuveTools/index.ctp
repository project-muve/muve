<div class="muveTools index row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('New Muve Tool'), array('action' => 'add')); ?></li>
	</ul>
</div>
<div class="span10">
	<h2><?php echo __('Muve Tools');?></h2>
	<dl>
	<?php
	foreach ($muveTools as $muveTool): ?>
		<dt>
			<a href="http://<?php echo h($muveTool['MuveTool']['url']); ?>" target="_blank">
			<?php echo h($muveTool['MuveTool']['title']); ?>&nbsp;</a>
		</dt>
		<dd><?php echo h($muveTool['MuveTool']['description']); ?>&nbsp;</dd>
	<?php endforeach; ?>
	</dl>
	
	<!--
	<table class="table table-condensed" style="white-space:nowrap;">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($muveTools as $muveTool): ?>
	<tr>
		<td><?php echo h($muveTool['MuveTool']['id']); ?>&nbsp;</td>
		<td><?php echo h($muveTool['MuveTool']['title']); ?>&nbsp;</td>
		<td><?php echo h($muveTool['MuveTool']['description']); ?>&nbsp;</td>
		<td><?php echo h($muveTool['MuveTool']['url']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $muveTool['MuveTool']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $muveTool['MuveTool']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $muveTool['MuveTool']['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $muveTool['MuveTool']['id'])); ?>
				</div>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	-->
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

