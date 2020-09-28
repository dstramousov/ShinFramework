<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with DDMenu.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Drop Down Menu
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
                                'SHIN_DDMenu',
                            )
                         );

    // init fw core using needed components
    SHIN_Core::init($nedded_libs);

    // get instance of templater component
    $page            = SHIN_Core::$_libs['templater']->get_instance();
    //get instance of ddmenu component
    $ddmenu          = SHIN_Core::$_libs['ddmenu']->get_instance();
    
    // init component using needed data(links or sublinks)
    $menuData        = array(array('text' => 'JavaScript', 'data' => array(array('type' => 'link', 'text' => 'Drop Down Menu', 'link' => '#'),
                                                                           array('type' => 'link', 'text' => 'jQuery Plugin',  'link' => '#'))),
                             array('text' => 'Effect',     'data' => array(array('type' => 'link', 'text' => 'Slide Effect',   'link' => '#'),
                                                                           array('type' => 'link', 'text' => 'Fade Effect',    'link' => '#'),
                                                                           array('type' => 'link', 'text' => 'Opacity Mode',   'link' => '#'),
                                                                           array('type' => 'link', 'text' => 'Drop Shadow',    'link' => '#'),                                                                               
                                                                           array('type' => 'link', 'text' => 'Ajax Navigation','link' => '#'),
                                                                           array('type' => 'link', 'text' => 'Semitransparent','link' => '#', 'data' => array(array('type' => 'link', 'text' => 'Fade Effect',    'link' => '#'),
                                                                                                                                                              array('type' => 'link', 'text' => 'Opacity Mode',   'link' => '#'))))),
                             array('text' => 'Effect',     'link' => 'http://www.google.com'),
                             array('text' => 'HTML/CSS',   'link' => 'http://www.google.com'));
    
    
    // initialize component
    $ddmenu->setMenuData('ddmenu', $menuData);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['ddmenu']->render());
    
    //render main example template
    SHIN_Core::finalrender('ddmenu');
 
/* End of file ddmenu.php */
/* Location: example/ddmenu.php */

