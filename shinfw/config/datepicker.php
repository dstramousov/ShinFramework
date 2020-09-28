<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DatePicker config file with default values
| -------------------------------------------------------------------
| All documentation you can find there http://jqueryui.com/demos/datepicker/
*/

/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$datepicker_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.js');

$datepicker_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                                  SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$datepicker_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css');


/*
| -------------------------------------------------------------------
|  
| Disables (true) or enables (false) the datepicker. Can be set when initialising (first creating) the datepicker. 
|  
| -------------------------------------------------------------------
*/
$datepicker['disabled'] = 'false';


/*
| -------------------------------------------------------------------
|  
| The jQuery selector for another field that is to be updated with the selected date from the datepicker. 
| Use the altFormat setting to change the format of the date within this field. Leave as blank for no alternate field. 
|  
| -------------------------------------------------------------------
*/
$datepicker['altField'] = "''";


/*
| -------------------------------------------------------------------
|  
| The dateFormat to be used for the altField option. 
| This allows one date format to be shown to the user for selection purposes, while a different format is 
| actually sent behind the scenes. For a full list of the possible formats see the formatDate function 
|  
| -------------------------------------------------------------------
*/
$datepicker['altFormat'] = "''";


/*
| -------------------------------------------------------------------
|  
| The text to display after each date field, e.g. to show the required format. 
|  
| -------------------------------------------------------------------
*/
$datepicker['appendText'] = "''";


/*
| -------------------------------------------------------------------
|  
| Set to true to automatically resize the input field to accomodate dates in the current dateFormat. 
|  
| -------------------------------------------------------------------
*/
$datepicker['autoSize'] = 'false';


/*
| -------------------------------------------------------------------
|  
| The URL for the popup button image. If set, buttonText becomes the alt value and is not directly displayed. 
|  
| -------------------------------------------------------------------
*/
$datepicker['buttonImage'] = '"' . SHIN_Core::get_theme_url_path() . '/css/datepicker/images/calendar.gif"';


/*
| -------------------------------------------------------------------
|  
| Set to true to place an image after the field to use as the trigger without it appearing on a button. 
|  
| -------------------------------------------------------------------
*/
$datepicker['buttonImageOnly'] = 'false';


/*
| -------------------------------------------------------------------
|  
| The text to display on the trigger button. Use in conjunction with showOn equal to 'button' or 'both'. 
|  
| -------------------------------------------------------------------
*/
$datepicker['buttonText'] = "'Press here'";


/*
| -------------------------------------------------------------------
|  
| A function to calculate the week of the year for a given date. 
| The default implementation uses the ISO 8601 definition: weeks start on a Monday; 
| the first week of the year contains the first Thursday of the year. This is a function.
|  
| -------------------------------------------------------------------
*/
//$datepicker['calculateWeek'] = "'$.datepicker.iso8601Week'";


/*
| -------------------------------------------------------------------
|  
| Allows you to change the month by selecting from a drop-down list. 
| You can enable this feature by setting the attribute to true. 
|  
| -------------------------------------------------------------------
*/
$datepicker['changeMonth'] = 'true';


/*
| -------------------------------------------------------------------
|  
| Allows you to change the year by selecting from a drop-down list. 
| You can enable this feature by setting the attribute to true. 
|  
| -------------------------------------------------------------------
*/
$datepicker['changeYear'] = 'true';


/*
| -------------------------------------------------------------------
|  
| The text to display for the close link. This attribute is one of the regionalisation attributes. 
| Use the showButtonPanel to display this button. 
|  
| -------------------------------------------------------------------
*/
$datepicker['closeText'] = "'Done'";


/*
| -------------------------------------------------------------------
|  
| When true entry in the input field is constrained to those characters allowed by the current dateFormat. 
|  
| -------------------------------------------------------------------
*/
$datepicker['constrainInput'] = 'true';


/*
| -------------------------------------------------------------------
|  
| The text to display for the current day link. This attribute is one of the regionalisation attributes. 
| Use the showButtonPanel to display this button. 
|  
| -------------------------------------------------------------------
*/
$datepicker['currentText'] = "'Today'";


/*
| -------------------------------------------------------------------
|  
| The format for parsed and displayed dates. This attribute is one of the regionalisation attributes. 
| For a full list of the possible formats see the formatDate function. 
|  
| -------------------------------------------------------------------
*/
$datepicker['dateFormat'] = "'Y/m/d'";


/*
| -------------------------------------------------------------------
|  
| The list of long day names, starting from Sunday, for use as requested via the dateFormat setting. 
| They also appear as popup hints when hovering over the corresponding column headings. 
| This attribute is one of the regionalisation attributes.  ????????????????????
|  
| -------------------------------------------------------------------
*/
$datepicker['dayNames'] = "''";


/*
| -------------------------------------------------------------------
|  
| The list of minimised day names, starting from Sunday, for use as column headers within the datepicker. 
| This attribute is one of the regionalisation attributes. ???????????????????
|  
| -------------------------------------------------------------------
*/
$datepicker['datyNamesMin'] = "''";


/*
| -------------------------------------------------------------------
|  
| The list of abbreviated day names, starting from Sunday, for use as requested via the dateFormat setting. This attribute is one of the regionalisation attributes. 
|  
| -------------------------------------------------------------------
*/
$datepicker['dayNamesShort'] = "''";


/*
| -------------------------------------------------------------------
|  
| Set the date to highlight on first opening if the field is blank. 
| Specify either an actual date via a Date object or as a string in the current dateFormat, 
| or a number of days from today (e.g. +7) or a string of values and 
| periods ('y' for years, 'm' for months, 'w' for weeks, 'd' for days, e.g. '+1m +7d'), or null for today. 
|  
| -------------------------------------------------------------------
*/
//$datepicker['defaultDate'] = "'null'";


/*
| -------------------------------------------------------------------
|  
| Control the speed at which the datepicker appears, it may be a time in milliseconds or a 
| string representing one of the three predefined speeds ("slow", "normal", "fast"). 
|  
| -------------------------------------------------------------------
*/
//$datepicker['duration'] = "'normal'";


/*
| -------------------------------------------------------------------
|  
| Set the first day of the week: Sunday is 0, Monday is 1, ... This attribute is one of the regionalisation attributes. 
|  
| -------------------------------------------------------------------
*/
$datepicker['firstDay'] = 0;


/*
| -------------------------------------------------------------------
|  
| When true the current day link moves to the currently selected date instead of today. 
|  
| -------------------------------------------------------------------
*/
$datepicker['gotoCurrent'] = 'false';


/*
| -------------------------------------------------------------------
|  
| Normally the previous and next links are disabled when not applicable (see minDate/maxDate). 
| You can hide them altogether by setting this attribute to true. 
|  
| -------------------------------------------------------------------
*/
$datepicker['hideIfNoPrevNext'] = 'false';


/*
| -------------------------------------------------------------------
|  
| True if the current language is drawn from right to left. This attribute is one of the regionalisation attributes. 
|  
| -------------------------------------------------------------------
*/
//$datepicker['isRTL'] = 'false';


/*
| -------------------------------------------------------------------
|  
| Set a maximum selectable date via a Date object or as a string in the current dateFormat, 
| or a number of days from today (e.g. +7) or a string of values and 
| periods ('y' for years, 'm' for months, 'w' for weeks, 'd' for days, e.g. '+1m +1w'), or null for no limit. 
|  
| -------------------------------------------------------------------
*/
$datepicker['maxDate'] = "null";


/*
| -------------------------------------------------------------------
|  
| Set a minimum selectable date via a Date object or as a string in the 
| current dateFormat, or a number of days from today (e.g. +7) or a string 
| of values and periods ('y' for years, 'm' for months,
| 'w' for weeks, 'd' for days, e.g. '-1y -1m'), or null for no limit. 
|  
| -------------------------------------------------------------------
*/
$datepicker['minDate'] = "null";


/*
| -------------------------------------------------------------------
|  
| The list of full month names, as used in the month header on each datepicker and as requested via the dateFormat setting. 
| This attribute is one of the regionalisation attributes.  ????????????????
|  
| -------------------------------------------------------------------
*/
//$datepicker['monthNames'] = "''";


/*
| -------------------------------------------------------------------
|  
| The list of abbreviated month names, for use as requested via the dateFormat setting. 
| This attribute is one of the regionalisation attributes. ?????????
|  
| -------------------------------------------------------------------
*/
//$datepicker['monthNamesShort'] = "''";


/*
| -------------------------------------------------------------------
|  
| When true the formatDate function is applied to the prevText, nextText, and 
| currentText values before display, allowing them to display the target month names for example. 
|  
| -------------------------------------------------------------------
*/
$datepicker['navigationAsDateFormat'] = 'false';


/*
| -------------------------------------------------------------------
|  
| The text to display for the next month link. This attribute is one of the regionalisation attributes. 
| With the standard ThemeRoller styling, this value is replaced by an icon. 
| ??? 
|  
| -------------------------------------------------------------------
*/
$datepicker['nextText'] = "'Next'";


/*
| -------------------------------------------------------------------
|  
| Set how many months to show at once. The value can be a straight integer, or can be a two-element array 
| to define the number of rows and columns to display. 
|  
| -------------------------------------------------------------------
*/
$datepicker['numberOfMonth'] = 1;


/*
| -------------------------------------------------------------------
|  
| The text to display for the previous month link. This attribute is one of the regionalisation attributes. 
| With the standard ThemeRoller styling, this value is replaced by an icon. ??????
|  
| -------------------------------------------------------------------
*/
$datepicker['prevText'] = "'Prev'";


/*
| -------------------------------------------------------------------
|  
| When true days in other months shown before or after the 
| current month are selectable. This only applies if showOtherMonths is also true. 
|  
| -------------------------------------------------------------------
*/
$datepicker['selectOtherMonths'] = 'false';


/*
| -------------------------------------------------------------------
|
| Set the cutoff year for determining the century for a date (used in conjunction with dateFormat 'y'). 
| If a numeric value (0-99) is provided then this value is used directly. 
| If a string value is provided then it is converted to a number and added to the current year. 
| Once the cutoff year is calculated, any dates entered with a year value less than or 
| equal to it are considered to be in the current century, while those greater than 
| it are deemed to be in the previous century. 
|  
| -------------------------------------------------------------------
*/
$datepicker['shortYearCutoff'] = "'+10'";


/*
| -------------------------------------------------------------------
|  
| Set the name of the animation used to show/hide the datepicker. Use 'show' (the default), 'slideDown', 'fadeIn', 
| any of the show/hide jQuery UI effects, or '' for no animation. 
|  
| -------------------------------------------------------------------
*/
$datepicker['showAnim'] = "'show'";


/*
| -------------------------------------------------------------------
|  
| Whether to show the button panel. 
|  
| -------------------------------------------------------------------
*/
$datepicker['showButtonPannel'] = 'false';


/*
| -------------------------------------------------------------------
|  
| Specify where in a multi-month display the current month shows, starting from 0 at the top/left. 
|  
| -------------------------------------------------------------------
*/
$datepicker['showCurrentAtPos'] = 0;


/*
| -------------------------------------------------------------------
|  
| Whether to show the month after the year in the header. 
|  
| -------------------------------------------------------------------
*/
$datepicker['showMonthAfterYear'] = 'false';


/*
| -------------------------------------------------------------------
|  
| Have the datepicker appear automatically when the field receives focus ('focus'), appear 
| only when a button is clicked ('button'), or appear when either event takes place ('both'). 
|  
| -------------------------------------------------------------------
*/
$datepicker['showOn'] = "'focus'";


/*
| -------------------------------------------------------------------
|  
| If using one of the jQuery UI effects for showAnim, you can provide additional settings for that animation via this option. 
|  
| -------------------------------------------------------------------
*/
$datepicker['showOptions'] = "'{}'";


/*
| -------------------------------------------------------------------
|  
| Display dates in other months (non-selectable) at the start or end of the current month. To make these days selectable use selectOtherMonths. 
|  
| -------------------------------------------------------------------
*/
$datepicker['showOtherMonths'] = 'false';


/*
| -------------------------------------------------------------------
|  
| When true a column is added to show the week of the year. The calculateWeek option determines how the week of the year is calculated. You may also want to change the firstDay option. 
|  
| -------------------------------------------------------------------
*/
$datepicker['showWeek'] = 'false';


/*
| -------------------------------------------------------------------
|  
| Set how many months to move when clicking the Previous/Next links. 
|  
| -------------------------------------------------------------------
*/
$datepicker['stepMonths'] = 1;


/*
| -------------------------------------------------------------------
|  
| The text to display for the week of the year column heading. This attribute is one of the 
| regionalisation attributes. Use showWeek to display this column. 
|  
| -------------------------------------------------------------------
*/
$datepicker['weekHeader'] = "'Wk'";


/*
| -------------------------------------------------------------------
|  
| Control the range of years displayed in the year drop-down: either relative to today's year (-nn:+nn), relative to the 
| currently selected year (c-nn:c+nn), absolute (nnnn:nnnn), or combinations of these formats (nnnn:-nn). 
|  
| -------------------------------------------------------------------
*/
$datepicker['yearRange'] = "'c-10:c+10'";


/*
| -------------------------------------------------------------------
|  
| Additional text to display after the year in the month headers. This attribute is one of the regionalisation attributes. 
|  
| -------------------------------------------------------------------
*/
$datepicker['yearSuffix'] = "''";
