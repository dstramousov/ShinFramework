<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Tooltip.
 *
 * @package      ShinPHP framework
 * @subpackage   Example
 * @category     Tooltip
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
                                'SHIN_Tooltip',
                                'SHIN_Tooltip_Image',
                                'SHIN_Tooltip_Load',
                                'SHIN_Tooltip_Youtube'
                            ),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);  
    
    // init tooltip text
    $tooltip_test  = " This text was provided from PHP script";
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tooltip']->add_tooltip('tooltip1', $tooltip_test));
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tooltip_image']->add_tooltip('tooltip2', 'images/owl.jpg','', 'image-style'));
    
    SHIN_Core::$_libs['tooltip']->set_style('dark');
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tooltip']->add_tooltip('tooltip3', $tooltip_test));

    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tooltip_load']->add_tooltip('tooltip4', './ajax/Tab1.html', 'post'));
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tooltip_youtube']->add_tooltip('tooltip5', 'KMU0tzLwhbE', 432, 300, 'custom-style'));
    
    SHIN_Core::$_libs['tooltip']->set_fixed('topRight');
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tooltip']->add_tooltip('tooltip6', $tooltip_test));

    //render main example template
    SHIN_Core::finalrender('tooltip');

/* End of file tooltip.php */
/* Location: example/tooltip.php */

?>