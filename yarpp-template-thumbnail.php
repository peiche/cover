<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>

<?php $related_counter = 0; ?>
<div id="related" class="swiper-container">
	<div class="swiper-wrapper">

		<?php if (have_posts()) { ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="swiper-slide related-post<?php if ( '' != get_the_post_thumbnail()) { ?> featured-image<?php } ?>">
					<a class="cover-link" href="<?php the_permalink() ?>"></a>
					<?php
						if ( '' != get_the_post_thumbnail()) {
							$image_arr = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
							$image = $image_arr[0];
						}
					?>
					<div class="related-cover" <?php if ( '' != get_the_post_thumbnail()) { ?>style="background-image: url('<?php echo $image; ?>');"<?php } ?>></div>
					<div class="related-title">
						<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					</div>
				</div>
				<?php $related_counter++; ?>
			<?php endwhile; ?>
		<?php } ?>
		
	</div>

	<?php if ($related_counter > 1) { ?>
		<span id="related-left" class="fa fa-angle-left fa-fw"></span>
		<span id="related-right" class="fa fa-angle-right fa-fw"></span>
	<?php } ?>

</div>