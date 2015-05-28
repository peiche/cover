<?php
/**
 * Color Posts Compatibility File
 *
 * @package Cover
 */

function cover_use_custom_colors( $colors_css, $color, $contrast ) {
    $post_id = get_the_ID();

    $tonesque = get_post_meta( $post_id, '_post_colors', true );
    extract( $tonesque );

    if ( $color != 'ffffff' ) {
        $colors_css = "
            .header .backdrop {
                background-color: #{$color} !important;
            }
            ";
    } else {
        $colors_css = "";
    }

    return $colors_css;
}
add_filter( 'colorposts_css_output', 'cover_use_custom_colors', 10, 3 );
