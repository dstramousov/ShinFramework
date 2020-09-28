<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Dialog.php
 */


/**
 * ShinPHP framework dialog library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Dialog.php
 */

class SHIN_Dialog extends SHIN_Libs
{

    /**
     * Constructor. Init dialog with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('dialog', $css_file); 
		
		Console::logSpeed('SHIN_Dialog begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Dialog. Size of class: ');		        
    }

    /**
    * insrt content
    * 
    * @param strinf $id - DOM id
    * @param string $content - inner content
    * @param string $class - DOM class
    * @access public
    * @return string
    */
    public function insert_content($id, $content, $class="demo")
    {
        $html = '<div class="'.$class.'" id="'.$id.'">
        '.$content.'
        </div>';
        return $html;
    }
    
    /**
    * set modal
    * 
    * @param boolean $modal
    * @access public
    * @return null
    */
    public function set_modal($modal = true)
    {
        if($modal) {
            $this->_config_mapper(Array('modal'=>'true'));            
        } else {
            $this->_config_mapper(Array('modal'=>'false'));
        }
    }
    
    /**
    * make basic dialog
    * 
    * @access public
    * @param string $id - DOM id
    * @param string $title - dialog title
    * @param string $body - inner content
    * @return string
    */
    public function dialog($id, $title, $body)
    {
        $this->set_title($title);
        return $this->insert_content($id, $body);
    }    
    
    /**
    * make basic confirm dialog
    * 
    * @access public
    * @param string $id - DOM id
    * @param strinf $title - dialog title
    * @param string $body - inner content 
    * @param array $buttons  - array of the buttons
    * @return string
    */
    public function confirm_dialog($id, $title, $body, $buttons)
    {
        $this->set_modal();
        $this->set_title($title);
        $inject = "{";
            
        foreach ($buttons as $button=>$action_name) {
            if ($action_name) {
                $inject .= "'$button': function() {
                    $action_name();
                },";
            } else {
                $inject .= "'$button': function() {
                    alert('$button');
                },";
            }
            
        } 
        
        $inject = substr($inject, 0, strlen($inject)-1);    
        $inject .= "}";
        
        $this->_config_mapper(Array('buttons'=>$inject));
        return $this->insert_content($id, $body);
    }
    
    /**
    * make basic confirm dialog with correct colback
    * 
    * @access public
    * @param string $id - DOM id
    * @param strinf $title - dialog title
    * @param string $body - inner content 
    * @param array $buttons  - array of the buttons
    * @return string
    */
    public function confirm_dialog_correct($id, $title, $body, $buttons)
    {
        $this->set_modal();
        $this->set_title($title);
        $inject = "{";
            
        foreach ($buttons as $button=>$action_name) {
            if ($action_name) {
                $inject .= "'$button': function(e, data) {
                    $action_name;
                },";
            } else {
                $inject .= "'$button': function() {
                    alert('$button');
                },";
            }
            
        } 
        
        $inject = substr($inject, 0, strlen($inject)-1);    
        $inject .= "}";
        
        $this->_config_mapper(Array('buttons'=>$inject));
        return $this->insert_content($id, $body);
    }
    
    /**
    * make JS objet for array list
    * 
    * @access public
    * @param null
    * @return string
    * 
    */
    public function form_dialog()
    {
        $this->set_modal();
        $this->set_title($title);
        $inject = "{";
            
        foreach ($buttons as $button=>$action_name) {
            if ($action_name) {
                $inject .= "'$button': function() {
                    $action_name ();
                },";
            } else {
                $inject .= "'$button': function() {
                    alert('$button');
                },";
            }
            
        } 
        
        $inject = substr($inject, 0, strlen($inject)-1);    
        $inject .= "}";
        
        $this->_config_mapper(Array('buttons'=>$inject));
        return $this->insert_content($id, $body);        
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
        //$("#testdialog").dialog();

        $_ret = "$(function() {
    $(\"#{$this->htmlID}\").dialog({";

        $_temporary = array();

        foreach($this->sh_Options as $p=>$k)
        {
             array_push($_temporary, "\n        {$p}: {$k}");
        }
        $_ret    .= implode(', ', $_temporary);

        $_ret    .= '
    });
});';
                
        return $_ret;
    }


    /**
    * set title for dialog
    * 
    * @param string $title - dialog title
    * @access public
    * @return null
    */
    public function set_title($title)
    {
        $params = array('title'=>"'$title'");
        $this->_config_mapper($params);
    }

} // End of class 

/* End of file SHIN_Dialog.php */
/* Location: shinfw/libraries/SHIN_Dialog.php */               
