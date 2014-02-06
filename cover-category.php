<?php
/**
 * @package Cover
 */
?>

<div id="cover" class="cover featured-image auto">
	<?php
		$cat = get_category( get_query_var( 'cat' ) );
		$cat_slug = $cat->slug;
	?>
	<div class="background darken" style="background-image: url('/assets/featured-image/category/<?php echo $cat_slug; ?>.jpg');"></div>
	<header>
		<h2><?php echo single_cat_title(); ?></h2>
		<?php
			// Show term description if it exists.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;
		?>
	</header>
</div>