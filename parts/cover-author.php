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
			<div class="background darken"<?php if ('' != get_the_post_thumbnail()) { ?> style="background-image: url('<?php echo $image[0]; ?>');"<?php } ?>></div>
			<header>
				<?php get_template_part( 'parts/author-bio' ); ?>
			</header>
		</div>

	<?php } ?>
	<?php $count++; ?>
<?php endwhile; ?><!-- end of loop -->