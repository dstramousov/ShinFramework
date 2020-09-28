<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Progressbar config file with default values
| -------------------------------------------------------------------
| All documentation you can find there http://jqueryui.com/demos/progressbar/
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$progressbar_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                               SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.js');

$progressbar_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                                   SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$progressbar_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css');


/*
| -------------------------------------------------------------------
|  Disables (true) or enables (false) the progressbar. Can be set when initialising (first creating) the progressbar.
| -------------------------------------------------------------------
*/
$progressbar['disabled'] = "false";

/*
| -------------------------------------------------------------------
| The value of the progressbar.
| -------------------------------------------------------------------
*/
$progressbar['value'] = "0";
?>
