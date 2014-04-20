

<div class="users row-fluid">
<div class="users span4 offset4">

<h2 class="loginHeader">Change your Password</h2>


<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 
'inputDefaults'=>array(
	'div'=>'control-group',
	'label'=>array('class'=>'control-label'),
	'between'=>'<div class="controls">',
	'after'=>'</div>',
	'error' => array(
        'attributes' => array('wrap' => 'p', 'class' => 'text-error')
    )))); ?>

		<?php echo $this->Form->input('password');
		echo $this->Form->input('password2',array('label'=>array('class'=>'control-label','text'=>'Confirm Password'),'type'=>'password'));
		echo $this->Form->hidden('key',array('value'=>$key)); ?>




	

<?php echo $this->Form->end(array('label'=>__('Change Password'),'div'=>'form-actions','class'=>'btn btn-primary')); ?>



  </div>
  </div>
