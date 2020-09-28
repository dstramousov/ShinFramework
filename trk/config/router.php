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
$route['enable_query_strings']	= TRUE;
$route['controller_trigger']	= 'c';
$route['function_trigger']		= 'm';
$route['directory_trigger']		= 'd';


// default routing
$route['trk']['default_controller']= "DefaultController";

// --------------------------------------- DEFAULT CONTROLLER ---------------------------------------//
$route['trk']['main']              = "DefaultController";
$route['trk']['search']            = "DefaultController/search";
$route['trk']['showphoto']         = "DefaultController/showPhoto";
$route['trk']['photoinfo']         = "DefaultController/getPhotoInfo";
$route['trk']['setraiting']    	 = "DefaultController/setRaiting";
$route['trk']['login']			 = "DefaultController/login";
$route['trk']['logout']			 = "DefaultController/logout";
$route['trk']['start']			 = "DefaultController/index";
$route['trk']['trylogin']			 = "DefaultController/trylogin";
$route['trk']['joinus']			 = "DefaultController/joinUs";
$route['trk']['successjoin']		 = "DefaultController/successJoin";
$route['trk']['getimages']         = "DefaultController/getImages";
$route['trk']['getcircuitlist']    = "DefaultController/getCircuitList";
$route['trk']['proom']             = "DefaultController/proom";
$route['trk']['download']          = "DefaultController/downloadPicture";  

$route['trk']['forgotpass']        = "DefaultController/forgotPassword";
$route['trk']['forgotpassok']        = "DefaultController/forgotPasswordOk";
$route['trk']['forgotpasserr']        = "DefaultController/forgotPasswordErr";

// --------------------------------------- DEFAULT CONTROLLER ---------------------------------------//

// --------------------------------------- PAGES CONTROLLER ---------------------------------------//
$route['trk']['pages/chisiamo']    = "PagesController/chisiamo"; 
$route['trk']['pages/faq']         = "PagesController/faq"; 
$route['trk']['pages/istruzioni']  = "PagesController/istruzioni"; 
// --------------------------------------- PAGES CONTROLLER ---------------------------------------//


// --------------------------------------- CART CONTROLLER ---------------------------------------//
$route['trk']['cart/addtocart']       = "CartController/addToCart";
$route['trk']['cart/showcart']        = "CartController/showCart";
$route['trk']['cart/sendcart']        = "CartController/sendCart";
$route['trk']['cart/deletefromcart']  = "CartController/deleteFromCart";
// --------------------------------------- CART CONTROLLER ---------------------------------------//


// --------------------------------------- IMAGE CONTROLLER ---------------------------------------//
$route['trk']['image']                    = "ImageController/index";
$route['trk']['image/read']               = "ImageController/read";
$route['trk']['image/create']             = "ImageController/create";
$route['trk']['image/delete']             = "ImageController/delete";
$route['trk']['image/validate']           = "ImageController/validate";
$route['trk']['image/upload']             = "ImageController/upload";
$route['trk']['image/checklimitation']    = "ImageController/checkUploadLimitation";
$route['trk']['image/setfilter']          = "ImageController/setFilter";
$route['trk']['image/resetfilter']        = "ImageController/resetFilter";
// --------------------------------------- IMAGE CONTROLLER ---------------------------------------//

// --------------------------------------- PROFILE CONTROLLER ---------------------------------------//
$route['trk']['profile']           = "ProfileController/index";
$route['trk']['profile/loadinfo']  = "ProfileController/loadInfo";
$route['trk']['profile/saveinfo']  = "ProfileController/saveInfo";
$route['trk']['profile/savepwd']   = "ProfileController/savePass";
$route['trk']['profile/confirm']   = "ProfileController/confirmEmail";
// --------------------------------------- PROFILE CONTROLLER ---------------------------------------//

// --------------------------------------- TOOLS CONTROLLER ---------------------------------------//
$route['trk']['tools']               = "ToolsController/index";
$route['trk']['tools/setstatus']     = "ToolsController/setStatus";
$route['trk']['tools/setstatuswm']   = "ToolsController/setStatusWM";
$route['trk']['tools/wtupload']      = "ToolsController/uploadWatermark";
$route['trk']['tools/savewt']        = "ToolsController/saveWt";
$route['trk']['tools/saveposition']  = "ToolsController/savePosition";
$route['trk']['tools/setphotoaction']= "ToolsController/setPhotoAction";
$route['trk']['tools/getwtimagelink']= "ToolsController/getWtImgLink";

// --------------------------------------- TOOLS CONTROLLER ---------------------------------------//


// --------------------------------------- ADMIN CONTROLLER ---------------------------------------//
$route['trk']['fadmin']            = "AdminController";
// --------------------------------------- ADMIN CONTROLLER ---------------------------------------//


// --------------------------------------- USER CONTROLLER ---------------------------------------//
$route['trk']['user/index']	     = "UserController/index";
$route['trk']['user/create']       = "UserController/create";
$route['trk']['user/read']         = "UserController/read";
$route['trk']['user/delete']       = "UserController/delete";
$route['trk']['user/validate']     = "UserController/validate";
$route['trk']['user/upload']       = "UserController/upload";
// --------------------------------------- USER CONTROLLER ---------------------------------------//

// --------------------------------------- STATISTIC CONTROLLER ---------------------------------------//
$route['trk']['statistic/index']       = "StatisticController/index";
$route['trk']['statistic/usersstat']   = "StatisticController/usersStat";
$route['trk']['statistic/fetchdata']   = "StatisticController/fetchData";
// --------------------------------------- STATISTIC CONTROLLER ---------------------------------------//

// --------------------------------------- ADMINIMAGE CONTROLLER ---------------------------------------//
$route['trk']['adminimage/index']              = "AdminImageController/index";
$route['trk']['adminimage/read']               = "AdminImageController/read";
$route['trk']['adminimage/create']             = "AdminImageController/create";
$route['trk']['adminimage/delete']             = "AdminImageController/delete";
$route['trk']['adminimage/validate']           = "AdminImageController/validate";
$route['trk']['adminimage/setuser']            = "AdminImageController/setUser";
$route['trk']['adminimage/setfilter']          = "AdminImageController/setFilter";
$route['trk']['adminimage/resetfilter']        = "AdminImageController/resetFilter";
$route['trk']['adminimage/setstatus']          = "AdminImageController/setStatus";
// --------------------------------------- ADMINIMAGE CONTROLLER ---------------------------------------//

// --------------------------------------- ADMINIMAGE CONTROLLER ---------------------------------------//
$route['trk']['adminevent/index']              = "AdminEventController/index";
$route['trk']['adminevent/getimgcount']        = "AdminEventController/getImgCount";
$route['trk']['adminevent/upload']             = "AdminEventController/upload";
$route['trk']['admineventcontroller/read']             = "AdminEventController/read";
$route['trk']['admineventcontroller/getimgcount']             = "AdminEventController/getImgCount";
$route['trk']['admineventcontroller/delete']             = "AdminEventController/delete";
$route['trk']['admineventcontroller/validate']             = "AdminEventController/validate";
$route['trk']['admineventcontroller/create']             = "AdminEventController/create";
// --------------------------------------- ADMINIMAGE CONTROLLER ---------------------------------------//


$route['trk']['change_language/([a-z]+)']      = "DefaultController/change_language/$1";


$route['trk']['tryrestorepass'] = "DefaultController/tryRestorePass";
$route['trk']['tryjoin']        = "DefaultController/tryJoin";


// --------------------------------------- Viewer CONTROLLER ---------------------------------------//
$route['trk']['vroom']            = "ViewerController";
$route['trk']['vroom/save']       = "ViewerController/saveProfile";
// --------------------------------------- Viewer CONTROLLER ---------------------------------------//


/* End of file router.php */
/* Location: ./trk/config/router.php */
