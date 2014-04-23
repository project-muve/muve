<?php echo $this->Html->css('login'); ?>
<?php echo $this->Html->css('form'); ?>
<div class="row-fluid">

<div class="span4 offset4">

<h2 class="loginHeader">Login</h2>

<div class="well" style="text-align:center;">
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
       



        
        <?php echo $this->Form->input('username', array('class' => 'form-control')); ?>

        <?php echo $this->Form->input('password', array('class' => 'form-control')); ?>



	

<?php echo $this->Form->end(array('label'=>__('Login'),'div'=>'form-actions','class'=>'submit-button')); ?>
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
