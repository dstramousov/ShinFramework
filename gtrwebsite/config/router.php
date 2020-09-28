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
$route['gtrwebsite']['default_controller']	    	    = "DefaultController";

$route['gtrwebsite']['main']						    = "DefaultController";
$route['gtrwebsite']['index']                     	    = "DefaultController";

$route['gtrwebsite']['change_language/([a-z]+)']	    = "DefaultController/change_language/$1";
$route['gtrwebsite']['change_theme/([a-z]+)']           = "DefaultController/change_theme/$1";


$route['gtrwebsite']['news/index']                      = "NewsController/index";
$route['gtrwebsite']['news/create']                     = "NewsController/create";
$route['gtrwebsite']['news/read']                       = "NewsController/read";
$route['gtrwebsite']['news/update']                     = "NewsController/update";
$route['gtrwebsite']['news/delete']                     = "NewsController/delete";
$route['gtrwebsite']['news/validate']                   = "NewsController/validate";
$route['gtrwebsite']['news/upload']                     = "NewsController/upload";

$route['gtrwebsite']['partner/index']                   = "PartnerController/index";
$route['gtrwebsite']['partner/create']                  = "PartnerController/create";
$route['gtrwebsite']['partner/read']                    = "PartnerController/read";
$route['gtrwebsite']['partner/update']                  = "PartnerController/update";
$route['gtrwebsite']['partner/delete']                  = "PartnerController/delete";
$route['gtrwebsite']['partner/validate']                = "PartnerController/validate";
$route['gtrwebsite']['partner/upload']                  = "PartnerController/upload";

$route['gtrwebsite']['manage']                          = "ManagmentController/index";

$route['gtrwebsite']['categorymanagment/index']         = "CategoryManagmentController/index";
$route['gtrwebsite']['categorymanagment/create']        = "CategoryManagmentController/create";
$route['gtrwebsite']['categorymanagment/read']          = "CategoryManagmentController/read";
$route['gtrwebsite']['categorymanagment/delete']        = "CategoryManagmentController/delete";
$route['gtrwebsite']['categorymanagment/validate']      = "CategoryManagmentController/validate";

$route['gtrwebsite']['itemmanagment/index']             = "ItemManagmentController/index";
$route['gtrwebsite']['itemmanagment/create']            = "ItemManagmentController/create";
$route['gtrwebsite']['itemmanagment/read']              = "ItemManagmentController/read";
$route['gtrwebsite']['itemmanagment/delete']            = "ItemManagmentController/delete";
$route['gtrwebsite']['itemmanagment/validate']          = "ItemManagmentController/validate";
$route['gtrwebsite']['itemmanagment/upload']            = "ItemManagmentController/upload";

$route['gtrwebsite']['solutionmanagment/index']         = "SolutionManagmentController/index";
$route['gtrwebsite']['solutionmanagment/create']        = "SolutionManagmentController/create";
$route['gtrwebsite']['solutionmanagment/read']          = "SolutionManagmentController/read";
$route['gtrwebsite']['solutionmanagment/update']        = "SolutionManagmentController/update";
$route['gtrwebsite']['solutionmanagment/delete']        = "SolutionManagmentController/delete";
$route['gtrwebsite']['solutionmanagment/validate']      = "SolutionManagmentController/validate";
$route['gtrwebsite']['solutionmanagment/count']         = "SolutionManagmentController/countItems";
$route['gtrwebsite']['solutionmanagment/upload']        = "SolutionManagmentController/upload";

$route['gtrwebsite']['solutionitemmanagment/index']     = "SolutionItemManagmentController/index";
$route['gtrwebsite']['solutionitemmanagment/create']    = "SolutionItemManagmentController/create";
$route['gtrwebsite']['solutionitemmanagment/read']      = "SolutionItemManagmentController/read";
$route['gtrwebsite']['solutionitemmanagment/update']    = "SolutionItemManagmentController/update";
$route['gtrwebsite']['solutionitemmanagment/delete']    = "SolutionItemManagmentController/delete";
$route['gtrwebsite']['solutionitemmanagment/validate']  = "SolutionItemManagmentController/validate";
$route['gtrwebsite']['solutionitemmanagment/count']     = "SolutionItemManagmentController/countItems";

$route['gtrwebsite']['treemanagment/index']		        = "TreeManagmentController/index";
$route['gtrwebsite']['treemanagment/getqa']		        = "TreeManagmentController/getQAInformation";

$route['gtrwebsite']['treemanagment/movenode']          = "TreeManagmentController/movenode";
$route['gtrwebsite']['treemanagment/delete']            = "TreeManagmentController/delete";
$route['gtrwebsite']['treemanagment/create']            = "TreeManagmentController/create";
$route['gtrwebsite']['treemanagment/validatea']         = "TreeManagmentController/validateAnswer";
$route['gtrwebsite']['treemanagment/validateq']         = "TreeManagmentController/validateQuestion";
$route['gtrwebsite']['treemanagment/uploada']           = "TreeManagmentController/uploadAnswerImg";
$route['gtrwebsite']['treemanagment/uploadq']           = "TreeManagmentController/uploadQuestionImg";
$route['gtrwebsite']['treemanagment/createa']           = "TreeManagmentController/saveAnswer";
$route['gtrwebsite']['treemanagment/createq']           = "TreeManagmentController/saveQuestion";
$route['gtrwebsite']['treemanagment/loadtree']          = "TreeManagmentController/loadTree";

$route['gtrwebsite']['webapi-html']                     = "FrontEndController/index";
$route['gtrwebsite']['webapi-html/click']               = "FrontEndController/click";
$route['gtrwebsite']['webapi-html/getpartners']         = "FrontEndController/getpartners";
$route['gtrwebsite']['webapi-html/getnews']             = "FrontEndController/getnews";

$route['gtrwebsite']['webapi-json']                     = "FrontEndController2/index";
$route['gtrwebsite']['webapi-json/click']          	    = "FrontEndController2/click";
$route['gtrwebsite']['getpartners']                     = "FrontEndController2/getpartners";
$route['gtrwebsite']['getnews']                         = "FrontEndController2/getnews";

$route['gtrwebsite']['contact/save']                    = "ContactController/save";
$route['gtrwebsite']['contact/index']                   = "ContactController/index";
$route['gtrwebsite']['contact/read']                    = "ContactController/read";
$route['gtrwebsite']['contact/test']              	    = "ContactController/test";

$route['gtrwebsite']['solutionfinder']                  = "SFController/index";
$route['gtrwebsite']['solutionfinder/index']            = "SFController/index";
$route['gtrwebsite']['solutionfinder/getc']             = "SFController/getc";
$route['gtrwebsite']['solutionfinder/getp']             = "SFController/getp";
$route['gtrwebsite']['solutionfinder/gets']             = "SFController/gets";
$route['gtrwebsite']['solutionfinder/click']            = "SFController/click"; 

$route['gtrwebsite']['solutionfinder2']            		= "SFController2/index";
$route['gtrwebsite']['solutionfinder2/index']           = "SFController2/index";
$route['gtrwebsite']['solutionfinder2/getc']            = "SFController2/getc";
$route['gtrwebsite']['solutionfinder2/getp']            = "SFController2/getp";
$route['gtrwebsite']['solutionfinder2/gets']            = "SFController2/gets";
$route['gtrwebsite']['solutionfinder2/getr']            = "SFController2/getr";
$route['gtrwebsite']['solutionfinder2/click']           = "SFController2/click";

/* End of file router.php */
/* Location: ./gtrwebsite/config/router.php */
