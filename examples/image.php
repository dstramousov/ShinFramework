<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Datepicker.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	Image manipulation.
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
                                'SHIN_Database',
                                'SHIN_Benchmark',
                                'SHIN_Input'
                            ),
                            
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Image'
                            ),
                         );
    
    // init fw core using needed components                     
    SHIN_Core::init($nedded_libs);        

    // check user action
    if (SHIN_Core::$_input->post('do')) {
        // load image
        $image = SHIN_Image::load('myimg');
        // resize image 
        $resized = $image->resize(1000, 1000);
        // send image to user
        $resized->output('jpg', 90);
    } else {
        //render main example template
        SHIN_Core::finalrender('image');
    }

/* End of file image.php */
/* Location: example/image.php */