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
      <h4 class="modal-id-header">Apps</h4>
      <div class="modal-body">
      <h4>Please check out our new App archives!</h4>
      <img src="/wp-content/uploads/2016/04/appStore-STR.png" alt="app store logo" style="height:100px;width:100px">


        <?php if (has_nav_menu('app_navigation')) :
          wp_nav_menu(['theme_location' => 'app_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
        endif;
        ?>
      </div>
      <?php get_template_part('templates/modal-footer'); ?>
    </div>
  </div>
</div>