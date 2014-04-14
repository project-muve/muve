<div class="userExercises row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Html->link(__('List User Exercises'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercises'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php echo $this->Html->css('form'); ?>
<div class="userExercises span10">
<?php echo $this->Form->create('UserExercise', array('class' => 'form-container'));?>
		<h2>Complete your Exercise Log!</h2>
	<fieldset>
	<?php

		echo $this->Form->input('exercise_id', array('class' => 'form-field'));
		echo $this->Form->input('ts_completed', array('class' => 'form-field'));
		echo $this->Form->input('duration', array('class' => 'form-field'));
		echo $this->Form->input('amount', array('class' => 'form-field'));
	?>
		<div class="submit-container">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'submit-button','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'exercises', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>
