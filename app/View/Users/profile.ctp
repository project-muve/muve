<div class="container">
<h1>My Profile</h1>

<div class="well">
	<div class="row-fluid">
		<div class="span3">
			<img class="thumbnail" src="http://placehold.it/150x150" />
		</div>
		<div class="span9">
			<p><strong>My Name: </strong><?php echo $user['User']['fullName']; ?></p>
			<p><strong>My Email: </strong><?php echo $user['User']['email']; ?></p>
		</div>
	</div>
</div>

<h2>My Groups</h2>
<div class="row-fluid">
<?php
if (sizeof($user['Group'])):
	foreach ($user['Group'] as $group): ?>
	<div class="span3">

		<h3><?php echo $this->Html->link($group['name'], array('controller' => 'groups', 'action' => 'view', $group['id'])); ?></h3>
<img class="thumbnail" src="http://placehold.it/150x150" />
		<td><?php echo $group['description'];?></td>

	</div>
<?php 
endforeach; 
else:
?>

<div class="alert alert-info">
<h3>You're not in any groups</h3>
<p>Why don't you take a look at one of the many groups on campus? You could even start your own!</p>
</div>

<?php endif; ?>

<p class="text-right"><?php echo $this->Html->link(__('Start a Group'), array('controller' => 'groups', 'action' => 'add')); ?> </p>
</div>
<h2>My Log</h2>
<?php if (sizeof($user['UserExercise'])): ?>

		<?php foreach ($user['UserExercise'] as $userExercise): ?>
		<div class="media">
			<a href="#" class="pull-left" >
				<img class="media-object" src="http://placehold.it/45x45" />
			</a>
			<div class="media-body">
			<h3 class="media-heading"><?php echo $userExercise['Exercise']['title']; ?></h3>
			<p class="pull-left"><strong><?php echo $this->Time->nice($userExercise['ts_completed']);?></strong><br /><?php echo $userExercise['amount'];?> <?php echo $userExercise['Exercise']['units'];?></p>
			<p class="pull-right">
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_exercises', 'action' => 'edit', $userExercise['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'user_exercises', 'action' => 'delete', $userExercise['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $userExercise['id'])); ?>
			</p>
		</div>
	</div>
	<?php endforeach; ?>

<?php else: ?>

<div class="alert alert-info">
<h3>You haven't MUVEd</h3>
<p>Get up and move, log your exercise <?php echo $this->Html->link('here', array('controller' => 'user_exercises', 'action' => 'add')); ?> </p>
</div>
	
<?php endif; ?>
<p class="text-right"><?php echo $this->Html->link('Add to your log', array('controller' => 'user_exercises', 'action' => 'add')); ?> </p>
</div>
