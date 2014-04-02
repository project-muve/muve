<h1>Register<h1>
<?php
	echo $form->create('User', array('action' => 'register'));
	echo $form->input('Username');
	echo $form->input('Password', array('type' => 'password'));
	echo $form->input('Password_Confirm', array('type' => 'password'));
	echo $form->submit('Register');
	echo $form->end('Register');
?>
