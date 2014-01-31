<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<?php if (have_posts()) { ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php if ( '' != get_the_post_thumbnail()) { ?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<?php
					if ( '' != get_the_post_thumbnail()) {
						$image_arr = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$image = $image_arr[0];
					}
				?>
				<span class="related-cover" style="background-image: url('<?php echo $image; ?>');"></span>
				<span class="related-title">
					<h2 class="site-title">Further reading</h2>
					<h1 class="site-title"><?php the_title(); ?></h1>
				</span>
			</a>
		<?php } ?>
	<?php endwhile; ?>
<?php } ?>