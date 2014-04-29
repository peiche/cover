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
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	</header>
</div>