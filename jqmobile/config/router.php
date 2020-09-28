<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Enable Query Strings
|--------------------------------------------------------------------------
|
| By default CodeIgniter uses search-engine friendly segment based URLs:
| example.com/who/what/where/
|
| You can optionally enable standard query string based URLs:
| example.com?who=me&what=something&where=here
|
| Options are: TRUE or FALSE (boolean)
|
| The other items let you set the query string "words" that will
| invoke your controllers and its functions:
| example.com/index.php?c=controller&m=function
|
| Please note that some of the helpers won't work as expected when
| this feature is enabled, since CodeIgniter is designed primarily to
| use segment based URLs.
|
*/
$route['enable_query_strings']	= FALSE;
$route['controller_trigger']	= 'c';
$route['function_trigger']		= 'm';
$route['directory_trigger']		= 'd';


// default routing
$route['jqmobile']['default_controller']	    	= "DefaultController";
$route['jqmobile']['main']                          = "DefaultController/index";

$route['jqmobile']['table']                         = "ExampleController/index";
$route['jqmobile']['add']                           = "ExampleController/addCustomer";

$route['jqmobile']['example/read']                  = "ExampleController/read";
$route['jqmobile']['example/validate']              = "ExampleController/validate";
$route['jqmobile']['example/create']                = "ExampleController/create";
$route['jqmobile']['example/delete']                = "ExampleController/delete";

$route['jqmobile']['map']	                        = "ExampleController/map";

/* End of file router.php */
/* Location: ./ppfm/config/router.php */