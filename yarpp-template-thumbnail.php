<?php
/*
YARPP Template: Cover
Description: Related posts template built for the Cover theme. Works best with multiples of two.
@link https://wordpress.org/themes/cover/
Author: Paul Eiche
*/ ?>
<?php if ( have_posts() ) : ?>

<h2 class="yarpp-related-cover-header">Related</h2>
<ul class="yarpp-related-cover cf">

    <?php
      while ( have_posts() ) : the_post();
        $img = '';
        if ( has_post_thumbnail() ) {
            $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' )[0];
        }
    ?>
    <li class="yarpp-related-cover-item<?php if ( $img != '' ) { ?> has-cover<?php } ?>">
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <span class="yarpp-related-cover-image<?php if ( $img != '' ) { ?>" style="background-image: url('<?php echo $img ?>');<?php } ?>"></span>
          <span class="yarpp-related-cover-title"><?php the_title_attribute(); ?></span>
        </a>
    </li>
    <?php endwhile; ?>

</ul>

<?php endif; ?>
