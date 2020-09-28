<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Lightbox.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Lightbox
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
                                'SHIN_Lightbox'
                            ),
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);
    
    // get instance of lightbox plugin
    $lightbox   =   SHIN_Core::$_libs['lightbox']->get_instance();
    // init plugin
    $lightbox->init(array());   
    /**
    * render lightbox component
    * if you need to orginize lighbox gallery, please use only rel attribute for this. For example:
    * <a href="" rel="prettyPhoto[gallery1]"><img src=""/></a>
    * <a href="" rel="prettyPhoto[gallery1]"><img src=""/></a>
    * <a href="" rel="prettyPhoto[gallery1]"><img src=""/></a>
    * 
    * <a href="" rel="prettyPhoto[gallery2]"><img src=""/></a>
    * <a href="" rel="prettyPhoto[gallery2]"><img src=""/></a>
    * <a href="" rel="prettyPhoto[gallery3]"><img src=""/></a>
    * If you connect lightbox plugin to this links, you can see 2 lightbox gallery from 3 images in each gallery
    */
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['lightbox']->render('a[rel^=\'prettyPhoto\']'));
     
    
    //render main example template
    SHIN_Core::finalrender('lightbox');

/* End of file ligthbox.php */
/* Location: example/ligthbox.php */
