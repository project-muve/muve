<div class="places row">
<div class="actions span2">
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>

		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
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
  placeMarker = new google.maps.Marker({
    position: new google.maps.LatLng(<?php echo $place['Place']['latitude']; ?>, <?php echo $place['Place']['longitude']; ?>),
    title:"<?php echo $place['Place']['name']; ?>"
});
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
	jsn.on("change", function(res) { placeMarker.setIcon('<?php echo $this->webroot; ?>img/markers/' + $('select[name="data[Place][icon]"]').val());});
}
$(function(){populateIcons();});
 </script>
<div style="width:100%; height:600px;" id="map-canvas"></div>
</div>
<div class="places span4">
<?php echo $this->Form->create('Place', array('class' => 'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Place'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('address');
		echo $this->Form->hidden('latitude');
		echo $this->Form->hidden('longitude');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		//echo $this->Form->input('icon');
		echo '<div id="PlaceMarkers"></div>';
		echo $this->Form->input('url');
		echo $this->Form->input('fbid');
	?>
		<div class="form-actions">
<?php echo $this->Form->submit(__('Submit'),array('class'=>'btn btn-primary','div'=>false));?>
<?php echo $this->Html->link(__('Cancel'),array('controller' => 'users', 'action' => 'index'),array('class'=>'btn btn-cancel'));?>
		</div>
		</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>