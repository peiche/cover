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
	$hascover = '';
	if ((is_single() || is_page()) && '' != get_the_post_thumbnail()) {

		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$height = $img[2];

		if ( get_post_format() != 'quote' ) {
			$hascover = 'has-cover';
		}
	}
?>
<body <?php body_class( $hascover ); ?>>

<header id="header">
	<div class="header-container">
		<a class="title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>

		<div class="mobile-menu">
			<a class="burger" href="#"><i class="fa fa-bars fa-fw"></i></a>
			<a class="close" href="#"><i class="fa fa-times fa-fw"></i></a>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 1 ) ); ?>
		</nav>

	</div>
</header>