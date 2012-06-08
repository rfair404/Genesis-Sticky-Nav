<?php

class GSNM_Filter_Genesis_Primary_Nav {

    function GSNM_Filter_Genesis_Primary_Nav (){
        $this->__construct();
    } // end GSNM_Start

    function __construct(){
		add_filter( 'wp_nav_menu_args' , array($this, '_add_menu_descriptions' ));
    }



	function _add_menu_descriptions( $args ) {

	    if ( $args['theme_location'] == 'primary' ) {

	        $args['walker'] = new GSNM_Menu_Walker;

	        $args['desc_depth'] = 0;

	        $args['thumbnail'] = false;

	        $args['thumbnail_link'] = false;

	        $args['thumbnail_size'] = 'gsnm_nav_thumb';

	        $args['thumbnail_attr'] = array( 'class' => 'gsnm_nav_thumb my_thumb' , 'alt' => 'test' , 'title' => 'test' );

	    }

	 

	    return $args;

	}


}