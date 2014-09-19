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
		'social' => __( 'Social Menu', 'cover' ),
	) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
    
	// Enable featured content.
    // leaving this commented out until I think of a good use for this.
    /*
	add_theme_support( 'featured-content', array(
		'filter'		=> 'cover_get_featured_posts',
        'max_posts'     => 1
	) );
    */
}
endif; // cover_setup
add_action( 'after_setup_theme', 'cover_setup' );

 /**
 * Getter function for Featured Content Plugin.
 *
 * @return array An array of WP_Post objects.
 */
function cover_get_featured_posts() {
	return apply_filters( 'cover_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @return bool Whether there are featured posts.
 */
function cover_has_featured_posts() {
	return ! is_paged() && (bool) cover_get_featured_posts();
}

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function cover_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Overlay [≡] (above menus)', 'cover' ),
		'id'            => 'overlay-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    register_sidebar( array(
		'name'          => __( 'Overlay [≡] (between menus)', 'cover' ),
		'id'            => 'overlay-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    register_sidebar( array(
		'name'          => __( 'Overlay [≡] (below menus)', 'cover' ),
		'id'            => 'overlay-3',
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
	
    wp_enqueue_style( 'GoogleFonts', 'http://fonts.googleapis.com/css?family=Source+Code+Pro|Montserrat|Open+Sans:400,600' );
	wp_enqueue_style( 'cover-style', get_stylesheet_uri() );
    
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'cover-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.js', array(), '20140508', true );
    wp_enqueue_script( 'skrollr', get_template_directory_uri() . '/js/skrollr.js', array(), '20140821', true );
    wp_enqueue_script( 'headroom', get_template_directory_uri() . '/js/headroom.min.js', array(), '20140814', true );
    wp_enqueue_script( 'cover-lib', get_template_directory_uri() . '/js/cover.min.js', array(), '20140210', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cover_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Aesop Story Engine overrides
 * ----------------------------
 */

if (!function_exists('aesop_quote_shortcode')){

	function aesop_quote_shortcode($atts, $content = null) {

		$defaults = array(
			'width'		=> '100%',
			'background' => '#222222',
			'img'		=> '',
			'text' 		=> '#FFFFFF',
			'height'	=> 'auto',
			'align'		=> 'left',
			'size'		=> '4',
			'parallax'  => '',
			'direction' => '',
			'quote'		=> '',
			'cite'		=> '',

		);
		$atts = apply_filters('aesop_quote_defaults',shortcode_atts($defaults, $atts));

		// let this be used multiple times
		static $instance = 0;
		$instance++;
		$unique = sprintf('%s-%s',get_the_ID(), $instance);

		// set component to content width
		$contentwidth = 'content' == $atts['width'] ? 'aesop-content' : false;

		// set size
		$size = $atts['size'] ? sprintf('%srem', $atts['size']) : false;

		//bg img
		$bgimg = $atts['img'] ? sprintf('background-image:url(%s);background-size:cover;background-position:center center',$atts['img']) : false;

		// set styles
		$style = $atts['background'] || $atts['text'] || $atts['height'] || $atts['width'] ? sprintf('style="background-color:%s;%s;color:%s;height:%s;width:%s;"',$atts['background'], $bgimg, $atts['text'], $atts['height'], $atts['width']) : false;

		$isparallax = 'on' == $atts['parallax'] ? 'quote-is-parallax' : false;
		$lrclass	= 'left' == $atts['direction'] || 'right' == $atts['direction'] ? 'quote-left-right' : false;

		// custom classes
		$classes = function_exists('aesop_component_classes') ? aesop_component_classes( 'quote', '' ) : null;

		// cite
		$cite = $atts['cite'] ? apply_filters('aesop_quote_component_cite',sprintf('<cite class="aesop-quote-component-cite">%s</cite>',$atts['cite'])) : null;

		//align
		$align = $atts['align'] ? sprintf('aesop-component-align-%s', $atts['align']) : null;

		ob_start();

		do_action('aesop_quote_before'); //action
		?>
			<div id="aesop-quote-component-<?php echo $unique;?>" class="aesop-component aesop-quote-component <?php echo $classes.' '.$align.' '.$contentwidth.' '.$isparallax.' '.$lrclass.' ';?>" <?php echo $style;?>>

				<!-- Aesop Core | Quote -->
				<script>
					jQuery(document).ready(function(){

						var moving 		= jQuery('#aesop-quote-component-<?php echo $unique;?> blockquote'),
							component   = jQuery('#aesop-quote-component-<?php echo $unique;?>');

						// if parallax is on and we're not on mobile
						<?php if ( 'on' == $atts['parallax'] && !wp_is_mobile() ) { ?>

					       	function scrollParallax(){
					       	    var height 			= jQuery(component).height(),
        	        				offset 			= jQuery(component).offset().top,
						       	    scrollTop 		= jQuery(window).scrollTop(),
						       	    windowHeight 	= jQuery(window).height(),
						       	    position 		= Math.round( scrollTop * 0.1 );

						       	// only run parallax if in view
						       	if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
									return;
								}

					            jQuery(moving).css({'transform':'translate3d(0px,-' + position + 'px, 0px)'});

					       	    <?php if ('left' == $atts['direction']){ ?>
					            	jQuery(moving).css({'transform':'translate3d(-' + position + 'px, 0px, 0px)'});
					            <?php } elseif ( 'right' == $atts['direction'] ) { ?>
									jQuery(moving).css({'transform':'translate3d(' + position + 'px, 0px, 0px)'});
					            <?php } ?>
					       	}
					       	jQuery(component).waypoint({
								offset: '100%',
								handler: function(direction){
						   			jQuery(this).toggleClass('aesop-quote-faded');

						   			// fire parallax
						   			scrollParallax();
									jQuery(window).scroll(function() {scrollParallax();});
							   	}
							});

						<?php } else { ?>

							jQuery(moving).waypoint({
								offset: 'bottom-in-view',
								handler: function(direction){
							   		jQuery(this).toggleClass('aesop-quote-faded');

							   	}
							});
						<?php } ?>

					});
				</script>

				<?php do_action('aesop_quote_inside_top'); //action ?>

				<blockquote class="<?php echo $align;?>" style="font-size:<?php echo $size;?>;">
					<?php echo $atts['quote'];?>

					<?php echo $cite;?>
				</blockquote>

				<?php do_action('aesop_quote_inside_bottom'); //action ?>

			</div>
		<?php
		do_action('aesop_quote_after'); //action

		return ob_get_clean();
	}
}