<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$ddmenu_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js',
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/ddmenu/hoverIntent.js',
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/ddmenu/superfish.js');

$ddmenu_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js',
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/ddmenu/hoverIntent.min.js',
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/ddmenu/superfish.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$ddmenu_ext['css'] = array(SHIN_Core::get_theme_url_path() . '/css/jqueryUI/jquery.ui.all.css',
                           SHIN_Core::get_theme_url_path() . '/css/ddmenu/superfish.css');


/*
| -------------------------------------------------------------------
|  the delay in milliseconds that the mouse can remain outside a submenu without it closing
| -------------------------------------------------------------------
*/                       
$ddmenu['delay']     =    400;


?>
