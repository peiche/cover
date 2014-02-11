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
<nav id="site-navigation" class="main-navigation<?php if (((is_single() || is_page()) && '' != get_the_post_thumbnail()) || (is_home() && $has_sticky) || is_author() || is_category()) { ?> featured-image<?php } ?>" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	<div>
		<ul>
			<li>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<input type="search" class="search-field" placeholder="Search..." value="" name="s" title="Search for:" />
	<button class="btn btn-link" type="submit"><i class="fa fa-search"></i></button>
</form>
			</li>
		</ul>
	</div>
</nav>