<?php
echo $this->Html->css('jquery.datetimepicker');
echo $this->Html->script('jquery.datetimepicker.js');
?>

<div class="userExercises row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserExercise.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UserExercise.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Exercises'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercises'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="userExercises span10">
<?php echo $this->Form->create('UserExercise', array('class' => 'form-horizontal','inputDefaults'=>array('div'=>'control-group','label'=>array('class'=>'control-label'),'error' => array(
'attributes' => array('wrap' => 'p', 'class' => 'text-error')
))));?>
	<fieldset>
		<legend><?php echo __('Edit User Exercise'); ?></legend>
	<?php
		echo $this->Form->input('id');
		if ($userData['admin_level'] & PERMISSION_EXERCISES)
		{
			echo $this->Form->input('user_id', array('class' => 'form-field','default'=>$userData['id']));
		}
		echo $this->Form->input('exercise_id', array('class' => 'form-field','empty'=>true,'required'=>true));
		echo $this->Form->input('ts_completed', array('class' => 'form-field','type'=>'text','label'=>array('class'=>'control-label','text'=>'When')));
		echo $this->Form->input('duration', array('class' => 'form-field','type'=>'text','label'=>array('class'=>'control-label','text'=>'Duration (Hours:Minutes)')));
		echo $this->Form->input('amount', array('class' => 'form-field'));
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'exercises', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>
<script>
var exercises = <?php echo json_encode($exerciseData); ?>;
$(function() {
$('#UserExerciseTsCompleted').datetimepicker({format:'Y-m-d H:i:s'});

});
$('#UserExerciseExerciseId').change(function(){$('label[for="UserExerciseAmount"]').text('Amount (' + exercises[$('#UserExerciseExerciseId').val()]['units'] + ')');});
</script>