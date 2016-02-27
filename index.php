<?php
/**
 * The Index
 *
 * @package Cover
 */

get_header(); ?>

<?php get_template_part( 'template-parts/wrapper', 'top' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				if ( cover_has_featured_posts( 1 ) ) {
					get_template_part( 'template-parts/cover', 'featured' );
				}
			?>

			<?php get_template_part( 'template-parts/content', 'loop' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
