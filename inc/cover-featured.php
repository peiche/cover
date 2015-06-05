<?php
/**
 * Include for Jetpack featured content
 *
 * @package Cover
 */

?>

<div class="featured-container">

	<?php
		$featured_posts = cover_get_featured_posts();
		foreach ( (array) $featured_posts as $order => $post ) :
			setup_postdata( $post );

			if ( '' != get_the_post_thumbnail() ) {
                $img_arr = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
				$img = $img_arr[0];
			}
	?>

	
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<div class="cover<?php if ( '' != $img ) { ?> featured-image<?php } ?>">
				<div class="cover-background"<?php if ( '' != $img ) { ?> style="background-image: url('<?php echo $img; ?>');"<?php } ?>></div>
				<header class="cover-header">
					<h1 class="cover-title"><?php the_title(); ?></h1>
                    <div class="cover-summary">
					<?php
						if ( has_excerpt() ) {
                            the_excerpt();
                        } else if ( strpos( $post->post_content, '<!--more-->' ) ) {
                            the_content( '' ); // No "more" link.
                        } else {
                            the_excerpt();
                        }
					?>
					</div>
				</header>
			</div>
		</a>
	

	<?php
		endforeach;

		wp_reset_postdata();
	?>

</div>
