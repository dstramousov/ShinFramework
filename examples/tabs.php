<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Tabs.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Tabs
 * @author        
 * @link        
 */
    
    // include main fw file
    require_once("../shinfw/shinfw.php");
    // array of libs, models, helpers, core components
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_JSManager',
                                'SHIN_CSSManager'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Tabs'
                            ),
                         );
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    // add component to the page 
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('tabs'));
    
    // get instance of component
    $templater = SHIN_Core::$_libs['templater']->get_instance();
    // init two tabs
    $templater->assign('tabs1', SHIN_Core::$_libs['tabs']->tabs('ex1', array(
        'Tab #1' => 'Content of tab #1',
        'Tab #2' => 'Content of tab #2'
    )));
    // init two ajax tabs
    $templater->assign('tabs2', SHIN_Core::$_libs['tabs']->ajaxtabs('ex2', array(
        'Ajax Tab #1' => './ajax/Tab1.html',
        'Ajax Tab #2' => './ajax/Tab2.html'
    )));
    
    
    // init css for vertical tabs
    SHIN_Core::$_jsmanager->addComponent('$("#ex3").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
                                          $("#ex3 li").removeClass("ui-corner-top").addClass("ui-corner-left");');
    // get instance fo templater
    $templater = SHIN_Core::$_libs['templater']->get_instance();
    // init two vertical tabs
    $templater->assign('tabs3', SHIN_Core::$_libs['tabs']->verticaltabs('ex3', array(
        'Tab #1' => 'Content of tab #1',
        'Tab #2' => 'Content of tab #2'
    )));  
    
    // init css for ajax vertical tabs
    SHIN_Core::$_jsmanager->addComponent('$("#ex4").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
                                          $("#ex4 li").removeClass("ui-corner-top").addClass("ui-corner-left");');
    // init ajax vertical tabs
    $templater->assign('tabs4', SHIN_Core::$_libs['tabs']->verticalajaxtabs('ex4', array(
        'Ajax Tab #1' => './ajax/Tab1.html',
        'Ajax Tab #2' => './ajax/Tab2.html'
    )));
    
    //render main example template
    SHIN_Core::finalrender('tabs');

/* End of file tabs.php */
/* Location: example/tabs.php */
