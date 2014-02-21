<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Cover
 */

get_header(); ?>

<?php get_template_part( 'parts/cover', 'single' ); ?>
<?php get_template_part( 'parts/wrapper', 'top' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				$format = get_post_format();
				if ( false === $format ) {
					$format = 'standard';
				}
				?>
				<?php get_template_part( 'content', $format ); ?>

				<?php cover_post_nav(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>