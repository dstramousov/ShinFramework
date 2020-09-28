<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Autocomplete.
 *
 * @package      ShinPHP framework
 * @subpackage   Example
 * @category     Autocomplete
 * @author        
 * @link        
 */
    // include main fw file
    require_once("../shinfw/shinfw.php");
    
    // array of libs, models, helpers, core components
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_JSManager',
                                'SHIN_CSSManager'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Autocomplete'
                            ),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
      
    //default - retrive data from internal JavaScript variable - availableTags
    $options              = array('source' => 'availableTags');
    // get instance of autocomplete plugin  
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    // init plugin using needed options
    $defaultAutocomplete->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#default_example'));
    
    // with datasource - retrive data from external source
    $options              = array('source'      => 'autocomplete/suggestions.php',
                                  'source_type' => 'external');  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#remoute_datasource_example'));
    
    // with caching - using JavaScript function - caching for retriving data
    $options              = array('source'    => 'caching',
                                  'minLength' => 2);  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#remoute_with_caching_datasource_example'));
    
     // jsonp example - retrive data from external crossdomain source using JSONP
    $options              = array('source'    => 'remoteJsonp',
                                  'minLength' => 2);  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#remoute_jsonp_with_caching_datasource_example'));
    
    // scrollable example
    $options              = array('source'    => 'remoteJsonp',
                                  'minLength' => 2);  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#combobox'));
    
    // combobox example
    $options              = array('minLength' => 0);  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    // set combobox data
    $defaultAutocomplete->setCombobox('projects', 'projectsFocus', 'projectsSelect');
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#project'));
    
    // XML example - retrive information from XML file
    $options              = array('source'    => 'data',
                                  'minLength' => 0);  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    
    SHIN_Core::$_libs['templater']->assign('autocomplete', $defaultAutocomplete->render('#xml_example'));
    
    // Categories example
    $options              = array('source'  => 'categories',
                                  'delay'   => 0);  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    $defaultAutocomplete->setCategories(true, 'catcomplete');
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#categories'));
    
    // Accent folding example
    $options              = array('source'  => 'accentFolding');  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#accent_folding'));
    
    // Multiple values example
    $options              = array('minLength'   => 0);  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    
    // set source and callback functions
    $defaultAutocomplete->setMultiple('multipleSource', 'multipleFocus', 'multipleSelect');
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#multiple_values'));
    
    // Multiple, remote example
    $options              = array('minLength'   => 0);  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    // set source and collbacks for remote
    $defaultAutocomplete->setRemoteMultiple('multipleRemoteSource', 'multipleRemoteFocus', 'multipleRemoteSelect', 'multipleRemoteSearch');
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#multiple_remote_values'));
    
    //render main example template
    SHIN_Core::finalrender('autocomplete');

/* End of file autocomplete.php */
/* Location: example/autocomplete.php */

?>