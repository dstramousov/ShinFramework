<?php

    // include main fw file
    require_once("../../shinfw/shinfw.php");
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
                                'SHIN_Input',
                        
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Session',
                            ),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    $step               =   SHIN_Core::$_input->globalarr('step');
    $currentProgress    =   SHIN_Core::$_libs['session']->userdata('progress');
    
    if($currentProgress >= 100) {
        SHIN_Core::$_libs['session']->set_userdata('progress', ($currentProgress = 0));
    }
    
    if(empty($currentProgress) || is_null($currentProgress)) {
        SHIN_Core::$_libs['session']->set_userdata('progress', ($currentProgress = 0));
    }
    
    SHIN_Core::$_libs['session']->set_userdata('progress', ($currentProgress += $step));
    
    echo json_encode(array('progress' => $currentProgress)); exit();