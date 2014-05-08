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

	<?php if (function_exists('related_posts') && is_single()) { ?>
		<?php related_posts();?>
	<?php } ?>

    <div id="search">
        <div class="searchbar">
            <?php get_search_form(); ?>
        </div>
        <a class="searchopen" href="#"><i class="fa fa-search"></i></a>
    </div>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info">
			<?php do_action( 'cover_credits' ); ?>
			<?php printf( __( 'Powered by %s and %s', 'cover' ), '<a href="http://www.wordpress.org/" title="WordPress">WordPress</a>', '<a href="http://eichefam.net/projects/cover/" title="Cover theme by Paul Eiche">Cover</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<a href="#" class="backtotop" data-0-start="opacity: 0;" data-100-start="opacity: 1;"><i class="fa fa-chevron-up"></i></a>

<?php wp_footer(); ?>

</body>
</html>