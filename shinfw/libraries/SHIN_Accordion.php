<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Accordion.php
 */


/**
 * ShinPHP framework accordion library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Accordion.php
 */

class SHIN_Accordion extends SHIN_Libs
{

    /**
    * Flag to turn on sortable methods
    * 
    * @var bool
    */
    var $_sortable =  false;


    /**
     * Constructor. Init accordion with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('accordion', $css_file);

		Console::logSpeed('SHIN_Accordion begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Accordion. Size of class: ');		        
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
        //$("#testaccordion").accordion();
        if (!$this->_sortable) {
                    $_ret = "$(function() {
                $(\"#{$this->htmlID}\").accordion({";

                    $_temporary = array();

                    foreach($this->sh_Options as $p=>$k)
                    {
                         array_push($_temporary, "\n        {$p}: {$k}");
                    }
                    $_ret    .= implode(', ', $_temporary);

                    $_ret    .= '
                });
            });';

        } else {

                //$sh_options = $this->sh_Options;
                $sh_options['header'] = "\"> div > h3\"";
                $this->sh_Options = $sh_options;
                
                $_ret = "$(function() {
                    var stop = false;
                    $(\"#{$this->htmlID} h3\").click(function(event) {
                        if (stop) {
                            event.stopImmediatePropagation();
                            event.preventDefault();
                            stop = false;
                        }
                    });
                    $(\"#{$this->htmlID}\").accordion({";

                    $_temporary = array();
                    foreach($this->sh_Options as $p=>$k)
                    {
                         array_push($_temporary, "\n        {$p}: {$k}");
                    }
                    $_ret    .= implode(', ', $_temporary);
                    $_ret    .= "

                        
                    }).sortable({
                        axis: \"y\",
                        handle: \"h3\",
                        stop: function(event, ui) {
                            stop = true;
                        }
                    });
                });";
        }
                
        return $_ret;
    }          

    /**
    * set sortable
    * 
    * @param bollean $sortable
    * @access public
    * @return NULL
    */
    public function set_sortable ($sortable = true)
    {
        $this->_sortable = $sortable;
    }

    /**
     * Return pointer for this class.
     *
     * @access public
     * @param NULL
     * @return pointer for this class.
     */
    public function accordion_tabs($id, $tabs)
    {
        if (!$this->_sortable) {
            $inject_html = "
                <DIV id=\"$id\">\n";
                
            foreach ($tabs as $tab_name=>$tab_content)
            {
                $inject_html .= "<H3><A href=\"#\">$tab_name</A></H3>
                    <DIV>
                        <P>
                            $tab_content
                        </P>
                    </DIV>";
            }
            $inject_html .= "</DIV>";         
            
        } else {
            $inject_html = "
                <DIV id=\"$id\">\n";
                
            foreach ($tabs as $tab_name=>$tab_content)
            {
                $inject_html .= "
                <DIV>
                    <H3><A href=\"#\">$tab_name</A></H3>
                    <DIV>
                        <P>
                            $tab_content
                        </P>
                    </DIV>
                </DIV>";
            }
            $inject_html .= "</DIV>";         
            
            
            
        }
        
        return $inject_html; 
    }

} // End of class 

/* End of file SHIN_Accordion.php */
/* Location: shinfw/libraries/SHIN_Accordion.php */               
