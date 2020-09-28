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



if ( ! function_exists('array_slice_assoc'))
{
	function array_slice_assoc ($array, $key, $length, $preserve_keys = true)
	{
		$offset = array_search($key, array_keys($array));

		if (is_string($length))
			$length = array_search($length, array_keys($array)) - $offset;

		return array_slice($array, $offset, $length, $preserve_keys);
	}
}



/**
 * This function make slicing for array by keys.
 *
 * @package       ShinPHP framework
 * @subpackage    Helpers
 * @author        
 * @link        shinfw/libraries/SHIN_array_helper.php
 */
if ( ! function_exists('slice_by_keys'))
{
	function slice_by_keys($input, $keys) {
	    $result = array();
	    foreach ( $keys as $k_val ) {
	        if ( in_array($k_val, array_keys($input)) ) {
	            $result[$k_val] = $input[$k_val];
	        }
	    }
	    return $result;
	}
}


/**
 * This function popotype of array_merge but for multidimensional arrays . 
 *
 * @package       ShinPHP framework
 * @subpackage    Helpers
 * @author        
 * @link        shinfw/libraries/SHIN_array_helper.php
 */
 
if ( ! function_exists('array_merge_recursive_distinct'))
{
 function array_merge_recursive_distinct () {
  
  $arrays   = func_get_args();
  $base     = array_shift($arrays);
  
  if(!is_array($base)) { 
      $base = empty($base) ? array() : array($base);
  }
  
  foreach($arrays as $append) {
    if(!is_array($append)) {
        $append = array($append);
    }
    
    foreach($append as $key => $value) {
      if(!array_key_exists($key, $base) and !is_numeric($key)) {
        $base[$key] = $append[$key];
        continue;
      }
      
      if(is_array($value) or is_array($base[$key])) {
        $base[$key] = array_merge_recursive_distinct($base[$key], $append[$key]);
      } else if(is_numeric($key)) {
        if(!in_array($value, $base)) { 
            $base[] = $value;
        }
      } else {
        $base[$key] = $value;
      }
    }
  }
  
  return $base;
}
 
} 
 /* End of file SHIN_array_helper.php */
/* Location: shinfw/helpers/SHIN_array_helper.php */
?>
