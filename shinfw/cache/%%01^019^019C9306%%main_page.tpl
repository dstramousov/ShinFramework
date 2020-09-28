207
a:4:{s:8:"template";a:4:{s:13:"main_page.tpl";b:1;s:10:"header.tpl";b:1;s:13:"main_menu.tpl";b:1;s:13:"tech_info.tpl";b:1;}s:9:"timestamp";i:1286964730;s:7:"expires";i:1286968330;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="content-type" content="text/html; charset=Array" />
<meta name="description" content="Array" />
<meta http-equiv="Expires" content="Array" />
<meta http-equiv="Pragma" content="Array" />
<meta http-equiv="Cache-Control" content="0" />
<meta name="keywords" content="Array" />
<meta name="robots" content="Array" />
<meta name="revisit-after" content="0" />
<meta name="distribution" content="Array" /> 
<meta name="rating" content="Array" />
<meta name="content-language" content="0" />
<meta name="author" content="Array" />
<meta name="copyright" content="Array" />

    <title>This is a main page :: Another part of title :: and some a little :)</title>

    
<link rel="stylesheet" type="text/css" media="all" href="http://mywork/shinframework/shinfw/themes/redmond/css/jqueryUI/jquery.ui.all.css" />
<link rel="stylesheet" type="text/css" media="all" href="http://mywork/shinframework/shinfw/themes/redmond/css/ddmenu/superfish.css" />
<link rel="stylesheet" type="text/css" media="all" href="http://mywork/shinframework/shinfw/themes/lightness/css/jqueryUI/jquery.ui.all.css" />
<link rel="stylesheet" type="text/css" media="all" href="http://mywork/shinframework/shinfw/themes/lightness/css/panel/panel.css" />
<link rel="stylesheet" type="text/css" media="all" href="http://mywork/shinframework/shinfw/themes/lightness/css/general.css" />


    
	<script src="http://mywork/shinframework/shinfw/js/jquery/jquery-1.4.2.js" type="text/javascript"></script>
	<script src="http://mywork/shinframework/shinfw/js/ddmenu/hoverIntent.js" type="text/javascript"></script>
	<script src="http://mywork/shinframework/shinfw/js/ddmenu/superfish.js" type="text/javascript"></script>
	<script src="http://mywork/shinframework/shinfw/js/jquery/jquery.json-2.2.js" type="text/javascript"></script>
	<script src="http://mywork/shinframework/shinfw/js/jqueryUI/jquery-ui-1.8.4.custom.min.js" type="text/javascript"></script>


    <script type="text/javascript" language="javascript">
		var panelsState = new Array();


	</script>

    

<script type="text/javascript" language="javascript">

	$(document).ready(function(){


		$(".column").sortable({
            connectWith: ".column",
            cursor:      "move",
            stop:        function(event, ui) {
                updatePanelData();        
            },
            handle:      ".portlet-header"      
        });

        
        $(".portlet").each(function(){
            $(this).addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all");
            
            $portletHeader = $(this).find(".portlet-header").addClass("ui-widget-header ui-corner-all");
            
            
            if($($portletHeader).attr("show-info") == 1) {
                $($portletHeader).prepend('<span class="ui-icon ui-icon-info"></span>');
            }
            
            if($($portletHeader).attr("show-turn") == 1) {
                $($portletHeader).prepend('<span class="ui-icon ui-icon-extlink"></span>');    
            }
            
            if($($portletHeader).attr("show-maximize") == 1) {
                $($portletHeader).prepend('<span class="ui-icon ui-icon-minusthick"></span>');    
            }
            
            if($($portletHeader).attr("show-close") == 1) {
                $($portletHeader).prepend('<span class="ui-icon ui-icon-close"></span>');    
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
            } $(this).toggleClass("ui-icon-extlink").toggleClass("ui-icon-newwin");
            
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
           
           if(confirm("Are you really want to close panel?")) {
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
        
function updatePanelData() {
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
                            maximized = true;
                            style     = "height: " + $(this).css("height") + "; left: " + $(this).css("left") + "; margin-left: " + $(this).css("margin-left") + 
                                        "; margin-top: " + $(this).css("margin-top") + "; position: absolute; width: 96%; ";
                                          
                        } else {
                            maximized = false;
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
                            style:      style 
                            
                        }
                        
                        items.push(item);
                })    
            })
            
            //Assign items array to sortorder JSON variable  
            var sortorder={ items: items };
            
            //Pass items variable to server using ajax to save state  
            $.post("http://mywork/shinframework/shinfw/connectors/savestate.php", "data=" + $.toJSON(sortorder) + "&action=change&model_name=sys_menu", function(response){  
                   
            });
            
        }

});

	</script>

</head>
<body>


	<fieldset>
		<legend>&nbsp;&nbsp;<b>New ticket</b>&nbsp;&nbsp;</legend>
		<div class="shin-general-menu">
            <ul class="sf-menu"><li><a>Choice language</a><ul><li><a href="http://mywork/shinframework/index.php/change_language/it">Italian</a></li><li><a href="http://mywork/shinframework/index.php/change_language/en">English</a></li><li><a href="http://mywork/shinframework/index.php/change_language/ru">Russian</a></li></ul></li><li><a>Choice theme</a><ul><li><a href="http://mywork/shinframework/index.php/change_theme/lightness">Lightness</a></li><li><a href="http://mywork/shinframework/index.php/change_theme/darkness">Darkness</a></li><li><a href="http://mywork/shinframework/index.php/change_theme/redmond">Redmond</a></li><li><a href="http://mywork/shinframework/index.php/change_theme/smoothness">Smoothness</a></li></ul></li><li><a href="http://mywork/shinframework/index.php/logout">Logout</a></li></ul>
                         <div class="clear"></div>            <div class="shin-clear"></div>
        </div>
	</fieldset>

	<br/>

	<fieldset>
		<legend style="font-size: 20px; font-weight: bold;">New ticket</legend>
							
		<!-- main menu visualization -->
		<div class="column" id="1" style="width: 33%"><div class="portlet border-color-green bg-color-green"  id="10"><div class="portlet-header color-blue" show-close="1" show-maximize="1" show-turn="1" show-info="1"><img src="http://mywork/shinframework/shinfw/images/award_star_gold_1.png" border="0" />&nbsp;Intranet</div><div class="color-list"">
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
                                      </div><div class="portlet-content" style=""><img src=http://mywork/shinframework/shinfw/images/star.png border="0" />&nbsp;<b>Main intranet group</b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/index.php/main">Intranet Example Link</a><br/></div></div><div class="portlet border-color-green bg-color-white"  id="50"><div class="portlet-header color-red" show-close="1" show-maximize="1" show-turn="1" show-info="1"><img src="http://mywork/shinframework/shinfw/images/award_star_silver_2.png" border="0" />&nbsp;System component.  ! CAREFULLY !</div><div class="color-list"">
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
                                      </div><div class="portlet-content" style=""><img src=http://mywork/shinframework/shinfw/images/exclamation.png border="0" />&nbsp;<b>Database administrator group</b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/index.php/sysmanage">System Management</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/index.php/setup">Database shema manage</a><br/></div></div><div class="portlet border-color-green bg-color-yellow"  id="60"><div class="portlet-header color-green" show-close="1" show-maximize="1" show-turn="1" show-info="1"><img src="http://mywork/shinframework/shinfw/images/award_star_silver_3.png" border="0" />&nbsp;Tickets exchange</div><div class="color-list"">
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
                                      </div><div class="portlet-content" style=""><img src=http://mywork/shinframework/shinfw/images/email.png border="0" />&nbsp;<b>Ticket exchange system</b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/shinticket/index.php/ticket/new">New ticket</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/shinticket/index.php/ticket/list">View all tickets</a><br/><img src=http://mywork/shinframework/shinfw/images/tux.png border="0" />&nbsp;<b>Administrator part for tickets</b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/shinticket/index.php/lists?tab=tabs-1">Manage customer</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/shinticket/index.php/lists?tab=tabs-2">Manage application</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/shinticket/index.php/lists?tab=tabs-3">Manage relation between application and customer</a><br/></div></div></div><div class="column" id="2" style="width: 33%"><div class="portlet border-color-green bg-color-orange"  id="30"><div class="portlet-header color-blue" show-close="1" show-maximize="1" show-turn="1" show-info="1"><img src="http://mywork/shinframework/shinfw/images/award_star_gold_3.png" border="0" />&nbsp;Project personal finance manager</div><div class="color-list"">
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
                                      </div><div class="portlet-content" style=""><img src=http://mywork/shinframework/shinfw/images/calendar.png border="0" />&nbsp;<b>Project personal finance manager group</b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/ppfm/index.php">Main page</a><br/></div></div><div class="portlet border-color-green bg-color-blue"  id="20"><div class="portlet-header color-red" show-close="1" show-maximize="1" show-turn="1" show-info="1"><img src="http://mywork/shinframework/shinfw/images/award_star_gold_2.png" border="0" />&nbsp;CRM</div><div class="color-list"">
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
                                      </div><div class="portlet-content" style=""><img src=http://mywork/shinframework/shinfw/images/edit.png border="0" />&nbsp;<b>CRM main group</b><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/crm/index.php/test1">CRM main page</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/crm/index.php/test2">CRM secure page</a><br/><div id="wdg_" name="wdg_" class="wdg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wednesday 13th of October 2010 01:12:10 PM<br/></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/crm/index.php/test3">CRM another link #1 </a><br/><img src=http://mywork/shinframework/shinfw/images/comment.png border="0" />&nbsp;<b>Second group</b><br/><div id="wdg_CRM mail link" name="wdg_CRM mail link" class="wdg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is mail notification<br/></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="http://mywork/shinframework/crm/index.php/test4">CRM another link #2</a><br/></div></div></div><div class="column" id="3" style="width: 33%"><div class="portlet border-color-green bg-color-yellow"  id="40"><div class="portlet-header color-blue" show-close="1" show-maximize="1" show-turn="1" show-info="1"><img src="http://mywork/shinframework/shinfw/images/award_star_silver_1.png" border="0" />&nbsp;SHIN avialable component samples</div><div class="color-list"">
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
                                      </div><div class="portlet-content" style=""><img src=http://mywork/shinframework/shinfw/images/help.png border="0" />&nbsp;<b>SHIN framework examples group</b><br/><div id="wdg_Our examples" name="wdg_Our examples" class="wdg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/accordion.php">Accordion</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/autocomplete.php">Autocomplete</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/blockui.php">Blockui</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/button.php">Button</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/calculator.php">Calculator</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/carousel.php">Carousel</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/charts.php">Charts</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/context_menu.php">Context_menu</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/crm_customer_master_data.php">Crm_customer_master_data</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/crm_customer_master_data_geo.php">Crm_customer_master_data_geo</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/crud.php">Crud</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/crud_ajax.php">Crud_ajax</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/datatables.php">Datatables</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/datepicker.php">Datepicker</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/datetime.php">Datetime</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/dbusage.php">Dbusage</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/ddmenu.php">Ddmenu</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/dialog.php">Dialog</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/encode_decode.php">Encode_decode</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/form.php">Form</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/image.php">Image</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/image_gallery.php">Image_gallery</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/image_uploader.php">Image_uploader</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/input.php">Input</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/jstree.php">Jstree</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/lightbox.php">Lightbox</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/mailer.php">Mailer</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/map_ajax_markers.php">Map_ajax_markers</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/map_basic.php">Map_basic</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/map_direction.php">Map_direction</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/map_geolocalization.php">Map_geolocalization</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/map_overlay_polygon.php">Map_overlay_polygon</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/map_overlay_polyline.php">Map_overlay_polyline</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/map_with_markers.php">Map_with_markers</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/map_with_street_view.php">Map_with_street_view</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/map_with_street_view_events.php">Map_with_street_view_events</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/map_with_street_view_service.php">Map_with_street_view_service</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/map_with_user_icon.php">Map_with_user_icon</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/masked_input.php">Masked_input</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/message.php">Message</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/model_test.php">Model_test</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/model_test_multiple_primary_key.php">Model_test_multiple_primary_key</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/panels_basic.php">Panels_basic</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/panels_with_ajax_data.php">Panels_with_ajax_data</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/panels_with_bg.php">Panels_with_bg</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/panels_with_charts.php">Panels_with_charts</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/panels_with_tabs.php">Panels_with_tabs</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/pdf.php">Pdf</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/progressbar.php">Progressbar</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/scrollto.php">Scrollto</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/tabs.php">Tabs</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/text_editor.php">Text_editor</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/timepicker.php">Timepicker</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/tooltip.php">Tooltip</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/upload.php">Upload</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/utf8.php">Utf8</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/word.php">Word</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/xls.php">Xls</a><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://mywork/shinframework/examples/zoom.php">Zoom</a><br/></div></div></div></div>
		<!-- end of main menu visualization -->

				        
	</fieldset>

	<br/><br/><br/>
<table cellspacing="20" width="100%" border="0">
<tr>
<td align="center">
<a href="http://www.shinsoftware.it" target="_blank">www.shinsoftware.it</a><br/>
SHINframework&nbsp;ver. 0.2</td>
</tr>
</table>    
</body>
</html>