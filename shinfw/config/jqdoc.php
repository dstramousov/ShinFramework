<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| jqDoc config file with default values
| -------------------------------------------------------------------
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$jqdoc_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js',
                         SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqDock/jquery.jqDock.js');


$jqdoc_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js',
                             SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqDock/jquery.jqDock.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$jqdoc_ext['css'] = array();


/*
| -------------------------------------------------------------------
|  This designates one of the menu's elements to be fully expanded when the dock is initialised. The option 
|  takes a zero-based index of the position of the desired menu element (image) within the dock - so if you 
|  want the 4th of 6 images to be expanded, set active : 3. 
| -------------------------------------------------------------------
*/
$jqdoc['active'] = -1;

/*
| -------------------------------------------------------------------
|  Fixes the horizontal/vertical main axis, and direction of expansion.  
| -------------------------------------------------------------------
*/
$jqdoc['align'] = '"bottom"';

/*
| -------------------------------------------------------------------
|  Attenuation coefficient. This controls the relationship between the distance from the cursor and the amount 
|  of expansion of any affected image within that distance. A coefficient of 1 makes the expansion linear with 
|  respect to distance from cursor; a larger coefficient gives a greater degree of expansion the closer to the 
|  cursor the affected image is (within distance).  
| -------------------------------------------------------------------
*/
$jqdoc['coefficient'] = 1.5;

/*
| -------------------------------------------------------------------
|  Attenuation distance from cursor, ie the distance (in pixels) from the cursor that an image has to be within 
|  in order to have any expansion applied.   
| -------------------------------------------------------------------
*/
$jqdoc['distance'] = 72;

/*
| -------------------------------------------------------------------
|  The duration (in milliseconds) of the initial 'on-Dock' expansion, and the 'off-Dock' shrinkage.   
| -------------------------------------------------------------------
*/
$jqdoc['duration'] = 300;

/*
| -------------------------------------------------------------------
|  The amount of time (in milliseconds) for the initial fade-in of the Dock after initialisation. By default 
|  this is set to 0 (zero), which means that the Dock is displayed in full as soon as it can be ( = show() ).
|  There may be occasions when a 'softer' presentation of the Dock is desirable, and setting fadeIn to, for 
|  example, 400 would fade the Dock in over that period.    
| -------------------------------------------------------------------
*/
$jqdoc['fadeIn'] = 0;

/*
| -------------------------------------------------------------------
|  By default the fade-in effect (see fadeIn above) is applied to the original target menu element. By specifying 
|  either 'wrap' or 'dock' here, the fade-in element can be switched to the child or grand-child 
|  (ie. div.jqDockWrap or div.jqDock, respectively) of the original target menu element. This option only has any 
|  effect if fadeIn is set, and is really only useful for cases where, for example, background colours have been 
|  styled on the original menu element or div.jqDock, and you don't want them to be faded in.    
| -------------------------------------------------------------------
*/
$jqdoc['fadeLayer'] = '""';

/*
| -------------------------------------------------------------------
|  If set, this alters the default dock behaviour such that the Dock is not auto-centered and the wrap element 
|  (.jqDockWrap, which is relatively positioned) expands and collapses to precisely contain the Dock (.jqDock); 
|  this allows elements positioned around the docked menu to adjust their own relative position according to 
|  the current state of the docked menu.     
| -------------------------------------------------------------------
*/
$jqdoc['flow'] = 'false';

/*
| -------------------------------------------------------------------
|  The period of time (in milliseconds) after the mouse has left the menu (without re-entering, obviously!) 
|  before the Dock attempts to go to sleep. Please read - and be sure that you understand - the Advanced documentation 
|  before setting a value for this option.     
| -------------------------------------------------------------------
*/
$jqdoc['idle'] = 0;

/*
| -------------------------------------------------------------------
|  The period of time (in milliseconds) after which the Dock will shrink if there has been no movement of the mouse 
|  while it is over an expanded Dock.      
| -------------------------------------------------------------------
*/
$jqdoc['inactivity'] = 0;

/*
| -------------------------------------------------------------------
|  This enables/disables display of a label on the current image.
|  Allowed string values are 2 characters in length: the first character indicates horizontal position (t=top, m=middle, b=bottom) 
|  and the second indicates vertical position (l=left, c=center, r=right). So 'br' means bottom-right!
|  If simply set to true, jqDock will use its default positioning for the label, which is 'tl' (top-left) for any align setting 
|  other than 'top' or 'left'. The defaults for 'top' and 'left' alignment are 'br' (bottom-right) and 'tr' (top-right) respectively.
|  To determine the text for the label, jqDock looks firstly for text in the image's 'title' attribute; if not found, it will then 
|  look for text in the 'title' attribute of the parent link - if there is one - and use that if found.       
| -------------------------------------------------------------------
*/
$jqdoc['labels'] = 'false';

/*
| -------------------------------------------------------------------
|  This overrides the default image loader used by jqDock. Depending on the browser, jqDock uses an image loader based on either 
|  "new Image()", or the jQuery HTML constructor "jQuery('<img />')...". If your Dock is not being displayed, and you have triple checked 
|  all your image paths, try setting this option to 'image' or 'jquery' to override the default loader.       
| -------------------------------------------------------------------
*/
$jqdoc['loader'] = '""';

/*
| -------------------------------------------------------------------
|  By default, while the dock is asleep the most recent mouse event is buffered, and when the dock is nudged awake that buffered event 
|  is used and acted upon - before any other mouse event that might occur subsequent to the 'nudge'. Setting the noBuffer option to true 
|  will prevent buffering of the mouse events.        
| -------------------------------------------------------------------
*/
$jqdoc['noBuffer'] = 'false';

/*
| -------------------------------------------------------------------
|  Function called after jqDock has completed initialisation and is ready to reveal the Dock. The called function is given the scope (this) 
|  of the original menu element, and may return false to prevent the Dock being revealed. Please refer to the Advanced documentation.         
| -------------------------------------------------------------------
*/
$jqdoc['onReady'] = '""';

/*
| -------------------------------------------------------------------
|  Function called when the Dock is about to go to sleep. The called function is given the scope (this) of the original menu element, and 
|  may return false to prevent the Dock going to sleep. Please refer to the Advanced documentation.          
| -------------------------------------------------------------------
*/
$jqdoc['onSleep'] = '""';

/*
| -------------------------------------------------------------------
|  Function called when the Dock is about to wake up from sleep. The called function is given the scope (this) of the original menu element, 
|  and may return false to prevent the Dock waking up. Please refer to the Advanced documentation.           
| -------------------------------------------------------------------
*/
$jqdoc['onWake'] = '""';

/*
| -------------------------------------------------------------------
|  Function called when the Dock is about to wake up from sleep. The called function is given the scope (this) of the original menu element, 
|  and may return false to prevent the Dock waking up. Please refer to the Advanced documentation.           
| -------------------------------------------------------------------
*/
$jqdoc['setLabel'] = '""';

/*
| -------------------------------------------------------------------
|  This is the maximum value (in pixels) of the minor axis dimension for the 'at rest' images. For example, an image of natural dimensions 
|  90x120 (width x height), placed in a horizontal Dock (say, 'align' = 'bottom') would, by default, be sized down to 36x48. This is because 
|  height is the minor axis in a horizontal Dock, and to keep the presentation of the 'at rest' images neat and tidy it is the height that is 
|  governed by the size option. Conversely, in a vertical Dock it would be the width that was capped at the size value, with height being set 
|  proportionately.           
| -------------------------------------------------------------------
*/
$jqdoc['size'] = 48;

/*
| -------------------------------------------------------------------
|  Function for providing an alternate large image source path. For instances where you are either unable, or do not want to put the large 
|  image's path in the IMG's 'alt' attribute, but you still want to have a small and large image for clarity, this function may be useful.            
| -------------------------------------------------------------------
*/
$jqdoc['source'] = '""';

/*
| -------------------------------------------------------------------
|  The timer interval (in milliseconds) between each animation step of the 'on-Dock' expansion, and the 'off-Dock' shrinkage.            
| -------------------------------------------------------------------
*/
$jqdoc['step'] = 50;


