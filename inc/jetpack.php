<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Cover
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function cover_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer' => 'page'
	) );
    add_theme_support( 'site-logo', array( 
        'cover-site-logo' 
    ) );
    add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'cover_jetpack_setup' );