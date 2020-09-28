<?php    

/**
 * trk/app/DefaultController.php
 *
 * Realise front-end logic. 
 *
 */

require "CommonController.php";

class PagesController extends CommonController {
    
    /**
    * Constructor
    * 
    * @access public
    * @param null
    * @return null
    */
    function __construct()
    {        
        parent::__construct();
        
        if(!SHIN_Core::$_current_lang)
        {
            $_current_language = '';
            if(SHIN_Core::$_libs['session']->userdata('language')){
                $_current_language = SHIN_Core::$_libs['session']->userdata('language');
            } 

            
            if($_current_language == '') {$_current_language = SHIN_Core::$_config['lang']['language'];}
            ////////////////////////////////////////////////////////////////////

            SHIN_Core::$_language->load('app', $_current_language);
            SHIN_Core::$_current_lang = $_current_language;
            SHIN_Core::log('debug', '[LANGUAGE] Current language: '.SHIN_Core::$_current_lang);
        }
        
        $this->_initSearchForm();        
        $this->_printTopBlock();
        $this->_getRandomPhoto();
    }
    
    function chisiamo()
    {        
        $this->_initSearchForm();        
        $this->_printTopBlock();
        return 'web/chisiamo.tpl';    
    }
    
    function istruzioni()
    {
        $this->_initSearchForm();        
        $this->_printTopBlock();
         return 'web/istrusioni.tpl';    
    }
    
    function faq()
    {        
        $this->_initSearchForm();        
        $this->_printTopBlock();
        return 'web/faq.tpl';    
    }
} // end of class 