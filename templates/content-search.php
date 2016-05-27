<!--<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php // if (get_post_type() === 'post') { get_template_part('templates/entry-meta'); } ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
-->


<div class="col-md-6 home-article-wrap">
  <article <?php post_class(); ?>>
    
      <div class="home-article-image">
        <div class="home-post-meta">

        <?php
        	$id = $object['id'];
			$url = wp_get_attachment_url( get_post_thumbnail_id($id) );
			$sizes = get_intermediate_image_sizes();

			$images = array();
			foreach ( $sizes as $size ) {
			  $images[] = wp_get_attachment_image_src( get_post_thumbnail_id($id), $size );
			}

			?><a href="<?php the_permalink(); ?>" class="featured-image-link-wrap"><img src="
      <?php

			if ($images[0][0] == false ) {
				echo '/wp-content/uploads/STR/genericPostPhoto.png';
			}
			else {
				echo $images[0][0];
			}
			?>" ></a>
          
            
          <div class="clear"></div>
          <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
          <h6><?php the_author(); ?></h6>
        </div>
      </div>
    
    <div class="home-article-title">
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>   
    </div>    
      <div class="clear"></div>
  </article>
</div>