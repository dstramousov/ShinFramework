<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since		Version 0.1
 * @filesource	shinfw/libraries/widgets/SHIN_Clock.php
 */


/**
 * ShinPHP framework. Simple widget for visualize all our examples.
 *
 * @package		ShinPHP framework
 * @subpackage	Widgets
 * @author        
 * @link		shinfw/libraries/widgets/SHIN_Examples.php
 */

class SHIN_Examples extends SHIN_Widget
{

    /**
     * Constructor. Init accordion with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($_name)
    {   
        parent::__construct($_name);
    }

    /**
     * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return string.
     */
    public function render($params=NULL)
    {	
		$ret = parent::render($params);

		$__arr = array();


		if(is_dir('./examples')){

			$dir = dir("./examples");

			while (False !== ($entry = $dir->read()))
			{
				if( strcmp($entry, ".") && strcmp($entry, ".svn"))
				{
					$pos = strpos($entry, '.php');
					
					if ($pos === false) {
					} else {
						array_push($__arr, $entry);
					}					
					
				}
			}

			asort($__arr);
			foreach($__arr as $i){
				$ret .= '<a class="shin-examples-list" href="'.SHIN_Core::$_config['core']['app_base_url'].'/examples/'.$i.'">'.ucfirst(str_replace('.php', '', $i)).'</a><br/>';
			}
	
			$dir->close();
		}
		
		return $ret;
	}
	
} // End of class 

/* End of file SHIN_Clock.php */
/* Location: shinfw/libraries/widgets/SHIN_Clock.php */               