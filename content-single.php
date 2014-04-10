<?php
/**
 * @package Cover
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ('' == get_the_post_thumbnail()) { ?>
		<header class="entry-header">
			<h2>
				<?php the_category(', ') ?>
				
				<span class="post-format pull-right">
					<?php get_template_part( 'parts/postformat' ); ?>
				</span>
			</h2>
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry-meta">
				<?php cover_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'cover' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		
		<?php get_template_part( 'parts/author-bio' ); ?>
		
		<div class="cf">
			<?php $tag_list = get_the_tag_list( '<ul class="tag-list"><li>', '</li><li>', '</li></ul>' ); ?>
			<?php if ( '' != $tag_list ) { ?>
				<?php echo $tag_list; ?>
			<?php } ?>
			<?php edit_post_link( __( 'Edit', 'cover' ), '<span class="edit-link pull-right">', '</span>' ); ?>
		</div>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
