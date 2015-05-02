<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Cover
 */
?>

	</div><!-- #content -->
	
    <footer id="colophon" class="site-footer" role="contentinfo">
        
        <div class="site-info">
			<div class="site-credits">
                <?php printf( __( 'Powered by %s and %s', 'cover' ), '<a href="http://www.wordpress.org/" title="WordPress">WordPress</a>', '<a href="http://eichefam.net/projects/cover/" title="Cover theme by Paul Eiche">Cover</a>' ); ?>
            </div>
            
            <?php $nav_social_footer = 'social_footer'; ?>
            <?php if ( has_nav_menu( $nav_social_footer ) ) { ?>
                <nav class="social-navigation">
                    <?php wp_nav_menu( array(
                        'theme_location' => $nav_social_footer,
                        'link_before'    => '<i class="fa fa-fw social-icon"></i><span class="screen-reader-text">',
                        'link_after'     => '</span>',
                        'depth'          => 1
                    ) ); ?>
                </nav>
            <?php } ?>
            
		</div><!-- .site-info -->
        
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>