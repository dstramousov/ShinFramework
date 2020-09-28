<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with encode decode.
 *
 * @package        ShinPHP framework
 * @subpackage     Example
 * @category       Encode Decode
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
                                'SHIN_Input'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Encrypt'
                            ),
                         );
    
    // init fw core using needed components
    SHIN_Core::init($nedded_libs);
    // get instance of component
    $encrypt   =   SHIN_Core::$_libs['encrypt']->get_instance();
    
    
    $isPost         = SHIN_Core::$_input->post('data_to_encode');
    $action         = SHIN_Core::$_input->post('action');
    $dataToEncode   = SHIN_Core::$_input->post('data_to_encode');
    $decodedData    = SHIN_Core::$_input->post('decoded_data');
    $encodedData    = SHIN_Core::$_input->post('encoded_data');
    
    // check user action 
    if($isPost){
        
        switch($action) {
            case 'Encode':
                // encrypt data using key from config file 
                $encodedData = $encrypt->encode($dataToEncode); 
                break;
            case 'Decode':
                // decrypt data using key from config file
                $decodedData = $encrypt->decode($encodedData);
                break;
        }    
    }
    
    // transfer data to the template
    SHIN_Core::$_libs['templater']->assign('data_to_encode', $dataToEncode);
    SHIN_Core::$_libs['templater']->assign('decoded_data', $decodedData);
    SHIN_Core::$_libs['templater']->assign('encoded_data', $encodedData);
    
    //render main example template
    SHIN_Core::finalrender('encode_decode');

/* End of file encode_decode.php */
/* Location: example/encode_decode.php */
