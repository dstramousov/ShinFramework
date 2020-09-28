<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Dialog config file with default values
| -------------------------------------------------------------------
| All documentation you can find there http://jqueryui.com/demos/dialog/
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$dialog_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.js');

$dialog_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$dialog_ext['css'] = array(SHIN_Core::$_config['theme']['theme_root_dir'] . '/' . SHIN_Core::get_theme_path().'/css/jqueryUI/jquery.ui.all.css');

/*
| -------------------------------------------------------------------
| Disables (true) or enables (false) the dialog. Can be set when initialising (first creating) the dialog
| -------------------------------------------------------------------
*/
$dialog['disabled'] = "false";

/*
| -------------------------------------------------------------------
|   When autoOpen is true the dialog will open automatically when dialog is called.
|   If false it will stay hidden until .dialog("open") is called on it.
| -------------------------------------------------------------------
*/
$dialog['autoOpen'] = "false";

/*
| -------------------------------------------------------------------
|   Specifies which buttons should be displayed on the dialog. 
| The property key is the text of the button. 
| The value is the callback function for when the button is clicked. 
| The context of the callback is the dialog element; 
| if you need access to the button, it is available as the target of the event object.
| -------------------------------------------------------------------
*/
$dialog['buttons'] = "{ }";

/*
| -------------------------------------------------------------------
|  Specifies whether the dialog should close when it has focus and the user presses the esacpe (ESC) key.
| -------------------------------------------------------------------
*/
$dialog['closeOnEscape'] = "true";

/*
| -------------------------------------------------------------------
|  Specifies the text for the close button. Note that the close text is visibly hidden when using a standard theme.
| -------------------------------------------------------------------
*/
$dialog['closeText'] = "'close'";

/*
| -------------------------------------------------------------------
|  The specified class name(s) will be added to the dialog, for additional theming.
| -------------------------------------------------------------------
*/
$dialog['dialogClass'] = "''";

/*
| -------------------------------------------------------------------
| If set to true, the dialog will be draggable will be draggable by the titlebar.
| -------------------------------------------------------------------
*/
$dialog['draggable'] = "true";

/*
| -------------------------------------------------------------------
|  The height of the dialog, in pixels. 
| Specifying 'auto' is also supported to make the dialog adjust based on its content.
| -------------------------------------------------------------------
*/
$dialog['height'] = "'auto'";

/*
| -------------------------------------------------------------------
| The effect to be used when the dialog is closed.
| -------------------------------------------------------------------
*/
$dialog['hide'] = "null";

/*
| -------------------------------------------------------------------
|  The maximum height to which the dialog can be resized, in pixels.
| -------------------------------------------------------------------
*/
$dialog['maxHeight'] = "false";

/*
| -------------------------------------------------------------------
|  The maximum width to which the dialog can be resized, in pixels.
| -------------------------------------------------------------------
*/
$dialog['maxWidth'] = "false";

/*
| -------------------------------------------------------------------
|  The minimum height to which the dialog can be resized, in pixels.
| -------------------------------------------------------------------
*/
$dialog['minHeight'] = "150";

/*
| -------------------------------------------------------------------
|  The minimum width to which the dialog can be resized, in pixels.
| -------------------------------------------------------------------
*/
$dialog['minWidth'] = "150";

/*
| -------------------------------------------------------------------
|  If set to true, the dialog will have modal behavior; 
| other items on the page will be disabled (i.e. cannot be interacted with). 
| Modal dialogs create an overlay below the dialog but above other page elements.
| -------------------------------------------------------------------
*/
$dialog['modal'] = "false";

/*
| -------------------------------------------------------------------
| Specifies where the dialog should be displayed. Possible values: 
| 1) a single string representing position within viewport: 'center', 'left', 'right', 'top', 'bottom'. 
| 2) an array containing an x,y coordinate pair in pixel offset from left, top corner of viewport (e.g. [350,100]) 
| 3) an array containing x,y position string values (e.g. ['right','top'] for top right corner).
| -------------------------------------------------------------------
*/
$dialog['position'] = "'center'";

/*
| -------------------------------------------------------------------
|  If set to true, the dialog will be resizeable.
| -------------------------------------------------------------------
*/
$dialog['resizable'] = "true";

/*
| -------------------------------------------------------------------
| The effect to be used when the dialog is opened. E.g. 'slide'
| -------------------------------------------------------------------
*/
$dialog['show'] = "null";

/*
| -------------------------------------------------------------------
|  Specifies whether the dialog will stack on top of other dialogs.
| This will cause the dialog to move to the front of other dialogs when it gains focus.
| -------------------------------------------------------------------
*/
$dialog['stack'] = "true";

/*
| -------------------------------------------------------------------
|  Specifies the title of the dialog.
| The title can also be specified by the title attribute on the dialog source element.
| -------------------------------------------------------------------
*/
$dialog['title'] = "''";

/*
| -------------------------------------------------------------------
| The width of the dialog, in pixels.
| -------------------------------------------------------------------
*/
$dialog['width'] = "400";

/*
| -------------------------------------------------------------------
|  The starting z-index for the dialog.
| -------------------------------------------------------------------
*/
$dialog['zIndex'] = "1000";

?>
