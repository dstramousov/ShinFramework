<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Calculator config file with default values
| -------------------------------------------------------------------
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$calculator_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js',
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/calculator/jquery.calculator.js');


$calculator_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js',
                                  SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/calculator/jquery.calculator.min.js');

/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/

$calculator_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/calculator/jquery.calculator.css',
                               SHIN_Core::get_theme_url_path().'/css/calculator/jquery.calculator.alt.css');

/*
| -------------------------------------------------------------------
| Control when the calculator is displayed: 'focus' for only on focus of the text field, 'button' for only on 
| clicking the trigger button, 'both' for either focus or the button, 'operator' for only when a non-numeric 
| character is entered, or 'opbutton' for either non-numeric entry or a button. 
| -------------------------------------------------------------------
*/
$calculator['showOn'] = "'focus'";

/*
| -------------------------------------------------------------------
| The URL of an image to use for the trigger button. 
| -------------------------------------------------------------------
*/
$calculator['buttonImage'] = "''";

/*
| -------------------------------------------------------------------
| Set to true to indicate that the trigger image should appear by itself and not on a button. 
| -------------------------------------------------------------------
*/
$calculator['buttonImageOnly'] = "false";

/*
| -------------------------------------------------------------------
| A callback function to determine whether or not an entered character should trigger display of 
| the calculator in 'operator' or 'opbutton' modes. The function is passed the character being typed, 
| the corresponding key event, the current value of the input field, the current number base, and the 
| current decimal character. By default any non-numeric character is a trigger. The example below only 
| triggers on the basic maths operators 
| -------------------------------------------------------------------
*/
$calculator['isOperator'] = "null";

/*
| -------------------------------------------------------------------
| Set the layout of the calculator by defining the keys present on each row. Use the two-character codes  
| for each of the keys, or their equivalent constants. 
| -------------------------------------------------------------------
*/
$calculator['layout'] = "";

/*
| -------------------------------------------------------------------
| One popup calculator is shared by all instances, so this setting allows you to apply different CSS styling 
| by adding an extra class to the calculator for each instance. 
| -------------------------------------------------------------------
*/
$calculator['calculatorClass'] = "null";

/*
| -------------------------------------------------------------------
| A function that is called before a popup calculator is opened. The function receives the current field value 
| and the calculator instance object as parameters, while this refers to the text field. The field value can 
| be altered and will be used in the calculator. Usually this function would be used in conjunction with the onClose event. 
| -------------------------------------------------------------------
*/
$calculator['onOpen'] = "null";

/*
| -------------------------------------------------------------------
| A function that is called when a button is activated on the calculator. The function receives the button label, the 
| current value, and the calculator instance object as parameters, while this refers to the text field. Of course, you 
| can still have an onchange handler for the input field itself. 
| -------------------------------------------------------------------
*/
$calculator['onButton'] = "null";

/*
| -------------------------------------------------------------------
| A function that is called when the calculator is closed. The function receives the current field value and the calculator
| instance object as parameters, while this refers to the text field 
| -------------------------------------------------------------------
*/
$calculator['onClose'] = "null";

