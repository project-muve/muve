<?php
echo $this->Html->css('jquery.datetimepicker');
echo $this->Html->script('jquery.datetimepicker.js');
?>
<div class="userExercises row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('My Log'), array('controller'=>'users','action' => 'profile'));?></li>
	</ul>
</div>
<?php echo $this->Html->css('form'); ?>
<div class="userExercises span10">
<?php echo $this->Form->create('UserExercise', array('class' => 'form-container'));?>

		<h2>Complete your Exercise Log!</h2>
	<fieldset>
	<?php
		if ($userData['admin_level'] & PERMISSION_EXERCISES)
		{
			echo $this->Form->input('user_id', array('class' => 'form-field','default'=>$userData['id']));
		}
		echo $this->Form->input('exercise_id', array('class' => 'form-field','empty'=>true,'required'=>true));
		echo $this->Form->input('ts_completed', array('class' => 'form-field','type'=>'text','label'=>array('class'=>'control-label','text'=>'When')));
		echo $this->Form->input('duration', array('class' => 'form-field','type'=>'text','label'=>array('class'=>'control-label','text'=>'Duration (Hours:Minutes)')));
		echo $this->Form->input('amount', array('class' => 'form-field'));
	?>
		<div class="submit-container">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'submit-button','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'exercises', 'action' => 'index'),array('class'=>'submit-button'));?>
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
