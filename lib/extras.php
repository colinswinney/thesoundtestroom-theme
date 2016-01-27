<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');



////////////////////////////////////////////////////////////////////////////

// BEGIN THESOUNDTESTROOM FUNCTIONS 

////////////////////////////////////////////////////////////////////////////
// ad php to text widget
function colin_php_execute($html){
if(strpos($html,"<"."?php")!==false){ ob_start(); eval("?".">".$html);
$html=ob_get_contents();
ob_end_clean();
}
return $html;
}
add_filter('widget_text', __NAMESPACE__ . '\\colin_php_execute',100);


// ACF Option Page 
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'menu_title'  => 'TSTR Settings',
    'menu_slug'   => 'thesoundtestroom-general-settings',
    'icon_url' => 'dashicons-thumbs-up', // Add this line and replace the second inverted commas with class of the icon you like
    'position' => '25',
    'capability'  => 'edit_themes',
  ));
  
}



function my_acf_admin_head() {
  ?>
  <style type="text/css">
    /* ACF STYLES */
    .acf-postbox.seamless > .acf-fields > .acf-field[data-width] + .acf-field[data-width] {
      padding:0;
    }
    .acf-postbox.seamless > .acf-fields > .acf-field:first-child {
      margin-top: 20px;
    }
    /* END ACF */
  </style>

  <script type="text/javascript">
  (function($){

    /* ... */

  })(jQuery);
  </script>
  <?php
}
add_action('acf/input/admin_head', __NAMESPACE__ . '\\my_acf_admin_head');









function add_cats_to_latest_widget( $field ) {

$my_array=array('None');

$args = array(
  'orderby' => 'name',
  'order' => 'ASC',
  'parent' => 0,
  );
$categories = get_categories($args);

foreach($categories as $category) { 
  $my_array[] = $category->name;
} 
wp_reset_query();

$field['choices'] = $my_array;
// return the field
return $field;    
}
add_filter('acf/load_field/name=featured_category',  __NAMESPACE__ . '\\add_cats_to_latest_widget');








// hide asa_item shortcodes 
add_shortcode( 'asa_item', '__return_false' );


// Custom Dashboard Widget
add_action('wp_dashboard_setup',  __NAMESPACE__ . '\\my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
  global $wp_meta_boxes;

  wp_add_dashboard_widget('custom_help_widget', 'thesoundtestroom Support',__NAMESPACE__ . '\\custom_dashboard_help');
  }

  function custom_dashboard_help() {
  ?>
  <p>Hello everybody, welcome to thesoundtestroom dashboard!</p>

  <p>Would you like to...</p>
  <ul>
    <li>- Edit the <a href="/wp-admin/post.php?post=11088&action=edit">Apps on Sale Page</a>?</li>
    <li>- Go to our <a href="https://www.patreon.com/thesoundtestroom" target="_blank">Patreon Account</a>?</li>
    <li>- Go to our <a href="https://itunes.phgconsole.performancehorizon.com/login/itunes" target="_blank">iTunes Account</a>?</li>
    <li>- Email <a href="mailto:thesoundtestroom@gmail.com" target="_top">Doug</a>, <a href="mailto:foonastudio5@gmail.com" target="_top">Jakob</a>, <a href="mailto:colinjswinney@gmail.com" target="_top">Colin</a>, or <a href="mailto:pantsofdeath@gmail.com" target="_top">Jon</a>?</li>
  </ul>
  <?php
}












// Replaces the login header logo URL
function namespace_login_headerurl( $url ) {
    $url = home_url( '/' );
    return $url;
}
add_filter( 'login_headerurl',  __NAMESPACE__ . '\\namespace_login_headerurl' );
// Replaces the login header logo title
function namespace_login_headertitle( $title ) {
    $title = get_bloginfo( 'thesoundtestroom' );
    return $title;
}
add_filter( 'login_headertitle',  __NAMESPACE__ . '\\namespace_login_headertitle' );
// Replaces the login header logo
function namespace_login_style() {
    echo '<style>.login h1 a { background-image: url( http://thesoundtestroom.com/wp-content/uploads/STR/whiteHeadSolo150x109.png ) !important; }</style>';
}
add_action( 'login_head',  __NAMESPACE__ . '\\namespace_login_style' );















// APP ENTRY ITUNES CONTENT
function app_entry_content() {

  $appEntryID = get_field('app_entry_id_number');    
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
    <h1><?php echo $appEntryTitle ?></h1>
    <p><?php echo the_terms( $post->ID, 'topics', 'Found in: ', ', ', ' ' ); ?> </p>

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
      /*
      <h4>In: '; echo the_field('audiobus_input'); echo '</h4>
        <h4>FX: '; echo the_field('audiobus_effect'); echo '</h4>
        <h4>Out: '; echo the_field('audiobus_output'); echo '</h4>
        <h4>State Saving: '; echo the_field('audiobus_state_saving'); echo '</h4>
        <h4>IAA Gen: '; echo the_field('iaa_instrument'); echo '</h4>
        <h4>IAA FX: '; echo the_field('iaa_effect'); echo '</h4>
        <h4>IAA Host: '; echo the_field('iaa_host'); echo '</h4>
        <h4>VoiceOver: '; echo the_field('voiceover_support'); echo '</h4>
        <h4>Dropbox: '; echo the_field('dropbox_support'); echo '</h4>
        <h4>AudioShare: '; echo the_field('audioshare_support'); echo '</h4>';
        */
  }
}

////////// END ITUNES CONTENT FUNCTION ///////////////







//////////// SAVE APP INFO INTO ACF FIELDS ///////////
add_action( 'save_post', __NAMESPACE__ . '\\save_acf_field_data', 10, 3 );
 
/* When the post is saved, saves our custom data */
function save_acf_field_data() {
 
  //declare cpt name
  global $post;
  $post_id = $post->ID;
  $post_slug = 'app_entry';
 
  //declare field name and field value
  $appEntryID = get_field('app_entry_id_number');    
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

  $field_name_title = "app_entry_title";
  $field_value_title = $appEntryTitle;

  $field_name_url = "app_entry_url";
  $field_value_url = $appEntryURL;

  $field_name_60 = "app_entry_artwork_url_60";
  $field_value_60 = $appEntryIcon60;

  $field_name_512 = "app_entry_artwork_url_512";
  $field_value_512 = $appEntryIcon512;

  $field_name_desc = "app_entry_description";
  $field_value_desc = $appEntryDescription;

  $field_name_dev = "app_entry_developer";
  $field_value_dev = $appEntryDeveloper;

  $field_name_dev_contact = "app_entry_developer_contact";
  $field_value_dev_contact = $appEntryDeveloperContact;

  $field_name_dev_store = "app_entry_developer_store";
  $field_value_dev_store = $appEntryDeveloperStore;

  $field_name_price = "app_entry_price";
  $field_value_price = $appEntryPrice;

  $field_name_min_os = "app_entry_minimum_os";
  $field_value_min_os = $appEntryMinVersion;

  $field_name_version = "app_entry_version";
  $field_value_version = $appEntryVersion;

  $field_name_date = "app_entry_date";
  $field_value_date = $appEntryDateLong;

  update_post_meta( $post_id, $field_name_title, $field_value_title );

  update_post_meta( $post_id, $field_name_url, $field_value_url );

  update_post_meta( $post_id, $field_name_60, $field_value_60 );

  update_post_meta( $post_id, $field_name_512, $field_value_512 );

  update_post_meta( $post_id, $field_name_desc, $field_value_desc );

  update_post_meta( $post_id, $field_name_dev, $field_value_dev );

  update_post_meta( $post_id, $field_name_dev_contact, $field_value_dev_contact );

  update_post_meta( $post_id, $field_name_dev_store, $field_value_dev_store );

  update_post_meta( $post_id, $field_name_price, $field_value_price );

  update_post_meta( $post_id, $field_name_version, $field_value_version );

  update_post_meta( $post_id, $field_name_min_os, $field_value_min_os );

  update_post_meta( $post_id, $field_name_date, $field_value_date );

}








//////////// SAVE OLD LINKS INTO GETAPP FIELDS ///////////
add_action( 'save_post', __NAMESPACE__ . '\\save_get_app_data', 10, 3 );
 
/* When the post is saved, saves our custom data */
function save_get_app_data() {
 
  //declare cpt name
  global $post;
  $post_id = $post->ID;
  $post_slug = 'post';

  if (get_field('app_store_link')) {
    //declare field name and field value
    $appLink = get_field('app_store_link'); 
    $trimLink = parse_url($appLink, PHP_URL_PATH);
    $reverseTrim = strrev($trimLink);
    $substrReverse = substr($reverseTrim, 0, 9);
    $final = strrev($substrReverse);    
    

    $field_name_link = "first_app_id";
    $field_value_link = $final;

    update_post_meta( $post_id, $field_name_link, $field_value_link );
  }

  if (get_field('app_store_link_2')) {
    //declare field name and field value
    $appLink2 = get_field('app_store_link_2'); 
    $trimLink2 = parse_url($appLink2, PHP_URL_PATH);
    $reverseTrim2 = strrev($trimLink2);
    $substrReverse2 = substr($reverseTrim2, 0, 9);
    $final2 = strrev($substrReverse2);    
    

    $field_name_link2 = "first_app_id";
    $field_value_link2 = $final2;

    update_post_meta( $post_id, $field_name_link2, $field_value_link2 );
  }

  if (get_field('app_store_link_3')) {
    //declare field name and field value
    $appLink3 = get_field('app_store_link_3'); 
    $trimLink3 = parse_url($appLink3, PHP_URL_PATH);
    $reverseTrim3 = strrev($trimLink3);
    $substrReverse3 = substr($reverseTrim3, 0, 9);
    $final3 = strrev($substrReverse3);    
    

    $field_name_link3 = "first_app_id";
    $field_value_link3 = $final3;

    update_post_meta( $post_id, $field_name_link3, $field_value_link3 );
  }

  if (get_field('app_store_link_4')) {
    //declare field name and field value
    $appLink4 = get_field('app_store_link_4'); 
    $trimLink4 = parse_url($appLink4, PHP_URL_PATH);
    $reverseTrim4 = strrev($trimLink4);
    $substrReverse4 = substr($reverseTrim4, 0, 9);
    $final4 = strrev($substrReverse4);    
    

    $field_name_link4 = "first_app_id";
    $field_value_link4 = $final4;

    update_post_meta( $post_id, $field_name_link4, $field_value_link4 );
  }

}










add_action('admin_menu', __NAMESPACE__ . '\\sale_admin_menu');
 
/**
* add external link to Tools area
*/
function sale_admin_menu() {
    global $submenu;
    $url = '/wp-admin/post.php?post=11088&action=edit';
    $submenu['edit.php?post_type=page'][] = array('Apps on Sale', 'manage_options', $url);
}