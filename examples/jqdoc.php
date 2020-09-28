<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with DDMenu.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Drop Down Menu
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
                                'SHIN_Database'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_JqDoc',
                            )
                         );

    // init fw core using needed components
    SHIN_Core::init($nedded_libs);

    // get instance of templater component
    $page            = SHIN_Core::$_libs['templater']->get_instance();
    //get instance of ddmenu component
    
    // base example
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['jqdoc']->render('#menu'));
    
    // Vertical, right-hand edge, labelled
    SHIN_Core::$_libs['jqdoc']->init(array('align' => '"right"', 'labels' => 'true'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['jqdoc']->render('#menu2'));
    
    // Fade in
    SHIN_Core::$_libs['jqdoc']->init(array('align' => '"middle"', 'fadeIn' => 200));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['jqdoc']->render('#menu3'));
    
    // Change image source
    SHIN_Core::$_libs['jqdoc']->init(array('align' => '"middle"'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['jqdoc']->render('#menu4'));
    
    // Horizontal with bordered background
    SHIN_Core::$_libs['jqdoc']->init(array('align' => '"top"'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['jqdoc']->render('#menu5'));
    
    // Use setLabel to modify label presentation
    SHIN_Core::$_libs['jqdoc']->init(array('align' => '"top"', 'labels' => 'true', 'setLabel' => 'labelTransform'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['jqdoc']->render('#menu6'));
    
    // Use setLabel to modify label presentation
    SHIN_Core::$_libs['jqdoc']->init(array('align' => '"top"', 'size' => 60, 'labels' => 'true'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['jqdoc']->render('#menu7'));
    
    // Two menus, one horizontal and one vertical
    SHIN_Core::$_libs['jqdoc']->init(array('align' => '"top"', 'size' => 60, 'labels' => 'true'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['jqdoc']->render('#menu8'));
    
    SHIN_Core::$_libs['jqdoc']->init(array('align' => '"right"', 'size' => 60, 'labels' => 'true'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['jqdoc']->render('#menu9'));
    
    
    //render main example template
    SHIN_Core::finalrender('jqdoc');
 
/* End of file ddmenu.php */
/* Location: example/ddmenu.php */

