<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_DateTimepicker.php
 */


/**
 * ShinPHP framework datepicker library
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		shinfw/libraries/SHIN_DateTimepicker.php
 */

class SHIN_DateTimepicker extends SHIN_Libs
{

	/**
	 * Constructor. Init datepicker with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
    public function __construct($css_file = false)
    {	
        parent::__construct('datetimepicker', $css_file);

		Console::logSpeed('SHIN_DateTimepicker begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_DateTimepicker. Size of class: ');		        
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
    	$_ret = "$(function() {
	$(\"#{$this->htmlID}\").datetime({";

		$_temporary = array();
        
        if(isset($this->sh_Options['dateFormat'])) {
            $this->sh_Options['dateFormat'] =   "'" . framework2datepicker($this->sh_Options['dateFormat']) . "'";    
        }
        
		if(isset($this->sh_Options)){
			foreach($this->sh_Options as $p=>$k)
			{
				array_push($_temporary, "\n		{$p}: {$k}");
			}
		}

		if(isset($_temporary)){
			$_ret	.= implode(', ', $_temporary);
		}

		$_ret	.= '
	});
});';
        return $_ret;
    }

} // End of class 

/* End of file SHIN_DateTimepicker.php */
/* Location: shinfw/libraries/SHIN_DateTimepicker.php */           	