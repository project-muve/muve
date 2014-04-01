<div class="places index row">
<div class="actions span2">
	<ul class="nav nav-list">
		<li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="span10">
	<h2><?php echo __('Places');?></h2>
<?php echo $this->Html->script("https://maps.googleapis.com/maps/api/js?key=AIzaSyBwxMvAjSNp_bm-k_YHDTvaCWvgjqqLL0M&sensor=true",array('inline'=>false));
echo $this->Html->script("places",array('inline'=>false));  
?>

<div style="width:600px;height:600px;" id="map-canvas"></div>
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

	<table class="table table-condensed" style="white-space:nowrap;">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('address');?></th>
			<th><?php echo $this->Paginator->sort('latitude');?></th>
			<th><?php echo $this->Paginator->sort('longitude');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('time_added');?></th>
			<th><?php echo $this->Paginator->sort('icon');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('fbid');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($places as $place): ?>
	<tr>
		<td><?php echo h($place['Place']['id']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['address']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['latitude']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['longitude']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['name']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($place['User']['id'], array('controller' => 'users', 'action' => 'view', $place['User']['id'])); ?>
		</td>
		<td><?php echo h($place['Place']['time_added']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['icon']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['url']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['fbid']); ?>&nbsp;</td>
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
    <div class="well">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</div>

	<div class="paging btn-group">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array('class' => 'prev btn'), null, array('class' => 'prev disabled btn'));
		echo $this->Paginator->numbers(array('separator' => '', 'class' => 'btn', 'currentClass' => 'active'));
		echo $this->Paginator->next(__('next') . ' >', array('class' => 'next btn'), null, array('class' => 'next disabled btn'));
	?>
	</div>
</div>
</div>

