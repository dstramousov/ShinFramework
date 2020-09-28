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
                            
                            'models' => array(
                                array('examples_geo_model', 'geo_model')
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
    * set AJAX url for setting markers
    * set AJAX url for getting markers
    */
    $options = array(
        'container'             => 'gmaps',
        'set_marker_ajax_url'   => base_url() . '/map/set_coords.php',
        'get_marker_ajax_url'   => base_url() . '/map/get_coords.php'
    );
    
    // init component using needed options
    $maps->init($options);
    
    // allow to set ajax markers on the map
    $maps->gMapsSetAllowAjaxMarkers(true);
    // disallow build polygons and polylines
    $maps->gMapsSetAllowBuildPolygon(false);
    $maps->gMapsSetAllowBuildPolyline(false);
    // add reset button and connect it to JavaScript collbacl function
    $maps->addButtonLogic(array('reset' => 'resetMarkers'));
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['maps']->render('gmaps'));
    
    //render main example template
    SHIN_Core::finalrender('maps/map_ajax_markers');

/* End of file map_ajax_markers.php */
/* Location: examples/map_ajax_markers.php */
