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
                                'SHIN_Database',
                                'SHIN_Language',
                                'SHIN_Input'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Charts_Multi',
                            ),
                            
                            'models'=> array(array('examples_panel_model', 'panel_model'))
                         );


    SHIN_Core::init($nedded_libs);
    
    $multiCharts     = SHIN_Core::$_libs['charts_multi']->get_instance();
    
    $height          = SHIN_Core::$_input->post('height');
    $width           = SHIN_Core::$_input->post('width');
    $panelId         = SHIN_Core::$_input->post('panel_id');
    
    switch($panelId) {
        case 'links':
            
            // multi-series charts
            $ch_data = array(
                                'type'              => 'c2d',
                                'xval'              =>  array(array('name' => 'Austria'),
                                                              array('name' => 'Brazil'), 
                                                              array('name' => 'France'), 
                                                              array('name' => 'Germany'), 
                                                              array('name' => 'USA')),
                                'yval'              =>  array('1996' => array('data'    =>  array(array('value' => '123'), 
                                                                                                  array('value' => '345', 'color' => '123456'), 
                                                                                                  array('value' => '456', 'color' => '123456'), 
                                                                                                  array('value' => '567', 'color' => '123456'), 
                                                                                                  array('value' => '12',  'color' => '123456'))
                                                                              ),
                                                              '1997' => array('data'    =>  array(array('value' => '333'), 
                                                                                                  array('value' => '111', 'color' => '123456'), 
                                                                                                  array('value' => '123', 'color' => '123456'), 
                                                                                                  array('value' => '541', 'color' => '123456'), 
                                                                                                  array('value' => '211', 'color' => '123456'))
                                                                              )
                                                              ) 
                            );
            
            $options = array('width'    => $width && $width > 10   ? $width  : 550,
                             'height'   => $height && $height > 10 ? $height : 350);
            
            $multiCharts->init($options);
            $multiCharts->combinedInit($ch_data);
            
            SHIN_Core::$_libs['templater']->assign('jsCode',     $multiCharts->render('#msColumn2D'));
            SHIN_Core::$_libs['templater']->assign('msColumn2D', true);
            
            break;
            
        case 'images':
            // multi-series charts
            $ch_data = array(
                        'type'              => 'c3d',
                        'xval'              =>  array(array('name' => 'Austria'),
                                                      array('name' => 'Brazil'), 
                                                      array('name' => 'France'), 
                                                      array('name' => 'Germany'), 
                                                      array('name' => 'USA')),
                        'yval'              =>  array('1996' => array('data'    =>  array(array('value' => '123'), 
                                                                                          array('value' => '345', 'color' => '123456'), 
                                                                                          array('value' => '456', 'color' => '123456'), 
                                                                                          array('value' => '567', 'color' => '123456'), 
                                                                                          array('value' => '12',  'color' => '123456'))
                                                                      ),
                                                      '1997' => array('data'    =>  array(array('value' => '333'), 
                                                                                          array('value' => '111', 'color' => '123456'), 
                                                                                          array('value' => '123', 'color' => '123456'), 
                                                                                          array('value' => '541', 'color' => '123456'), 
                                                                                          array('value' => '211', 'color' => '123456'))
                                                                      )
                                                      ) 
                    );
            
            $options = array('width'    => $width && $width > 10   ? $width  : 550,
                             'height'   => $height && $height > 10 ? $height : 350);
            
            $multiCharts->init($options);
            $multiCharts->combinedInit($ch_data);
            
            SHIN_Core::$_libs['templater']->assign('jsCode', $multiCharts->render('#msColumn3D'));
            SHIN_Core::$_libs['templater']->assign('msColumn3D', true);
            break;
    }
    
    SHIN_Core::finalrender('ajax_charts');


