<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<?php
		echo $this->Html->meta('icon');

//		echo $this->Html->css('cake.generic');
		echo $this->Html->css(array('style','bootstrap','bootstrap-responsive'));
		echo $this->Html->script(array('bootstrap.min'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
</head>
<body>
<?php echo $this->element('FacebookSDK'); ?>
 <div class="mubar_wrapper hidden-phone">
<div class="container">	
<div class="mulogoleft">
<a href="http://www.missouri.edu">
<?php echo $this->Html->image('mu_topbar_mainlogo_clear.png', array('alt' => 'University of Missouri')); ?>
</a>
</div>
	<div class="mulogo_right" style="float:right"> <a href="http://msa.missouri.edu"><img src="http://muve.missouri.edu/wp-content/plugins/sl-title-bar/mu_topbar_msa_clear.png" alt="MSA/GPC Sponsored" border="0"></a><a href="http://mizzoulife.missouri.edu"><img src="http://muve.missouri.edu/wp-content/plugins/sl-title-bar/mu_topbar_mizzoulife_clear.png" alt="" border="0"></a></div></div></div>

	<div class="container-fluid">
<div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link($this->Html->image('MUVE-title.png', array('alt' => 'MUve')),array('controller' =>'pages','action'=>'display','home'),array('class'=>'brand','escape' => false)); ?>

          </a>
          <div class="nav-collapse collapse">
            


            <ul class="nav">
<?php $this->startIfEmpty('navbar'); ?>
<li><?php echo $this->Html->link('Home',array('controller' =>'pages','action'=>'display','home')); ?></li>
<li><?php echo $this->Html->link('Exercise Log',array('controller' =>'user_exercises','action'=>'index')); ?></li>
<li><a href="/index.php/articles/">Articles</a></li>
<li><?php echo $this->Html->link('MUVE Tools',array('controller' =>'MuveTools','action'=>'index')); ?></li>
<li><?php echo $this->Html->link('Places to MUVE',array('controller' =>'places','action'=>'index')); ?></li>
<li><?php echo $this->Html->link('MyCollegeKitchen', array('controller' => 'pages', 'action' => 'display')); ?></li>
<?php $this->end(); ?>
              <?php echo $this->fetch('navbar'); ?>
            </ul>
          </div><!--/.nav-collapse -->
                        <?php echo $this->element('UserMenu'); ?>
                        
        </div>
      </div>
    </div>

<div class="row-fluid" id="flash-container">
<div class="span12" id="flash">

			<?php echo $this->Session->flash(); ?>
</div>
</div>
<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer-wrapper" class="row-fluid">
			<footer id="footer" class="span12">
				<p class="text-center">Copyright &copy; <?php echo date("Y"); ?> - Curators of the <a href="http://www.umsystem.edu" target="_blank">University of Missouri</a>.                All rights reserved. <a href="http://www.umsystem.edu/ums/copyright/" target="_blank">DMCA</a> and <a href="http://www.missouri.edu/copyright.php" target="_blank">other copyright information</a>.  An <a href="http://www.missouri.edu/eeo-aa.php" target="_blank">equal opportunity/affirmative action</a> institution.</p>
			</footer>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
