<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Button config file with default values
| -------------------------------------------------------------------
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$button_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.js');

$button_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.min.js');


/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/

$button_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css');

/*
| -------------------------------------------------------------------
| Disables (true) or enables (false) the button. Can be set when initialising (first creating) the button. 
| -------------------------------------------------------------------
*/
$button['disabled'] = 'false';

/*
| -------------------------------------------------------------------
| Whether to show any text - when set to false (display no text), icons (see icons option) must be enabled, otherwise it'll be ignored. 
| -------------------------------------------------------------------
*/
$button['text'] = '"Text"';

/*
| -------------------------------------------------------------------
| Icons to display, with or without text (see text option). The primary icon is displayed by default on the left of the label text, 
| the secondary by default is on the right. Value for the primary and secondary properties must be a classname (String), eg. "ui-icon-gear". 
| For using only one icon: icons: {primary:'ui-icon-locked'}. For using two icons: icons: {primary:'ui-icon-gear',secondary:'ui-icon-triangle-1-s'} 
| -------------------------------------------------------------------
*/
$button['icons'] = '{}';

/*
| -------------------------------------------------------------------
| Text to show on the button. When not specified (null), the element's html content is used, or its value attribute when it's an input element 
| of type submit or reset; or the html content of the associated label element if its an input of type radio or checkbox 
| -------------------------------------------------------------------
*/
$button['label'] = '"Label"';

/*
| -------------------------------------------------------------------
| Button event 
| -------------------------------------------------------------------
*/
$button['click'] = '';

