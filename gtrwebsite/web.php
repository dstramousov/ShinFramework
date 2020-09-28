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
 * GTR website this is small but very important projetc.
 *
 * @package		ShinPHP framework
 * @subpackage	GTR website
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
								array('sys_user_model', 'sys_user_model'),
                            ),
                            'libs' => array(
                                array('SHIN_Templater'=>'gtrwebsite'),
                                array('SHIN_Router'=>'gtrwebsite'),
//								'SHIN_SEO',
//								'SHIN_Auth',
                                'SHIN_Session',
                                'SHIN_Controller', 
								'SHIN_Constants', 
								'SHIN_Image', 
                            ),
                            'core' => array(
                                'SHIN_Language',
								'SHIN_Database',
                                'SHIN_Input',
                                'SHIN_JSManager',
                                'SHIN_CSSManager',
//                                'SHIN_Log',
                            ),
                         );

    SHIN_Core::init($nedded_libs);
//    dump(SHIN_Core::$_config['core']['index_page']);

	SHIN_Core::finalrender(SHIN_Core::runRoute());
	// End GTR website application.  /////////////////////////////////////////////////////////////////


/* End of file index.php */
/* Location: ./gtrwebsite/index.php */
