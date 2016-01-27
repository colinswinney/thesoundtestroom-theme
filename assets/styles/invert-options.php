<?php
	$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
	$wp_load = $absolute_path[0] . 'wp-load.php';
	require_once($wp_load);

	// define variables 
	// eg: $logoLeft = get_field('logo_left_image', 'option');

	$invert = get_field('invert_the_site', 'option');
	$white_op4 = 'rgba(255,255,255,0.4)';
	$black_op3 = 'rgba(0,0,0,0.03)';
	$black_op5 = 'rgba(0,0,0,0.05)';
	$dark_border = '1px solid rgba(0,0,0,0.2)';
	
	header("Content-type: text/css; charset: UTF-8");
	header('Cache-control: must-revalidate');


?>
<?php
if ($invert) {
?>

	.navbar-default, .main-footer {
		background-color:<?php echo $white_op4; ?>;
	}
	.wp-pagenavi a, #breadcrumbs, .page-nav a, .comments, .contact-support-image-row p, .contact-support-image-row .contact-content {
		background-color:<?php echo $black_op5; ?>;
	}

	.navbar-default, .home-article-wrap:after, .wp-pagenavi a, .wp-pagenavi .pages, #breadcrumbs, .page-nav a, .widget_recent_comments #recentcomments li, .latest-post-widget-article, .sd-content ul:after, .comments ol li, .comments ol li .children li, .page-header:after, .app-archive-term-wrapper:after, .page-template-template-downloads-page .downloads-section h3:after, .single article header:after {
		border-bottom:<?php echo $dark_border; ?> !important;
	}
	.latest-post-widget-article:last-of-type {
		border-bottom:none !important;
	}
	.sharedaddy h3.sd-title:before, .comments ol li .children li, .main-footer {
		border-top:<?php echo $dark_border; ?> !important;
	}
	.comments ol li .children li {
		background-color:<?php echo $black_op3; ?>
	}
	.share-facebook.sd-button, .share-twitter.sd-button, .share-google-plus-1.sd-button, .share-email.sd-button, .contact-support-image-row p, .contact-support-image-row .contact-content, .app-single-description {
		border:<?php echo $dark_border; ?> !important;
	}
	.share-facebook.sd-button:hover, .share-twitter.sd-button:hover, .share-google-plus-1.sd-button:hover, .share-email.sd-button:hover {
		border:1px solid #111 !important;
	}
	.share-email.sd-button {
		background-color: rgba(0,0,0, 0.2) !important;
	}
	.share-email.sd-button:hover {
		background-color: rgba(0,0,0, 0.4) !important;
	}
	.close, .close:hover {
		color:#111;
	}

<?php 
}

?>