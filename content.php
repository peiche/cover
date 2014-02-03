<?php
/**
 * @package Beats
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2>
			<?php the_category(', ') ?>
			
			<span class="post-format pull-right">
				<?php $format = get_post_format( $post_id ); ?>
				<?php if ('video' == $format){ ?>
					<i class="fa fa-youtube-play fa-sm"></i>
				<?php } else if ('quote' == $format){ ?>
					<i class="fa fa-quote-right fa-sm"></i>
				<?php } ?>
			</span>
		</h2>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php beats_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php if ( is_search() ) { // Only display Excerpts for Search ?>
			<?php the_excerpt(); ?>
		<?php } else { ?>
			<?php the_content( __( 'Continue reading <i class="fa fa-chevron-right"></i>', 'beats' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'beats' ),
					'after'  => '</div>',
				) );
			?>
		<?php } ?>
	</div><!-- .entry-summary -->
	
	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'beats' ) );
				if ( $tags_list ) :
			?>
			<div class="tags-links">
				<?php printf( __( '<i class="fa fa-tag"></i> %1$s', 'beats' ), $tags_list ); ?>
			</div>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'beats' ), __( '1 Comment', 'beats' ), __( '% Comments', 'beats' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'beats' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	<!-- .entry-meta -->
	
</article><!-- #post-## -->
