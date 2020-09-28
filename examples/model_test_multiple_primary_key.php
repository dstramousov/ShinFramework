<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with SHIN_Model with multiple primary key.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	SHIN_Model demo.
 * @author		
 * @link		
 */    

    require_once("../shinfw/shinfw.php");
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'form', 'array'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Input',
                                'SHIN_Benchmark',
                                'SHIN_JSManager',
                                'SHIN_CSSManager',
                                'SHIN_Database', 
								'SHIN_Language'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Tooltip',
								'SHIN_Masked_Input',
                          ),

                            'models' => array(
                                array('examples_salesforce_model', 'examples_salesforce'),
                            ),

                         );
                     
    SHIN_Core::init($nedded_libs);
	
	SHIN_Core::$_language->load('app', 'en');
	
	if(param('action')){
		// make customization read_form logic and prepare special output
		$esm3 = SHIN_Core::$_models['examples_salesforce']->get_instance();
		$esm3->read_form();
		//dump($esm3);
		$esm3->save();
	} 
	
	// get page instance
	$page = SHIN_Core::$_libs['templater']->get_instance();

	// get instance of model
	$esm1 = SHIN_Core::$_models['examples_salesforce']->get_instance();

	$class = new ReflectionClass($esm1);
	dump(
		$class->isInternal() ? 'internal' : 'user-defined',
        $class->isAbstract() ? ' abstract' : '',
        $class->isFinal() ? ' final' : '',
        $class->isInterface() ? 'interface' : 'class',
        $class->getName(),
        var_export($class->getParentClass(), 1),
        $class->getFileName(),
        $class->getStartLine(),
        $class->getEndline(),
        $class->getModifiers(),
        implode(' ', Reflection::getModifierNames($class->getModifiers())),
        $class->getInterfaces(),
        $class->getProperties(),
        $class->getMethods()
        );
	
	// test fetch multiple primary key 
	$esm1->fetchByID(2002);
	$page->assign('esm1', $esm1->write_form());
	
	$esm2 = SHIN_Core::$_models['examples_salesforce']->get_instance();
	$h = array('year'=>2003, 'idNetwork'=>747, 'idSalesman'=>1); 
	$esm2->fetchByID($h);
	$page->assign('esm2', $esm2->write_form());//	$page->clear_all_assign();

	$esm3 = SHIN_Core::$_models['examples_salesforce']->get_instance();
	$h = array('idNetwork'=>987, 'idSalesman'=>2); 
	$esm3->fetchByID($h);
	$page->assign('esm3', $esm3->write_form());
	
    SHIN_Core::finalrender('mpk_model_test');

/* End of file multiple_primary_key_model_test.php */
/* Location: example/multiple_primary_key_model_test.php */