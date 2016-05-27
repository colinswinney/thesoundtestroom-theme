/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

  //////////////// THESOUNDTESTROOM /////////////////
  //$(document).ready(function(){
    //$(".modal-content").height( $("body").height() - 50 );
  //});




  $(document).ready(function() {

   // Define the function
   function addVideoSizeToggle() {

     var $videoContainer = $('.mainPageVideoContainer');
     // Make the button
     var $videoSizeToggle = $('<button title="Video Size" type="button" class="btn btn-lg video-size">Video <i class="fa fa-plus-circle"></i></button>');

     // Only continue if the page has a video
     if ($videoContainer !== 'undefined') {

       // Append the button. Change to ‘prepend’ if you want it above the container.
       $videoContainer.append($videoSizeToggle);

       $('.video-size').on('click', function() {

           if ($videoContainer.css('float') === "right") {
             $videoContainer.css({
               'float': "none",
               'width': "100%",
               'max-width':'100%'
             });
             $('.video-size').html('Video <i class="fa fa-minus-circle"></i>');

           } else {

             $videoContainer.css({
               'float': "right",
               'width': "60%",
               'max-width':'560px'
             });
             $('.video-size').html('Video <i class="fa fa-plus-circle"></i>');

           }

       });
     } 

   }
   // Call the function
   addVideoSizeToggle();







  var scroll_pos = 0;
  $(document).scroll(function() { 
      scroll_pos = $(this).scrollTop();
      if(scroll_pos > 99) {
          $(".sticky-btn").css('background-color', 'rgba(124, 0, 2, 0.4)').css('border-color', 'rgba(255, 255, 255, 0.25)');
          $(".sticky-btn:focus, .sticky-btn:active, .sticky-btn:hover ").css('border-color', 'rgba(250, 250, 250, 1)');
          $(".quick-sales-btn").css('background-color', 'rgba(35,137,34,0.4)');
          $(".quick-comic-btn").css('background-color', 'rgba(6, 111, 177, 0.4)');
      } else {
          $(".sticky-btn").css('background-color', 'rgba(124, 0, 2, 0.7)').css('border-color', 'rgba(250, 250, 250, 1)');

          $(".quick-sales-btn").css('background-color', 'rgba(35,137,34,0.7)');
          $(".quick-comic-btn").css('background-color', 'rgba(6, 111, 177, 0.7)');
      }
  });






  // add clear to pagenavi 
  $( '<div class="clear"></div>' ).insertAfter( '.wp-pagenavi .pages' );



  if ($("body").find(".mainPageVideoContainer").length > 1 ) { 
      $(".mainPageVideoContainer:first").css('display', 'none');
  }
  else if ($("body").find(".mainPageVideoContainer").length > 0 ) { 
      
  }



  if ( $("#mainPageContainer") ) {
      $("#mainPageContainer").find("#mainAppP").insertAfter(".mainPageVideoContainer");
      $("#mainPageContainer").css('display', 'none');
  }

  if ( $(".entry-content .getApp") ) {
    $(".entry-content .getApp").css('display', 'none');
  }
  else if ( $(".getApp.tstr-get-app") ) {
    $(".getApp.tstr-get-app").css('dislpay', 'block');
  }
  
  // move related posts from post_content and to above comments
  $('.jp-relatedposts').remove().insertBefore('#comments');

  // move sharing buttons from post_content and to above comments
  $('.sharedaddy.sd-sharing-enabled').remove().insertBefore('#comments');

  


  }); //end document ready

})(jQuery); // Fully reference jQuery after this point.

