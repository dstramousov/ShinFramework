<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since		Version 0.1
 * @filesource	shinfw/libraries/SHIN_Worker.php
 */


/**
 * ShinPHP framework Word library
 *
 * @package			ShinPHP framework
 * @subpackage		Library
 * @author        
 * @link			shinfw/libraries/SHIN_Worker.php
 */

class SHIN_Worker
{
    /**
     * Constructor.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct()
    {
		SHIN_Core::log('debug', 'SHIN_Worker class initialized');

		Console::logSpeed('SHIN_Worker begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Worker. Size of class: ');
    }

    /**
     * Constructor.
     *
     * @access public
     * @params NULL.
     * @return array with 3 elements.
     */
    public function run($params=null)
    {
		$_ret = array();
		
		array_push($_ret, $this->_preProcess($params));
		array_push($_ret, $this->_process($params));
		array_push($_ret, $this->_postProcess($params));
		
		return $_ret;
    }
	
    /**
     * Pre process action.
     *
     * @access private
     * @params NULL.
     * @return NULL.
     */
    public function _preProcess($params=null)
    {
		$ret = null;
		SHIN_Core::log('debug', 'SHIN_Worker _preProcess function.');
		
		return $ret;
    }
  
    /**
     * Post process action.
     *
     * @access private
     * @params NULL.
     * @return NULL.
     */
    public function _postProcess($params=null)
    {
		$ret = null;
		SHIN_Core::log('debug', 'SHIN_Worker _postProcess function.');
		
		return $ret;
    }
	
    /**
     * Main logic for this worker.
     *
     * @access private
     * @params NULL.
     * @return NULL.
     */
    public function _process($params=null)
    {
		$ret = null;
		SHIN_Core::log('debug', 'SHIN_Worker _process function.');
		
		return $ret;
    }
	
}// End of class

/* End of file SHIN_Worker.php */
/* Location: shinfw/libraries/SHIN_Worker.php */