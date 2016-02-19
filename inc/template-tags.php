<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Cover
 */

if ( ! function_exists( 'cover_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function cover_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'cover' ); ?></h1>
		<div class="nav-links cf">
			<?php
				if ( $previous ) {
					previous_post_link( '<div class="nav-previous">%link</div>', _x( '<h2 class="subtitle">' . __( 'Previous post', 'cover' ) . '</h2><h1 class="title">%title</h1>', 'Previous post link', 'cover' ) );
				}

				if ( $next ) {
					$next_img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'single-post-thumbnail' );
					$next_img = $next_img_array[0];
	        $class = '';
	        $style = '';
	        if ( '' != $next_img ) {
						$class = ' featured-image';
						$style = ' style="background-image: url(\'' . $next_img . '\')"';
	        }
	        next_post_link( '<div class="nav-next">%link</div>', _x( '<div class="cover' . $class . '"><div class="cover-background"' . $style . '></div><div class="cover-header"><h2 class="cover-subtitle">' . __( 'Next post', 'cover' ) . '</h2><h1 class="cover-title">%title</h1></div></div>', 'Next post link', 'cover' ) );
				}

			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'cover_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function cover_posted_on() {

	/*

	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

    printf( __( '<span class="posted-on">%1$s on %2$s</span>', 'cover' ),
		sprintf( '<a class="author vcard url fn n" href="%1$s">%2$s <span class="name">%3$s</span></a>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                get_avatar( get_the_author_meta( 'ID' ), 35, 'avatar_default', 'Profile Picture for ' . esc_html( get_the_author() ) ) . ' ',
                esc_html( get_the_author() )
		),
        sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			get_the_permalink(),
            $time_string
		)
	);

	*/

	// TODO relative date, like "2 days ago"

	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	?>

	<div class="posted-on">
		<div>
			<a class="author vcard url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 35, 'avatar_default', 'Profile Picture for ' . esc_html( get_the_author() ) ); ?>
				<span class="name"><?php echo esc_html( get_the_author() ); ?></span>
			</a>
		</div>
		<div>
			<a href="<?php echo get_the_permalink(); ?>" rel="bookmark">
				<i class="fa fa-fw fa-clock-o"></i>
				<?php //echo $time_string; ?>
				<?php
					// https://codex.wordpress.org/Function_Reference/human_time_diff
					printf(
						_x( '%s ago', '%s = human-readable time difference', 'cover' ),
						human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) )
					);
				?>
			</a>
		</div>
	</div>

	<?php

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		$format_class = $format;
		if ( 'link' == $format ) {
			$format_class = 'links';
		}
		printf( '<div class="entry-format">%1$s<a href="%2$s"><i class="dashicons dashicons-format-%3$s"></i> %4$s</a></div>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'cover' ) ),
			esc_url( get_post_format_link( $format ) ),
			$format_class,
			get_post_format_string( $format )
		);
	}

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function cover_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so cover_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so cover_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in cover_categorized_blog.
 */
function cover_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'cover_category_transient_flusher' );
add_action( 'save_post',     'cover_category_transient_flusher' );
