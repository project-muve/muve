<div itemscope itemtype="http://schema.org/Place">
<div class="row-fluid"><div class="offset2">
		<h2 itemprop="name"><?php echo h($place['Place']['name']); ?></h2>
</div>
</div>
<div class="places view row-fluid">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span7">

		<?php echo $this->Html->script("https://maps.googleapis.com/maps/api/js?key=AIzaSyBwxMvAjSNp_bm-k_YHDTvaCWvgjqqLL0M&sensor=true",array('inline'=>false));
		echo $this->Html->script("places",array('inline'=>false));  
		?>

		<div style="width:100%;height:600px;" id="map-canvas"></div>
		<br />
<div class="fb-comments"></div>
		<script>
		function placeMarkers(){
		marker = new google.maps.Marker({
		    position: new google.maps.LatLng(<?php echo $place['Place']['latitude']; ?>, <?php echo $place['Place']['longitude']; ?>),
		    title:"<?php echo $place['Place']['name']; ?>",
    		icon:"<?php echo $this->webroot . 'img/markers/' . $place['Place']['icon']; ?>"
		});

		// To add the marker to the map, call setMap();
		marker.setMap(googleMap);


		   infowindow = new google.maps.InfoWindow({
		      content: '<p class="lead"><?php echo $place['Place']['name']; ?></p>'
		  });

		  google.maps.event.addListener(marker, 'click', function() {
		    infowindow.open(googleMap,marker);
		  });

		}
		</script>
	</div>
<div class="span3">

  <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
    <meta itemprop="latitude" content="	<?php echo $place['Place']['latitude']; ?>" />
    <meta itemprop="longitude" content="<?php echo $place['Place']['longitude']; ?>" />
  </div>
  <h2>Description:</h2>
  <span itemprop="description"><?php echo $place['Place']['description']; ?></span>
<hr />
  <address>
  	<h2>Address:</h2>
	<?php echo $place['Place']['address']; ?>
  </address>
  <h2>Website:</h2>
  <?php if (!empty($place['Place']['url'])){ echo $this->Html->link('Website',$place['Place']['url']); } ?>
</div>
</div>
</div>
