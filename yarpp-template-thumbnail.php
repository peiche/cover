<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<?php if (have_posts()) { ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="related-post<?php if ( '' != get_the_post_thumbnail()) { ?> featured-image<?php } ?>">
			<a class="cover-link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"></a>
			<?php
				if ( '' != get_the_post_thumbnail()) {
					$image_arr = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					$image = $image_arr[0];
				}
			?>
			<div class="related-cover" <?php if ( '' != get_the_post_thumbnail()) { ?>style="background-image: url('<?php echo $image; ?>');"<?php } ?>></div>
			<div class="related-title">
				<h2>Related</h2>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			</div>
		</div>
	<?php endwhile; ?>
<?php } ?>