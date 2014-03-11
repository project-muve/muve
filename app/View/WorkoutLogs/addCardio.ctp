<h1 id="logadd">Add Workout</h1>
<?php
echo $this->Form->create('Workout-Cardio');
echo $this->Form->input('Duration');
echo $this->Form->input('Distance);
echo $this->Form->input('Date?');
echo $this->Form->end('Save Workout');
?>