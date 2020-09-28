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
$zoom_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                        SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/zoom/cloud-zoom.1.0.2.min.js');

$zoom_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                            SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/zoom/cloud-zoom.1.0.2.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/

$zoom_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css',
                         SHIN_Core::get_theme_url_path().'/css/zoom/cloud-zoom.css');

/*
| -------------------------------------------------------------------
|  The width of the zoom window in pixels. If 'auto' is specified, the width will be the same as the small image.
| -------------------------------------------------------------------
*/
$zoom['zoomWidth'] = "'auto'";

/*
| -------------------------------------------------------------------
|  The height of the zoom window in pixels. If 'auto' is specified, the height will be the same as the small image.
| -------------------------------------------------------------------
*/
$zoom['zoomHeight'] = "'auto'";

/*
| -------------------------------------------------------------------
|  Specifies the position of the zoom window relative to the small image. Allowable values are 'left', 'right', 'top', 'bottom', 'inside' 
|  or you can specifiy the id of an html element to place the zoom window in e.g. position: 'element1'
| -------------------------------------------------------------------
*/
$zoom['position'] = "'right'";

/*
| -------------------------------------------------------------------
|  Allows you to fine tune the x-position of the zoom window in pixels.
| -------------------------------------------------------------------
*/
$zoom['adjustX'] = 0;

/*
| -------------------------------------------------------------------
|  Allows you to fine tune the y-position of the zoom window in pixels.
| -------------------------------------------------------------------
*/
$zoom['adjustY'] = 0;

/*
| -------------------------------------------------------------------
|  Specifies a tint colour which will cover the small image. Colours should be specified in hex format, e.g. '#aa00aa'. Does not work with softFocus.
| -------------------------------------------------------------------
*/
$zoom['tint'] = "false";

/*
| -------------------------------------------------------------------
|  Opacity of the tint, where 0 is fully transparent, and 1 is fully opaque.
| -------------------------------------------------------------------
*/
$zoom['tintOpacity'] = 0.5;

/*
| -------------------------------------------------------------------
| Opacity of the lens mouse pointer, where 0 is fully transparent, and 1 is fully opaque. In tint and soft-focus modes, it will always be transparent.
| -------------------------------------------------------------------
*/
$zoom['lensOpacity'] = 0.5;

/*
| -------------------------------------------------------------------
| Applies a subtle blur effect to the small image. Set to true or false. Does not work with tint.
| -------------------------------------------------------------------
*/
$zoom['softFocus'] = "false";

/*
| -------------------------------------------------------------------
| Amount of smoothness/drift of the zoom image as it moves. The higher the number, the smoother/more drifty the movement will be. 1 = no smoothing.
| -------------------------------------------------------------------
*/
$zoom['smoothMove'] = 3;

/*
| -------------------------------------------------------------------
| Shows the title tag of the image. True or false.
| -------------------------------------------------------------------
*/
$zoom['showTitle'] = "true";

/*
| -------------------------------------------------------------------
| Specifies the opacity of the title if displayed, where 0 is fully transparent, and 1 is fully opaque.
| -------------------------------------------------------------------
*/
$zoom['titleOpacity'] = "true";


?>
