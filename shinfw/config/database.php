<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group   = "default";
$active_record  = TRUE;
$sys_database   = "default";

$db['mssql']['hostname']                = "APOLLO\SQLEXPRESS";
$db['mssql']['username']                = "sa";
$db['mssql']['password']                = "root";
$db['mssql']['database']                = "shinframework";
$db['mssql']['dbdriver']                = "mssql";
$db['mssql']['dbprefix']                = "";
$db['mssql']['pconnect']                = FALSE;
$db['mssql']['db_debug']                = FALSE;
$db['mssql']['cache_on']                = FALSE;
$db['mssql']['cachedir']                = "application/dbcache";
$db['mssql']['char_set']                = "utf8";
$db['mssql']['dbcollat']                = "utf8_general_ci";
$db['mssql']['db_datetime_format']      = "Y-m-d H:i:s";
$db['mssql']['db_date_format']          = "Y-m-d";
$db['mssql']['mssql_db_date_format']    = "Ymd";


$db['default']['hostname']              = "localhost";
$db['default']['username']              = "root";
$db['default']['password']              = "root";
$db['default']['database']              = "shinframework";
$db['default']['dbdriver']              = "mysqli";
$db['default']['dbprefix']              = "";
$db['default']['pconnect']              = TRUE;
$db['default']['db_debug']              = TRUE;
$db['default']['cache_on']              = FALSE;
$db['default']['cachedir']              = "";
$db['default']['char_set']              = "utf8";
$db['default']['dbcollat']              = "utf8_general_ci";
$db['default']['db_datetime_format']    = "Y-m-d H:i:s";
$db['default']['db_date_format']        = "Y-m-d";
$db['default']['db_time_format']        = "H:i:s";
$db['default']['view_definer']        = "AUTO";					// AUTO|CUSTOM|OFF
$db['default']['view_custom_definer'] = "myname@myhost";
/*
|--------------------------------------------------------------------------
| Set variables for mysql working parameter "names"
|--------------------------------------------------------------------------
*/
$db['default']['mysql_names'] = 'UTF8';

/*
|--------------------------------------------------------------------------
| Set variables for mysql working parameter "character_set_client"
|--------------------------------------------------------------------------
*/
$db['default']['mysql_character_set_client'] = 'UTF8';

/*
|--------------------------------------------------------------------------
| Set variables for mysql working parameter "character_set_results" 
|--------------------------------------------------------------------------
*/
$db['default']['mysql_character_set_results'] = 'UTF8';

/*
|--------------------------------------------------------------------------
| Set variables for mysql working parameter "names_collation_connection"
|--------------------------------------------------------------------------
*/
$db['default']['mysql_names_collation_connection'] = 'UTF8_general_ci';

/* End of file database.php */
/* Location: ./config/database.php */