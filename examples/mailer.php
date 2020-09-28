<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Mailer.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	PHP mailer demo.
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
                                'SHIN_Database',
                                'SHIN_Benchmark',
                                'SHIN_Input'
                            ),
                            
                            'libs' => array(
                                'SHIN_Mailer',
                                array('SHIN_Templater'=>'examples')
                            ),
                         );
    
    // init fw core using needed components                     
    SHIN_Core::init($nedded_libs);                   

    // chekc user action
    if (SHIN_Core::$_input->post('sendemail'))
    {
        $to_address = SHIN_Core::$_input->post('to', true);
        $body       = SHIN_Core::$_input->post('body', true);
        $to_name    = 'QA';
        $subject    = 'Testing mailer';
        
        // initialize component by needed parameters
        SHIN_Core::$_libs['mailer']->AddAddress($to_address, $to_name);
        SHIN_Core::$_libs['mailer']->Subject = $subject;
        SHIN_Core::$_libs['mailer']->MsgHTML($body);                    
        
        // send mail
        $result = SHIN_Core::$_libs['mailer']->Send();
        
        $templater = SHIN_Core::$_libs['templater']->get_instance();
        
        // transfer to the view result of email sending
        if (!$result) {
            $templater->assign('error', SHIN_Core::$_libs['mailer']->ErrorInfo);    
        } else {
            $templater->assign('error', 'Email is sent');    
        }
    }
    
    //render main example template
    SHIN_Core::finalrender('mailer');

/* End of file mailer.php */
/* Location: example/mailer.php */