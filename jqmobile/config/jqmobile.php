<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$jqmobile_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery-1.5.1.js',
                            SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqmobile/jquery.mobile-1.0a4.js');

/*
| -------------------------------------------------------------------
|  Depends from min JS
| -------------------------------------------------------------------
*/
$jqmobile_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery-1.5.1.js',
                                SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.mobile-1.0a4.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$jqmobile_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqmobile/jquery.mobile-1.0a3.css');

/*
|--------------------------------------------------------------------------
|  The url parameter used for referencing widget-generated sub-pages (such as those generated by nested listviews). 
|  Translates to to example.html&ui-page=subpageIdentifier. The hash segment before &ui-page= is used by the framework 
|  for making an Ajax request to the URL where the sub-page exists.
|--------------------------------------------------------------------------
*/
$jqmobile['subPageUrlKey'] = '"ui-page"';

/*
|--------------------------------------------------------------------------
|  Anchor links with a data-rel attribute value, or pages with a data-role value, that match these selectors will not 
| be trackable in history (they won't update the location.hash and won't be bookmarkable).
|--------------------------------------------------------------------------
*/
$jqmobile['nonHistorySelectors'] = '"dialog"';

/*
|--------------------------------------------------------------------------
|  The class assigned to page currently in view, and during transitions
|--------------------------------------------------------------------------
*/
$jqmobile['activePageClass'] = '"ui-page-active"';

/*
|--------------------------------------------------------------------------
|  The class used for "active" button state, from CSS framework.
|--------------------------------------------------------------------------
*/
$jqmobile['activeBtnClass'] = '"ui-page-active"';

/*
|--------------------------------------------------------------------------
|  jQuery Mobile will automatically handle link clicks and form submissions through Ajax, when possible. If false, url 
|  hash listening will be disabled as well, and urls will load as regular http requests.
|--------------------------------------------------------------------------
*/
$jqmobile['ajaxEnabled'] = 'true';

/*
|--------------------------------------------------------------------------
|   jQuery Mobile will automatically handle link clicks through Ajax, when possible.
|--------------------------------------------------------------------------
*/
$jqmobile['ajaxLinksEnabled'] = 'true';

/*
|--------------------------------------------------------------------------
|   jQuery Mobile will automatically handle form submissions through Ajax, when possible.
|--------------------------------------------------------------------------
*/
$jqmobile['ajaxFormsEnabled'] = 'true';

/*
|--------------------------------------------------------------------------
|   Auto initialize, when set to false, will defer the enhancement of your embeded pages until
|
|   $.mobile.initializePage(); 
|
|   is invoked explicitly. By default the page is enhanced when the dom is ready.
|--------------------------------------------------------------------------
*/
$jqmobile['autoInitialize'] = 'true';

/*
|--------------------------------------------------------------------------
|   Set the default transition for page changes that use Ajax. Set to 'none' for no transitions by default.
|--------------------------------------------------------------------------
*/
$jqmobile['defaultTransition'] = '"slide"';

/*
|--------------------------------------------------------------------------
|   Set the text that appears when a page is loading. If set to false, the message will not appear at all.
|--------------------------------------------------------------------------
*/
$jqmobile['loadingMessage'] = '"loading"';

/*
|--------------------------------------------------------------------------
|   Configure the auto-generated meta viewport tag's content attribute. If false, no meta tag will be appended to the DOM.
|--------------------------------------------------------------------------
*/
$jqmobile['metaViewportContent'] = '"width=device-width, minimum-scale=1, maximum-scale=1"';


/* End of file jqmobile.php */
/* Location: ./config/jqmobile.php */