<ul class="nav pull-right">
	<?php if (isset($userData[ 'username'])): ?>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				Logged in as 
				<?php echo $userData['username']; ?>
				<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
					<li>
						<?php echo $this->Html-> link( 'My Profile', array( 'controller' => 'users', 'action' => 'profile' ) ); ?>
					</li>
					<li>
						<?php echo $this->Html-> link( 'Logout', array( 'controller' => 'users', 'action' => 'logout' ) ); ?>
					</li>
			</ul>
		</li>
	<?php else: ?>
		<li>
			<?php echo $this->Html-> link( 'Login', array( 'controller' => 'users', 'action' => 'login' ) ); ?>
		</li>
	<?php endif; ?>
</ul>