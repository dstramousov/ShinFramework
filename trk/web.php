<?php
  
/**
 * @package		ShinPHP framework
 * @author		Dmytro Stramousov
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.2
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Snaptrack website web entry point.
 *
 * @package		ShinPHP framework
 * @subpackage	Snaptrack website
 * @category	Application 
 * @author		
 * @link		
 */
    require_once("../shinfw/shinfw.php");
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'string','array', 'cookie', 'date'
                            ),
							
                            'libs' => array(
                                array('SHIN_Templater'=>'trk'),
                                array('SHIN_Router'=>'trk'),
                                'SHIN_Session',
                                'SHIN_Controller', 
								'SHIN_Constants', 
                            ),
                            'core' => array(
                                'SHIN_Language',
								'SHIN_Database',
                                'SHIN_Input',
                                'SHIN_JSManager',
                                'SHIN_CSSManager',
                            ),
                         );

    SHIN_Core::init($nedded_libs);

	SHIN_Core::finalrender(SHIN_Core::runRoute());
	// End GTR website application.  /////////////////////////////////////////////////////////////////


/* End of file index.php */
/* Location: ./gtrwebsite/index.php */
