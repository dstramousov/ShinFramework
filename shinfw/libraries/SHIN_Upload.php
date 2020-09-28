<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Upload.php
 */


/**
 * ShinPHP framework fusion upload library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Upload.php
 */


class SHIN_Upload extends SHIN_Libs 
{

        
    /**
     * Constructor. Init upload with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('upload', $css_file); 

		Console::logSpeed('SHIN_Upload begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Upload. Size of class: ');
    }
    
    /**
     * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return string.
     */
    protected function _body()
    {

        $_ret = "
        $(\"#{$this->htmlID}\").uploadify({";

        $_temporary = array();

        foreach($this->sh_Options as $p=>$k) {
            if(!empty($k)) {
             
             array_push($_temporary, "\n        {$p}: {$k}");
             
            }
        }
        $_ret    .= implode(', ', $_temporary);

        $_ret    .= '
    });
';

        return $_ret;
    }

    /**
    * set max size of uploaded file
    * 
    * @access public
    * @param int $bytes - size in bytes
    * @return null
    */
    public function setMaxsize($bytes)
    {
        $this->init(Array(
            'sizeLimit' => $bytes
        ));
    }    
    
    /**
    * set max file that can be uploaded at one time
    * 
    * @access public
    * @param int $number - number of files
    * @return null
    */
    public function setSimupload($number)
    {
        $this->init(Array(
            'simUploadLimit' => $number
        ));
    }    
    
    /**
    * process upload data
    * 
    * @access public
    * @param string $fileDataName - name of the index ins $_FILES array
    * @param string $uploadPath - target folder name
    * @return null
    * 
    */
    public function process_upload($uploadPath, $fileDataName = '')
    {
        
        require(BASEPATH.'config/upload.php');
        require(BASEPATH.'config/config.php');

        $fileDataName = !empty($fileDataName) ? $fileDataName : trim($this->sh_Options['fileDataName'], "'");

        if(!isset($_FILES[$fileDataName]['tmp_name'])){SHIN_Core::show_error('Error calling');}

        $tempFile     = $_FILES[$fileDataName]['tmp_name'];
        $fileTypes    = str_replace('*.','',$_REQUEST['fileext']);
        $fileTypes    = str_replace(';','|',$fileTypes);
        $typesArray   = split('\|',$fileTypes);
        $fileParts    = pathinfo($_FILES[$fileDataName]['name']);
		SHIN_Core::log('debug', "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
		SHIN_Core::log('debug', "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
		SHIN_Core::log('debug', "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
		SHIN_Core::log('debug', "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
		SHIN_Core::log('debug', "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
		SHIN_Core::log('debug', "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
		SHIN_Core::log('debug', "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
		SHIN_Core::log('debug', "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
		SHIN_Core::log('debug', "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
		SHIN_Core::log('debug', "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
		SHIN_Core::log('debug', "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
		SHIN_Core::log('debug', print_r($fileParts['extension']). ' '.print_r($typesArray) );
        if (in_array(strtolower($fileParts['extension']), $typesArray)) {
            if($_FILES[$fileDataName]['size']>$upload['sizeLimit']) {
                SHIN_Core::log('debug', "Size limit exceeded.");
                echo 'Size limit exceeded.';
            } else {
                $targetPath = $uploadPath . DIRECTORY_SEPARATOR . $_FILES[$fileDataName]['name'];
                
                move_uploaded_file($tempFile,$targetPath);
                SHIN_Core::log('debug', "Move uploaded file: $tempFile  -> $targetPath");
            }
        } else {
            SHIN_Core::log('debug', "Invalid type.");
        }
    }

} // End of class 

/* End of file SHIN_Upload.php */
/* Location: ./libraries/SHIN_Upload.php */               
