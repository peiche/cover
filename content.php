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
	
	<a class="cover" href="<?php the_permalink(); ?>" rel="bookmark"></a>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<?php if ('' != get_the_post_thumbnail()) { ?>
			<div class="entry-background" style="background-image: url('<?php echo $img[0]; ?>');"></div>
		<?php } ?>
	<?php endif; ?><!-- .entry-image -->
    
    <header class="entry-header">
        <h2><?php the_category(', ') ?></h2>
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
