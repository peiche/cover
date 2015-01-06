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
    
    $wp_customize->add_setting( 'cover_header_background_color', array(
        'default' 		=> '#333333',
        'type' 			=> 'option'
    ) );
    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'cover_header_background_color', 
        array(
            'label'      => __( 'Header Background Color', 'cover' ),
            'section'    => 'cover_options',
            'settings'   => 'cover_header_background_color',
        ) ) 
    );
    
    $wp_customize->add_setting( 'cover_header_text_color', array(
        'default' 		=> '#ffffff',
        'type' 			=> 'option'
    ) );
    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'cover_header_text_color', 
        array(
            'label'      => __( 'Header Text Color', 'cover' ),
            'section'    => 'cover_options',
            'settings'   => 'cover_header_text_color',
        ) ) 
    );
}
add_action( 'customize_register', 'cover_customize_register' );

function cover_customize_options() {
    $header_background_color = get_option( 'cover_header_background_color' );
    $header_text_color = get_option( 'cover_header_text_color' );
    $header_text_color_rgb = hex2rgb( $header_text_color );
    ?>
    
    <style>
    .header .backdrop,
    .cover {
        background-color: <?php echo $header_background_color; ?> !important; /* remove !important once custom css is back in stylesheet */
    }
    
    .header a,
    .header .site-description {
        color: <?php echo $header_text_color; ?>;
    }
    
    .header a:hover,
    .header .author:hover .name {
        border-color: <?php echo $header_text_color; ?>;
    }
    
    .header .site-description {
        border-color: rgba(<?php echo $header_text_color_rgb[ 'red' ]; ?>, <?php echo $header_text_color_rgb[ 'green' ]; ?>, <?php echo $header_text_color_rgb[ 'blue' ]; ?>, .25);
    }
    
    .hamburger span,
    .hamburger span:before,
    .hamburger span:after {
        background-color: <?php echo $header_text_color; ?>;
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
