<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Cover
 */

get_header(); ?>

<?php get_template_part( 'inc/wrapper', 'top' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php get_template_part( 'inc/cover', '404' ); ?>

			<section class="error-404 not-found">
				<div class="page-content">
					
                    <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'cover' ); ?></p>
                    
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>