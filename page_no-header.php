<?php
/**
 * The template for displaying all page without Cover's header.
 * Please note that you will have to use a content builder plugin
 * such as Aesop Story Engine or SiteOrigin's Page Builder to
 * make your own header.
 *
 * @package Cover
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'template-parts/wrapper', 'top' ); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

				      <?php get_template_part( 'template-parts/content', 'page' ); ?>

              <?php get_template_part( 'template-parts/comments' ); ?>

            </main><!-- #main -->
        </div><!-- #primary -->

<?php endwhile; // End of the loop. ?>
<?php get_footer();
