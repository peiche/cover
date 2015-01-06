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
			<?php do_action( 'cover_credits' ); ?>
			<?php printf( __( 'Powered by %s and %s', 'cover' ), '<a href="http://www.wordpress.org/" title="WordPress">WordPress</a>', '<a href="http://eichefam.net/projects/cover/" title="Cover theme by Paul Eiche">Cover</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<a class="fa-stack fa-2x back-to-top" href="#">
    <i class="fa fa-circle fa-stack-2x"></i>
    <i class="fa fa-angle-up fa-stack-1x fa-inverse"></i>
</a>

</body>
</html>