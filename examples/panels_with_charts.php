<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Panels.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Panel
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
                                'SHIN_Database',
                                'SHIN_Language'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Panels',
                                'SHIN_Charts_Multi'
                            ),
                            
                            'models'=> array(array('examples_panel_model', 'panel_model'))
                         );

    // init fw core using needed components
    SHIN_Core::init($nedded_libs);
    // get selected language
    if(isset($_GET['lang'])){
        $lang   =   $_GET['lang'];
    } else {
        $lang   =   'en';
    } 
    
    // load language data for current language
                       SHIN_Core::$_language->load('app', $lang);
    // get instance of chart component
    $multiCharts     = SHIN_Core::$_libs['charts_multi']->get_instance();
    // get instance of templater component
    $page            = SHIN_Core::$_libs['templater']->get_instance();
    //get instance of panel component
    $panels          = SHIN_Core::$_libs['panels']->get_instance();
    
   
    //init data for multi-series chart
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
    
    // init needed options for chart
    $options = array('width'    => 550,
                     'height'   => 350);
    
    $multiCharts->init($options);
    
    // initialize charts using needed parameters
                                         $multiCharts->combinedInit($ch_data);
    SHIN_Core::$_jsmanager->addComponent($multiCharts->render('#msColumn2D'));
    
    // initialize charts using needed parameters                                     
                                         $multiCharts->combinedInit(array_merge($ch_data, array('type' => 'c3d')));
    SHIN_Core::$_jsmanager->addComponent($multiCharts->render('#msColumn3D'));
                    
    
    /**
    *  init needed options for panels 
    * - init empty divs with id for charts
    */
    $panelData           = array();
    $panelData['links']  = '<div id="msColumn2D"></div>';
    $panelData['images'] = '<div id="msColumn3D"></div>'; 
    
    
    // get panel list from DB
    $panelParams  = SHIN_Core::$_models['panel_model']->getPanelParams();
    
    /**
    * init needed options for panels
    * - url where all panel conditions where save
    * - model name for panels
    */
    $options    = array('ajax_url'   =>  shinfw_base_url() . '/' . shinfw_folder() . '/connectors/savestate.php',
                        'model_name' =>  'examples_panel');
    
    
    // init component options
    $panels->init($options);  
    // init component data
    $panels->setPanelData('panelList', $panelParams, $panelData);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['panels']->render());
    //render main example template
    SHIN_Core::finalrender('panels');
    
/* End of file panels_with_charts.php */
/* Location: example/panels_with_charts.php */

