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
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<?php

$header_class = '';
if ( ! ( is_single() || is_page() || is_archive() || is_author() || is_search() || is_404() || cover_has_featured_posts() ) ) {
    $header_class = ' bg';
}

$nav_primary = 'primary';
$nav_social  = 'social_header';

$build_overlay = false;
if (
        has_nav_menu( $nav_primary ) ||
        has_nav_menu( $nav_social ) ||
        is_active_sidebar( 'cover-overlay' ) ) {
    $build_overlay = true;
}

$ignore_custom_background = '';
if ( 'minimal' == esc_attr( get_theme_mod( 'cover_list_style', 'minimal' ) ) ) {
  $ignore_custom_background = 'ignore-custom-background';
}

?>

<body <?php body_class( $ignore_custom_background ); ?>>

<?php do_action( 'ase_theme_body_inside_top' ); ?>

<header class="header<?php echo $header_class; ?>">
  <div class="backdrop"></div>

	<div class="site-nav">
		<a class="site-search" data-action="toggle-overlay" data-overlay-id="search-overlay" href="#search-overlay"><span class="fa fa-search" aria-label="Search Overlay"></span></a>
		<?php if ( $build_overlay ) { ?>
			<a class="hamburger" data-action="toggle-overlay" data-overlay-id="menu-overlay" href="#menu-overlay"><span aria-label="Toggle Overlay"></span></a>
		<?php } ?>
	</div>

    <div class="site-info">
        <?php if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) { ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-link <?php if ( ! jetpack_has_site_logo() ) { ?>hide<?php } ?>"><img src="<?php echo esc_url( jetpack_get_site_logo( 'url' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="site-logo"></a>
        <?php } ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><?php bloginfo( 'name' ); ?></a>
        <span class="site-description"><?php bloginfo( 'description' ); ?></span>
	</div>

</header>

<?php $overlay_color = esc_attr( get_theme_mod( 'cover_overlay_color', 'overlay-dark' ) ); ?>

<?php if ( $build_overlay ) { ?>
    <div id="menu-overlay" class="overlay <?php echo $overlay_color; ?> overlay-menu">
        <noscript>
            <div class="header">
                <div class="site-nav">
                    <a class="hamburger close" href="#"><span aria-label="Toggle Overlay"></span></a>
                </div>
            </div>
        </noscript>

        <?php if ( has_nav_menu( $nav_primary ) ) { ?>
            <nav class="main-navigation">
                <?php wp_nav_menu( array( 'theme_location' => $nav_primary ) ); ?>
            </nav>
        <?php } ?>

        <?php if ( has_nav_menu( $nav_social ) ) { ?>
            <nav class="social-navigation">
                <?php wp_nav_menu( array(
                    'theme_location' => $nav_social,
                    'link_before'    => '<span class="fa-stack fa-2x" aria-hidden="true"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-stack-1x social-icon"></i></span><span class="screen-reader-text">',
                    'link_after'     => '</span>',
                ) ); ?>
            </nav>
        <?php } ?>

        <?php get_sidebar( 'overlay' ); ?>
    </div>
<?php } ?>

<div id="search-overlay" class="overlay <?php echo $overlay_color; ?> overlay-search">
    <?php if ( ! $build_overlay ) { ?>
        <div class="header">
            <div class="site-nav">
                <a class="hamburger close" data-action="toggle-overlay" data-overlay-id="search-overlay" href="#"><span aria-label="Toggle Overlay"></span></a>
            </div>
        </div>
    <?php } else { ?>
        <noscript>
            <div class="header">
                <div class="site-nav">
                    <a class="hamburger close" href="#"><span aria-label="Toggle Overlay"></span></a>
                </div>
            </div>
        </noscript>
    <?php } ?>

    <?php get_search_form(); ?>

    <?php get_sidebar( 'search' ); ?>
</div>
