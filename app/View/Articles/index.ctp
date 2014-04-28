<div class="articles index row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('New Article'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="span10">
	<h2><?php echo __('Articles');?></h2>
	<table class="table table-condensed" style="white-space:nowrap;">
	<tr>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('ts_posted');?></th>
			<th><?php echo $this->Paginator->sort('ts_updated');?></th>
			<th>Tags</th>
			
	</tr>
	<?php
	foreach ($articles as $article): ?>

	<tr>
		<td>
			<?php echo $this->Html->link($article['User']['f_name'] . ' ' . $article['User']['l_name'], array('controller' => 'users', 'action' => 'view', $article['User']['id'])); ?>
		</td>
		<td><?php echo h($article['Article']['title']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $article['Article']['title']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $article['Article']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $article['Article']['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?>
				</div>
			</div>
		</td>
		<td><?php echo strip_tags($article['Article']['description']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['ts_posted']); ?>&nbsp;</td>
		<td><?php echo h($article['Article']['ts_updated']); ?>&nbsp;</td>
		<td>
		<?php foreach($article['ArticleTag'] as $tag): ?>
		<span class="label"><?php echo $tag['tag']; ?></span><br />
		<?php endforeach; ?>

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

