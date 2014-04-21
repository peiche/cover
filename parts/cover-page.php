<?php
/**
 * @package Cover
 */
?>

<?php if ('' != get_the_post_thumbnail()) { ?>
	<div class="cover featured-image">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div class="background" style="background-image: url('<?php echo $image[0]; ?>');" <?php // data-top="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;" ?> ></div>
		<header>
			<?php if (is_page() && $post->post_parent) { ?>
				<?php
					$parent_permalink = get_permalink($post->post_parent);
					$parent_title = get_the_title($post->post_parent);
				?>
				<h2><a href="<?php echo $parent_permalink; ?>"><?php echo $parent_title; ?></a></h2>
			<?php } ?>
			<h1><a href="#"><?php the_title(); ?></a></h1>
		</header>
		<i class="fa fa-angle-down"></i>
	</div>
<?php } ?>