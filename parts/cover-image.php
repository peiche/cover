<?php
/**
 * @package Cover
 */
?>

<?php
	$has_image = false;
	if ('' != get_the_post_thumbnail()) {
		$has_image = true;
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	}
?>
	
<div class="cover featured-image">
	<div class="background" <?php if ( $has_image ) { ?>style="background-image: url('<?php echo $img[0]; ?>');"<?php } ?>></div>
	<header>
		<div class="header-content"><?php the_content(); ?></div>
	</header>
</div>