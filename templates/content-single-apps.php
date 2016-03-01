<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="entry-content">


  <?php
  $now = time();
  $thrity_days_ago = strtotime('-16 minutes');
  $diff = $time - $thrity_days_ago;
  // echo $diff;
  // echo date('F j, Y', $thrity_days_ago);

  $rows = get_field('json_logs');
  $row_count = count($rows);
  $end_row_number = $row_count - 1;
  $end_row = $rows[$end_row_number];
  $end_row_timestamp = $end_row['repeater_json_object_timestamp'];

  // echo $row_count;
  // var_dump($end_row_timestamp);


  if ($end_row_timestamp < $thrity_days_ago) {
    echo 'fart';
  }



  $appEntryID = get_field('app_id'); 
  $json_object = get_field('json_object');    
  $appEntryInfo = 'http://itunes.apple.com/lookup?id='. $appEntryID .'';
  $appEntryData = json_decode(file_get_contents($appEntryInfo), true);
  $appEntryTitle = $appEntryData['results'][0]['trackName'];
  $appEntryURL = $appEntryData['results'][0]['trackViewUrl'];
  $appEntryIcon60 = $appEntryData['results'][0]['artworkUrl60'];
  $appEntryIcon512 = $appEntryData['results'][0]['artworkUrl512'];
  $appEntryPrice = $appEntryData['results'][0]['price'];
  $appEntryDescription = $appEntryData['results'][0]['description'];
  $appEntryDeveloper = $appEntryData['results'][0]['artistName'];
  $appEntryDeveloperStore = $appEntryData['results'][0]['artistViewUrl'];
  $appEntryDeveloperContact = $appEntryData['results'][0]['sellerUrl'];
  $appEntryVersion = $appEntryData['results'][0]['version'];
  $appEntryMinVersion = $appEntryData['results'][0]['minimumOsVersion'];
  $appEntryDateLong = $appEntryData['results'][0]['releaseDate'];
  $appEntryYear = substr($appEntryDateLong, 0, 4);
  $appEntryMonth = substr($appEntryDateLong, 5, 2);
  $appEntryDay = substr($appEntryDateLong, 8, 2);
  $monthName = date('F', mktime(0, 0, 0, $appEntryMonth, 10)); // March
  $appEntryDivTitle = substr($appEntryTitle, 0, 20);
  $SOSterm = substr($appEntryTitle, 0, 10);
  $appEntryScreenShots = $appEntryData['results'][0]['screenshotUrls'];
  $appEntryIpadScreenShots = $appEntryData['results'][0]['ipadScreenshotUrls'];
  $appEntrySupported = $appEntryData['results'][0]['supportedDevices'];

  if ($appEntryPrice == 0) {
    $appEntryPrice = 'FREE';
  }
  else {
    $sign = '$';
    $appEntryPrice = "$sign$appEntryPrice";
  }
  
  if( $appEntryTitle ) {

    ?>
    
    <!-- begin html content -->
  <div class="app-entry-wrapper">
    <h1><?php echo $json_object['results'][0]['trackName'];?></h1>
    <h1><?php echo $appEntryTitle ?></h1>
    <p><?php echo the_terms( $post->ID, 'topics', 'Found in: ', ', ', ' ' ); ?> </p>

    <?php

      if( have_rows('json_logs') ):

            echo '<h2>';
            echo $appEntryPrice;
            echo '</h2>';

      // loop through the rows of data
        while ( have_rows('json_logs') ) : the_row();

            // display a sub field value
            $repeaterPrice = get_sub_field('repeater_price');
            $repeaterTimestamp = get_sub_field('repeater_json_object_timestamp');
            $formattedDate = date('F j, Y', $repeaterTimestamp);
            
            echo '<h4>';
            echo $repeaterPrice;
            echo ', ';
            echo $formattedDate;
            echo '</h4>';

        endwhile;

    else :

        // no rows found

    endif;
  ?>

    <div class="col-sm-5 col-md-4 no-gutter">
      <div class="app-content-info-wrapper">
          <a href="<?php echo $appEntryURL; ?>" target="_blank">
            <img src="<?php echo $appEntryIcon512; ?>" />
          </a>
          <h2><?php echo $appEntryPrice; ?></h2>
          <h4><em class="faded">Developed by -</em> <a id="developerNameAE" href="<?php echo $appEntryDeveloperStore; ?>" target="_blank"><?php echo $appEntryDeveloper; ?></a></h4>
          <h4><em class="faded">Minimum Required OS -</em> <?php echo $appEntryMinVersion; ?></h4>
          <h4><em class="faded">Current Version -</em> <?php echo $appEntryVersion; ?></h4>
          <h4><em class="faded">Originally Released -</em> <?php echo $monthName; ?> <?php echo $appEntryDay; ?>, <?php echo $appEntryYear; ?></h4>
          <h4><em class="faded">Search our site for -</em> "<a href="<?php echo bloginfo('url'); ?>/?s=<?php echo $SOSterm; ?>"><?php echo $SOSterm; ?></a>"</h4>
          <a href="<?php echo $appEntryURL; ?>" target="itunes_store" class="itunes-badge">
            <img src="http://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.png" />
          </a>
        </div>
    </div>
    <div class="col-sm-7 col-md-8 app-desc-column">
      <p class="app-single-description">
        <?php echo nl2br($appEntryDescription);?>
      </p>
    </div>

    <div class="clear app-entry-divider"></div>

    <div class="col-sm-5 col-md-4 no-gutter">
      <h4>Supported Devices</h4>
      <ul class="supported-list">
        <?php
        foreach ($appEntrySupported as $device) {
            ?>
            <li>
              <h5>
                <?php echo $device; ?>
              </h5>
            </li>
            <?php
        }
        ?>
      </ul>
    </div>
    <div class="col-sm-7 col-md-8 screenshot-container">
      <?php
        //iPhone Carousel
        if ($appEntryScreenShots) {
          ?>
          <h4>iPhone Screenshots</h4>
          <div id="app-entry-carousel<?php echo $appEntryID; ?>" class="carousel slide app-screen-carousel" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php 
                $y = 0;
                $count = count($appEntryScreenShots);
                foreach ( $appEntryScreenShots as $screenshot ) {
        
                    if ($y == 0) {
                      ?>
                        <li data-target="#app-entry-carousel<?php echo $appEntryID; ?>" data-slide-to="<?php echo $y; ?>" class="active"></li>
                      <?php
                    }
                    else {
                      ?>
                      <li data-target="#app-entry-carousel<?php echo $appEntryID; ?>" data-slide-to="<?php echo $y; ?>"></li>
                      <?php
                    }
                  $y++;
                }
              ?>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <?php
              $z = 0;
              $countZ = count($appEntryScreenShots);
              foreach ( $appEntryScreenShots as $screenshot ) {
        
                  if ($z == 0) {
                    ?>
                      <div class="item active">
                        <img src="<?php echo $screenshot; ?>" />
                      </div>
                    <?php
                  }
                  else {
                    ?>
                      <div class="item">
                        <img src="<?php echo $screenshot; ?>" />
                      </div>
                    <?php
                  }
                $z++;
              }
              ?>
            </div><!-- carousel-inner -->
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#app-entry-carousel<?php echo $appEntryID; ?>" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#app-entry-carousel<?php echo $appEntryID; ?>" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div><!-- #app-entry-carousel -->
          <?php
        }



        //iPad Carousel
        if ($appEntryIpadScreenShots) {
          ?>
          <h4>iPad Screenshots</h4>
          <div id="app-entry-carousel-ipad<?php echo $appEntryID; ?>" class="carousel slide app-screen-carousel" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php 
                $q = 0;
                $countQ = count($appEntryIpadScreenShots);
                foreach ( $appEntryIpadScreenShots as $screenshotIpad ) {
        
                    if ($q == 0) {
                      ?>
                        <li data-target="#app-entry-carousel-ipad<?php echo $appEntryID; ?>" data-slide-to="<?php echo $q; ?>" class="active"></li>
                      <?php
                    }
                    else {
                      ?>
                      <li data-target="#app-entry-carousel-ipad<?php echo $appEntryID; ?>" data-slide-to="<?php echo $q; ?>"></li>
                      <?php
                    }
                  $q++;
                }
              ?>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <?php
              $e = 0;
              $countE = count($appEntryIpadScreenShots);
              foreach ( $appEntryIpadScreenShots as $screenshotIpad ) {
        
                  if ($e == 0) {
                    ?>
                      <div class="item active">
                        <img src="<?php echo $screenshotIpad; ?>" />
                      </div>
                    <?php
                  }
                  else {
                    ?>
                      <div class="item">
                        <img src="<?php echo $screenshotIpad; ?>" />
                      </div>
                    <?php
                  }
                $e++;
              }
              ?>
            </div><!-- carousel-inner -->
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#app-entry-carousel-ipad<?php echo $appEntryID; ?>" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#app-entry-carousel-ipad<?php echo $appEntryID; ?>" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div><!-- #app-entry-carousel-ipad -->
          <?php
        }
      ?>
    </div><!-- .screenshot-container-->

    <div class="clear"></div>
    <a href="<?php echo $appEntryURL; ?>" target="itunes_store" class="itunes-badge second-badge">
      <img src="http://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.png" />
    </a>
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
<?php endwhile; ?>