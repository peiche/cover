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

$header_class = '';
if ( !( is_single() || is_page() || is_archive() || is_author() || is_search() || is_404() || cover_has_featured_posts() ) ) {
    $header_class = ' bg';
}

$nav_primary = 'primary';
$nav_social  = 'social';

$build_overlay = false;
if (
        has_nav_menu( $nav_primary ) ||
        has_nav_menu( $nav_social ) ||
        is_active_sidebar( 'overlay-1' ) ||
        is_active_sidebar( 'overlay-2' ) ||
        is_active_sidebar( 'overlay-3' ) ) {
    $build_overlay = true;
}

?>

<body <?php body_class(); ?>>

<?php do_action( 'ase_theme_body_inside_top' ); ?>

<header class="header<?php echo $header_class; ?>">
    <div class="backdrop" data-0-top="opacity: 0;" data-0-top-bottom="opacity: 1;" data-anchor-target=".cover"></div>

	<div class="site-nav">
		<a class="site-search" data-action="toggle-overlay" data-overlay-id="search-overlay" href="#"><span class="fa fa-search"></span></a>
		<?php if ( $build_overlay ) { ?>
			<a class="hamburger" data-action="toggle-overlay" data-overlay-id="menu-overlay" href="#"><span></span></a>
		<?php } ?>
	</div>
	
	<div class="site-info">
		<?php if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) { ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo"><img src="<?php echo esc_url( jetpack_get_site_logo( 'url' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
		<?php } ?>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><?php bloginfo( 'name' ); ?></a>
		<?php if ( is_single() ) { ?>
			<span class="site-description"><?php echo cover_posted_on(); ?></span>
		<?php } else { ?>
			<span class="site-description"><?php bloginfo( 'description' ); ?></span>
		<?php } ?>
	</div>
</header>

<?php if ( $build_overlay ) { ?>
    <div id="menu-overlay" class="overlay">
        <?php if ( is_active_sidebar( 'overlay-1' ) ) { ?>
            <div class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'overlay-1' ); ?>
            </div>
        <?php } ?>

        <?php if ( has_nav_menu( $nav_primary ) ) { ?>
            <nav class="main-navigation">
                <?php wp_nav_menu( array( 'theme_location' => $nav_primary ) ); ?>
            </nav>
        <?php } ?>

        <?php if ( is_active_sidebar( 'overlay-2' ) ) { ?>
            <div class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'overlay-2' ); ?>
            </div>
        <?php } ?>

        <?php if ( has_nav_menu( $nav_social ) ) { ?>
            <nav class="social-navigation">
                <?php wp_nav_menu( array(
                    'theme_location' => $nav_social,
                    'link_before'    => '<span class="fa-stack fa-2x"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-stack-1x social-icon"></i><span class="screen-reader-text">',
                    'link_after'     => '</span></span>'
                ) ); ?>
            </nav>
        <?php } ?>

        <?php if ( is_active_sidebar( 'overlay-3' ) ) { ?>
            <div class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'overlay-3' ); ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<div id="search-overlay" class="overlay overlay-search">
	<?php get_search_form(); ?>
</div>
