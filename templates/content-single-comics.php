<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      
      <p><?php the_tags(); ?></p>
      <span class="comicMainContent">
      <?php 
        if( get_the_post_thumbnail() ) {
    
            echo the_post_thumbnail('large');
    
          }
      
      ?>
      </span> 
                      

                    
 

    <?php the_content();?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
