<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * shinfw\libraries\SHIN_Constants.php
 *
 * This class contain and define some constants for all application.
 *
 * @version 0.1
 * @package SHIN_Constants
 */


class SHIN_Constants {

	/**
	 * Define constants for all application.
	 */
    function __construct()
    {
	
    	// user model constants
		define('CT_USER_ACTIVE',	'active');
		define('CT_USER_SUSPENDED',	'suspended');
		define('CT_USER_WAUTH',		'wauth');
		define('CT_USER_CLOSED',	'closed');
	
		/**
		 * Empty string.
		 */
		define('CT_EMPTY_STR', '');
        
        /**
        * show
        */
        define('CT_SHOW', '1');
        
        /**
        * hide
        */
        define('CT_HIDE', '0');
        
        /**
        * tinyint signed range min 
        */
        define('CT_TINYINT_SIGNED_MIN', -128);
        
        /**
        * tinyint signed range max 
        */
        define('CT_TINYINT_SIGNED_MAX', 127);
        
        /**
        * tinyint unsigned range min 
        */
        define('CT_TINYINT_UNSIGNED_MIN', 0);
        
        /**
        * tinyint unsigned range max 
        */
        define('CT_TINYINT_UNSIGNED_MAX', 255);
        
        /**
        * smallint signed range min   
        */
        define('CT_SMALLINT_SIGNED_MIN', -32768);
        
        /**
        * smallint signed range max 
        */
        define('CT_SMALLINT_SIGNED_MAX', 32767);
        
        /**
        * smallint unsigned range min 
        */
        define('CT_SMALLINT_UNSIGNED_MIN', 0);
        
        /**
        * smallint unsigned range max 
        */
        define('CT_SMALLINT_UNSIGNED_MAX', 65535);
        
        /**
        * mediumint signed range min 
        */
        define('CT_MEDIUMINT_SIGNED_MIN', -8388608);
        
        /**
        * mediumint signed range max
        */
        define('CT_MEDIUMINT_SIGNED_MAX', 8388607);
        
        /**
        * mediumint unsigned range min 
        */
        define('CT_MEDIUMINT_UNSIGNED_MIN', 0);
        
        /**
        * mediumint unsigned range max 
        */
        define('CT_MEDIUMINT_UNSIGNED_MAX', 16777215);
        
        /**
        * integer signed range min 
        */
        define('CT_INTEGER_SIGNED_MIN', -2147483648);
        
        /**
        * integer signed range max 
        */
        define('CT_INTEGER_SIGNED_MAX', 2147483647);
        
        /**
        * integer unsigned range min 
        */
        define('CT_INTEGER_UNSIGNED_MIN', 0);
        
        /**
        * integer unsigned range max 
        */
        define('CT_INTEGER_UNSIGNED_MAX', 4294967295);
        
        /**
        * bigint signed range min 
        */
        define('CT_BIGINT_SIGNED_MIN', -9223372036854775808);
        
        /**
        * bigint signed range max 
        */
        define('CT_BIGINT_SIGNED_MAX', 9223372036854775807);
        
        /**
        * bigint unsigned range min 
        */
        define('CT_BIGINT_UNSIGNED_MIN', 0);
        
        /**
        * bigint unsigned range max 
        */
        define('CT_BIGINT_UNSIGNED_MAX', 18446744073709551615);
        
        /**
        * varchar 25 
        */
        define('CT_VARCHAR_25', 25);
        
        /**
        * varchar 50 
        */
        define('CT_VARCHAR_50', 50);
        
        /**
        * varchar 100 
        */
        define('CT_VARCHAR_100', 100);
        
        /**
        * varchar 150 
        */
        define('CT_VARCHAR_150', 150);
        
        /**
        * varchar 200 
        */
        define('CT_VARCHAR_200', 200);
        
        /**
        * varchar 255 
        */
        define('CT_VARCHAR_255', 255);
        
        /**
        * varchar 400 
        */
        define('CT_VARCHAR_400', 400);



        /**
        * GTR project constant definition section
        */
		define('CT_TREE_ELEMENT_TYPE_ROOT', NULL);
	}

} // End of class 

/* End of file SHIN_Constants.php */
/* Location: shinfw/libraries/SHIN_Constants.php */           	