<?php $banners =  $this->requestAction('banners/display'); ?>
 
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
	<?php
	$i=0;
	foreach ($banners as $banner): ?>
        <div class="item <?php if ($i==0) { echo 'active'; } ?>">
          <?php echo $this->Html->image("banners/"  . $banner['Banner']['image'],array('alt'=>$banner['Banner']['title'])); ?>
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo h($banner['Banner']['title']); ?></h1>
              <p class="lead"><?php echo h($banner['Banner']['text']); ?></p>
		    <?php echo $this->Html->link($banner['Banner']['link_text'],$banner['Banner']['link_url'],array('class'=>'btn btn-large btn-primary')); ?>
            </div>
          </div>
        </div>

<?php $i++; endforeach; ?>

      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&laquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&raquo;</a>
    </div><!-- /.carousel -->