<div class="app-sale-body" id="appSalePageLazyLoader">
<h4>Please be patient as we pull in the latest prices.</h4><br>

<?php

// check if the repeater field has rows of data
if( have_rows('apps_on_sale_repeater') ):

	$post_counter=0;

 	// loop through the rows of data
    while ( have_rows('apps_on_sale_repeater') ) : the_row();

        // display a sub field value

	

		$post_object = get_sub_field('app_entry_repeater_field');
		$old_price = get_sub_field('old_price');

		if( $post_object ): 

		// override $post
		$post = $post_object;
		setup_postdata( $post ); 

		$standard_price = get_field('standard_price');

		?>



		<div class="col-md-6 home-article-wrap">
			<article>
				
					<div class="home-article-image">
						<div class="home-post-meta">
				
							
								<a href="<?php the_field('app_entry_url'); ?>" class="featured-image-link-wrap" target="_blank"><img src="<?php the_field('app_entry_artwork_url_60'); ?>" alt="<?php the_title(); ?>" /></a>
								
				
				
						</div>
					</div>
				
				<div class="home-article-title">
					<h2 class="entry-title"><a href="<?php the_field('app_entry_url'); ?>" target="_blank"><?php the_title(); ?></a></h2>
					<h6><i class="fa fa-spinner fa-pulse"></i> on sale from <?php echo '$'; echo $standard_price; ?></h6>
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

?>
</div>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#appSalePageLazyLoader').load('/wp-content/themes/thesoundtestroom/templates/sale-prices.php');
	});
</script>