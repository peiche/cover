<?php
/**
 * @package Cover
 */
?>

<?php
	$has_thumbnail = false;
	if ('' != get_the_post_thumbnail()) {
		$has_thumbnail = true;
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	}
?>

<div class="cover featured-image auto">
	<div class="background" <?php if ($has_thumbnail) { ?>style="background-image: url('<?php echo $img[0]; ?>');"<?php } ?>></div>
	<header>
		<?php echo cover_get_link_in_content(); ?>
	</header>
</div>
