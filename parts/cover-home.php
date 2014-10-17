<?php
/**
 * @package Cover
 */
?>

<?php 
    $image = '';
    $count = 0;
    while (have_posts()) : the_post();
        if ($count == 0) {
            if ('' != get_the_post_thumbnail()) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
             }
        }
        $count++;
    endwhile;
?>

<div class="cover featured-image auto">
    <div class="background<?php if ( '' != $image ) { ?>" style="background-image: url('<?php echo $image; ?>');<?php } ?>" data-0-top="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;"></div>
    <header class="cover-header">
        <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
    </header>
</div>