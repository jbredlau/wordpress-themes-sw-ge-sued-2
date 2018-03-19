<?php

/**
* Auto-Slider auf Startseite
*
*/
function add_script_in_footer(){
?>
<script type="text/javascript" charset="utf-8">
    jQuery(document).ready(function($){
        var change_every = 5; // The number of seconds that the slider will auto-advance in
        var current = 1;
        function auto_advance(){
            if(current == -1) return false;
            jQuery('#featured-content .slider-next').eq(current % jQuery('#featured-content .slider-next').length).trigger('click', [true]);
            current++;
        };
        setInterval(function(){auto_advance()}, change_every * 1000);
	
	$('.menu-toggle').click(function(){
           // $('.menu-hauptmenue-container').slideToggle('slow');
	   $('.nav-menu').slideToggle('slow');
        });
    });
</script>
<?php
}
add_action('wp_footer', 'add_script_in_footer');
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// Add support for featured content.

// Add support for featured content.
function twentyfourteen_child_setup () {
  // This will remove support for featured content in the parent theme  
  remove_theme_support( 'featured-content' );
  
  //This adds support for featured content in child theme 
  //with a different max_posts value of 3 instead of default 6  
  add_theme_support( 'featured-content', array(
    'featured_content_filter' => 'twentyfourteen_get_featured_posts',
	'max_posts' => 12,
  ) );
}

//Action hook for theme support 
add_action( 'after_setup_theme', 'twentyfourteen_child_setup', 11);

?>
