<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Maps config file with default values
| -------------------------------------------------------------------
| 
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$maps_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                        SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.js',
                        'http://maps.google.com/maps/api/js?sensor=false&hl=de');

$maps_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                            SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.min.js',
                            'http://maps.google.com/maps/api/js?sensor=false&hl=de');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$maps_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css');

/*
| -------------------------------------------------------------------
|  Map main container
| -------------------------------------------------------------------
*/
$maps['container'] = '';

/*
| -------------------------------------------------------------------
|  Main Street View container
| -------------------------------------------------------------------
*/
$maps['viewContainer'] = '';

/*
| -------------------------------------------------------------------
|  Street view width in px on the page
| -------------------------------------------------------------------
*/
$maps['pWidth'] = '400';

/*
| -------------------------------------------------------------------
|  Street view height in px on the page
| -------------------------------------------------------------------
*/ 
$maps['pHeight'] = '400';

/*
| -------------------------------------------------------------------
|  (default 0) defines the rotation angle around the camera locus in degrees relative from 
|  true north. Headings are measured clockwise (90 degrees is true east)
| -------------------------------------------------------------------
*/ 
$maps['heading'] = 0;

/*
| -------------------------------------------------------------------
|  The map will appear with a Street View Pegman control.
| -------------------------------------------------------------------
*/ 
$maps['streetViewControl'] = 'false';

/*
| -------------------------------------------------------------------
|  (default 0) defines the angle variance "up" or "down" from the camera's initial default 
|  pitch, which is often (but not always) flat horizontal. (For example, an image taken on 
|  a hill will likely exhibit a default pitch that is not horizontal.) Pitch angles are 
|  measured with negative values looking up (to -90 degrees straight up and orthogonal to 
|  the default pitch) and positive values looking down (to +90 degrees straight down and orthogonal 
|  to the default pitch).
| -------------------------------------------------------------------
*/ 
$maps['pitch'] = 0;

/*
| -------------------------------------------------------------------
|  default 1) defines the zoom level of this view (effectively proscribing the "field of view") 
|  with 0  being fully zoomed-out. Most Street View locations support zoom levels from 0 to 3, inclusive
| -------------------------------------------------------------------
*/ 
$maps['sZoom '] = 1; 

/*
| -------------------------------------------------------------------
|  Map width in px on the page
| -------------------------------------------------------------------
*/
$maps['width'] = '400';

/*
| -------------------------------------------------------------------
|  Map height in px on the page
| -------------------------------------------------------------------
*/ 
$maps['height'] = '400';

/*
| -------------------------------------------------------------------
| Map default zoom 
| -------------------------------------------------------------------
*/ 
$maps['zoom']   =   '5';

/*
| -------------------------------------------------------------------
|  Map default time. Possible types HYBRID|ROADMAP|SATELLITE|TERRAIN
| -------------------------------------------------------------------
*/ 
$maps['type']   =   'ROADMAP';

/*
| -------------------------------------------------------------------
| Marker ajax url used for save marker coords 
| -------------------------------------------------------------------
*/ 
$maps['marker_ajax_url']   =   '';

/*
| -------------------------------------------------------------------
| Default map latitude 
| -------------------------------------------------------------------
*/ 
$maps['centerLatitude']    =    45.4636889;

/*
| -------------------------------------------------------------------
| Default map longitude 
| -------------------------------------------------------------------
*/   
$maps['centerLongitude']   =    9.1881408;

/*
| -------------------------------------------------------------------
| Try do detect User location by W3C Geolocation standard 
| -------------------------------------------------------------------
*/
$maps['autodetect_location']    =   false; 

/*
| -------------------------------------------------------------------
| Miximum number of allowed waypoints 
| -------------------------------------------------------------------
*/
$maps['number_way_points']    =   9; 

/*
| -------------------------------------------------------------------
| Default travel mode - Possible types BICYCLING|DRIVING|WALKING 
| -------------------------------------------------------------------
*/
$maps['travel_mode']    =   'DRIVING';


/*
| -------------------------------------------------------------------
| Polygon or polyline stroke color in HTML hex style, ie. "#FFAA00" 
| -------------------------------------------------------------------
*/
$maps['strokeColor']    =   '#FF0000'; 

/*
| -------------------------------------------------------------------
| Polygon or polyline stroke opacity between 0.0 and 1.0
| -------------------------------------------------------------------
*/
$maps['strokeOpacity']    =   0.8;

/*
| -------------------------------------------------------------------
| Polygon or polyline The stroke width in pixels.
| -------------------------------------------------------------------
*/
$maps['strokeWeight']    =   2;

/*
| -------------------------------------------------------------------
| Polygon fill color in HTML hex style, ie. "#00AAFF"
| -------------------------------------------------------------------
*/
$maps['fillColor']    =   '#FF0000'; 

/*
| -------------------------------------------------------------------
| Polygon fill opacity between 0.0 and 1.0
| -------------------------------------------------------------------
*/
$maps['fillOpacity']    =   0.35; 

/*
| -------------------------------------------------------------------
| Disable or enable default UI
| -------------------------------------------------------------------
*/
$maps['disableDefaultUI']    =   'false'; 

/*
| -------------------------------------------------------------------
| Disable or enable navigation control  
| -------------------------------------------------------------------
*/
$maps['navigationControl']    =   'true';

/*
| -------------------------------------------------------------------
| Disable or enable type control  
| -------------------------------------------------------------------
*/
$maps['mapTypeControl']    =   'false';

/*
| -------------------------------------------------------------------
| Disable or enable scale control  
| -------------------------------------------------------------------
*/
$maps['scaleControl']    =   'false';

/*
| -------------------------------------------------------------------
| The MapType control may appear in one of the following style options: HORIZONTAL_BAR|DROPDOWN_MENU|DEFAULT    
| -------------------------------------------------------------------
*/
$maps['type_control_style']    =   'HORIZONTAL_BAR';

/*
| -------------------------------------------------------------------
| The following control positions are supported: TOP|TOP_LEFT|TOP_RIGHT|BOTTOM|BOTTOM_LEFT|BOTTOM_RIGHT|LEFT|RIGHT  
| -------------------------------------------------------------------
*/
$maps['type_control_position']    =   'BOTTOM_LEFT'; 

/*
| -------------------------------------------------------------------
| The Navigation control may appear in one of the following style options: SMALL|ZOOM_PAN|ANDROID|DEFAULT    
| -------------------------------------------------------------------
*/
$maps['navigation_control_style']    =   'ZOOM_PAN';

/*
| -------------------------------------------------------------------
| The following control positions are supported: TOP|TOP_LEFT|TOP_RIGHT|BOTTOM|BOTTOM_LEFT|BOTTOM_RIGHT|LEFT|RIGHT  
| -------------------------------------------------------------------
*/
$maps['navigation_control_position']    =   'TOP_LEFT'; 

/*
| -------------------------------------------------------------------
| The Scale control positions are supported: TOP|TOP_LEFT|TOP_RIGHT|BOTTOM|BOTTOM_LEFT|BOTTOM_RIGHT|LEFT|RIGHT  
| -------------------------------------------------------------------
*/
$maps['scale_position']    =   'TOP_RIGHT';

/*
| -------------------------------------------------------------------
| Marker icon  
| -------------------------------------------------------------------
*/
$maps['icon']    =   '';

/*
| -------------------------------------------------------------------
| Geocoding url  
| -------------------------------------------------------------------
*/
$maps['geocoding_url']    =   'http://maps.google.com/maps/api/geocode/xml?address='; 


?>
