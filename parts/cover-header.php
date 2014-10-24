<?php
/**
 * @package Cover
 */
?>

<header class="cover-header">
    
    <?php if ( is_single() ) { ?>
        <?php
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list( __( ', ', 'cover' ) );
            if ( $categories_list && cover_categorized_blog() ) :
        ?>
            <h2 class="cover-subtitle"><?php echo $categories_list; ?></h2>
        <?php endif; ?>
    <?php } ?>
    
    <?php if ( is_page() ) { ?>
        <?php if ( $post->post_parent ) {
            $parent_permalink = get_permalink($post->post_parent);
            $parent_title = get_the_title($post->post_parent);
        ?>
            <h2 class="cover-subtitle"><a href="<?php echo $parent_permalink; ?>"><i class="fa fa-angle-left"></i> <?php echo $parent_title; ?></a></h2>
        <?php } ?>
    <?php } ?>
    
    <h1 class="cover-title"><?php the_title(); ?></h1>
    
</header>
