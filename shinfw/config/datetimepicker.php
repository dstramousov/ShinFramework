<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DatePicker config file with default values
| -------------------------------------------------------------------
| All documentation you can find there http://jqueryui.com/demos/datepicker/
*/

/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$datetimepicker_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.js',
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/datetimepicker/jquery.ui.datetime.src.js'
                             );

$datetimepicker_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                                  SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.min.js',
	                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/datetimepicker/jquery.ui.datetime.min.js'
                                 );
                                   
/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$datetimepicker_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css', SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.datetime.css');


/*
| -------------------------------------------------------------------
|  
| Disables (true) or enables (false) the datepicker. Can be set when initialising (first creating) the datepicker. 
|  
| -------------------------------------------------------------------
*/
$datetimepicker['disabled'] = 'false';
