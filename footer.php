<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Beats
 */
?>

	</div><!-- #content -->

	<?php if (is_single()) { ?>
		<?php related_posts();?>
	<?php } ?>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'beats_credits' ); ?>
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'beats' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'beats' ), 'Beats', '<a href="http://eichefam.net" rel="designer">Paul Eiche</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>