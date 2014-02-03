<?php
/**
 * @package Beats
 */
?>

<div id="cover" class="cover featured-image auto">
	<header>
		<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
		<h2 class="align-center">Posts by <?php echo get_the_author(); ?></h2>
	</header>
</div>