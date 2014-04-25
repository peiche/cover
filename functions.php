<?php
/**
 * Cover functions and definitions
 *
 * @package Cover
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 760; /* pixels */
}

if ( ! function_exists( 'cover_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cover_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Cover, use a find and replace
	 * to change 'cover' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cover', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cover' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cover_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	
	// Enable featured content.
	add_theme_support( 'featured-content', array(
		'filter'		=> 'cover_get_featured_posts'
	) );
}
endif; // cover_setup
add_action( 'after_setup_theme', 'cover_setup' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @return array An array of WP_Post objects.
 */
function cover_get_featured_posts() {
	return apply_filters( 'cover_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @return bool Whether there are featured posts.
 */
function cover_has_featured_posts() {
	return ! is_paged() && (bool) cover_get_featured_posts();
}

/**
 * Register widgetized area and update sidebar with default widgets.
 */
/*
function cover_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cover' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'cover_widgets_init' );
*/

/**
 * Enqueue scripts and styles.
 */
function cover_scripts() {
	
	wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Domine:700|Gentium+Basic:400italic|Source+Code+Pro:500|Open+Sans:400,600');
	wp_enqueue_style( 'fa-style', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'idangerous-style', get_template_directory_uri() . '/css/idangerous.swiper.css' );
	wp_enqueue_style( 'cover-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_script( 'cover-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );
	wp_enqueue_script( 'cover-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );
	wp_enqueue_script( 'idangerous-slider', get_template_directory_uri() . '/js/idangerous.swiper.js', array(), '20140210', true );
	wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/js/skrollr.min.js', array(), '20140212', true );
	wp_enqueue_script( 'cover-lib', get_template_directory_uri() . '/js/cover.min.js', array(), '20140210', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cover_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Extract and return the first image from content.
 */
if ( ! function_exists( 'cover_get_blockquote_in_content' ) ) :
function cover_get_blockquote_in_content() {
	remove_filter( 'the_content', 'cover_remove_blockquote_from_content' );

	$content = apply_filters( 'the_content', get_the_content() );

	add_filter( 'the_content', 'cover_remove_blockquote_from_content' );

	if ( preg_match( '/<blockquote>(.+?)<\/blockquote>/is', $content, $matches ) ) {
		return $matches[0];
	} else if ( preg_match( '/<blockquote class="large">(.+?)<\/blockquote>/is', $content, $matches ) ) {
		return $matches[0];
	} else {
		return false;
	}
}
endif;

if ( ! function_exists( 'cover_remove_blockquote_from_content' ) ) :
function cover_remove_blockquote_from_content( $content ) {
	if ( 'quote' !== get_post_format() ) {
		return $content;
	}
	
	if ( preg_match( '/<blockquote>(.+?)<\/blockquote>/is', $content, $matches ) ) {
		$content = preg_replace( '/<blockquote>(.+?)<\/blockquote>/is', '', $content, 1 );
	} else if ( preg_match( '/<blockquote class="large">(.+?)<\/blockquote>/is', $content, $matches ) ) {
		$content = preg_replace( '/<blockquote class="large">(.+?)<\/blockquote>/is', '', $content, 1 );
	}
	
	return $content;
}
endif;