<?php

ini_set('memory_limit', '256M');

// Define shin framework init script name
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// Define where is shin framework placed.
define('BASEPATH', str_replace(SELF, '', __FILE__));

// Define where is CORE shin framework placed.
define('COREPATH', realpath(dirname(__FILE__)).'/core/');

// Define where is CORE shin framework placed.
define('CT_BASE_CLASS', NULL);



// Include Shin_Core file
require_once("core/SHIN_Core.php");


/* End of file shinfw.php */
/* Location: ./shinfw.php */