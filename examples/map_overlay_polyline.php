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
                                'SHIN_Maps',
                            ),
                         );

    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);

    // get instance of templater component
    $page    = SHIN_Core::$_libs['templater']->get_instance();
    // get instance of map component
    $maps    = SHIN_Core::$_libs['maps']->get_instance();
    
    /**
    * init needed options
    * 
    * - map DOM container
    * - center coords
    * 
    */
    $options = array(
        'container'         =>  'gmaps',
        'type'              =>  'TERRAIN',
        'zoom'              =>  12
    );
    
    // init component using needed options
    $maps->init($options);
    
    /**
    * init overlay polygon
    *
    * - init type
    * - init style of polyline using CSS instructions
    * - init polyline coords  
    */
    $maps->gMapsSetAllowOverlay(true, array('params' => array('type'            => 'polyline',
                                                              'strokeColor'     => '#FF0000',
                                                              'strokeOpacity'   => 0.8,
                                                              'strokeWeight'    => 2,
                                                              'fillColor'       => '#FF0000',
                                                              'fillOpacity'     => 0.35),
                                            'data'   => array(array(45.4636889, 9.1881408),
                                                              array(45.4327172, 9.17824))
                                            )
    );
                                               
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['maps']->render('gmaps'));
    
    //render main example template
    SHIN_Core::finalrender('maps/map_overlay');

/* End of file map_overlay_polyline */
/* Location: examples/map_overlay_polyline.php */

