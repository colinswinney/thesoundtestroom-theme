<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      
      
      <?php

        if ( get_field('url_for_youtube') ) {
          ?>
          <div class="mainPageVideoContainer">
            <div class="video-container">
              <iframe src="http://www.youtube.com/embed/<?php the_field('url_for_youtube');?>?autohide=1" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
            <h2><?php the_field('video_caption');?></h2>
          </div>
          <?php
        }

        else if ( get_field('youtube_url') ) {
          ?>
          <div class="mainPageVideoContainer">
            <div class="video-container">
              <iframe src="http://www.youtube.com/embed/<?php the_field('youtube_url');?>?autohide=1" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
            <h2><?php the_field('video_caption');?></h2>
          </div>
          <?php
        }
      ?>

      <?php the_content(); ?>




    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('<span>Continued:</span><div class="clear"></div>', 'sage'), 'after' => '</p></nav>']); ?>

      <?php 
      if( have_rows('get_app_repeater') ) {
        get_template_part('templates/getAppRepeater');
      }
      else if(get_field('first_app_id')) {
        get_template_part('templates/getAppSection');
      }
       
      ?>


      
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>