<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_Panels.php
 */


/**
 * ShinPHP framework panels library
 *
 * @package        ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link        shinfw/libraries/SHIN_Panels.php
 */


class SHIN_Panels extends SHIN_Libs
{
    
    /**
    * events array
    */
    var $events =   array();
    
    /**
    * params array
    * 
    * @var mixed
    */
    var $params =   array();
    
    
    /**
     * Constructor. Init dialog with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('panel', $css_file); 

		Console::logSpeed('SHIN_Panels begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Panels. Size of class: ');
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
        SHIN_Core::$_jsmanager->addOutDomReadyComponent('var panelsState = new Array();');
        $injectionCode  =   $this->_initSortable() . "\n" . $this->_initEventHandlers() . "\n" . $this->_initEventFunctions() . "\n";

        return $injectionCode;   
                
    }
    
    /**
    * method generate sortable plugin code
    * 
    * @access private
    * @params NULL
    * @return string
    */
    
    private function _initSortable(){
        
        $injectionCode = '$(".column").sortable({
            connectWith: "' . $this->sh_Options['connectWith'] . '",
            cursor:      "' . $this->sh_Options['cursor'] . '",
            stop:        function(event, ui) {
                updatePanelData();        
            },
            handle:      "' . $this->sh_Options['handle'] . '"      
        });';
        
        return $injectionCode;    
    }
    
    /**
    * method generate code for all handlers, for example: minimize/maximize, close
    * 
    * @access private
    * @params NULL
    * @return string
    */
    private function _initEventHandlers(){
        
        $injectionCode = '';
        
        if(isset($this->events['init'])) {
            $str = '';
            foreach($this->params['data'] as $data) {
                if(!empty($data['ajax_data_url'])) {
                    $str .= $data['idPanel'] . ':' . '"' . SHIN_Core::$_config['core']['app_base_url'] . '/' . $data['ajax_data_url'] . '", ';
                }
            }
            
            $str = 'var options = {' . substr($str, 0, -2) . '}; ';
            $injectionCode = $str . $this->events['init'] . '(this, "init", options); ';
        }
        
        $injectionCode .= '
        
        $(".portlet").each(function(){
            $(this).addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all");
            
            $portletHeader = $(this).find(".portlet-header").addClass("ui-widget-header ui-corner-all");
            
            
            if($($portletHeader).attr("show-info") == 1) {
                $($portletHeader).prepend(\'<span class="ui-icon ui-icon-info"></span>\');
            }
            
            if($($portletHeader).attr("show-turn") == 1) {
                $($portletHeader).prepend(\'<span class="ui-icon ui-icon-extlink"></span>\');    
            }
            
            if($($portletHeader).attr("show-maximize") == 1) {
                $($portletHeader).prepend(\'<span class="ui-icon ui-icon-minusthick"></span>\');    
            }
            
            if($($portletHeader).attr("show-close") == 1) {
                $($portletHeader).prepend(\'<span class="ui-icon ui-icon-close"></span>\');    
            }
            
            
        })
        
       

        // add handler to turn action
        $(".portlet-header .ui-icon.ui-icon-minusthick").click(function() {
            
            if($(this).parent().parent().css("position") != "absolute") {
                $(this).toggleClass("ui-icon-minusthick").toggleClass("ui-icon-plusthick");
                
                if($(this).parents(".portlet:first").find(".portlet-content").css("display") == "none") {
                    $(this).parents(".portlet:first").find(".portlet-content").show();    
                } else {
                    
                    if($(this).parent().parent().css("position") != "absolute") {
                        $(this).parents(".portlet:first").find(".portlet-content").hide();
                    }    
                }                                 
                
                updatePanelData();
            } 
        });
        
        // add handler to miximazie action
        $(".portlet-header .ui-icon.ui-icon-extlink").click(function(){
            
            var basePanelContainer          = $(this).parent().parent().parent();
            var basePanelContainerPosition  = $(basePanelContainer).position();       
            
            var currentPanel            = $(this).parent().parent();
            var currentPanelPosition    = $(currentPanel).position();
            var panelId                 = $(this).parent().parent().attr("id");
                
                
            
            if($(this).hasClass("ui-icon-extlink")) {
            
                var panelParams         = {
                    position:   currentPanelPosition,
                    height:     $(currentPanel).height(),
                    width:      $(currentPanel).width(),
                    resized:    true   
                }
                
                // save panel state
                panelsState[panelId]    =   panelParams;
                
                if($(currentPanel).height() < $(document).height() && $(this).parent().find(".ui-icon-plusthick").length == 0){
                    position    =   $(currentPanel).position()
                    height      =   $(document).height() - (position.top + 20);   
                } else if($(this).parent().find(".ui-icon-plusthick").length > 0) {
                    height  = "auto";
                } else {
                    height  =   $(currentPanel).height();
                }
                
                offset  =   currentPanelPosition.top - basePanelContainerPosition.top;      
                
                // set new css parameters for current panel
                $(currentPanel).css({
                    position:           "absolute",
                    left:               0,
                    "margin-top":       "-" + offset + "px",
                    "margin-left":      "20px",
                    width:              "96%",
                    height:             height
                });
                
                // set new css parameters foc parent container
                $(basePanelContainer).css({
                    height: height     
                })
                
                // disable sortable
                $(".column").sortable("disable");
                
            } else {
                
                $(currentPanel).css({
                    position:           "inherit",
                    left:               "inherit",
                    top:                "inherit",
                    "margin-left":      "inherit",
                    "margin-top":       "inherit",
                    width:              "auto",
                    height:             "auto"
                })
                
                $(basePanelContainer).css({
                    height: "inherit"
                })
                
                // enable sortable
                $(".column").sortable("enable");
            } ';
            
            if(isset($this->events['init'])) {
               $injectionCode .= $this->events['init'] . '(this, "resize", options); ';
            }
            
            $injectionCode .= '$(this).toggleClass("ui-icon-extlink").toggleClass("ui-icon-newwin");
            
            updatePanelData();
                        
        })
        
        $(".portlet").each(function(){
            if($(this).find(".portlet-content").css("display") == "none") {
                $(this).find(".portlet-header .ui-icon.ui-icon-minusthick").removeClass("ui-icon-minusthick").addClass("ui-icon-plusthick");
            }
            
            if($(this).css("position") == "absolute") {
                $(this).find(".portlet-header .ui-icon.ui-icon-extlink").removeClass("ui-icon-extlink").addClass("ui-icon-newwin"); 
                
                // disable sortable
                $(".column").sortable("disable");   
            }
        })
        
        // add handler to close action
        $(".portlet-header .ui-icon.ui-icon-close").click(function() {
           
           if(confirm("' . SHIN_Core::$_language->line('lng_label_delete_panel') . '")) {
               $(this).parent().parent().hide();
           
               updatePanelData();  
           } 
           
        });
        
        // add handler to options action
        $(".portlet-header .ui-icon.ui-icon-info").click(function(){
            if($(this).parent().parent().find(".color-list").css("display") == "none") {
                $(this).parent().parent().find(".color-list").show();    
            } else {
                $(this).parent().parent().find(".color-list").hide(); 
            }
        })
        
        // add handler to change color action of the header
        $(".header-colors li").click(function(){
            var $header              = $(this).parent().parent().parent().parent().parent().parent().parent().find(".portlet-header");
            var colorStylePattern    = /\bcolor-[\w]{1,}\b/
            var thisWidgetColorClass = $($header).attr("class").match(colorStylePattern);
                
                                       $($header).removeClass(thisWidgetColorClass[0]).addClass($(this).attr("class")); 
        
            updatePanelData();
        })
        
        // add handler to change color action of the border
        $(".border-colors li").click(function(){
            var $panel               = $(this).parent().parent().parent().parent().parent().parent().parent();
            var className            = $(this).attr("class");
            
            var colorStylePattern    = /\bborder-color-[\w]{1,}\b/
            var thisWidgetColorClass = $($panel).attr("class").match(colorStylePattern);
                                       
                                       $($panel).removeClass(thisWidgetColorClass[0]).addClass("border-" + className); 
        
            updatePanelData();
        })
        
        // add handler to change color action of the bg
        $(".bg-colors li").click(function(){
            var $panel               = $(this).parent().parent().parent().parent().parent().parent().parent();
            var className            = $(this).attr("class");
            
            var colorStylePattern    = /\bbg-color-[\w]{1,}\b/
            var thisWidgetColorClass = $($panel).attr("class").match(colorStylePattern);
                                       
                                       $($panel).removeClass(thisWidgetColorClass[0]).addClass("bg-" + className); 
        
            updatePanelData();
        })
        ';
        
        
        return $injectionCode;    
    }
    
    /**
    * method generate code, that send requests to the server
    * 
    * @access private
    * @params NULL
    * @return string 
    */
    private function _initEventFunctions(){
        
        $injectionCode = 'function updatePanelData() {
            var items = [];
            
            $(".column").each(function(){
                var columnId = $(this).attr("id");
                
                $(".portlet", this).each(function(index){
                        var collapsed = 0; 
                        
                        if($(this).find(".portlet-content").css("display") == "none") {
                            var collapsed = 1;    
                        } else {
                            var collapsed = 0;
                        }
                        
                        if($(this).css("display") == "none") {
                            var closed = 1;
                        } else {
                            var closed = 0;
                        }
                        
                        // header color
                        var colorStylePattern      = /\bcolor-[\w]{1,}\b/
                        var color                  = $(this).find(".portlet-header").attr("class").match(colorStylePattern);
                        
                        // border color
                        var colorStylePattern           = /\bborder-color-[\w]{1,}\b/
                        var thisWidgetBoderColorClass   = $(this).attr("class").match(colorStylePattern);
                        
                        // bg color
                        var colorStylePattern           = /\bbg-color-[\w]{1,}\b/
                        var thisWidgetBgColorClass      = $(this).attr("class").match(colorStylePattern);
                        
                        
                        // if panel mximized or not
                        if($(this).find(".ui-icon-newwin").length > 0) {
                            maximized = 1;
                            style     = "height: " + $(this).css("height") + "; left: " + $(this).css("left") + "; margin-left: " + $(this).css("margin-left") + 
                                        "; margin-top: " + $(this).css("margin-top") + "; position: absolute; width: 96%; ";
                                          
                        } else {
                            maximized = 0;
                            style     = "";
                        }
                        
                        var item = {
                            id:         $(this).attr("id"),
                            collapsed:  collapsed,
                            order:      index,
                            column:     columnId,
                            closed:     closed,
                            color:      color[0],
                            border:     thisWidgetBoderColorClass[0],
                            bg:         thisWidgetBgColorClass[0],
                            maximized:  maximized,
                            style:      style,
                            menu:       $(this).find(".portlet-header").attr("menu-id")  
                            
                        }
                        
                        items.push(item);
                })    
            })
            
            //Assign items array to sortorder JSON variable  
            var sortorder={ items: items };
            
            //Pass items variable to server using ajax to save state  
            $.post("' . $this->sh_Options['ajax_url'] . '", "data=" + $.toJSON(sortorder) + "&action=change&model_name=' . $this->sh_Options['model_name'] . '", function(response){  
                   
            });
            
        }';
        
        return $injectionCode;    
    } 


    /**
     * Fill internal array with needed values.
     *
     * @access protected
     * @params param:array
     * @return NULL.
     */
    protected function _config_mapper($param)
    {
        if($this->sh_Options){
            // post init customization variables.
            $this->sh_Options               = array_merge_recursive_distinct((array)$this->sh_Options, (array)$param);
        } else {
            // constructor initialization with default values from config file.
            $this->sh_Options = $param;
        }
    }

    /**
    * method set base panel parameters
    * 
    * @access public
    * @param string $container - DOM container id
    * @param array $panelParam - array of config parameters from db
    * @param array $panelData  - array of panel data
    * @return NULL.
    */
    public function setPanelData($container, $panelParam, $panelData = array())
	{
        $range          =   range(1, $panelParam['total']);
        $injectedCode   =   '';
        $this->events   =   isset($panelData['events']) ? $panelData['events'] : array(); 
        $this->params   =   $panelParam;
        
        foreach($range as $columnIndex){
		
            $injectedCode .= '<div class="column" id="' . $columnIndex . '" style="width: ' . $this->sh_Options['width'] . '">';
			
            foreach($panelParam['data'] as $value) {
			
                if($value['column_menu'] == $columnIndex) {
                    
                    if($value['maximized']) {
                        $injectedCode .= '<div class="portlet ' . $value['color_border_class'] . " " . $value['color_bg_class'] . '"  id="' . $value['idPanel']  . '" style="' . $value['style'] . '">';
                    } else {
                        $injectedCode .= '<div class="portlet ' . $value['color_border_class'] . " " . $value['color_bg_class'] . '"  id="' . $value['idPanel']  . '">';
                    }

					// ico information :)
					$ico_html = '';
					if(isset($value['ico'])){
						$ico_html = '<img src="'.SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/'.'images'.'/'.$value['ico'].'" border="0" />&nbsp;';
					}
					
                    $injectedCode .= '<div class="portlet-header ' . $value['color_class'] . '" show-close="' .  $value['show_close'] . '" show-maximize="' . $value['show_maximize'] . '" show-turn="' . $value['show_turn'] . '" show-info="' . $value['show_info'] . '" ' . (isset($value['idMenu']) ? 'menu-id=' . $value['idMenu'] : '') . '>' .$ico_html. $value['panel_header'] . '</div>';
                    
                    $injectedCode .= '<div class="color-list"">
                                        <table>
                                            <tr>
                                                <td>
                                                    <span>Available header colors:&nbsp;</span>
                                                </td>
                                                <td>
                                                    <ul class="header-colors">
                                                        <li class="color-yellow"></li>
                                                        <li class="color-red"></li>
                                                        <li class="color-blue"></li>
                                                        <li class="color-white"></li>
                                                        <li class="color-orange"></li>
                                                        <li class="color-green"></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span>Available border colors:&nbsp;</span>
                                                </td>
                                                <td>
                                                    <ul class="border-colors">
                                                        <li class="color-yellow"></li>
                                                        <li class="color-red"></li>
                                                        <li class="color-blue"></li>
                                                        <li class="color-white"></li>
                                                        <li class="color-orange"></li>
                                                        <li class="color-green"></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span>Available background colors:&nbsp;</span>
                                                </td>
                                                <td>
                                                    <ul class="bg-colors">
                                                        <li class="color-yellow"></li>
                                                        <li class="color-red"></li>
                                                        <li class="color-blue"></li>
                                                        <li class="color-white"></li>
                                                        <li class="color-orange"></li>
                                                        <li class="color-green"></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
                                        <div style="clear: both;"></div>
                                      </div>';
                    
                    
                    if(isset($this->sh_Options['bg_images'][$value['idPanel']]) && !empty($this->sh_Options['bg_images'][$value['idPanel']])) {
                        $bgImage    =   'background: url(' . $this->sh_Options['bg_images'][$value['idPanel']]['img'] . ') ' . $this->sh_Options['bg_images'][$value['idPanel']]['pos'] . ' no-repeat';  
                    } else {
                        $bgImage    =   '';    
                    }
                    
                    if($value['collapsed']) {
                        $injectedCode .= '<div class="portlet-content" style="display: none; ' . $bgImage . '">' . (isset($panelData[$value['idPanel']]) ? $panelData[$value['idPanel']] : '') . '</div>';
                    } else {
                        $injectedCode .= '<div class="portlet-content" style="' . $bgImage . '">' . (isset($panelData[$value['idPanel']]) ? $panelData[$value['idPanel']] : '') . '</div>';
                    }
                    
                    $injectedCode .= '</div>';
                }    
            }
            $injectedCode .= '</div>';    
        }
        
        SHIN_Core::$_libs['templater']->assignByRef($container, $injectedCode);
    }

}// End of class 


/* End of file SHIN_Panels.php */
/* Location: shifw/library/SHIN_Panels.php */
