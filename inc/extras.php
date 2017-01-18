<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Cover
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function cover_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'cover_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cover_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'cover_body_classes' );

/**
 * Returns the first featured image from a collection of posts.
 *
 * @return String
 */
function cover_get_first_featured_image() {
	$img = '';
	while ( have_posts() ) : the_post();
		$img = cover_get_featured_image( get_the_ID() );

		if ( '' != $img ) {
			break;
		}
	endwhile;
	rewind_posts();

	return $img;
}

/**
 * Returns the featured image of the post.
 *
 * @param int $post_id The post id for the thumbnail.
 * @return String
 */
function cover_get_featured_image( $post_id ) {
	$img = '';
	if ( '' != get_the_post_thumbnail() ) {
		$img_arr = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
		$img = $img_arr[0];
	}

	// Support for Featured Video Plus plugin.
	if ( function_exists( 'has_post_video' ) && has_post_video() ) {
		$img = get_the_post_video_image_url( get_the_ID() );
	}

	return $img;
}
