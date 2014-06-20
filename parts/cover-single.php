<?php
/**
 * @package Cover
 */
?>

<?php

    $class = '';

    if ('' != get_the_post_thumbnail()) {
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        $height = $img[2];

        if ( $height <= 300 ) {
            $class = 'auto';
        } else if ( $height <= 600 ) {
            $class = 'half';
        }
    } else {
        $class = 'auto inverse';
    }

?>

<div class="cover featured-image <?php echo $class; ?>">
    <div class="background" <?php if ('' != get_the_post_thumbnail()) { ?>style="background-image: url('<?php echo $img[0]; ?>');"<?php } ?>></div>
    <header>
        <h1><?php the_title(); ?></h1>
        <span>
            <?php cover_posted_on(); ?>
        </span>
    </header>
    <?php if ( $class == '' ) { ?>
      <i class="fa fa-angle-down"></i>
    <?php } ?>
</div>