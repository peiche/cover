<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Cover
 */

get_header(); ?>

<?php
	if ( get_post_format() == 'quote' ) {
		get_template_part( 'parts/cover', 'quote' );
	} else if ( get_post_format() == 'link' ) {
		get_template_part( 'parts/cover', 'link' );
	} else if ( get_post_format() == 'image' ) {
		get_template_part( 'parts/cover', 'image' );
    } else if ( get_post_format() == 'gallery' ) {
        get_template_part( 'parts/cover', 'gallery' );
	} else {
		get_template_part( 'parts/cover', 'single' );
	}
?>

<?php get_template_part( 'parts/wrapper', 'top' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>
				
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

    <div class="profile">
        <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
        <h4><?php echo get_the_author(); ?></h4>
        <hr>
        <strong>LATEST POSTS</strong>
		<?php echo get_related_author_posts(); ?>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>