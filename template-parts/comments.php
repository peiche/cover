<?php
/**
 * The template for displaying comments.
 *
 * @package Cover
 */

  // If comments are open or we have at least one comment, load up the comment template.
  if ( comments_open() || '0' != get_comments_number() ) :
?>
<div class="comments-container">
  <?php comments_template(); ?>
</div>
<?php endif; ?>
