<?php

//xdebug_start_trace();

require_once("shinfw/shinfw.php");

$nedded_libs = array(
						'help' => array(
							'url', 'cookie', 'date', 'dump', 'download'
						),
							
						'models' => array(						
							array('SYS_User_Model', 'sys_user_model'),
						),
							
						'libs' => array(
							array('SHIN_Templater'=>'shinfw'),
							array('SHIN_Router'=>'default'),
							'SHIN_Auth',
							'SHIN_SEO',
							'SHIN_Session',
							'SHIN_Controller',
							'SHIN_Encrypt',
							'SHIN_Constants',
							'SHIN_DDMenu',
						),
						
						'core' => array(
							'SHIN_JSManager',
							'SHIN_CSSManager',
                            'SHIN_Language',
							'SHIN_Database',
							'SHIN_Input',
                            'SHIN_Log'
						),
					);


SHIN_Core::init($nedded_libs);

SHIN_Core::finalrender(SHIN_Core::runRoute());

//xdebug_stop_trace();

/* End of file index.php */
/* Location: ./index.php */