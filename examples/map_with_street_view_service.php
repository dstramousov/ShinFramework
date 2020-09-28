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
    
    // example with markers
    $options = array(
        'container'         => 'gmaps',
        'viewContainer'     => 'pano',
        'zoom'              =>  14,
        'heading'           =>  34,
        'pitch'             =>  10,
        'sZoom'             =>  1,
    );
    
    // allow to show street view
    $maps->gMapsSetAllowStreetView(true);
    // allow to show street service
    $maps->gMapsSetAllowStreetViewService(true);
    
    // init component using needed options
    $maps->init($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['maps']->render('gmaps'));
    
    //render main example template
    SHIN_Core::finalrender('maps/map_with_street_view_service');

/* End of file map_with_street_view_service */
/* Location: examples/map_with_street_view_service.php */
