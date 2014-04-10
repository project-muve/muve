<?php $this->Html->css('login'); ?>
<div class="row">

<div class="col-lg-6 col-lg-offset-3">

<h2 class="loginHeader">Login</h2>

<div class="well">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
       
       <div style="align:center;"class="form-group">

        <div class="col-sm-10">
        
        <?php echo $this->Form->input('username'); ?>

        <?php echo $this->Form->input('password'); ?>
        </div>
       </div>
     
<?php echo $this->Form->end(__('Login')); ?>
  </div>
  </div>
  </div>
