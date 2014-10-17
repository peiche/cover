<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Cover
 */

while ( have_posts() ) : the_post();

get_header(); // call header inside the loop to get author info ?>

    <?php get_template_part( 'parts/cover', 'post' ); ?>
    <?php get_template_part( 'parts/wrapper', 'top' ); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                
                <?php get_template_part( 'content', 'single' ); ?>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
                
                <?php cover_post_nav(); ?>

            </main><!-- #main -->
        </div><!-- #primary -->

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>