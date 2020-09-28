<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Button.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Button
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
                                'SHIN_Button'
                            ),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    
    //default example
    $button     = SHIN_Core::$_libs['button']->get_instance();
    // add click event to the button
    $options    = array('click' => 'showAlert');
    // init component using needed options
    $button->init($options);
    
    // add component to the page
    SHIN_Core::$_jsmanager->addComponent($button->render('#default_button')); 
    
    //readios example
    $radios     = SHIN_Core::$_libs['button']->get_instance();
    // add component to the page using renderButtonSet method 
    SHIN_Core::$_jsmanager->addComponent($radios->renderButtonSet('#radio'));
    
    //checkboxes example
    $checkboxes = SHIN_Core::$_libs['button']->get_instance();
    // add component to the page using renderButtonSet method 
    SHIN_Core::$_jsmanager->addComponent($checkboxes->renderButtonSet('#format')); 
    SHIN_Core::$_jsmanager->addComponent($checkboxes->render('#check'));
    
    //icons example - add icon to the button using CSS class
    $options   = array('icons' => "{primary: 'ui-icon-locked'}", 
                       'text'  => 'false'); 
    $firstBtn  = SHIN_Core::$_libs['button']->get_instance();
    $firstBtn->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($firstBtn->render('#first_btn'));
    
    // add primary and secondary icons to the button using CSS class
    $options   = array('icons' => "{primary: 'ui-icon-locked', secondary: 'ui-icon-triangle-1-s'}"); 
    $therdBtn  = SHIN_Core::$_libs['button']->get_instance();
    $therdBtn->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($therdBtn->render('#therd_btn'));
    
    $options   = array('icons' => "{primary: 'ui-icon-locked', secondary: 'ui-icon-triangle-1-s'}",
                       'text'  => 'false'); 
    $fothBtn  = SHIN_Core::$_libs['button']->get_instance();
    $fothBtn->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($fothBtn->render('#foth_btn'));
    
    //split button example - add event to the first part of the button
    $options   = array('click' => 'firstButtonClick'); 
    $returnBtn  = SHIN_Core::$_libs['button']->get_instance();
    $returnBtn->init($options); 
    
    SHIN_Core::$_jsmanager->addComponent($returnBtn->render('#rerun'));
    
    // add event to the second part of the button 
    $options   = array('click' => 'secondButtonClick', 
                       'text'  => 'false',
                       'icons' => '{primary: "ui-icon-triangle-1-s"}' ); 
    $selectBtn  = SHIN_Core::$_libs['button']->get_instance();
    $selectBtn->init($options); 
    
    SHIN_Core::$_jsmanager->addComponent($selectBtn->render('#select'));
    
    $buttonSet = SHIN_Core::$_libs['button']->get_instance(); 
    SHIN_Core::$_jsmanager->addComponent($buttonSet->renderButtonSet('#split_button'));
    
    //toolbar example - add many button
    $options   = array('text'  => 'false',
                       'icons' => '{primary: "ui-icon-seek-start"}'); 
    $beginningBtn  = SHIN_Core::$_libs['button']->get_instance();
    $beginningBtn->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($beginningBtn->render('#beginning'));
    
    $options   = array('text'  => 'false',
                       'icons' => '{primary: "ui-icon-play"}',
                       'click' => 'playClicked'); 
    $playBtn  = SHIN_Core::$_libs['button']->get_instance();
    $playBtn->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($playBtn->render('#play'));
    
    $options   = array('text'  => 'false',
                       'icons' => '{primary: "ui-icon-seek-prev"}'); 
    $rewindBtn  = SHIN_Core::$_libs['button']->get_instance();
    $rewindBtn->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($rewindBtn->render('#rewind'));
    
    $options   = array('text'  => 'false',
                       'icons' => '{primary: "ui-icon-stop"}',
                       'click' => 'stopClicked'); 
    $stopBtn  = SHIN_Core::$_libs['button']->get_instance();
    $stopBtn->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($stopBtn->render('#stop'));
    
    $options   = array('text'  => 'false',
                       'icons' => '{primary: "ui-icon-seek-next"}'); 
    $forwardBtn  = SHIN_Core::$_libs['button']->get_instance();
    $forwardBtn->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($forwardBtn->render('#forward'));
    
    $options   = array('text'  => 'false',
                       'icons' => '{primary: "ui-icon-seek-end"}'); 
    $endBtn  = SHIN_Core::$_libs['button']->get_instance();
    $endBtn->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($endBtn->render('#end'));
    
    $options     = array('label' => '"shuffle"');
    $shuffleBtn  = SHIN_Core::$_libs['button']->get_instance();
    $shuffleBtn->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($shuffleBtn->render('#shuffle'));
    
    $options     = array('label' => '"shuffle"');
    $repeatBtn  = SHIN_Core::$_libs['button']->get_instance();
    $repeatBtn->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($repeatBtn->renderButtonSet('#repeat'));
    
    //render main example template
    SHIN_Core::finalrender('button');

/* End of file button.php */
/* Location: example/button.php */
