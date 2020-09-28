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
| Define Routes
| -------------------------------------------------------------------
*/
/*
| -------------------------------------------------------------------
|  Default section.
| -------------------------------------------------------------------
*/
$route['default']['default_controller']		            = "DefaultController";
$route['default']['index']					            = "DefaultController";
$route['default']['main']					            = "DefaultController";

$route['default']['error']					            = "ErrorController";

$route['default']['setup']					            = "SetupController";

$route['default']['index']					            = "DefaultController";


$route['default']['error/applistfile']					= "ErrorController/applistfile";


$route['default']['login']					            = "DefaultController/login";
$route['default']['logout']					            = "DefaultController/logout";
$route['default']['start']					            = "StartController/index";
$route['default']['trylogin']                           = "StartController/trylogin";
$route['default']['sysmanage']                          = "SysManageController/index";

$route['default']['usermanage/index']                   = "SysUserManageController/index";
$route['default']['usermanage/delete']                  = "SysUserManageController/delete";
$route['default']['usermanage/create']                  = "SysUserManageController/create";
$route['default']['usermanage/read']                    = "SysUserManageController/read";
$route['default']['usermanage/validate']                = "SysUserManageController/validate";

$route['default']['rolemanage/index']                   = "SysRoleManageController/index";
$route['default']['rolemanage/delete']                  = "SysRoleManageController/delete";
$route['default']['rolemanage/create']                  = "SysRoleManageController/create";
$route['default']['rolemanage/read']                    = "SysRoleManageController/read";  
$route['default']['rolemanage/validate']                = "SysRoleManageController/validate";  

$route['default']['areamanage/index']                   = "SysAreaManageController/index";  
$route['default']['areamanage/delete']                  = "SysAreaManageController/delete";  
$route['default']['areamanage/create']                  = "SysAreaManageController/create";  
$route['default']['areamanage/read']                    = "SysAreaManageController/read";  
$route['default']['areamanage/validate']                = "SysAreaManageController/validate";  

$route['default']['subareamanage/index']                = "SysSubAreaManageController/index";  
$route['default']['subareamanage/delete']               = "SysSubAreaManageController/delete";  
$route['default']['subareamanage/create']               = "SysSubAreaManageController/create";  
$route['default']['subareamanage/read']                 = "SysSubAreaManageController/read";  
$route['default']['subareamanage/validate']             = "SysSubAreaManageController/validate";

$route['default']['applicationmanage/index']            = "SysApplicationManageController/index";
$route['default']['applicationmanage/delete']           = "SysApplicationManageController/delete";
$route['default']['applicationmanage/create']           = "SysApplicationManageController/create";
$route['default']['applicationmanage/read']             = "SysApplicationManageController/read";
$route['default']['applicationmanage/validate']         = "SysApplicationManageController/validate";  
$route['default']['applicationmanage/getsubarealist']   = "SysApplicationManageController/getSubAreaList";
  
$route['default']['policyareamanage/index']             = "PolicyAreaManageController/index";  
$route['default']['policyareamanage/delete']            = "PolicyAreaManageController/delete";  
$route['default']['policyareamanage/create']            = "PolicyAreaManageController/create";  
$route['default']['policyareamanage/read']              = "PolicyAreaManageController/read";  
$route['default']['policyareamanage/validate']          = "PolicyAreaManageController/validate";  

$route['default']['policysubareamanage/index']          = "PolicySubAreaManageController/index";
$route['default']['policysubareamanage/delete']         = "PolicySubAreaManageController/delete";
$route['default']['policysubareamanage/create']         = "PolicySubAreaManageController/create";
$route['default']['policysubareamanage/read']           = "PolicySubAreaManageController/read";
$route['default']['policysubareamanage/validate']       = "PolicySubAreaManageController/validate";
$route['default']['policysubareamanage/getsubarealist'] = "PolicySubAreaManageController/getSubAreaList";
  
$route['default']['policyapplicationmanage/index']      = "PolicyApplicationManageController/index";  
$route['default']['policyapplicationmanage/delete']     = "PolicyApplicationManageController/delete";  
$route['default']['policyapplicationmanage/create']     = "PolicyApplicationManageController/create";  
$route['default']['policyapplicationmanage/read']       = "PolicyApplicationManageController/read";  
$route['default']['policyapplicationmanage/validate']   = "PolicyApplicationManageController/validate";  
$route['default']['policyapplicationmanage/getapplist'] = "PolicyApplicationManageController/getApplicationList";
  
$route['default']['menumanage/index']                   = "SysMenuManageController/index";  
$route['default']['menumanage/delete']                  = "SysMenuManageController/delete";  
$route['default']['menumanage/create']                  = "SysMenuManageController/create";  
$route['default']['menumanage/read']                    = "SysMenuManageController/read";  
$route['default']['menumanage/validate']                = "SysMenuManageController/validate";  
$route['default']['menumanage/upload']                  = "SysMenuManageController/upload";  
$route['default']['menumanage/getpanellist']            = "SysMenuManageController/getPanelList";  

$route['default']['menugrpmanage/index']                = "SysMenuGrpManageController/index";  
$route['default']['menugrpmanage/delete']               = "SysMenuGrpManageController/delete";  
$route['default']['menugrpmanage/create']               = "SysMenuGrpManageController/create";  
$route['default']['menugrpmanage/read']                 = "SysMenuGrpManageController/read";  
$route['default']['menugrpmanage/validate']             = "SysMenuGrpManageController/validate";  
$route['default']['menugrpmanage/upload']               = "SysMenuGrpManageController/upload";  
$route['default']['menugrpmanage/getgrplist']           = "SysMenuGrpManageController/getGrpList";
  
$route['default']['menurowsmanage/index']               = "SysMenuRowsManageController/index";  
$route['default']['menurowsmanage/delete']              = "SysMenuRowsManageController/delete";  
$route['default']['menurowsmanage/create']              = "SysMenuRowsManageController/create";  
$route['default']['menurowsmanage/read']                = "SysMenuRowsManageController/read";  
$route['default']['menurowsmanage/validate']            = "SysMenuRowsManageController/validate";  


$route['default']['menusettingsmanage/index']           = "SysMenuSettingsManageController/index";  
$route['default']['menusettingsmanage/delete']          = "SysMenuSettingsManageController/delete";  
$route['default']['menusettingsmanage/create']          = "SysMenuSettingsManageController/create";  
$route['default']['menusettingsmanage/read']            = "SysMenuSettingsManageController/read";  
$route['default']['menusettingsmanage/validate']        = "SysMenuSettingsManageController/validate";  

$route['default']['logmanage/index']                    = "SysLogManageController/index";  
$route['default']['logmanage/delete']                   = "SysLogManageController/delete";  
$route['default']['logmanage/create']                   = "SysLogManageController/create";  
$route['default']['logmanage/read']                     = "SysLogManageController/read";  
$route['default']['logmanage/validate']                 = "SysLogManageController/validate";  
$route['default']['logmanage/datatabledata']            = "SysLogManageController/getDatatableData";  
$route['default']['logmanage/deleteselected']           = "SysLogManageController/deleteSelected";  
$route['default']['logmanage/deleteall']                = "SysLogManageController/deleteAll";  
$route['default']['logmanage/download']                 = "SysLogManageController/download";  
$route['default']['logmanage/loaddirinfo']              = "SysLogManageController/loadDirInfo";  
 
  
$route['default']['change_language/([a-z]+)']           = "DefaultController/change_language/$1";
$route['default']['change_theme/([a-z]+)']		        = "DefaultController/change_theme/$1";


/* End of file router.php */
/* Location: ./shinfw/config/router.php */