<?php

/**
 * ShinPHP Demo part
 *
 * Image gallery demo
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      image gallery
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
                                'SHIN_Upload',
                                'SHIN_Image',
                                'SHIN_Zoom'
                            ),
                         );
    
    // init fw core using needed components                     
    SHIN_Core::init($nedded_libs);
    
    //init base dirs
    $baseDir        = 'image_gallery';
    $thumbsDir      = 'image_gallery/thumbs';
    $watermarkDir   = 'image_gallery/watermark';
    
    $action = SHIN_Core::$_input->post('action');
    if(!empty($_FILES)) {
        $action = 'upload';
    }
    
    // switch user action, can be delete or upload
    switch($action) {
        case 'delete':
            $fileName = rawurldecode(SHIN_Core::$_input->post('file'));
            if(!empty($fileName)) {
                // remove original image from file system
                if(file_exists($baseDir . DIRECTORY_SEPARATOR . $fileName)) {
                    unlink($baseDir . DIRECTORY_SEPARATOR . $fileName);    
                }
                
                // remove thumbnail image from file system
                if(file_exists($thumbsDir . DIRECTORY_SEPARATOR . $fileName)) {
                    unlink($thumbsDir . DIRECTORY_SEPARATOR . $fileName);    
                }
            }
            break;
        
        case 'upload':
        
            if (!empty($_FILES)) {
                
                // uploade files into file system
                SHIN_Core::$_libs['upload']->process_upload('image_gallery');
                
                $fileName = $_FILES['Filedata']['name'];
            
                // generate watermark and merge it with original image and after that resize it
                $image      = SHIN_Image::load($baseDir . DIRECTORY_SEPARATOR . $fileName);
                $watermark  = SHIN_Image::load($watermarkDir . DIRECTORY_SEPARATOR.'watermark.jpg');
                $new        = $image->merge($watermark, 10, 10, 70);  
                $resized    = $new->resize(70, 70);
                
                // save resized image into file
                $resized->saveToFile($thumbsDir . DIRECTORY_SEPARATOR . $fileName);
                
            }
            
            break;
    }
    
    
    // get image gallery list
    $files      = array();
    if ($handle = opendir($thumbsDir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && $file !='.svn') {
                array_push($files, rawurlencode($file));    
            }
        }
        closedir($handle);
    }
    
    // initialize required parameters for two uploaders 
    $uploaderOptions = array('multi'         => 'true',
                             'buttonImg'     => "'".SHIN_Core::$_config['core']['shinfw_base_url']."/shinfw/js/uploadify/browse-files.png'",
                             'queueID'       => "'upload-action'",
                             'queueSizeLimit'=> 10,
                             'script'        => "'image_gallery.php'",
                             'onAllComplete' => 'reloadWindow',
                             'fileExt'       => "'*.jpg;*.gif;*.png;'");
    
    // init uploader first button                         
    SHIN_Core::$_libs['upload']->init($uploaderOptions);
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('fileUploader1'));
    
    // init uploader second button                         
    SHIN_Core::$_libs['upload']->init($uploaderOptions);
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('fileUploader2'));
    
    // initialize required parameters for zoom plugin and for each image file
    $zoomFiles = array();
    foreach($files as $file) {
        $zoom     = SHIN_Core::$_libs['zoom']->get_instance();
        $options  = array('data'    =>  array('container'   => 'zoom1',
                                              'bigimage'    =>  prep_url(base_url()) . '/' . $baseDir . '/' . $file,
                                              'smallimage'  =>  prep_url(base_url()) . '/' . $thumbsDir . '/' . $file,
                                              'alt'         =>  '',
                                              'title'       =>  'Optional title display',
                                              'class'       =>  'cloud-zoom',
                                              'id'          =>  'zoom1',
                                              'position'    =>  "'preview'",
                                              'softFocus'   =>  'true',
                                              'smoothMove'  =>  2,
                                              'tint'        =>  "false"));
              
        $zoom->combinedInit($options);
        $zoomFiles[$file] = $zoom->zoomItem;
    }
    
    // transfer data to view
    SHIN_Core::$_libs['templater']->assign('galleryList',   $zoomFiles); 
    SHIN_Core::$_libs['templater']->assign('thumbsDir',     $thumbsDir); 
    SHIN_Core::$_libs['templater']->assign('baseDir',       $baseDir); 
    
    
    //render main example template
    SHIN_Core::finalrender('image_gallery');

/* End of file image_gallery.php */
/* Location: example/image_gallery.php */

?>