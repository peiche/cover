<?php
/**
 * @package Cover
 */

get_header(); ?>

<?php get_template_part( 'parts/wrapper', 'top' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main grid" role="main">

			<?php if ( have_posts() ) : ?>
				<?php $count = 0; ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php // get_template_part( 'content' ); ?>
					
					<?php $count = $count + 1; ?>
					<?php if ( $count < 2) { ?>
						<div class="grid-row">
					<?php } ?>
					
					<?php get_template_part( 'content' ); ?>
					
					<?php if ( $count == 2 ) { ?>
						</div>
						<?php $count = 0; ?>
					<?php } ?>
					
				<?php endwhile; ?>
				<?php cover_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
