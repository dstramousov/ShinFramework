<?php
    
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
                                'SHIN_Upload',
                                'SHIN_Image'
                            ),
                         );
    
    // init fw core using needed components                     
    SHIN_Core::init($nedded_libs);
    
    //init base dirs
    $baseDir        = 'test_uploader';
    $thumbsDir      = $baseDir . DIRECTORY_SEPARATOR . 'thumbs';
    $original       = $baseDir . DIRECTORY_SEPARATOR . 'original';
    $logDir         = '..' . DIRECTORY_SEPARATOR . 'shinfw' . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR;
    
    // initialize required parameters for two uploaders 
    $uploaderOptions = array('multi'         => 'true',
                             'buttonImg'     => "'".SHIN_Core::$_config['core']['shinfw_base_url']."/shinfw/js/uploadify/browse-files.png'",
                             'queueID'       => "'upload-action'",
                             'queueSizeLimit'=> 10,
                             'script'        => "'test_uploader.php'",
                             'onAllComplete' => 'reloadWindow',
                             'fileExt'       => "'*.jpg;*.JPG;*.jPG;*.gif;*.png;'");
    
    // init uploader first button                         
    SHIN_Core::$_libs['upload']->init($uploaderOptions);
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('imageUploader'));
    
    $action = SHIN_Core::$_input->post('action');
    if(!empty($_FILES)) {
        $action = 'upload';
    }
    
    // switch user action, can be delete or upload
    switch($action) {
        case 'upload':
            // uploade files into file system
            SHIN_Core::$_libs['upload']->process_upload($original);
            $fileName = $_FILES['Filedata']['name'];
            // generate watermark and merge it with original image and after that resize it
            $image      = SHIN_Image::load($original . DIRECTORY_SEPARATOR . $fileName);
            $resized    = $image->resize(70, 70);
            
            // save resized image into file
            $resized->saveToFile($thumbsDir . DIRECTORY_SEPARATOR . $fileName);
            break; 
    }
    
    // get image gallery list
    $files      = array();
    if ($handle = opendir($original)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && $file !='.svn') {
                array_push($files, rawurlencode($file));    
            }
        }
        closedir($handle);
    }
    
    // get thumb gallery list
    $thumbs      = array();
    if ($handle = opendir($thumbsDir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && $file !='.svn') {
                array_push($thumbs, rawurlencode($file));    
            }
        }
        closedir($handle);
    }
    
    // get log list
    $logs      = array();
    if ($handle = opendir($logDir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && $file !='.svn') {
                array_push($logs, rawurlencode($file));    
            }
        }
        closedir($handle);
    }
    
    // transfer data to view
    SHIN_Core::$_libs['templater']->assign('thumbs',        $thumbs); 
    SHIN_Core::$_libs['templater']->assign('files',         $files);
    SHIN_Core::$_libs['templater']->assign('logs',          $logs);
    SHIN_Core::$_libs['templater']->assign('baseDir',       $baseDir);
    
    //render main example template
    SHIN_Core::finalrender('test_uploader');