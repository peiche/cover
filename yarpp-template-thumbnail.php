<?php
/*
YARPP Template: Cover
Description: Full-width related posts template built for the Cover theme.
Author: Paul Eiche
*/ ?>
<?php if (have_posts()):?>
<h2>Related</h2>
<ul class="yarpp-related-cover cf">
    <?php while (have_posts()) : the_post(); ?>
    
    <li>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php if (has_post_thumbnail()):?>
                <span class="yarpp-related-cover-background" style="background-image: url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' )[0]; ?>');"></span>
            <?php endif; ?>
            <span class="yarpp-related-cover-title"><?php the_title_attribute(); ?></span>
        </a>
    </li>
    <?php endwhile; ?>
    
    <?php // show random posts
    /*
    query_posts("orderby=rand&order=asc&limit=1");
the_post();?>
<p>No related posts were found, so here's a consolation prize: <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>.</p>
    */
    ?>
    
</ul>

<?php else: ?>
<!--<p>No related photos.</p>-->
<?php endif; ?>
