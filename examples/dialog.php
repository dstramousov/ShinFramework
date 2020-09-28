<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Dialog.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Dialog
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
                                'SHIN_JSManager',
                                'SHIN_CSSManager'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Dialog',
                                'SHIN_Button'
                            ),
                         );
    
    // init fw core using needed components
    SHIN_Core::init($nedded_libs); 
    
    // get instance of templater component
    $templater = SHIN_Core::$_libs['templater']->get_instance();
    
    // set modal parameter
    SHIN_Core::$_libs['dialog']->set_modal(false);
    $templater->assign('dialog_container1', SHIN_Core::$_libs['dialog']->dialog('dialog1', 'Just dialog', 'Content'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('dialog1'));
    
    // set modal parameter
    SHIN_Core::$_libs['dialog']->set_modal(true);
    $templater->assign('dialog_container2', SHIN_Core::$_libs['dialog']->dialog('dialog2', 'Modal dialog', 'Content2'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('dialog2'));
    
    // set title parameter and init 2 buttons 
    SHIN_Core::$_libs['dialog']->set_title('Dialog with buttons');
    $templater->assign('dialog_container', SHIN_Core::$_libs['dialog']->confirm_dialog('dialog3', 'Dialog with buttons', 'Content', Array('Ok'=>null, 'Cancel'=>null)));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('dialog3')); 
    
    // set title parameter
    SHIN_Core::$_libs['dialog']->set_title('Dialog form');
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('dialog-form'));   
    
    // set title parameter and init 2 buttons with callbacks
    SHIN_Core::$_libs['dialog']->set_title('Dialog form');
    SHIN_Core::$_libs['dialog']->confirm_dialog('dialog-form1', 'Demo dialog with buttons', 'Content', Array('Ok'=>'createAcc', 'Cancel'=>'closeDlg'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('dialog-form1'));
    
    // add component to the page
    //default example
    $button     = SHIN_Core::$_libs['button']->get_instance();
    // add click event to the button
    $options    = array('click' => 'dialogOpen',
                        'label' => '"Create new user"',);
    // init component using needed options
    $button->init($options);
    SHIN_Core::$_jsmanager->addComponent($button->render('#create-user'));
    
    //render main example template
    SHIN_Core::finalrender('dialog');

/* End of file dialog.php */
/* Location: example/dialog.php */
