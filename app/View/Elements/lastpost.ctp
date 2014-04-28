<?php 

$articles = $this->requestAction('articles/lastpost/3');
?>
 
<h3>Our latest posts:</h3>
 
<ul>
<?php foreach($articles as $article): ?>
	<li><i><?php echo $this->Html->link($article['Article']['title'], array('controller' => 'articles' , 'action' => 'view', $article['Article']['title'])); ?>	</i></li>
<?php endforeach; ?>
</ul>

