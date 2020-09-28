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
    
    require_once("../../shinfw/shinfw.php");
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


    SHIN_Core::init($nedded_libs);

    $page    = SHIN_Core::$_libs['templater']->get_instance();
    $maps    = SHIN_Core::$_libs['maps']->get_instance();
    
    $addressList    =   array(array('id' => 1, 'data' => 'Milano'), 
                              array('id' => 2, 'data' => 'Milano, Stadera'),
                              array('id' => 3, 'data' => 'Milano, Feltre'),
                              array('id' => 4, 'data' => 'Milano, Goria'),
                              array('id' => 5, 'data' => 'Milano, Rodano'),
                              array('id' => 6, 'data' => 'Milano, Precotto'),
                              array('id' => 7, 'data' => 'Milano, Dergano'));
    
    $data       =   $maps->batchGeolocalization($addressList);     
    $jsonData   =   array();
    
    foreach($data as $value) {
        $jsonData[] =   array('lat' => $value['lat'],
                              'lng' => $value['lng']);    
    }
    
    echo json_encode($jsonData);

