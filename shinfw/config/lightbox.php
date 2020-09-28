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
$lightbox_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                            SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/lightbox/jquery.prettyPhoto.js');

$lightbox_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                                SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/lightbox/jquery.prettyPhoto.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/

$lightbox_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css',
                             SHIN_Core::get_theme_url_path().'/css/lightbox/prettyPhoto.css');

/*
| -------------------------------------------------------------------
|  Theme name
| -------------------------------------------------------------------
*/
$lightbox['theme'] = "'facebook'";

/*
| -------------------------------------------------------------------
|  Animation speed. Can take nex values: fast/slow/normal
| -------------------------------------------------------------------
*/
$lightbox['animationSpeed'] = "'normal'";

/*
| -------------------------------------------------------------------
|  Opacity value between 0 and 1
| -------------------------------------------------------------------
*/
$lightbox['opacity'] = 0.80;

/*
| -------------------------------------------------------------------
|  true|false
| -------------------------------------------------------------------
*/
$lightbox['showTitle'] = 'true';

/*
| -------------------------------------------------------------------
|  true|false
| -------------------------------------------------------------------
*/
$lightbox['allowresize'] = 'true';

/*
| -------------------------------------------------------------------
|  Container default width
| -------------------------------------------------------------------
*/
$lightbox['default_width'] = 500;

/*
| -------------------------------------------------------------------
|  Container default height
| -------------------------------------------------------------------
*/
$lightbox['default_height'] = 344;

/*
| -------------------------------------------------------------------
|  Automatically start videos
| -------------------------------------------------------------------
*/
$lightbox['autoplay'] = 'false';

/*
| -------------------------------------------------------------------
|  If set to true, only the close button will close the window
| -------------------------------------------------------------------
*/
$lightbox['modal'] = 'false';

/*
| -------------------------------------------------------------------
|  Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto
| -------------------------------------------------------------------
*/
$lightbox['hideflash'] = 'false';

/*
| -------------------------------------------------------------------
|  The separator for the gallery counter 1 "of" 2
| -------------------------------------------------------------------
*/
$lightbox['counter_separator_label'] = '" of "';

/*
| -------------------------------------------------------------------
|  Called everytime an item is shown/changed
| -------------------------------------------------------------------
*/
$lightbox['changepicturecallback'] = 'function(){}';

/*
| -------------------------------------------------------------------
|  Called when prettyPhoto is closed
| -------------------------------------------------------------------
*/
$lightbox['callback'] = 'function(){}';




?>
