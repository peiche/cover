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

				<?php get_template_part( 'content', 'single' ); ?>
				
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

    <div class="profile">
        <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
        <h4><?php echo get_the_author(); ?></h4>
        <hr>
        <strong>LATEST POSTS</strong>
		<?php echo get_related_author_posts(); ?>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>