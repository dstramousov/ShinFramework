<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed 4');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Logging Class
 *
 * @package		ShinPHP framework
 * @subpackage	PPFM
 * @category		Workers
 * @author		
 * @link		
 */
class SHIN_getreport_worker extends SHIN_Worker
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
		parent::__construct();
    }
	
    /**
     * Method run - main method for each worker. Realise some part od busines logic for some application.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function run($params=null)
    {    
		parent::run($params=null);
		
		// OR you can call with this order
		/*
		$_ret = array();
		
		array_push($_ret, $this->_preProcess());
		array_push($_ret, $this->_process());
		
		return $_ret;
		*/
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
		SHIN_Core::log('debug', 'SHIN_getreport_worker _preProcess function.');
		parent::_preProcess($params=null);
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
		SHIN_Core::log('debug', 'SHIN_getreport_worker _process function.');
		parent::_process($params=null);
    }
	

}
// END SHIN_getreport_worker class

/* End of file SHIN_Log.php */
/* Location: \ppfm\workers\SHIN_getreport_worker.php */
