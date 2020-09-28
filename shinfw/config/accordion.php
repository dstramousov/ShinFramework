<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Tabs config file with default values
| -------------------------------------------------------------------
| All documentation you can find there http://jqueryui.com/demos/accordion/
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$accordion_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                             SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.js');


$accordion_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                                 SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/

$accordion_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css');

/*
| -------------------------------------------------------------------
|  Disables (true) or enables (false) the accordion. Can be set when initialising (first creating) the accordion.
| -------------------------------------------------------------------
*/
$accordion['disabled'] = "false";

/*
| -------------------------------------------------------------------
|  Selector for the active element. Set to false to display none at start. Needs collapsible: true.
| -------------------------------------------------------------------
*/
//$accordion['active'] = "first child";

/*
| -------------------------------------------------------------------
| Choose your favorite animation, or disable them (set to false).
| In addition to the default, 'bounceslide' and all defined easing methods are supported ('bounceslide' requires UI Effects Core).
| -------------------------------------------------------------------
*/
$accordion['animated'] = "'slide'";

/*
| -------------------------------------------------------------------
| If set, the highest content part is used as height reference for all other parts. Provides more consistent animations.
| -------------------------------------------------------------------
*/
$accordion['autoHeight'] = "true";

/*
| -------------------------------------------------------------------
|  If set, clears height and overflow styles after finishing animations. 
| This enables accordions to work with dynamic content. Won't work together with autoHeight.
| -------------------------------------------------------------------
*/
$accordion['clearStyle'] = "false";

/*
| -------------------------------------------------------------------
| Whether all the sections can be closed at once. Allows collapsing the active section by the triggering event (click is the default).
| -------------------------------------------------------------------
*/
$accordion['collapsible'] = "false";

/*
| -------------------------------------------------------------------
| The event on which to trigger the accordion.
| -------------------------------------------------------------------
*/
$accordion['event'] = "'click'";

/*
| -------------------------------------------------------------------
| If set, the accordion completely fills the height of the parent element. Overrides autoheight.
| -------------------------------------------------------------------
*/
$accordion['fillSpace'] = "false";

/*
| -------------------------------------------------------------------
|  Selector for the header element.
| -------------------------------------------------------------------
*/
$accordion['header'] = "'> li > :first-child,> :not(li):even'";

/*
| -------------------------------------------------------------------
|  Icons to use for headers. Icons may be specified for 'header' and 'headerSelected', 
| and we recommend using the icons native to the jQuery UI CSS Framework manipulated by jQuery UI ThemeRoller
| -------------------------------------------------------------------
*/
$accordion['icons'] = "{ 'header': 'ui-icon-triangle-1-e', 'headerSelected': 'ui-icon-triangle-1-s' }";

/*
| -------------------------------------------------------------------
| If set, looks for the anchor that matches location.href and activates it.
| Great for href-based state-saving. Use navigationFilter to implement your own matcher.
| -------------------------------------------------------------------
*/
$accordion['navigation'] = "false";

/*
| -------------------------------------------------------------------
| Overwrite the default location.href-matching with your own matcher.
| -------------------------------------------------------------------
*/
//$accordion['navigationFilter'] = "";
?>
