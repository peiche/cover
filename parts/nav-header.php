<?php
/**
 * @package Cover
 */
?>

<?php 
	$has_sticky = false;
	if ( have_posts() ) {
		while ( have_posts() ) : the_post();
			if (is_sticky()) {
				$has_sticky = true;
			}
		endwhile;
	}
?>
<nav id="site-navigation" class="main-navigation<?php if (((is_single() || is_page()) && '' != get_the_post_thumbnail()) || (is_home() && !is_paged() && $has_sticky) || is_author() || is_category()) { ?> featured-image<?php } ?>" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	<div>
		<ul>
			<li>
				<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>" onsubmit="return _s(this);">
					<input type="search" class="search-field" placeholder="Search..." value="" name="s" title="Search for:" />
					<button class="btn btn-link" type="submit" name="submit"><i class="fa fa-search"></i></button>
					
					<script>
					function _s(form) {
						if ('' == form.s.value) {
							form.s.focus();
							return false;
						}
						return true;
					}
					</script>
				</form>
			</li>
		</ul>
	</div>
</nav>