<div itemscope itemtype="http://schema.org/Place">
<div class="row-fluid"><div class="offset2">
		<h2 itemprop="name"><?php echo h($place['Place']['name']); ?></h2>
</div>
</div>
<div class="places view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('Edit Place'), array('action' => 'edit', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Place'), array('action' => 'delete', $place['Place']['id']), null, __('Are you sure you want to delete # %s?', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span7">

		<?php echo $this->Html->script("https://maps.googleapis.com/maps/api/js?key=AIzaSyBwxMvAjSNp_bm-k_YHDTvaCWvgjqqLL0M&sensor=true",array('inline'=>false));
		echo $this->Html->script("places",array('inline'=>false));  
		?>

		<div style="width:100%;height:600px;" id="map-canvas"></div>
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
		function setRating(value)
		{
			for (var i =1; i <= value; i++)
			{
				$('#ratingButton' + i).text('★');
			}
			for (var i = value+1; i <= 5; i++)
			{
			$('#ratingButton' + i).text('☆');
			}
			$('#PlaceRankingRating').val(value);
		}
		</script>
	</div>
<div class="span3">
	<h2>Average User Rating</h2>
    	<small class="rating">
    	<?php for ($i=1;$i<=$place['Place']['aggregateRating']; $i++): ?>
			<span>★</span>
			<?php endfor; for ($i=$place['Place']['aggregateRating']; $i<5; $i++): ?>
			<span>☆</span>
			<?php endfor; ?>
		</small>
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
<div class="row">
<div class="offset2 span6">
<div>

<?php 
foreach ($place['PlaceRanking'] as $ranking): ?>
<div class="media">
  <a class="pull-left" href="#">
    <img src="http://placehold.it/100x100" />
  </a>
  <div class="media-body">
    <h4 class="media-heading">
    	<?php echo $this->Html->link($ranking['User']['f_name'],array('controller'=>'users','action' => 'view', $ranking['User']['id'])); ?>
    	<small class="rating">
    	<?php for ($i=1;$i<$ranking['rating']; $i++): ?>
			<span>★</span>
			<?php endfor; for ($i=$ranking['rating']; $i<5; $i++): ?>
			<span>☆</span>
			<?php endfor; ?>
		</small>
    </h4>
    	<p><?php echo $ranking['review']; ?></p>
  </div>
</div>
<?php endforeach; ?>


<div id="RankingText"></div>
<?php if (!empty($userData)) {
    $data = $this->Js->get('#PlaceRankingRateForm')->serializeForm(array('isForm' => true, 'inline' => true));
    $this->Js->get('#PlaceRankingRateForm')->event(
          'submit',
          $this->Js->request(
            array('action' => 'rate'),
            array(
                    'update' => '#RankingText',
                    'data' => $data,
                    'async' => true,    
                    'dataExpression'=>true,
                    'method' => 'POST'
                )
            )
        );
    echo $this->Form->create('PlaceRanking', array('action' => 'rate', 'default' => false));
    echo $this->Form->hidden('PlaceRanking.place_id', array('value'=>$place['Place']['id']));
    for ($i=1; $i<=5;$i++)
    {
    	echo '<span onclick="setRating(' . $i . ')" id="ratingButton' . $i . '">☆</span>';
    }
    echo $this->Form->input('PlaceRanking.rating');
    echo $this->Form->input('PlaceRanking.review');

    echo $this->Form->end(__('Submit'));
    echo $this->Js->writeBuffer();
    }
?>
</div>
<div class="fb-comments"></div>
</div>
</div>
