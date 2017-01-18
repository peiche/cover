<?php
/**
 * YARPP Template: Cover Inline List
 *
 * Description: Related posts template built for the Cover theme. Displays related posts as a comma-separated list.
 * @link https://wordpress.org/themes/cover/
 * Author: Paul Eiche
 */
?>

<h2 class="yarpp-header">Related</h2>

<div class="yarpp-container">
	<?php if ( have_posts() ) :
		$posts_array = array();
		while ( have_posts() ) : the_post();
			$posts_array[] = '<a href="'.get_permalink().'" rel="bookmark">' . get_the_title() . '</a>';
		endwhile;

	echo '<p>';
	echo implode( ', ' . "\n", $posts_array ); // Print out a list of the related items, separated by commas.
	echo '</p>';

	else : ?>

	<p>No related posts.</p>
	<?php endif; ?>
</div>
