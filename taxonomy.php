<?php get_template_part('templates/page', 'header'); ?>
<?php 
	$last_tracker_update = get_field('last_tracker_update', 'option');
	$formatted_tracker_date = date('M j, Y', $last_tracker_update);
?>
<h4>Last Updated: <?php echo $formatted_tracker_date;?>

<?php if (is_tax('status')) {
	echo ' - <em>latest changes are listed first</em>';
}
?>
</h4>
<h6>Read all descriptions carefully, buyer beware.  Please see the <a href="/apps">app homepage</a> for info about how we track these apps.</h6>
<br>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>
<ul class="tax-page-ul">
<?php while (have_posts()) : the_post(); ?>
<?php

	$url = wp_get_attachment_url( get_post_thumbnail_id($id) );
	$sizes = get_intermediate_image_sizes();
	$images = array();
	foreach ( $sizes as $size ) {
		$images[] = wp_get_attachment_image_src( get_post_thumbnail_id($id), $size );
	}


	?>
	<li>
		<a href="<?php the_permalink(); ?>">
			<img src="<?php
			if ($images[0][0] == false ) {
				echo '/wp-content/uploads/STR/genericPostPhoto.png';
			}
			else {
				echo $images[0][0];
			}
			?>" />

			<?php 
				if (has_term('Version Update', 'status')) {
					if ( has_term('Price Drop', 'status') ) {
						echo '<div class="app-sticky green version-update">';
					}
					else if ( has_term('Price Bump', 'status') ) {
						echo '<div class="app-sticky red version-update">';
					}
					else {
						echo '<div class="app-sticky version-update">';
					}
				}
				else {
					if ( has_term('Price Drop', 'status') ) {
						echo '<div class="app-sticky green">';
					}
					else if ( has_term('Price Bump', 'status') ) {
						echo '<div class="app-sticky red">';
					}
					else {
						echo '<div class="app-sticky">';
					}
				}
			?>
			
			<?php
				$price = get_field('price');
				if ( $price == '0' ) {
					echo 'FREE';
				}
				else {
					echo '$';
					echo $price;
				}
			?>
			</div>
			<?php the_title(); ?>
		</a>
	</li>
  		<!-- <div class="container col-sm-6">
	  		<div class="col-xs-4">
	  			<?php
				// echo '<a href="';
				// the_permalink();
				// echo '">';
				// echo the_post_thumbnail( 'thumbnail' );
				// echo '</a>';
				// ?>
	  	// 	</div>
	  	// 	<div class="col-xs-8">
	  	// 		<?php
				// echo '<a href="';
				// the_permalink();
				// echo '">';
				// echo '<h2>'; echo the_title(); echo '</h2>';
				// echo '</a>';
				
				// $price_rows = get_field('price_repeater');
				// $price_row_count = count($price_rows);
				// // var_dump($price_row_count);

				// if( have_rows('price_repeater') ):

				// 	$last_row = $price_row_count - 1;
				// 	$second_to_last_row = $price_row_count - 2;
					
					
				// 	echo '<h2><i class="fa fa-arrow-down"></i> '; echo $price_rows[$last_row]['repeater_price']; echo '</h2>';
				// 	echo 'was '; echo $price_rows[$second_to_last_row]['repeater_price'];

				// else :
				// endif; 
				?>
	  		</div>
			
		</div>row-->
<?php endwhile; ?>
</ul>
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