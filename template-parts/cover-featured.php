<?php
/**
 * Include for Jetpack featured content
 *
 * @package Cover
 */

?>

<div class="slider-container">

	<ul class="slider-list">

	<?php
		$img = '';
		$featured_posts = cover_get_featured_posts();
		foreach ( (array) $featured_posts as $order => $post ) :
			setup_postdata( $post );
			$img = cover_get_featured_image( $post->ID );
	?>

		<li class="slider-list-item">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<div class="cover<?php if ( '' != $img ) { ?> featured-image<?php } ?>">
					<?php if ( function_exists( 'has_post_video' ) && has_post_video() ) { ?>
						<span class="svg-icon"><?php get_template_part( 'dist/svg/play', 'circle.svg' ); ?></span>
					<?php } ?>
					<div class="cover-background"<?php if ( '' != $img ) { ?> style="background-image: url('<?php echo $img; ?>');"<?php } ?>></div>
					<header class="cover-header">
						<h2 class="cover-subtitle">Featured</h2>
						<h1 class="cover-title"><?php the_title(); ?></h1>
					</header>
				</div>
			</a>
		</li>

	<?php
		endforeach;

		wp_reset_postdata();
	?>

	</ul>
</div>
