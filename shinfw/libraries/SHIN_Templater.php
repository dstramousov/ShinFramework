<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_Image.php
 */


/**
 * ShinPHP framework wrapper for Smarty->templater.
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		shinfw/libraries/SHIN_Image.php
 */

//define('SMARTY_LIBRARY_FOLDER', 'smarty3');
define('SMARTY_LIBRARY_FOLDER', 'smarty2.6');

require SMARTY_LIBRARY_FOLDER."/Smarty.class.php";

class SHIN_Templater extends Smarty
{
    protected $_globals = array();
    
	/**
	 * Init smarty. 
	 *
	 * @param string $_mode base folder prefix for trying to find tempaltes. 
	 * @return void
	 */
     
     function __construct($_mode='shinfw')
     {
        parent::__construct();

        SHIN_Core::log('debug', 'SHIN_Templater run is "'.$_mode.'"');
				
		$this->template_dir = SHIN_Core::$_config['core']['base_path'].$_mode.'/views/';
		$this->compile_dir = SHIN_Core::$_config['core']['base_path'].$_mode.'/cache/';
		$this->cache_dir = SHIN_Core::$_config['core']['base_path'].$_mode.'/cache/';
		
        if (function_exists('base_url')) {
            $this->assign("base_url", base_url()); 
        }

		Console::logSpeed('SHIN_Templater (smarty) begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Templater. (smarty) Size of class: ');
     }

    /**
     * Render some page.
     *
     * @access public
     * @param string $template_id template file name
     * @param integer $cache_id cache id
     * @return void
     */
    function render($template_name = 'index', $cache_id = null)
    {

        if (strpos($template_name, '.') === false) {
            $template_name .= '.tpl';
        }

        $__sep = array("\\", '/');
		SHIN_Core::log('debug', '[SMARTY] Try processed file: '.str_replace($__sep, DIRECTORY_SEPARATOR, $this->template_dir.$template_name));

        if (is_array($this->_globals) AND sizeof($this->_globals) > 0){
            foreach ($this->_globals as $k => $v){
                parent::assignByRef($k, $v);
            }
        }
		
        return parent::display($template_name, $cache_id);
    }
    
	/**
	 * Set block to the template
	 *
	 * @param string $resource_name name of template
	 * @param string $variable name of variable uses as container
	 * @param string $cache_id cache id 
	 * @return void or parsed templater content
	 */
	function setBlock($resource_name, $variable = NULL, $cache_id = null)
	{                              
        if (strpos($resource_name, '.') === false) {
			$resource_name .= '.tpl';
		}
        
        if ($variable){
            $content = parent::fetch($theme.'/'.$resource_name, $cache_id);
            
            $this->_globals[$variable] = $content;
            
            parent::clear_all_assign();

        } else {
		

            return parent::fetch($resource_name, $cache_id);
        }
	}

	/**
	 * Just parse template and show to display. After that application will be die.
	 *
	 * @param string $template_name Template name 
	 * @return void
	 */
	public function displayFile($template_name)
	{
		$this->render($template_name);
		exit();
	}


    /**
     * Return pointer for this class.
     *
     * @access public
     * @param NULL
     * @return pointer for this class.
     */
	public function get_instance()
	{
		return $this;
	}

} // End of class 


/* End of file SHIN_Templater.php */
/* Location: shifw/library/SHIN_Templater.php */