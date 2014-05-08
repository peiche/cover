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
        <!--
        <ul class="smallsocial">
            <li><a href="http://twitter.com" class="smallsocialbutton twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>							<li><a href="http://facebook.com" class="smallsocialbutton facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>							<li><a href="http://github.com" class="smallsocialbutton github" target="_blank"><i class="fa fa-github"></i></a></li>							<li><a href="http://instagram.com" class="smallsocialbutton instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>							<li><a href="http://astrowp.ecko.me/feed/" class="smallsocialbutton rss" target="_blank"><i class="fa fa-rss"></i></a></li>
        </ul>
        -->
        <!-- <p>Harvey Specter has built a career and reputation by breaking the rules. Harvey's shoot-from-the-hip style has made him an effective lawyer and a slick character.</p> -->
        <hr>
        <strong>LATEST POSTS</strong>
        <!--<p class="tweet"><a href="http://astrowp.ecko.me/getting-started-with-yeoman-grunt/">Getting Started with Yeoman &amp; Grunt</a><span> 07th March, 2014</span></p><p class="tweet"><a href="http://astrowp.ecko.me/javascript-design-patterns-introduction/">JavaScript Design Patterns: Introduction</a><span> 03rd March, 2014</span></p>-->
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>