<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());

	$post_counter++;

	if ($post_counter % 2 === 0  ) { 
		?>
		<div class="clear"></div>
		<?php 
	}
	/*
	if ($post_counter == 4 ) { 
		?>
		<div class="ad-wrapper">
			<div class="col-xs-12 col-sm-6 no-gutter"><?php if(function_exists('oiopub_banner_zone')) oiopub_banner_zone(2, 'left'); ?></div>
			<div class="col-xs-12 col-sm-6 no-gutter"><?php if(function_exists('oiopub_banner_zone')) oiopub_banner_zone(2, 'left'); ?></div>
		</div>
		<?php 
	}
	*/

	

	endwhile; ?>

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