<div class="articleTags view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit Article Tag'), array('action' => 'edit', $articleTag['ArticleTag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Article Tag'), array('action' => 'delete', $articleTag['ArticleTag']['id']), null, __('Are you sure you want to delete # %s?', $articleTag['ArticleTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Article Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articles'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Article Tag');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($articleTag['ArticleTag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Articles'); ?></dt>
		<dd>
			<?php echo $this->Html->link($articleTag['Articles']['title'], array('controller' => 'articles', 'action' => 'view', $articleTag['Articles']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo h($articleTag['ArticleTag']['tag']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
