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
            <h2><?php echo $categories_list; ?></h2>
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
        <?php echo cover_posted_on(); ?>
    <?php } ?>
    
    <?php if ( is_page() ) { ?>
        <?php if ( $post->post_parent ) {
            $parent_permalink = get_permalink($post->post_parent);
            $parent_title = get_the_title($post->post_parent);
        ?>
            <h2><a href="<?php echo $parent_permalink; ?>"><i class="fa fa-angle-left"></i> <?php echo $parent_title; ?></a></h2>
        <?php } ?>
        <h1><?php the_title(); ?></h1>
    <?php } ?>
</header>
