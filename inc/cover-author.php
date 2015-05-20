<?php
/**
 * @package Cover
 */
?>

<?php $count = 0; ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php if ( 0 == $count ) { ?>

		<div class="cover">
			<?php if ( '' != get_the_post_thumbnail() ) { ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<?php } ?>
			<div class="cover-background<?php if ( '' != get_the_post_thumbnail() ) { ?> darken" style="background-image: url('<?php echo $image[0]; ?>');<?php } ?>"></div>
			<header class="cover-header">
				<?php get_template_part( 'inc/author-bio' ); ?>
			</header>
		</div>

	<?php } ?>
	<?php $count++; ?>
<?php endwhile; ?><!-- end of loop -->