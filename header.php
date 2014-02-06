<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Beats
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="title">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
</header>

<?php 
	$first_post_has_featured_image = false;
	$count = 0;
	if ( have_posts() ) {
		while ( have_posts() ) : the_post();
			if ($count == 0 && '' != get_the_post_thumbnail()) {
				$first_post_has_featured_image = true;
			}
			$count++;
		endwhile;
	}
?>
<nav id="site-navigation" class="main-navigation<?php if (((is_single() || is_page()) && '' != get_the_post_thumbnail()) || (is_home() && $first_post_has_featured_image) || is_author() || is_category()) { ?> featured-image<?php } ?>" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
</nav>

<?php get_template_part( 'cover' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<div id="content" class="site-content">
