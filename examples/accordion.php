<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Accordion.
 *
 * @package      ShinPHP framework
 * @subpackage   Example
 * @category     Accordion
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
                                'SHIN_Accordion',
                            ),
                         );
    // init fw core using needed components.
    SHIN_Core::init($nedded_libs);
    
    // get instance of templater
    $templater = SHIN_Core::$_libs['templater']->get_instance();
    // add 3 tabs to the template
    $templater->assign('accordion_container1', SHIN_Core::$_libs['accordion']->accordion_tabs('accordion1', array(
        'Accordion tab 1' => 'Content 1',
        'Accordion tab 2' => 'Content 2',
        'Accordion tab 3' => 'Content 3'
    )));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['accordion']->render('accordion1'));

    // add 3 tabs and attach mouseover event
    $templater->assign('accordion_container2', SHIN_Core::$_libs['accordion']->accordion_tabs('accordion2', array(
        'Accordion tab 1' => 'Content 1',
        'Accordion tab 2' => 'Content 2',
        'Accordion tab 3' => 'Content 3'
    )));
    
    // init mouseover event
    SHIN_Core::$_libs['accordion']->init(Array('event'=>"'mouseover'"));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['accordion']->render('accordion2'));

    // add 3 tabs and attach click event, set sortable for tab list
    SHIN_Core::$_libs['accordion']->set_sortable();    
        $templater->assign('accordion_container3', SHIN_Core::$_libs['accordion']->accordion_tabs('accordion3', array(
        'Accordion tab 1' => 'Content 1',
        'Accordion tab 2' => 'Content 2',
        'Accordion tab 3' => 'Content 3'
    )));
    // init click event
    SHIN_Core::$_libs['accordion']->init(Array('event'=>"'click'"));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['accordion']->render('accordion3'));

    //render main example template
    SHIN_Core::finalrender('accordion');

/* End of file accordion.php */
/* Location: examples/accordion.php */
