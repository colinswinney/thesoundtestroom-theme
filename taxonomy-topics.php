<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php if(function_exists('wp_pagenavi')) { // if PageNavi is activated ?>
  
<?php wp_pagenavi(); // Use PageNavi ?>
  
<?php } else { // Otherwise, use traditional Navigation ?>
  
<div class="nav-previous">
<!-- next_post_link -->
</div>
  
<div class="nav-next">
<!-- previous_post_link -->
</div>
  
<?php } // End if-else statement ?>