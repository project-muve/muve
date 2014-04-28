<?php 

$articles = $this->requestAction('articles/lastpost/3');
?>
 
<h4 style="color:#F1B82D;">Recent posts:</h3>
 
<ul>
<?php foreach($articles as $article): ?>
	<li style="list-style-type:upper-roman;"><i><?php echo $this->Html->link($article['Article']['title'], array('controller' => 'articles' , 'action' => 'view', $article['Article']['title'])); ?>	</i></li>
<?php endforeach; ?>
</ul>

