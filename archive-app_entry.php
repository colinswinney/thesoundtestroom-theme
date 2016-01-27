<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php
	$terms = get_terms('topics');

  		$counter = 0;
	    foreach ($terms as $term) {
	    	?>
	    	<div class='col-md-6 app-archive-term-wrapper'>
		    	<h2 class="term-heading" id="<?php echo $term->slug; ?>">
		      		<?php echo $term->name; ?>
		      	</h2>
		      	<?php 
			      $new_query = array ('taxonomy'=>'topics','term'=>$term->slug, 'orderby'=>'rand');
			      $myquery = new WP_Query ($new_query);
			      $article_count = $myquery->post_count;
			      $termLinks = get_term_link( $term, 'topics' );

			      if ($article_count) {
			      	?>
			      	<ul>
			      		<?php
			         	while ($myquery->have_posts()) : $myquery->the_post();

				        $artwork = get_field('app_entry_artwork_url_60');
				        
						?>
						<li><a href="<?php the_permalink(); ?>"><img src="<?php if ($artwork) { echo $artwork; } else { echo '/wp-content/uploads/STR/genericPostPhoto.png'; } ?>" /><?php echo $post->post_title; ?></a></li>
						 
						<?php
				        endwhile;
				        ?>
				        <li><a href="<?php echo $termLinks; ?>" title="See More" class="btn btn-lg get-info-btn">See More</a> <em>in "<?php echo $term->name; ?>"</em></li>
			      	</ul>
			      	<?php
			       }
				?>
				<div class="clear"></div>
				
	      	</div>
			<?php

			$counter++;
			if ($counter % 2 === 0) { 
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
?>