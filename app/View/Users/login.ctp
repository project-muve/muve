<?php $this->Html->css('login'); ?>
<div class="row">

<div class="col-lg-6 col-lg-offset-3">

<h2>Login</h2>

<div class="well">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
       
       <div class="form-group">

		<label for="inputEmail3" class="col-sm-2 control-label"> 			Username:</label>
        <div class="col-sm-10">
        
        <?php echo $this->Form->input('username'); ?>
        
          </div>
          </div>
                          
      <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Password:</label>
                            <div class="col-sm-10">

      <?php echo $this->Form->input('password'); ?>
     </div>
     </div>
     
     <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
     
  <?php echo $this->Form->submit('Login',array('class'=>'btn btn-primary'))?>
</div>
</div>
 
 
<?php echo $this->Form->end(__('Login')); ?>
  </div>
  </div>
  </div>
