<?php the_content(); ?>

<?php
	// Code to fetch and print CFs, such as:
    acf_form(array(
    'post_id'   => 'new_post',
    'new_post'    => array(
      'post_type'   => 'apps',
      'post_status'   => 'draft',
    ),
    'submit_value'    => 'Submit',
    'updated_message' => __("Thank you!", 'acf'),
    'post_title' => false,
    'uploader' => 'basic',
    'return' => home_url( '/apps' ),
  	));
?>
<script type="text/javascript">
(function($) {
	
	// setup fields
	acf.do_action('append', $('#popup-id'));
	
})(jQuery);	
</script>

<?php comments_template('/templates/comments.php'); ?>