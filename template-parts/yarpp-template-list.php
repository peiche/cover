<?php
/*
YARPP Template: Cover Inline List
Description: Related posts template built for the Cover theme. Displays related posts as a comma-separated list.
@link https://wordpress.org/themes/cover/
Author: Paul Eiche
*/
?>
<h2 class="yarpp-header">Related</h2>

<div class="yarpp-container">
	<?php if (have_posts()):
		$postsArray = array();
		while (have_posts()) : the_post();
			$postsArray[] = '<a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a>';
		endwhile;

	echo '<p>';
	echo implode(', '."\n",$postsArray); // print out a list of the related items, separated by commas
	echo '</p>';

	else:?>

	<p>No related posts.</p>
	<?php endif; ?>
</div>
