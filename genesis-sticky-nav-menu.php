<?php
/*
Plugin Name: Genesis Sticky Nav Menus with Contextual Sub Menu
Description: Makes a Sticky Nav Menu with an optional Contextual Dropdown
Version: 0.0.5
Plugin Author: Russell Fair
Author URI: http://q21.co/
*/


/*set up our constants*/
define('GSNM_VER', '005');
define('GSNM_TRANS_VER', '005');
define('GSNM_DIR', WP_PLUGIN_DIR.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)));
define('GSNM_URL', WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)));



// translation support
load_plugin_textdomain( 'sgnm', false, '/genesis-sticky-nav-menu/languages/' );

require_once(GSNM_DIR . '/lib/gsnm-class-loader.php');


new GSNM_Start();