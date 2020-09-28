<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$contextmenu_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js',
                               SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/contextmenu/jquery.contextMenu.js');

$contextmenu_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js',
                                   SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/contextmenu/jquery.contextMenu.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$contextmenu_ext['css'] = array(SHIN_Core::get_theme_url_path() . '/css/jqueryUI/jquery.ui.all.css',
                                SHIN_Core::get_theme_url_path() . '/css/contextmenu/jquery.contextMenu.css');


/*
| -------------------------------------------------------------------
| Menu container id. Please use only tag id not class
| -------------------------------------------------------------------
*/                       
$contextmenu['menu']     =    '';


/*
| -------------------------------------------------------------------
| Callback function 
| -------------------------------------------------------------------
*/                       
$contextmenu['callback']     =    '';







?>
