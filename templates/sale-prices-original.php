<?php
/* Don't remove this line. */
require('../../../../wp-blog-header.php');


$args = array(
	'post_type' => 'sales',
	'posts_per_page' => -1,
	);
$loop = new WP_Query( $args );  
while ( $loop->have_posts() ) : $loop->the_post();


$appSaleOldPrice = get_field('app_sale_old_price');
$appSaleIntroPrice = get_field('app_sale_intro_price');
$appSaleIap = get_field('app_sale_iap');


$appSaleId = get_field('app_sale_id_number');   
$appSaleInfo = 'http://itunes.apple.com/lookup?id='. $appSaleId .'';
$appSaleJSONData = json_decode(file_get_contents($appSaleInfo), true);
$appSaleIcon = $appSaleJSONData['results'][0]['artworkUrl512'];
$appSalePrice = $appSaleJSONData['results'][0]['price'];
$appTitle = $appSaleJSONData['results'][0]['trackName'];
$appPercent = $appSalePrice / $appSaleOldPrice;
$appPercentTotal = round($appPercent, 2);
$appPercentTotal = $appPercentTotal * 100;
$totalPercent = 100 - $appPercentTotal;
$standard_price = get_field('standard_price');
?>	
<div class="row">
    <div class="col-xs-12 col-sm-4"><img alt="<?php echo $title;?>iOS Music App Sale" src="<?php echo $appSaleIcon;?>" width=100% /></div>
    <div class="col-xs-12 col-sm-8">
    	<h3><?php echo $appTitle;?></h3>
    	<h6>
			<span>
			<?php
		        if ($appSalePrice == 0) {
		          echo 'FREE';
		        } else {
		          echo '$'.$appSalePrice.'';
		        }
	        ?>
			</span>
		</h6>
    </div>
    
</div>
<?php

endwhile;

wp_reset_query();  // Restore global post data stomped by the_post(). ?>