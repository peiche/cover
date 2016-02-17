<?php
/**
 * The template used for displaying single page content
 *
 * @package Cover
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content aesop-entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'cover' ),
				'after'  => '</div>',
				'link_before' => '<span class="button small">',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">

		<?php
			$categories = get_the_category();
			if ( $categories && cover_categorized_blog() ) {
		?>
      <ul class="categories">
	      <?php
	        foreach ( $categories as $category ) {
	    			echo '<li><a href="' . get_tag_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( 'View all posts in %s', 'cover' ), $category->name ) ) . '">' . $category->name . '</a></li>';
	        }
	      ?>
      </ul>
    <?php } ?>

		<?php
			$tags = get_the_tags();
			if ( $tags ) {
		?>
      <ul class="tags">
	      <?php
	        foreach ( $tags as $tag ) {
	    			echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . esc_attr( sprintf( __( 'View all posts in %s', 'cover' ), $tag->name ) ) . '">' . $tag->name . '</a></li>';
	        }
	      ?>
      </ul>
    <?php } ?>

    <?php edit_post_link( __( '<i class="fa fa-pencil"></i> Edit', 'cover' ), '<div><span class="edit-link">', '</span></div>' ); ?>

		<?php if ( 'thread' != get_post_type() ) { ?>
			<?php get_template_part( 'template-parts/author-bio' ); ?>
		<?php } ?>

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
