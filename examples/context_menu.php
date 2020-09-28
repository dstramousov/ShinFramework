<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Maps.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Maps
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
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_JSManager',
                                'SHIN_CSSManager',
                                'SHIN_Database'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Context_Menu',
                            )
                         );

    // init fw core using needed components
    SHIN_Core::init($nedded_libs);

    // get instance of templater component
    $page            = SHIN_Core::$_libs['templater']->get_instance();
    // get instance of context menu component
    $contextMenu     = SHIN_Core::$_libs['context_menu']->get_instance();
    
    // init component with base options
    $options         = array('menu'     => 'myMenu');
    
    $contextMenu->init($options); 
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['context_menu']->render('with-context-menu'));
    
    
    $contextMenu     = SHIN_Core::$_libs['context_menu']->get_instance();
    // init collback for each menu action
    $options         = array('menu'     => 'myMenu',
                             'callback' => 'function(action){ alert(action); }');
    
    $contextMenu->init($options); 
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['context_menu']->render('with-context-menu2'));
    
    $contextMenu     = SHIN_Core::$_libs['context_menu']->get_instance();
    // init collback for each menu action
    $options         = array('menu'     => 'myMenu2',
                             'callback' => 'function(action){ alert(action); }');
    
    $contextMenu->init($options);
    // disable some items of the menu
    $contextMenu->disableItems(array('#copy', '#paste')); 
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['context_menu']->render('with-context-menu3')); 
    
    //render main example template
    SHIN_Core::finalrender('context_menu');

/* End of file context_menu.php */
/* Location: example/context_menu.php */ 


