<header class="banner" role="banner">
  <div class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">

      <div class="navbar-header">
        
        <!-- <img class="logo" src="/wp-content/uploads/2016/05/whiteHeadSolo150x109.png" alt="thesoundtestroom logo"> -->
        
        <?php
        // $logoLeft = get_field('logo_left_image', 'option');
        // $logoRight = get_field('logo_right_image', 'option');

        // if ($logoLeft) {
        //   echo '<img class="head-logo" src="'; echo $logoLeft; echo'" alt="thesoundtestroom flexible logo">';
        // } else {
        //   echo '<img class="head-logo" src="/wp-content/uploads/2016/05/whiteHeadSolo150x109.png" alt="logo">';
        // }
        // ?>

        <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><?php echo bloginfo('name'); ?></a>
        
        <?php
        // if ($logoRight) {
        //   echo '<img class="head-logo" src="'; echo $logoRight;echo'" alt="thesoundtestroom flexible logo">';
        // } else {
        //   echo '<img class="head-logo" src="/wp-content/uploads/2016/05/whiteHeadSolo150x109.png" alt="logo">';
        // }
        ?>
        
        <p class="site-desc"><?php echo bloginfo('description'); ?></p>
        
        <div class="clear"></div>

      </div>
      
    </div>
  </div>
  <?php if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
  } ?>
  <div class="ad-wrapper">
    <div class="col-xs-12 no-gutter"><?php if(function_exists('oiopub_banner_zone')) oiopub_banner_zone(3, 'center'); ?></div>
    <div class="clear"></div>
  </div>
  <button title="Main Menu" type="button" class="btn btn-info sticky-btn quick-menu-btn" data-toggle="modal" data-target="#menuModal">MAIN</button>
  <button title="Quick Sales Menu" type="button" class="btn btn-info sticky-btn quick-sales-btn" data-toggle="modal" data-target="#sales-quick-menu">APPS</button>
  <button title="Quick Comic Menu" type="button" class="btn btn-info sticky-btn quick-comic-btn" data-toggle="modal" data-target="#comic-quick-menu">COMICS</button>
  <div class="clear"></div>
</header>
<?php get_template_part('templates/modals'); ?>