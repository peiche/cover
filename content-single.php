<?php
/**
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
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">

		<?php
			$categories = get_the_category();
            $tags = get_the_tags();
        ?>

        <?php if ( $categories ) { ?>
        <ul class="categories">
		<?php
			foreach( $categories as $category ) {
				echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __("View all posts in %s" ), $category->name ) ) . '">' . $category->name . '</a></li>';
			}
		?>
		</ul>
		<?php } ?>

        <?php if ( $tags ) { ?>
        <ul class="tags">
        <?php
                foreach( $tags as $tag ) {
            		echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . esc_attr( sprintf( __("View all posts in %s" ), $tag->name ) ) . '">' . $tag->name . '</a></li>';
                }
        ?>
        </ul>
        <?php } ?>

        <?php edit_post_link( __( '<i class="fa fa-pencil"></i> Edit', 'cover' ), '<div><span class="edit-link">', '</span></div>' ); ?>

		<?php get_template_part( 'parts/author-bio' ); ?>

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
