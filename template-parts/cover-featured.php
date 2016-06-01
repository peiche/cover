<?php
/**
 * Include for Jetpack featured content
 *
 * @package Cover
 */

?>

<div class="featured-container">

	<ul class="featured-list">

	<?php
		$img = '';
		$featured_posts = cover_get_featured_posts();
		foreach ( (array) $featured_posts as $order => $post ) :
			setup_postdata( $post );
			$img = cover_get_featured_image( $post->ID );
	?>

		<li class="featured-list-item">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<div class="cover<?php if ( '' != $img ) { ?> featured-image<?php } ?>">
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
