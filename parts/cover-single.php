<?php
/**
 * @package Cover
 */
?>

<?php if ('' != get_the_post_thumbnail()) { ?>
	<div class="cover featured-image">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div class="background" style="background-image: url('<?php echo $image[0]; ?>');" data-top="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;"></div>
		<header>
			<h2>
				<?php the_category(', ') ?>
				
				<span class="post-format pull-right">
					<?php get_template_part( 'parts/postformat' ); ?>
				</span>
			</h2>
			<h1><a href="#"><?php the_title(); ?></a></h1>
			<span>
				<?php cover_posted_on(); ?>
			</span>
		</header>
		<i class="fa fa-angle-down"></i>
	</div>
<?php } ?>