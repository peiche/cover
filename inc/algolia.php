<?php
/**
 * Algolia Search Compatibility File
 *
 * @package Cover
 */

/**
 * Dequeue default CSS files.
 *
 * Hooked to the wp_print_styles action, with a late priority (100),
 * so that it is after the stylesheets were enqueued.
 */
function cover_dequeue_styles() {
  wp_dequeue_style( 'algolia-autocomplete' );
  wp_dequeue_style( 'algolia-instantsearch' );
}
add_action( 'wp_print_styles', 'cover_dequeue_styles', 100 );

/**
 * Set custom template path. Don't forget the trailing slash!
 * @link https://community.algolia.com/wordpress/customize-templates.html#customize-templates-folder-name
 */
add_filter( 'algolia_templates_path', function() {
  return 'template-parts/algolia/';
} );
