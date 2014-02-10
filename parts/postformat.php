<?php
/**
 * @package Cover
 */
?>

<?php $format = get_post_format( $post_id ); ?>
<?php if (is_sticky()) { ?>
	<span>Featured</span> <i class="fa fa-heart"></i>
<?php } else if ('video' == $format){ ?>
	<span>Video</span> <i class="fa fa-youtube-play"></i>
<?php } else if ('quote' == $format){ ?>
	<span>Quote</span> <i class="fa fa-quote-right"></i>
<?php } else if ('image' == $format) { ?>
	<span>Image</span> <i class="fa fa-picture-o"></i>
<?php } else if ('link' == $format) { ?>
	<span>Link</span> <i class="fa fa-link"></i>
<?php } ?>