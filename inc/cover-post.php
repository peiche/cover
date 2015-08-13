<?php
/**
 * Header for posts and pages
 *
 * @package Cover
 */

?>

<?php
    $class = '';
    $height = 0;

    if ( '' != get_the_post_thumbnail() ) {
        $img_arr = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        $img = $img_arr[0];
        $width = $img_arr[1];
        $height = $img_arr[2];
        $class = ' featured-image';
        if ( $height > 1 && $height <= 600 ) {
          $class = $class . ' hero';
        } else if ( $height > 600 ) {
			    $class = $class . ' full';
		    }
    }
?>

<div class="cover<?php echo $class; ?>">
  <div class="cover-background<?php if ( '' != $class ) { ?>" style="background-image: url('<?php echo $img; ?>');" data-0-top="background-position: 50% 50%;" data-0-top-bottom="background-position: 50% 100%;<?php } ?>"></div>

    <!-- add more featured images if supported -->
    <?php

    if ( class_exists( 'Dynamic_Featured_Image' ) ) {
      global $dynamic_featured_image;
      $featured_images = $dynamic_featured_image->get_featured_images();

      foreach ( $featured_images as &$value ) {
      ?>

      <div class="cover-background" style="background-image: url('<?php echo $value['full']; ?>'); opacity: 0;"></div>

      <?php
      }

      ?>

      <!-- move to enqueue -->
      <script>

      setInterval(function() {

        //var $
        //jQuery('.cover-background').css('opacity', 0);
        //.next('.cover-background')

      }, 3000); // every three seconds

      </script>

      <?php

    }

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
                $parent_permalink = get_permalink( $post->post_parent );
                $parent_title = get_the_title( $post->post_parent );
            ?>
                <h2 class="cover-subtitle"><a href="<?php echo $parent_permalink; ?>"><i class="fa fa-angle-left"></i> <?php echo $parent_title; ?></a></h2>
            <?php } ?>
        <?php } ?>

        <h1 class="cover-title"><?php the_title(); ?></h1>

        <?php if ( is_single() ) { ?>
            <div class="entry-meta">
                <?php cover_posted_on(); ?>
            </div>
        <?php } ?>

    </header>

    <?php if ( $height > 600 ) { ?>
      <a href="#post-<?php the_ID(); ?>" class="cover-background-jump"><i class="fa fa-fw fa-angle-down"></i></a>
      <a href="<?php echo $img; ?>" class="cover-background-link swipebox" target="_blank"><i class="fa fa-fw fa-expand"></i></a>
    <?php } ?>

</div>
