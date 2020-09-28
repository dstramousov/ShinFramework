<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Core Components files
| 2. Libraries
| 3. Helper files
| 4. Models files

*/

/*
| -------------------------------------------------------------------
|  Auto-load core Components Files
| -------------------------------------------------------------------
| These are the classes located in the 'core' folder
|
| Prototype:
|
|	$autoload['core'] = array('SHIN_Benchmark', 'SHIN_Config', 'SHIN_Input');
*/

$autoload['core'] = array('SHIN_Log', 'SHIN_Benchmark');


/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in the 'libraries' and 'core' folders.
|
| Prototype:
|
|	$autoload['libraries'] = array('SHIN_Templater');
*/

$autoload['libraries'] = array(array('SHIN_Templater'=>'default'));


/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| These are the classes located in the 'helpers' folder
|
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/

$autoload['helper'] = array('dump', 'url');


/*
| -------------------------------------------------------------------
|  Auto-load Models Files
| -------------------------------------------------------------------
| These are the classes located in the 'models' folder
|
| Prototype:
|
|	$autoload['helper'] = array('User', 'Product');
*/

$autoload['models'] = array();



/* End of file autoload.php */
/* Location: ./config/autoload.php */