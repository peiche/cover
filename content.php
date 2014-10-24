<?php
/**
 * @package Cover
 */
?>

<?php
if ( has_post_thumbnail() ) {
	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <header class="entry-header">
        <h2 class="entry-subtitle"><?php the_category(', ') ?></h2>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <div class="entry-meta">
            <?php cover_posted_on(); ?>
        </div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
	<div class="entry-summary">
		<?php 

		$pos = strpos( $post->post_content, '<!--more-->' );
		if ( $pos ) {
			the_content( __( '', 'cover' ) );
		} else {
			the_excerpt();
		}

		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'cover' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->
