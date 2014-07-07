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
	$content_width = 1600; // actual content width is 760, but I prefer to unrestrict images from having a small width.
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
 * Enqueue scripts and styles.
 */
function cover_scripts() {
	
	wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Source+Code+Pro:500|Montserrat:400,700|Open+Sans:400,600|Gentium+Basic:400italic');
	wp_enqueue_style( 'cover-style', get_template_directory_uri() . '/css/style.css' );

    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'cover-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );
	wp_enqueue_script( 'cover-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );
	wp_enqueue_script( 'idangerous-slider', get_template_directory_uri() . '/js/idangerous.swiper.js', array(), '20140210', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.js', array(), '20140508', true );
    wp_enqueue_script( 'pace', get_template_directory_uri() . '/js/pace.min.js', array(), '20140617', true );
    wp_enqueue_script( 'fluidbox', get_template_directory_uri() . '/js/jquery.fluidbox.min.js', array(), '20140625', true );
    wp_enqueue_script( 'prettify', 'https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js', array(), '20140617', true );
    wp_enqueue_script( 'cover-lib', get_template_directory_uri() . '/js/cover.min.js', array(), '20140210', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cover_scripts' );

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

function get_related_author_posts() {
    global $authordata, $post;
    $authors_posts = get_posts( array( 'author' => $authordata->ID, 'post__not_in' => array( $post->ID ), 'posts_per_page' => 2 ) );
    foreach ( $authors_posts as $authors_post ) {
        $output .= '<p class="tweet"><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a><span>' . mysql2date('M j, Y', $authors_post->post_date) . '</span></p>';
    }
    return $output;
}