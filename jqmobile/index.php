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
 * ShinTicket is designed to help you streamline support requests and improve customer support efficiency by providing 
 * staff with tools they need to deliver fast, effective and measurable support. 
 *
 * @package		ShinPHP framework
 * @subpackage	SHINTicket
 * @category	Application 
 * @author		
 * @link		
 */
    require_once("../shinfw/shinfw.php");
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'string','array', 'cookie'
                            ),
							
							'models' => array(						
								array('SYS_User_Model', 'sys_user_model'),
							),

                            'libs' => array(
                                array('SHIN_Templater'=>'jqmobile'),
                                array('SHIN_Router'=>'jqmobile'),
								'SHIN_SEO',
								'SHIN_Constants',
                                'SHIN_Session',
                                'SHIN_Controller',
                            ),
                            'core' => array(
                                'SHIN_JSManager',
                                'SHIN_Language',
                                'SHIN_CSSManager',
                                'SHIN_Input',
								'SHIN_Database',
                                'SHIN_Log',
                            ),
                         );

    SHIN_Core::init($nedded_libs);
//die(print_r($_POST));


	SHIN_Core::finalrender(SHIN_Core::runRoute());
	// End SHINTicket application.  ////////////////////////////////////////////////////////////////////


/* End of file index.php */
/* Location: ./shinticket/index.php */
