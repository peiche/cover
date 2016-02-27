<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Cover
 */

while ( have_posts() ) : the_post();

get_header(); // Call header inside the loop to get author info. ?>

    <?php get_template_part( 'template-parts/wrapper', 'top' ); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

              <?php
                get_template_part( 'template-parts/cover', 'post' );

                get_template_part( 'template-parts/content', 'single' );

                get_template_part( 'template-parts/comments' );

                if ( 'thread' != get_post_type() ) {
                  cover_post_nav();
                }
              ?>

            </main><!-- #main -->
        </div><!-- #primary -->

<?php endwhile; // End of the loop. ?>
<?php get_footer();
