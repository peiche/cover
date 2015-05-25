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
    $wp_customize->remove_section( 'colors' );

    $wp_customize->add_section( 'cover_options', array(
        'title' 		=> __( 'Cover Theme Options', 'cover' )
    ) );

    $wp_customize->add_setting( 'cover_accent_color', array(
        'default' 		=> '#026ed2', // default blue
        'type' 			=> 'option'
    ) );
    
    $wp_customize->add_setting( 'cover_link_color', array(
        'default' 		=> '#026ed2', // default blue
        'type' 			=> 'option'
    ) );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'cover_accent_color', 
            array(
                'label'      => __( 'Accent Color', 'cover' ),
                'section'    => 'cover_options',
                'settings'   => 'cover_accent_color',
            )
        ) 
    );
    
    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'cover_text_color', 
            array(
                'label'      => __( 'Link Color', 'cover' ),
                'section'    => 'cover_options',
                'settings'   => 'cover_link_color',
            )
        ) 
    );

}
add_action( 'customize_register', 'cover_customize_register' );

function cover_customize_options() {
    $accent_color = get_option( 'cover_accent_color' );
    $link_color = get_option( 'cover_link_color' );
    $contrast = getContrast( $accent_color );
    if ( $contrast == 'light' ) {
        $text_color_hex = '#000000';
    } else {
        $text_color_hex = '#ffffff';
    }
    $text_color_rgb = hex2rgb( $text_color_hex );
    ?>

<style>

/**
 * Set accent color
 */

a,
a:visited,
.entry-title a:hover,
.entry-subtitle a:hover {
    color: <?php echo $link_color; ?>;
}

a:hover {
    color: <?php echo sass_darken( $link_color, 15 ); ?>;
}

.paging-navigation a,
.header .backdrop,
ul.categories a ,
.cover,
body #infinite-handle span {
    background-color: <?php echo $accent_color; ?>;
}

body .infinite-loader .spinner {
    border-top-color: <?php echo $accent_color; ?>;
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

/**
 * Override colors based on accent color
 */

.header a,
.header .site-description {
    color: <?php echo $text_color_hex; ?>;
}

.header .site-description {
    border-color: rgba(<?php echo $text_color_rgb[ 'red' ]; ?>, <?php echo $text_color_rgb[ 'green' ]; ?>, <?php echo $text_color_rgb[ 'blue' ]; ?>, .25);
}

.header a:hover {
    border-color: <?php echo $text_color_hex; ?>;
}

.hamburger span,
.hamburger span:after,
.hamburger span:before {
    background-color: <?php echo $text_color_hex; ?>;
}

</style>

<meta name="theme-color" content="<?php echo $accent_color; ?>">

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
