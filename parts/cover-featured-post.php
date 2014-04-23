<?php
/**
 * @package Cover
 */
?>

<div class="swiper-slide cover featured-image auto home">
	<?php if ('' != get_the_post_thumbnail()) { ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<?php } ?>
	<div class="background"<?php if ('' != get_the_post_thumbnail()) { ?> style="background-image: url('<?php echo $image[0]; ?>');"<?php } ?>></div>
	<header>
		<h2>
			<?php the_category(', ') ?>
			
			<?php /*
			<span class="post-format pull-right">
				<?php get_template_part( 'parts/postformat' ); ?>
			</span>
			*/ ?>
		</h2>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<span>
			<?php cover_posted_on(); ?>
		</span>
	</header>
</div>