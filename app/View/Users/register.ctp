<?php $this->Html->css(array('form','login')); ?>

<div class="users row-fluid">
<div class="users span4 offset4">
<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 
'inputDefaults'=>array(
	'div'=>'control-group',
	'label'=>array('class'=>'control-label'),
	'between'=>'<div class="controls">',
	'after'=>'</div>',
	'error' => array(
        'attributes' => array('wrap' => 'p', 'class' => 'text-error')
    )))); ?>
	<h2 class="loginHeader">Register!</h2>
	<fieldset>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('password2',array('label'=>'Confirm Password','type'=>'password'));
		echo $this->Form->input('f_name',array('label'=>'First Name'));
		echo $this->Form->input('l_name',array('label'=>'Last Name'));
		echo $this->Form->input('okay_email',array('label'=>'May we send you promotional emails about MUVE and The Wellness Center?'));
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Register'),array('class'=>'submit-button','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'groups', 'action' => 'index'),array('class'=>'submit-button'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>
 
