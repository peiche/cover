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
	$content_width = 1600; // Actual content width is 760, but I prefer to unrestrict images from having a small width.
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

	/**
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

	// This theme uses wp_nav_menu() in multiple locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cover' ),
	) );
    register_nav_menus( array(
		'social_header' => __( 'Social Menu (Overlay)', 'cover' ),
	) );
    register_nav_menus( array(
		'social_footer' => __( 'Social Menu (Footer)', 'cover' ),
	) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form' ) );

  // WordPress 4.1 and above.
  add_theme_support( 'title-tag' );

	add_theme_support( 'custom-background', apply_filters( 'cover_custom_background_args', array(
		'default-color'      => '#eeeeee',
		'default-attachment' => 'fixed',
		'default-repeat'     => 'no-repeat',
	) ) );

	// Post format support.
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

	/**
	 * WordPress 4.5 and above.
	 * Add custom logo support if Jetpack is not installed.
	 */
	if ( ! defined( 'JETPACK__VERSION' ) ) {
		add_theme_support( 'custom-logo', array() );
	}

}
endif;
add_action( 'after_setup_theme', 'cover_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function cover_widgets_init() {

	// Main overlay widgets.
	register_sidebar( array(
		'name'          => __( 'Overlay Widgets', 'cover' ),
		'id'            => 'cover-overlay',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	// Search overlay widgets.
	register_sidebar( array(
		'name'          => __( 'Search Widgets', 'cover' ),
		'id'            => 'cover-search',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	// Footer widgets.
	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'cover' ),
		'id'            => 'cover-footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'cover_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cover_scripts() {

  wp_enqueue_style( 'GoogleFonts', '//fonts.googleapis.com/css?family=Source+Code+Pro|Montserrat|Open+Sans:400,600' );
	wp_enqueue_style( 'cover-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'cover-skip-link-focus-fix', get_template_directory_uri() . '/dist/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'headroom', get_template_directory_uri() . '/dist/js/headroom.min.js', array(), '20140814', true );
	wp_enqueue_script( 'cover-lib', get_template_directory_uri() . '/dist/js/cover.js', array( 'jquery' ), '20140210', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( function_exists( 'cover_has_featured_posts' ) && cover_has_featured_posts( 2 ) ) {
		wp_enqueue_script( 'jquery-event-move', get_template_directory_uri() . '/dist/js/jquery.event.move.js', array( 'jquery' ), '20160808', true );
		wp_enqueue_script( 'jquery-event-swipe', get_template_directory_uri() . '/dist/js/jquery.event.swipe.js', array( 'jquery' ), '20160808', true );
    wp_enqueue_script( 'unslider', get_template_directory_uri() . '/dist/js/unslider-min.js', array( 'jquery' ), '20150727', true );
		wp_enqueue_script( 'unslider-cover', get_template_directory_uri() . '/dist/js/cover-unslider.js', array( 'jquery' ), '20160601', true );
	}

	if ( 'grid' == esc_attr( get_theme_mod( 'cover_list_style', 'minimal' ) ) && ! is_singular() && ! is_page() ) {
		wp_enqueue_script( 'masonry', get_template_directory_uri() . '/dist/js/masonry.pkgd.min.js', array( 'jquery' ), '20150730', true );
		wp_enqueue_script( 'masonry-cover', get_template_directory_uri() . '/dist/js/cover-masonry.js', array( 'jquery' ), '20150730', true );
	}

	/**
	 * Use dashicons on the front end.
	 * http://jespervanengelen.com/snippets/use-wordpress-dashicons-frontend/
	 */
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'cover_scripts' );

/**
 * Color contrast calculation. Compares to value halfway between black and white.
 *
 * @link http://24ways.org/2010/calculating-color-contrast/
 * @param string $hexcolor The hexidecimal value of the color.
 */
function get_contrast_50( $hexcolor ) {
    return ( hexdec( $hexcolor ) > 0xffffff / 2 ) ? 'light' : 'dark';
}

/**
 * Color contrast calculation. Converts RGB color space into YIQ.
 *
 * @link http://24ways.org/2010/calculating-color-contrast/
 * @param string $hexcolor The hexidecimal value of the color.
 */
function get_contrast_yiq( $hexcolor ) {
	$red = hexdec( substr( $hexcolor, 0, 2 ) );
	$green = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue = hexdec( substr( $hexcolor, 4, 2 ) );
	$yiq = ( ( $red * 299 ) + ( $green * 587 ) + ( $blue * 114 ) ) / 1000;

    return ( $yiq >= 128 ) ? 'light' : 'dark';
}

/**
 * The real contrast function. Call this one and leave the function that you want uncommented.
 *
 * @param string $hexcolor The hexidecimal value of the color.
 */
function get_contrast( $hexcolor ) {
    return
        get_contrast_50( $hexcolor )
        /* get_contrast_yiq( $hexcolor ) */
        ;
}

/**
 * PHP equivalent to Sass function darken().
 *
 * @link https://gist.github.com/jegtnes/5720178
 * @param string $hex The hexidecimal value of the color.
 * @param string $percent The percentage to darken the color.
 */
function darken( $hex, $percent ) {
    preg_match( '/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $primary_colors );
	str_replace( '%', '', $percent );
	$color = '#';
	for ( $i = 1; $i <= 3; $i++ ) {
		$primary_colors[ $i ] = hexdec( $primary_colors[ $i ] );
		$primary_colors[ $i ] = round( $primary_colors[ $i ] * ( 100 - ( $percent * 2 ) ) / 100 );
		$color .= str_pad( dechex( $primary_colors[ $i ] ), 2, '0', STR_PAD_LEFT );
	}

	return $color;
}

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
 * Load Jetpack compatibility.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Aesop Story Engine compatibility.
 */
require get_template_directory() . '/inc/aesop.php';

/**
 * Load Color Posts compatibility.
 */
require get_template_directory() . '/inc/color-posts.php';

/**
 * Load AMP compatibility.
 */
require get_template_directory() . '/inc/amp.php';

/**
 * Load Algolia compatibility.
 */
require get_template_directory() . '/inc/algolia.php';
