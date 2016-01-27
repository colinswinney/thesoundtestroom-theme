<?php
	$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
	$wp_load = $absolute_path[0] . 'wp-load.php';
	require_once($wp_load);

	// define variables 
	$logoLeft = get_field('logo_left_image', 'option');
	$logoRight = get_field('logo_right_image', 'option');
	$bodyBackgroundColor = get_field('body_background_color', 'option');
	$brandPrimary = get_field('brand_primary', 'option');
	$brandHover = get_field('brand_hover', 'option');
	$mainFontColor = get_field('main_font_color', 'option');

$logoFont = get_field('logo_font', 'option');

if ($logoFont == "Amatic SC") {
	$logoFontFamily = "'Amatic SC', cursive";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Amatic+SC:400,700);';
}
else if ($logoFont == "Arvo") {
	$logoFontFamily = "'Arvo', serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic);';
}
else if ($logoFont == "Bitter") {
	$logoFontFamily = "'Bitter', serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Bitter:700,400italic,400);';
}
else if ($logoFont == "Crimson Text") {
	$logoFontFamily = "'Crimson Text', serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,700,700italic);';
}
else if ($logoFont == "Dosis") {
	$logoFontFamily = "'Dosis', sans-serif";
	$logoFontImport = "@import url(https://fonts.googleapis.com/css?family=Dosis:400,700);";
}
else if ($logoFont == "Francois One") {
	$logoFontFamily = "'Francois One', sans-serif";
	$logoFontImport = "@import url(https://fonts.googleapis.com/css?family=Francois+One);";
}
else if ($logoFont == "Hind") {
	$logoFontFamily = "'Hind', sans-serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Hind:300,400,700);';
}
else if ($logoFont == "Indie Flower") {
	$logoFontFamily = "'Indie Flower', cursive";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Indie+Flower);';
}
else if ($logoFont == "Lora") {
	$logoFontFamily = "'Lora', serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic);';
}
else if ($logoFont == "Montserrat") {
	$logoFontFamily = "'Montserrat', sans-serif";
	$logoFontImport = "@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);";
}
else if ($logoFont == "Noto Sans") {
	$logoFontFamily = "'Noto Sans', sans-serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic);';
}
else if ($logoFont == "Open Sans") {
	$logoFontFamily = "'Open Sans', sans-serif";
	$logoFontImport = "@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700,300,400italic,300italic,700italic);";
}
else if ($logoFont == "Orbitron") {
	$logoFontFamily = "'Orbitron', sans-serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Orbitron:400,700);';
}
else if ($logoFont == "Oswald") {
	$logoFontFamily = "'Oswald', sans-serif";
	$logoFontImport = "@import url(https://fonts.googleapis.com/css?family=Oswald:400,700,300);";
}
else if ($logoFont == "PT Sans") {
	$logoFontFamily = "'PT Sans', sans-serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic);';
}
else if ($logoFont == "Patua One") {
	$logoFontFamily = "'Patua One', cursive";
	$logoFontImport = "@import url(https://fonts.googleapis.com/css?family=Patua+One);";
}
else if ($logoFont == "Poiret One") {
	$logoFontFamily = "'Poiret One', cursive";
	$logoFontImport = "@import url(https://fonts.googleapis.com/css?family=Poiret+One);";
}
else if ($logoFont == "Raleway") {
	$logoFontFamily = "'Raleway', sans-serif";
	$logoFontImport = "@import url(https://fonts.googleapis.com/css?family=Raleway:400,700,300);";
}
else if ($logoFont == "Righteous") {
	$logoFontFamily = "'Righteous', cursive";
	$logoFontImport = "@import url(https://fonts.googleapis.com/css?family=Righteous);";
}
else if ($logoFont == "Roboto") {
	$logoFontFamily = "'Roboto', sans-serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Roboto:400,100,300,100italic,300italic,400italic,700,700italic);';
}
else if ($logoFont == "Roboto Slab") {
	$logoFontFamily = "'Roboto Slab', serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Roboto+Slab:100,400,700);';
}
else if ($logoFont == "Rokkitt") {
	$logoFontFamily = "'Rokkitt', serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Rokkitt:700,400);';
}
else if ($logoFont == "Russo One") {
	$logoFontFamily = "'Russo One', sans-serif";
	$logoFontImport = "@import url(https://fonts.googleapis.com/css?family=Russo+One);";
}
else if ($logoFont == "Shadows Into Light") {
	$logoFontFamily = "'Shadows Into Light', cursive";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Shadows+Into+Light);';
}
else if ($logoFont == "Ubuntu") {
	$logoFontFamily = "'Ubuntu', sans-serif";
	$logoFontImport = '@import url(https://fonts.googleapis.com/css?family=Ubuntu:300,300italic,400,400italic,700,700italic);';
}
else {
	$logoFontFamily = "Helvetica";
}
	


$bodyFont = get_field('body_font', 'option');

if ($bodyFont == "Amatic SC") {
	$bodyFontFamily = "'Amatic SC', cursive";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Amatic+SC:400,700);';
}
else if ($bodyFont == "Arvo") {
	$bodyFontFamily = "'Arvo', serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic);';
}
else if ($bodyFont == "Bitter") {
	$bodyFontFamily = "'Bitter', serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Bitter:700,400italic,400);';
}
else if ($bodyFont == "Crimson Text") {
	$bodyFontFamily = "'Crimson Text', serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,700,700italic);';
}
else if ($bodyFont == "Dosis") {
	$bodyFontFamily = "'Dosis', sans-serif";
	$bodyFontImport = "@import url(https://fonts.googleapis.com/css?family=Dosis:400,700);";
}
else if ($bodyFont == "Francois One") {
	$bodyFontFamily = "'Francois One', sans-serif";
	$bodyFontImport = "@import url(https://fonts.googleapis.com/css?family=Francois+One);";
}
else if ($bodyFont == "Hind") {
	$bodyFontFamily = "'Hind', sans-serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Hind:300,400,700);';
}
else if ($bodyFont == "Indie Flower") {
	$bodyFontFamily = "'Indie Flower', cursive";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Indie+Flower);';
}
else if ($bodyFont == "Lora") {
	$bodyFontFamily = "'Lora', serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic);';
}
else if ($bodyFont == "Montserrat") {
	$bodyFontFamily = "'Montserrat', sans-serif";
	$bodyFontImport = "@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);";
}
else if ($bodyFont == "Noto Sans") {
	$bodyFontFamily = "'Noto Sans', sans-serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic);';
}
else if ($bodyFont == "Open Sans") {
	$bodyFontFamily = "'Open Sans', sans-serif";
	$bodyFontImport = "@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700,300,400italic,300italic,700italic);";
}
else if ($bodyFont == "Orbitron") {
	$bodyFontFamily = "'Orbitron', sans-serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Orbitron:400,700);';
}
else if ($bodyFont == "Oswald") {
	$bodyFontFamily = "'Oswald', sans-serif";
	$bodyFontImport = "@import url(https://fonts.googleapis.com/css?family=Oswald:400,700,300);";
}
else if ($bodyFont == "PT Sans") {
	$bodyFontFamily = "'PT Sans', sans-serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic);';
}
else if ($bodyFont == "Patua One") {
	$bodyFontFamily = "'Patua One', cursive";
	$bodyFontImport = "@import url(https://fonts.googleapis.com/css?family=Patua+One);";
}
else if ($bodyFont == "Poiret One") {
	$bodyFontFamily = "'Poiret One', cursive";
	$bodyFontImport = "@import url(https://fonts.googleapis.com/css?family=Poiret+One);";
}
else if ($bodyFont == "Raleway") {
	$bodyFontFamily = "'Raleway', sans-serif";
	$bodyFontImport = "@import url(https://fonts.googleapis.com/css?family=Raleway:400,700,300);";
}
else if ($bodyFont == "Righteous") {
	$bodyFontFamily = "'Righteous', cursive";
	$bodyFontImport = "@import url(https://fonts.googleapis.com/css?family=Righteous);";
}
else if ($bodyFont == "Roboto") {
	$bodyFontFamily = "'Roboto', sans-serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Roboto:400,100,300,100italic,300italic,400italic,700,700italic);';
}
else if ($bodyFont == "Roboto Slab") {
	$bodyFontFamily = "'Roboto Slab', serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Roboto+Slab:100,400,700);';
}
else if ($bodyFont == "Rokkitt") {
	$bodyFontFamily = "'Rokkitt', serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Rokkitt:700,400);';
}
else if ($bodyFont == "Russo One") {
	$bodyFontFamily = "'Russo One', sans-serif";
	$bodyFontImport = "@import url(https://fonts.googleapis.com/css?family=Russo+One);";
}
else if ($bodyFont == "Shadows Into Light") {
	$bodyFontFamily = "'Shadows Into Light', cursive";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Shadows+Into+Light);';
}
else if ($bodyFont == "Ubuntu") {
	$bodyFontFamily = "'Ubuntu', sans-serif";
	$bodyFontImport = '@import url(https://fonts.googleapis.com/css?family=Ubuntu:300,300italic,400,400italic,700,700italic);';
}
else {
	$bodyFontFamily = "Helvetica";
}



$headerFont = get_field('header_font', 'option');

if ($headerFont == "Amatic SC") {
	$headerFontFamily = "'Amatic SC', cursive";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Amatic+SC:400,700);';
}
else if ($headerFont == "Arvo") {
	$headerFontFamily = "'Arvo', serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic);';
}
else if ($headerFont == "Bitter") {
	$headerFontFamily = "'Bitter', serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Bitter:700,400italic,400);';
}
else if ($headerFont == "Crimson Text") {
	$headerFontFamily = "'Crimson Text', serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,700,700italic);';
}
else if ($headerFont == "Dosis") {
	$headerFontFamily = "'Dosis', sans-serif";
	$headerFontImport = "@import url(https://fonts.googleapis.com/css?family=Dosis:400,700);";
}
else if ($headerFont == "Francois One") {
	$headerFontFamily = "'Francois One', sans-serif";
	$headerFontImport = "@import url(https://fonts.googleapis.com/css?family=Francois+One);";
}
else if ($headerFont == "Hind") {
	$headerFontFamily = "'Hind', sans-serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Hind:300,400,700);';
}
else if ($headerFont == "Indie Flower") {
	$headerFontFamily = "'Indie Flower', cursive";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Indie+Flower);';
}
else if ($headerFont == "Lora") {
	$headerFontFamily = "'Lora', serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic);';
}
else if ($headerFont == "Montserrat") {
	$headerFontFamily = "'Montserrat', sans-serif";
	$headerFontImport = "@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);";
}
else if ($headerFont == "Noto Sans") {
	$headerFontFamily = "'Noto Sans', sans-serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic);';
}
else if ($headerFont == "Open Sans") {
	$headerFontFamily = "'Open Sans', sans-serif";
	$headerFontImport = "@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700,300,400italic,300italic,700italic);";
}
else if ($headerFont == "Orbitron") {
	$headerFontFamily = "'Orbitron', sans-serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Orbitron:400,700);';
}
else if ($headerFont == "Oswald") {
	$headerFontFamily = "'Oswald', sans-serif";
	$headerFontImport = "@import url(https://fonts.googleapis.com/css?family=Oswald:400,700,300);";
}
else if ($headerFont == "PT Sans") {
	$headerFontFamily = "'PT Sans', sans-serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic);';
}
else if ($headerFont == "Patua One") {
	$headerFontFamily = "'Patua One', cursive";
	$headerFontImport = "@import url(https://fonts.googleapis.com/css?family=Patua+One);";
}
else if ($headerFont == "Poiret One") {
	$headerFontFamily = "'Poiret One', cursive";
	$headerFontImport = "@import url(https://fonts.googleapis.com/css?family=Poiret+One);";
}
else if ($headerFont == "Raleway") {
	$headerFontFamily = "'Raleway', sans-serif";
	$headerFontImport = "@import url(https://fonts.googleapis.com/css?family=Raleway:400,700,300);";
}
else if ($headerFont == "Righteous") {
	$headerFontFamily = "'Righteous', cursive";
	$headerFontImport = "@import url(https://fonts.googleapis.com/css?family=Righteous);";
}
else if ($headerFont == "Roboto") {
	$headerFontFamily = "'Roboto', sans-serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Roboto:400,100,300,100italic,300italic,400italic,700,700italic);';
}
else if ($headerFont == "Roboto Slab") {
	$headerFontFamily = "'Roboto Slab', serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Roboto+Slab:100,400,700);';
}
else if ($headerFont == "Rokkitt") {
	$headerFontFamily = "'Rokkitt', serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Rokkitt:700,400);';
}
else if ($headerFont == "Russo One") {
	$headerFontFamily = "'Russo One', sans-serif";
	$headerFontImport = "@import url(https://fonts.googleapis.com/css?family=Russo+One);";
}
else if ($headerFont == "Shadows Into Light") {
	$headerFontFamily = "'Shadows Into Light', cursive";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Shadows+Into+Light);';
}
else if ($headerFont == "Ubuntu") {
	$headerFontFamily = "'Ubuntu', sans-serif";
	$headerFontImport = '@import url(https://fonts.googleapis.com/css?family=Ubuntu:300,300italic,400,400italic,700,700italic);';
}
else {
	$headerFontFamily = "Helvetica";
}
	header("Content-type: text/css; charset: UTF-8");
	header('Cache-control: must-revalidate');
?>
<?php echo $logoFontImport; ?>
<?php echo $bodyFontImport; ?>
<?php echo $headerFontImport; ?>
<?php 

echo '

body, .modal-content {';

	if ($bodyBackgroundColor) {
		echo 'background-color:'; echo $bodyBackgroundColor; echo';';
	}
	if ($bodyFontFamily) {
		echo 'font-family:'; echo $bodyFontFamily; echo';';
	}
	if ($mainFontColor) {
		echo 'color:'; echo $mainFontColor; echo';';
	}
echo '}';

if ($mainFontColor) {
	echo '.modal-dialog, .navbar-default .navbar-brand, .home-article-wrap .featured-image-link-wrap, .home-comment-number a, .main-footer .footer-brand-wrapper a, .comment-author-link, .wp-pagenavi a, .wp-pagenavi span, .page-nav span, .page-nav a, .modal-content .modal-header .modal-title a, .widget_recent_comments .comment-author-link {';
	echo 'color:'; echo $mainFontColor; echo';';
	echo '}';
}

if ($headerFontFamily) {
	echo 'h1, h2, h3, h4, h5, h6, .home-article-wrap, #breadcrumbs, .byline.author.vcard, time.updated, .comment-metadata, .comment-metadata .says, .widget, .post-type-archive-app_entry ul li {
		font-family:'; echo $headerFontFamily; echo'; 
	}
	';
}
if ($brandPrimary) {
	echo '::-webkit-scrollbar-thumb, ::-webkit-scrollbar-thumb:window-inactive {
		background:'; echo $brandPrimary; echo'; 
	}
	';
}
if ($brandPrimary) {
	echo 'a, .navbar-nav .open .dropdown-menu li a, .home-comment-number a:hover, .home-article-wrap .featured-image-link-wrap:hover {
		color:'; echo $brandPrimary; echo'; 
	}
	';
}
if ($brandPrimary) {
	echo '.navbar-default .navbar-brand, .navbar-default .navbar-brand, .navbar-default .navbar-brand, .main-footer .footer-brand-wrapper a, .main-footer .footer-brand-wrapper a, .main-footer .footer-brand-wrapper a {
		text-shadow:-1px 1px 1px #111, -2px 2px 3px '; echo $brandPrimary; echo'; 
	}
	';
}

if ($brandHover) {
	echo 'a:hover, .navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:active, .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a, .wp-pagenavi a:hover, .page-nav a:hover, .main-footer .footer-brand-wrapper a:hover, .main-footer .footer-brand-wrapper a:focus, .main-footer .footer-brand-wrapper a:active, .modal-content .modal-header .modal-title a:hover, .modal-content .modal-header .modal-title a:focus, .modal-content .modal-header .modal-title a:active {
		color:'; echo $brandHover; echo'; 
	}
	';
}
if ($brandHover) {
	echo '.wp-pagenavi a:hover, .page-nav a:hover {
		background:'; echo $brandHover; echo'; 
		color:#fafafa; 
		border-bottom:1px solid '; echo $brandHover; echo';
	}
	';
}
if ($brandHover) {
	echo '.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:active, .main-footer .footer-brand-wrapper a:hover, .main-footer .footer-brand-wrapper a:focus, .main-footer .footer-brand-wrapper a:active {
		text-shadow:-1px 1px 1px #111, -2px 2px 3px '; echo $brandHover; echo'; 
	}
	';
}
if ($brandHover) {
	echo '.btn {
		background:'; echo $brandHover; echo';
	}
	.btn:hover, .btn:active, .btn:focus {
		color:'; echo $brandHover; echo ';
		border: 1px solid '; echo $brandHover; echo ';
	}
	.sticky-btn:hover, .sticky-btn:focus, .sticky-btn:active {
		color:#fafafa;
		border: 1px solid #fafafa;
	}
	';
}
if ($logoFont) {
	echo '.navbar-default .navbar-brand, .main-footer .footer-brand-wrapper a, .modal-brand {
		font-family:'; echo $logoFontFamily; echo'; 
	}
	';
}
if ($bodyFont) {
	echo '.btn {
		font-family:'; echo $bodyFontFamily; echo'; 
	}
	';
}

if ( get_field('invert_the_site', 'option') ) {
?>
	.navbar-default .navbar-brand, .modal-content .modal-header .modal-title a {
		text-shadow:-1px 1px 1px #eee, -2px 2px 2px <?php echo $brandPrimary; ?>;
	}
	.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:active, .navbar-default .navbar-brand:focus, .modal-content .modal-header .modal-title a:hover, .modal-content .modal-header .modal-title a:focus, .modal-content .modal-header .modal-title a:active {
		text-shadow:-1px 1px 1px #eee, -2px 2px 2px <?php echo $brandHover; ?>;
	}
<?php
}
?>