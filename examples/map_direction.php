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
    
    // init main DOM container
    $options = array(
        'container'         => 'gmaps',
        'centerLatitude'    => 37.7699298,
        'centerLongitude'   => -122.4469157,
        'zoom'              => 14
    );
    
    // init component using needed options
    $maps->init($options);
    // allow to show direction on the map
    $maps->gMapsSetAllowDirections(true, array('showPanel'          => true, 
                                               'panelContainer'     => 'directionsPanel',
                                               'updateContainer'    => 'mode'));
    // add buttons for reset, make direction and update actions and connect to JavaScript callback                                           
    $maps->addButtonLogic(array('reset' => 'resetMarkers', 'direction' => 'calcRoute', 'update' => 'updateMode'));
    
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['maps']->render('gmaps'));
    
    //render main example template
    SHIN_Core::finalrender('maps/map_direction');

/* End of file map_direction.php */
/* Location: examples/map_direction.php */

