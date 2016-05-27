<article <?php post_class(); ?>>
  	<img class="app-archive-tax-image" src="<?php $image = get_field ('app_entry_artwork_url_60'); if ($image) { echo $image; } else { echo '/wp-content/uploads/STR/genericPostPhoto.png'; } ?>" >
    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div class="clear"></div>
</article>
