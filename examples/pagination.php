<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with SHIN_Pagination.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Pagination
 * @author        
 * @link        
 */
    // include main fw file
    require_once("../shinfw/shinfw.php");

    // array of libs, models, helpers, core components
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'array'
                            ),

                            'core' => array(
                                'SHIN_JSManager',
                                'SHIN_Log',
                                'SHIN_CSSManager',
                                'SHIN_Database',
                                'SHIN_Language',
                                'SHIN_Input'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Pagination',
								'SHIN_URI',
                            ),
                            
                            'models'=> array(array('examples_tag_model', 'examples_tag_model'))
                         );

    // init fw core using needed components
    SHIN_Core::init($nedded_libs);
    
    // get selected language
    if(isset($_GET['lang'])){
        $lang   =   $_GET['lang'];
    } else {
        $lang   =   'en';
    } 
    
    // load language data for current language
    SHIN_Core::$_language->load('app', $lang);

	$config['base_url']		= SHIN_Core::$_config['core']['app_base_url'].'/pagination.php';
	$config['total_rows']	= '300';
	$config['per_page']		= '10';
	$config['cur_page']		= '20';

	SHIN_Core::$_libs['pagination']->initialize($config);

	$p1 = SHIN_Core::$_libs['pagination']->create_links();	
	
    // get instance of templater component
    $page = SHIN_Core::$_libs['templater']->get_instance();
	$page->assign('pager1_src_code', $p1);
	
	
    //render main example template
    SHIN_Core::finalrender('paginator');
 
/* End of file pagination.php */
/* Location: example/pagination.php */

