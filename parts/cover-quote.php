<?php
/**
 * @package Cover
 */
?>

<?php
	$has_thumbnail = false;
	$half = false;
	if ('' != get_the_post_thumbnail()) {
		$has_thumbnail = true;
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$height = $img[2];
		if ($height <= 600) {
			$half = true;
		}
	}
?>

<div class="cover featured-image <?php if ($has_thumbnail && $half) { ?>half<?php } else if (!$has_thumbnail) { ?>auto<?php } ?>">
	<div class="background" <?php if ($has_thumbnail) { ?>style="background-image: url('<?php echo $img[0]; ?>');"<?php } ?>></div>
	<header>
		<h2><?php the_category(', ') ?></h2>
		<h1>
			<a href="#">
				<?php echo cover_get_blockquote_in_content(); ?>
			</a>
		</h1>
		<span><?php cover_posted_on(); ?></span>
	</header>
	<?php if ( $has_thumbnail && !$half ) { ?>
		<i class="fa fa-angle-down"></i>
	<?php } ?>
</div>
