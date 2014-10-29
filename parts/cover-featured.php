<?php
/**
 * @package Cover
 */
?>

<?php
    /**
     * Fires before the Cover featured content.
     */
    do_action( 'cover_featured_posts_before' );

    $featured_posts = cover_get_featured_posts();
    foreach ( (array) $featured_posts as $order => $post ) :
        setup_postdata( $post );
?>

<?php
    if ( '' != get_the_post_thumbnail() ) {
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
    }
?>

<div class="cover">
    <div class="background"<?php if ( '' != $img ) { ?> style="background-image: url('<?php echo $img; ?>');"<?php } ?>></div>
    
    <header class="cover-header">

        <h2 class="cover-subtitle">Featured</h2>
        
        <?php if ( is_page() ) { ?>
            <?php if ( $post->post_parent ) {
                $parent_permalink = get_permalink($post->post_parent);
                $parent_title = get_the_title($post->post_parent);
            ?>
                <h2 class="cover-subtitle"><a href="<?php echo $parent_permalink; ?>"><i class="fa fa-angle-left"></i> <?php echo $parent_title; ?></a></h2>
            <?php } ?>
        <?php } ?>

        <h1 class="cover-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

    </header>
    
</div>

<?php
    endforeach;

    /**
     * Fires after the Cover featured content.
     */
    do_action( 'cover_featured_posts_after' );

    wp_reset_postdata();
?>
