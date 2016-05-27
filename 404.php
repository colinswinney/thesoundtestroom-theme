<?php get_template_part('templates/page', 'header'); ?>

<p><strong>Sorry, but the page you were trying to view does not exist.  The page may have been deleted, or there currently might not be any posts, comics, or apps with that tag.</strong></p>

<?php if (has_nav_menu('primary_navigation')) :
  wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
endif;
?>
<div class="clear"></div>
<?php get_search_form(); ?>
