<?php

/**
 * @package		ShinPHP framework
 * @author		Dmytro Stramousov
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 *
 * @package		ShinPHP framework
 * @subpackage	CRM
 * @category	Application 
 * @author		Dmytro Stramousov
 * @link		
 */
    require_once("../shinfw/shinfw.php");
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'string', 'form', 'array', 'cookie', 'date'
                            ),
							
							'models' => array(
                                array('examples_customer_master_data_model', 'testmodel'),
								array('sys_user_model', 'sys_user_model'),
                            ),							

                            'libs' => array(
                                array('SHIN_Templater'=>'crm'),
                                array('SHIN_Router'=>'crm'),
								'SHIN_Auth',                      
                                'SHIN_Session',
								'SHIN_ACL',
                                'SHIN_Controller',
								'SHIN_Text_Editor',
                                'SHIN_SEO',
                            ),
                            'core' => array(
                                'SHIN_JSManager',
                                'SHIN_Language',
                                'SHIN_CSSManager',
								'SHIN_Database',
                                'SHIN_Input',
                                'SHIN_Log',
                            ),
                         );


    SHIN_Core::init($nedded_libs);

	SHIN_Core::finalrender(SHIN_Core::runRoute());
	// End PPFM application.  ///////////////////////////////////////////////////////////////////////


/* End of file index.php */
/* Location: ./crm/index.php */
