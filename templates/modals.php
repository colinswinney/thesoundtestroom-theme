<!-- Main Menu -->
<div id="menuModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <?php get_template_part('templates/modal-header'); ?>
      <h4 class="modal-id-header">Main Menu</h4>
      <div class="modal-body">
        <?php if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
        endif;
        ?>
        <div class="clear"></div>
        <?php dynamic_sidebar('sidebar-main-menu'); ?>
        <div class="clear"></div>
      </div>
      <?php get_template_part('templates/modal-footer'); ?>
    </div>

  </div>
</div>



<!-- Comics Menu -->
<div id="comic-quick-menu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <?php get_template_part('templates/modal-header'); ?>
      <h4 class="modal-id-header">Comics</h4>  
      <div class="modal-body">
        <?php dynamic_sidebar('sidebar-comic-corner'); ?>
        <div class="clear"></div>
      </div>
      <?php get_template_part('templates/modal-footer'); ?>
    </div>

  </div>
</div>




<!-- Sales Menu -->
<div id="sales-quick-menu" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <?php get_template_part('templates/modal-header'); ?>
      <h4 class="modal-id-header">Sales</h4>
      <div class="modal-body">
        <h4>Please be patient as we pull in the latest prices.</h4><br>

        <?php 

        // 11088 is Apps on Sale dev page id
        $args = array(
          'page_id' => 11088
          );
        $loop = new WP_Query( $args );
        $post_counter=0;
        while ( $loop->have_posts() ) : $loop->the_post();

        // check if the repeater field has rows of data
        if( have_rows('apps_on_sale_repeater', 11088) ):

          // loop through the rows of data
            while ( have_rows('apps_on_sale_repeater', 11088) ) : the_row();

            $post_object = get_sub_field('app_entry_repeater_field', 11088);
            $old_price = get_sub_field('old_price', 11088);

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
                
                      
                        <a href="<?php the_field('app_entry_url'); ?>" class="featured-image-link-wrap"><img src="<?php the_field('app_entry_artwork_url_60'); ?>" alt="<?php the_title(); ?>" /></a>
                        
                
                
                    </div>
                  </div>
                
                <div class="home-article-title">
                  <h2 class="entry-title"><a href="<?php the_field('app_entry_url'); ?>"><?php the_title(); ?></a></h2>
                  <h6><i class="fa fa-spinner fa-pulse"></i>
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

            
            endwhile;
            
        endif;
        endwhile;

        wp_reset_query();  // Restore global post data stomped by the_post(). 
        ?>
      </div>
      <?php get_template_part('templates/modal-footer'); ?>
    </div>
  </div>
</div>

