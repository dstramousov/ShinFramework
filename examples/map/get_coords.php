<?php

    require_once("../../shinfw/shinfw.php");
    $nedded_libs = array(   'core'      => array('SHIN_Database'),
                            'models'    => array(array('examples_geo_model', 'geo_model')),
                         );


    SHIN_Core::init($nedded_libs);
    
    $markers = SHIN_Core::$_models['geo_model']->fetchLatestIntervals();
    
    
    echo json_encode($markers);