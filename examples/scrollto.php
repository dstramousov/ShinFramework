<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with ScrollTo.
 *
 * @package      ShinPHP framework
 * @subpackage   Example
 * @category     ScrollTo
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
                                array('SHIN_Templater'=>'examples')),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    // load scrollto js file
    SHIN_Core::$_jsmanager->addIncludes(prep_url(shinfw_base_url() . '/' . shinfw_folder() . '/js/jquery/jquery-1.5.1.js')); 
    SHIN_Core::$_jsmanager->addIncludes(prep_url(shinfw_base_url() . '/' . shinfw_folder() . '/js/scrollto/jquery.scrollTo-1.4.2-min.js')); 
    
    
    //render main example template
    SHIN_Core::finalrender('scrollto');

/* End of file scroll.php */
/* Location: example/acroll.php */

?>