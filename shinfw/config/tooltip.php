<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Tabs config file with default values
| -------------------------------------------------------------------
| All documentation you can find there http://craigsworks.com/projects/qtip/docs/
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$tooltip_ext['js']     = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                               SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/qtip/jquery.qtip.min.js', 
                               SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/qtip/swfobject.js');

$tooltip_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                               SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/qtip/jquery.qtip.min.js', 
                               SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/qtip/swfobject.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$tooltip_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/qtip/jquery.qtip.css');

/*
| -------------------------------------------------------------------
|       A jQuery DOM object referencing the target element of the tooltip.
| -------------------------------------------------------------------
*/
$tooltip['target']          = "''";

/*
| -------------------------------------------------------------------
|       A jQuery DOM object referencing the tooltip element.
| -------------------------------------------------------------------
*/
$tooltip['tooltip']         = "''";     

/*
| -------------------------------------------------------------------
|  A jQuery DOM object referencing the tip element of the tooltip.
| -------------------------------------------------------------------
*/
$tooltip['tip']             = "''";     

/*
| -------------------------------------------------------------------
|   A jQuery DOM object referencing the wrapper element of the tooltip. 
|  This encapsulates all elements except the tip.
| -------------------------------------------------------------------
*/
$tooltip['wrapper']         = "''";    

/*
| -------------------------------------------------------------------
| A jQuery DOM object referencing the content wrapper element of the tooltip. 
| This encapsulates both the content and title elements.
| -------------------------------------------------------------------
*/
$tooltip['contentWrapper']  = "''";     

/*
| -------------------------------------------------------------------
| A jQuery DOM object referencing the title element of the tooltip. 
| As of beta4 this is placed outside the content element.
| -------------------------------------------------------------------
*/
$tooltip['title']           = "''";     

/*
| -------------------------------------------------------------------
| A jQuery DOM object referencing the button element of the tooltip. 
| This element is only available when the title is displayed and buttons are enabled.
| -------------------------------------------------------------------
*/
$tooltip['button']          = "''";     

/*
| -------------------------------------------------------------------
|  A jQuery DOM object referencing the content element of the tooltip.
| -------------------------------------------------------------------
*/
$tooltip['content']         = "''";    

?>
