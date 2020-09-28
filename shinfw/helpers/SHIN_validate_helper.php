<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ShinPHP framework
 *
 *
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  http://webpeeps.ru/article/12/
 */

// ------------------------------------------------------------------------

if ( ! function_exists('shin_validate_string'))
{
	function shin_validate_string($_param)
	{	
		$_ret = array('result'=>FALSE, 'value'=>'');

		if($_param){
			$tmp = is_string($_param);
		} else {
			$tmp = false;
		}
        
        if($tmp === false){
			$_ret['value']	= 'lng_label_validation_string_error'; 
		} else {
			$_ret['result']	= $tmp; 
			$_ret['value']	= ''; 
		}
		
        return $_ret;

		
	
	
        return array('result' => $result,
                     'value'  => 'lng_label_validation_date_error');
	}
}

/**
 * Validate  ONLY DATE
 *
 * @access	public
 * @param	$_param string with date for validation 
 * @param	$type_validation string with type of input date. Possible values ['db_datetime_format', 'display_date_format']
 * @return	string
 */	
if ( ! function_exists('validate_date'))
{
	function validate_date($_param, $type_validation='db_date_format')
	{	
        if($type_validation == 'db_date_format'){
			$_format = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->db_date_format;
		} else {
			$_format = framework2datepicker(SHIN_Core::$_config['lang']['display_date_format']);
		}
		
		$dateFormatComponents = preg_split("/-|\/| |:/", $_format);
        $dateComponents       = preg_split("/-|\/| |:/", $_param);
		
		//dump($dateFormatComponents);
        if(count($dateFormatComponents) != count($dateComponents)) {
            return false;
        }
        
        foreach($dateFormatComponents as $key => $component) {
		
            switch(strtolower($component)){
                case 'd':
                case 'dd':
                    $partOfDate['dd']    =   $dateComponents[$key];
                    break;
                case 'y':
                case 'yy':
                    $partOfDate['yy']    =   $dateComponents[$key];
                    break;
                case 'm':
                case 'mm':
                    $partOfDate['mm']    =   $dateComponents[$key];
                    break;    
                case 'h':
                case 'hh':
                    $partOfDate['hh']    =   $dateComponents[$key];
                    break;    
                case 'i':
                case 'ii':
                    $partOfDate['ii']    =   $dateComponents[$key];
                    break;    
                case 's':
                case 'ss':
                    $partOfDate['ss']    =   $dateComponents[$key];
                    break;    
            }
        }
        
        
        $result = checkdate(!isset($partOfDate['mm']) ? 0 : $partOfDate['mm'],
                            !isset($partOfDate['dd']) ? 0 : $partOfDate['dd'],
                            !isset($partOfDate['yy']) ? 0 : $partOfDate['yy']);
        
        return array('result' => $result,
                     'value'  => 'lng_label_validation_date_error');
    } 
}
	
	
// ------------------------------------------------------------------------
/**
 * Validate  ONLY DATETIME
 *
 * @access	public
 * @param	$_param string with date for validation 
 * @param	$type_validation string with type of input date. Possible values ['db_datetime_format', 'display_date_format']
 * @return	string
 */	
if ( ! function_exists('validate_datetime'))
{
	function validate_datetime($_param, $type_validation='db_datetime_format')
	{		
		if($type_validation == 'db_datetime_format '){
			$_format = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->db_datetime_format;
		} else {
			$_format = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->db_datetime_format;
		}
		
		$dateFormatComponents = preg_split("/-|\/| |:/", $_format);
        $dateComponents       = preg_split("/-|\/| |:/", $_param);
		
        if(count($dateFormatComponents) != count($dateComponents)) {
            return false;
        }
        
        foreach($dateFormatComponents as $key => $component) {
		
            switch(strtolower($component)){
                case 'd':
                case 'dd':
                    $partOfDate['dd']    =   $dateComponents[$key];
                    break;
                case 'y':
                case 'yy':
                    $partOfDate['yy']    =   $dateComponents[$key];
                    break;
                case 'm':
                case 'mm':
                    $partOfDate['mm']    =   $dateComponents[$key];
                    break;    
                case 'h':
                case 'hh':
                    $partOfDate['hh']    =   (int)$dateComponents[$key];
                    break;    
                case 'i':
                case 'ii':
                    $partOfDate['ii']    =   (int)$dateComponents[$key];
                    break;    
                case 's':
                case 'ss':
                    $partOfDate['ss']    =   (int)$dateComponents[$key];
                    break;    
            }
        }
        
        $result_1 = @checkdate(!isset($partOfDate['mm']) ? 0 : $partOfDate['mm'],
                               !isset($partOfDate['dd']) ? 0 : $partOfDate['dd'],
                               !isset($partOfDate['yy']) ? 0 : $partOfDate['yy']);
							 
		$result_2 = false;
		
		
		if( (0 <= $partOfDate['hh']	&& 
			$partOfDate['hh'] <= 23	&& 
			0 <= $partOfDate['ii']	&&
			$partOfDate['ii'] <= 59	&&
			0 <= $partOfDate['ss']	&&
			$partOfDate['ss'] <= 59))
			{
			$result_2 = true;
		}
		
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$_ret_tmp = $result_2 && $result_1;
		if(!$_ret_tmp){
			$_ret['value']	= 'lng_label_validation_datetime_error';
		} else {		
			$_ret['result']	= $_param; 
		}
        
        return $_ret;
    } 
}
	
// ------------------------------------------------------------------------
/**
 * Validate 
 *
 * @access    public
 * @param    string
 * @return    string
 */    
if ( ! function_exists('validate_int'))
{
    function validate_int($_param)
    {
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_VALIDATE_INT);
        
        if($tmp === false){
			$_ret['value']	= 'lng_label_validation_int_error'; 
		} else {
			$_ret['result']	= $tmp; 
			$_ret['value']	= ''; 
		}
		
        return $_ret;
    } 
}

// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('validate_float'))
{
	function validate_float($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_VALIDATE_FLOAT); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_float_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('validate_bool'))
{
	function validate_bool($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_VALIDATE_BOOLEAN); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_bool_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('validate_url'))
{
	function validate_url($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_VALIDATE_URL); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_url_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('validate_email'))
{
	function validate_email($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_VALIDATE_EMAIL); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_email_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('validate_ip'))
{
	function validate_ip($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_VALIDATE_IP); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_ip_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('filter_raw'))
{
	function filter_raw($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_UNSAFE_RAW); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterraw_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('sanitize_string'))
{
	function sanitize_string($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_SANITIZE_STRING); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterstring_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('sanitize_encoded'))
{
	function sanitize_encodede($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_SANITIZE_ENCODED);
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filtersantizeencoded_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('sanitize_special_chars'))
{
	function sanitize_special_chars($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_SANITIZE_SPECIAL_CHARS);
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filtersantizespecialchars_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('sanitize_email'))
{
	function sanitize_email($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_SANITIZE_EMAIL); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filtersantizeemail_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('sanitize_url'))
{
	function sanitize_url($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_SANITIZE_URL); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filtersantizeurl_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('sanitize_number_int'))
{
	function sanitize_number_int($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_SANITIZE_NUMBER_INT); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filtersantizenumberint_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('sanitize_number_float'))
{
	function sanitize_number_float($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_SANITIZE_NUMBER_FLOAT); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filtersantizenumberfloat_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('sanitize_magic_quotes'))
{
	function sanitize_magic_quotes($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_SANITIZE_MAGIC_QUOTES); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filtersantizemagicquotes_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_allow_octal'))
{
	function flag_allow_octal($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_ALLOW_OCTAL); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filtersantizeallowoctal_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_allow_hex'))
{
	function flag_allow_hex($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_ALLOW_HEX); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagallowhex_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_strip_high'))
{
	function flag_strip_high($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_STRIP_HIGH); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagstriphigh_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_encode_low'))
{
	function flag_encode_low($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_ENCODE_LOW); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagencodelow_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_encode_high'))
{
	function flag_encode_high($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_ENCODE_HIGH); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagencodehigh_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_no_encore_quotes'))
{
	function flag_no_encore_quotes($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_NO_ENCODE_QUOTES); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filternoencodequotes_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_allow_fraction'))
{
	function flag_allow_fraction($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_ALLOW_FRACTION); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagallowfraction_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_allow_thousand'))
{
	function flag_allow_thousand($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_ALLOW_THOUSAND); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagallowthousand_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_allow_scientific'))
{
	function flag_allow_scientific($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_ALLOW_SCIENTIFIC); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagallowscientific_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_scheme_required'))
{
	function flag_scheme_required($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_SCHEME_REQUIRED); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagschemerequired_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_host_required'))
{
	function flag_host_required($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_HOST_REQUIRED); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflaghostrequired_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_path_required'))
{
	function flag_path_required($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_PATH_REQUIRED); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagpathrequired_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_query_required'))
{
	function flag_query_required($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_QUERY_REQUIRED); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagqueryrequired_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_ipv4'))
{
	function flag_ipv4($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_IPV4); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagipv4_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_ipv6'))
{
	function flag_ipv6($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_IPV6); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagipv6_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_no_res_range'))
{
	function flag_no_res_range($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_NO_RES_RANGE); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagnoresrange_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------

/**
 * Validate 
 *
 * @access	public
 * @param	string
 * @return	string
 */	
if ( ! function_exists('flag_no_priv_range'))
{
	function flag_no_priv_range($_param)
	{
		$_ret = array('result'=>FALSE, 'value'=>'');
		
		$tmp = filter_var($_param, FILTER_FLAG_NO_PRIV_RANGE); 
		if(!$tmp){
			$_ret['value']	= 'lng_label_validation_filterflagnoprivrange_error'; 
		} else {
			$_ret['result']	= $tmp;
			$_ret['value']	= ''; 
		}
		
		return $_ret;
	} 
}
	
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------


/* End of file validate_helper.php */
/* Location: ./system/helpers/validate_helper.php */
