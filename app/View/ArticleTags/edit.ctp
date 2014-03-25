<div class="articleTags row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ArticleTag.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ArticleTag.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Article Tags'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Articles'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="articleTags span10">
<?php echo $this->Form->create('ArticleTag', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Article Tag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('article_id');
		echo $this->Form->input('tag');
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'articles', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>