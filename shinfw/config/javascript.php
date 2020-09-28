<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| path to jquery.js
| Real JS driver. Right now only JQuery.  jquery, prototype ......
|--------------------------------------------------------------------------
*/
$javascript['js_library_driver'] = 'jquery';


/*
|--------------------------------------------------------------------------
| path to jquery-1.4.2.js
|--------------------------------------------------------------------------
*/
$javascript[$javascript['js_library_driver']]['javascript_folder'] = '/js/jquery/jquery.js';


/*
|--------------------------------------------------------------------------
| path to jquery-1.4.2.js
|--------------------------------------------------------------------------
*/
$javascript['javascript_location'] = SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].$javascript[$javascript['js_library_driver']]['javascript_folder'];


/*
|--------------------------------------------------------------------------
| rotator iamge. if not defined -> just must be showed translated "Loading..."
|--------------------------------------------------------------------------
*/
$javascript['javascript_ajax_img'] = 'images/ajax-loader.gif';


/* End of file javascript.php */
/* Location: ./config/javascript.php */