<?php

class GSNM_Js_Stuff {

	function GSNM_Js_Stuff() {
		$this->__construct();
	}

	function __construct()
    {
        add_action('wp_print_scripts', array(&$this, '_enqueue_jquery') );
        //adds the setup js to header !REQUIRED OR ADS WILL FAIL
        add_action('wp_footer', array(&$this, '_do_js_function') );
        //add_action('wp_head', array(&$this, '_do_ajax_request_js') );


    } // end __construct

    function _enqueue_jquery() {
        wp_enqueue_script('jquery');
    }

    function _do_js_function() { ?>
    <!-- Begin Genesis Sticky Nav Menu Script -->
    <script type="text/javascript">
        //<[CDATA[

        var sticky_navigation_offset_top = jQuery('#nav').offset().top;

        var check_scrollbar = function() {
            //alert(sticky_navigation_offset_top);
            var scroll_top = jQuery(window).scrollTop(); // our current vertical position from the top
            //alert(scroll_top);

            if (scroll_top > sticky_navigation_offset_top) {
                jQuery('#nav').css({ 'position': 'fixed', 'top':0, 'z-index':99999 });
                //jQuery('.logged-in #nav').css({ 'top':'28px'});
                jQuery('#nav .wrap').css({'position': 'relative', 'width':'960px', 'margin': '0 auto' });
                //jQuery('#nav .wrap').fadeIn('slow', 'swing');
                jQuery('body.admin-bar #wpadminbar').fadeOut('fast', 'linear'); //hides WordPress admin bar, sexy
            }
            else {
                jQuery('#nav').css({ 'position': 'relative', 'top':0 });
                jQuery('body.admin-bar #wpadminbar').fadeIn('fast', 'swing');
            }

        }

        jQuery(document).ready(function($) {
            check_scrollbar();
        });

        jQuery(window).scroll(function($){
            check_scrollbar();
        });

        //]]>
    </script><?php

    } //end do js function



function _do_ajax_request_js() { 
?>
<script type="text/javascript" >
jQuery(document).ready(function($) {

    var data = {
        action: 'my_action',
        whatever: 1234
    };

    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
    jQuery.post(ajaxurl, data, function(response) {
        alert('Got this from the server: ' + response);
    });
});
</script>
<?php
}
    
}