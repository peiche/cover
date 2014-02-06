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
				<?php get_template_part( 'postformatglyph' ); ?>
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
			<?php the_content( __( 'Continue reading <span class=\"meta-nav\">&rarr;</span>', 'beats' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'beats' ),
					'after'  => '</div>',
				) );
			?>
		<?php } ?>
	</div><!-- .entry-summary -->
	
	<footer class="entry-meta cf">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'beats' ) );
				if ( $tags_list ) :
			?>
			<div class="tags-links pull-left">
				<?php printf( __( '<i class="fa fa-tag"></i> %1$s', 'beats' ), $tags_list ); ?>
			</div>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>
		
		<?php edit_post_link( __( 'Edit', 'beats' ), '<span class="edit-link pull-right">', '</span>' ); ?>
	</footer>
	<!-- .entry-meta -->
	
</article><!-- #post-## -->
