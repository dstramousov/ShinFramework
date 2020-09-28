<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work 2 classes SHIN_Javascript.php, SHIN_Jquery.php
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	Work with JS, AJAX, JQuery
 * @author		
 * @link		
 */

	require_once("../shinfw/shinfw.php");

	$nedded_libs = array(
                        'help' => array(
                            'dump', 'url', 'form'
                        ),

                        'core' => array(
	                        'SHIN_Log',	
							'SHIN_JSManager',
							'SHIN_CSSManager',
                        ),
                        
                        'libs' => array(
							array('SHIN_Templater'=>'examples'),
							'SHIN_Javascript',
                        ),
                     );
                     
	SHIN_Core::init($nedded_libs);

	$page = SHIN_Core::$_libs['templater']->get_instance();

	// Start exsample //////////////////////////////////////
	$jsObject = SHIN_Core::$_libs['javascript']->get_instance();
	
	// 1. animate
	$params = array(
	//	'height' => 80,
		'width' => '50%',
		'marginLeft' => 125
	);
	
	$jsObject->click('#animate_triger', $jsObject->animate('#process_text', $params, 'normal'));	
	
	// 2. fadeIn
	$jsObject->click('#fadein_triger', $jsObject->fadeIn('#process_text'));
	
	// 3. fadeOut
	$jsObject->click('#fadeout_triger', $jsObject->fadeOut('#process_text'));
	
	// 4.  SlideUP
	$jsObject->click('#slideup_triger', $jsObject->slideUp('#process_text'));

	// 5. Slide Down
	$jsObject->click('#slidedown_triger', $jsObject->slideDown('#process_text'));

	// 6. Toggle
	$jsObject->click('#slidetoggle_triger', $jsObject->slideToggle('#process_text'));
	$jsObject->click('#slidetoggle_triger', $jsObject->slideToggle('#process_img'));
	
	// 7. DBL Click 
	$jsObject->dblclick('#slidetoggle_dbltriger', $jsObject->slideToggle('#process_img'));
	
	// 8. KeyDown cach
	$jsObject->keydown('#kd_triger', $jsObject->slideToggle('#process_img'));
	
	// 9. KeyUp cach
	$jsObject->keydown('#ku_triger', $jsObject->slideToggle('#process_img'));
	
	// 10  mouse down 
	$jsObject->mousedown('#process_img', 'alert("Mouse Down catch moment")');
	
	// 11  mouse up 
	$jsObject->mouseup('#process_text', 'alert("Mouse Up catch moment")');
	
	// 12  mouseout 
//	$jsObject->mouseout('#process_img', 'alert("Mouse OUT catch moment")'); 
	
	// 13  mouseout 
//	$jsObject->mouseover('#process_img', 'alert("Mouse MOUSEOVER catch moment")'); 
		
	// 14  mouseup
//	$jsObject->mouseup('#process_img', 'alert("Mouse MOUSEUP catch moment")'); 
	
	// 15  out
//	$jsObject->output('alert("Mouse OUTPUT from browser catch moment")'); 
	
	// 16  ready
	$jsObject->ready('alert("READY DOM catch moment");'); 
	
	// 17 resize ???? 
	//$jsObject->resize('alert("Resize browser catch moment");'); 
	
	// 18 scroll
	$jsObject->scroll('#text', 'alert("Scroll browser catch moment");'); 
	
	
	// 7. Hide effect
	$jsObject->hide('#hide_triger', $jsObject->slideToggle('#process_img'));
	
	
	
	
	// End exsample ////////////////////////////////////////

	SHIN_Core::$_libs['javascript']->compile();
	SHIN_Core::finalrender('jj');

/* End of file js_jquery.php */
/* Location: example/js_jquery.php */