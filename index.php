<?php
/**
 * @package Cover
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php 
			/*
			$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			query_posts(array(
				'post__not_in' => get_option('sticky_posts'),
				'paged' => $paged
			));
			*/
		?>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php if ( !is_sticky() ) { ?>
					<?php
						get_template_part( 'content', get_post_format() );
					?>
				<?php } ?>
				
			<?php endwhile; ?>
			<?php cover_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
