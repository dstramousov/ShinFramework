<?php

/**
 * ShinPHP Demo part
 *
 * Image uploader demo
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      image uploader
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
                                'SHIN_Lightbox'
                            ),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    //init base dirs
    $baseDir                = 'image_uploader/';
    $watermarkDir           = $baseDir . 'watermark';
    $estimationDir          = 'estimation/';
    $leadDir                = 'lead/';
    $productDir             = 'product/';
    
    $estimationThumbsDir    =  $estimationDir . 'thumbs'; 
    $leadThumbsDir          =  $leadDir . 'thumbs'; 
    $productThumbsDir       =  $productDir . 'thumbs';
    
    // get user action
    $action = SHIN_Core::$_input->post('action');
    if(!empty($_FILES)) {
        $action = 'upload';
    }
            
    // switch user action, can be delete or upload
    switch($action) {
        case 'upload':
            
            //upload file into lead gallery
            if (!empty($_FILES['leadfiledata'])) {
                
                // uploade files into file system
                SHIN_Core::$_libs['upload']->process_upload('image_uploader/lead', 'leadfiledata');
                
                $fileName = $_FILES['leadfiledata']['name'];
            
                // generate watermark and merge it with original image and after that resize it
                $image      = SHIN_Image::load($baseDir . $leadDir . '/' . $fileName);
                $watermark  = SHIN_Image::load($watermarkDir . '/watermark.jpg');
                // merge original image with watermark
                $new        = $image->merge($watermark, 10, 10, 70);  
                $resized    = $new->resize(70, 70);
                
                // save resized image into file
                $resized->saveToFile($baseDir . $leadThumbsDir . '/' . $fileName);
                
            }
            
            //upload file into estimation gallery
            if (!empty($_FILES['estimationfiledata'])) {
                
                // uploade files into file system
                SHIN_Core::$_libs['upload']->process_upload('image_uploader/estimation', 'estimationfiledata');
                
                $fileName = $_FILES['estimationfiledata']['name'];
            
                // generate watermark and merge it with original image and after that resize it
                $image      = SHIN_Image::load($baseDir . $estimationDir . '/' . $fileName);
                $watermark  = SHIN_Image::load($watermarkDir . '/watermark.jpg');
                // merge original image with watermark
                $new        = $image->merge($watermark, 10, 10, 70);  
                $resized    = $new->resize(70, 70);
                
                // save resized image into file
                $resized->saveToFile($baseDir . $estimationThumbsDir . '/' . $fileName);
                
            }
            
            //upload file into product gallery
            if (!empty($_FILES['productfiledata'])) {
                
                // uploade files into file system
                SHIN_Core::$_libs['upload']->process_upload('image_uploader/product', 'productfiledata');
                
                $fileName = $_FILES['productfiledata']['name'];
            
                // generate watermark and merge it with original image and after that resize it
                $image      = SHIN_Image::load($baseDir . $productDir . '/' . $fileName);
                $watermark  = SHIN_Image::load($watermarkDir . '/watermark.jpg');
                // merge original image with watermark
                $new        = $image->merge($watermark, 10, 10, 70);  
                $resized    = $new->resize(70, 70);
                
                // save resized image into file
                $resized->saveToFile($baseDir . $productThumbsDir . '/' . $fileName);
                
            }
            break;
        
        case 'delete':
        
            // from which section user delete image - lead|product|estimation
            $section  = SHIN_Core::$_input->post('section');
            // get file name
            $fileName = rawurldecode(SHIN_Core::$_input->post('file'));
            
            // process delete action for each gallery(main image and thumb image)
            switch($section) {
                case 'lead':
                    processDeleteFile($baseDir . $leadDir . '/' . $fileName, $baseDir . $leadThumbsDir . '/' . $fileName);
                    break;
                case 'estimation':
                    processDeleteFile($baseDir . $estimationDir . '/' . $fileName, $baseDir . $estimationThumbsDir . '/' . $fileName);
                    break;
                case 'product':
                    processDeleteFile($baseDir . $productDir . '/' . $fileName, $baseDir . $productThumbsDir . '/' . $fileName);
                    break;
            }
              
            break;
    }
    
    
    
    // collect images for estimation gallery
    $estimationGalleryList = collectGallery($baseDir . $estimationDir); 
    // collect images for lead gallery
    $leadGalleryList       = collectGallery($baseDir . $leadDir);  
    // collect images for product gallery
    $productGalleryList    = collectGallery($baseDir . $productDir);  
    
    // initialize required parameters for two uploaders 
    $uploaderOptions = array('multi'         => 'true',
                             'buttonImg'     => "'".SHIN_Core::$_config['core']['shinfw_base_url']."/shinfw/js/uploadify/browse-files.png'",
                             'queueID'       => "'estimation-quee'",
                             'queueSizeLimit'=> 10,
                             'script'        => "'image_uploader.php'",
                             'onAllComplete' => 'reloadWindow',
                             'fileExt'       => "'*.jpg;'",
                             'fileDataName'  => "'estimationfiledata'");
    
    // init uploader for estimation section                        
    SHIN_Core::$_libs['upload']->init($uploaderOptions);
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('estimation-uploader'));
    
    $uploaderOptions = array('queueID'      => "'lead-quee'",
                             'fileExt'      => "'*.gif;*.bmp;'",
                             'fileDataName' => "'leadfiledata'");
    
    // init uploader for lead section                         
    SHIN_Core::$_libs['upload']->init($uploaderOptions);
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('leadUploader'));
    
    $uploaderOptions = array('queueID'      => "'product-quee'",
                             'fileExt'      => "'*.png;*.jpg;'",
                             'fileDataName' => "'productfiledata'");
    
    // init uploader for product section                         
    SHIN_Core::$_libs['upload']->init($uploaderOptions);
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('product-uploader'));
    
    // transfer data to view
    SHIN_Core::$_libs['templater']->assign('baseDir',   $baseDir);
     
    SHIN_Core::$_libs['templater']->assign('estimationDir',   $estimationDir); 
    SHIN_Core::$_libs['templater']->assign('leadDir',         $leadDir); 
    SHIN_Core::$_libs['templater']->assign('productDir',      $productDir); 
    
    SHIN_Core::$_libs['templater']->assign('estimationThumbsDir',   $estimationThumbsDir); 
    SHIN_Core::$_libs['templater']->assign('leadThumbsDir',         $leadThumbsDir); 
    SHIN_Core::$_libs['templater']->assign('productThumbsDir',      $productThumbsDir);
    
    SHIN_Core::$_libs['templater']->assign('estimationGalleryList',    $estimationGalleryList);
    SHIN_Core::$_libs['templater']->assign('leadGalleryList',          $leadGalleryList);
    SHIN_Core::$_libs['templater']->assign('productGalleryList',       $productGalleryList);
    
    // initialize lightbox plugin
    $lightbox   =   SHIN_Core::$_libs['lightbox']->get_instance();
    $lightbox->init(array());   
    
    // init lightbox for all images
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['lightbox']->render('a[rel^=\'gallery-img\']'));
    
    //render main example template
    SHIN_Core::finalrender('image_uploader');
    
    
    
    /**
    * collect image for each of the gallery
    * 
    * @param string $galleryDir - gallery dir
    */
    function collectGallery($galleryDir) {
        $files      = array();
        if ($handle = opendir($galleryDir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && $file !='.svn' && $file != 'thumbs') {
                    array_push($files, rawurlencode($file));    
                }
            }
            closedir($handle);
        }
        
        return $files;    
    }
    
    /**
    * delete files from file system
    * 
    * @param string $pathFile - path to file
    * @param string $pathThumbFile - path to thumb file
    */
    function processDeleteFile($pathFile, $pathThumbFile){
        
        // remove original image from file system
        if(file_exists($pathFile)) {
            unlink($pathFile);    
        }
        
        // remove thumbnail image from file system
        if(file_exists($pathThumbFile)) {
            unlink($pathThumbFile);    
        }
    }

/* End of file image_uploader.php */
/* Location: example/image_uploader.php */

?>