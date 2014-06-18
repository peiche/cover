<?php
/**
 * @package Cover
 */
?>

<div id="cover-home" class="swiper-container">
	<div class="swiper-wrapper">
		
		<?php
			/**
			 * Fires before the Cover featured content.
			 */
			do_action( 'cover_featured_posts_before' );

			$featured_posts = cover_get_featured_posts();
			foreach ( (array) $featured_posts as $order => $post ) :
				setup_postdata( $post );

				 // Include the featured content template.
				get_template_part( 'parts/cover', 'featured-post' );
			endforeach;

			/**
			 * Fires after the Cover featured content.
			 */
			do_action( 'cover_featured_posts_after' );

			wp_reset_postdata();
		?>
	</div>
	
    <span id="cover-home-left" class="fa fa-angle-left fa-fw <?php if ( sizeof( $featured_posts ) < 2) { ?>hide<?php } ?>"></span>
    <span id="cover-home-right" class="fa fa-angle-right fa-fw <?php if ( sizeof( $featured_posts ) < 2) { ?>hide<?php } ?>"></span>

    <div class="swiper-pagination <?php if ( sizeof( $featured_posts ) < 2) { ?>hide<?php } ?>"></div>
	
</div>