<div class="placeRankings index row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('New Place Ranking'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Places'), array('controller' => 'places', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="span10">
	<h2><?php echo __('Place Rankings');?></h2>
	<table class="table table-condensed" style="white-space:nowrap;">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('places_id');?></th>
			<th><?php echo $this->Paginator->sort('rating');?></th>
			<th><?php echo $this->Paginator->sort('review');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($placeRankings as $placeRanking): ?>
	<tr>
		<td><?php echo h($placeRanking['PlaceRanking']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($placeRanking['User']['id'], array('controller' => 'users', 'action' => 'view', $placeRanking['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($placeRanking['Places']['name'], array('controller' => 'places', 'action' => 'view', $placeRanking['Places']['id'])); ?>
		</td>
		<td><?php echo h($placeRanking['PlaceRanking']['rating']); ?>&nbsp;</td>
		<td><?php echo h($placeRanking['PlaceRanking']['review']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $placeRanking['PlaceRanking']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $placeRanking['PlaceRanking']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $placeRanking['PlaceRanking']['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $placeRanking['PlaceRanking']['id'])); ?>
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

