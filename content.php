<?php
/**
 * @package Cover
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2>
			<?php the_category(', ') ?>
			
			<span class="post-format pull-right">
				<?php get_template_part( 'parts/postformat' ); ?>
			</span>
		</h2>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php cover_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php if ( is_search() ) { // Only display Excerpts for Search ?>
			<?php the_excerpt(); ?>
		<?php } else { ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'cover' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'cover' ),
					'after'  => '</div>',
				) );
			?>
		<?php } ?>
	</div><!-- .entry-summary -->
	
</article><!-- #post-## -->
