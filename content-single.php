<?php
/**
 * @package Beats
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ('' == get_the_post_thumbnail()) { ?>
	<header class="entry-header">
		<h2><?php the_category(', ', 'multiple') ?></h2>
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php beats_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'beats' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'beats' ) );

			$meta_text = __( '<i class="fa fa-tag"></i> %2$s', 'beats' );

			printf(
				$meta_text,
				$tag_list
			);
		?>

		<?php edit_post_link( __( 'Edit', 'beats' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
