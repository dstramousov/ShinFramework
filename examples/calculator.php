<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Calculator.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Calculator
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
                                'SHIN_Calculator'
                            ),
                         );
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    
    // invocation examples
    
    // Button only trigger
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('showOn' => "'button'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#invocation'));
    
    // Image only trigger
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('showOn'            =>  "'button'",
                            'buttonImageOnly'   =>  'true',
                            'buttonImage'       =>  "'" . SHIN_Core::get_theme_url_path() . '/images/calculator.png' . "'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#invocation2'));
    
    //Focus and button trigger:
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('showOn'            =>  "'both'",
                            'buttonImage'       =>  "'" . SHIN_Core::get_theme_url_path() . '/images/calculator.png' . "'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#invocation3'));
    
    //Operator entry only (any non-numeric)
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('showOn'            =>  "'operator'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#invocation4'));
    
    //Operator entry customised
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('showOn'            =>  "'operator'",
                            'isOperator'        =>  "mathsOnly"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#invocation5'));
    
    //Operator entry or button
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('showOn'            =>  "'opbutton'",
                            'buttonImageOnly'   =>  'true',
                            'buttonImage'       =>  "'" . SHIN_Core::get_theme_url_path() . '/images/calculator.png' . "'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#invocation6'));
    
    //Layout example - custom layout
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('layout'            => "['MC_0_._=_+' + $.calculator.CLOSE, 'MR_1_2_3_-' + $.calculator.USE, 'MS_4_5_6_*' + $.calculator.ERASE, 'M+_7_8_9_/']",
                            'showOn'            => '"both"',
                            'buttonImageOnly'   => 'true',
                            'buttonImage'       => "'" . SHIN_Core::get_theme_url_path() . '/images/calculator.png' . "'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#layout'));
    
    //Scientific Layout
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('layout'            => "$.calculator.scientificLayout",
                            'showOn'            => '"both"',
                            'buttonImageOnly'   => 'true',
                            'buttonImage'       => "'" . SHIN_Core::get_theme_url_path() . '/images/calculator.png' . "'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#layout2'));
    
    //Styling example
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('calculatorClass'   =>  "'withBG'",
                            'showOn'            =>  "'both'",
                            'buttonImageOnly'   =>  'true',
                            'buttonImage'       =>  "'" . SHIN_Core::get_theme_url_path() . '/images/calculator.png' . "'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#styling'));
    
    //Callback keys example - open event
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('onOpen' => 'showOpen'));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#callback'));
    
    // on button event
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('onButton'          => 'showButton',
                            'showOn'            => "'both'",
                            'buttonImageOnly'   => 'true',
                            'buttonImage'       => "'" . SHIN_Core::get_theme_url_path() . '/images/calculator.png' . "'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#callback2'));
    
    // on close event
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('onClose'           => 'showClose',
                            'showOn'            => "'both'",
                            'buttonImageOnly'   => 'true',
                            'buttonImage'       => "'" . SHIN_Core::get_theme_url_path() . '/images/calculator.png' . "'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#callback3'));
    
    //Regional example
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->init(array('closeText' =>  "'HEHE'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#regional'));
    
    //Animation example - slow example
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->setAnimation('show', 'slow');
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#animation'));
    
    //fast example
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->setAnimation('show', 'fast');
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#animation2'));
    
    //Custom keys example
    $calculator     = SHIN_Core::$_libs['calculator']->get_instance();
    $calculator->addKey('in', '++', 'unary', 'increment', 'mykey', 'INC', ']');
    $calculator->addKey('de', '--', 'unary', 'decrement', 'mykey', 'DEC', '[');
    $calculator->init(array('layout'            => "['  _7_8_9_+' + $.calculator.CLOSE, 'in_4_5_6_-' + $.calculator.USE, 'de_1_2_3_*' + $.calculator.ERASE, '  _0_._=_/']",
                            'showOn'            => '"both"',
                            'buttonImageOnly'   => 'true',
                            'buttonImage'       => "'" . SHIN_Core::get_theme_url_path() . '/images/calculator.png' . "'"));
    SHIN_Core::$_jsmanager->addComponent($calculator->render('#keys'));
    
    //render main example template
    SHIN_Core::finalrender('calculator');

/* End of file calculator.php */
/* Location: example/calculator.php */
