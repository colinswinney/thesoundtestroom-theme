<?php use Roots\Sage\Titles; ?>
<?php 

if (is_front_page()) {

}
else { 
	?>
	<div class="page-header">
	  <h1><?= Titles\title(); ?></h1>
	</div>
	<?php 
}
?>
