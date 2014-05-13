<?php
/**
 * @package Cover
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
		$show_header = true;
		if ('' != get_the_post_thumbnail() || get_post_format() == 'quote') {
			$show_header = false;
		}
	?>
	
	<?php if ($show_header) { ?>
		<header class="entry-header">
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
		
        <?php

            $categories = get_the_category();
            if ( $categories ) {
                foreach ( $categories as $category ) {
                    echo '<a class="btn" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">' . $category->cat_name . '</a>';
                }
            }

            $tags = get_the_tags();
            if ( $tags ) {
                foreach( $tags as $tag ) {
                    echo '<a class="btn gray" href="' . get_tag_link( $tag->term_id ) . '" title="' . esc_attr( sprintf( __("View all posts in %s" ), $tag->name ) ) . '">' . $tag->name . '</a>'; 
                }
            }

        ?>
		
        <?php edit_post_link( __( '<i class="fa fa-pencil"></i> Edit', 'cover' ), '<div><span class="edit-link">', '</span></div>' ); ?>
		
		<?php get_template_part( 'parts/author-bio' ); ?>

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
