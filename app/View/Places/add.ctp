<div class="places row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="span6">
<?php echo $this->Html->script("https://maps.googleapis.com/maps/api/js?key=AIzaSyBwxMvAjSNp_bm-k_YHDTvaCWvgjqqLL0M&sensor=true",array('inline'=>false));
echo $this->Html->script("places",array('inline'=>false));
echo $this->Html->script("jquery.dd.min",array('inline'=>false));    
echo $this->Html->css("dd",array('inline'=>false));
?>
<script>
var placeMarker;
function placeMarkers()
{
  placeMarker = new google.maps.Marker();
 placeMarker.setMap(googleMap);
}
function populateIcons() {
	var jsonData = [					
					{description:'Select a marker', value:'', text:''},	
					<?php foreach ($markers as $marker): ?>				
					{image:'<?php echo $this->webroot; ?>img/markers/<?php echo $marker; ?>', description:'<?php echo $marker; ?>', value:'<?php echo $marker; ?>', text:''},
					<?php endforeach; ?>
					];
	var jsn = $("#PlaceMarkers").msDropDown({byJson:{data:jsonData, name:'data[Place][icon]'}}).data("dd");
}
$(function(){populateIcons();});
 </script>
<div style="width:100%; height:600px;" id="map-canvas"></div>
</div>
<div class="places span4">
<?php echo $this->Form->create('Place', array('class' => 'form-horizontal'));?>
	<fieldset>
		<h2 style="color:#F1B82D;"><?php echo __('Add Place'); ?></h2>
	<?php
		echo $this->Form->input('address');
		echo $this->Form->hidden('latitude');
		echo $this->Form->hidden('longitude');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		//echo $this->Form->select('icon',$markers);
		echo '<div id="PlaceMarkers"></div>';
		echo $this->Form->input('url');
		echo $this->Form->input('fbid');
	?>
		<div class="form-actions" style="center;">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'submit-button','div'=>false));?> <br>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'users', 'action' => 'index'),array('class'=>'submit-button'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>
