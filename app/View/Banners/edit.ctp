<div class="banners row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Banner.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Banner.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="banners span10">
<?php echo $this->Form->create('Banner', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Banner'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('image');
		echo $this->Form->input('title');
		echo $this->Form->input('text');
		echo $this->Form->input('link_text');
		echo $this->Form->input('link_url');
		echo $this->Form->input('published');
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => '', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>