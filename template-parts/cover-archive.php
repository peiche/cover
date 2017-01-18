<?php
/**
 * Header for archive page
 *
 * @package Cover
 */

?>

<?php $img = cover_get_first_featured_image(); ?>

<div class="cover">
	<div class="cover-background<?php if ( '' != $img ) { ?> darken" style="background-image: url('<?php echo $img; ?>');<?php } ?>"></div>
	<header class="cover-header">

		<h1 class="cover-title">
		<?php
			if ( is_category() ) :
				single_cat_title();

			elseif ( is_tag() ) :
        single_tag_title();

			elseif ( is_day() ) :
				printf( get_the_date() );

      elseif ( is_month() ) :
        printf( get_the_date( 'F Y' ) );

      elseif ( is_year() ) :
        printf( get_the_date( 'Y' ) );

			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				_e( 'Asides', 'cover' );

			elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
				_e( 'Galleries', 'cover' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				_e( 'Images', 'cover' );

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				_e( 'Videos', 'cover' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				_e( 'Quotes', 'cover' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				_e( 'Links', 'cover' );

			elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
				_e( 'Statuses', 'cover' );

			elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
				_e( 'Audios', 'cover' );

			elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
				_e( 'Chats', 'cover' );

			elseif ( is_search() ) :
				_e( 'Results for &quot;', 'cover' ) . the_search_query() . _e( '&quot;', 'cover' );

			elseif ( is_tax() ) :
				single_term_title();

			else :
				_e( 'Archives', 'cover' );

			endif;
		?>
		</h1>

		<?php
			// Show term description if it exists.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;
		?>
	</header>
</div>
