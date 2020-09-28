<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$panel_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                         SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.json.js',
                         SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.js');

$panel_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                             SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.json.min.js',
                             SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/

//die();
$panel_ext['css'] = array(SHIN_Core::get_theme_url_path(). '/css/jqueryUI/jquery.ui.all.css',
                          SHIN_Core::get_theme_url_path(). '/css/panel/panel.css');

/*
| ------------------------------------------------------------------- 
| Takes a jQuery selector with items that also have sortables applied. If used, the sortable is now connected 
| to the other one-way, so you can drag from this sortable to the other.
| ------------------------------------------------------------------- 
*/
$panel['connectWith'] = '.column';

/*
| ------------------------------------------------------------------- 
| Defines the cursor that is being shown while sorting.
| ------------------------------------------------------------------- 
*/
$panel['cursor'] = 'move';

/*
| ------------------------------------------------------------------- 
| Defines the cursor that is being shown while sorting.
| ------------------------------------------------------------------- 
*/
$panel['handle'] = '.portlet-header';

/*
| ------------------------------------------------------------------- 
| Ajax url to save state
| ------------------------------------------------------------------- 
*/
$panel['ajax_url'] = '';

/*
| ------------------------------------------------------------------- 
| Width of each panel
| ------------------------------------------------------------------- 
*/
$panel['width'] = '50%';

/*
| ------------------------------------------------------------------- 
| Background image of each panel
| ------------------------------------------------------------------- 
*/
$panel['bg_images']   =   '';

/*
| ------------------------------------------------------------------- 
| DB model name
| ------------------------------------------------------------------- 
*/
$panel['model_name']   =   '';



?>
