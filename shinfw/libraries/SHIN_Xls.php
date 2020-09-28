<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since		Version 0.1
 * @filesource	shinfw/libraries/SHIN_Xls.php
 */


/**
 * ShinPHP framework Word library
 *
 * @package			ShinPHP framework
 * @subpackage		Library
 * @author        
 * @link			shinfw/libraries/SHIN_Xls.php
 */

require_once ('phpexcel/PHPExcel.php');
require_once ('phpexcel/PHPExcel/Writer/Excel2007.php');

class SHIN_Xls extends PHPExcel
{
    /**
     * Options from config/pdf.php. 
     */
    protected $sh_Options = array();
    
    /**
     * Constructor. Init Word with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct()
    {
        require_once(BASEPATH.'config/xls.php');
        parent::__construct();
        $this->init($xls);

		Console::logSpeed('SHIN_Xls begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Xls. Size of class: ');
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
        
        $this->getProperties()->setCreator($sh_Options['creator']);
        $this->getProperties()->setLastModifiedBy($sh_Options['last_modified_by']);
        $this->getProperties()->setTitle($sh_Options['title']);
        $this->getProperties()->setSubject($sh_Options['subject']);
        $this->getProperties()->setDescription($sh_Options['description']);
    }
    
    public function get_writer($obj)
    {
        return new PHPExcel_Writer_Excel2007($obj);
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
    
    /**
    * set cell value
    * 
    * @access public
    * @param string $cell - cal id
    * @param mixed $value - value for cell
    * @return null
    */
    public function set_cell_value($cell, $value)
    {
        $this->getActiveSheet()->SetCellValue($cell, $value);
    }
    
    /**
    * set title 
    * 
    * @access public
    * @param string $title - page title
    * @return null
    */
    public function set_title($title)
    {
        $this->getActiveSheet()->setTitle($title);
    }
    
}// End of class

/* End of file SHIN_Xls.php */
/* Location: shinfw/libraries/SHIN_Xls.php */