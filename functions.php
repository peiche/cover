<?php
/**
 * Cover functions and definitions
 *
 * @package Cover
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1600; // actual content width is 760, but I prefer to unrestrict images from having a small width.
}

if ( ! function_exists( 'cover_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cover_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Cover, use a find and replace
	 * to change 'cover' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cover', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in multiple locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cover' ),
	) );
    register_nav_menus( array(
		'social_header' => __( 'Social Menu (Overlay)', 'cover' ),
	) );
    register_nav_menus( array(
		'social_footer' => __( 'Social Menu (Footer)', 'cover' ),
	) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

    // WordPress 4.1 and above
    add_theme_support( 'title-tag' );

}
endif; // cover_setup
add_action( 'after_setup_theme', 'cover_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function cover_widgets_init() {

    register_sidebar( array(
		'name'          => __( 'Overlay Widgets', 'cover' ),
		'id'            => 'cover-overlay',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'cover_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cover_scripts() {

    wp_enqueue_style( 'GoogleFonts', '//fonts.googleapis.com/css?family=Source+Code+Pro|Montserrat|Open+Sans:400,600' );
	wp_enqueue_style( 'cover-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'cover-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );
	wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/js/skrollr.min.js', array(), '20140821', true );
    wp_enqueue_script( 'headroom', get_template_directory_uri() . '/js/headroom.min.js', array(), '20140814', true );
	wp_enqueue_script( 'cover-lib', get_template_directory_uri() . '/js/cover.min.js', array(), '20140210', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cover_scripts' );

/*
 * Color contrast calculations.
 * @link http://24ways.org/2010/calculating-color-contrast/
 */
function getContrast50( $hexcolor ) {
    return ( hexdec( $hexcolor ) > 0xffffff / 2 ) ? 'light' : 'dark';
}
function getContrastYIQ( $hexcolor ) {
	$r = hexdec( substr( $hexcolor, 0, 2 ) );
	$g = hexdec( substr( $hexcolor, 2, 2 ) );
	$b = hexdec( substr( $hexcolor, 4, 2 ) );
	$yiq = ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000;
	
    return ( $yiq >= 128 ) ? 'light' : 'dark';
}
/*
 * Leave the function that you want uncommented. 
 */
function getContrast( $hexcolor ) {
    return 
        //getContrast50( $hexcolor )
        getContrastYIQ( $hexcolor )
        ;
}

/*
 * Utility function to convert a hexidecimal color to rgb.
 * @link http://css-tricks.com/snippets/php/convert-hex-to-rgb/
 */
function hex2rgb( $colour ) {
        if ( $colour[0] == '#' ) {
                $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
                return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Alter color brightness
 * @link http://jaspreetchahal.org/how-to-lighten-or-darken-hex-or-rgb-color-in-php-and-javascript/
 * @param $color_code
 * @param int $percentage_adjuster
 * @return array|string
 * @author Jaspreet Chahal
 */
function adjustColorLightenDarken($color_code,$percentage_adjuster = 0) {
    $percentage_adjuster = round($percentage_adjuster/100,2);
    if(is_array($color_code)) {
        $r = $color_code["r"] - (round($color_code["r"])*$percentage_adjuster);
        $g = $color_code["g"] - (round($color_code["g"])*$percentage_adjuster);
        $b = $color_code["b"] - (round($color_code["b"])*$percentage_adjuster);
 
        return array("r"=> round(max(0,min(255,$r))),
            "g"=> round(max(0,min(255,$g))),
            "b"=> round(max(0,min(255,$b))));
    }
    else if(preg_match("/#/",$color_code)) {
        $hex = str_replace("#","",$color_code);
        $r = (strlen($hex) == 3)? hexdec(substr($hex,0,1).substr($hex,0,1)):hexdec(substr($hex,0,2));
        $g = (strlen($hex) == 3)? hexdec(substr($hex,1,1).substr($hex,1,1)):hexdec(substr($hex,2,2));
        $b = (strlen($hex) == 3)? hexdec(substr($hex,2,1).substr($hex,2,1)):hexdec(substr($hex,4,2));
        $r = round($r - ($r*$percentage_adjuster));
        $g = round($g - ($g*$percentage_adjuster));
        $b = round($b - ($b*$percentage_adjuster));
 
        return "#".str_pad(dechex( max(0,min(255,$r)) ),2,"0",STR_PAD_LEFT)
            .str_pad(dechex( max(0,min(255,$g)) ),2,"0",STR_PAD_LEFT)
            .str_pad(dechex( max(0,min(255,$b)) ),2,"0",STR_PAD_LEFT);
 
    }
}

/*

USAGE:

// lightening colors
print_r(adjustColorLightenDarken(array("r"=>204,
                                "g"=>136,
                                "b"=>0),-5));
//outputs 
//Array
//(
//    [r] => 214
//    [g] => 143
//    [b] => 0
//)
print_r(adjustColorLightenDarken("#C80",-5));
// outputs #d68f00

// darkening colors
print_r(adjustColorLightenDarken(array("r"=>204,
                                "g"=>136,
                                "b"=>0),5));
//outputs 
//Array
//(
//    [r] => 194
//    [g] => 129
//    [b] => 0
//)
print_r(adjustColorLightenDarken("#C80",5));
// outputs #c28100

*/

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Aesop Story Engine compatibility.
 */
require get_template_directory() . '/inc/aesop.php';
