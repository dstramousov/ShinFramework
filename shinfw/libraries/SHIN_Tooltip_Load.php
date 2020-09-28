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
 * @package       ShinPHP framework
 * @subpackage    Libraries
 * @author        
 * @link          shinfw/libraries/SHIN_Tooltip_Load.php
 */

require_once("SHIN_Tooltip.php");

class SHIN_Tooltip_Load extends SHIN_Tooltip
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

		Console::logSpeed('SHIN_Tooltip_Load begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Tooltip_Load. Size of class: ');
    }
    
    /**
    * prepare and render script for ajax tooltip
    * 
    * @param mixed $id The id of container element
    * @param mixed $url The address of request where send to
    * @param mixed $method get | post
    * @param mixed $params Array of request params passes to server
    * @return mixed HTML, javascript
    */
    public function add_tooltip($id, $url, $method = 'get', $params = array(), $widthmax = 250, $widthmin = 250)
    {               
        $params_str = array();
        if (count($params)>0)
        {
            foreach ($params as $key=>$value)
            {
                $params_str[] = "'$key':'$value'";
            }
        }
        
        $params_str = implode(',\n', $params_str);
        
        $content_str = "{
            ajax: {
                url: '$url',
                data: { $params_str },
                method: '$method'
            }
        }";
        
        $style = "{
                width: {
                    max: $widthmax,
                    min: $widthmin,
                     

                    }}";
        
        parent::init(array('content'=>$content_str, 'style'=>$style));

        return parent::render($id);
    } 
    
       

} // End of class 

/* End of file SHIN_Tooltip_Image.php */
/* Location: shinfw/libraries/SHIN_Tooltip_Load.php */ 