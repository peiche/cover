<?php
/**
 * @package Cover
 */
?>

<?php $home_counter = 0; ?>
<div id="cover-home" class="swiper-container">
	<div class="swiper-wrapper">
		
		<?php query_posts(array('post__in'=>get_option('sticky_posts'))); ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="swiper-slide cover featured-image auto home">
				<?php if ('' != get_the_post_thumbnail()) { ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<?php } ?>
				<div class="background"<?php if ('' != get_the_post_thumbnail()) { ?> style="background-image: url('<?php echo $image[0]; ?>');"<?php } ?>></div>
				<header>
					<h2>
						<?php the_category(', ') ?>
						
						<span class="post-format pull-right">
							<?php get_template_part( 'parts/postformat' ); ?>
						</span>
					</h2>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<span>
						<?php cover_posted_on(); ?>
					</span>
				</header>
			</div>
			<?php $home_counter++; ?>
		<?php endwhile; ?><!-- end of loop -->
		<?php wp_reset_query(); ?>
		
	</div>
	
	<?php if ($home_counter > 1) { ?>
		<span id="cover-home-left" class="fa fa-angle-left fa-fw"></span>
		<span id="cover-home-right" class="fa fa-angle-right fa-fw"></span>
	<?php } ?>
	
</div>