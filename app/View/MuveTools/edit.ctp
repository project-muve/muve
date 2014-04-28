<div class="muveTools row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MuveTool.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MuveTool.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Muve Tools'), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="muveTools span10">
<?php echo $this->Form->create('MuveTool', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Muve Tool'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('url');
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'submit-button','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => '', 'action' => 'index'),array('class'=>'submit-button'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>
