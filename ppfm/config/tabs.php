<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Tabs config file with default values
| -------------------------------------------------------------------
| All documentation you can find there http://jqueryui.com/demos/dialog/
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$tabs_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                        SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.js');

$tabs_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                        SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$tabs_ext['css'] = array(SHIN_Core::$_config['theme']['theme_root_dir'] . '/' . SHIN_Core::get_theme_path().'/css/jqueryUI/jquery.ui.all.css', 
                         SHIN_Core::$_config['theme']['theme_root_dir'] . '/' . SHIN_Core::get_theme_path().'/css/jqueryUI/verticaltabs.css');

/*
| -------------------------------------------------------------------
| Disables (true) or enables (false) the tabs. Can be set when initialising (first creating) the tabs.
| -------------------------------------------------------------------
*/
$tabs['disabled'] = "false";

/*
| -------------------------------------------------------------------
| Whether or not to cache remote tabs content, e.g. load only once or with every click.
| Cached content is being lazy loaded, e.g once and only once for the first click. 
| Note that to prevent the actual Ajax requests from being cached by the browser 
| you need to provide an extra cache: false flag to ajaxOptions.
| -------------------------------------------------------------------
*/
$tabs['cache'] = "false";

/*
| -------------------------------------------------------------------
| Set to true to allow an already selected tab to become unselected again upon reselection.
| -------------------------------------------------------------------
*/
$tabs['collapsible'] = "false";                 

/*
| -------------------------------------------------------------------
|  Store the latest selected tab in a cookie. The cookie is then used to determine the initially selected tab 
| if the selected option is not defined. Requires cookie plugin. 
| The object needs to have key/value pairs of the form the cookie plugin expects as options. 
| Available options (example): { expires: 7, path: '/', domain: 'jquery.com', secure: true }. 
| Since jQuery UI 1.7 it is also possible to define the cookie name being used via name property.
| -------------------------------------------------------------------
*/
$tabs['cookie'] = "null";

/*
| -------------------------------------------------------------------
|  An array containing the position of the tabs (zero-based index) that should be disabled on initialization.
| -------------------------------------------------------------------
*/
$tabs['disabled'] = "[]";

/*
| -------------------------------------------------------------------
|  The type of event to be used for selecting a tab.
| -------------------------------------------------------------------
*/
$tabs['event'] = "'click'";

/*
| -------------------------------------------------------------------
|  Enable animations for hiding and showing tab panels. 
| The duration option can be a string representing one of the three predefined speeds ("slow", "normal", "fast") 
| or the duration in milliseconds to run an animation (default is "normal").
| -------------------------------------------------------------------
*/
$tabs['fx'] = "null";

/*
| -------------------------------------------------------------------
|  If the remote tab, its anchor element that is, has no title attribute to generate an id from, 
| an id/fragment identifier is created from this prefix and a unique id returned by $.data(el), 
| for example "ui-tabs-54".
| -------------------------------------------------------------------
*/
$tabs['idPrefix'] = "'ui-tabs-'";

/*
| -------------------------------------------------------------------
| HTML template from which a new tab panel is created in case of adding
| a tab with the add method or when creating a panel for a remote tab on the fly.
| -------------------------------------------------------------------
*/
$tabs['panelTemplate'] = "'<div></div>'";

/*
| -------------------------------------------------------------------
| Zero-based index of the tab to be selected on initialization. To set all tabs to unselected pass -1 as value.
| -------------------------------------------------------------------
*/
$tabs['selected'] = "0";

/*
| -------------------------------------------------------------------
|  The HTML content of this string is shown in a tab title while remote content is loading. 
| Pass in empty string to deactivate that behavior. An span element must be present in the A tag of the title, 
| for the spinner content to be visible.
| -------------------------------------------------------------------
*/
$tabs['spinner'] = "'<em>Loading&#8230;</em>'";

/*
| -------------------------------------------------------------------
|  HTML template from which a new tab is created and added. 
| The placeholders #{href} and #{label} are replaced with the url and tab label that are passed as arguments 
| to the add method.
| -------------------------------------------------------------------
*/
$tabs['tabTemplate'] = "'<li><a href=\"#{href}\"><span>#{label}</span></a></li>'";

?>
