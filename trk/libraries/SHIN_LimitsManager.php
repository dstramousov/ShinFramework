<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * trk/libraries/SHIN_LimitsManager.php
 *
 * This file implemet all limitations in  trk web site.
 *
 * @version 1.0
 * @package SHIN_LimitsManager
 */

class SHIN_LimitsManager {
	
	/**
	 * Array with allowed file types for uploading on the server. 
	 * See application\config\limitations.php  -> $config['lim_allowed_file_type']
	 */
    var $allowed_file_types;

	/**
	 * Max file size for uploading on the server. !! IN MEGABYTES !!
	 * See application\config\limitations.php  -> $config['lim_max_file_size']
	 */
    var $max_file_size;
    
    
    /**
    * total space quota for one user
    */
    var $total_space_quota;

	
    function __construct()
	{
        include(SHIN_Core::isConfigExists('limitations.php'));

		$this->allowed_file_types				= $limitations['lim_allowed_file_type'];
        $this->max_file_size                    = $limitations['lim_max_file_size'];
		$this->total_space_quota				= $limitations['lim_total_space_quota'];
        
        
	
    }


    /**
     * Check possibility uploading file. Check filesize.
     *
     * @access	public
     * @param	integer $filesize in !! BYTES !!
     * @return	boolean 
     */
    function checkFileSize($filesize)
    {
    	$max_upload_size = $this->_getMaxFileSize();

    	if($filesize <= $max_upload_size)
    	{
    		return true;
		}
    	
    	return false;
    }
    
    /**
    * check remaing quota for current user
    * 
    * @param int $fileSize
    * @param int $userId
    * @access public
    * @return boolean
    */
    function checkRemaingQuota($fileSize, $userId) {
        
        $totalUsedSpace  =   SHIN_Core::$_models['trk_uploadactivity_model']->getUsersBandWidth($userId, date('Y-m-d'));
        
        if($totalUsedSpace + $fileSize <= $this->total_space_quota) {
            return true; 
        }
        
        return false;
    }

	function _getMaxFileSize(){
		return $this->max_file_size;
	}

}   // End class

/* End of file SHIN_LimitsManager.php */
/* Location: trk/libraries/SHIN_LimitsManager.php */