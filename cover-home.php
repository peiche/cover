<?php
/**
 * @package Cover
 */
?>

<?php $count = 0; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php if ($count == 0 && '' != get_the_post_thumbnail()) { ?>

		<div id="cover" class="cover featured-image auto home">
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<div class="background" style="background-image: url('<?php echo $image[0]; ?>');"></div>
			<header>
				<h2>
					<?php the_category(', ') ?>
					
					<span class="post-format pull-right">
						<?php get_template_part( 'postformatglyph' ); ?>
					</span>
				</h2>
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<span>
					<?php cover_posted_on(); ?>
				</span>
				<!--
				<div class="entry-summary">
					<?php the_content( __( 'Continue reading <span class=\"meta-nav\">&rarr;</span>', 'cover' ) ); ?>
				</div>
				-->
			</header>
		</div>

	<?php } ?>
	<?php $count++; ?>
<?php endwhile; ?><!-- end of loop -->