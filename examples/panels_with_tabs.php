<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Panels.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Panel
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
                                'SHIN_CSSManager',
                                'SHIN_Language'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Tabs'
                            ),
                         );
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    // get selected language
    if(isset($_GET['lang'])){
        $lang   =   $_GET['lang'];
    } else {
        $lang   =   'en';
    } 
    
    // load language data for current language
                       SHIN_Core::$_language->load('app', $lang); 
                       SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('tabs'));
    
    // get instance of templater component
    $templater = SHIN_Core::$_libs['templater']->get_instance();
    
    // transfer to the view tabs data
    $templater->assign('tabs', SHIN_Core::$_libs['tabs']->ajaxtabs('ex', array(
        'Ajax Tab #1' => './panels_with_charts.php',
        'Ajax Tab #2' => './ajax/Tab2.html'
    )));

    //render main example template
    SHIN_Core::finalrender('tabs_with_panels');

/* End of file panels_with_tabs.php */
/* Location: example/panels_with_tabs.php */
