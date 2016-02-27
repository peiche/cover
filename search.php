<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Cover
 */

get_header(); ?>

<?php get_template_part( 'template-parts/wrapper', 'top' ); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'template-parts/cover', 'archive' ); ?>

			<?php get_template_part( 'template-parts/content', 'loop' ); ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer();
