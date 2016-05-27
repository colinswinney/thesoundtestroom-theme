<?php 

//APP ONE 
$appOneID = get_field('first_app_id');

// APP TWO
$appTwoID = get_field('second_app_id');

// APP THREE
$appThreeID = get_field('third_app_id');

// APP FOUR
$appFourID = get_field('fourth_app_id');

// APP FIVE
$appFiveID = get_field('fifth_app_id');

// APP SIX
$appSixID = get_field('sixth_app_id');

// APP SEVEN
$appSevenID = get_field('seventh_app_id');

// APP EIGHT
$appEightID = get_field('eighth_app_id');

// APP NINE
$appNineID = get_field('ninth_app_id');

// APP TEN
$appTenID = get_field('tenth_app_id');

// create array of ID's
$array = array();

// append array if available
if ($appOneID) {
  array_push( $array, $appOneID );
}
if ($appTwoID) {
  array_push( $array, $appTwoID );
}
if ($appThreeID) {
  array_push( $array, $appThreeID );
}
if ($appFourID) {
  array_push( $array, $appFourID );
}
if ($appFiveID) {
  array_push( $array, $appFiveID );
}
if ($appSixID) {
  array_push( $array, $appSixID );
}
if ($appSevenID) {
  array_push( $array, $appSevenID );
}
if ($appEightID) {
  array_push( $array, $appEightID );
}
if ($appNineID) {
  array_push( $array, $appNineID );
}
if ($appTenID) {
  array_push( $array, $appTenID );
}

// loop through ID's and echo html  
echo '<section class="get-app-section-wrapper">';
foreach ($array as $item) {
  $appID = $item;    
  $appInfo = 'http://itunes.apple.com/lookup?id='. $appID .'';
  $appData = json_decode(file_get_contents($appInfo), true);
  $appTitle = $appData['results'][0]['trackName'];
  $appURL = $appData['results'][0]['trackViewUrl'];
  $appIcon60 = $appData['results'][0]['artworkUrl60'];
  $appIcon512 = $appData['results'][0]['artworkUrl512'];
  $appPrice = $appData['results'][0]['price'];
  $appDescription = $appData['results'][0]['description'];
  $appDeveloper = $appData['results'][0]['artistName'];
  $appDeveloperStore = $appData['results'][0]['artistViewUrl'];
  $appDeveloperContact = $appData['results'][0]['sellerUrl'];
  $appVersion = $appData['results'][0]['version'];
  $appMinOS = $appData['results'][0]['minimumOsVersion'];
  $appDateLong = $appData['results'][0]['releaseDate'];
  $appYear = substr($appDateLong, 0, 4);
  $appMonth = substr($appDateLong, 5, 2);
  $appDay = substr($appDateLong, 8, 2);
  $appMonthName = date('F', mktime(0, 0, 0, $appMonth, 10)); // March
  $SOSterm = substr($appTitle, 0, 10);
  $appScreenShots = $appData['results'][0]['screenshotUrls'];
  $appIpadScreenShots = $appData['results'][0]['ipadScreenshotUrls'];
  $appSupported = $appData['results'][0]['supportedDevices'];

  ?>
  <div class="getApp tstr-get-app">
    <a href="<?php echo $appURL; ?>" target="_blank">
      <img src="<?php echo $appIcon60; ?>" alt="<?php echo $appTitle; ?>" />Get <span class="getAppSectionTitle"><?php echo $appTitle; ?></span>
      <em> 
        <?php
        if ($appPrice == 0) {
          echo '(FREE)';
        } else {
          echo '($'.$appPrice.')';
        }
        ?>
      </em>
    </a>
  </div>
  <button title="Get More Info" type="button" class="btn btn-lg get-info-btn" data-toggle="modal" data-target="#<?php echo $appID; ?>">Get More Info</button>
  <div id="<?php echo $appID; ?>" class="modal fade get-app-class" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <?php get_template_part('templates/modal-header'); ?>

        <div class="modal-body">
          <div class="app-entry-wrapper">
            <h1><?php echo $appTitle ?></h1>
            <p><?php echo the_terms( $post->ID, 'topics', 'Found in: ', ', ', ' ' ); ?> </p>

            <div class="col-sm-5 col-md-4 no-gutter">
              <div class="app-content-info-wrapper">
                  <a href="<?php echo $appURL; ?>" target="_blank">
                    <img src="<?php echo $appIcon512; ?>" />
                  </a>
                  <h2>
                    <?php
                      if ($appPrice == 0) {
                        echo 'FREE';
                      } else {
                        echo '$'.$appPrice.'';
                      }
                    ?>
                  </h2>
                  <h4><em class="faded">Developed by -</em> <a id="developerNameAE" href="<?php echo $appDeveloperStore; ?>" target="_blank"><?php echo $appDeveloper; ?></a></h4>
                  <h4><em class="faded">Minimum Required OS -</em> <?php echo $appMinOS; ?></h4>
                  <h4><em class="faded">Current Version -</em> <?php echo $appVersion; ?></h4>
                  <h4><em class="faded">Originally Released -</em> <?php echo $appMonthName; ?> <?php echo $appDay; ?>, <?php echo $appYear; ?></h4>
                  <h4><em class="faded">Search our site for -</em> "<a href="<?php echo bloginfo('url'); ?>/?s=<?php echo $SOSterm; ?>"><?php echo $SOSterm; ?></a>"</h4>
                  <a href="<?php echo $appEntryURL; ?>" target="itunes_store" class="itunes-badge">
                    <img src="http://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.png" />
                  </a>
                </div>
            </div>
            <div class="col-sm-7 col-md-8">
              <p class="app-single-description">
                <?php echo nl2br($appDescription);?>
              </p>
            </div>

            <div class="clear app-entry-divider"></div>

            <div class="col-sm-5 col-md-4 no-gutter">
              <h4>Supported Devices</h4>
              <ul class="supported-list">
                <?php
                foreach ($appSupported as $device) {
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
                if ($appScreenShots) {
                  ?>
                  <h4>iPhone Screenshots</h4>
                  <div id="app-entry-carousel<?php echo $appID; ?>" class="carousel slide app-screen-carousel" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <?php 
                        $y = 0;
                        $count = count($appScreenShots);
                        foreach ( $appScreenShots as $screenshot ) {
                
                            if ($y == 0) {
                              ?>
                                <li data-target="#app-entry-carousel<?php echo $appID; ?>" data-slide-to="<?php echo $y; ?>" class="active"></li>
                              <?php
                            }
                            else {
                              ?>
                              <li data-target="#app-entry-carousel<?php echo $appID; ?>" data-slide-to="<?php echo $y; ?>"></li>
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
                      $countZ = count($appScreenShots);
                      foreach ( $appScreenShots as $screenshot ) {
                
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
                    <a class="left carousel-control" href="#app-entry-carousel<?php echo $appID; ?>" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#app-entry-carousel<?php echo $appID; ?>" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div><!-- #app-entry-carousel -->
                  <?php
                }



                //iPad Carousel
                if ($appIpadScreenShots) {
                  ?>
                  <h4>iPad Screenshots</h4>
                  <div id="app-entry-carousel-ipad<?php echo $appID; ?>" class="carousel slide app-screen-carousel" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <?php 
                        $q = 0;
                        $countQ = count($appIpadScreenShots);
                        foreach ( $appIpadScreenShots as $screenshotIpad ) {
                
                            if ($q == 0) {
                              ?>
                                <li data-target="#app-entry-carousel-ipad<?php echo $appID; ?>" data-slide-to="<?php echo $q; ?>" class="active"></li>
                              <?php
                            }
                            else {
                              ?>
                              <li data-target="#app-entry-carousel-ipad<?php echo $appID; ?>" data-slide-to="<?php echo $q; ?>"></li>
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
                      $countE = count($appIpadScreenShots);
                      foreach ( $appIpadScreenShots as $screenshotIpad ) {
                
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
                    <a class="left carousel-control" href="#app-entry-carousel-ipad<?php echo $appID; ?>" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#app-entry-carousel-ipad<?php echo $appID; ?>" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div><!-- #app-entry-carousel-ipad -->
                  <?php
                }
              ?>
            </div><!-- .screenshot-container-->

            <div class="clear"></div>
            <a href="<?php echo $appURL; ?>" target="itunes_store" class="itunes-badge second-badge">
              <img src="http://linkmaker.itunes.apple.com/images/badges/en-us/badge_appstore-lrg.png" />
            </a>
          </div><!-- .app-entry-wrapper -->
        </div>

        
        <?php get_template_part('templates/modal-footer'); ?>
      </div>

    </div>
  </div>
  <?php
}
echo '</section>';