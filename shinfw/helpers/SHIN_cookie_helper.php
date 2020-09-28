<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_array_helper.php
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Cookie Helpers
 *
 * @package       ShinPHP framework
 * @subpackage    Helpers
 * @author        
 * @link        shinfw/libraries/SHIN_cookie_helper.php
 */

if ( ! function_exists('set_cookie'))
{
	function set_cookie($name = '', $value = '', $expire = '', $domain = '', $path = '/', $prefix = '')
	{
		if (is_array($name))
		{		
			foreach (array('value', 'expire', 'domain', 'path', 'prefix', 'name') as $item)
			{
				if (isset($name[$item]))
				{
					$$item = $name[$item];
				}
			}
		}
		
		$prefix = "";
		$domain = "";
		$path = "/";
		
		if ( ! is_numeric($expire))
		{
			$expire = time() - 86500;
		}
		else
		{
			if ($expire > 0)
			{
				$expire = time() + $expire;
			}
			else
			{
				$expire = 0;
			}
		}
	
		setcookie($prefix.$name, $value, $expire, $path, $domain, 0);
	}
}
	
// --------------------------------------------------------------------

/**
 * Fetch an item from the COOKIE array
 *
 * @access	public
 * @param	string
 * @param	bool
 * @return	mixed
 */
if ( ! function_exists('get_cookie'))
{
	function get_cookie($index = '', $xss_clean = FALSE)
	{
		
		$prefix = '';
		
		/*
		if ( ! isset($_COOKIE[$index]) && config_item('cookie_prefix') != '')
		{
			$prefix = config_item('cookie_prefix');
		}
		*/
		
		return SHIN_Core::$_input->cookie($prefix.$index, $xss_clean);
	}
}

// --------------------------------------------------------------------

/**
 * Delete a COOKIE
 *
 * @param	mixed
 * @param	string	the cookie domain.  Usually:  .yourdomain.com
 * @param	string	the cookie path
 * @param	string	the cookie prefix
 * @return	void
 */
if ( ! function_exists('delete_cookie'))
{
	function delete_cookie($name = '', $domain = '', $path = '/', $prefix = '')
	{
		set_cookie($name, '', '', $domain, $path, $prefix);
	}
}


/* End of file cookie_helper.php */
/* Location: ./system/helpers/cookie_helper.php */