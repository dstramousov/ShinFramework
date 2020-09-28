<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Progressbar.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Progressbar
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
                                'SHIN_Progressbar'
                            ),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs); 
    // get instance of templater component
    $templater = SHIN_Core::$_libs['templater']->get_instance();
    // set percentage for progressbar and transfer data to the view
    $templater->assign('progressbar_container', SHIN_Core::$_libs['progressbar']->progressbar('progressbar1',38));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['progressbar']->render('progressbar1'));
    
    //render main example template
    SHIN_Core::finalrender('progressbar');

/* End of file progressbar.php */
/* Location: example/progressbar.php */
