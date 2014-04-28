<?php if (isset($userData[ 'admin_level']) && $userData['admin_level']>0): ?> 
<ul class="nav pull-right">
	
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				Administration
				<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
					<li>
						<?php echo $this->Html-> link( 'Edit Users', array( 'controller' => 'users', 'action' => 'index' ) ); ?>
					</li>
					<li>
<?php echo $this->Html-> link( 'Edit Articles', array( 'controller' => 'articles', 'action' => 'index' ) ); ?>
					</li>
			</ul>
		</li>
	
</ul>
<?php endif; ?>