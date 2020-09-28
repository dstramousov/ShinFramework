<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since		Version 0.1
 * @filesource	shinfw/libraries/SHIN_Word.php
 */


/**
 * ShinPHP framework Word library
 *
 * @package			ShinPHP framework
 * @subpackage		Library
 * @author        
 * @link			shinfw/libraries/SHIN_Word.php
 */

define('', '');

require_once 'phpword/PHPWord.php';
require_once 'phpword/PHPWord/IOFactory.php';

class SHIN_Word extends PHPWord
{
    /**
     * Options from config/pdf.php. 
     */
    var $sh_Options = array();

    /**
     * Constructor. Init Word with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct()
    {    
        require_once(BASEPATH.'config/word.php');

        $this->sh_Options = $word;
        $this->_config_mapper($word);
        
        $sh_Options = $this->sh_Options;
        
        return parent::__construct(); 
        
        $this->init($word);

		Console::logSpeed('SHIN_Word begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Word. Size of class: ');
    }

    /**
     * Post init object. You can make for some parameters customization values.
     *
     * @access public
     * @params $params:array
     * @return NULL.
     */
    public function init($params)
    {
        
        $this->_config_mapper($params);
        $sh_Options = $this->sh_Options;        
        
    }


    /**
     * Fill internal array with needed values.
     *
     * @access protected
     * @params param:array
     * @return NULL.
     */
    protected function _config_mapper($param)
    {
        if($this->sh_Options){
            // post init customization variables.
            $this->sh_Options  = array_merge((array)$this->sh_Options, (array)$param);
        } else {
            // constructor initialization with default values from config file.
            $this->sh_Options = $param;
        }
    }    
  
}// End of class

/* End of file SHIN_Word.php */
/* Location: shinfw/libraries/SHIN_Word.php */