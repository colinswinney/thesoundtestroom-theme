<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="app-sale-body" id="appSalePageLazyLoader">
<h4>Please be patient as we fetch the latest prices.</h4><br>

<?php 

	$args = array(
		'post_type' => 'sales',
		'posts_per_page' => -1,
		);
	$loop = new WP_Query( $args );  
	while ( $loop->have_posts() ) : $loop->the_post();
	?>
	<article <?php post_class(); ?>>
	  <div>
	    <?php 
	    	$title = get_field('sale_title');
			$url = get_field('sale_url');
			$art_60 = get_field('sale_artwork_60');
			$art_512 = get_field('sale_artwork_512');
			$desc = get_field('sale_description');
			$dev = get_field('sale_developer');
			$dev_contact = get_field('sale_developer_contact');
			$dev_store = get_field('sale_developer_store');
			$price = get_field('sale_price');
			$min_os = get_field('sale_minimum_os');
			$version = get_field('sale_version');
			$date = get_field('sale_date');
			$oldPrice = get_field('app_sale_old_price');
	        ?>
			<div class="row">
		        <div class="col-xs-12 col-sm-4"><img alt="<?php echo $title;?>iOS Music App Sale" src="<?php echo $art_512;?>" width=100% /></div>
		        <div class="col-xs-12 col-sm-8">
		        	<h3><?php echo $title;?></h3>
		        	<div class="clear"></div>
					<i class="fa fa-spinner fa-pulse"></i>
					<br>
					<p>was $<?php echo $oldPrice; ?></p>
		        </div>
		        <div class="col-xs-12 col-xs-offset-1">
					
		        </div>
			</div>
	        
	      
	  </div>
	</article>


<?php endwhile; ?>

</div>
<script type="text/javascript">
	jQuery(document).ready(function() {
		
		jQuery('#appSalePageLazyLoader').load('<?php bloginfo('url'); ?>/wp-content/themes/thesoundtestroom/templates/sale-prices.php');
	});
</script>