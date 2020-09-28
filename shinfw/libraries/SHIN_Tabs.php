<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_Tabs.php
 */


/**
 * ShinPHP framework tabs library
 *
 * @package        ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link        shinfw/libraries/SHIN_Tabs.php
 */

class SHIN_Tabs extends SHIN_Libs
{

    protected $vertical = false;


    /**
     * Constructor. Init tabs with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('tabs', $css_file);

		Console::logSpeed('SHIN_Tabs begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Tabs. Size of class: ');
    }

    /**
     * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return string.
     */
    protected function _body($vertical = false)
    {
        $vertical_inj = ".addClass('ui-tabs-vertical ui-helper-clearfix');
        $(\"#{$this->htmlID} li\").removeClass('ui-corner-top').addClass('ui-corner-left')";
        
        if(!$vertical) {
             $vertical_inj = '';
        }
        
        //$("#testtabs").tabs();

        $_ret = "$(function() {
    $(\"#{$this->htmlID}\").tabs({";

        $_temporary = array();

        foreach($this->sh_Options as $p=>$k)
        {
             array_push($_temporary, "\n        {$p}: {$k}");
        }
             // this hask for solving problem in firebug 
             array_push($_temporary, 'ajaxOptions:{success: function(){}}');
        
        $_ret    .= implode(', ', $_temporary);

        $_ret    .= '
    })'. $vertical_inj  .';
});';

        return $_ret;
    }


    
    /**
    * return html for tabs
    * 
    * @param string $html_id - DOM id
    * @param array $tabs - array of the tabs
    * @access public
    * @return string
    */
    public function tabs($html_id, $tabs)
    {
        $inject_string = "<div id=\"$html_id\">
        <ul>";
        $i = 1;
        foreach ($tabs as $tab_name=>$tab_content)
        {
            $inject_string .= "<li><a href=\"#$html_id-$i\">$tab_name</a></li>";
            $i++;
        }
            
        $inject_string .= "            
        </ul>";
        
        $i = 1;
        foreach ($tabs as $tab_name=>$tab_content)
        {
            $inject_string .= "
            <div id=\"$html_id-$i\">
                <p>$tab_content</p>
            </div>";
            $i++;    
        }
        
        $inject_string .= "</div>\n";
        $inject_string .= $this->_head();
        $inject_string .= $this->render($html_id);
        $inject_string .= $this->_footer();
        return $inject_string;
    }

    /**
    * return html for ajax tabs
    * 
    * @param string $html_id - DOM id
    * @param array $tabs - array of the tabs
    * @param string $error_msg - error message 
    * @access public
    * @return string
    */
    public function ajaxtabs($html_id, $tabs, $error_msg = "Connection error had occured.")
    {
        
        $ajax_options = "{
            error: function(xhr, status, index, anchor) {
                $(anchor.hash).html(\"$error_msg\");
            },
            success: function(){}
        }";
        
        $params = Array(
            'ajaxOptions' => $ajax_options
        );
        $this->sh_Options = Array();
        $this->_config_mapper($params);
        
        $inject_string = "<div id=\"$html_id\">\n
        <ul>\n";
        $i = 1;
        foreach ($tabs as $tab_name=>$tab_url)
        {
            $inject_string .= "<li><a href=\"$tab_url\">$tab_name</a></li>\n";
            $i++;
        }
            
        $inject_string .= "            
        </ul>\n";
        
        $inject_string .= "</div>\n";
        $inject_string .= $this->_head();
        $inject_string .= $this->render($html_id);
        $inject_string .= $this->_footer();
        return $inject_string;
    }
    
    /**
    * return html for vertical tabs
    * 
    * @param string $html_id - DOM id
    * @param array $tabs - array of the tabs
    * @access public
    * @return string
    */
    public function verticaltabs($html_id, $tabs)
    {
        $inject_string = "<div id=\"$html_id\">
        <ul>";
        $i = 1;
        foreach ($tabs as $tab_name=>$tab_content)
        {
            $inject_string .= "<li><a href=\"#$html_id-$i\">$tab_name</a></li>";
            $i++;
        }
            
        $inject_string .= "            
        </ul>";
        
        $i = 1;
        foreach ($tabs as $tab_name=>$tab_content)
        {
            $inject_string .= "
            <div id=\"$html_id-$i\">
                <p>$tab_content</p>
            </div>";
            $i++;    
        }
        
        $inject_string .= "</div>\n";
        $inject_string .= $this->_head();
        $inject_string .= $this->render($html_id, true);
        $inject_string .= $this->_footer();
        return $inject_string;
    }
    
    /**
    * return html for ajax vertical tabs
    * 
    * @param string $html_id - DOM id
    * @param array $tabs - array of the tabs
    * @param string $error_msg - error message 
    * @access public
    * @return string
    */
    public function verticalajaxtabs($html_id, $tabs, $error_msg = "Connection error had occured.")
    {
        
        $ajax_options = "{
            error: function(xhr, status, index, anchor) {
                $(anchor.hash).html(\"$error_msg\");
            }, 
            success: function(){}
        }";
        
        $params = Array(
            'ajaxOptions' => $ajax_options
        );
        $this->sh_Options = Array();
        $this->_config_mapper($params);
        
        $inject_string = "<div id=\"$html_id\">\n
        <ul>\n";
        $i = 1;
        foreach ($tabs as $tab_name=>$tab_url)
        {
            $inject_string .= "<li><a href=\"$tab_url\">$tab_name</a></li>\n";
            $i++;
        }
            
        $inject_string .= "            
        </ul>\n";
        
        $inject_string .= "</div>\n";
        $inject_string .= $this->_head();
        $inject_string .= $this->render($html_id, true);
        $inject_string .= $this->_footer();
        return $inject_string;
    }
    

} // End of class 

/* End of file SHIN_Tabs.php */
/* Location: shinfw/libraries/SHIN_Tabs.php */               