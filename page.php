<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Cover
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'template-parts/wrapper', 'top' ); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

				      <?php get_template_part( 'template-parts/cover', 'page' ); ?>

              <?php get_template_part( 'template-parts/content', 'page' ); ?>

              <?php get_template_part( 'template-parts/comments' ); ?>

            </main><!-- #main -->
        </div><!-- #primary -->

<?php endwhile; // End of the loop. ?>
<?php get_footer();
