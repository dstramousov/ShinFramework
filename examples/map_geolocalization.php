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
    * init needed options
    * - map DOM container
    * - set URL from markers was loading
    * - set map zoom
    * - center map coords
    * - set map width
    */
    $options = array(
        'container'             => 'gmaps',
        'get_marker_ajax_url'   => base_url() . '/map/get_geolocalization_coords.php',
        'zoom'                  => 12,
        'width'                 => 900
    );
    
    // allow to set ajax markers
    $maps->gMapsSetAllowAjaxMarkers(true);
    // init map with needed options
    $maps->init($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['maps']->render('gmaps'));
    
    //render main example template
    SHIN_Core::finalrender('maps/map_geolocalization');

/* End of file map_geolocalization.php */
/* Location: examples/map_geolocalization.php */
