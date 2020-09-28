<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Timezone settings.
|--------------------------------------------------------------------------
*/
$config['core']['timezone'] = 'Europe/Rome';


/*
|--------------------------------------------------------------------------
| Mode of working. Possible values: development OR production
|--------------------------------------------------------------------------
*/
$config['core']['mode'] = 'development';

/*
|--------------------------------------------------------------------------
| Make correct prefix http OR https
|--------------------------------------------------------------------------
*/
$config['core']['host_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");


/*
|--------------------------------------------------------------------------
| Base Shin framework URL (for correct values themes system)
|--------------------------------------------------------------------------
|
| URL to your site root. Typically this will be your base URL,
|
|	http://mywork/shinframework
|
*/
$config['core']['shinfw_base_url']	= "http://mywork/shinframework";

/*
|--------------------------------------------------------------------------
| Base Application URL
|--------------------------------------------------------------------------
|
| URL to your application root. Typically this will be your base URL for current application,
| in case with shinframework this directory have the same name of 'shinfw_base_url'
|
|	http://mywork/shinframework/shinticket
|
*/
$config['core']['app_base_url']	= $config['core']['shinfw_base_url']."/shinticket";

/*
|--------------------------------------------------------------------------
| Phys folder name where is all placed.
|--------------------------------------------------------------------------
|
*/
$config['core']['phys_folder_name']	= "shinframework";

/*
|--------------------------------------------------------------------------
| SHIN framework folder path.
|--------------------------------------------------------------------------
|
| Where is placed your shinframework folder,
|
*/
$config['core']['shinfw_folder'] = "shinfw";


/*
|--------------------------------------------------------------------------
| SHIN real folder path. Don`t touch this. This section calculated automaticaly
|--------------------------------------------------------------------------
|
*/                                                                                         
$config['core']['base_path'] = str_replace($config['core']['shinfw_folder'].DIRECTORY_SEPARATOR, '', BASEPATH);


/*
|--------------------------------------------------------------------------
| Index File. If you have FastCGI mode in any case YOU MUST clear this value !!!!!
|--------------------------------------------------------------------------
|
| Typically this will be your index.php file, unless you've renamed it to
| something else. If you are using mod_rewrite to remove the page set this
| variable so that it is blank.
|
*/
$config['core']['index_page'] = "index.php";


/*
|--------------------------------------------------------------------------
| Default Character Set
|--------------------------------------------------------------------------
|
| This determines which character set is used by default in various methods
| that require a character set to be provided.
|
*/
$config['core']['charset'] = "UTF-8";

/*
|--------------------------------------------------------------------------
| Class Extension Prefix
|--------------------------------------------------------------------------
|
| This item allows you to set the filename/classname prefix when extending
| native libraries.
|
*/
$config['core']['subclass_prefix'] = 'SHIN_';

/*
|--------------------------------------------------------------------------
| Benchmark logic switcher on/off
|--------------------------------------------------------------------------
|
| This item allows you to set internal benchmark system load and make internal 
| logic.
|
*/
$config['core']['benchmark_debug_information'] = false;


/*
|--------------------------------------------------------------------------
| Profiler switcher on/off
|--------------------------------------------------------------------------
|
| This item allows you to set external profiler library system load and make internal 
| logic.
|
*/                                            	
$config['core']['profiler_information'] = FALsE;

/*
|--------------------------------------------------------------------------
| SHIN framework version number.
|--------------------------------------------------------------------------
|
*/
$config['core']['shfw_version'] = '0.2';

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
|
| If you have enabled error logging, you can set an error threshold to 
| determine what gets logged. Threshold options are:
| You can enable error logging by setting a threshold over zero. The
| threshold determines what gets logged. Threshold options are:
|
|	0 = Disables logging, Error logging TURNED OFF
|	1 = Error Messages (including PHP errors)
|	2 = Debug Messages
|	3 = Informational Messages
|	4 = All Messages
|
| For a live site you'll usually only enable Errors (1) to be logged otherwise
| your log files will fill up very fast.
|
*/
$config['log']['log_threshold'] = 4;

/*
|--------------------------------------------------------------------------
| Error Logging Directory Path
|--------------------------------------------------------------------------
|
| Leave this BLANK unless you would like to set something other than the default
| system/logs/ folder.  Use a full server path with trailing slash.
|
*/
$config['log']['log_path'] = BASEPATH.'/logs/';

/*
|--------------------------------------------------------------------------
| Date Format for Logs
|--------------------------------------------------------------------------
|
| Each item that is logged has an associated date. You can use PHP date
| codes to set your own date formatting
|
*/
$config['log']['log_date_format'] = 'Y-m-d H:i:s';


/*
|--------------------------------------------------------------------------
| Default Language
|--------------------------------------------------------------------------
|
| This determines which set of language files should be used. Make sure
| there is an available translation if you intend to use something other
| than english.
|
*/
$config['lang']['language']	= "en";

/*
|--------------------------------------------------------------------------
| Available languages.
|--------------------------------------------------------------------------
| See shinfw/lang folder.
|
*/
$config['lang']['available_language'] = array('en', 'it', 'ru');


/*
|--------------------------------------------------------------------------
| Default Display Date format
|--------------------------------------------------------------------------
*/
$config['lang']['display_date_format'] = "Y/m/d";

/*
|--------------------------------------------------------------------------
| Default currency name
|--------------------------------------------------------------------------
*/
$config['lang']['currency'] = '€';

/*
|--------------------------------------------------------------------------
| Default currency separator
|--------------------------------------------------------------------------
*/
$config['lang']['currency_separator'] = ".";

/*
|--------------------------------------------------------------------------
| Master Time Reference
|--------------------------------------------------------------------------
|
| Options are "local" or "gmt".  This pref tells the system whether to use
| your server's local time as the master "now" reference, or convert it to
| GMT.  See the "date helper" page of the user guide for information
| regarding date handling.
|
*/
$config['lang']['time_reference'] = 'local';

/*
|--------------------------------------------------------------------------
| inject or not on the page language selector menu.
|--------------------------------------------------------------------------
*/
$config['lang']['print_lang_menu'] = FALSE;


/*
|--------------------------------------------------------------------------
| Global XSS Filtering
|--------------------------------------------------------------------------
|
| Determines whether the XSS filter is always active when GET, POST or
| COOKIE data is encountered
|
*/
$config['input']['global_xss_filtering'] = FALSE;

/**
* You can optionally enable standard query string based URLs:
* example.com?who=me&what=something&where=here
* 
*/
$config['input']['enable_query_strings'] = FALSE;

/*
|--------------------------------------------------------------------------
| URI PROTOCOL
|--------------------------------------------------------------------------
|
| This item determines which server global should be used to retrieve the
| URI string.  The default setting of "AUTO" works for most servers.
| If your links do not seem to work, try one of the other delicious flavors:
|
| 'AUTO'				Default - auto detects
| 'REQUEST_URI'		Uses the REQUEST_URI (fastcgi mode)|
|
*/
$config['input']['uri_protocol']	= "AUTO";

/*
|--------------------------------------------------------------------------
| Allowed URL Characters
|--------------------------------------------------------------------------
|
| This lets you specify with a regular expression which characters are permitted
| within your URLs.  When someone tries to submit a URL with disallowed
| characters they will get a warning message.
|
| As a security measure you are STRONGLY encouraged to restrict URLs to
| as few characters as possible.  By default only these are allowed: a-z 0-9~%.:_-
|
| Leave blank to allow all characters -- but only if you are insane.
|
| DO NOT CHANGE THIS UNLESS YOU FULLY UNDERSTAND THE REPERCUSSIONS!!
|
*/
$config['input']['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

/*
|--------------------------------------------------------------------------
| Cross Site Request Forgery
|--------------------------------------------------------------------------
| Enables a CSRF cookie token to be set. When set to TRUE, token will be
| checked on a submitted form. If you are accepting user data, it is strongly
| recommended CSRF protection be enabled.
|
| 'csrf_token_name' = The token name
| 'csrf_cookie_name' = The cookie name
| 'csrf_expire' = The number in seconds the token should expire.
*/
$config['input']['csrf_protection'] = FALSE;
$config['input']['csrf_token_name'] = 'csrf_test_name';
$config['input']['csrf_cookie_name'] = 'csrf_cookie_name';
$config['input']['csrf_expire'] = 7200;

/*
|--------------------------------------------------------------------------
| Default theme name.
|--------------------------------------------------------------------------
*/
$config['theme']['default_theme'] = "redmond"; // "lightness", "redmond", "smoothness", "darkness" is also available

/*
|--------------------------------------------------------------------------
| Where is root of themes folder name.
|--------------------------------------------------------------------------
*/
$config['theme']['theme_root_dir'] = $config['core']['shinfw_base_url'].'/'.$config['core']['shinfw_folder']."/themes";

/*
|--------------------------------------------------------------------------
| Where is general css file.
|--------------------------------------------------------------------------
*/
$config['theme']['general_css_file'] = "general.css";

/*
|--------------------------------------------------------------------------
| Where is images folder name.
|--------------------------------------------------------------------------
*/
$config['theme']['images_dir'] = $config['theme']['theme_root_dir'].'/'."images";

/*
|--------------------------------------------------------------------------
| Where is css folder name.
|--------------------------------------------------------------------------
*/
$config['theme']['css_dir'] = "css";

/*
|--------------------------------------------------------------------------
| List of available themes.
|--------------------------------------------------------------------------
*/
$config['theme']['theme_available'] = array(
									'lightness',
									'darkness',
                                    'smoothness',
                                    'redmond'
								  );

/*
|--------------------------------------------------------------------------
| Encrypt key for SHIN_Encrypt library.
|--------------------------------------------------------------------------
*/
$config['encrypt']['encryption_key'] = "1234567890";

/*
|--------------------------------------------------------------------------
| Standart width for HTML input. Can be override with 2 ways:
| Way #1 - Each application can have config.php and override this parameters for all new application
| Way #2 - Each model for each field can define dom_width index in to hash.
|--------------------------------------------------------------------------
*/
$config['input']['default_form_input_extra'] = 'width:100px;';

/*
|--------------------------------------------------------------------------
| Default icons for each NOT NULL (mandatory fields) Can be override with 2 ways:
| Way #1 - Each application can have config.php and override this parameters for all new application
| Way #2 - Each model for each field who is NOT NULL can define mandatory_ico index in to hash with new values.
|--------------------------------------------------------------------------
*/
$config['input']['default_form_input_info_ico'] = 'images/help.png';

/*
|--------------------------------------------------------------------------
| Info fields processed. Possible values: TRUE/FALSE. If TRUE sight with tooltip appear, if FALSE not.
|--------------------------------------------------------------------------
*/
$config['input']['default_form_input_info_processed'] = TRUE;

/*
|--------------------------------------------------------------------------
| Where is Shin ticket application storing all attached files.
|--------------------------------------------------------------------------
*/
$config['input']['path_for_attached_files'] = 'attachstorer';


/*
|--------------------------------------------------------------------------
| Values for pager. How count objects standart function printSeveralObjects must be displayed
| Each application can override this
|--------------------------------------------------------------------------
*/
$config['input']['item_per_page_values'] = array(5=>5,10=>10,25=>25,50=>50,100=>100);

/*
|--------------------------------------------------------------------------
| Name for smarty variables for "per page" selector
|--------------------------------------------------------------------------
*/
$config['input']['item_selector_template_name'] = 'pager_perpage_selector';

/*
|--------------------------------------------------------------------------
| Wrap or not pager with selector in to html form
|--------------------------------------------------------------------------
*/
$config['input']['wrap_pager_in_form'] = FALSE;

/*
|--------------------------------------------------------------------------
| Wrap or not pager with selector in to html form
|--------------------------------------------------------------------------
*/
$config['input']['selector_pager_delimiter'] = '&nbsp;';


/* End of file config.php */
/* Location: ./config/config.php */
