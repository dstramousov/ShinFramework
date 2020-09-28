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
                                'SHIN_Charts_Single'
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
    $singleCharts    = SHIN_Core::$_libs['charts_single']->get_instance();
    // get instance of templater component
    $page            = SHIN_Core::$_libs['templater']->get_instance();
    //get instance of panel component
    $panels          = SHIN_Core::$_libs['panels']->get_instance();
    
    // get panel list from DB
    $panelData  = SHIN_Core::$_models['panel_model']->getPanelParams();
    
    /**
    * init needed panel params
    * 
    * - url where all panel conditions where save
    * - model name for panels
    */
    $options    = array('ajax_url'   =>  shinfw_base_url() . '/' . shinfw_folder() . '/connectors/savestate.php',
                        'model_name' =>  'examples_panel');
    
    // init panel component using needed options
    $panels->init($options);  
    // set panel list
    $panels->setPanelData('panelList', $panelData);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['panels']->render());
    
    //render main example template
    SHIN_Core::finalrender('panels');
 
/* End of file panels_basic.php */
/* Location: example/panels_basic.php */

