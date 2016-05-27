<?php the_content(); ?>

<?php 

// WP_Query arguments
$args = array (
	'post_type'              => array( 'apps' ),
	'posts_per_page'         => '-1',
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		
		$json_object_field = get_field('json_object');
		$current_price_field = get_field('current_price');
		$current_version_field = get_field('current_version');
		$initial_timestamp_field = get_field('initial_timestamp');
		$rows = get_field('json_logs');
		$end_row = count($rows);
		?>
		

		<?php

		if( $rows ):

			?>
			<h2><?php echo $json_object_field['results'][0]['trackName'];?></h2>
			<p>Current Price: <?php echo $current_price_field;?></p>
			<p>Tracked since... <?php echo date("d F Y H:i:s", $initial_timestamp_field);?></p>
			<?php
			

		 	// loop through the rows of data
		    while ( have_rows('json_logs') ) : the_row();

		        // display a sub field value
		        $repeater_json_object = get_sub_field('repeater_json_object');
		        $repeater_json_object_timestamp = get_sub_field('repeater_json_object_timestamp');
		        $repeater_price = get_sub_field('repeater_price');
		        $repeater_version = get_sub_field('repeater_version');


		        $timestamp_date = date("d F Y H:i:s", $repeater_json_object_timestamp);

		        ?>
		        <p><?php echo $timestamp_date; ?></p>
		        <p><?php echo $repeater_price; ?></p>
		        <?php

		    endwhile;

		else :
			// no rows found
		endif;


	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();

?>

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
<?php comments_template('/templates/comments.php'); ?>