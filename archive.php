<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cover
 */

get_header(); ?>

<?php get_template_part( 'parts/wrapper', 'top' ); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			
			<div class="notification">
				<span class="ntitle">
					
					<?php
						if ( is_tag() ) :
							_e( 'Tag', 'cover');
							
						elseif ( is_day() ) :
							_e( 'Day', 'cover');

						elseif ( is_month() ) :
							_e( 'Month', 'cover');

						elseif ( is_year() ) :
							_e( 'Year', 'cover');

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
					
				</span>
				<span class="message">
					
					<?php
						if ( is_tag() ) :
							single_tag_title();
							
						elseif ( is_day() ) :
							printf( __( '%s', 'cover' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( '%s', 'cover' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'cover' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( '%s', 'cover' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'cover' ) ) . '</span>' );

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
					
				</span>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-times"></i></a>
			</div>
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content' ); ?>

			<?php endwhile; ?>

			<?php cover_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
