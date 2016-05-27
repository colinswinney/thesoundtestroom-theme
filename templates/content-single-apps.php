<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>
  <div class="entry-content">
  <?php

  date_default_timezone_set('America/Los_Angeles');

  $app_id                         = get_field('app_id');
  $price                          = get_field('price');
  $seller_name                    = get_field('seller_name');
  $artist_view_url                = get_field('artist_view_url');
  $description                    = get_field('description');
  $track_view_url                 = get_field('track_view_url');
  $artwork_512                    = get_field('artwork_512');
  $artwork_100                    = get_field('artwork_100');
  $artwork_60                     = get_field('artwork_60');
  $ipad_screenshot_0              = get_field('ipad_screenshot_0');
  $ipad_screenshot_1              = get_field('ipad_screenshot_1');
  $ipad_screenshot_2              = get_field('ipad_screenshot_2');
  $ipad_screenshot_3              = get_field('ipad_screenshot_3');
  $ipad_screenshot_4              = get_field('ipad_screenshot_4');
  $iphone_screenshot_0            = get_field('iphone_screenshot_0');
  $iphone_screenshot_1            = get_field('iphone_screenshot_1');
  $iphone_screenshot_2            = get_field('iphone_screenshot_2');
  $iphone_screenshot_3            = get_field('iphone_screenshot_3');
  $iphone_screenshot_4            = get_field('iphone_screenshot_4');
  $version                        = get_field('version');
  $minimum_os_version             = get_field('minimum_os_version');
  $release_date                   = get_field('release_date');
  $current_version_release_date   = get_field('current_version_release_date');
  $release_notes                  = get_field('release_notes');
  $json_object                    = get_field('json_object');
  $initial_timestamp              = get_field('initial_timestamp');
  
  $price_repeater                 = get_field('price_repeater');
  $repeater_price                 = get_sub_field('repeater_price');
  $price_timestamp                = get_sub_field('price_timestamp');
  $price_json_object              = get_sub_field('price_json_object');
  $price_last_cron_update         = get_field('price_last_cron_update');

  $version_repeater               = get_field('version_repeater');
  $repeater_version               = get_sub_field('repeater_version');
  $version_timestamp              = get_sub_field('version_timestamp');
  $version_json_object            = get_sub_field('version_json_object');
  $version_last_cron_update       = get_field('version_last_cron_update');



  $trackedDate                    = date('M j, Y', $initial_timestamp);

  $releaseYear                    = substr($release_date, 0, 4);
  $releaseMonth                   = substr($release_date, 5, 2);
  $releaseDay                     = substr($release_date, 8, 2);
  $monthName                      = date('F', mktime(0, 0, 0, $releaseMonth, 10)); // March

  $SOSterm                        = substr(get_the_title(), 0, 10);

  if ($price == 0) {
    $price = 'FREE';
  }
  else {
    $sign = '$';
    $price = "$sign$price";
  }
  
  if( $app_id ) {

  ?>











    
    <!-- begin html content -->
  <div class="app-entry-wrapper">
    
    <h1><?php the_title(); ?></h1>
    <h5><em class="faded">Developed by -</em> <a id="developerNameAE" href="<?php echo $artist_view_url; ?>" target="_blank"><?php echo $seller_name; ?></a></h5>
      <h6>Read all descriptions carefully, buyer beware.  Please see the <a href="/apps">app homepage</a> for info about how we track these apps.</h6>
  <br>
    
    

    <div class="col-sm-4 no-gutter">
      <div class="app-content-info-wrapper">


        <a class="app-image-link" href="<?php echo $track_view_url; ?>" target="_blank">
          <img src="<?php echo $artwork_512; ?>" />
        </a>
        
        
        <div class="info-box">
          <h2><?php echo $price; ?></h2>
          <h4><em class="faded">Minimum Required OS -</em> <?php echo $minimum_os_version; ?></h4>
          <h4><em class="faded">Current Version -</em> <?php echo $version; ?><?php if (has_term('Version Update', 'status')) { echo ' <span class="asterik">*</span>';} ?></h4>
          <h4><em class="faded">Originally Released -</em> <?php echo $monthName; ?> <?php echo $releaseDay; ?>, <?php echo $releaseYear; ?></h4>
          <h4><em class="faded">Search our site for -</em> "<a href="<?php echo bloginfo('url'); ?>/?s=<?php echo $SOSterm; ?>"><?php echo $SOSterm; ?></a>"</h4>
          <h6><em class="faded"><span class="asterik">*</span> indicates recent update</em></h6>
        </div>

        <a href="<?php echo $track_view_url; ?>" target="itunes_store" class="itunes-badge">
          <img src="http://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.png" />
        </a>

        <div class="info-box">
        
        <?php
        //   echo '<h2>';
        //   echo 'History';
        //   echo '</h2>';

          echo '<h4><em class="faded">Tracked on the soundtestroom since:</em><br>'. $trackedDate.'</h4>';
        

          if( have_rows('price_repeater') ):

            $i = 0;

            while ( have_rows('price_repeater') ) : the_row();

                $i++;

                $price_repeater                 = get_field('price_repeater');
                $repeater_price                 = get_sub_field('repeater_price');
                $price_timestamp                = get_sub_field('price_timestamp');
                $price_json_object              = get_sub_field('price_json_object');
                $price_last_cron_update         = get_field('price_last_cron_update');

                if ($repeater_price == 0) {
                  $repeater_price = 'FREE';
                }
                else {
                  $sign = '$';
                  $repeater_price = "$sign$repeater_price";
                }
                
                $formattedDate = date('M j, Y', $price_timestamp);

                if ($i == 1 ) {
                  echo '<h6>';
                  echo $formattedDate;
                  echo ' <i class="fa fa-arrows-h"></i> ';
                  echo $repeater_price;
                  echo '</h6>';
                  // echo $i;
                 
                }

                else {
                  echo '<h6>';
                  echo $formattedDate;
                  if ($price_repeater[$i - 1]['repeater_price'] > $price_repeater[$i - 2]['repeater_price'] ) {
                    echo ' <i class="fa fa-arrow-up"></i> ';
                  }
                  else if ($price_repeater[$i - 1]['repeater_price'] < $price_repeater[$i - 2]['repeater_price'] ) {
                    echo ' <i class="fa fa-arrow-down"></i> ';
                  }
                  else if ($price_repeater[$i - 1]['repeater_price'] == $price_repeater[$i - 2]['repeater_price'] ){
                    echo ' <i class="fa fa-arrows-h"></i> ';
                  }
                  echo $repeater_price;
                  echo '</h6>';


                  // echo $i;
                }





                
                

            endwhile;

        else :

            // no rows found

        endif;
        ?>
        </div>
        <h4><em class="faded">Genres</em></h4>
        <?php echo get_the_term_list( $post->ID, 'genres', '<ul><li>', '</li><li>', '</li></ul>' ); ?>
        <h4><em class="faded">Matching Search Terms</em></h4>
        <?php echo get_the_term_list( $post->ID, 'search-terms', '<ul><li>', '</li><li>', '</li></ul>' ); ?>
        <h4><em class="faded">Supported Devices</em></h4>
        <?php echo get_the_term_list( $post->ID, 'devices', '<ul><li>', '</li><li>', '</li></ul>' ); ?>
      </div>
    </div>
    <div class="col-sm-8">
      
      <p class="app-description">
        <?php echo nl2br(json_decode($description)); ?>
      </p>
      <h4>Release Notes</h4>
      <p class="app-description">
        <?php echo nl2br(json_decode($release_notes)); ?>
      </p>
      
        
   
      <div class="clear app-entry-divider"></div>
      <div class="screenshot-container">
        <?php

        if ($iphone_screenshot_0) {
          ?>
          <h4>iPhone Screenshots</h4>
            <div id="app-entry-carousel<?php echo $app_id; ?>" class="carousel slide app-screen-carousel" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#app-entry-carousel<?php echo $app_id; ?>" data-slide-to="0" class="active"></li>
                <?php
                if ($iphone_screenshot_1) {
                  ?>
                  <li data-target="#app-entry-carousel<?php echo $app_id; ?>" data-slide-to="1"></li>
                  <?php
                } 
                if ($iphone_screenshot_2) {
                  ?>
                  <li data-target="#app-entry-carousel<?php echo $app_id; ?>" data-slide-to="2"></li>
                  <?php
                } 
                if ($iphone_screenshot_3) {
                  ?>
                  <li data-target="#app-entry-carousel<?php echo $app_id; ?>" data-slide-to="3"></li>
                  <?php
                } 
                if ($iphone_screenshot_4) {
                  ?>
                  <li data-target="#app-entry-carousel<?php echo $app_id; ?>" data-slide-to="4"></li>
                  <?php
                }
                ?>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="<?php echo $iphone_screenshot_0; ?>" />
                </div>
                <?php
                if ($iphone_screenshot_1) {
                  ?>
                  <div class="item">
                    <img src="<?php echo $iphone_screenshot_1; ?>" />
                  </div>
                  <?php
                } 
                if ($iphone_screenshot_2) {
                  ?>
                  <div class="item">
                    <img src="<?php echo $iphone_screenshot_2; ?>" />
                  </div>
                  <?php
                } 
                if ($iphone_screenshot_3) {
                  ?>
                  <div class="item">
                    <img src="<?php echo $iphone_screenshot_3; ?>" />
                  </div>
                  <?php
                } 
                if ($iphone_screenshot_4) {
                  ?>
                  <div class="item">
                    <img src="<?php echo $iphone_screenshot_4; ?>" />
                  </div>
                  <?php
                }
                ?>
              </div><!-- carousel-inner -->
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#app-entry-carousel<?php echo $app_id; ?>" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#app-entry-carousel<?php echo $app_id; ?>" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div><!-- #app-entry-carousel -->
            <?php
        }
        
        

        if ($ipad_screenshot_0) {
          ?>
          <h4>iPad Screenshots</h4>
            <div id="app-entry-carousel-ipad<?php echo $app_id; ?>" class="carousel slide app-screen-carousel" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#app-entry-carousel-ipad<?php echo $app_id; ?>" data-slide-to="0" class="active"></li>
                <?php
                if ($ipad_screenshot_1) {
                  ?>
                  <li data-target="#app-entry-carousel-ipad<?php echo $app_id; ?>" data-slide-to="1"></li>
                  <?php
                } 
                if ($ipad_screenshot_2) {
                  ?>
                  <li data-target="#app-entry-carousel-ipad<?php echo $app_id; ?>" data-slide-to="2"></li>
                  <?php
                } 
                if ($ipad_screenshot_3) {
                  ?>
                  <li data-target="#app-entry-carousel-ipad<?php echo $app_id; ?>" data-slide-to="3"></li>
                  <?php
                } 
                if ($ipad_screenshot_4) {
                  ?>
                  <li data-target="#app-entry-carousel-ipad<?php echo $app_id; ?>" data-slide-to="4"></li>
                  <?php
                }
                ?>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="<?php echo $ipad_screenshot_0; ?>" />
                </div>
                <?php
                if ($ipad_screenshot_1) {
                  ?>
                  <div class="item">
                    <img src="<?php echo $ipad_screenshot_1; ?>" />
                  </div>
                  <?php
                } 
                if ($ipad_screenshot_2) {
                  ?>
                  <div class="item">
                    <img src="<?php echo $ipad_screenshot_2; ?>" />
                  </div>
                  <?php
                } 
                if ($ipad_screenshot_3) {
                  ?>
                  <div class="item">
                    <img src="<?php echo $ipad_screenshot_3; ?>" />
                  </div>
                  <?php
                } 
                if ($ipad_screenshot_4) {
                  ?>
                  <div class="item">
                    <img src="<?php echo $ipad_screenshot_4; ?>" />
                  </div>
                  <?php
                }
                ?>
              </div><!-- carousel-inner -->
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#app-entry-carousel-ipad<?php echo $app_id; ?>" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#app-entry-carousel-ipad<?php echo $app_id; ?>" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div><!-- #app-entry-carousel -->
            <?php
        }
        ?>
        <a href="<?php echo $track_view_url; ?>" target="itunes_store" class="itunes-badge second-badge">
          <img src="http://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.png" />
        </a>
      </div><!-- .screenshot-container-->
    </div>

    <div class="clear"></div>
    
  </div><!-- .app-entry-wrapper -->
  <?php
}

  else {
    echo 'something went wrong :(';
      
  }		 
  
    ?>
		

  </div>
  <footer>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
  </footer>
</article>
 <?php the_content();?>
 <?php comments_template('/templates/comments.php'); ?>
<?php endwhile; ?>