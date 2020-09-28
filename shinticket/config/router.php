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
$route['shinticket']['default_controller']	    	    = "DefaultController";

$route['shinticket']['main']						    = "DefaultController";
$route['shinticket']['index']                     	    = "DefaultController";

$route['shinticket']['change_language/([a-z]+)']	    = "DefaultController/change_language/$1";
$route['shinticket']['change_theme/([a-z]+)']           = "DefaultController/change_theme/$1";

// routing for TicketController
$route['shinticket']['ticket/new']                      = "TicketController/newTicket";
$route['shinticket']['ticket/list']                     = "TicketController/ticketList";
$route['shinticket']['ticket/save']                     = "TicketController/ticketStore";
$route['shinticket']['ticket/detail-list']              = "TicketController/ticketDetailsList";
$route['shinticket']['ticket/show']                     = "TicketController/showTicket";
$route['shinticket']['ticket/savereply']                = "TicketController/storeReply";
$route['shinticket']['ticket/download']                 = "TicketController/forceDownload";
$route['shinticket']['ticket/ajaxapplicationlist']      = "TicketController/ajaxApplicationAutocomplete";

// routing for AdminController
$route['shinticket']['lists']                           = "AdminController/lists";
$route['shinticket']['lists/customer']                  = "AdminController/customerManage";
$route['shinticket']['lists/customeradd']               = "AdminController/customerAdd";
$route['shinticket']['lists/customerdelete']            = "AdminController/customerDelete";
$route['shinticket']['lists/application']               = "AdminController/applicationManage";
$route['shinticket']['lists/applicationadd']            = "AdminController/applicationAdd";
$route['shinticket']['lists/applicationdelete']         = "AdminController/applicationDelete";
$route['shinticket']['lists/ajaxapplicationlist']       = "AdminController/getCustomerApplicationList";
$route['shinticket']['lists/ajaxsaveapplicationlist']   = "AdminController/saveCustomerApplicationList";
$route['shinticket']['lists/customerapps']              = "AdminController/relationManage";

$route['shinticket']['lists/user']                      = "AdminController/sysUserManage";  
$route['shinticket']['lists/deleteuser']                = "AdminController/deleteUser";  
$route['shinticket']['lists/loadnewuserdata']           = "AdminController/loadUserForm";  
$route['shinticket']['lists/loaduserdata']              = "AdminController/loadUserInfo";  
$route['shinticket']['lists/saveuserinfo']              = "AdminController/saveUserInformation";

$route['shinticket']['lists/menusettingsmanage']        = "AdminController/menuSettingsManage";

/* End of file router.php */
/* Location: ./ppfm/config/router.php */