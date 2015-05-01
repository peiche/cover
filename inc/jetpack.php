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
        'type' => 'scroll',
        'footer_widgets' => false,
        'container' => 'main',
		'footer' => false,
	) );

    // link?
    add_theme_support( 'jetpack-responsive-videos' );

    // Enable featured content. link?
    add_theme_support( 'featured-content', array(
		'filter'		=> 'cover_get_featured_posts',
        'max_posts'     => 1,
	) );
}
add_action( 'after_setup_theme', 'cover_jetpack_setup' );

/**
 * Handle `footer_widgets` argument
 *
 * @param bool $has_widgets
 * @uses has_nav_menu
 * @filter infinite_scroll_has_footer_widgets
 * @return bool
 */
function cover_infinite_scroll_has_footer_widgets( $has_widgets ) {
    $has_widgets = false;
    if ( has_nav_menu( 'social_footer' ) ) {
        $has_widgets = true;
    }
    
    return $has_widgets;
}
add_filter( 'infinite_scroll_has_footer_widgets', 'cover_infinite_scroll_has_footer_widgets', 10, 1 );

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
