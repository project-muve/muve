<?php
echo $this->Html->css(choicePage);
?>

<div id="choiceLeft">
<?php
	echo $this->Html->image("cardioChoice.jpg", array(
    "alt" => "Cardio Logs",
    'url' => array('controller' => 'WorkoutLogs', 'action' => 'view', addCardio)
));
?>
</div>

<div id="choiceright">
<?php
	echo $this->Html->image("weightliftingChoice.jpg", array(
    "alt" => "Weightlifting Logs",
    'url' => array('controller' => 'WorkoutLogs', 'action' => 'view', addWeightlifting)
));
?>
</div>
