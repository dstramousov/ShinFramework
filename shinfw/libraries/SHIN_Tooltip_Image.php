<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Tooltip.php
 */


/**
 * ShinPHP framework fusion charts library
 *
 * @package        ShinPHP framework
 * @subpackage     Libraries
 * @author        
 * @link           shinfw/libraries/SHIN_Tooltip_Image.php
 */

require_once("SHIN_Tooltip.php");

class SHIN_Tooltip_Image extends SHIN_Tooltip
{
    /**
     * Constructor. Init tooltip with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __costruct($css_file = false)
    {
        parent::__construct();

		Console::logSpeed('SHIN_Tooltip_Image begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Tooltip_Image. Size of class: ');
    }
    
    /**
    * add image tooltip on the page
    * 
    * @access public
    * @param string $id - DOM id
    * @param string $image_src - image src
    * @param string $alt - image alt
    * @param string $style - css style
    * @return NULL.
    */
    public function add_tooltip($id, $image_src, $alt = '', $style = '')
    {
        $style = "{
            classes: '$style'
         }";
         
        $content_str = "<img src=\"$image_src\" alt=\"$alt\" />";
        
        parent::init(array('content'=>"'" . $content_str . "'"));
        return parent::render($id);
    } 
    
       

} // End of class 

/* End of file SHIN_Tooltip_Image.php */
/* Location: shinfw/libraries/SHIN_Tooltip_Image.php */ 