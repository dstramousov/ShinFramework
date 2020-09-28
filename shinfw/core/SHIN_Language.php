<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		ShinPHP framework
 * @subpackage	Core
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Language Class
 *
 * @package		ShinPHP framework
 * @subpackage	Core
 * @category	Language
 * @author		
 * @link		
 */
class SHIN_Language {

	var $language	= array();
	var $is_loaded	= array();

	/**
	 * Constructor
	 *
	 * @access	public
	 */
	function __construct()
	{
		SHIN_Core::log('debug', 'SHIN_Language loaded. Default language: '.SHIN_Core::$_config['lang']['language']);

		Console::logSpeed('|CC| SHIN_Language begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
	}

	// --------------------------------------------------------------------

	/**
	 * Load a language file
	 *
	 * @access	public
	 * @param	langfile: string. The name of the language file to be loaded.
	 * @param	string	the language (english, etc.)
	 * @return	mixed
	 */
	function directLoad($path)
	{
		include($path);
		if ( ! isset($lang))
		{
			return;
		}
        $this->language = array_merge($this->language, $lang);
		unset($lang);
	}
	
	/**
	 * Load a language file
	 *
	 * @access	public
	 * @param	langfile: string. The name of the language file to be loaded.
	 * @param	string	the language (english, etc.)
	 * @return	mixed
	 */
	function load($langfile = '', $idiom = '', $return = FALSE)
	{
        $langfile = str_replace('.php', '', str_replace('_lang.', '', $langfile)).'_lang.php';

		if (in_array($langfile, $this->is_loaded, TRUE))
		{
			return;
		}

		if ($idiom == '')
		{
			$idiom = SHIN_Core::$_config['lang']['language'];
		}

		// Determine where the language file is and load it
		if(is_file('lang'.DIRECTORY_SEPARATOR.$idiom.DIRECTORY_SEPARATOR.$langfile)){
			$_pref_lang_name = 'lang'.DIRECTORY_SEPARATOR.$idiom.DIRECTORY_SEPARATOR.$langfile;
		} else {
			if(is_file('..'.DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.$idiom.DIRECTORY_SEPARATOR.$langfile)){
				$_pref_lang_name = '..'.DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.$idiom.DIRECTORY_SEPARATOR.$langfile;
			} else {
				$_pref_lang_name = BASEPATH.'lang'.DIRECTORY_SEPARATOR.$idiom.DIRECTORY_SEPARATOR.$langfile;
		   	}
		}
		
		if (file_exists($_pref_lang_name))
		{
			include($_pref_lang_name);
		}

		if ( ! isset($lang))
		{
			return;
		}

		if ($return == TRUE)
		{
			return $lang;
		}

		$this->is_loaded[] = $langfile;
		$this->language = array_merge($this->language, $lang);
		unset($lang);
		                                                                                
		SHIN_Core::log('debug', '[LANGUAGE] Language file loaded: '.SHIN_Core::$_config['core']['base_path'].SHIN_Core::$_runned_application.DIRECTORY_SEPARATOR.$idiom.DIRECTORY_SEPARATOR.$langfile);
		Console::logMemory($this->language, '|CC| SHIN_Language load file: "'.SHIN_Core::$_config['core']['base_path'].SHIN_Core::$_runned_application.DIRECTORY_SEPARATOR.$idiom.DIRECTORY_SEPARATOR.$langfile.'" Size of class: ');
		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Fetch a single line of text from the language array
	 *
	 * @access	public
	 * @param	string	$line 	the language line
	 * @return	string
	 */
	function line($line = '')
	{
		$line = ($line == '' OR ! isset($this->language[$line])) ? FALSE : $this->language[$line];
		return $line;
	}	
}
// END Language Class

/* End of file SHIN_Language.php */
/* Location: ./system/SHIN_Language.php */