<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Carousel.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Carousel
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
                                'SHIN_Carousel',
                                'SHIN_Lightbox'
                            ),
                         );
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    // get component instance
    $carousel     = SHIN_Core::$_libs['carousel']->get_instance();
    
    // basic carousel
    $options      = array('buttonLeft'  =>  '$("#left-but")',  
                          'buttonRight' =>  '$("#right-but")',
                          'altBox'      =>  '$("#alt-text")',
                          'titleBox'    =>  '$("#title-text")');
    
    // init component using needed options
    $carousel->init($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['carousel']->render('carousel1'));
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['lightbox']->render('a[rel^=\'lightbox\']'));
    
    
    // carousel with auto-rotation
    $options      = array('buttonLeft'      =>  '$("#left-but2")',  
                          'buttonRight'     =>  '$("#right-but2")',
                          'altBox'          =>  '$("#alt-text2")',
                          'titleBox'        =>  '$("#title-text2")',
                          'autoRotate'     =>  "'right'",
                          'autoRotateDelay' =>  1500,
                          'speed'           =>  0.2);
    
    // init component using needed options
    $carousel->init($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['carousel']->render('carousel2')); 
    
    //render main example template
    SHIN_Core::finalrender('carousel');

/* End of file carousel.php */
/* Location: example/carousel.php */
