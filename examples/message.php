<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with SHIN messages.
 *
 * @package        ShinPHP framework
 * @subpackage     Example
 * @category       Message
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
                                'SHIN_CSSManager',
                                'SHIN_Input',
                        
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Session',
                                'SHIN_Message'
                            ),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    // get instance of component
    $message = SHIN_Core::$_libs['message']->get_instance();
    
    // add some messages
    $message->addMessage('<strong>Success</strong> first message'); 
    $message->addMessage('<strong>Success</strong> second message');
    
    // add some errors
    $message->addError('<strong>Error</strong> first message'); 
    $message->addError('<strong>Error</strong> second message');
    
    // get messages by type
    $messages = $message->getMessagesByType('error');
    
    // transfer message to the template 
    SHIN_Core::$_libs['templater']->assign('getMessages',  $messages);
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['message']->render('message'));

    //render main example template
    SHIN_Core::finalrender('message');

/* End of file message.php */
/* Location: example/message.php */
