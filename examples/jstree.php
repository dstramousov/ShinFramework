<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Js Tree.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Tree
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
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Js_Tree',
                            )
                         );

    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
  
    // get instance of templater component
    $page            = SHIN_Core::$_libs['templater']->get_instance();
    // get instance of jstree component
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    //basic tree example
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html'));
     
    // examples with async data load
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    $options                                =   array();
    $options['html_data']['ajax']['url']    =   '"jstree/async_html_data.txt"';
    
    $jsTree->init($options); 
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html2'));
    
    // example with checkbox plugin
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    $options                                =   array();
    $options['html_data']['ajax']['url']    =   '"jstree/async_html_data.txt"';
    $options['plugins']                     =   '["themes", "html_data", "ui", "checkbox"]';
    
    $jsTree->init($options); 
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html3'));
    
    // example with checkbox plugin
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    SHIN_Core::$_jsmanager->insertJSFromFile(base_url() . '/jstree/contextmenu.js');
    
    $options                                =   array();
    $options['html_data']['ajax']['url']    =   '"jstree/async_html_data.txt"';
    $options['plugins']                     =   '["themes", "html_data", "ui", "crrm", "contextmenu"]';
    $options['contextmenu']['items']        =   'contextmenu';
    
    $jsTree->init($options); 
      
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html4'));
    
    // example save state in cookie session
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    SHIN_Core::$_jsmanager->insertJSFromFile(base_url() . '/jstree/contextmenu.js');
    
    $options                                =   array();
    $options['plugins']                     =   '["themes", "html_data", "ui", "cookies"]';
    
    $jsTree->init($options); 
      
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html5'));
    
    // xml_data plugin
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    $options                                =   array();
    $options['plugins']                     =   '["themes", "xml_data"]';
    $options['xml_data']                    =   '{ ajax : { url : "jstree/_xml_nest.xml" },
                                                   xsl : "nest"
                                                 }';    
    $jsTree->init($options); 
      
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html6'));
    
    // Using both the data & ajax config options (flat)
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    $options                                =   array();
    $options['plugins']                     =   '["themes", "xml_data"]';
    $options['xml_data']                    =   '{ ajax : {
                                                            "url" : "jstree/_xml_flat.xml",
                                                            "data" : function (n) {
                                                                return {
                                                                    id : n.attr ? n.attr("id") : 0,
                                                                    rand : new Date().getTime()
                                                                };
                                                            }
                                                        }
                                                 }';    
    $jsTree->init($options); 
      
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html7'));
    
    // Using the UI plugin
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    $options                                =   array();
    $options['plugins']                     =   '["themes", "html_data", "ui"]';
    $options['ui']                          =   '{"select_limit" :                  2, 
                                                   "select_multiple_modifier"  :    "alt", 
                                                   "selected_parent_close"  :       "select_parent", 
                                                   "initially_select"  :            ["phtml_99"]}';
    $options['core']                        =   '{ "initially_open"  : [ "phtml_99"  ]}';   
    
    
    $jsTree->init($options); 
      
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html8'));
    
     // Using the dnd plugin
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    $options                                =   array();
    $options['plugins']                     =   '["themes", "html_data", "dnd"]';
    $options['dnd']                         =   '{"drop_finish" : function () {
                                                                    alert("DROP");
                                                                }},
                                                  "drag_finish" : function () {
                                                                    alert("DRAG OK");
                                                                  }              ';
    
    
    $jsTree->init($options); 
      
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html9'));
    
    // Using the hotkeys plugin
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    $options                                =   array();
    $options['plugins']                     =   '["themes", "html_data", "ui", "crrm", "hotkeys"]';
    $options['core']                        =   ' { "initially_open"  : ["phtml_200"] }';
    
    
    $jsTree->init($options); 
      
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html10'));
    
    // Using the search plugin
                       SHIN_Core::$_jsmanager->addComponent('$("#search_btn").click(function () {
                                                                 $("#basic_html11").jstree("search", $("#search").val());
                                                              });'); 
    $jsTree          = SHIN_Core::$_libs['js_tree']->get_instance();
    
    $options                                =   array();
    $options['plugins']                     =   '["themes", "html_data", "search"]';
    
    $jsTree->init($options); 
      
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render('basic_html11'));
       
    //render main example template
    SHIN_Core::finalrender('jstree');
    
/* End of file jstree.php */
/* Location: example/jstree.php */

