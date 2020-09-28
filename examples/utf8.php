<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Datepicker.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	UTF8 demo.
 * @author		
 * @link		
 */    

	require_once("../shinfw/shinfw.php");
	$nedded_libs = array(
    	                    'help' => array(
	                           'url', 'dump'
	                        ),

	                        'core' => array(
	                        ),
                        
    	                    'libs' => array(
        	                    array('SHIN_Templater'=>'examples'),
	                            'SHIN_UTF8'
	                        ),
	                     );
                     
	SHIN_Core::init($nedded_libs); 

	$ut8		= SHIN_Core::$_libs['utf8']->get_instance();
    $templater	= SHIN_Core::$_libs['templater']->get_instance();
	
	$string_utf8_1 = '                  Shin framework хороший фреймворк  ';
	$string_utf8_2 = '  Questo pomeriggio andiamo al cinema per il film "quadro Shin"           ';

	// prepare page
	$templater->assign('site_charset', 'UTF-8');
	//////////////////////////
	
	$templater->assign('begin1', $string_utf8_1);
	$templater->assign('begin2', $string_utf8_2);
	
	$templater->assign('_ltrim',			$ut8->_ltrim($string_utf8_1));
	$templater->assign('_ord',				$ut8->_ord($string_utf8_1));
	$templater->assign('_rtrim',			$ut8->_rtrim($string_utf8_1));
	$templater->assign('_str_ireplace',		$ut8->_str_ireplace($string_utf8_1, $string_utf8_2, 'dimas'));
	$templater->assign('_str_pad',			$ut8->_str_pad($string_utf8_1, 10));
	$templater->assign('_str_split',		$ut8->_str_split($string_utf8_1, 'framework'));
	$templater->assign('_strcasecmp',		$ut8->_strcasecmp($string_utf8_1, $string_utf8_1));
	$templater->assign('_strcspn',			$ut8->_strcspn($string_utf8_1, 'framework'));
	$templater->assign('_stristr',			$ut8->_stristr($string_utf8_1, 'framework'));
	$templater->assign('_strlen',			$ut8->_strlen($string_utf8_1));
	$templater->assign('_strpos',			$ut8->_strpos($string_utf8_1, 'work'));
	$templater->assign('_strrev',			$ut8->_strrev($string_utf8_2));
	$templater->assign('_strrpos',			$ut8->_strrpos($string_utf8_1, 'йм'));
	$templater->assign('_strspn',			$ut8->_strspn($string_utf8_1, 'shin'));
	$templater->assign('_strtolower',		$ut8->_strtolower($string_utf8_1));
	$templater->assign('_strtoupper',		$ut8->_strtoupper($string_utf8_1));
	$templater->assign('_substr',			$ut8->_substr($string_utf8_1, 'framework'));
	$templater->assign('_substr_replace',	$ut8->_substr_replace($string_utf8_1, 'framework', 0));
	$templater->assign('_to_unicode',		$ut8->_to_unicode($string_utf8_1));
	$templater->assign('_trim',				$ut8->_trim($string_utf8_1));
	$templater->assign('_ucfirst',			$ut8->_ucfirst($string_utf8_1));
	$templater->assign('_ucwords',			$ut8->_ucwords($string_utf8_1));
//	$templater->assign('_from_unicode',		$ut8->_from_unicode($string_utf8_1));
	
	SHIN_Core::finalrender('utf8');

/* End of file utf8.php */
/* Location: example/utf8.php */
