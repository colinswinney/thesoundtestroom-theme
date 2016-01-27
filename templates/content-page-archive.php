<?php the_content(); ?>

<div class="col-sm-6 archive-half"><?php dynamic_sidebar('sidebar-archive-page-left'); ?></div>
<div class="col-sm-6 archive-half"><?php dynamic_sidebar('sidebar-archive-page-right'); ?></div>

<div class="clear"></div>

<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
<?php comments_template('/templates/comments.php'); ?>