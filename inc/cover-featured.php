<?php
/**
 * @package Cover
 */
?>

<div class="featured-container">

	<?php
		/**
		 * Fires before the Cover featured content.
		 */
		do_action( 'cover_featured_posts_before' );

		$featured_posts = cover_get_featured_posts();
		foreach ( (array) $featured_posts as $order => $post ) :
			setup_postdata( $post );

			if ( '' != get_the_post_thumbnail() ) {
				$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
			}
	?>

	
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<div class="cover<?php if ( '' != $img ) { ?> featured-image<?php } ?>">
				<div class="background"<?php if ( '' != $img ) { ?> style="background-image: url('<?php echo $img; ?>');"<?php } ?>></div>
				<header class="cover-header">
					<h1 class="cover-title"><?php the_title(); ?></h1>
					<h2 class="cover-summary">
					<?php 
						$pos = strpos( $post->post_content, '<!--more-->' );
						if ( $pos ) {
							echo get_the_content( __( '', 'cover' ) );
						} else {
							echo get_the_excerpt();
						}
					?>
					</h2>
				</header>
			</div>
		</a>
	

	<?php
		endforeach;

		/**
		 * Fires after the Cover featured content.
		 */
		do_action( 'cover_featured_posts_after' );

		wp_reset_postdata();
	?>

</div>
