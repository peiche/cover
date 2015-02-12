<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Cover
 */

/**
 * Add theme support for Jetpack functionality.
 */
function cover_jetpack_setup() {
    
    /*
     * See Jetpack support for more info
     * @link http://jetpack.me/support/infinite-scroll/
     */
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer' => 'page'
	) );
    
    add_theme_support( 'jetpack-responsive-videos' );
    
    // Enable featured content.
    add_theme_support( 'featured-content', array(
		'filter'		=> 'cover_get_featured_posts',
        'max_posts'     => 1
	) );
}
add_action( 'after_setup_theme', 'cover_jetpack_setup' );

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
