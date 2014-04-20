

<div class="row-fluid">

<div class="span4 offset4">

<h2 class="loginHeader">Reset your Password</h2>

<div class="well">
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

        <?php echo $this->Form->input('username'); ?>





	

<?php echo $this->Form->end(array('label'=>__('Login'),'div'=>'form-actions','class'=>'btn btn-primary')); ?>
<div class="row-fluid">

<div class="span6">
<?php echo $this->Html-> link( 'Register', array( 'controller' => 'users', 'action' => 'register' ) ,array('class'=>'btn-link')); ?>
</div>
<div class="span6">
	<?php echo $this->Html-> link( 'Forgot your Password?', array( 'controller' => 'users', 'action' => 'password' ),array('class'=>'btn-link') ); ?>
</div>
  </div>
  </div>

  </div>
  </div>
