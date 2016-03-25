<?php get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>
<?php while (have_posts()) : the_post(); ?>
  		<div class="container col-sm-6">
	  		<div class="col-xs-4">
	  			<?php
				echo '<a href="';
				the_permalink();
				echo '">';
				echo the_post_thumbnail( 'thumbnail' );
				echo '</a>';
				?>
	  		</div>
	  		<div class="col-xs-8">
	  			<?php
				echo '<a href="';
				the_permalink();
				echo '">';
				echo '<h2>'; echo the_title(); echo '</h2>';
				echo '</a>';
				
				$price_rows = get_field('price_repeater');
				$price_row_count = count($price_rows);
				// var_dump($price_row_count);

				if( have_rows('price_repeater') ):

					$last_row = $price_row_count - 1;
					$second_to_last_row = $price_row_count - 2;
					
					
					echo '<h2><i class="fa fa-arrow-down"></i> '; echo $price_rows[$last_row]['repeater_price']; echo '</h2>';
					echo 'was '; echo $price_rows[$second_to_last_row]['repeater_price'];

				else :
				endif; 
				?>
	  		</div>
			
		</div><!--row-->
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