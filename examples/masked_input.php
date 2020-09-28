<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Masked Input.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      MaskedInout
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
                                'SHIN_Masked_Input'
                            ),
                         );
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    // get instance of component
    $maskedInput   =   SHIN_Core::$_libs['masked_input']->get_instance();
    // init mask for current input
    $otpions       =   array();
    $options       =   array('mask' => "'99/99/9999'");  
    
    // init component with needed options
    $maskedInput->init($options);   
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['masked_input']->render('date'));
    
    $maskedInput   =   SHIN_Core::$_libs['masked_input']->get_instance();
    $otpions       =   array();
    $options       =   array('mask' => "'(999) 999-9999'");  
    
    $maskedInput->init($options);   
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['masked_input']->render('phone'));
    
    $maskedInput   =   SHIN_Core::$_libs['masked_input']->get_instance();
    $otpions       =   array();
    $options       =   array('mask' => "'(999) 999-9999? x99999'");  
    
    $maskedInput->init($options);   
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['masked_input']->render('phoneext'));
    
    $maskedInput   =   SHIN_Core::$_libs['masked_input']->get_instance();
    $otpions       =   array();
    $options       =   array('mask' => "'99-9999999'");  
    
    $maskedInput->init($options);   
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['masked_input']->render('tin'));
    
    $maskedInput   =   SHIN_Core::$_libs['masked_input']->get_instance();
    $otpions       =   array();
    $options       =   array('mask' => "'999-99-9999'");  
    
    $maskedInput->init($options);   
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['masked_input']->render('ssn'));
    
    $maskedInput   =   SHIN_Core::$_libs['masked_input']->get_instance();
    $otpions       =   array();
    $options       =   array('mask' => "'a*-999-a999'");  
    
    $maskedInput->init($options);   
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['masked_input']->render('product'));
    
    $maskedInput   =   SHIN_Core::$_libs['masked_input']->get_instance();
    $otpions       =   array();
    $options       =   array('mask' => "'~9.99 ~9.99 999'");  
    
    $maskedInput->init($options);   
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['masked_input']->render('eyescript'));
    
    $maskedInput   =   SHIN_Core::$_libs['masked_input']->get_instance();
    $otpions       =   array();
    $options       =   array('mask' => "'99/99/9999'");  
    
    $maskedInput->init($options);   
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['masked_input']->render('date2'));  
    
    //render main example template
    SHIN_Core::finalrender('masked_input');

/* End of file masked_input.php */
/* Location: example/masked_input.php */

?>