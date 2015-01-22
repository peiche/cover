<?php
/**
 * The template for displaying Author bios
 *
 * Called from inc/cover-author and content-single
 *
 * @package Cover
 */
?>

<div class="profile">
	<div class="profile-avatar">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), ( is_author() ? 120 : 80 ) ); ?>
	</div>
	
    <div class="profile-info">
        <?php if (is_author()) { ?>
            <h1 class="cover-title"><?php echo get_the_author(); ?></h1>
        <?php } else { ?>
            <h4><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></h4>
        <?php } ?>
        <p>
            <?php the_author_meta( 'description' ); ?>
        </p>
    </div>
</div>