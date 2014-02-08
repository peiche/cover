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

	<?php if (is_single()) { ?>
		<?php related_posts();?>
	<?php } ?>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="smallnav">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div>
		<div class="site-info">
			<?php do_action( 'cover_credits' ); ?>
			<?php printf( __( 'Powered by %s and %s', 'cover' ), '<a href="http://www.wordpress.org/" title="WordPress">WordPress</a>', '<a href="http://eichefam.net/projects/cover/" title="Cover theme by Paul Eiche">Cover</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>