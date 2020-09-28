<?php

    require_once("../../shinfw/shinfw.php");
    $nedded_libs = array(   'core'      => array('SHIN_Database'),
                            'models'    => array(array('examples_geo_model', 'geo_model')),
                         );


    SHIN_Core::init($nedded_libs);
    
    $lat    =   $_REQUEST['lat'];
    $lng    =   $_REQUEST['lng'];
    
    SHIN_Core::$_models['geo_model']->insertOneRec(array('lat' => $lat, 'lng' => $lng, 'username' => 'dddd'));