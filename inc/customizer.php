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
    //$wp_customize->remove_section( 'colors' );

    /*
    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'cover_accent_color', 
            array(
                'label'      => __( 'Accent Color', 'cover' ),
                'section'    => 'colors',
                'settings'   => 'cover_accent_color',
            )
        ) 
    );
    */
    

    $wp_customize->add_section( 'cover_options', array(
        'title' 		=> __( 'Cover Theme Options', 'cover' )
    ) );

    $wp_customize->add_setting(
        'cover_color_scheme',
        array(
            'default'   => '#026ed2',
        )
    );

    $wp_customize->add_control(
        'cover_color_scheme',
        array(
            'type'    => 'select',
            'label'   => 'Color Scheme',
            'section' => 'cover_options',
            'choices' => array(
                '#026ed2'   => 'Blue',
                '#f44336'   => 'Red',
                '#4caf50'   => 'Green',
                '#e91e63'   => 'Pink',
                '#9c27b0'   => 'Purple',
                '#2b2b2b'   => 'Gray',
            ),
        )
    );

}
add_action( 'customize_register', 'cover_customize_register' );

function cover_customize_options() {
    $color_scheme = get_theme_mod( 'cover_color_scheme', '#026ed2' )
    ?>

<style>

/**
 * Set accent color
 */

a,
a:visited,
.entry-title a:hover,
.entry-subtitle a:hover {
    color: <?php echo $color_scheme; ?>;
}

a:hover {
    color: <?php echo sass_darken( $color_scheme, 15 ); ?>;
}

.paging-navigation a:hover,
body #infinite-handle span:hover {
    background-color: <?php echo sass_darken( $color_scheme, 15 ); ?>;
}

.paging-navigation a,
.header .backdrop,
ul.categories a ,
.cover,
body #infinite-handle span {
    background-color: <?php echo $color_scheme; ?>;
}

body .infinite-loader .spinner {
    border-top-color: <?php echo $color_scheme; ?>;
}

/**
 * Restore default colors
 */

.header a,
.overlay a,
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

<meta name="theme-color" content="<?php echo $color; ?>">

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
