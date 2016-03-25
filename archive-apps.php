<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<p>Welcome to thesoundtestroom app page</p>

<div class="col-sm-12">

	<h2>Updates</h2>

	<?php

	$args = array( 'hide_empty=0' );
	$terms = get_terms( 'status', $args );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

	    $count = count( $terms );
	    $i = 0;

	    echo '<ul class="app-archive-status-ul">';
	    foreach ( $terms as $term ) {
	    	
	    	$i++;

	    	// if ($term->name == 'Price Bump') {
	    	// 	echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . 's</a> <em>('; echo $term->count; echo')</em>';
	    	// }
	    	// else {

				echo '<li><h2>' . $term->name . 's</h2>';

				$new_query = array ('taxonomy'=>'status','term'=>$term->slug, 'orderby'=>'rand', 'posts_per_page'=>'-1');
				$myquery = new WP_Query ($new_query);
				$article_count = $myquery->post_count;
				$termLinks = get_term_link( $term, 'status' );

				if ($article_count) {
					?>	
					<ul>
					<?php
					while ($myquery->have_posts()) : $myquery->the_post();

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
									if ( has_term('Price Drop', 'status') ) {
										echo '<div class="app-sticky green">';
									}
									else {
										echo '<div class="app-sticky">';
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

						<?php
					endwhile;
					?>
					<?php echo '<h4><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts filed under %s', 'my_localization_domain' ), $term->name ) ) . '">View all ' . $term->name . 's</a> <em>('; echo $term->count; echo')</em></h4>'; ?>
					</li>
					</ul>
					<?php
				}
			// }
		}

		echo '</ul>';
	}
	?>
</div><!-- end of status terms section -->





<div class="col-sm-4">
	<h2>Search Terms</h2>
	<?php
	$args = array( 'hide_empty=0' );
	$terms = get_terms( 'search-terms', $args );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	    $count = count( $terms );
	    $i = 0;
	    echo '<ul>';
	    foreach ( $terms as $term ) {
	        $i++;
	        echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a> <em>('; echo $term->count; echo')</em></li>';
	        
	    }
	    echo '</ul>';
	}
	?>
</div>
<div class="col-sm-4">
	<h2>Genres</h2>
	<?php
	$args = array( 'hide_empty=0' );
	$terms = get_terms( 'genres', $args );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	    $count = count( $terms );
	    $i = 0;
	    echo '<ul>';
	    foreach ( $terms as $term ) {
	        $i++;
	        echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a> <em>('; echo $term->count; echo')</em></li>';
	        
	    }
	    echo '</ul>';
	}
	?>
</div>
<div class="col-sm-4">
	<h2>Devices</h2>
	<?php
	$args = array( 'hide_empty=0' );
	$terms = get_terms( 'devices', $args );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	    $count = count( $terms );
	    $i = 0;
	   	echo '<ul>';
	    foreach ( $terms as $term ) {
	        $i++;
	        echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a> <em>('; echo $term->count; echo')</em></li>';
	        
	    }
	    echo '</ul>';
	}
	?>
</div>
























<div style="height:2000px;"></div>




<h2>Status</h2>
<?php
$args = array( 'hide_empty=0' );
 
$terms = get_terms( 'status', $args );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    $i = 0;
    $term_list = '<p class="status-archive">';
    foreach ( $terms as $term ) {
        $i++;
        $term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a>';
        if ( $count != $i ) {
            $term_list .= ' &middot; ';
        }
        else {
            $term_list .= '</p>';
        }
    }
    echo $term_list;
}
?>


<h2>Genres</h2>
<?php
$args = array( 'hide_empty=0' );
 
$terms = get_terms( 'genres', $args );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {










    $count = count( $terms );
    $i = 0;
    $term_list = '<p class="status-archive">';
    foreach ( $terms as $term ) {
        $i++;
        $term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a>';
        if ( $count != $i ) {
            $term_list .= ' &middot; ';
        }
        else {
            $term_list .= '</p>';
        }
    }
    echo $term_list;
}
?>


<h2>Compatible Devices</h2>
<?php
$args = array( 'hide_empty=0' );
 
$terms = get_terms( 'devices', $args );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    $i = 0;
    $term_list = '<p class="status-archive">';
    foreach ( $terms as $term ) {
        $i++;
        $term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a>';
        if ( $count != $i ) {
            $term_list .= ' &middot; ';
        }
        else {
            $term_list .= '</p>';
        }
    }
    echo $term_list;
}
?>



<h2>Search Terms</h2>
<h6>This is a search of the app store description and does not necessarily reflect the apps capabilities.  For example, an effect app might say "use with your favorite DAW" while not actually having any DAW-like functionality.  Please read descriptions carefully before purchase.</h6>
<?php
$args = array( 'hide_empty=0' );
 
$terms = get_terms( 'search-terms', $args );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    $i = 0;
    $term_list = '<p class="status-archive">';
    foreach ( $terms as $term ) {
        $i++;
        $term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a>';
        if ( $count != $i ) {
            $term_list .= ' &middot; ';
        }
        else {
            $term_list .= '</p>';
        }
    }
    echo $term_list;
}
?>










	<h2>Search by Status</h2>
	<h5>Price changes are for last 30 days, Version Update is for 15 days</h5>
<?php

	$terms = get_terms('status');
	$counter = 0;

    foreach ($terms as $term) {
    	?>
    	<div class='col-md-12 app-archive-term-wrapper'>
	    	<h3 class="term-heading" id="<?php echo $term->slug; ?>">
	      		<?php echo $term->name; ?>
	      	</h3>
	      	<?php 
		      $new_query = array ('taxonomy'=>'status','term'=>$term->slug, 'orderby'=>'rand');
		      $myquery = new WP_Query ($new_query);
		      $article_count = $myquery->post_count;
		      $termLinks = get_term_link( $term, 'status' );

		      if ($article_count) {
		      	?>
		      	<ul>
		      		<?php
		         	while ($myquery->have_posts()) : $myquery->the_post();

			        $url = wp_get_attachment_url( get_post_thumbnail_id($id) );
					$sizes = get_intermediate_image_sizes();

					$images = array();
					foreach ( $sizes as $size ) {
					  $images[] = wp_get_attachment_image_src( get_post_thumbnail_id($id), $size );
					}
			        
					?>
					<li><a href="<?php the_permalink(); ?>"><img src="<?php
						if ($images[0][0] == false ) {
							echo '/wp-content/uploads/STR/genericPostPhoto.png';
						}
						else {
							echo $images[0][0];
						}
						?>" /><?php //echo $post->post_title; ?></a></li>
					 
					<?php
			        endwhile;
			        ?>
		      	</ul>
		      	<a href="<?php echo $termLinks; ?>" title="See More" class="btn btn-lg get-info-btn">See More</a> <em>in "<?php echo $term->name; echo ' ('; echo $term->count; echo ')';?>"</em>
		      	<?php
		       }
			?>
			
			
      	</div>
		<?php

		$counter++;
		if ($counter % 3 === 0) { 
			?>
			<div class="clear"></div>
			<?php 
		}
		/*
		if ($counter == 4 ) { 
			?>
			<div class="ad-wrapper">
				<div class="col-xs-12 col-sm-6 no-gutter"><?php if(function_exists('oiopub_banner_zone')) oiopub_banner_zone(2, 'left'); ?></div>
				<div class="col-xs-12 col-sm-6 no-gutter"><?php if(function_exists('oiopub_banner_zone')) oiopub_banner_zone(2, 'left'); ?></div>
			</div>
			<?php
		}
		*/
	}

	// Restore original Post Data
	wp_reset_postdata();	
?>

<?php

	$terms = get_terms('search-terms');
	$counter = 0;

    foreach ($terms as $term) {
    	?>
    	<div class='col-md-4 app-archive-term-wrapper'>
	    	<h2 class="term-heading" id="<?php echo $term->slug; ?>">
	    		<a href="<?php echo $termLinks; ?>" title="See More">
	      			<?php echo $term->name; ?>
      			</a>
      			<?php echo ' ('; echo $term->count; echo ')'; ?>
	      	</h2>
	      	
	      	<?php 
		      $new_query = array ('taxonomy'=>'search-terms','term'=>$term->slug, 'orderby'=>'rand', 'posts_per_page' => '12');
		      $myquery = new WP_Query ($new_query);
		      $article_count = $myquery->post_count;
		      $termLinks = get_term_link( $term, 'search-terms' );

		      if ($article_count) {
		      	?>
		      	<ul>
		      		<?php
		         	while ($myquery->have_posts()) : $myquery->the_post();

			        $url = wp_get_attachment_url( get_post_thumbnail_id($id) );
					$sizes = get_intermediate_image_sizes();

					$images = array();
					foreach ( $sizes as $size ) {
					  $images[] = wp_get_attachment_image_src( get_post_thumbnail_id($id), $size );
					}
			        
					?>
					<li><a href="<?php the_permalink(); ?>"><img src="<?php
						if ($images[0][0] == false ) {
							echo '/wp-content/uploads/STR/genericPostPhoto.png';
						}
						else {
							echo $images[0][0];
						}
						?>" /><?php //echo $post->post_title; ?></a></li>
					 
					<?php
			        endwhile;
			        ?>
		      	</ul>
		      	<?php
		       }
			?>
			
			
      	</div>
		<?php

		$counter++;
		if ($counter % 3 === 0) { 
			?>
			<div class="clear"></div>
			<?php 
		}
		/*
		if ($counter == 4 ) { 
			?>
			<div class="ad-wrapper">
				<div class="col-xs-12 col-sm-6 no-gutter"><?php if(function_exists('oiopub_banner_zone')) oiopub_banner_zone(2, 'left'); ?></div>
				<div class="col-xs-12 col-sm-6 no-gutter"><?php if(function_exists('oiopub_banner_zone')) oiopub_banner_zone(2, 'left'); ?></div>
			</div>
			<?php
		}
		*/
	}

	// Restore original Post Data
	wp_reset_postdata();	
?>