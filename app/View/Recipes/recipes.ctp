 <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="images/carousel/swimming.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>MU Values Exercise and Eating Well</h1>
              <p class="lead"> Live your healthiest life by engaging in physical activity and learning how to eat well! Brought to you by the Wellness Resource Center.</p>
              <a class="btn btn-large btn-primary" href="#">Learn More</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/carousel/running.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>5K Training Plan</h1>
              <p class="lead">Haven’t exercised in a while? Don’t know where to begin? We have the perfect tool for you! This 5k training plan will help you go from the couch to running a 5k in no time!</p>
              <a class="btn btn-large btn-primary" href="#">Learn more</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/carousel/cycling.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Browse gallery</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="images/carousel/vegetables.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Fresh Summer Fun</h1>
              <p class="lead">It’s warm out, the sun is shining, time to get outside! Why not walk to your local Farmer’s Market and enjoy some fresh produce? Whether you are seeking a bouquet of fresh flowers, a handmade craft or just some time outdoors your farmer’s market is certain to be a great experience!</p>
              <a class="btn btn-large btn-primary" href="#">Find Your Market</a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
    </div>
	
	  <div class="container marketing">

		<?php echo $this->Html->link('Add Recipe', array('action' => 'add')); ?>
		<table>	
			<tr>	
				<th>Recipe</th>
				<th>Ingredients</th>
				<th>Serves</th>
				<th>Cost</th>
			</tr>
			<?php foreach ($recipes as $recipe): ?>
			<tr>
				<td><?php echo $post['Recipe']['id']; ?></td>
				<td>
					<?php echo $this->Html->link($recipe['Recipe']['recipe'], array('action' => 'view', $recipe['Recipe']['id'])); ?>
				</td>
				<td>
            <?php
                echo $this->Form->recipeLink(
                    'Delete',
                    array('action' => 'delete', $recipe['Recipe']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $recipe['Recipe']['id'])
                );
            ?>
        </td>
			 <td>
            <?php echo $recipe['Recipe']['created']; ?>
			</td>
		</tr>
			<?php endforeach; ?>
	</table>
		</div>
<script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>