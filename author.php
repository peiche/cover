<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cover
 */

get_header(); ?>

<?php get_template_part( 'template-parts/wrapper', 'top' ); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'template-parts/cover', 'author' ); ?>

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'summary' ); ?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer();
