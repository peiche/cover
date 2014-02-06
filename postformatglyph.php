<?php
/**
 * @package Beats
 */
?>

<?php $format = get_post_format( $post_id ); ?>
<?php if (is_sticky()) { ?>
	<span>Featured</span> <i class="fa fa-bookmark"></i>
<?php } else if ('video' == $format){ ?>
	<span>Video</span> <i class="fa fa-youtube-play"></i>
<?php } else if ('quote' == $format){ ?>
	<span>Quote</span> <i class="fa fa-quote-right"></i>
<?php } ?>