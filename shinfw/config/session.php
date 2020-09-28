<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Session Variables
|--------------------------------------------------------------------------
|
| 'session_cookie_name' = the name you want for the cookie
| 'encrypt_sess_cookie' = TRUE/FALSE (boolean).  Whether to encrypt the cookie
| 'session_expiration'  = the number of SECONDS you want the session to last.
|  by default sessions last 7200 seconds (two hours).  Set to zero for no expiration.
| 'time_to_update'		= how many seconds between CI refreshing Session Information
|
*/
$session['sess_cookie_name']		= 'shfw_session';
$session['sess_expiration']			= 7200;
$session['sess_encrypt_cookie']		= FALSE;
$session['sess_use_database']		= FALSE;
$session['sess_table_name']			= 'shfw_sessions';
$session['sess_match_ip']			= FALSE;
$session['sess_match_useragent']	= TRUE;
$session['sess_time_to_update'] 	= 7200;

/*
|--------------------------------------------------------------------------
| Cookie Related Variables
|--------------------------------------------------------------------------
|
| 'cookie_prefix' = Set a prefix if you need to avoid collisions
| 'cookie_domain' = Set to .your-domain.com for site-wide cookies
| 'cookie_path'   =  Typically will be a forward slash
|
*/
$session['cookie_prefix']	= "";
$session['cookie_domain']	= "";
$session['cookie_path']		= "/";

$session['time_reference'] = 'local';
$session['encryption_key'] = "";

/*
|--------------------------------------------------------------------------
| Reverse Proxy IPs
|--------------------------------------------------------------------------
|
| If your server is behind a reverse proxy, you must whitelist the proxy IP
| addresses from which CodeIgniter should trust the HTTP_X_FORWARDED_FOR
| header in order to properly identify the visitor's IP address.
| Comma-delimited, e.g. '10.0.1.200,10.0.1.201'
|
*/
$config['proxy_ips'] = '';



/* End of file session.php */
/* Location: ./shinfw/config/session.php */