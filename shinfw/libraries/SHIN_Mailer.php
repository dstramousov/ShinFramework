<?php
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_Mailer.php
 */


/**
 * ShinPHP framework phpmailer library.
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		shinfw/libraries/SHIN_Mailer.php
 */


require_once('phpmailer/class.phpmailer.php');
  
class SHIN_Mailer extends PHPMailer
{
    protected $_host;
    protected $_port;
    protected $_SMTPauth;
    protected $_SMTPDebug;
    protected $_SMTPSecure;
    protected $_username;
    protected $_password;
    protected $_fromName;
    protected $_fromAddress;
    protected $_timeOut;
    
    
    /**
    * Constructor of the class.
    * initalizes mailer, sets basic parameters
    * 
    */
    public function __construct()
    {
        include(SHIN_Core::isConfigExists('mailer.php')); 

        parent::__construct();
        
        $this->init($mailer);
        
		Console::logSpeed('SHIN_Mailer begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Mailer. Size of class: ');		        

        return $this;
    }
    
    
    /**
    * init base params of plugin
    * 
    * @param array $params - params list
    * @access public
    * @return null
    */
    public function init($params)
    {
        $this->_config_mapper($params);
        
        $this->IsSMTP();
        
        $this->SMTPDebug         = $this->_SMTPDebug;       
        $this->Host              = $this->_host;    
        $this->Port              = $this->_port;
        $this->SMTPAuth          = $this->_SMTPauth;
        $this->SMTPSecure        = $this->_SMTPSecure;
        $this->Username          = $this->_username; 
        $this->Password          = $this->_password;
        $this->Timeout           = $this->_timeOut;
                
        $this->SetFrom($this->_fromAddress, $this->_fromName);

    }    
    
    /**
    * marge user param and paramf from config file
    * 
    * @param array $params - params list
    * @access protected
    * @return null
    */
    protected function _config_mapper($params)
    {   
        $this->_SMTPDebug     = $params['SMTPDebug'];      
        $this->_host          = $params['Host'];
        $this->_port          = $params['Port'];
        $this->_SMTPauth      = $params['SMTPAuth'];
        $this->_SMTPSecure    = $params['SMTPSecure'];
        $this->_username      = $params['Username'];
        $this->_password      = $params['Password'];
        $this->_fromName      = $params['from_name'];
        $this->_fromAddress   = $params['from_address'];
        $this->_timeOut       = $params['timeout'];  
    }                                                                                  

} // End of class

/* End of file SHIN_Mailer.php */
/* Location: shinfw/libraries/SHIN_Mailer.php */