<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$masked_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/input/jquery.maskedinput-1.2.2.js');

$masked_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/input/jquery.maskedinput-1.2.2.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/

$masked_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css');

/*
| -------------------------------------------------------------------
| Default mask 
| -------------------------------------------------------------------
*/
$masked['mask'] = "'99/99/9999'";

/*
| -------------------------------------------------------------------
| Default placeholder 
| -------------------------------------------------------------------
*/
$masked['placeholder'] = "' '";

/*
| -------------------------------------------------------------------
| Default placeholder 
| -------------------------------------------------------------------
*/
//$masked['completed'] = "function(){console.debug(1231)}";



?>
