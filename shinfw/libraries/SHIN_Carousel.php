<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Carousel.php
 */


/**
 * ShinPHP framework caruosel library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Carousel.php
 */


class SHIN_Carousel extends SHIN_Libs
{
    
    
    /**
     * Constructor. Init dialog with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('carousel', $css_file);

		Console::logSpeed('SHIN_Carousel begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Carousel. Size of class: ');		        
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
        $injectedCode  = '$("#' . $this->htmlID .'").CloudCarousel({';
            foreach($this->sh_Options as $key => $value){
                $injectedCode .= $key . ':' . $value . ', ';
            }
        $injectedCode = substr($injectedCode, 0, -2) . '}); ';
        
        return $injectedCode;    
    }
    
}// End of class 


/* End of file .php */
/* Location: shifw/library/SHIN_Carousel.php */