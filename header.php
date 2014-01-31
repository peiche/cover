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

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" type="text/css">

<link href="http://fonts.googleapis.com/css?family=Domine:700|Open+Sans:400,600|Source+Code+Pro:500" rel="stylesheet" type="text/css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="title">
	<a href="/"><i class="fa fa-bookmark-o fa-lg"></i><span>eichefam.net</span></a>
</header>

<?php if (is_single() && '' != get_the_post_thumbnail()) { ?>
	<div id="cover" class="cover featured-image">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div class="background" style="background-image: url('<?php echo $image[0]; ?>');"></div>
		<header>
			<h2><?php the_category(' / ', 'multiple') ?></h2>
			<h1><a href="#"><?php the_title(); ?></a></h1>
			<span>
				<?php beats_posted_on(); ?>
			</span>
		</header>
	</div>
<?php } ?>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<!--
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'beats' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'beats' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>
	</header>
	-->
	<!-- #masthead -->
	
	<div id="content" class="site-content">
