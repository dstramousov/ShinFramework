<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_SEO.php
 */


/**
 * phpMorphy is morphological analyzer library written in pure PHP. 
 * Currently supports Russian, English and German languages.
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		shinfw/libraries/SHIN_SEO.php
 */

require "phpmorphy/src/common.php";

class SHIN_Morphy extends phpMorphy
{
    protected $_globals = array();
    
	/**
	 * Init morphy. 
	 *
	 * @param string $_mode ???
	 * @return void
	 */
     
     function __construct($_mode=NULL)
     {
        parent::__construct();

        SHIN_Core::log('debug', 'SHIN_Morphy run.');
				
		Console::logSpeed('SHIN_Morphy begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Morphy. (smarty v.3) Size of class: ');
     }

    /**
     * Return pointer for this class.
     *
     * @access public
     * @param NULL
     * @return pointer for this class.
     */
	public function get_instance()
	{
		return $this;
	}

} // End of class 


/* End of file SHIN_Morphy.php */
/* Location: shifw/library/SHIN_Morphy.php */