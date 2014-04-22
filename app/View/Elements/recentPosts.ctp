<h2>Recent Posts</h2>
<ul>
<?php
	$args = array( 'numberposts' => '3' );
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $articles as $article ){
		echo '<li><a href="' . get_permalink($article["id"]) . '" title="Look '.esc_attr($article["title"]).'" >' .   $article["title"].'</a> </li> ';
	}
?>
</ul>
