<?php
/**
 * Template Name: Apps on Sale
 */
?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page-apps-on-sale'); ?>
<?php endwhile; ?>
