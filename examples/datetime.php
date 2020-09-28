<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Datetime.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Datetime
 * @author        
 * @link        
 */
    
    // include main fw file
    require_once("../shinfw/shinfw.php");
    // array of libs, models, helpers, core components
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'array'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_JSManager',
                                'SHIN_CSSManager',
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Date_Time',
                            )
                         );

    // init fw core using needed components
    SHIN_Core::init($nedded_libs);
    
    // get component instance         
    $dateTime     = SHIN_Core::$_libs['date_time']->get_instance();
    
    dump($dateTime->compareDates('2010-05-14 13:13:13', '2010-05-14 13:13:16'),
         $dateTime->compareDates('2010-05-17 13:13:13', '2010-05-14 13:13:16'),
         $dateTime->compareDates('2010-05-14 13:13:13', '2010-05-14 13:13:13'),
         
         $dateTime->compareDates(strtotime('2010-05-14 13:13:13'), strtotime('2010-05-14 13:13:17')),
         $dateTime->compareDates(strtotime('2010-05-17 13:13:13'), strtotime('2010-05-14 13:13:13')),
         $dateTime->compareDates(strtotime('2010-05-14 13:13:13'), strtotime('2010-05-14 13:13:13')),
         
         $dateTime->diffDates('2010-04-16 13:13:13', '2010-05-16 13:13:13'),
         $dateTime->diffDates('2010-05-13 23:23:18', '2010-05-14 23:24:18')
         
     );
