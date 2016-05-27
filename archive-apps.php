<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>
<div class="app-archive-info-wrap">
	<?php 
	$last_tracker_update = get_field('last_tracker_update', 'option');
	$formatted_tracker_date = date('M j, Y', $last_tracker_update);?>
	<h4>Last Updated: <?php echo $formatted_tracker_date;?></h4>

	
	<h3>Welcome to thesoundtestroom app directory!</h3>
	
	<img src="/wp-content/uploads/2016/04/appStore-STR.png" alt="app store logo">
	<p>In this section, you'll find a collection of apps currently being tracked by thesoundtestroom.  As apps are updated with price changes or new versions, you'll find them automatically added to the lists below.
	<br>
	<br>
	We are not tagging, adding, or altering any info about these apps.  Genres, compatible devices, search terms, etc. are all taken directly from the App Store.
	<br>
	<br>
	Search terms are found in the app's description.  Please note this might not reflect the functionality of the app, only that it's App Store description contains the keyword.
	<br>
	<br>
	For example, an effect app might suggest you "use with your favorite DAW", while not actually having any DAW like capabilities.  Please read all descriptions carefully before purchase.  Buyer beware!
	<br>
	<br>
	You can view by:</p>
	<ul>
		<li><a href="/all-apps">All Apps</a></li>
		<li><a href="/status/price-drop">Price Drops</a></li>
		<li><a href="/status/price-bump">Price Bumps</a></li>
		<li><a href="/status/version-update">Version Updates</a></li>
		<li><a href="/recently-released">Recently Released</a></li>
		<li><a href="/free-apps">Free Apps</a></li>
		<li><a href="/under-five-dollar-apps">Under Five Dollar Apps</a></li>
		<li><a href="/five-to-twenty-dollar-apps">Five to Twenty Dollar Apps</a></li>
		<li><a href="/over-twenty-dollar-apps">Over Twenty Dollar Apps</a></li>	
	</ul>

	<p>or the following categories:</p>

	<div class="col-sm-4 no-gutter">
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
	<div class="col-sm-4 genre-no-gutter">
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
	<div class="col-sm-4 no-gutter">
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


</div>








<h4>Last Updated: <?php echo $formatted_tracker_date;?></h4>


<div class="col-sm-12 no-gutter">

	<?php

	$args = array( 'hide_empty'=>0, 'order'=>'ASC' );
	$terms = get_terms( 'status', $args );

	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {

	    $count = count( $terms );
	    $i = 0;

	    echo '<ul class="app-archive-status-ul">';
	    foreach ( $terms as $term ) {
	    	
	    	$i++;

	    	// if ($term->name == 'Price Bump') {
	    		
	    	// 	// echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . 's</a> <em>('; echo $term->count; echo')</em>';
	    	// }
	    	// else {

				echo '<li><h2>' . $term->name . 's</h2>
';

				$new_query = array ('taxonomy'=>'status','term'=>$term->slug, 'orderby'=>'rand', 'posts_per_page'=>'6');
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



















<div class="col-sm-12 no-gutter">


	<?php

	$args = array( 'hide_empty'=>0 );
	$terms = get_terms( 'search-terms', $args );

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

				echo '<li><h2>' . $term->name . '</h2>';

				$new_query = array ('taxonomy'=>'search-terms','term'=>$term->slug, 'orderby'=>'rand', 'posts_per_page'=>'6');
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
									else if ( has_term('Price Bump', 'status') ) {
										echo '<div class="app-sticky red">';
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
					<?php echo '<h4><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts filed under %s', 'my_localization_domain' ), $term->name ) ) . '">View all ' . $term->name . '</a> <em>('; echo $term->count; echo')</em></h4>'; ?>
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





















