<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Cover
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

<?php

$has_image = '';
if ( (is_single() && '' != get_the_post_thumbnail()) || is_category() ) {
    $has_image = 'has-featured-image';
}

?>

<body <?php body_class( $has_image ); ?>>

<?php // do_action(‘ase_theme_body_inside_top’); ?>

<header id="header">
    
    <div class="header-left">
        <a id="toggle-menu-area" href="#" style="display: none;"><i class="fa fa-fw fa-bars"></i></a>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
    </div>
    
    <div class="header-right">
        <a id="toggle-widget-area" href="#" style="display: none;"><i class="fa fa-fw fa-ellipsis-v"></i></a>
    </div>
    
</header>

<!--
<header id="header">
	<div class="header-container">
		<a class="title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

		<div class="mobile-menu">
			<a class="burger" href="#"><i class="fa fa-bars fa-fw"></i></a>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>

	</div>
</header>
-->

<!-- <div class="aesop-entry-header"></div> -->
