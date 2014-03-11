<div style="width: 50%; float:left">
  <?php echo $this->Html->image('cardioChoice.jpg', array('alt' => 'Cardio Logs', 
   'url' => array('controller' => 'WorkoutLogs', 'action' => 'view', cardioLogs))); ?>
</div>

<div style="width: 50%; float:right">
  <?php echo $this->Html->image('weightliftingChoice.jpg', array('alt' => 'Weightlifting Logs'
   'url' => array('controller' => 'WorkoutLogs', 'action' => 'view', weightliftingLogs))); ?>
</div>