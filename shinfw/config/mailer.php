<?php

/**
* Config for PHP Mailer library
 *
 * @package        ShinPHP framework
 * @author                      
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource
*/

/**
* SMTP host to send mail
*     
* @var string
*/
$mailer['Host']      = "smtp.gmail.com";

/**
* SMTP port on the server
* 
* @var int
*/
$mailer['Port']      = "465";

/**
* Is SMTP authorization using ?
* 
* @var bool
*/
$mailer['SMTPAuth']  = true;

/**
* sets the prefix to the servier
* 
* ssl|null
* 
* @var bool
*/
$mailer['SMTPSecure']  = "ssl";


$mailer['SMTPDebug']  = 3;


/**
* username for SMTP sever
* 
* @var string
*/
$mailer['Username']  = "shinswtest@gmail.com";

/**
* password for SMTP server
* 
* @var string
*/
$mailer['Password']  = "shinswtest2009";

/**
* mail from 
* 
* @var string
*/
$mailer['from_address']     = 'shinswtest@gmail.com';

/**
* mail from name
* 
* @var string
*/
$mailer['from_name']     = 'ShinFramework';


/**
* Sets the SMTP server timeout in seconds.
* This function will not work with the win32 version.
* 
* @var int
* 
*/
$mailer['timeout']  =   13;

?>
