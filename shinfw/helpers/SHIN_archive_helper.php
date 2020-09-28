<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Archive helper
 * Helps to handle archives on the server side
 *
 * @access	public
 * @throws  Exceptions
 */	
if ( ! function_exists('makearchive'))
{

	 /**
     * Create an archive by file's id(s)
     *
     * @access public
     * @input:  mixed ( array of ids | id )
     * @output: string path to archive
     * @throws Exception
     */
	function makearchive($files = array(), $destination = '', $overwrite = false)
	{
        $valid_files    =   array();
        
        if(is_array($files)) {
            //cycle through each file
            foreach($files as $path => $name) {
                //make sure the file exists
                if(file_exists($path)) {
                    $valid_files[$path] = $name;
                }
            }
        }
        
        //if we have good files...
        if(count($valid_files)) {
            //create the archive
            $zip = new ZipArchive();
            if($zip->open($destination, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
                return false;
            }
            //add the files
            foreach($valid_files as $path => $name) {
                $zip->addFile($path, $name);
            }
            
            //close the zip — done!
            $zip->close();
        }
	}	
}

/* End of file array_helper.php */
/* Location: ./system/helpers/array_helper.php */