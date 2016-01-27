<footer class="content-info main-footer">
  <div class="container">
    <div class="col-xs-12 footer-brand-wrapper">
      <img src="http://thesoundtestroom.com/wp-content/uploads/STR/whiteHeadSolo150x109.png" alt="thesoundtestroom logo" class="left">
      <img src="http://thesoundtestroom.com/wp-content/uploads/STR/whiteHeadSolo150x109.png" alt="thesoundtestroom logo">
      <img src="http://thesoundtestroom.com/wp-content/uploads/STR/whiteHeadSolo150x109.png" alt="thesoundtestroom logo" class="right">
    </div>
    <div class="ad-wrapper">
      <div class="col-xs-12 no-gutter"><?php if(function_exists('oiopub_banner_zone')) oiopub_banner_zone(3, 'center'); ?></div>
      <div class="clear"></div>
    </div>
    
    <div class="col-sm-6"><?php dynamic_sidebar('sidebar-footer-top-left'); ?></div>
    <div class="col-sm-6"><?php dynamic_sidebar('sidebar-footer-top-right'); ?></div>
    <div class="clear"></div>
    <div class="footer-thirds-wrap clear">
      <?php
        echo '<div class="footer-three-column col-sm-4 clear">';dynamic_sidebar('sidebar-footer-one');echo '</div>';
        echo '<div class="footer-three-column col-sm-4">';dynamic_sidebar('sidebar-footer-two');echo '</div>';
        echo '<div class="footer-three-column col-sm-4">';dynamic_sidebar('sidebar-footer-three');echo '</div>';
      ?>
    </div>
  	
  </div>
  <div class="clear"></div>
</footer>

<canvas id="canvasBackground" height="100" width="100" style="display:none;"></canvas>

<script type='text/javascript' defer>var _merchantSettings=_merchantSettings || [];_merchantSettings.push(['AT', '1l3voJz']);(function(){var autolink=document.createElement('script');autolink.type='text/javascript';autolink.async=true; autolink.src= ('https:' == document.location.protocol) ? 'https://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js' : 'http://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(autolink, s);})();</script>
<script type="text/javascript">
    
function draw(w, h) {

  var canvas = document.getElementById("canvasBackground");
  var ctx = canvas.getContext("2d");

  ctx.fillStyle = "<?php if (get_field('spiral_fill_color', 'option')) { the_field('spiral_fill_color', 'option'); } else { echo '#0E1926'; } ?>";
  ctx.fillRect (1, 1, 99, 99);
  ctx.strokeStyle = "<?php if (get_field('spiral_stroke_color', 'option')) { the_field('spiral_stroke_color', 'option'); } else { echo '#142437'; } ?>";

  //circle
  ctx.beginPath();
  ctx.arc(50,50,4,0,2*Math.PI);
  ctx.stroke();

  // top straight
  ctx.beginPath();
  ctx.moveTo(48, 46);
  ctx.bezierCurveTo(10, 0, 90, 0, 52, 46);
  ctx.stroke();

  // bottom straight
  ctx.beginPath();
  ctx.moveTo(48, 54);
  ctx.bezierCurveTo(10, 100, 90, 100, 52, 54);
  ctx.stroke();

  // left straight 
  ctx.beginPath();
  ctx.moveTo(46, 48);
  ctx.bezierCurveTo(0, 10, 0, 90, 46, 52);
  ctx.stroke();

  // right straight
  ctx.beginPath();
  ctx.moveTo(54, 48);
  ctx.bezierCurveTo(100, 10, 100, 90, 54, 52);
  ctx.stroke();

  // left top 
  ctx.beginPath();
  ctx.moveTo(50, 47);
  ctx.bezierCurveTo(40, -13, -13, 40, 46, 50);
  ctx.stroke();

  // left bottom 
  ctx.beginPath();
  ctx.moveTo(50, 53);
  ctx.bezierCurveTo(40, 113, -13, 60, 47, 50);
  ctx.stroke();

  // right bottom 
  ctx.beginPath();
  ctx.moveTo(50, 53);
  ctx.bezierCurveTo(60, 113, 113, 60, 53, 50);
  ctx.stroke();

  // right top 
  ctx.beginPath();
  ctx.moveTo(50, 47);
  ctx.bezierCurveTo(60, -13, 113, 40, 53, 50);
  ctx.stroke();

}

draw(100, 100);
document.body.style.backgroundImage = "url(" + canvasBackground.toDataURL() + ")";
var myElements = document.querySelectorAll(".modal-content");
 
for (var i = 0; i < myElements.length; i++) {
    myElements[i].style.backgroundImage = "url(" + canvasBackground.toDataURL() + ")";
}
</script>
