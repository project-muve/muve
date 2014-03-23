<div class="rankings row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Html->link(__('List Rankings'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Places'), array('controller' => 'places', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="rankings span10">
<?php echo $this->Form->create('Ranking', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Add Ranking'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('places_id');
		echo $this->Form->input('rating');
		echo $this->Form->input('review');
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'places', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>