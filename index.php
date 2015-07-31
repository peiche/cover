<?php
/**
 * The Index
 *
 * @package Cover
 */

get_header(); ?>

<?php get_template_part( 'inc/wrapper', 'top' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				if ( cover_has_featured_posts( 1 ) ) {
					get_template_part( 'inc/cover', 'featured' );
				}
			?>

			<?php if ( have_posts() ) : ?>

        <?php $count = 0; ?>
        <div id="posts" class="<?php echo get_theme_mod( 'cover_list_style', 'minimal' ); ?> <?php if ( 'grid' == get_theme_mod( 'cover_list_style', 'minimal' ) && get_theme_mod( 'cover_number_of_columns' ) > 1 ) { echo 'card-' . get_theme_mod( 'cover_number_of_columns', '1' ); } ?>">
					<?php while ( have_posts() ) : the_post(); ?>

	          <?php get_template_part( 'content' ); ?>

	        <?php endwhile; ?>
				</div>
        <?php cover_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
