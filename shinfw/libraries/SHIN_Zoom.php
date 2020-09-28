<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Zoom.php
 */


/**
 * ShinPHP framework zoom library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Zoom.php
 */


class SHIN_Zoom extends SHIN_Libs
{
    
    /**
     * Contain all compiled gallery string for browser. 
     */
    var $injectionGalleryString; 

    /**
     * Show gallery or not 
     */
    var $showGallery    =   false;
    
    /**
     * Smarty variable name 
     */
    var $zoomContainer  =   '';
    
    var $zoomItem       =   array();
    
    /**
     * Constructor. Init dialog with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
	{   
        parent::__construct('zoom', $css_file);

		Console::logSpeed('SHIN_Zoom begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Zoom. Size of class: ');
	}

    /**
     * Compile string for data.
     *
     * @access public
     * @param $params array with.
     * @return string Compiled string.
     */
    public function combinedInit($params){
        
        $this->injectionString  =   '';
        
        $gallery                =   isset($params['gallery']) ? $params['gallery'] : '';
        $params                 =   $params['data'];
        
        $title  =   ''; $galleryTitle   =   '';
        $class  =   ''; $galleryClass   =   '';
        $id     =   ''; $galleryId      =   '';
        $alt    =   ''; $galleryAlt     =   '';
            
        if(!empty($gallery)) {
            
            $this->showGallery  =   true;
            
            foreach($gallery as $item) {
                
                $galleryBigImage        =   $item['bigimage'];    unset($item['bigimage']);
                $galleryTinyImage       =   $item['tinyimage'];   unset($item['tinyimage']);
                
                if(isset($item['title'])) {
                    $galleryTitle  =   $params['title'];   unset($item['title']);
                }
                
                if(isset($item['class'])) {
                    $galleryClass  =   $item['class'];   unset($item['class']);
                }
                
                if(isset($item['id'])) {
                    $galleryId  =   $item['id'];   unset($item['id']);
                }
                
                if(isset($item['alt'])) {
                    $galleryAlt  =   $item['alt'];   unset($item['alt']);
                }
                
                $this->injectionGalleryString .= sprintf('<a href="%s" class="%s" title="%s" rel="%s"><img src="%s" alt="%s" /></a>', $galleryBigImage, $galleryClass, $galleryTitle, $this->_makeRelParams($item), $galleryTinyImage, $galleryAlt);
            }
        }
        
        
        
        if(isset($params['title'])) {
            $title  =   $params['title'];   unset($params['title']);
        }
        
        if(isset($params['class'])) {
            $class  =   $params['class'];   unset($params['class']);
        }
        
        if(isset($params['id'])) {
            $id  =   $params['id'];   unset($params['id']);
        }
        
        if(isset($params['alt'])) {
            $alt  =   $params['alt'];   unset($params['alt']);
        }
        
        $bigimage               =   $params['bigimage'];    unset($params['bigimage']);
        $smallimage             =   $params['smallimage'];  unset($params['smallimage']);
        $this->zoomContainer    =   $params['container'];   unset($params['container']);
                    
        
        
        $this->injectionString  .=   sprintf('<a href="%s" class="%s" id="%s" rel="%s"><img src="%s" alt="%s" title="%s" /></a>', $bigimage, $class, $id, $this->_makeRelParams($params), $smallimage, $alt, $title);
        $this->zoomItem          =   sprintf('<a href="%s" class="%s" id="%s" rel="%s"><img src="%s" alt="%s" title="%s" /></a>', $bigimage, $class, $id, $this->_makeRelParams($params), $smallimage, $alt, $title);
    }


    /**
     * Main method for getting ready dialog string for browser.
     *
     * @access public
     * @params $params:array
     * @return NULL.
     */
    public function render($_htmlID = null)
    {
        $this->_body();
        
        return null;
    }
    
    /**
     * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return string.
     */
    protected function _body()
    {   
        SHIN_Core::$_libs['templater']->assign($this->zoomContainer, $this->injectionString);
        
        if($this->showGallery) {
            SHIN_Core::$_libs['templater']->assign($this->zoomContainer . 'Gallery', $this->injectionGalleryString);    
        }     
    }
    
    /**
     * Make params for rel attribute.
     *
     * @access protected
     * @param array of params
     * @return array of params.
     */
    protected function _makeRelParams($params) {
        
        $paramsStr  =   '';
        
        $this->_config_mapper($params);
        
        
        foreach($this->sh_Options as $key => $value) {
            $paramsStr  .=  $key . ': ' . $value . ', ';    
        }
        
        return substr($paramsStr, 0, -2);    
    }
    
    
    
}// End of class 


/* End of file SHIN_Zoom.php */
/* Location: shifw/library/SHIN_Zoom.php */