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
$carousel_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                            SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/carousel/cloud-carousel.1.0.4.js');

$carousel_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                                SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/carousel/cloud-carousel.1.0.4.min.js');



/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/

$carousel_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css');

/*
| -------------------------------------------------------------------
|  Horizontal position of the circle centre relative to the container. You would normally set this to half the width of the container.
| -------------------------------------------------------------------
*/
$carousel['xPos'] = "300";

/*
| -------------------------------------------------------------------
|  Vertical position of the circle centre relative to the container. You would normally set this to around half the height of container.
| -------------------------------------------------------------------
*/
$carousel['yPos'] = "128";

/*
| -------------------------------------------------------------------
|  A reference to the element that will serve as the 'rotate left' button. The button doesn't have to be within the container.
| -------------------------------------------------------------------
*/
$carousel['buttonLeft'] = "";

/*
| -------------------------------------------------------------------
|  A reference to the element that will serve as the 'rotate right' button. The button doesn't have to be within the container.
| -------------------------------------------------------------------
*/
$carousel['buttonRight'] = "";

/*
| -------------------------------------------------------------------
|  A reference to the element that will display an image's alt  attribute when hovered over. This element does not have to be within the container.
| -------------------------------------------------------------------
*/
$carousel['altBox'] = "";

/*
| -------------------------------------------------------------------
|  A reference to the element that will display an image's title attribute when hovered over. This element does not have to be within the container.
| -------------------------------------------------------------------
*/
$carousel['titleBox'] = "";

/*
| -------------------------------------------------------------------
|  Height of the auto-reflection in pixels, assuming applied to the item at the front. The reflection will scale automatically. A value of 0 means that no auto-reflection will appear.
| -------------------------------------------------------------------
*/
$carousel['reflHeight'] = 0;

/*
| -------------------------------------------------------------------
|  Amount of vertical space in pixels between image and reflection, assuming applied to the item at the front. Gap will scale automatically.
| -------------------------------------------------------------------
*/
$carousel['reflGap'] = 2;

/*
| -------------------------------------------------------------------
|  Half-height of the circle that items travel around. By playing around with this value, you can alter the amount of 'tilt'.
| -------------------------------------------------------------------
*/
$carousel['yRadius'] = 40;

/*
| -------------------------------------------------------------------
|  This value represents the speed at which the carousel rotates between items. Good values are around 0.1 ~ 0.3. A value of one will instantly move from one item to the 
|  next without any rotation animation. Values should be greater than zero and less than one.
| -------------------------------------------------------------------
*/
$carousel['speed'] = 0.15;

/*
| -------------------------------------------------------------------
|  If set to true, this will enable mouse wheel support for the carousel. You will need to include this mouse wheel plugin first: http://plugins.jquery.com/project/mousewheel
| -------------------------------------------------------------------
*/
$carousel['mouseWheel'] = 'false';

/*
| -------------------------------------------------------------------
|  Specifies how transparent the reflection is. 0 is invisible, 1 is totally opaque.
| -------------------------------------------------------------------
*/
$carousel['reflOpacity'] = 0.5;

/*
| -------------------------------------------------------------------
|  The minimum scale appled to the furthest item. The item at the front has a scale of 1. To make items in the distance one quarter of the size, minScale would be 0.25.
| -------------------------------------------------------------------
*/
$carousel['minScale'] = 0.5;

/*
| -------------------------------------------------------------------
|  This is the approximate frame rate of the carousel in frames per second. The higher the number, the faster and smoother the carousel movement 
|  will appear. However, frame rates that are too high can make the user's browser feel sluggish, especially if they have an under powered machine. 
|  The default setting of 30 is a good tradeoff between speed and performance. 
| -------------------------------------------------------------------
*/
$carousel['FPS'] = 30;

/*
| -------------------------------------------------------------------
|  Turn on auto-rotation of the carousel using either 'left'  or 'right' as the value. The carousel will rotate between items automatically. 
|  The auto-rotation stops when the user hovers over the carousel area, and starts again when the mouse is moved off. 
| -------------------------------------------------------------------
*/
$carousel['autoRotate'] = "'no'";

/*
| -------------------------------------------------------------------
|  Delay in milliseconds between each rotation in auto-rotate mode. A minimum value of 1000 (i.e. one second) is recommended. 
| -------------------------------------------------------------------
*/
$carousel['autoRotateDelay'] = 1500;


?>
