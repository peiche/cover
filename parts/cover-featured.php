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
         // Include the featured content template.
        get_template_part( 'content' );
?>

<?php
    endforeach;

    /**
     * Fires after the Cover featured content.
     */
    do_action( 'cover_featured_posts_after' );

    wp_reset_postdata();
?>
