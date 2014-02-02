<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Beats
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" type="text/css">

<link href="http://fonts.googleapis.com/css?family=Domine:700|Open+Sans:400,600|Source+Code+Pro:500" rel="stylesheet" type="text/css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="title">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-bookmark-o fa-lg"></i><span><?php bloginfo( 'name' ); ?></span></a>
</header>

<nav id="site-navigation" class="main-navigation<?php if ((is_single() || is_page() || is_author() || is_category() || is_tag()) && '' != get_the_post_thumbnail()) { ?> featured-image<?php } ?>" role="navigation">
	<a class="bars" href="#"><i class="fa fa-align-justify fa-lg"></i></a>
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
</nav>

<?php if ((is_single() || is_page()) && '' != get_the_post_thumbnail()) { ?>
	<div id="cover" class="cover featured-image">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div class="background" style="background-image: url('<?php echo $image[0]; ?>');"></div>
		<header>
			
			<?php if (is_single()) { ?>
				<h2><?php the_category(', ') ?></h2>
			<?php } else if (is_page() && $post->post_parent) { ?>
				<?php
					$parent_permalink = get_permalink($post->post_parent);
					$parent_title = get_the_title($post->post_parent);
				?>
				<h2><a href="<?php echo $parent_permalink; ?>"><?php echo $parent_title; ?></a></h2>
			<?php } ?>
			
			<h1><a href="#"><?php the_title(); ?></a></h1>
			
			<?php if (is_single()) { ?>
				<span>
					<?php beats_posted_on(); ?>
				</span>
			<?php } ?>
		</header>
	</div>
<?php } ?>

<?php if (is_author()) { ?>
	<div id="cover" class="cover auto featured-image">
		<header>
			<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
			<h2 class="align-center">Posts by <?php echo get_the_author(); ?></h2>
		</header>
	</div>
<?php } ?>

<?php if (is_category()) { ?>
	<div id="cover" class="cover auto featured-image">
		<?php
			$cat = get_category( get_query_var( 'cat' ) );
			$cat_slug = $cat->slug;
		?>
		<div class="background darken" style="background-image: url('/assets/featured-image/category/<?php echo $cat_slug; ?>.jpg');"></div>
		<header>
			<h2><?php echo single_cat_title(); ?></h2>
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
		</header>
	</div>
<?php } ?>

<?php if (is_tag()) { ?>
	<div id="cover" class="cover auto featured-image">
		<div class="background"></div>
		<header>
			<h2><i class="fa fa-tag"></i> <?php echo single_tag_title(); ?></h2>
		</header>
	</div>
<?php } ?>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<!-- #masthead -->
	
	<div id="content" class="site-content">
