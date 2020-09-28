<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| Upload config file with default values   
| -------------------------------------------------------------------
*/


/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$upload_ext['js']     = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js',
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/uploadify/swfobject.js' ,
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/uploadify/jquery.uploadify.v2.1.4.min.js');

$upload_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js',
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/uploadify/swfobject.min.js' ,
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/uploadify/jquery.uploadify.v2.1.4.min.js');


/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$upload_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/uploadify/uploadify.css');

/**
* The relative path to the uploadify.swf file. 
* For absolute paths prefix the path with either ‘/’ or ‘http’
*/
$upload['uploader'] =  "'".SHIN_Core::$_config['core']['shinfw_base_url']."/shinfw/js/uploadify/uploadify.swf'";

/**
* The relative path to the backend script that will be processing your uploaded files.
* For absolute paths prefix the path with either ‘/’ or ‘http’
* Default = ‘uploadify.php’ 
*/
$upload['script'] = "'upload.php'";    

/**
* Image for CANCEL button
* 
*/
$upload['cancelImg'] = "'".SHIN_Core::$_config['core']['shinfw_base_url']."/shinfw/js/uploadify/cancel.png'";

/**
* Do start upload automaticaly ?
* 
*/
$upload['auto'] = "true";

/**
* Folder for upload
* 
*/
$upload['folder'] = "'uploads/'";

/**
* Folder for upload
* 
*/
$upload['multi'] = "false";


/**
* Image to 'browse' button
* 
*/
$upload['buttonImg'] = "''";


$upload['width'] = "130";


$upload['wmode'] = "'transparent'";


$upload['queueID'] = "''";


$upload['sizeLimit'] = "50000000";


$upload['simUploadLimit'] = "1";


/**
* The text that will appear in the file type drop down at the bottom of the browse dialog box. 
* 
*/
$upload['fileDesc'] = "'Select file(s)'";

/**
* A list of file extensions you would like to allow for upload. Format like ‘*.ext1;*.ext2;*.ext3′. 
* fileDesc is required when using this option.
*/
$upload['fileExt'] = "'*.exe;*.txt;*.dll;*.jpg'";

/**
* A function that triggers when a file upload has completed. The default function removes the file 
* queue item from the upload queue. The default function will not trigger if the value of your custom 
* function returns false. 
*/
$upload['onComplete'] = ''; 

/**
* A function that triggers when an existing file is detected on the server. The default event handler 
* opens a confirmation box. 
*/
$upload['onCheck'] = '';

/**
* A function that triggers when all file uploads have completed. There is no default event handler. 
*/
$upload['onAllComplete'] = '';

/**
* A function that fires each time the progress of a file upload changes. The default function updates 
* the progress bar in the file queue item. The default function will not trigger if the value of your 
* custom function returns false. 
*/
$upload['onProgress'] = '';

/**
* A function that triggers when the fileUploadClearQueue  function is called. The default event handler 
* removes all queue items from the upload queue. The default event handler will not trigger if the value 
* of your custom function returns false. 
*/
$upload['onClearQueue'] = '';

/**
* A function that triggers when a file upload is cancelled or removed from the queue. The default event 
* handler removes the file from the upload queue. The default event handler will not trigger if the value 
* of your custom function returns false. 
*/
$upload['onCancel'] = '';

/**
* A function that triggers once for each select operation. There is no default event handler.  
*/
$upload['onSelectOnce'] = '';

/**
* A function that triggers for each element selected. The default event handler generates a 6 character random 
* string as the unique identifier for the file item and creates a file queue item for the file. The default 
* event handler will not trigger if the value of your custom function returns false.  
*/
$upload['onSelect'] = '';


/**
* The limit of the number of items that can be in the queue at one time. Default = 999.
*/
$upload['queueSizeLimit']   =   300;


/**
* The name of your files array in the upload server script. Default = ‘Filedata’
*/
$upload['fileDataName'] =   "'Filedata'";


$upload['onQueueFull'] = 'function () {
                       return false;
               }';



/**
* The name of parameter for manage session name for uploadify
* 
* This parameter insert automaticaly. OR programmer can override this name and value 
* in hand-way for example:
*
        $uploaderOptions = array('fileDataName'     => '"wtUploader"',
                                 'multi'            => 'false',
                                 'auto'             => 'false',
                                 'queueSizeLimit'   => 1,
                                 'scriptData'		=> "{ 'PHPSESSID': '".$__sess."'}";
                                 'script'           => "'" . prep_url(base_url().'/index.php/tools/wtupload') . "'",
                                 'fileExt'          => "'*.jpg;*.gif;*.png;'",
                                 'onAllComplete'    => 'uploadComplete',
                                 'onSelect'         => 'selectFile');
*
*
*
*/
if(isset(SHIN_Core::$_libs['session'])){
	$__sess = SHIN_Core::$_libs['session']->userdata('session_id');
} else {
	$__sess = md5(date('Y-m-d H:i:s'));
}

$upload['scriptData'] =   "{shinframework : '".$__sess."'}";




    

  

?>