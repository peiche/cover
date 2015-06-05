<?php
/**
 * Aesop Story Engine Compatibility File
 *
 * @package Cover
 */

/**
 * Override the font size unit
 */
add_filter( 'aesop_quote_size_unit', 'cover_quote_size_unit' );
function cover_quote_size_unit() {
    return 'rem';
}

/**
 * Set the offset for chapter scrolling to match the header height.
 */
add_filter( 'aesop_chapter_scroll_offset', 'cover_chapter_scroll_offset' );
function cover_chapter_scroll_offset() {
    return 77;
}
