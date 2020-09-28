<?php
/**
* Config file for timepicker library
*/

    /**
    *
    *  Depends from JS
    *
    */
    $timepicker_ext['js']       = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                                        SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/timepicker/jquery.timeentry.js');

    $timepicker_ext['min_js']   = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                                        SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/timepicker/jquery.timeentry.min.js');


    /**
    *
    *  Depends from CSS
    *
    */
    $timepicker_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/timepicker/jquery.timeentry.css');    
    
    /**
    *  True to use 24 hour time, false for 12 hour (AM/PM) 
    */
    $timepicker['show24Hours'] = "true"; 
    
    
    /**
    *  The separator between time fields  
    */
    $timepicker['separator'] = "':'"; 
    
    
    /**
    *  The separator before the AM/PM text
    */
    $timepicker['ampmPrefix'] = "''"; 
    
    
    /**
    *  Names of morning/evening markers  
    */
    $timepicker['ampmNames'] = "['AM', 'PM']"; 
    
    
    /**
    *  The popup texts for the spinner image areas
    */
    $timepicker['spinnerTexts'] = "['Now', 'Previous field', 'Next field', 'Increment', 'Decrement']"; 
    
    
    /**
    *  Display text following the input box, e.g. showing the format
    */
    $timepicker['appendText'] = "''"; 
    
    
    /**
    *  True to show seconds as well, false for hours/minutes only 
    */
    $timepicker['showSeconds'] = "true"; 
    
    
    /**
    *  Steps for each of hours/minutes/seconds when incrementing/decrementing 
    */
    $timepicker['timeSteps'] = "[1, 1, 1]"; 
    
    
    /**
    *   The field to highlight initially, 0 = hours, 1 = minutes, ... 
    */
    $timepicker['initialField'] = "0"; 
    
    /**
    *   True to use mouse wheel for increment/decrement if possible, 
    *   false to never use it 
    */
    $timepicker['useMouseWheel'] = "true"; 
     
    
    /**
    *    The time to use if none has been set, leave at null for now  
    */
    $timepicker['defaultTime'] = "null";    
    
    
    /**
    *    The earliest selectable time, or null for no limit
    */
    $timepicker['minTime'] = "null";      
    
    
    
    /**
    *    The latest selectable time, or null for no limit
    */
    $timepicker['maxTime'] = "null";    
    
    
    
    /**
    *    The URL of the images to use for the time spinner
    *    Seven images packed horizontally for normal, each button pressed, and disabled
    */
    $timepicker['spinnerImage'] = '"'.SHIN_Core::get_theme_url_path().'/css/timepicker/spinnerDefault.png"'; 
    
    
    /**
    *    The width and height of the spinner image, 
    * and size of centre button for current time    
    */
    $timepicker['spinnerSize'] = "[20, 20, 8]";      

    /**
    *    The URL of the images to use for the expanded time spinner   
    * Seven images packed horizontally for normal, each button pressed, and disabled 
    */
    $timepicker['spinnerBigImage'] = "''";      
    
    /**
    *    The width and height of the expanded spinner image, 
    * and size of centre button for current time    
    */
    $timepicker['spinnerBigSize'] = "[40, 40, 16]";    
      
    /**
    *    True for increment/decrement buttons only, false for all
    */
    $timepicker['spinnerIncDecOnly'] = "false";    
    
    /**
    *    Initial and subsequent waits in milliseconds
    * for repeats on the spinner buttons    
    */
    $timepicker['spinnerRepeat'] = "[500, 250]";    

    
    /**
    *    Function that takes an input field and 
    * returns a set of custom settings for the time entry       
    */
    $timepicker['beforeShow'] = "null";    

    
    /**
    *    takes the old and new times, and minimum and maximum times as parameters,
    * and returns an adjusted time if necessary    
    */
    $timepicker['beforeSetTime'] = "null";        
          
          
?>