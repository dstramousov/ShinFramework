<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Blockui plugin.
 *
 * @package			ShinPHP framework
 * @subpackage		Example
 * @category		BlockUI
 * @author        
 * @link        
 */
    
    // include main fw file
    require_once("../shinfw/shinfw.php");
    
    // array of libs, models, helpers, core components
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_JSManager'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_BlockUI'
                            ),
                         );
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    // get instance of plugin
    $blocker = SHIN_Core::$_libs['blockui']->get_instance();
    
	// block component with DOM ID
    SHIN_Core::$_jsmanager->addComponent($blocker->bindByDOMID('blockButton', 'unblockButton', 'test'));	
    SHIN_Core::$_jsmanager->addComponent($blocker->bindByDOMID('blockButton2', 'unblockButton', 'test', "Please wait"));
	
    // init css for plugin
	$css = "
	    padding:        0, 
        margin:         0, 
        width:          '30%', 
        top:            '40%', 
        left:           '35%', 
        textAlign:      'center', 
        color:          '#f60e0e', 
        border:         '1px solid #aaa', 
        backgroundColor:'#fff', 
        cursor:         'wait' 
	";

    // init overlay css for plugin
	$overlayCSS = "
        backgroundColor: '#000', 
        opacity:         0.3 
		";
	
	$growlCSS = "
        width:    '150px', 
        top:      '10px', 
        left:     '', 
        right:    '10px', 
        border:   'none', 
        padding:  '5px', 
        opacity:   0.6, 
        cursor:    null, 
        color:    '#fff', 
        backgroundColor: '#f60e0e', 
        '-webkit-border-radius': '10px', 
        '-moz-border-radius':    '10px' 
		";	
	
    // add to the page custom JavaScript code
    SHIN_Core::$_jsmanager->insertJSFromFile(base_url() . '/blockui/custom_code.js');
	
    // some JavaScript event
	$cjs = "
    $('#blockButton3').click(function() {
        todoListClass();
    });";
    
    SHIN_Core::$_jsmanager->addComponent($cjs);
    // add event for blockButton3 button 
    SHIN_Core::$_jsmanager->addOutDomReadyComponent($blocker->bindByFunction('test', 'blockButton3', 'unblockButton', "Please wait"));
    
    // add to the page custom JavaScript code
    SHIN_Core::$_jsmanager->insertJSFromFile(base_url() . '/blockui/custom_code2.js');
    
    // some JavaScript event
    $cjs = "
	$('#blockButton4').click(function() {
		todoListClass2();
	});";
    SHIN_Core::$_jsmanager->addComponent($cjs);	
    // add event for blockButton4 button 
    SHIN_Core::$_jsmanager->addOutDomReadyComponent($blocker->bindByFunction('test', 'blockButton4', 'unblockButton', "", $css, $overlayCSS, $growlCSS, 'spinner.gif'));

    //render main example template
    SHIN_Core::finalrender('blockui');

/* End of file blockui.php */
/* Location: example/blockui.php */