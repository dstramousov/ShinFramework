<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with panels.
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
    
    //init JavaScript callback function
    $panelData                        = array();
    $panelData['events']['init']      = 'ajaxCollbackFunction';
    
    
    // get panel list from DB
    $panelParams  = SHIN_Core::$_models['panel_model']->getPanelParams();
    
    /**
    * init needed panel params
    * 
    * - url where all pabel conditions where save
    * - model name for panels
    */
    $options    = array('ajax_url'   =>  shinfw_base_url() . '/' . shinfw_folder() . '/connectors/savestate.php',
                        'model_name' =>  'examples_panel');
    
    
    // init panel component using needed options
    $panels->init($options);  
    // set panel list
    $panels->setPanelData('panelList', $panelParams, $panelData);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['panels']->render());
    // include into document JavaScript file with ajaxCollbackFunction function 
    SHIN_Core::$_jsmanager->insertJSFromFile(array(SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . SHIN_Core::$_config['core']['shinfw_folder'] . '/js/panels/panels.js'));
    //render main example template
    SHIN_Core::finalrender('panels_with_ajax');

/* End of file panels_with_ajax_data.php */
/* Location: example/panels_with_ajax_data.php */

