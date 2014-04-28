<div class="banners row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="banners span10">
<?php echo $this->Form->create('Banner', array('class' => 'form-horizontal','type'=>'file'));?>
	<fieldset>
		<legend><?php echo __('Add Banner'); ?></legend>
	<?php
		echo $this->Form->input('file',array('type'=>'file'));
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