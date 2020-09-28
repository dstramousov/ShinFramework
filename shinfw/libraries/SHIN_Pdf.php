<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package			ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since			Version 0.1
 * @filesource		shinfw/libraries/SHIN_Pdf.php
 */


/**
 * ShinPHP framework fusion PDF library
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author        
 * @link		shinfw/libraries/SHIN_Pdf.php
 */
require_once('tcpdf/tcpdf.php');

class SHIN_Pdf extends TCPDF
{

    protected $_pdf;
    
    /**
     * Options from config/pdf.php. 
     */
    var $sh_Options = array();

    /**
     * Constructor. Init PDF with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct()
    {    
        require_once(BASEPATH.'config/pdf.php');

        $this->sh_Options = $pdf;
        $this->_config_mapper($pdf);
        
        $sh_Options = $this->sh_Options;
        
        $this->_pdf = parent::__construct($sh_Options['page_orientation'], $sh_Options['unit'], $sh_Options['page_format'], $sh_Options['unicode'], $sh_Options['encoding'], $sh_Options['diskcache']); 
        
        $this->init($pdf);

		Console::logSpeed('SHIN_Pdf begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Pdf. Size of class: ');
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
        
        if(isset($sh_Options['creator'])) {
            $this->SetCreator($sh_Options['creator']);    
        }
        
        if(isset($sh_Options['author'])) {
            $this->SetAuthor($sh_Options['author']);
        }
        
        if(isset($sh_Options['title'])) {
            $this->SetTitle($sh_Options['title']);
        }
        
        if(isset($sh_Options['subject'])) {
            $this->SetSubject($sh_Options['subject']);
        }
        
        if(isset($sh_Options['keywords'])) {
            $this->SetKeywords($sh_Options['keywords']);
        }

        if( isset($sh_Options['header_logo']) && 
            isset($sh_Options['header_logo_width']) &&
            isset($sh_Options['header_title']) &&
            isset($sh_Options['header_string']))
        {
            $this->SetHeaderData($sh_Options['header_logo'],
                                $sh_Options['header_logo_width'],
                                $sh_Options['header_title'],
                                $sh_Options['header_string']);
        }

        if(isset($sh_Options['font_name_main']) && isset($sh_Options['font_size_main'])) {
            $this->setHeaderFont(Array($sh_Options['font_name_main'], '', $sh_Options['font_size_main']));
        }
        
        if(isset($sh_Options['font_name_data']) && isset($sh_Options['font_size_data'])) {
            $this->setFooterFont(Array($sh_Options['font_name_data'], '', $sh_Options['font_size_data']));
        }

        if(isset($sh_Options['default_monospaced_font'])) {
            $this->SetDefaultMonospacedFont($sh_Options['default_monospaced_font']);
        }

        if( isset($sh_Options['margin_left']) && 
            isset($sh_Options['margin_top']) &&
            isset($sh_Options['margin_right']))
        {
            $this->SetMargins($sh_Options['margin_left'], $sh_Options['margin_top'], $sh_Options['margin_right']);
        }
        
        if(isset($sh_Options['margin_header'])) {
            $this->SetHeaderMargin($sh_Options['margin_header']);
        }
        
        if(isset($sh_Options['margin_footer'])) {
            $this->SetFooterMargin($sh_Options['margin_footer']);
        }

        if(isset($sh_Options['auto_page_break']) && isset($sh_Options['margin_bottom'])) {
            $this->SetAutoPageBreak($sh_Options['auto_page_break'], $sh_Options['margin_bottom']);
        }

        if(isset($sh_Options['image_scale_ratio'])) {
            $this->setImageScale($sh_Options['image_scale_ratio']); 
        }


        if( isset($sh_Options['font_name']) && 
            isset($sh_Options['font_props']) &&
            isset($sh_Options['font_size']))
        {
            $this->SetFont($sh_Options['font_name'], $sh_Options['font_props'], $sh_Options['font_size']);          
        }
        
        
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
    
} // End of class 

/* End of file SHIN_Pdf.php */
/* Location: ./libraries/SHIN_Pdf.php */               