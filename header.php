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
if ( ( (is_single() || is_page() ) && '' != get_the_post_thumbnail() ) || is_home() || is_archive() || is_author() || is_search() || is_404() ) {
    $has_image = 'has-featured-image';
}

?>

<body <?php body_class( $has_image ); ?>>

<?php // do_action(‘ase_theme_body_inside_top’); ?>

<header class="header">
    <div class="toggle-container">
        <a class="toggle-overlay" data-overlay-class="menu-area" href="#"><i class="fa fa-fw fa-bars"></i></a>
    </div>
    <div class="site-info">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><?php bloginfo( 'name' ); ?></a>
        <span class="site-description"><?php bloginfo( 'description' ); ?></span>
    </div>
</header>

<div id="menu-area" class="overlay">
    <a href="#" class="overlay-close right"><i class="fa fa-fw fa-times"></i></a>
    
    <?php if ( is_active_sidebar( 'overlay-1' ) ) { ?>
        <div class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'overlay-1' ); ?>
        </div>
    <?php } ?>
    
    <nav class="main-navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>
    
    <?php if ( is_active_sidebar( 'overlay-2' ) ) { ?>
        <div class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'overlay-2' ); ?>
        </div>
    <?php } ?>
    
    <nav class="social-navigation">
        <?php wp_nav_menu( array(
            'theme_location' => 'social',
            'link_before'    => '<span class="hide">',
            'link_after'     => '</span>'
        ) ); ?>
    </nav>
    
	<?php if ( is_active_sidebar( 'overlay-3' ) ) { ?>
        <div class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'overlay-3' ); ?>
        </div>
    <?php } ?>
</div>