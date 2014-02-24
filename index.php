<?php
/**
 * @package Cover
 */

get_header(); ?>

<?php
	if ( cover_has_featured_posts() ) {
		get_template_part( 'parts/cover', 'featured' );
	}
?>

<?php get_template_part( 'parts/wrapper', 'top' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'content' ); ?>
				
			<?php endwhile; ?>
			<?php cover_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
