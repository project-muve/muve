<div class="groups index row-fluid">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('Start a Group'), array('action' => 'add')); ?></li>
	</ul>
</div>
<div class="span10">
	<h2><?php echo __('Groups');?></h2>
	<table class="table table-condensed" style="white-space:nowrap;">
	<tr>

			<th><?php echo $this->Paginator->sort('group_name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>

	</tr>
	<?php
	foreach ($groups as $group): ?>
	<tr>

		<td><?php echo $this->Html->link(h($group['Group']['group_name']), array('action' => 'view', $group['Group']['id'])); ?>&nbsp;</td>
		
		<td><?php echo h($group['Group']['description']); ?>&nbsp;</td>

	</tr>
<?php endforeach; ?>
	</table>
    <div class="well">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}')
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

