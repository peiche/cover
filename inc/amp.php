<?php
/**
 * AMP Compatibility File
 *
 * @package Cover
 */

add_action( 'amp_post_template_css', 'cover_amp_post_template_css' );

function cover_amp_post_template_css( $amp_template ) {
    ?>
    .amp-wp-header {
      background-color: <?php echo esc_attr( get_theme_mod( 'cover_header_color', '#026ed2' ) ); ?>
    }
    <?php
}
