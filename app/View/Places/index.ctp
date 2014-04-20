<div class="places index row">
<div class="actions span2">
	<ul class="nav nav-list">
		<li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('Add New Place'), array('action' => 'add')); ?></li>
		<br><br>
		<li><?php echo $this->element('wrcFacebook'); ?></li>
	</ul>
</div>
<div class="span10">
	<h2 style="text-align: center;";><?php echo __('Places to MUve');?></h2> </br >
	<p style="text-align:center;">Displayed on the map are common places around Columbia, Missouri to be physically active.<br>
	Hover your mouse over an icon to display place name and click on icon to learn more information about that place!</p>
<?php echo $this->Html->script("https://maps.googleapis.com/maps/api/js?key=AIzaSyBwxMvAjSNp_bm-k_YHDTvaCWvgjqqLL0M&sensor=true",array('inline'=>false));
echo $this->Html->script("places",array('inline'=>false));  
?>

<div style="width:600px;height:600px;display:block;margin-left:auto;margin-right:auto;" id="map-canvas"></div>
<script>
function placeMarkers(){
var marker = [];
var infowindow = [];
<?php foreach ($places as $place): ?>


marker[<?php echo $place['Place']['id']; ?>] = new google.maps.Marker({
    position: new google.maps.LatLng(<?php echo $place['Place']['latitude']; ?>, <?php echo $place['Place']['longitude']; ?>),
    title:"<?php echo $place['Place']['name']; ?>",
    icon:"<?php echo $this->webroot . 'img/markers/' . $place['Place']['icon']; ?>"
});

// To add the marker to the map, call setMap();
marker[<?php echo $place['Place']['id']; ?>].setMap(googleMap);


   infowindow[<?php echo $place['Place']['id']; ?>] = new google.maps.InfoWindow({
      content: '<p class="lead"><?php echo $place['Place']['name']; ?></p><small class="rating">    	<?php for ($i=1;$i<=$place['Place']['aggregateRating']; $i++): ?>			<span>★</span>			<?php endfor; for ($i=$place['Place']['aggregateRating']; $i<5; $i++): ?>			<span>☆</span>			<?php endfor; ?>		</small>            <?php echo $this->Html->link("Learn More", array('action' => 'view', $place['Place']['id'])); ?>'
  });

  google.maps.event.addListener(marker[<?php echo $place['Place']['id']; ?>], 'click', function() {
    infowindow[<?php echo $place['Place']['id']; ?>].open(googleMap,marker[<?php echo $place['Place']['id']; ?>]);
  });
<?php endforeach;?>
}
</script>

	<?php echo $this->Html->css('table', array('inline' => false)); ?>
	<table class="placesTables">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('address');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($places as $place): ?>
	<tr>
		<td><?php echo h($place['Place']['name']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['address']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['description']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['url']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-toolbar">
				<div class="btn-group">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $place['Place']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $place['Place']['id']), array('class' => 'btn btn-mini')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $place['Place']['id']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $place['Place']['id'])); ?>
				</div>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
</div>

