<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Tabs config file with default values
| -------------------------------------------------------------------
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$autocomplete_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                                SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.js');

$autocomplete_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                                    SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.min.js');


/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$autocomplete_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css');
 
/*
| -------------------------------------------------------------------
|  Defines the data to use, must be specified. See Overview section for more details, and look at the various demos. 
| -------------------------------------------------------------------
*/ 
$autocomplete['source']  = "[]";

/*
| -------------------------------------------------------------------
|  Source type, can be internal|external 
| -------------------------------------------------------------------
*/ 
$autocomplete['source_type']  = "internal";

/*
| -------------------------------------------------------------------
|  The minimum number of characters a user has to type before the Autocomplete activates. Zero is useful for local 
|  data with just a few items. Should be increased when there are a lot of items, where a single character would 
|  match a few thousand items. 
| -------------------------------------------------------------------
*/ 
$autocomplete['minLength']  = 0;

/*
| -------------------------------------------------------------------
|  The delay in milliseconds the Autocomplete waits after a keystroke to activate itself. A zero-delay makes sense 
|  for local data (more responsive), but can produce a lot of load for remote data, while being less responsive. 
| -------------------------------------------------------------------
*/ 
$autocomplete['delay']  = 300;

/*
| -------------------------------------------------------------------
|  Disables (true) or enables (false) the autocomplete. Can be set when initialising (first creating) the autocomplete. 
| -------------------------------------------------------------------
*/ 
$autocomplete['disabled']  = 'false';

/*
| -------------------------------------------------------------------
|  Before a request (source-option) is started, after minLength and delay are met. Can be canceled (return false), 
|  then no request will be started and no items suggested. 
| -------------------------------------------------------------------
*/ 
$autocomplete['search']  = 'null';

/*
| -------------------------------------------------------------------
|  Triggered when the suggestion menu is opened. 
| -------------------------------------------------------------------
*/ 
$autocomplete['open']  = 'null';

/*
| -------------------------------------------------------------------
|  Before focus is moved to an item (not selecting), ui.item refers to the focused item. The default action of focus is 
|  to replace the text field's value with the value of the focused item, though only if the focus event was triggered 
|  by a keyboard interaction. Canceling this event prevents the value from being updated, but does not prevent the menu item from being focused. 
| -------------------------------------------------------------------
*/ 
$autocomplete['focus']  = 'null';

/*
| -------------------------------------------------------------------
|  Triggered when an item is selected from the menu; ui.item refers to the selected item. The default action of select is to 
|  replace the text field's value with the value of the selected item. Canceling this event prevents the value from being updated, 
|  but does not prevent the menu from closing. 
| -------------------------------------------------------------------
*/ 
$autocomplete['select']  = 'null';

/*
| -------------------------------------------------------------------
|  When the list is hidden - doesn't have to occur together with a change. 
| -------------------------------------------------------------------
*/ 
$autocomplete['close']  = 'null';

/*
| -------------------------------------------------------------------
|  After an item was selected; ui.item refers to the selected item. Always triggered after the close event. 
| -------------------------------------------------------------------
*/ 
$autocomplete['change']  = 'null';
  
?>