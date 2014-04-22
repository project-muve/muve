<?php 

$posts = $this->requestAction('articles/lastposts/4');
?>
 
<h3>Our latest posts</h3>
 
<ul>
<?php foreach($articles as $article): ?>
	<li><i><?php echo $article['Article']['id']; ?></i> : <?php echo $article['Article']['title']; ?></li>
<?php endforeach; ?>
</ul>
