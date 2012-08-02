<?php


class GSNM_Start {

    function GSNM_Start(){
        $this->__construct();
    } // end GSNM_Start

    function __construct(){
    	require_once(GSNM_DIR . '/lib/menu-walker.php');
    	require_once(GSNM_DIR . '/lib/js-functions.php');
		
		add_image_size( 'gsnm_nav_thumb', 90, 90, TRUE );
		
		require_once(GSNM_DIR . '/lib/filter-genesis-primary-nav.php');
    	
    	$gsnmJs = new GSNM_Js_Stuff();
    	$gsnmMenuWalker = new GSNM_Menu_walker();
    	$gsnmFilterGenesisPrimaryNav = new GSNM_Filter_Genesis_Primary_Nav();

    }



} // end GSNM_Start