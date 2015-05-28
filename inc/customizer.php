<?php
/**
 * Cover Theme Customizer
 *
 * @package Cover
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cover_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    $wp_customize->add_section( 'cover_options', array(
        'title' 		=> __( 'Cover Theme Options', 'cover' )
    ) );

    $wp_customize->add_setting(
        'cover_header_color',
        array(
            'default'   => '#026ed2',
        )
    );

    $wp_customize->add_control(
        'cover_header_color',
        array(
            'type'      => 'select',
            'label'     => __( 'Header Color', 'cover' ),
            'section'   => 'cover_options',
            'choices'   => array(
                '#026ed2'   => __( 'Blue', 'cover' ),
                '#f44336'   => __( 'Red', 'cover' ),
                '#4caf50'   => __( 'Green', 'cover' ),
                '#e91e63'   => __( 'Pink', 'cover' ),
                '#9c27b0'   => __( 'Purple', 'cover' ),
                '#ff9800'   => __( 'Orange', 'cover' ),
                '#9e9e9e'   => __( 'Gray', 'cover' ),
                '#2b2b2b'   => __( 'Dark Grey', 'cover' ),
            ),
        )
    );

    $wp_customize->add_setting(
        'cover_overlay_color',
        array(
            'default'   => 'overlay-dark',
        )
    );

    $wp_customize->add_control(
        'cover_overlay_color',
        array(
            'type'      => 'select',
            'label'     => __( 'Overlay Color', 'cover' ),
            'section'   => 'cover_options',
            'choices'   => array(
                'overlay-dark'  => __( 'Dark', 'cover' ),
                'overlay-light' => __( 'Light', 'cover' ),
            ),
        )
    );

}
add_action( 'customize_register', 'cover_customize_register' );

function cover_customize_options() {
    $header_color = get_theme_mod( 'cover_header_color', '#026ed2' );
    ?>

<style>

/**
 * Set accent color
 */

a,
a:visited,
.entry-title a:hover,
.entry-subtitle a:hover {
    color: <?php echo $header_color; ?>;
}

a:hover {
    color: <?php echo sass_darken( $header_color, 15 ); ?>;
}

.paging-navigation a,
.header .backdrop,
ul.categories a ,
.cover,
body #infinite-handle span,
.button.default {
    background-color: <?php echo $header_color; ?>;
}

.paging-navigation a:hover,
body #infinite-handle span:hover,
.button.default:hover {
    background-color: <?php echo sass_darken( $header_color, 15 ); ?>;
}

body .infinite-loader .spinner {
    border-top-color: <?php echo $header_color; ?>;
}

/**
 * Restore default colors
 */

.header a,
.overlay-dark a,
.cover-header a {
    color: #fff;
}

.cover-subtitle a {
    color: rgba(255, 255, 255, 0.8);
}

.entry-title a {
    color: #222;
}

.entry-subtitle a {
    color: #999;
}

</style>

<meta name="theme-color" content="<?php echo $header_color; ?>">

<?php
}
add_action( 'wp_head', 'cover_customize_options' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cover_customize_preview_js() {
	wp_enqueue_script( 'cover_customizer', get_template_directory_uri() . '/js/customizer.min.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'cover_customize_preview_js' );
