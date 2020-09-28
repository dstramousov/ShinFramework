<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_UTF8.php
 */


/**
 * This class contain and define functions for work with utf8 strings.
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link        shinfw/libraries/SHIN_UTF8.php
 */

class SHIN_UTF8
{
	// Does the server support UTF-8 natively?
	public static $server_utf8 = NULL;

	// Called methods
	public static $called = array();

	/**
	 * constructor.
	 */
    function __construct()
    {
		Console::logSpeed('SHIN_UTF8 begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_UTF8. Size of class: ');
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


	/**
	 * SHIN_UTF8::from_unicode
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _from_unicode($arr)
	{
		ob_start();

		$keys = array_keys($arr);

		foreach ($keys as $k)
		{
			// ASCII range (including control chars)
			if (($arr[$k] >= 0) AND ($arr[$k] <= 0x007f))
			{
				echo chr($arr[$k]);
			}
			// 2 byte sequence
			elseif ($arr[$k] <= 0x07ff)
			{
				echo chr(0xc0 | ($arr[$k] >> 6));
				echo chr(0x80 | ($arr[$k] & 0x003f));
			}
			// Byte order mark (skip)
			elseif ($arr[$k] == 0xFEFF)
			{
				// nop -- zap the BOM
			}
			// Test for illegal surrogates
			elseif ($arr[$k] >= 0xD800 AND $arr[$k] <= 0xDFFF)
			{
				// Found a surrogate
				trigger_error('SHIN_UTF8::from_unicode: Illegal surrogate at index: '.$k.', value: '.$arr[$k], E_USER_WARNING);
				return FALSE;
			}
			// 3 byte sequence
			elseif ($arr[$k] <= 0xffff)
			{
				echo chr(0xe0 | ($arr[$k] >> 12));
				echo chr(0x80 | (($arr[$k] >> 6) & 0x003f));
				echo chr(0x80 | ($arr[$k] & 0x003f));
			}
			// 4 byte sequence
			elseif ($arr[$k] <= 0x10ffff)
			{
				echo chr(0xf0 | ($arr[$k] >> 18));
				echo chr(0x80 | (($arr[$k] >> 12) & 0x3f));
				echo chr(0x80 | (($arr[$k] >> 6) & 0x3f));
				echo chr(0x80 | ($arr[$k] & 0x3f));
			}
			// Out of range
			else
			{
				trigger_error('SHIN_UTF8::from_unicode: Codepoint out of Unicode range at index: '.$k.', value: '.$arr[$k], E_USER_WARNING);
				return FALSE;
			}
		}

		$result = ob_get_contents();
		ob_end_clean();
		return $result;
	}

	/**
	 * SHIN_UTF8::ltrim
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _ltrim($str, $charlist = NULL)
	{
		if ($charlist === NULL)
			return ltrim($str);

		if (SHIN_UTF8::is_ascii($charlist))
			return ltrim($str, $charlist);

		$charlist = preg_replace('#[-\[\]:\\\\^/]#', '\\\\$0', $charlist);

		return preg_replace('/^['.$charlist.']+/u', '', $str);
	}

	/**
	 * SHIN_UTF8::ord
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _ord($chr)
	{
		$ord0 = ord($chr);

		if ($ord0 >= 0 AND $ord0 <= 127)
			return $ord0;

		if ( ! isset($chr[1]))
		{
			trigger_error('Short sequence - at least 2 bytes expected, only 1 seen', E_USER_WARNING);
			return FALSE;
		}

		$ord1 = ord($chr[1]);

		if ($ord0 >= 192 AND $ord0 <= 223)
			return ($ord0 - 192) * 64 + ($ord1 - 128);

		if ( ! isset($chr[2]))
		{
			trigger_error('Short sequence - at least 3 bytes expected, only 2 seen', E_USER_WARNING);
			return FALSE;
		}

		$ord2 = ord($chr[2]);

		if ($ord0 >= 224 AND $ord0 <= 239)
			return ($ord0 - 224) * 4096 + ($ord1 - 128) * 64 + ($ord2 - 128);

		if ( ! isset($chr[3]))
		{
			trigger_error('Short sequence - at least 4 bytes expected, only 3 seen', E_USER_WARNING);
			return FALSE;
		}

		$ord3 = ord($chr[3]);

		if ($ord0 >= 240 AND $ord0 <= 247)
			return ($ord0 - 240) * 262144 + ($ord1 - 128) * 4096 + ($ord2-128) * 64 + ($ord3 - 128);

		if ( ! isset($chr[4]))
		{
			trigger_error('Short sequence - at least 5 bytes expected, only 4 seen', E_USER_WARNING);
			return FALSE;
		}

		$ord4 = ord($chr[4]);

		if ($ord0 >= 248 AND $ord0 <= 251)
			return ($ord0 - 248) * 16777216 + ($ord1-128) * 262144 + ($ord2 - 128) * 4096 + ($ord3 - 128) * 64 + ($ord4 - 128);

		if ( ! isset($chr[5]))
		{
			trigger_error('Short sequence - at least 6 bytes expected, only 5 seen', E_USER_WARNING);
			return FALSE;
		}

		if ($ord0 >= 252 AND $ord0 <= 253)
			return ($ord0 - 252) * 1073741824 + ($ord1 - 128) * 16777216 + ($ord2 - 128) * 262144 + ($ord3 - 128) * 4096 + ($ord4 - 128) * 64 + (ord($chr[5]) - 128);

		if ($ord0 >= 254 AND $ord0 <= 255)
		{
			trigger_error('Invalid UTF-8 with surrogate ordinal '.$ord0, E_USER_WARNING);
			return FALSE;
		}
	}

	/**
	 * SHIN_UTF8::rtrim
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _rtrim($str, $charlist = NULL)
	{
		if ($charlist === NULL)
			return rtrim($str);

		if (SHIN_UTF8::is_ascii($charlist))
			return rtrim($str, $charlist);

		$charlist = preg_replace('#[-\[\]:\\\\^/]#', '\\\\$0', $charlist);

		return preg_replace('/['.$charlist.']++$/uD', '', $str);
	}

	/**
	 * SHIN_UTF8::str_ireplace
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _str_ireplace($search, $replace, $str, $count = NULL)
	{
		if (SHIN_UTF8::is_ascii($search) AND SHIN_UTF8::is_ascii($replace) AND SHIN_UTF8::is_ascii($str))
			return str_ireplace($search, $replace, $str, $count);

		if (is_array($str))
		{
			foreach ($str as $key => $val)
			{
				$str[$key] = SHIN_UTF8::_str_ireplace($search, $replace, $val, $count);
			}
			return $str;
		}

		if (is_array($search))
		{
			$keys = array_keys($search);

			foreach ($keys as $k)
			{
				if (is_array($replace))
				{
					if (array_key_exists($k, $replace))
					{
						$str = SHIN_UTF8::_str_ireplace($search[$k], $replace[$k], $str, $count);
					}
					else
					{
						$str = SHIN_UTF8::_str_ireplace($search[$k], '', $str, $count);
					}
				}
				else
				{
					$str = SHIN_UTF8::_str_ireplace($search[$k], $replace, $str, $count);
				}
			}
			return $str;
		}

		$search = SHIN_UTF8::_strtolower($search);
		$str_lower = SHIN_UTF8::_strtolower($str);

		$total_matched_strlen = 0;
		$i = 0;

		while (preg_match('/(.*?)'.preg_quote($search, '/').'/s', $str_lower, $matches))
		{
			$matched_strlen = strlen($matches[0]);
			$str_lower = substr($str_lower, $matched_strlen);

			$offset = $total_matched_strlen + strlen($matches[1]) + ($i * (strlen($replace) - 1));
			$str = substr_replace($str, $replace, $offset, strlen($search));

			$total_matched_strlen += $matched_strlen;
			$i++;
		}

		$count += $i;
		return $str;
	}

	/**
	 * SHIN_UTF8::str_pad
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _str_pad($str, $final_str_length, $pad_str = ' ', $pad_type = STR_PAD_RIGHT)
	{
		if (SHIN_UTF8::is_ascii($str) AND SHIN_UTF8::is_ascii($pad_str))
			return str_pad($str, $final_str_length, $pad_str, $pad_type);

		$str_length = SHIN_UTF8::_strlen($str);

		if ($final_str_length <= 0 OR $final_str_length <= $str_length)
			return $str;

		$pad_str_length = SHIN_UTF8::_strlen($pad_str);
		$pad_length = $final_str_length - $str_length;

		if ($pad_type == STR_PAD_RIGHT)
		{
			$repeat = ceil($pad_length / $pad_str_length);
			return SHIN_UTF8::_substr($str.str_repeat($pad_str, $repeat), 0, $final_str_length);
		}

		if ($pad_type == STR_PAD_LEFT)
		{
			$repeat = ceil($pad_length / $pad_str_length);
			return SHIN_UTF8::substr(str_repeat($pad_str, $repeat), 0, floor($pad_length)).$str;
		}

		if ($pad_type == STR_PAD_BOTH)
		{
			$pad_length /= 2;
			$pad_length_left = floor($pad_length);
			$pad_length_right = ceil($pad_length);
			$repeat_left = ceil($pad_length_left / $pad_str_length);
			$repeat_right = ceil($pad_length_right / $pad_str_length);

			$pad_left = SHIN_UTF8::substr(str_repeat($pad_str, $repeat_left), 0, $pad_length_left);
			$pad_right = SHIN_UTF8::substr(str_repeat($pad_str, $repeat_right), 0, $pad_length_left);
			return $pad_left.$str.$pad_right;
		}

		trigger_error('SHIN_UTF8::str_pad: Unknown padding type (' . $pad_type . ')', E_USER_ERROR);
	}

	/**
	 * SHIN_UTF8::str_split
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _str_split($str, $split_length = 1)
	{
		$split_length = (int) $split_length;

		if (SHIN_UTF8::is_ascii($str))
			return str_split($str, $split_length);

		if ($split_length < 1)
			return FALSE;

		if (SHIN_UTF8::strlen($str) <= $split_length)
			return array($str);

		preg_match_all('/.{'.$split_length.'}|[^\x00]{1,'.$split_length.'}$/us', $str, $matches);

		return $matches[0];
	}

	/**
	 * SHIN_UTF8::strcasecmp
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _strcasecmp($str1, $str2)
	{
		if (SHIN_UTF8::is_ascii($str1) AND SHIN_UTF8::is_ascii($str2))
			return strcasecmp($str1, $str2);

		$str1 = SHIN_UTF8::_strtolower($str1);
		$str2 = SHIN_UTF8::_strtolower($str2);
		return strcmp($str1, $str2);
	}

	/**
	 * SHIN_UTF8::strcspn
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _strcspn($str, $mask, $offset = NULL, $length = NULL)
	{
		if ($str == '' OR $mask == '')
			return 0;

		if (SHIN_UTF8::is_ascii($str) AND SHIN_UTF8::is_ascii($mask))
			return ($offset === NULL) ? strcspn($str, $mask) : (($length === NULL) ? strcspn($str, $mask, $offset) : strcspn($str, $mask, $offset, $length));

		if ($offset !== NULL OR $length !== NULL)
		{
			$str = SHIN_UTF8::_substr($str, $offset, $length);
		}

		// Escape these characters:  - [ ] . : \ ^ /
		// The . and : are escaped to prevent possible warnings about POSIX regex elements
		$mask = preg_replace('#[-[\].:\\\\^/]#', '\\\\$0', $mask);
		preg_match('/^[^'.$mask.']+/u', $str, $matches);

		return isset($matches[0]) ? SHIN_UTF8::_strlen($matches[0]) : 0;
	}

	/**
	 * SHIN_UTF8::stristr
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _stristr($str, $search)
	{
		if (SHIN_UTF8::is_ascii($str) AND SHIN_UTF8::is_ascii($search))
			return stristr($str, $search);

		if ($search == '')
			return $str;

		$str_lower = SHIN_UTF8::_strtolower($str);
		$search_lower = SHIN_UTF8::_strtolower($search);

		preg_match('/^(.*?)'.preg_quote($search, '/').'/s', $str_lower, $matches);

		if (isset($matches[1]))
			return substr($str, strlen($matches[1]));

		return FALSE;
	}

	/**
	 * SHIN_UTF8::strlen
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _strlen($str)
	{
		if (SHIN_UTF8::is_ascii($str))
			return strlen($str);

		return strlen(utf8_decode($str));
	}

	/**
	 * SHIN_UTF8::strpos
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _strpos($str, $search, $offset = 0)
	{
		$offset = (int) $offset;

		if (SHIN_UTF8::is_ascii($str) AND SHIN_UTF8::is_ascii($search))
			return strpos($str, $search, $offset);

		if ($offset == 0)
		{
			$array = explode($search, $str, 2);
			return isset($array[1]) ? SHIN_UTF8::_strlen($array[0]) : FALSE;
		}

		$str = SHIN_UTF8::substr($str, $offset);
		$pos = SHIN_UTF8::strpos($str, $search);
		return ($pos === FALSE) ? FALSE : $pos + $offset;
	}

	/**
	 * SHIN_UTF8::strrev
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _strrev($str)
	{
		if (SHIN_UTF8::is_ascii($str))
			return strrev($str);

		preg_match_all('/./us', $str, $matches);
		return implode('', array_reverse($matches[0]));
	}

	/**
	 * SHIN_UTF8::strrpos
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _strrpos($str, $search, $offset = 0)
	{
		$offset = (int) $offset;

		if (SHIN_UTF8::is_ascii($str) AND SHIN_UTF8::is_ascii($search))
			return strrpos($str, $search, $offset);

		if ($offset == 0)
		{
			$array = explode($search, $str, -1);
			return isset($array[0]) ? SHIN_UTF8::_strlen(implode($search, $array)) : FALSE;
		}

		$str = SHIN_UTF8::substr($str, $offset);
		$pos = SHIN_UTF8::strrpos($str, $search);
		return ($pos === FALSE) ? FALSE : $pos + $offset;
	}

	/**
	 * SHIN_UTF8::strspn
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _strspn($str, $mask, $offset = NULL, $length = NULL)
	{
		if ($str == '' OR $mask == '')
			return 0;

		if (SHIN_UTF8::is_ascii($str) AND SHIN_UTF8::is_ascii($mask))
			return ($offset === NULL) ? strspn($str, $mask) : (($length === NULL) ? strspn($str, $mask, $offset) : strspn($str, $mask, $offset, $length));

		if ($offset !== NULL OR $length !== NULL)
		{
			$str = SHIN_UTF8::substr($str, $offset, $length);
		}

		// Escape these characters:  - [ ] . : \ ^ /
		// The . and : are escaped to prevent possible warnings about POSIX regex elements
		$mask = preg_replace('#[-[\].:\\\\^/]#', '\\\\$0', $mask);
		preg_match('/^[^'.$mask.']+/u', $str, $matches);

		return isset($matches[0]) ? SHIN_UTF8::_strlen($matches[0]) : 0;
	}

	/**
	 * SHIN_UTF8::strtolower
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _strtolower($str)
	{
		if (SHIN_UTF8::is_ascii($str))
			return strtolower($str);

		static $UTF8_UPPER_TO_LOWER = NULL;

		if ($UTF8_UPPER_TO_LOWER === NULL)
		{
			$UTF8_UPPER_TO_LOWER = array(
				0x0041=>0x0061, 0x03A6=>0x03C6, 0x0162=>0x0163, 0x00C5=>0x00E5, 0x0042=>0x0062,
				0x0139=>0x013A, 0x00C1=>0x00E1, 0x0141=>0x0142, 0x038E=>0x03CD, 0x0100=>0x0101,
				0x0490=>0x0491, 0x0394=>0x03B4, 0x015A=>0x015B, 0x0044=>0x0064, 0x0393=>0x03B3,
				0x00D4=>0x00F4, 0x042A=>0x044A, 0x0419=>0x0439, 0x0112=>0x0113, 0x041C=>0x043C,
				0x015E=>0x015F, 0x0143=>0x0144, 0x00CE=>0x00EE, 0x040E=>0x045E, 0x042F=>0x044F,
				0x039A=>0x03BA, 0x0154=>0x0155, 0x0049=>0x0069, 0x0053=>0x0073, 0x1E1E=>0x1E1F,
				0x0134=>0x0135, 0x0427=>0x0447, 0x03A0=>0x03C0, 0x0418=>0x0438, 0x00D3=>0x00F3,
				0x0420=>0x0440, 0x0404=>0x0454, 0x0415=>0x0435, 0x0429=>0x0449, 0x014A=>0x014B,
				0x0411=>0x0431, 0x0409=>0x0459, 0x1E02=>0x1E03, 0x00D6=>0x00F6, 0x00D9=>0x00F9,
				0x004E=>0x006E, 0x0401=>0x0451, 0x03A4=>0x03C4, 0x0423=>0x0443, 0x015C=>0x015D,
				0x0403=>0x0453, 0x03A8=>0x03C8, 0x0158=>0x0159, 0x0047=>0x0067, 0x00C4=>0x00E4,
				0x0386=>0x03AC, 0x0389=>0x03AE, 0x0166=>0x0167, 0x039E=>0x03BE, 0x0164=>0x0165,
				0x0116=>0x0117, 0x0108=>0x0109, 0x0056=>0x0076, 0x00DE=>0x00FE, 0x0156=>0x0157,
				0x00DA=>0x00FA, 0x1E60=>0x1E61, 0x1E82=>0x1E83, 0x00C2=>0x00E2, 0x0118=>0x0119,
				0x0145=>0x0146, 0x0050=>0x0070, 0x0150=>0x0151, 0x042E=>0x044E, 0x0128=>0x0129,
				0x03A7=>0x03C7, 0x013D=>0x013E, 0x0422=>0x0442, 0x005A=>0x007A, 0x0428=>0x0448,
				0x03A1=>0x03C1, 0x1E80=>0x1E81, 0x016C=>0x016D, 0x00D5=>0x00F5, 0x0055=>0x0075,
				0x0176=>0x0177, 0x00DC=>0x00FC, 0x1E56=>0x1E57, 0x03A3=>0x03C3, 0x041A=>0x043A,
				0x004D=>0x006D, 0x016A=>0x016B, 0x0170=>0x0171, 0x0424=>0x0444, 0x00CC=>0x00EC,
				0x0168=>0x0169, 0x039F=>0x03BF, 0x004B=>0x006B, 0x00D2=>0x00F2, 0x00C0=>0x00E0,
				0x0414=>0x0434, 0x03A9=>0x03C9, 0x1E6A=>0x1E6B, 0x00C3=>0x00E3, 0x042D=>0x044D,
				0x0416=>0x0436, 0x01A0=>0x01A1, 0x010C=>0x010D, 0x011C=>0x011D, 0x00D0=>0x00F0,
				0x013B=>0x013C, 0x040F=>0x045F, 0x040A=>0x045A, 0x00C8=>0x00E8, 0x03A5=>0x03C5,
				0x0046=>0x0066, 0x00DD=>0x00FD, 0x0043=>0x0063, 0x021A=>0x021B, 0x00CA=>0x00EA,
				0x0399=>0x03B9, 0x0179=>0x017A, 0x00CF=>0x00EF, 0x01AF=>0x01B0, 0x0045=>0x0065,
				0x039B=>0x03BB, 0x0398=>0x03B8, 0x039C=>0x03BC, 0x040C=>0x045C, 0x041F=>0x043F,
				0x042C=>0x044C, 0x00DE=>0x00FE, 0x00D0=>0x00F0, 0x1EF2=>0x1EF3, 0x0048=>0x0068,
				0x00CB=>0x00EB, 0x0110=>0x0111, 0x0413=>0x0433, 0x012E=>0x012F, 0x00C6=>0x00E6,
				0x0058=>0x0078, 0x0160=>0x0161, 0x016E=>0x016F, 0x0391=>0x03B1, 0x0407=>0x0457,
				0x0172=>0x0173, 0x0178=>0x00FF, 0x004F=>0x006F, 0x041B=>0x043B, 0x0395=>0x03B5,
				0x0425=>0x0445, 0x0120=>0x0121, 0x017D=>0x017E, 0x017B=>0x017C, 0x0396=>0x03B6,
				0x0392=>0x03B2, 0x0388=>0x03AD, 0x1E84=>0x1E85, 0x0174=>0x0175, 0x0051=>0x0071,
				0x0417=>0x0437, 0x1E0A=>0x1E0B, 0x0147=>0x0148, 0x0104=>0x0105, 0x0408=>0x0458,
				0x014C=>0x014D, 0x00CD=>0x00ED, 0x0059=>0x0079, 0x010A=>0x010B, 0x038F=>0x03CE,
				0x0052=>0x0072, 0x0410=>0x0430, 0x0405=>0x0455, 0x0402=>0x0452, 0x0126=>0x0127,
				0x0136=>0x0137, 0x012A=>0x012B, 0x038A=>0x03AF, 0x042B=>0x044B, 0x004C=>0x006C,
				0x0397=>0x03B7, 0x0124=>0x0125, 0x0218=>0x0219, 0x00DB=>0x00FB, 0x011E=>0x011F,
				0x041E=>0x043E, 0x1E40=>0x1E41, 0x039D=>0x03BD, 0x0106=>0x0107, 0x03AB=>0x03CB,
				0x0426=>0x0446, 0x00DE=>0x00FE, 0x00C7=>0x00E7, 0x03AA=>0x03CA, 0x0421=>0x0441,
				0x0412=>0x0432, 0x010E=>0x010F, 0x00D8=>0x00F8, 0x0057=>0x0077, 0x011A=>0x011B,
				0x0054=>0x0074, 0x004A=>0x006A, 0x040B=>0x045B, 0x0406=>0x0456, 0x0102=>0x0103,
				0x039B=>0x03BB, 0x00D1=>0x00F1, 0x041D=>0x043D, 0x038C=>0x03CC, 0x00C9=>0x00E9,
				0x00D0=>0x00F0, 0x0407=>0x0457, 0x0122=>0x0123,
			);
		}

		$uni = SHIN_UTF8::_to_unicode($str);

		if ($uni === FALSE)
			return FALSE;

		for ($i = 0, $c = count($uni); $i < $c; $i++)
		{
			if (isset($UTF8_UPPER_TO_LOWER[$uni[$i]]))
			{
				$uni[$i] = $UTF8_UPPER_TO_LOWER[$uni[$i]];
			}
		}

		return SHIN_UTF8::_from_unicode($uni);
	}

	/**
	 * SHIN_UTF8::strtoupper
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _strtoupper($str)
	{
		if (SHIN_UTF8::is_ascii($str))
			return strtoupper($str);

		static $UTF8_LOWER_TO_UPPER = NULL;

		if ($UTF8_LOWER_TO_UPPER === NULL)
		{
			$UTF8_LOWER_TO_UPPER = array(
				0x0061=>0x0041, 0x03C6=>0x03A6, 0x0163=>0x0162, 0x00E5=>0x00C5, 0x0062=>0x0042,
				0x013A=>0x0139, 0x00E1=>0x00C1, 0x0142=>0x0141, 0x03CD=>0x038E, 0x0101=>0x0100,
				0x0491=>0x0490, 0x03B4=>0x0394, 0x015B=>0x015A, 0x0064=>0x0044, 0x03B3=>0x0393,
				0x00F4=>0x00D4, 0x044A=>0x042A, 0x0439=>0x0419, 0x0113=>0x0112, 0x043C=>0x041C,
				0x015F=>0x015E, 0x0144=>0x0143, 0x00EE=>0x00CE, 0x045E=>0x040E, 0x044F=>0x042F,
				0x03BA=>0x039A, 0x0155=>0x0154, 0x0069=>0x0049, 0x0073=>0x0053, 0x1E1F=>0x1E1E,
				0x0135=>0x0134, 0x0447=>0x0427, 0x03C0=>0x03A0, 0x0438=>0x0418, 0x00F3=>0x00D3,
				0x0440=>0x0420, 0x0454=>0x0404, 0x0435=>0x0415, 0x0449=>0x0429, 0x014B=>0x014A,
				0x0431=>0x0411, 0x0459=>0x0409, 0x1E03=>0x1E02, 0x00F6=>0x00D6, 0x00F9=>0x00D9,
				0x006E=>0x004E, 0x0451=>0x0401, 0x03C4=>0x03A4, 0x0443=>0x0423, 0x015D=>0x015C,
				0x0453=>0x0403, 0x03C8=>0x03A8, 0x0159=>0x0158, 0x0067=>0x0047, 0x00E4=>0x00C4,
				0x03AC=>0x0386, 0x03AE=>0x0389, 0x0167=>0x0166, 0x03BE=>0x039E, 0x0165=>0x0164,
				0x0117=>0x0116, 0x0109=>0x0108, 0x0076=>0x0056, 0x00FE=>0x00DE, 0x0157=>0x0156,
				0x00FA=>0x00DA, 0x1E61=>0x1E60, 0x1E83=>0x1E82, 0x00E2=>0x00C2, 0x0119=>0x0118,
				0x0146=>0x0145, 0x0070=>0x0050, 0x0151=>0x0150, 0x044E=>0x042E, 0x0129=>0x0128,
				0x03C7=>0x03A7, 0x013E=>0x013D, 0x0442=>0x0422, 0x007A=>0x005A, 0x0448=>0x0428,
				0x03C1=>0x03A1, 0x1E81=>0x1E80, 0x016D=>0x016C, 0x00F5=>0x00D5, 0x0075=>0x0055,
				0x0177=>0x0176, 0x00FC=>0x00DC, 0x1E57=>0x1E56, 0x03C3=>0x03A3, 0x043A=>0x041A,
				0x006D=>0x004D, 0x016B=>0x016A, 0x0171=>0x0170, 0x0444=>0x0424, 0x00EC=>0x00CC,
				0x0169=>0x0168, 0x03BF=>0x039F, 0x006B=>0x004B, 0x00F2=>0x00D2, 0x00E0=>0x00C0,
				0x0434=>0x0414, 0x03C9=>0x03A9, 0x1E6B=>0x1E6A, 0x00E3=>0x00C3, 0x044D=>0x042D,
				0x0436=>0x0416, 0x01A1=>0x01A0, 0x010D=>0x010C, 0x011D=>0x011C, 0x00F0=>0x00D0,
				0x013C=>0x013B, 0x045F=>0x040F, 0x045A=>0x040A, 0x00E8=>0x00C8, 0x03C5=>0x03A5,
				0x0066=>0x0046, 0x00FD=>0x00DD, 0x0063=>0x0043, 0x021B=>0x021A, 0x00EA=>0x00CA,
				0x03B9=>0x0399, 0x017A=>0x0179, 0x00EF=>0x00CF, 0x01B0=>0x01AF, 0x0065=>0x0045,
				0x03BB=>0x039B, 0x03B8=>0x0398, 0x03BC=>0x039C, 0x045C=>0x040C, 0x043F=>0x041F,
				0x044C=>0x042C, 0x00FE=>0x00DE, 0x00F0=>0x00D0, 0x1EF3=>0x1EF2, 0x0068=>0x0048,
				0x00EB=>0x00CB, 0x0111=>0x0110, 0x0433=>0x0413, 0x012F=>0x012E, 0x00E6=>0x00C6,
				0x0078=>0x0058, 0x0161=>0x0160, 0x016F=>0x016E, 0x03B1=>0x0391, 0x0457=>0x0407,
				0x0173=>0x0172, 0x00FF=>0x0178, 0x006F=>0x004F, 0x043B=>0x041B, 0x03B5=>0x0395,
				0x0445=>0x0425, 0x0121=>0x0120, 0x017E=>0x017D, 0x017C=>0x017B, 0x03B6=>0x0396,
				0x03B2=>0x0392, 0x03AD=>0x0388, 0x1E85=>0x1E84, 0x0175=>0x0174, 0x0071=>0x0051,
				0x0437=>0x0417, 0x1E0B=>0x1E0A, 0x0148=>0x0147, 0x0105=>0x0104, 0x0458=>0x0408,
				0x014D=>0x014C, 0x00ED=>0x00CD, 0x0079=>0x0059, 0x010B=>0x010A, 0x03CE=>0x038F,
				0x0072=>0x0052, 0x0430=>0x0410, 0x0455=>0x0405, 0x0452=>0x0402, 0x0127=>0x0126,
				0x0137=>0x0136, 0x012B=>0x012A, 0x03AF=>0x038A, 0x044B=>0x042B, 0x006C=>0x004C,
				0x03B7=>0x0397, 0x0125=>0x0124, 0x0219=>0x0218, 0x00FB=>0x00DB, 0x011F=>0x011E,
				0x043E=>0x041E, 0x1E41=>0x1E40, 0x03BD=>0x039D, 0x0107=>0x0106, 0x03CB=>0x03AB,
				0x0446=>0x0426, 0x00FE=>0x00DE, 0x00E7=>0x00C7, 0x03CA=>0x03AA, 0x0441=>0x0421,
				0x0432=>0x0412, 0x010F=>0x010E, 0x00F8=>0x00D8, 0x0077=>0x0057, 0x011B=>0x011A,
				0x0074=>0x0054, 0x006A=>0x004A, 0x045B=>0x040B, 0x0456=>0x0406, 0x0103=>0x0102,
				0x03BB=>0x039B, 0x00F1=>0x00D1, 0x043D=>0x041D, 0x03CC=>0x038C, 0x00E9=>0x00C9,
				0x00F0=>0x00D0, 0x0457=>0x0407, 0x0123=>0x0122,
			);
		}

		$uni = SHIN_UTF8::_to_unicode($str);

		if ($uni === FALSE)
			return FALSE;

		for ($i = 0, $c = count($uni); $i < $c; $i++)
		{
			if (isset($UTF8_LOWER_TO_UPPER[$uni[$i]]))
			{
				$uni[$i] = $UTF8_LOWER_TO_UPPER[$uni[$i]];
			}
		}

		return SHIN_UTF8::_from_unicode($uni);
	}

	/**
	 * SHIN_UTF8::substr
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _substr($str, $offset, $length = NULL)
	{
		if (SHIN_UTF8::is_ascii($str))
			return ($length === NULL) ? substr($str, $offset) : substr($str, $offset, $length);

		// Normalize params
		$str    = (string) $str;
		$strlen = SHIN_UTF8::_strlen($str);
		$offset = (int) ($offset < 0) ? max(0, $strlen + $offset) : $offset; // Normalize to positive offset
		$length = ($length === NULL) ? NULL : (int) $length;

		// Impossible
		if ($length === 0 OR $offset >= $strlen OR ($length < 0 AND $length <= $offset - $strlen))
			return '';

		// Whole string
		if ($offset == 0 AND ($length === NULL OR $length >= $strlen))
			return $str;

		// Build regex
		$regex = '^';

		// Create an offset expression
		if ($offset > 0)
		{
			// PCRE repeating quantifiers must be less than 65536, so repeat when necessary
			$x = (int) ($offset / 65535);
			$y = (int) ($offset % 65535);
			$regex .= ($x == 0) ? '' : '(?:.{65535}){'.$x.'}';
			$regex .= ($y == 0) ? '' : '.{'.$y.'}';
		}

		// Create a length expression
		if ($length === NULL)
		{
			$regex .= '(.*)'; // No length set, grab it all
		}
		// Find length from the left (positive length)
		elseif ($length > 0)
		{
			// Reduce length so that it can't go beyond the end of the string
			$length = min($strlen - $offset, $length);

			$x = (int) ($length / 65535);
			$y = (int) ($length % 65535);
			$regex .= '(';
			$regex .= ($x == 0) ? '' : '(?:.{65535}){'.$x.'}';
			$regex .= '.{'.$y.'})';
		}
		// Find length from the right (negative length)
		else
		{
			$x = (int) (-$length / 65535);
			$y = (int) (-$length % 65535);
			$regex .= '(.*)';
			$regex .= ($x == 0) ? '' : '(?:.{65535}){'.$x.'}';
			$regex .= '.{'.$y.'}';
		}

		preg_match('/'.$regex.'/us', $str, $matches);
		return $matches[1];
	}

	/**
	 * SHIN_UTF8::substr_replace
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _substr_replace($str, $replacement, $offset, $length = NULL)
	{
		if (SHIN_UTF8::is_ascii($str))
			return ($length === NULL) ? substr_replace($str, $replacement, $offset) : substr_replace($str, $replacement, $offset, $length);

		$length = ($length === NULL) ? SHIN_UTF8::_strlen($str) : (int) $length;
		preg_match_all('/./us', $str, $str_array);
		preg_match_all('/./us', $replacement, $replacement_array);

		array_splice($str_array[0], $offset, $length, $replacement_array[0]);
		return implode('', $str_array[0]);
	}

	/**
	 * SHIN_UTF8::to_unicode
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _to_unicode($str)
	{
		$mState = 0; // cached expected number of octets after the current octet until the beginning of the next UTF8 character sequence
		$mUcs4  = 0; // cached Unicode character
		$mBytes = 1; // cached expected number of octets in the current sequence

		$out = array();

		$len = strlen($str);

		for ($i = 0; $i < $len; $i++)
		{
			$in = ord($str[$i]);

			if ($mState == 0)
			{
				// When mState is zero we expect either a US-ASCII character or a
				// multi-octet sequence.
				if (0 == (0x80 & $in))
				{
					// US-ASCII, pass straight through.
					$out[] = $in;
					$mBytes = 1;
				}
				elseif (0xC0 == (0xE0 & $in))
				{
					// First octet of 2 octet sequence
					$mUcs4 = $in;
					$mUcs4 = ($mUcs4 & 0x1F) << 6;
					$mState = 1;
					$mBytes = 2;
				}
				elseif (0xE0 == (0xF0 & $in))
				{
					// First octet of 3 octet sequence
					$mUcs4 = $in;
					$mUcs4 = ($mUcs4 & 0x0F) << 12;
					$mState = 2;
					$mBytes = 3;
				}
				elseif (0xF0 == (0xF8 & $in))
				{
					// First octet of 4 octet sequence
					$mUcs4 = $in;
					$mUcs4 = ($mUcs4 & 0x07) << 18;
					$mState = 3;
					$mBytes = 4;
				}
				elseif (0xF8 == (0xFC & $in))
				{
					// First octet of 5 octet sequence.
					//
					// This is illegal because the encoded codepoint must be either
					// (a) not the shortest form or
					// (b) outside the Unicode range of 0-0x10FFFF.
					// Rather than trying to resynchronize, we will carry on until the end
					// of the sequence and let the later error handling code catch it.
					$mUcs4 = $in;
					$mUcs4 = ($mUcs4 & 0x03) << 24;
					$mState = 4;
					$mBytes = 5;
				}
				elseif (0xFC == (0xFE & $in))
				{
					// First octet of 6 octet sequence, see comments for 5 octet sequence.
					$mUcs4 = $in;
					$mUcs4 = ($mUcs4 & 1) << 30;
					$mState = 5;
					$mBytes = 6;
				}
				else
				{
					// Current octet is neither in the US-ASCII range nor a legal first octet of a multi-octet sequence.
					trigger_error('SHIN_UTF8::to_unicode: Illegal sequence identifier in UTF-8 at byte '.$i, E_USER_WARNING);
					return FALSE;
				}
			}
			else
			{
				// When mState is non-zero, we expect a continuation of the multi-octet sequence
				if (0x80 == (0xC0 & $in))
				{
					// Legal continuation
					$shift = ($mState - 1) * 6;
					$tmp = $in;
					$tmp = ($tmp & 0x0000003F) << $shift;
					$mUcs4 |= $tmp;

					// End of the multi-octet sequence. mUcs4 now contains the final Unicode codepoint to be output
					if (0 == --$mState)
					{
						// Check for illegal sequences and codepoints

						// From Unicode 3.1, non-shortest form is illegal
						if (((2 == $mBytes) AND ($mUcs4 < 0x0080)) OR
							((3 == $mBytes) AND ($mUcs4 < 0x0800)) OR
							((4 == $mBytes) AND ($mUcs4 < 0x10000)) OR
							(4 < $mBytes) OR
							// From Unicode 3.2, surrogate characters are illegal
							(($mUcs4 & 0xFFFFF800) == 0xD800) OR
							// Codepoints outside the Unicode range are illegal
							($mUcs4 > 0x10FFFF))
						{
							trigger_error('SHIN_UTF8::to_unicode: Illegal sequence or codepoint in UTF-8 at byte '.$i, E_USER_WARNING);
							return FALSE;
						}

						if (0xFEFF != $mUcs4)
						{
							// BOM is legal but we don't want to output it
							$out[] = $mUcs4;
						}

						// Initialize UTF-8 cache
						$mState = 0;
						$mUcs4  = 0;
						$mBytes = 1;
					}
				}
				else
				{
					// ((0xC0 & (*in) != 0x80) AND (mState != 0))
					// Incomplete multi-octet sequence
					trigger_error('SHIN_UTF8::to_unicode: Incomplete multi-octet sequence in UTF-8 at byte '.$i, E_USER_WARNING);
					return FALSE;
				}
			}
		}

		return $out;
	}


	/**
	 * SHIN_UTF8::trim
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _trim($str, $charlist = NULL)
	{
		if ($charlist === NULL)
			return trim($str);

		return SHIN_UTF8::ltrim(SHIN_UTF8::rtrim($str, $charlist), $charlist);
	}

	/**
	 * SHIN_UTF8::ucfirst
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _ucfirst($str)
	{
		if (SHIN_UTF8::is_ascii($str))
			return ucfirst($str);

		preg_match('/^(.?)(.*)$/us', $str, $matches);
		return SHIN_UTF8::_strtoupper($matches[1]).$matches[2];
	}

	/**
	 * SHIN_UTF8::ucwords
	 *
	 * @package    ShinPHP framework
	 * @author     ShinPHP framework Team
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt
	 */
	function _ucwords($str)
	{
		if (SHIN_UTF8::is_ascii($str))
			return ucwords($str);

		// [\x0c\x09\x0b\x0a\x0d\x20] matches form feeds, horizontal tabs, vertical tabs, linefeeds and carriage returns.
		// This corresponds to the definition of a 'word' defined at http://php.net/ucwords
		return preg_replace(
			'/(?<=^|[\x0c\x09\x0b\x0a\x0d\x20])[^\x0c\x09\x0b\x0a\x0d\x20]/ue',
			'SHIN_UTF8::_strtoupper(\'$0\')',
			$str
		);
	}

	/**
	 * Tests whether a string contains only 7-bit ASCII bytes. This is used to
	 * determine when to use native functions or UTF-8 functions.
	 *
	 * @param   string  string to check
	 * @return  bool
	 */
	public static function is_ascii($str)
	{
		return ! preg_match('/[^\x00-\x7F]/S', $str);
	}

	/**
	 * Strips out device control codes in the ASCII range.
	 *
	 * @param   string  string to clean
	 * @return  string
	 */
	public static function strip_ascii_ctrl($str)
	{
		return preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S', '', $str);
	}

	/**
	 * Strips out all non-7bit ASCII bytes.
	 *
	 * @param   string  string to clean
	 * @return  string
	 */
	public static function strip_non_ascii($str)
	{
		return preg_replace('/[^\x00-\x7F]+/S', '', $str);
	}
	

} // End of class


/* End of file SHIN_UTF8.php */
/* Location: shinfw/libraries/SHIN_UTF8.php */           	