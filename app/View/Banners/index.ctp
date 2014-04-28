<div class="banners index row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('New Banner'), array('action' => 'add')); ?></li>
	</ul>
</div>
<div class="span10">
	<h2><?php echo __('Banners');?></h2>
	<div class="thumbnails">
	<?php
	foreach ($banners as $banner): ?>
	<div class="thumbnail span4">
<h4><?php echo h($banner['Banner']['title']); ?>&nbsp;</h4>
<?php echo $this->Html->image("banners/"  . $banner['Banner']['image'],array('alt'=>$banner['Banner']['title'])); ?>
		
		<p><strong>Caption</strong><br /><?php echo h($banner['Banner']['text']); ?>&nbsp;</p>
		<p><strong>Link Text</strong><br /><?php echo h($banner['Banner']['link_text']); ?>&nbsp;</p>
		<p><strong>Link URL</strong><br /><?php echo h($banner['Banner']['link_url']); ?>&nbsp;</p>
		<p><strong>Published</strong><br /><?php echo ($banner['Banner']['published']) ? 'Yes':'No'; ?>&nbsp;</p>

			<div class="btn-toolbar">
				<div class="btn-group">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $banner['Banner']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $banner['Banner']['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $banner['Banner']['id'])); ?>
				</div>
			</div>

	</div>
<?php endforeach; ?>
</div>

	<div class="paging btn-group">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array('class' => 'prev btn'), null, array('class' => 'prev disabled btn'));
		echo $this->Paginator->numbers(array('separator' => '', 'class' => 'btn', 'currentClass' => 'active'));
		echo $this->Paginator->next(__('next') . ' >', array('class' => 'next btn'), null, array('class' => 'next disabled btn'));
	?>
	</div>
</div>
</div>

