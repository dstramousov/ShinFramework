<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Zoom.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Zoom
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
                                'SHIN_Zoom'
                            ),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    // basic example
    // get instance fo component
    $zoom     = SHIN_Core::$_libs['zoom']->get_instance();
    // init needed data
    $options  = array('data'    =>  array('container'   => 'zoom1',
                                          'bigimage'    =>  prep_url(base_url()) . '/uploads/zoom/bigimage00.jpg',
                                          'smallimage'  =>  prep_url(base_url()) . '/uploads/zoom/smallimage.jpg',
                                          'alt'         =>  '',
                                          'title'       =>  'Optional title display',
                                          'class'       =>  'cloud-zoom',
                                          'id'          =>  'zoom1',
                                          'adjustX'     =>  1,
                                          'adjustY'     =>  -4));
    // initialize component using needed data      
    $zoom->combinedInit($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['zoom']->render());
    
    // example with gallery
    // get instance fo component
    $zoom     = SHIN_Core::$_libs['zoom']->get_instance();
    // init needed data
    $options  = array('data'    =>  array('container'   => 'zoom2',
                                          'bigimage'    =>  prep_url(base_url()) . '/uploads/zoom/bigimage00.jpg',
                                          'smallimage'  =>  prep_url(base_url()) . '/uploads/zoom/smallimage.jpg',
                                          'alt'         =>  '',
                                          'title'       =>  'Optional title display',
                                          'class'       =>  'cloud-zoom',
                                          'id'          =>  'zoom2',
                                          'adjustX'     =>  1,
                                          'adjustY'     =>  -4),
                      
                      'gallery' =>  array(array('bigimage'  => prep_url(base_url()) . '/uploads/zoom/bigimage00.jpg',
                                                'tinyimage' => prep_url(base_url()) . '/uploads/zoom/tinyimage.jpg',
                                                'smallImage'=> "'" . prep_url(base_url()) . '/uploads/zoom/smallimage.jpg' . "'",
                                                'class'     => 'cloud-zoom-gallery',
                                                'title'     => 'Thumbnail 1',
                                                'useZoom'   => "'zoom2'"),
                                          array('bigimage'  => prep_url(base_url()) . '/uploads/zoom/bigimage01.jpg',
                                                'tinyimage' => prep_url(base_url()) . '/uploads/zoom/tinyimage-1.jpg',
                                                'smallImage'=> "'" . prep_url(base_url()) . '/uploads/zoom/smallimage-1.jpg' . "'",
                                                'class'     => 'cloud-zoom-gallery',
                                                'title'     => 'Thumbnail 2',
                                                'useZoom'   => "'zoom2'"),
                                          array('bigimage'  => prep_url(base_url()) . '/uploads/zoom/bigimage02.jpg',
                                                'tinyimage' => prep_url(base_url()) . '/uploads/zoom/tinyimage-2.jpg',
                                                'smallImage'=> "'" . prep_url(base_url()) . '/uploads/zoom/smallimage-2.jpg' . "'",
                                                'class'     => 'cloud-zoom-gallery',
                                                'title'     => 'Thumbnail 3',
                                                'useZoom'   => "'zoom2'")));
    // initialize component using needed data      
    $zoom->combinedInit($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['zoom']->render());
    
    // example with inner zoomer
    // get instance fo component
    $zoom     = SHIN_Core::$_libs['zoom']->get_instance();
    // init needed data
    $options  = array('data'    =>  array('container'   => 'zoom3',
                                          'bigimage'    =>  prep_url(base_url()) . '/uploads/zoom/bigimage04.jpg',
                                          'smallimage'  =>  prep_url(base_url()) . '/uploads/zoom/smallimage-4.jpg',
                                          'alt'         =>  '',
                                          'title'       =>  'Optional title display',
                                          'class'       =>  'cloud-zoom',
                                          'adjustX'     =>  -4,
                                          'adjustY'     =>  10,
                                          'zoomWidth'   =>  480,
                                          'smoothMove'  =>  5,
                                          'tintOpacity' =>  0.5,
                                          'tint'        =>  "'#ff0000'"));
    
    // initialize component using needed data      
    $zoom->combinedInit($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['zoom']->render());
    
    // example with soft focus
    // get instance fo component
    $zoom     = SHIN_Core::$_libs['zoom']->get_instance();
    // init needed data
    $options  = array('data'    =>  array('container'   => 'zoom4',
                                          'bigimage'    =>  prep_url(base_url()) . '/uploads/zoom/bigimage04.jpg',
                                          'smallimage'  =>  prep_url(base_url()) . '/uploads/zoom/smallimage-4.jpg',
                                          'alt'         =>  '',
                                          'title'       =>  'Optional title display',
                                          'class'       =>  'cloud-zoom',
                                          'adjustX'     =>  -4,
                                          'adjustY'     =>  -4,
                                          'showTitle'   =>  "false",
                                          'position'    =>  "'inside'"));
    
    // initialize component using needed data      
    $zoom->combinedInit($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['zoom']->render());
    
    // example with soft focus
    // get instance fo component
    $zoom     = SHIN_Core::$_libs['zoom']->get_instance();
    // init needed data
    $options  = array('data'    =>  array('container'   => 'zoom5',
                                          'bigimage'    =>  prep_url(base_url()) . '/uploads/zoom/bigimage01.jpg',
                                          'smallimage'  =>  prep_url(base_url()) . '/uploads/zoom/smallimage-1.jpg',
                                          'alt'         =>  '',
                                          'title'       =>  'Optional title display',
                                          'class'       =>  'cloud-zoom',
                                          'softFocus'   =>  'true',
                                          'position'    =>  "'anypos'",
                                          'smoothMove'  =>  2,
                                          'tint'        =>  "false"));
    
    // initialize component using needed data      
    $zoom->combinedInit($options);
    
    //render main example template
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['zoom']->render());
    
 
/* End of file zoom.php */
/* Location: example/zoom.php */
    
    
    
    
    
    
    
    
    
    
    SHIN_Core::finalrender('zoom');

/* End of file dialog.php */
/* Location: example/dialog.php */
