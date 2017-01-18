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

        if ( function_exists( 'has_post_video' ) && has_post_video() ) {
          $height = 601; // Force featured videos to have full screen image.
        }

        $class = ' featured-image';
        if ( $height > 1 && $height <= 600 ) {
          $class = $class . ' hero';
        } else if ( $height > 600 ) {
			    $class = $class . ' full';
		    }
    }
?>

<div class="cover<?php echo $class; ?>">

  <div class="cover-background<?php if ( '' != $class ) { ?>" style="background-image: url('<?php echo $img; ?>');<?php } ?>" role="img">
    <?php
    if ( has_post_format( 'video' ) && function_exists( 'has_post_video' ) && has_post_video() ) {
      $video_oembed = wp_oembed_get( get_the_post_video_url() );
      if ( '' != $video_oembed ) {
        echo $video_oembed;
      } else {
        echo '<video muted autoplay loop src="' . get_the_post_video_url() . '" poster="' . $img . '"></video>';
      }
    }
    ?>
  </div>

    <header class="cover-header">

      <?php if ( is_single() ) : ?>
        <?php
          /* translators: used between list items, there is a space after the comma */
          $categories_list = get_the_category_list( __( ', ', 'cover' ) );
          if ( $categories_list && cover_categorized_blog() ) :
        ?>
          <h2 class="cover-subtitle"><?php echo $categories_list; ?></h2>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ( is_page() ) : ?>
        <?php if ( $post->post_parent ) {
          $parent_permalink = get_permalink( $post->post_parent );
          $parent_title = get_the_title( $post->post_parent );
        ?>
          <h2 class="cover-subtitle"><a href="<?php echo $parent_permalink; ?>"><i class="fa fa-angle-left"></i> <?php echo $parent_title; ?></a></h2>
        <?php } ?>
      <?php endif; ?>

      <h1 class="cover-title"><?php the_title(); ?></h1>

      <?php if ( is_single() && 'thread' != get_post_type() ) { ?>
        <div class="entry-meta">
          <?php cover_posted_on(); ?>
        </div>
      <?php } ?>

    </header>

    <?php if ( $height > 600 ) { ?>
      <a href="#post-<?php the_ID(); ?>" class="cover-background-jump"><i class="fa fa-fw fa-angle-down"></i></a>

      <?php if ( !has_post_format( 'video' ) && function_exists( 'has_post_video' ) && has_post_video() ) { ?>
        <a href="#video-overlay" id="video-overlay-play-button" class="cover-background-link cover-background-video" data-action="toggle-overlay" data-overlay-id="video-overlay">
          <span class="svg-icon"><?php get_template_part( 'dist/svg/play', 'circle.svg' ); ?></span>
        </a>
      <?php } else { ?>
        <a href="<?php echo $img; ?>" class="cover-background-link swipebox" target="_blank"><i class="fa fa-fw fa-expand"></i></a>
      <?php } ?>

    <?php } ?>

</div>

<?php if ( !has_post_format( 'video' ) && function_exists( 'has_post_video' ) && has_post_video() ) { ?>

  <div id="video-overlay" class="overlay overlay-dark overlay-embed">
    <noscript>
      <div class="header">
        <div class="site-nav">
          <a class="hamburger close" href="#"><span aria-label="Toggle Overlay"></span></a>
        </div>
      </div>
    </noscript>

    <?php
    $video_oembed =  wp_oembed_get( get_the_post_video_url() );
    if ( '' != $video_oembed ) {
      echo $video_oembed;
    } else {
      echo '<video controls src="' . get_the_post_video_url() . '"><p>Your browser does not support native video playback.</p></video>';
    }
    ?>

  </div>

<?php } ?>
