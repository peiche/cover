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

/*
$has_image = '';
if ( ( (is_single() || is_page() ) && '' != get_the_post_thumbnail() ) || is_home() || is_archive() || is_author() || is_search() || is_404() ) {
    $has_image = 'has-featured-image';
}
*/

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

<body <?php body_class( $has_image ); ?>>

<?php // do_action(‘ase_theme_body_inside_top’); ?>

<header class="header">
    <?php if ( $build_overlay ) { ?>
        <a id="toggle-overlay" class="hamburger" data-overlay-id="menu-area" href="#"><span></span></a>
    <?php } ?>
    <div class="site-info">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><?php bloginfo( 'name' ); ?></a>
        <span class="site-description">
			<?php 
			if (is_single()) {
				echo cover_posted_on();
			} else {
				bloginfo( 'description' ); 
			}
			?>
		</span>
    </div>
</header>

<?php if ( $build_overlay ) { ?>
    <div id="menu-area" class="overlay">
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
                    'link_before'    => '<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-stack-1x social-icon"></i><span class="hide">', //'<span class="hide">',
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