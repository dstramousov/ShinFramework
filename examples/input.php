<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Datepicker.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	Input filtering.
 * @author		
 * @link		
 */
    
    require_once("../shinfw/shinfw.php");
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url'
                            ),

                            'core' => array(
                                'SHIN_Database',
                                'SHIN_Benchmark',
                                'SHIN_Input'
                                
                            ),
                            
                            'libs' => array(
                                array('SHIN_Templater'=>'examples')
                            ),
                         );
                         
    // go. 
    SHIN_Core::init($nedded_libs);


    $xss_clean = false;
    if (SHIN_Core::$_input->post('xss'))
    {
        $xss_clean = true;
    }
    
    $templater = SHIN_Core::$_libs['templater']->get_instance();
    $templater->assign('a', SHIN_Core::$_input->post('a', $xss_clean));
    $templater->assign('b', SHIN_Core::$_input->post('b', $xss_clean));
    
    SHIN_Core::finalrender('input');

/* End of file input.php */
/* Location: example/input.php */