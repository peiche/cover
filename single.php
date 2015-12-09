<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Cover
 */

while ( have_posts() ) : the_post();

get_header(); // Call header inside the loop to get author info. ?>

    <?php get_template_part( 'inc/wrapper', 'top' ); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

				<?php get_template_part( 'inc/cover', 'post' ); ?>

                <?php get_template_part( 'content', 'single' ); ?>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || '0' != get_comments_number() ) :
                        comments_template();
                    endif;
                ?>

                <?php if ( 'thread' != get_post_type() ) { ?>
                  <?php cover_post_nav(); ?>
                <?php } ?>

            </main><!-- #main -->
        </div><!-- #primary -->

<?php endwhile; // End of the loop. ?>
<?php get_footer();
