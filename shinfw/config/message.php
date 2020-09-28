<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$message_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js');

$message_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/

$message_ext['css'] = array(SHIN_Core::get_theme_url_path() . '/css/jqueryUI/jquery.ui.all.css');

/*
| -------------------------------------------------------------------
|  
| -------------------------------------------------------------------
*/

$message    =   array();


?>
