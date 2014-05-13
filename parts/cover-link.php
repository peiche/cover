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

<div class="cover featured-image">
	<div class="background" <?php if ($has_thumbnail) { ?>style="background-image: url('<?php echo $img[0]; ?>');"<?php } ?>></div>
	<header>
		<h1 class="align-center">
			<?php the_title(); ?>
		</h1>
		<!--
		<span>
			<?php cover_posted_on(); ?>
		</span>
		-->
		<div class="header-content align-center">
			<?php
				$link = cover_get_link_in_content();
				echo $link[0];
			?>
		</div>
	</header>
	<i class="fa fa-angle-down"></i>
</div>
