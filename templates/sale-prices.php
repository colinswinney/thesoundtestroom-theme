<?php

/* Don't remove this line. */
require('../../../../wp-blog-header.php');

// 11088 is Apps on Sale dev page id
$args = array(
	'page_id' => 11088
	);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();

// check if the repeater field has rows of data
if( have_rows('apps_on_sale_repeater', 11088) ):

	$post_counter=0;

 	// loop through the rows of data
    while ( have_rows('apps_on_sale_repeater', 11088) ) : the_row();

        // display a sub field value

	

		$post_object = get_sub_field('app_entry_repeater_field', 11088);
		$old_price = get_sub_field('old_price');

		if( $post_object ): 

		// override $post
		$post = $post_object;
		setup_postdata( $post );

		$appSaleId = get_field('app_entry_id_number');   
		$appSaleInfo = 'http://itunes.apple.com/lookup?id='. $appSaleId .'';
		$appSaleJSONData = json_decode(file_get_contents($appSaleInfo), true);
		$appSaleIcon = $appSaleJSONData['results'][0]['artworkUrl60'];
		$appSalePrice = $appSaleJSONData['results'][0]['price'];
		$appTitle = $appSaleJSONData['results'][0]['trackName'];
		$appPercent = $appSalePrice / $appSaleOldPrice;
		$appPercentTotal = round($appPercent, 2);
		$appPercentTotal = $appPercentTotal * 100;
		$totalPercent = 100 - $appPercentTotal;

		$standard_price = get_field('standard_price');

		?>



		<div class="col-md-6 home-article-wrap">
			<article>
					<div class="home-article-image">
						<div class="home-post-meta">
				
							<a href="<?php the_field('app_entry_url'); ?>" class="featured-image-link-wrap"><img src="<?php echo $appSaleIcon;?>" alt="<?php the_title(); ?>" /></a>
							
						</div>
					</div>
				
				<div class="home-article-title">
					<h2 class="entry-title"><a href="<?php the_field('app_entry_url'); ?>"><?php the_title(); ?></a></h2>
					<h6>
						<span>
						<?php
					        if ($appSalePrice == 0) {
					          echo 'FREE';
					        } else {
					          echo '$'.$appSalePrice.'';
					        }
				        ?>
						</span>
						on sale from <?php 
						if ($standard_price == 0) {
				          echo 'FREE';
				        } else {
				          echo '$'.$standard_price.'';
				        } ?>
					</h6>
				</div>	  
			  	<div class="clear"></div>
			</article>
		</div>





	    

	    <?php 
	    endif;
	    wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

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

    endwhile;

else :

    // no rows found

endif;
endwhile;

wp_reset_query();  // Restore global post data stomped by the_post(). 
?>