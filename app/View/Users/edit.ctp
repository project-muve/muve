
<div class="users row-fluid">
	<div class="users span8">
<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 
'inputDefaults'=>array(
	'div'=>'control-group',
	'label'=>array('class'=>'control-label'),
	'between'=>'<div class="controls">',
	'after'=>'</div>',
	'error' => array(
        'attributes' => array('wrap' => 'p', 'class' => 'text-error')
    )))); ?>
		<fieldset>
			<legend><?php echo __('Edit User'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('email');
			echo $this->Form->input('password',array('value'=>'','required'=>false));
			echo $this->Form->input('password2',array('required'=>false,'label'=>array('class'=>'control-label','text'=>'Confirm Password'),'type'=>'password'));
			echo $this->Form->input('f_name',array('label'=>array('class'=>'control-label','text'=>'First Name')));
			echo $this->Form->input('l_name',array('label'=>array('class'=>'control-label','text'=>'Last Name')));
			echo $this->Form->input('okay_email',array('label'=>array('class'=>'control-label','text'=>'May we send you promotional emails about MUVE and The Wellness Center?')));
			echo $this->Form->input('admin_level');
			echo $this->Form->input('show_prof_pic');

		?>
		</fieldset>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'groups', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>

<?php echo $this->Form->end();?>
	</div>
	<div class="users span4">
		<fieldset id="permissions">
			<legend><?php echo __('Permissions'); ?></legend>
      <label class="checkbox">
        <input type="checkbox" value="<?php echo PERMISSION_ARTICLES; ?>" <?php echo ($userData['admin_level'] & PERMISSION_ARTICLES) ? ' checked ':''; ?>> Article Manager
      </label>
	       <label class="checkbox">
        <input type="checkbox" value="<?php echo PERMISSION_USEREDIT; ?>" <?php echo ($userData['admin_level'] & PERMISSION_USEREDIT) ? ' checked ':''; ?>> User Editor
      </label>
	       <label class="checkbox">
        <input type="checkbox" value="<?php echo PERMISSION_PLACES; ?>" <?php echo ($userData['admin_level'] & PERMISSION_PLACES) ? ' checked ':''; ?>> Places 
      </label>
	       <label class="checkbox">
        <input type="checkbox" value="<?php echo PERMISSION_EXERCISES; ?>" <?php echo ($userData['admin_level'] & PERMISSION_EXERCISES) ? ' checked ':''; ?>> Exercises
      </label>
	       <label class="checkbox">
        <input type="checkbox" value="<?php echo PERMISSION_TOOLS; ?>" <?php echo ($userData['admin_level'] & PERMISSION_TOOLS) ? ' checked ':''; ?>> Tools
      </label>
</fieldset>
	</div>
</div>

<script>
$('#permissions input').change(
function() { 
var level=0;
$('#permissions input:checked').each(function(){level = level | $(this).val(); });
$('#UserAdminLevel').val(level);
});
</script>