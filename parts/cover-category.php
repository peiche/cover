<?php
/**
 * @package Cover
 */
?>

<?php $count = 0; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php if ($count == 0) { ?>

		<div class="cover featured-image auto">
			<?php if ('' != get_the_post_thumbnail()) { ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<?php } ?>
			<div class="background<?php if ('' != get_the_post_thumbnail()) { ?> darken" style="background-image: url('<?php echo $image[0]; ?>');<?php } ?>"></div>
			<header>
				<h2><?php echo single_cat_title(); ?></h2>
				<?php
					// Show term description if it exists.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header>
		</div>

	<?php } ?>
	<?php $count++; ?>
<?php endwhile; ?><!-- end of loop -->