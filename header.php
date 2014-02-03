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
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-bookmark-o fa-lg"></i><span><?php bloginfo( 'name' ); ?></span></a>
</header>

<nav id="site-navigation" class="main-navigation<?php if ((is_single() || is_page() || is_author() || is_category() || is_tag()) && '' != get_the_post_thumbnail()) { ?> featured-image<?php } ?>" role="navigation">
	<a class="bars" href="#"><i class="fa fa-align-justify fa-lg"></i></a>
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
</nav>

<?php get_template_part( 'cover' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<!-- #masthead -->
	
	<div id="content" class="site-content">
