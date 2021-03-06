<?php

// check if the repeater field has rows of data
if( have_rows('get_app_repeater') ):
echo '<section class="get-app-section-wrapper">';
 	// loop through the rows of data
    while ( have_rows('get_app_repeater') ) : the_row();

        // display a sub field value

		$post_object = get_sub_field('app_to_get');

		if( $post_object ): 

		// override $post
		$post = $post_object;
		setup_postdata( $post ); 

		// var_dump($post->post_type);

		if ( $post->post_type == 'apps' ) {
			
			?>

			<div class="getApp tstr-get-app">
			    <a href="<?php the_field('track_view_url');?>" target="_blank">
			      <img src="<?php the_field('artwork_60');?>" alt="<?php the_title(); ?>" />Get <span class="getAppSectionTitle"><?php the_title();?></span> <em> 
			        <?php
			        if ( get_field('price') == 0 ) {
			          echo '(FREE)'; echo'</em>';
			        } else {
			          echo '($'; the_field('price'); echo')'; echo'</em>';
			        }
			        ?>
			    </a>
	  		</div>
		  	<!-- <button title="Get More Info" type="button" class="btn btn-lg get-info-btn" data-toggle="modal" data-target="#<?php // the_field('app_id'); ?>">Get More Info</button>
		  	<div id="<?php // the_field('app_id'); ?>" class="modal fade get-app-class" role="dialog"> -->
		  	<a href="<?php the_permalink();?>"><button title="Get More Info" type="button" class="btn btn-lg get-info-btn">Get More Info</button></a>
			    
	    <?php
		}
		else if ( $post->post_type == 'app_entry' ){
			
		?>

			<div class="getApp tstr-get-app">
			    <a href="<?php the_field('app_entry_url');?>" target="_blank">
			      <img src="<?php the_field('app_entry_artwork_url_60');?>" alt="<?php the_field('app_entry_title');?>" />Get <span class="getAppSectionTitle"><?php the_field('app_entry_title');?></span> <em> 
			        <?php
			        if ( get_field('app_entry_price') == 0 ) {
			          echo '(FREE)'; echo'</em>';
			        } else {
			          echo '($'; the_field('app_entry_price'); echo')'; echo'</em>';
			        }
			        ?>
			    </a>
	  		</div>
		  	<button title="Get More Info" type="button" class="btn btn-lg get-info-btn" data-toggle="modal" data-target="#<?php the_field('app_entry_id_number'); ?>">Get More Info</button>
		  	<div id="<?php the_field('app_entry_id_number'); ?>" class="modal fade get-app-class" role="dialog">
			    
	    
				<div class="modal-dialog">

			      <!-- Modal content-->
			      <div class="modal-content">
			        <?php get_template_part('templates/modal-header'); ?>

			        <div class="modal-body">

						<?php Roots\Sage\Extras\app_entry_content(); ?>

			        </div>
			        
			        <?php get_template_part('templates/modal-footer'); ?>
			      </div>

			    </div>
		  	</div>
	  	<?php 
		}
		?>

		<?php
	    endif;
	    wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

    endwhile;

else :

    // no rows found
echo '</section>';
endif;

?>