<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_Message.php
 */


/**
 * ShinPHP framework caruosel library
 *
 * @package        ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link        shinfw/libraries/SHIN_Message.php
 */


class SHIN_Message extends SHIN_Libs
{
    
    private $errors =   array();
    
    private $messages = array();
    
    private $warnings  = array();
    
    /**
     * Constructor. Init dialog with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('message', $css_file);
        
		Console::logSpeed('SHIN_Message begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Message. Size of class: ');
    }

    /**
     * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return string.
     */
    protected function _body()
    {   
        SHIN_Core::$_libs['templater']->assign('messages',  $this->_renderMessages());    
        SHIN_Core::$_libs['templater']->assign('errors',    $this->_renderErrors());    
        SHIN_Core::$_libs['templater']->assign('warnings',  $this->_renderWarnings());    
    }
    
    /**
    * render messages and return html code
    * 
    * @access protected
    * @param null
    * @return string
    * 
    */
    protected function _renderMessages(){
        
        $injectedCode = '';
        
        if(!empty($this->messages)) {
            $injectedCode = '<div style="margin-top: 20px; padding: 0pt 0.7em;" class="ui-state-highlight ui-corner-all">
                              <p>';
                foreach($this->messages as $message) {
                    $injectedCode .= $message . '<br />';    
                }
            $injectedCode.= ' </p>
                             </div>';
        }
        
        return $injectedCode;
        
    }
    
    /**
    * render errors and return html code
    * 
    * @access protected
    * @param null
    * @return string
    * 
    */
    protected function _renderErrors(){
        
        $injectedCode = '';
        
        if(!empty($this->errors)) {
            $injectedCode = '<div style="margin-top: 20px; padding: 0pt 0.7em;" class="ui-state-error ui-corner-all">
                              <p>';
                foreach($this->errors as $errors) {
                    $injectedCode .= $errors . '<br />';    
                }
            $injectedCode.= ' </p>
                             </div>';
        }
        
        return $injectedCode;
    }
    
    /**
    * render warnings and return html code
    * 
    * @access protected
    * @param null
    * @return string
    * 
    */
    protected function _renderWarnings(){
        
        return null;
        
    }
    
    /**
    * get message by type
    * 
    * @access public
    * @param string $type - can be error|message|warning
    * @return string
    * 
    */
    public function getMessagesByType($type){
        
        switch($type) {
            case 'error':
                return $this->_renderErrors();
                break;
            case 'message':
                return $this->_renderMessages();
                break;
            case 'warning':
                return $this->_renderMessages(); 
                break;
        }
        
        return null;     
    }
    
    /**
    * add message
    * 
    * @param string $message
    * @access public
    * @return null
    */
    public function addMessage($message){
        
        if(!empty($message)) {
            if(is_array($message)) {
                $this->messages = array_merge($this->messages, $message);
            } else {
                $this->messages[]   =   $message;
            }
        }    
    }
   
    /**
    * add error
    * 
    * @param string $error
    * @access public
    * @return null
    */ 
    public function addError($error){
        
        if(!empty($error)) {
            if(is_array($error)) {
                $this->errors = array_merge($this->errors, $error);
            } else {
                $this->errors[]   =   $error;
            }
        }
    }
    
    /**
    * add warning
    * 
    * @param string $warning
    * @access public
    * @return null
    */
    public function addWarning($warning){
    
        if(!empty($warning)) {
            if(is_array($warning)) {
                $this->warnings = array_merge($this->warnings, $warning);
            } else {
                $this->warnings[]   =   $warning;
            }
        }
    }
    
    /**
    * get html layout for messages
    * 
    * @access public
    * @parameter null
    * @return string
    * 
    */
    public function getMessageBlock($messageId = 'js-message'){
        return '<div style="margin-top: 20px; padding: 0pt 0.7em; display: none;" class="ui-state-highlight ui-corner-all" id="' . $messageId . '"><p></p></div>';    
    }
    
    /**
    * get html layout for errors
    * 
    * @access public
    * @parameter null
    * @return string
    * 
    */
    public function getErrorBlock($errorId = 'js-error'){
        return '<div style="margin-top: 20px; padding: 0pt 0.7em; display: none;" class="ui-state-error ui-corner-all" id="' . $errorId . '"><p></p></div>';    
    }
    
    /**
    * get html layout for warnings
    * 
    * @access public
    * @parameter null
    * @return string
    * 
    */
    public function getWarningBlock(){}
    
}// End of class 


/* End of file SHIN_Message.php */
/* Location: shifw/library/SHIN_Message.php */