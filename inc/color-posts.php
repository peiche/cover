<?php
/**
 * Color Posts Compatibility File
 *
 * @link https://wordpress.org/plugins/color-posts/
 *
 * @package Cover
 */

/**
 * Sets the custom CSS for the header background color,
 * plus text color overrides for the contrast
 *
 * @param $colors_css
 * @param $color
 * @param $contrast
 */
function cover_use_custom_colors( $colors_css, $color, $contrast ) {
    $post_id = get_the_ID();

    $tonesque = get_post_meta( $post_id, '_post_colors', true );
    extract( $tonesque );

    if ( 'ffffff' != $color ) {
        $colors_css = '
            .header,
            .header a,
            .header .site-description,
            .cover {
                color: rgb({$contrast}) !important;
            }
            .header a:hover {
                border-color: rgb({$contrast}) !important;
            }
            .header .site-description {
                border-color: rgba({$contrast}, .25) !important;
            }
            .hamburger span,
            .hamburger span:after,
            .hamburger span:before {
                background-color: rgb({$contrast}) !important;
            }
            .header .backdrop {
                background-color: #{$color} !important;
            }
            ';
    } else {
        $colors_css = '';
    }

    return $colors_css;
}
add_filter( 'colorposts_css_output', 'cover_use_custom_colors', 10, 3 );
