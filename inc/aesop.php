<?php
/**
 * Aesop Story Engine Compatibility File
 *
 * @package Cover
 */

/**
 * Nothing here yet.
 */

// Do not load Aesop styles from the plugin.
define( 'AI_CORE_UNSTYLED', true );

/**
 * Override the font size unit
 */
function cover_quote_size_unit() {
	return 'rem';
}

/**
 * Set the offset for chapter scrolling to match the header height.
 */
function cover_chapter_scroll_offset() {
	return 76;
}

/**
 * Set the offset for timeline scrolling to match the header height.
 */
function cover_timeline_scroll_offset() {
	return 76;
}

add_filter( 'aesop_quote_size_unit', 'cover_quote_size_unit' );
add_filter( 'aesop_chapter_scroll_offset', 'cover_chapter_scroll_offset' );
add_filter( 'aesop_timeline_scroll_offset', 'cover_timeline_scroll_offset' );
