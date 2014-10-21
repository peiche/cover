<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package Cover
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses cover_header_style()
 * @uses cover_admin_header_style()
 * @uses cover_admin_header_image()
 *
 * @package Cover
 */
function cover_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'cover_custom_header_args', array(
		'default-image'          => '',
		'width'                  => 1600,
		'wp-head-callback'       => 'cover_header_style',
		'admin-head-callback'    => 'cover_admin_header_style',
		'admin-preview-callback' => 'cover_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'cover_custom_header_setup' );

if ( ! function_exists( 'cover_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see cover_custom_header_setup().
 */
function cover_header_style() {
	if ( get_header_image() ) {
    ?>
	<style type="text/css">
        .home .cover.featured-image .background,
        .blog .cover.featured-image .background,
		.archive .cover.featured-image .background,
		.search .cover.featured-image .background {
            background-image: url('<?php echo get_header_image(); ?>') !important;
        }
	</style>
	<?php
    }
}
endif; // cover_header_style

if ( ! function_exists( 'cover_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see cover_custom_header_setup().
 */
function cover_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
	</style>
<?php
}
endif; // cover_admin_header_style

if ( ! function_exists( 'cover_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see cover_custom_header_setup().
 */
function cover_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( function_exists( 'has_site_logo' ) && has_site_logo() ) : ?>
            <img src="<?php echo esc_url( get_site_logo( 'url' ) ); ?>" class="site-logo" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <?php endif; // End site logo check. ?>
        <h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // cover_admin_header_image
