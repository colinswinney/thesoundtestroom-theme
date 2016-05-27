<?php
/**
 * Template Name: Over Twenty Apps
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>

<h6>Read all descriptions carefully, buyer beware.  Please see the <a href="/apps">app homepage</a> for info about how we track these apps.</h6>
<br>

<?php 

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array( 
	'post_type' => 'apps',
	'posts_per_page' => '102',
	'order' => 'ASC',
	'meta_key' => 'price',
	'orderby' => 'meta_value_num',
	'paged' => $paged,
	'meta_query' => array(
	    array(
	        'key'     => 'price',
	        'value'   => array('20.01', '1000.00'),
	        'compare' => 'BETWEEN',
	        'type' => 'DECIMAL'
	    ),
	),
);
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<ul class="tax-page-ul">
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

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
	<?php endwhile; ?>
	</ul>
	<!-- end of the loop -->

	<?php if(function_exists('wp_pagenavi')) { // if PageNavi is activated ?>
  
	<?php wp_pagenavi( array( 'query' => $the_query ) ); // Use PageNavi ?>
	  
	<?php } else { // Otherwise, use traditional Navigation ?>
	  
	<div class="nav-previous">
	<!-- next_post_link -->
	</div>
	  
	<div class="nav-next">
	<!-- previous_post_link -->
	</div>
	  
	<?php } // End if-else statement ?>

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>




<?php endwhile; ?>
