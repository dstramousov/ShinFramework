<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Text Editor.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Text Editor
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
                                'SHIN_Text_Editor',
                            ),
                         );

    // init fw core using needed components
    SHIN_Core::init($nedded_libs);
	
    // get templater component instance
    $page           = SHIN_Core::$_libs['templater']->get_instance();
    
    // get text editor component instance
    $textEditor1    = SHIN_Core::$_libs['text_editor']->get_instance();
    
    // init text editor component options
    $options                                = array();
    $options['advanced']['mode']            =   'exact';  
    $options['advanced']['elements']        =   'advanced-text-editor';
    $options['advanced']['skin']            =   'o2k7';
    $options['advanced']['skin_variant']    =   'silver';
    
    // init component using needed options
    $textEditor1->init($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['text_editor']->render('advanced-text-editor'));
    
    // simple editor
    // get text editor component instance
    $textEditor2    = SHIN_Core::$_libs['text_editor']->get_instance();
    
    // init text editor component options
    $options                          =   array();
    $options['default_theme']         =   'simple';
    $options['simple']['mode']        =   'exact';  
    $options['simple']['elements']    =   'simple-text-editor';  
    
    // init component using needed options
    $textEditor2->init($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['text_editor']->render('simple-text-editor'));
    
    // simple readonly editor
    // get text editor component instance
    $textEditor3    = SHIN_Core::$_libs['text_editor']->get_instance();
    
    // init text editor component options
    $options                          =   array();
    $options['default_theme']         =   'simple';
    $options['simple']['readonly']    =   true;
    $options['simple']['elements']    =   'simple-text-editor-readonly';
    
    // init component using needed options    
    $textEditor3->init($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['text_editor']->render('simple-text-editor-readonly'));
    
    // editor with skin
    $textEditor4    = SHIN_Core::$_libs['text_editor']->get_instance();
    
    // init text editor component options
    $options                            =    array();
    $options['default_theme']           =   'advanced';
    $options['advanced']['mode']        =   'exact';  
    $options['advanced']['elements']    =   'file-image-managers';
    $options['advanced']['plugins']     =   'imagemanager, filemanager';
    
    $options['advanced']['theme_advanced_buttons1'] =   'insertfile,insertimage';
    $options['advanced']['theme_advanced_buttons2'] =   '';
    $options['advanced']['theme_advanced_buttons3'] =   '';
    $options['advanced']['theme_advanced_buttons4'] =   '';
    
    // init component using needed options    
    $textEditor4->init($options);
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['text_editor']->render('file-image-managers'));
    
    //render main example template
    SHIN_Core::finalrender('texteditor');
 
 /* End of file text_editor.php */
/* Location: example/text_editor.php */

