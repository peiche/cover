<?php
/**
 * @package Cover
 */
?>

<?php $count = 0; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php if ($count == 0) { ?>

		<div class="cover featured-image auto">
			<?php if ('' != get_the_post_thumbnail()) { ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<?php } ?>
			<div class="background<?php if ('' != get_the_post_thumbnail()) { ?> darken" style="background-image: url('<?php echo $image[0]; ?>');<?php } ?>" data-0-top="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;"></div>
			<header>
                
                <h1>
                <?php
                    if ( is_category() ) :
                        single_cat_title();
                    
                    elseif ( is_tag() ) :
                        single_tag_title('#');

                    elseif ( is_day() ) :
                        printf( __( '%s', 'cover' ), get_the_date() );

                    elseif ( is_month() ) :
                        printf( __( '%s', 'cover' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'cover' ) ) );

                    elseif ( is_year() ) :
                        printf( __( '%s', 'cover' ), get_the_date( _x( 'Y', 'yearly archives date format', 'cover' ) ) );

                    elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                        _e( 'Asides', 'cover' );

                    elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
                        _e( 'Galleries', 'cover');

                    elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                        _e( 'Images', 'cover');

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

	<?php } ?>
	<?php $count++; ?>
<?php endwhile; ?><!-- end of loop -->