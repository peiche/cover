<?php
/**
 * @package Cover
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry-image">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'single-post-thumbnail' ); ?></a>
		</figure>
	<?php endif; ?><!-- .entry-image -->
    
    <header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		
        <?php 
        
        $pos = strpos( $post->post_content, '<!--more-->' );
        if ( $pos ) {
            // the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'cover' ) );
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
