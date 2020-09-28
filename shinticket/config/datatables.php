<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Dialog config file with default values
| -------------------------------------------------------------------
| All documentation you can find there http://www.datatables.net/examples/
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$datatable_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                             SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/datatables/jquery.dataTables.js');

$datatable_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                                 SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/datatables/jquery.dataTables.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$datatable_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css', 
                              SHIN_Core::get_theme_url_path().'/css/datatables/demo_table_jui.css');

/*
| -------------------------------------------------------------------
| Enable or disable pagination. 
| -------------------------------------------------------------------
*/
$datatable['bPaginate'] = "true";

/*
| -------------------------------------------------------------------
| Allows the end user to select the size of a formatted page from a select menu 
| (sizes are 10, 25, 50 and 100). Requires pagination (bPaginate). 
| -------------------------------------------------------------------
*/
$datatable['bLengthChange'] = "true";


/*
| -------------------------------------------------------------------
| Enable jQuery UI ThemeRoller support (required as ThemeRoller requires some slightly different and 
| additional mark-up from what DataTables has traditionally used). 
| -------------------------------------------------------------------
*/
$datatable['bJQueryUI'] = "true";

/*
| -------------------------------------------------------------------
| Enable or disable filtering of data. Note that filtering in DataTables is smart in that it 
| allows the end user to input multiple words (space separated) and will match a row containing 
| those words, even if not in the order that was specified (this allow matching across multiple columns). 
| -------------------------------------------------------------------
*/
$datatable['bFilter'] = "true";


/*
| -------------------------------------------------------------------
| Enable or disable sorting of columns. Sorting of individual columns can be disabled by the "bSortable" option for each column. 
| -------------------------------------------------------------------
*/
$datatable['bSort'] = "true";


/*
| -------------------------------------------------------------------
| Enable or disable the table information display. This shows information about the data 
| that is currently visible on the page, including information about filtered data if that action is being performed. 
| -------------------------------------------------------------------
*/
$datatable['bInfo'] = "true";


/*
| -------------------------------------------------------------------
| Enable or disable automatic column width calculation. This can be disabled as an optimisation 
| (it takes some time to calculate the widths) if the tables widths are passed in using aoColumns. 
| -------------------------------------------------------------------
*/
$datatable['bAutoWidth'] = "false";

/*
| -------------------------------------------------------------------
| Enable or disable the display of a 'processing' indicator when the table is being processed (e.g. a sort). 
| This is particularly useful for tables with large amounts of data where it can take a noticeable amount of time to sort the entries. 
| -------------------------------------------------------------------
*/
$datatable['bProcessing'] = "'disable'";

/*
| -------------------------------------------------------------------
| Enable or Disable for server side prcessing.  ?????  not find in to documentation.
| -------------------------------------------------------------------
*/
$datatable['bServerSide'] = "false";

/*
| -------------------------------------------------------------------
| Enable or disable the addition of the classes 'sorting_1', 'sorting_2' and 'sorting_3' to the columns which are 
| currently being sorted on. This is presented as a feature switch as it can increase processing time 
| (while classes are removed and added) so for large data sets you might want to turn this off.
| -------------------------------------------------------------------
*/
$datatable['bSortClasses'] = "false";

/*
| -------------------------------------------------------------------
| Enable or disable state saving. When enabled a cookie will be used to save table display information such as pagination 
| information, display length, filtering and sorting. As such when the end user reloads the page the display 
| display will match what thy had previously set up.
| -------------------------------------------------------------------
*/
$datatable['bStateSave'] = "false";

/*
| -------------------------------------------------------------------
| If sorting is enabled, then DataTables will perform a first pass sort on initialisation. 
| You can define which column(s) the sort is performed upon, and the sorting direction, with this variable. 
| The aaSorting array should contain an array for each column to be sorted initially containing the column's 
| index and a direction string ('asc' or 'desc').
| -------------------------------------------------------------------
*/
$datatable['aaSorting'] = "[[0,'asc']]";

/*
| -------------------------------------------------------------------
| This parameter is basically identical to the aaSorting parameter, but cannot be overridden by user 
| interaction with the table. What this means is that you could have a column (visible or hidden) which 
| the sorting will always be forced on first - any sorting after that (from the user) will then be 
| performed as required. This can be useful for grouping rows together.
| -------------------------------------------------------------------
*/
$datatable['aaSortingFixed'] = "null";

/*
| -------------------------------------------------------------------
| Basically the same as oSearch, this parameter defines the individual column filtering state at initialisation time. 
| The array must be of the same size as the number of columns, and each element be an object with the parameters "sSearch" 
| and "bEscapeRegex" (the latter is optional). 'null' is also accepted and the default will be used.
| -------------------------------------------------------------------
*/
//$datatable['aoSearchCols'] = NULL;

/*
| -------------------------------------------------------------------
| An array of CSS classes that should be applied to displayed rows. This array may be of any length, and DataTables 
| will apply each class sequentially, looping when required.
| -------------------------------------------------------------------
*/
$datatable['asStripClasses'] = "['odd', 'even']";

/*
| -------------------------------------------------------------------
| Duration of the cookie which is used for storing session information. This value is given in seconds.   7200 ~ 2 hours
| -------------------------------------------------------------------
*/
$datatable['iCookieDuration'] = 7200;

/*
| -------------------------------------------------------------------
| Number of rows to display on a single page when using pagination. If feature enabled (bLengthChange) then the end user 
| will be able to over-ride this to a custom setting using a pop-up menu.
| -------------------------------------------------------------------
*/
$datatable['iDisplayLength'] = 10;

/*
| -------------------------------------------------------------------
| Define the starting point for data display when using DataTables with pagination. Note that this parameter is 
| the number of records, rather than the page number, so if you have 10 records 
| per page and want to start on the third page, it should be "20".
| -------------------------------------------------------------------
*/
$datatable['iDisplayStart'] = 0;

/*
| -------------------------------------------------------------------
| This parameter allows you to have define the global filtering state at initialisation time. 
| As an object the "sSearch" parameter must be defined, but the "bEscapeRegex" option is optional (default true).
| -------------------------------------------------------------------
*/
$datatable['oSearch'] = '{ "sSearch": "", "bEscapeRegex": true }';

/*
| -------------------------------------------------------------------
| You can instruct DataTables to load data from an external source using this parameter (use aData if you want to pass data in you already have). 
| Simply provide a url a JSON object can be obtained from. This object must include the parameter 'aaData' which is a 2D array with the source data.
| -------------------------------------------------------------------
*/

$datatable['sAjaxSource'] = "'".SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/connectors/SHIN_Connector.php'."'";
/*
| -------------------------------------------------------------------
| This initialisation variable allows you to specify exactly where in the DOM you want DataTables to inject the various controls it adds to the page (for example you might want the pagination controls at the top of the table). DIV elements (with or without a custom class) can also be added to aid styling. The follow syntax is used:

    * The following options are allowed:
          o 'l' - Length changing
          o 'f' - Filtering input
          o 't' - The table!
          o 'i' - Information
          o 'p' - Pagination
          o 'r' - pRocessing
    * The following constants are allowed:
          o 'H' - jQueryUI theme "header" classes ('fg-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix')
          o 'F' - jQueryUI theme "footer" classes ('fg-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix')
    * The following syntax is expected:
          o '<' and '>' - div elements
          o '<"class" and '>' - div with a class
    * Examples:
          o '<"wrapper"flipt>', 'ip>'

| -------------------------------------------------------------------
*/
//$datatable['sDom'] = "'lfrtip'";

/*
| -------------------------------------------------------------------
| DataTables features two different built-in pagination interaction methods ('two_button' or 'full_numbers') which present 
| different page controls to the end user. Further methods can be added using the API (see below).
| -------------------------------------------------------------------
*/
$datatable['sPaginationType'] = "'full_numbers'";

/*
| -------------------------------------------------------------------
| When this parameter is set to true, the table size will 'collapse' down to match the number of rows, if the table height 
| is smaller than the scrollable area.
| -------------------------------------------------------------------
*/
$datatable['bScrollCollapse'] = "false";

?>
