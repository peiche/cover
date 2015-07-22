<?php
/**
 * Aesop Story Engine Compatibility File
 *
 * @package Cover
 */

add_filter( 'aesop_chapter_scroll_offset', 'cover_chapter_scroll_offset' );

/**
 * Set the offset for chapter scrolling to match the header height.
 */
function cover_chapter_scroll_offset() {
    return 76;
}
