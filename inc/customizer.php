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
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_setting(
        'cover_overlay_color',
        array(
            'default'   => '#333333',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'cover_header_color', 
            array(
                'label'      => __( 'Header Color', 'cover' ),
                'section'    => 'colors',
                'settings'   => 'cover_header_color',
            )
        ) 
    );
    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'cover_overlay_color', 
            array(
                'label'      => __( 'Overlay Color', 'cover' ),
                'section'    => 'colors',
                'settings'   => 'cover_overlay_color',
            )
        ) 
    );
}
add_action( 'customize_register', 'cover_customize_register' );

function cover_customize_options() {
    $header_color = get_theme_mod( 'cover_header_color', '#026ed2' );
    $overlay_color = get_theme_mod( 'cover_overlay_color', '#333333' );
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

        .fotorama__thumb-border {
            border-color: <?php echo $header_color; ?>;
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

        /**
         * Set overlay color
         */
        .overlay {
            background-color: <?php echo $overlay_color; ?>;
        }
        
        <?php
            // TODO FIX THE CONTRAST
        ?>
        <?php if ( getContrast( $overlay_color ) == 'dark' ) { ?>
            .overlay a {
                border-color: #fff;
                color: #fff;
            }
            .overlay a:hover {
                color: #aaa;
            }
            .overlay .widget-area {
                color: #ccc;
            }
            .overlay .widget-area p {
                color: #fff;
            }
            .overlay .widget li a {
                border-color: #666;
            }
            .overlay .main-navigation a {
                border-bottom-color: #666;
            }
            .overlay .tagcloud a {
                border-color: transparent;
            }
            .overlay .tagcloud a:hover {
                border-color: #fff;
                color: #fff;
            }
            .overlay .sub-menu-toggle {
                color: #fff;
            }
            .overlay .sub-menu-toggle:hover {
                background-color: #666;
            }
            .overlay .search-field,
            .overlay .search-field:hover {
                color: #fff;
            }
        <?php } ?>

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
