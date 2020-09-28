<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Upload.
 *
 * @package      ShinPHP framework
 * @subpackage   Example
 * @category     Upload
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
                                'SHIN_Upload'
                            ),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);  
        
    // if user make upload
    if (!empty($_FILES)) {
        // upload user files
        SHIN_Core::$_libs['upload']->process_upload('uploads');
        $json = new stdClass();
        die(json_encode($json));
    }
    
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('fileInput1'));

    // init uploader options
    SHIN_Core::$_libs['upload']->init(Array(
        'multi' => 'true',
        'buttonImg' => "'".SHIN_Core::$_config['core']['app_base_url']."/shinfw/js/uploadify/browse-files.png'",
        'queueID' => "'fileQueue'"
    ));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('fileInput2'));

    //render main example template
    SHIN_Core::finalrender('upload');

/* End of file upload.php */
/* Location: example/upload.php */

?>