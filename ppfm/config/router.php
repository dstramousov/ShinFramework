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


/*
| -------------------------------------------------------------------
|  PPFM section.
| -------------------------------------------------------------------
*/
$route['ppfm']['default_controller']	    = "DefaultController";

$route['ppfm']['main']						= "DefaultController";
$route['ppfm']['index']                     = "DefaultController";

$route['ppfm']['login']						= "DefaultController/login";
$route['ppfm']['logout']						= "DefaultController/logout";
$route['ppfm']['start']						= "StartController/index";
$route['ppfm']['trylogin']					= "StartController/trylogin";

$route['ppfm']['main/savePanelState']     = "DefaultController/savePanelState";

$route['ppfm']['registration']			= "RegisterController";
$route['ppfm']['dimas']						= "RegisterController/dimas";
$route['ppfm']['registration/addNewEntry']	= "RegisterController/addNewEntry";
$route['ppfm']['registration/saveEntry']    = "RegisterController/saveEntry";
$route['ppfm']['registration/get']          = "RegisterController/ajaxGetEntry";
$route['ppfm']['registration/update']       = "RegisterController/ajaxUpdateEntry";
$route['ppfm']['registration/delete']       = "RegisterController/ajaxDeleteEntry";
$route['ppfm']['registration/new']          = "RegisterController/ajaxNewEntry";
$route['ppfm']['registration/savenew']      = "RegisterController/ajaxSaveNew";

$route['ppfm']['statistic/categoryYear']            = "StatisticController/categoryYearSummaryReportAction";
$route['ppfm']['statistic/categoryMonthly']         = "StatisticController/categoryMonthlySummaryReportAction";
$route['ppfm']['statistic/categoryYearSituation']   = "StatisticController/categoryYearSituationReportAction";
$route['ppfm']['statistic/categoryMonthSituation']  = "StatisticController/categoryMonthSituationReportAction";
$route['ppfm']['statistic/holderYear']              = "StatisticController/holderYearSummaryReportAction";
$route['ppfm']['statistic/holderMonthly']           = "StatisticController/holderMonthlySummaryReportAction";
$route['ppfm']['statistic/accountYear']             = "StatisticController/accountYearSummaryReportAction";
$route['ppfm']['statistic/accountMonthly']          = "StatisticController/accountMonthlySummaryReportAction";
$route['ppfm']['statistic/accountSituation']	    = "StatisticController/accountSituationReportAction";

$route['ppfm']['todo']                    = "ToDoController";
$route['ppfm']['todo/ajaxEvents']		  = "ToDoController/ajaxEvents";

$route['ppfm']['statistic']				= "StatisticController";

$route['ppfm']['usermanage']            = "UserManageController";
$route['ppfm']['usermanage/delete']            = "UserManageController/ajaxDelete";
$route['ppfm']['usermanage/get']            = "UserManageController/ajaxGet";
$route['ppfm']['usermanage/update']            = "UserManageController/ajaxUpdate";
$route['ppfm']['usermanage/new']            = "UserManageController/ajaxNew";
$route['ppfm']['usermanage/savenew']			= "UserManageController/ajaxSaveNew";

$route['ppfm']['change_language/([a-z]+)']        = "DefaultController/change_language/$1";

$route['ppfm']['change_theme/([a-z]+)']		      = "DefaultController/change_theme/$1";


/* End of file router.php */
/* Location: ./ppfm/config/router.php */