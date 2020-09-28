<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| FCharts config file with default values
| -------------------------------------------------------------------
| All documentation you can find there http://jqueryui.com/demos/datepicker/
*/

/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$charts_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/fusioncharts/jquery.fusioncharts.js');

$charts_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/fusioncharts/jquery.fusioncharts.js');


/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/ 
$charts_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css');

/*
| -------------------------------------------------------------------
|  Charts`s width on the page
| -------------------------------------------------------------------
*/
$charts['width'] = 900;

/*
| -------------------------------------------------------------------
|  Charts`s height on the page
| -------------------------------------------------------------------
*/
$charts['height'] = 500;

/*
| -------------------------------------------------------------------
|  Defines the URL of the SWF file (excluding the file name.)
| -------------------------------------------------------------------
*/
$charts['swfPath'] = '"'.SHIN_Core::$_config['core']['shinfw_base_url'].'/shinfw/js/fusioncharts/"';

/*
| -------------------------------------------------------------------
|  Here you provide the string XML or URL of an XML document or any of the other data-sources supported by the plugin.
|  Note: This parameter is not applicable to convertToFusionCharts.
| -------------------------------------------------------------------
*/
$charts['data'] = '""';

/*
| -------------------------------------------------------------------
| Defines if the type of data passed in the 'data' option is a string XML (XMLData),
| -------------------------------------------------------------------
*/
$charts['dataFormat'] = '"XMLData"';

/*
| -------------------------------------------------------------------
| URL of the XML (URIData) or is an HTML table (HTMLTable).
| -------------------------------------------------------------------
*/
//$charts['URL'] = '""';

/*
| -------------------------------------------------------------------
| dataOptions provide data-format specific options. It is applicable when using
| HTMLTable format. This has been discussed later in this section.
| -------------------------------------------------------------------
*/
//$charts['dataOptions'] = '""';

/*
| -------------------------------------------------------------------
| Defines the Window Mode for the chart.
| -------------------------------------------------------------------
*/
$charts['wMode'] = '"transparent"';

/*
| -------------------------------------------------------------------
| Sets the CSS "class" of the object/embed tag.
| -------------------------------------------------------------------
*/
//$charts['className'] = '""';

/*
| -------------------------------------------------------------------
| Allows you to specify whether to append, prepend FusionCharts to an HTML
| element or whether to clear contents of the HTML element and then insert
| FusionCharts.
| -------------------------------------------------------------------
*/
//$charts['insertMode'] = '""';

/*
|-------------------------------------------------------------------
|bgColor="HexColorCode" : This attribute sets the background color for the chart. 
|You can set any hex color code as the value of this attribute. Remember that you 
|DO NOT need to assign a "#" at the beginning of the hex color code. In fact, whenever 
|you need to provide any hex color code in FusionCharts XML data document, you do not 
|have to assign the # at the beginning. 
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['bgColor']  =   '"000000"';

/*
|-------------------------------------------------------------------
|bgAlpha="NumericalValue(0-100)" : This attribute helps you set the alpha 
|(transparency) of the graph. This is particularly useful when you need to 
|load the chart in one of your Flash movies or when you want to set a background 
|image (.swf) for the chart.
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['bgAlpha']  =   '"0"';


/*
|-------------------------------------------------------------------
|bgSWF="Path of SWF File" : This attribute helps you load an external .swf file as a background for the chart.
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['bgSWF']    =   '""';

/*
|-------------------------------------------------------------------
|canvasBgColor="HexColorCode" : This attribute helps you set the background color of the canvas.
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['canvasBgColor']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
|canvasBgAlpha="NumericalValue(0-100)" : This attribute helps you set the alpha (transparency) of the canvas.
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['canvasBgAlpha']    =   '"0"';

/*
|-------------------------------------------------------------------
|canvasBorderColor="HexColorCode" : This attribute helps you set the border color of the canvas.
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['canvasBorderColor']    =   '"000000"';

/*
|-------------------------------------------------------------------
|canvasBorderThickness="NumericalValue(0-100)" : This attribute helps you set the border thickness (in pixels) of the canvas.
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['canvasBorderThickness']    =   '"0"';

/*
|-------------------------------------------------------------------
|caption="String" : This attribute determines the caption of the chart that would appear at the top of the chart. 
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['caption']    =   '"String"';

/*
|-------------------------------------------------------------------
|subCaption="String" : Sub-caption of the chart   
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['subCaption']    =   '"String"';

/*
|-------------------------------------------------------------------
|xAxisName= "String" : x-Axis text title (if the chart supports axis)    
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['xAxisName']    =   '"String"';

/*
|-------------------------------------------------------------------
|yAxisName= "String" : y-Axis text title (if the chart supports axis)     
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['yAxisName']    =   '"String"';

/*
|-------------------------------------------------------------------
|yAxisMinValue="value": This attribute determines the lower limit of y-axis.      
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['yAxisMinValue']    =   '""';

/*
|-------------------------------------------------------------------
|yAxisMaxValue="value" : This attribute determines the upper limit of y-axis.        
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['yAxisMaxValue']    =   '""';

/*
|-------------------------------------------------------------------
|shownames="1/0" : This attribute can have either of the two possible values: 1,0. 
|It sets the configuration whether the x-axis values (for the data sets) will be 
|displayed or not. By default, this attribute assumes the value 1, which means that 
|the x-axis names will be displayed.        
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['shownames']    =   '"1"';

/*
|-------------------------------------------------------------------
|showValues="1/0" : This attribute can have either of the two possible values: 1,0. 
|It sets the configuration whether the data numerical values will be displayed along 
|with the columns, bars, lines and the pies. By default, this attribute assumes the 
|value 1, which means that the values will be displayed.       
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['showValues']    =   '"1"';

/*
|-------------------------------------------------------------------
|showLimits="1/0" : Option whether to show/hide the chart limit textboxes.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['showLimits']    =   '"1"';

/*
|-------------------------------------------------------------------
|rotateNames="1/0" : Configuration that sets whether the category name text 
|boxes would be rotated or not.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['rotateNames']    =   '"1"';

/*
|-------------------------------------------------------------------
|rotateNames="1/0" : Configuration that sets whether the category name text 
|boxes would be rotated or not.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['rotateNames']    =   '"1"';

/*
|-------------------------------------------------------------------
|animation="1/0" : This attribute sets whether the animation is to be played 
|or whether the entire chart would be rendered at one go.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['animation']    =   '"1"';

/*
|-------------------------------------------------------------------
|showColumnShadow="1/0": Whether the 2D shadow for the columns would be shown or not.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['showColumnShadow']    =   '"1"';

/*
|-------------------------------------------------------------------
|baseFont="FontName" : This attribute sets the base font family of the chart font which 
|lies on the canvas i.e., all the values and the names in the chart which lie on the canvas 
|will be displayed using the font name provided here.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['baseFont']    =   '""';

/*
|-------------------------------------------------------------------
| baseFontSize="FontSize" : This attribute sets the base font size of the chart i.e., all 
|the values and the names in the chart which lie on the canvas will be displayed using the 
|font size provided here.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['baseFontSize']    =   '""';

/*
|-------------------------------------------------------------------
|baseFontColor="HexColorCode" : This attribute sets the base font color of the chart i.e., 
|all the values and the names in the chart which lie on the canvas will be displayed using 
|the font color provided here.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['baseFontColor']    =   '"000000"';

/*
|-------------------------------------------------------------------
|outCnvBaseFont = "FontName" : This attribute sets the base font family of the chart font 
|which lies outside the canvas i.e., all the values and the names in the chart which lie 
|outside the canvas will be displayed using the font name provided here.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['outCnvBaseFont']    =   '""';

/*
|-------------------------------------------------------------------
|outCnvBaseFontSze="FontSize" : This attribute sets the base font size of the chart i.e., all 
|the values and the names in the chart which lie outside the canvas will be displayed using 
|the font size provided here.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['outCnvBaseFontSze']    =   '""';

/*
|-------------------------------------------------------------------
|outCnvBaseFontColor="HexColorCode": This attribute sets the base font color of the chart i.e., 
|all the values and the names in the chart which lie outside the canvas will be displayed using 
|the font color provided here.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['outCnvBaseFontColor']    =   '""';

/*
|-------------------------------------------------------------------
|numberPrefix="$" : Using this attribute, you could add prefix to all the numbers visible on the 
|graph. For example, to represent all dollars figure on the chart, you could specify this attribute 
|to ' $' to show like $40000, $50000.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['numberPrefix']    =   '"$"';

/*
|-------------------------------------------------------------------
|numberSuffix="p.a" : Using this attribute, you could add prefix to all the numbers visible on the graph. 
|For example, to represent all figure quantified as per annum on the chart, you could specify this attribute 
|to ' /a' to show like 40000/a, 50000/a.                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['numberSuffix']    =   '""';

/*
|-------------------------------------------------------------------
|formatNumber="1/0" : This configuration determines whether the numbers displayed on the chart will be formatted 
|using commas, e.g., 40,000 if formatNumber='1' and 40000 if formatNumber='0 '                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['formatNumber']    =   '"1"';

/*
|-------------------------------------------------------------------
|formatNumberScale="1/0" : Configuration whether to add K (thousands) and M (millions) to a number after truncating 
|and rounding it - e.g., if formatNumberScale is set to 1, 10434 would become 1.04K (with decimalPrecision set to 
|2 places). Same with numbers in millions - a M will added at the end.                                                                                                                                                                   
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['formatNumberScale']    =   '"1"';

/*
|-------------------------------------------------------------------
|decimalSeparator="." : This option helps you specify the character to be used as the decimal separator in a number.                                                                                                                                                                   
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['decimalSeparator']    =   '"."';

/*
|-------------------------------------------------------------------
|thousandSeparator="," : This option helps you specify the character to be used as the thousands separator in a number.                                                                                                                                                                   
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['thousandSeparator']    =   '","';

/*
|-------------------------------------------------------------------
|decimalPrecision="2" : Number of decimal places to which all numbers on the chart would be rounded to.                                                                                                                                                                   
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['decimalPrecision']    =   '"2"';

/*
|-------------------------------------------------------------------
|divLineDecimalPrecision="2": Number of decimal places to which all divisional line (horizontal) values on the chart 
|would be rounded to.                                                                                                                                                                    
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['divLineDecimalPrecision']    =   '"2"';

/*
|-------------------------------------------------------------------
|limitsDecimalPrecision="2" : Number of decimal places to which upper and lower limit values on the chart would be rounded to.                                                                                                                                                                     
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['limitsDecimalPrecision']    =   '"2"';

/*
|-------------------------------------------------------------------
|zeroPlaneThickness="Numeric Value" : Thickness (in pixels) of the line indicating the zero plane.                                                                                                                                                                       
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['zeroPlaneThickness']    =   '"2"';

/*
|-------------------------------------------------------------------
| zeroPlaneColor="Hex Code" : The intended color for the zero plane.                                                                                                                                                                       
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['zeroPlaneColor']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
| zeroPlaneAlpha="Numerical Value 0-100" : The intended transparency for the zero plane.                                                                                                                                                                        
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['zeroPlaneAlpha']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
| numdivlines="NumericalValue" : This attribute sets the number of divisional lines to be drawn.                                                                                                                                                                         
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['numdivlines']    =   '""';

/*
|-------------------------------------------------------------------
| divlinecolor="HexColorCode" : The color of grid divisional line.                                                                                                                                                                         
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['divlinecolor']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
| divLineThickness="NumericalValue" : Thickness (in pixels) of the grid divisional line.                                                                                                                                                                         
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['divLineThickness']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
| divLineAlpha="NumericalValue0-100" : Alpha (transparency) of the grid divisional line.                                                                                                                                                                         
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['divLineAlpha']    =   '"0"';

/*
|-------------------------------------------------------------------
| showDivLineValue="1/0" : Option to show/hide the textual value of the divisional line.                                                                                                                                                                        
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['showDivLineValue']    =   '"0"';

/*
|-------------------------------------------------------------------
| showAlternateHGridColor="1/0" : Option on whether to show alternate colored horizontal grid bands.                                                                                                                                                                        
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['showAlternateHGridColor']    =   '"0"';

/*
|-------------------------------------------------------------------
| alternateHGridColor="HexColorCode" : Color of the alternate horizontal grid bands.                                                                                                                                                                          
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['alternateHGridColor']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
| alternateHGridAlpha="NumericalValue0-100" : Alpha (transparency) of the alternate horizontal grid bands.                                                                                                                                                                           
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['alternateHGridAlpha']    =   '"0"';

/*
|-------------------------------------------------------------------
| numVDivLines="NumericalValue" : Sets the number of vertical divisional lines to be drawn.                                                                                                                                                                           
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['numVDivLines']    =   '"0"';

/*
|-------------------------------------------------------------------
| VDivlinecolor="HexColorCode" : Color of vertical grid divisional line.                                                                                                                                                                                
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['VDivlinecolor']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
| VDivLineThickness="NumericalValue" : Thickness (in pixels) of the line                                                                                                                                                                               
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['VDivLineThickness']    =   '"0"';

/*
|-------------------------------------------------------------------
| VDivLineAlpha="NumericalValue0-100" : Alpha (transparency) of the line.                                                                                                                                                                               
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['VDivLineAlpha']    =   '"0"';

/*
|-------------------------------------------------------------------
| showAlternateVGridColor="1/0" : Option on whether to show alternate colored vertical grid bands.                                                                                                                                                                                 
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['showAlternateVGridColor']    =   '"1"';

/*
|-------------------------------------------------------------------
| alternateVGridColor="HexColorCode" : Color of the alternate vertical grid bands.                                                                                                                                                                                   
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['alternateVGridColor']    =   '"1"';

/*
|-------------------------------------------------------------------
| alternateVGridAlpha="NumericalValue0-100" : Alpha (transparency) of the alternate vertical grid bands.                                                                                                                                                                                       
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['alternateVGridAlpha']    =   '"0"';

/*
|-------------------------------------------------------------------
| showhovercap="1/0" : Option whether to show/hide hover caption box.                                                                                                                                                                                      
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['showhovercap']    =   '"1"';

/*
|-------------------------------------------------------------------
| hoverCapBgColor="HexColorCode" : Background color of the hover caption box.                                                                                                                                                                                      
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['hoverCapBgColor']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
| hoverCapBorderColor="HexColorCode" : Border color of the hover caption box.                                                                                                                                                                                     
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['hoverCapBorderColor']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
| chartLeftMargin="Numerical Value (in pixels)" : Space to be left unplotted on the left side of the chart.                                                                                                                                                                                    
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['chartLeftMargin']    =   '""';

/*
|-------------------------------------------------------------------
| chartRightMargin="Numerical Value (in pixels)" : Empty space to be left on the right side of the chart                                                                                                                                                                                     
|------------------------------------------------------------------- 
*/
$charts['tag']['data']['chartRightMargin']    =   '""';

/*
|-------------------------------------------------------------------
| chartTopMargin="Numerical Value (in pixels)" : Empty space to be left on the top of the chart.                                                                                                                                                                                     
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['chartTopMargin']    =   '""';

/*
|-------------------------------------------------------------------
| chartBottomMargin="Numerical Value (in pixels)" : Empty space to be left at the bottom of the chart.                                                                                                                                                                                      
|------------------------------------------------------------------- 
*/
$charts['tag']['graph']['chartBottomMargin']    =   '""';


/*
|-------------------------------------------------------------------
| hoverText="String value" "String value" Example: <set name='Jan' value='12345' color='636363' hoverText='January'...> Sometimes, 
| you might just want to show the abbreviated names on the x-axis (to avoid cluttering or to make the 
| chart look more legible). However, you still have the option of showing the full name as tool tip using 
| this attribute. Like, in our example, we're showing the abbreviated form "Jan" on our x-axis, but the 
| full word "January" is shown as the tool tip.                                                                                                                                                                                       
|------------------------------------------------------------------- 
*/
$charts['tag']['set']['hoverText']    =   '""';

/*
|-------------------------------------------------------------------
| link="URL" Example: <set … link='ShowDetails.asp%3FMonth=Jan' ...>This attribute defines the hotspots in your 
| graph. The hotspots are links over the data sets. Please note that you'll need to URL Encode all the 
| special characters (like ? and &) present in the link.All the server side scripting languages provide 
| a generic function to URL Encode any string - like in ASP and ASP.NET, we've Server.URLEncode(strURL) and so on.                                                                                                                                                                                        
|------------------------------------------------------------------- 
*/
$charts['tag']['set']['hoverText']    =   '""';

/*
|-------------------------------------------------------------------
| alpha="Numerical Value 0-100" Example: <set ... alpha='100' ...> This attribute determines the transparency of 
| a data set. The range for this attribute is 0 to 100. 0 means complete transparency (the data set won’t be shown 
| on the graph) and 100 means opaque. This option is useful when you want to highlight a particular set of data.                                                                                                                                                                                         
|------------------------------------------------------------------- 
*/
$charts['tag']['set']['alpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| showName="1" Example : <set ... showName="1" ...>This attribute can either the value of 0 or 1. A value of 1 
| indicates that the name of this data set will be displayed in the graph whereas 0 indicates it won't be displayed. 
| This attribute is particular useful when you want to show/hide names of alternate data items or say every x (th) data item.                                                                                                                                                                                         
|------------------------------------------------------------------- 
*/
$charts['tag']['set']['showName']    =   '"1"';

/*
|-------------------------------------------------------------------
| displayValue='StringValue' : If you want to display a string caption for the trend line by its side, you can use this 
| attribute. Example: displayValue='Last Month High'. When you don't supply this attribute, it automatically takes the value 
| of startValue.                                                                                                                                                                                         
|------------------------------------------------------------------- 
*/
$charts['tag']['line']['displayValue']    =   '""';

/*
|-------------------------------------------------------------------
| thickness='NumericalValue' : Thickness of the trend line                                                                                                                                                                                         
|------------------------------------------------------------------- 
*/
$charts['tag']['line']['thickness']    =   '"0"';

/*
|-------------------------------------------------------------------
| isTrendZone='1/0': Whether the trend would display a line, or a zone (filled colored rectangle).                                                                                                                                                                                      
|------------------------------------------------------------------- 
*/
$charts['tag']['line']['isTrendZone']    =   '"0"';

/*
|-------------------------------------------------------------------
| showOnTop='1/0': Whether the trend line/zone would be displayed over other elements of the chart.                                                                                                                                                                                      
|------------------------------------------------------------------- 
*/
$charts['tag']['line']['showOnTop']    =   '"0"';

/*
|-------------------------------------------------------------------
| alpha='NumericalValue0-100': Alpha (transparency) of the trend line                                                                                                                                                                                     
|------------------------------------------------------------------- 
*/
$charts['tag']['line']['alpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| font="font face" : Font face of the category names.                                                                                                                                                                                   
|------------------------------------------------------------------- 
*/
$charts['tag']['categories']['font']    =   '""';

/*
|-------------------------------------------------------------------
| fontSize="Numeric value" : Font size of the category names.                                                                                                                                                                                  
|------------------------------------------------------------------- 
*/
$charts['tag']['categories']['fontSize']    =   '""';

/*
|-------------------------------------------------------------------
| fontColor="Hex Color" : Font color of the category names.                                                                                                                                                                                
|------------------------------------------------------------------- 
*/
$charts['tag']['categories']['fontColor']    =   '"000000"';

/*
|-------------------------------------------------------------------
| hoverText="String" : Sometimes, you might just want to show the abbreviated names on the x-axis (to avoid cluttering 
| or to make the chart look more legible). However, you still have the option of showing the full name as tool tip using 
| this attribute. Like, in our example, we're showing the abbreviated form "Jan" on our x-axis, but the full word "January" 
| is shown as the tool tip.                                                                                                                                                                                 
|------------------------------------------------------------------- 
*/
$charts['tag']['category']['hoverText']    =   '""';

/*
|-------------------------------------------------------------------
| showName="1/0" : This attribute can either the value of 0 or 1. A value of 1 indicates that this data label/category name 
| will be displayed on the chart whereas 0 indicates it won't be displayed. This attribute is particular useful when you want 
| to show/hide names of alternate data items or say every x (th) data item.                                                                                                                                                                                
|------------------------------------------------------------------- 
*/
$charts['tag']['category']['showName']    =   '"1"';

/*
|-------------------------------------------------------------------
| This attribute sets the configuration whether the values (for this particular data set) will be shown alongside the data sets. 
| You can set this value for individual datasets to highlight the most prominent data.                                                                                         
|------------------------------------------------------------------- 
*/
$charts['tag']['dataset']['showValues']    =   '"1"';

/*
|-------------------------------------------------------------------
| alpha="0-100": This attribute sets the alpha (transparency) of the entire dataset.
| You can also later specify alpha at the <set> level to over ride this value.                                                                                         
|------------------------------------------------------------------- 
*/
$charts['tag']['dataset']['alpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| bgColor='HexColorCode': This attribute sets the background color for the chart. You can set any hex color code as the value 
| of this attribute. Remember that you DO NOT need to assign a "#" at the beginning of the hex color code. In fact, whenever 
| you need to provide any hex color code in FusionCharts XML data document, you do not have to assign the # at the beginning.                                                                                         
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['bgColor']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
| bgAlpha='NumericalValue(0-100)': This attribute helps you set the alpha (transparency) of the graph. This is particularly 
| useful when you need to load the chart in one of your Flash movies or when you want to set a background image (.swf) for the chart.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['bgAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| bgSWF='Path of SWF File': This attribute helps you load an external .swf file as a background for the chart.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['bgSWF']    =   '""';

/*
|-------------------------------------------------------------------
| canvasBgColor='HexColorCode': This attribute helps you set the background color of the canvas.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['canvasBgColor']    =   '""';

/*
|-------------------------------------------------------------------
| canvasBgAlpha='NumericalValue(0-100)': This attribute helps you set the alpha (transparency) of the canvas. 
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['canvasBgAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| canvasBorderColor='HexColorCode': This attribute helps you set the border color of the canvas. 
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['canvasBorderColor']    =   '"000000"';

/*
|-------------------------------------------------------------------
| canvasBorderThickness='NumericalValue(0-100)': This attribute helps you set the border thickness (in pixels) of the canvas. 
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['canvasBorderThickness']    =   '"1"';

/*
|-------------------------------------------------------------------
| dateFormat='mm/dd/yyyy or dd/mm/yyyy or yyyy/mm/dd': This is the most important attribute, which you'll need to specify for 
| all the Gantt charts that you build. With the help of this attribute, you're basically specifying the format in which you'll 
| be providing your dates to FusionCharts in XML format.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['dateFormat']    =   '"dd/mm/yyyy"';

/*
|-------------------------------------------------------------------
|  animation='1/0': This attribute sets whether the Gantt task bars need to be animated or not.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['animation']    =   '"1"';

/*
|-------------------------------------------------------------------
|  showTaskStartDate='1/0': This attribute sets whether the start date of each task will be shown on the left of the task bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['showTaskStartDate']    =   '"1"';

/*
|-------------------------------------------------------------------
|  showTaskEndDate='1/0': This attribute sets whether the end date of each task will be shown on the right of the task bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['showTaskEndDate']    =   '"1"';

/*
|-------------------------------------------------------------------
|  showTaskNames='1/0': This attribute sets whether the name of each task will be shown over the task bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['showTaskNames']    =   '"1"';

/*
|-------------------------------------------------------------------
|  taskDatePadding='1/0': If you opt to show the task start or end date, this attribute helps you configure 
| the distance between the date textbox and the task bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['taskDatePadding']    =   '"1"';

/*
|-------------------------------------------------------------------
| extendCategoryBg='1/0': This attribute lets you set whether the background for the last sub-category 
| (date range on the top of chart) will extend till the bottom of the chart.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['extendCategoryBg']    =   '"1"';

/*
|-------------------------------------------------------------------
|  ganttWidthPercent='Number between 0-100': The Gantt chart consists of two parts - the Gantt chart and 
| the data table (including process names). This attribute lets you set the width of the gantt part, in 
| percentage, with respect to the whole chart.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['ganttWidthPercent']    =   '"80"';

/*
|-------------------------------------------------------------------
|  ganttLineColor='Hex Color': Using this attribute, you can set the color of the lines running through 
| the Gantt chart as background.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['ganttLineColor']    =   '"000000"';

/*
|-------------------------------------------------------------------
| ganttLineThickness='Numerical Value': Using this attribute, you can set the thickness of the lines running 
| through the Gantt chart as background.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['ganttLineThickness']    =   '"3"';

/*
|-------------------------------------------------------------------
| ganttLineAlpha='Numerical Value 0-100': Using this attribute, you can set the alpha (transparency) of the 
| lines running through the Gantt chart as background.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['ganttLineAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| gridBorderColor='Hex Color': This attribute sets the color of the border of data table (which shows the 
| process names and additional information).
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['gridBorderColor']    =   '"000000"';

/*
|-------------------------------------------------------------------
| gridBorderAlpha='Numerical Value 0-100': This attribute sets the alpha of the border of data table (which 
| shows the process names and additional information).
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['gridBorderAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| gridResizeBarColor='Hex Color': If you show two columns of information in the data table, you'll find that 
| the data table is draggable i.e., you can resize each of the columns using a resize bar. This attribute 
| helps you set the color of that resize bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['gridResizeBarColor']    =   '"000000"';

/*
|-------------------------------------------------------------------
|  gridResizeBarThickness='Numeric Value': This attribute helps you set the thickness of the resize bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['gridResizeBarThickness']    =   '"3"';

/*
|-------------------------------------------------------------------
|  gridResizeBarAlpha='Numeric Value 0-100': This attribute helps you set the alpha of the resize bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['gridResizeBarAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
|  baseFont='FontName': This attribute sets the base font family of the chart font which lies on the canvas 
| i.e., all the values and the names in the chart which lie on the canvas will be displayed using the font 
| name provided here.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['baseFont']    =   '""';

/*
|-------------------------------------------------------------------
|  baseFontSize='FontSize': This attribute sets the base font size of the chart i.e., all the values and the 
| names in the chart which lie on the canvas will be displayed using the font size provided here. 
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['baseFontSize']    =   '""';

/*
|-------------------------------------------------------------------
| baseFontColor='HexColorCode': This attribute sets the base font color of the chart i.e., all the values and 
| the names in the chart which lie on the canvas will be displayed using the font color provided here. 
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['baseFontColor']    =   '""';

/*
|-------------------------------------------------------------------
| showhovercap='1/0': Option whether to show/hide hover caption box. 
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['showhovercap']    =   '"1"';

/*
|-------------------------------------------------------------------
| hoverCapBgColor='HexColorCode': Background color of the hover caption box.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['hoverCapBgColor']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
| hoverCapBorderColor='HexColorCode': Border color of the hover caption box.
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['hoverCapBorderColor']    =   '"000000"';

/*
|-------------------------------------------------------------------
| overCapSepChar='Char': The character specified as the value of this attribute separates the name and value displayed 
| in the hover caption box. 
|------------------------------------------------------------------- 
*/
$charts['tag']['chart']['hoverCapSepChar']    =   '"Char"';


/*
|-------------------------------------------------------------------
| headerText='String': This attribute helps you set the caption for the processes, that would appear in the 1st row of 
| data table. For instance, in our  
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['headerText']    =   '""';

/*
|-------------------------------------------------------------------
| bgColor='Hex Color': Defines the background color for the same.  
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['bgColor']    =   '""';

/*
|-------------------------------------------------------------------
| font='Font Face': Defines the font face in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['font']    =   '""';

/*
|-------------------------------------------------------------------
| fontSize='Numeric Value': Defines the font size in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['fontSize']    =   '""';

/*
|-------------------------------------------------------------------
| fontColor='Hex Color': Defines the color in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['fontColor']    =   '""';

/*
|-------------------------------------------------------------------
| isBold='1/0': Sets whether the text will be shown as bold or not.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['isBold']    =   '""';

/*
|-------------------------------------------------------------------
| isUnderLine='1/0': Sets whether the text will be shown as underline.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['isUnderLine']    =   '""';

/*
|-------------------------------------------------------------------
| verticalPadding='Numeric Value': Specifies the top margin. 
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['verticalPadding']    =   '""';

/*
|-------------------------------------------------------------------
| align='left/center/right': Specifies the horizontal alignment of text.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['align']    =   '""';

/*
|-------------------------------------------------------------------
| vAlign='left/center/right': Specifies the vertical alignment of text.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['vAlign']    =   '""';

/*
|-------------------------------------------------------------------
| headerFont='Font': Defines the font for the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['headerFont']    =   '""';

/*
|-------------------------------------------------------------------
| headerFontSize='Size': Defines the font size for the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['headerFontSize']    =   '""';

/*
|-------------------------------------------------------------------
| headerFontColor='Color': Defines the font color for the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['headerFontColor']    =   '""';

/*
|-------------------------------------------------------------------
| headerIsBold='1/0': Sets whether the header is bold or not.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['headerIsBold']    =   '""';

/*
|-------------------------------------------------------------------
| headerIsUnderline='1/0': Sets whether the header will appear with an underline.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['headerIsUnderline']    =   '""';

/*
|-------------------------------------------------------------------
| headerAlign='left/center/right': Sets the horizontal align position of the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['headerAlign']    =   '""';

/*
|-------------------------------------------------------------------
| headerVAlign='left/center/right': Sets the vertical align position of the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['headerVAlign']    =   '""';

/*
|-------------------------------------------------------------------
| headerBgColor='Color': Sets the background color of header cell.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['headerBgColor']    =   '""';

/*
|-------------------------------------------------------------------
| headerBgAlpha='Numeric Value': Sets the background alpha of header cell. 
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['headerBgAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| width='Number': This is an optional value, using which you can set the exact width (in pixels) of the processes column in the data table. 
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['width']    =   '""';

/*
|-------------------------------------------------------------------
| positionInGrid='Left/Right': This option lets you set whether the process column will appear as the right most column of the data table or left most.
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['positionInGrid']    =   '""';

/*
|-------------------------------------------------------------------
| bgColor='Hex Color': Defines the background color for the same.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['bgColor']    =   '""';

/*
|-------------------------------------------------------------------
| bgAlpha='Numeric Value 0-100': Define the background transparency level for the same.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['bgAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| font='Font Face': Defines the font face in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['font']    =   '""';

/*
|-------------------------------------------------------------------
| fontSize='Numeric Value': Defines the font size in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['fontSize']    =   '""';

/*
|-------------------------------------------------------------------
| fontColor='Hex Color': Defines the color in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['fontColor']    =   '""';

/*
|-------------------------------------------------------------------
| isBold='1/0': Sets whether the text will be shown as bold or not.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['isBold']    =   '""';

/*
|-------------------------------------------------------------------
| isUnderLine='1/0': Sets whether the text will be shown as underline.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['isUnderLine']    =   '""';

/*
|-------------------------------------------------------------------
| verticalPadding='Numeric Value': Specifies the top margin. 
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['verticalPadding']    =   '""';

/*
|-------------------------------------------------------------------
| align='left/center/right': Specifies the horizontal alignment of text.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['align']    =   '""';

/*
|-------------------------------------------------------------------
| vAlign='left/center/right': Specifies the vertical alignment of text.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['vAlign']    =   '""';

/*
|-------------------------------------------------------------------
| headerFont='Font': Defines the font for the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['headerFont']    =   '""';

/*
|-------------------------------------------------------------------
| headerFontSize='Size': Defines the font size for the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['headerFontSize']    =   '""';

/*
|-------------------------------------------------------------------
| headerFontColor='Color': Defines the font color for the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['headerFontColor']    =   '""';

/*
|-------------------------------------------------------------------
| headerIsBold='1/0': Sets whether the header is bold or not.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['headerIsBold']    =   '""';

/*
|-------------------------------------------------------------------
| headerIsUnderline='1/0': Sets whether the header will appear with an underline.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['headerIsUnderline']    =   '""';

/*
|-------------------------------------------------------------------
| headerAlign='left/center/right': Sets the horizontal align position of the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['headerAlign']    =   '""';

/*
|-------------------------------------------------------------------
| headerVAlign='left/center/right': Sets the vertical align position of the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['headerVAlign']    =   '""';

/*
|-------------------------------------------------------------------
| headerBgColor='Color': Sets the background color of header cell.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['headerBgColor']    =   '""';

/*
|-------------------------------------------------------------------
| headerBgAlpha='Numeric Value': Sets the background alpha of header cell. 
|------------------------------------------------------------------- 
*/
$charts['tag']['dataTable']['headerBgAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| width='Numerical Value': This is an optional attribute which lets you specify the width for a particular data column, 
| in pixels. However, if you don't specify this, FusionCharts will automatically set it to the best value.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['width']    =   '""';

/*
|-------------------------------------------------------------------
|  bgColor='Hex Color': Defines the background color for the same.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['bgColor']    =   '""';

/*
|-------------------------------------------------------------------
|  bgAlpha='Numeric Value 0-100': Define the background transparency level for the same.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['bgAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
|  font='Font Face': Defines the font face in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['font']    =   '""';

/*
|-------------------------------------------------------------------
|  fontSize='Numeric Value': Defines the font size in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['fontSize']    =   '""';

/*
|-------------------------------------------------------------------
|  fontColor='Hex Color': Defines the color in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['fontColor']    =   '""';

/*
|-------------------------------------------------------------------
|  isBold='1/0': Sets whether the text will be shown as bold or not.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['isBold']    =   '""';

/*
|-------------------------------------------------------------------
|  isUnderLine='1/0': Sets whether the text will be shown as underline.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['isUnderLine']    =   '""';

/*
|-------------------------------------------------------------------
|  verticalPadding='Numeric Value': Specifies the top margin. 
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['verticalPadding']    =   '""';

/*
|-------------------------------------------------------------------
|  align='left/center/right': Specifies the horizontal alignment of text.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['align']    =   '""';

/*
|-------------------------------------------------------------------
| vAlign='left/center/right': Specifies the vertical alignment of text.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['vAlign']    =   '""';

/*
|-------------------------------------------------------------------
| headerText='Label': This attribute sets the display label of the header for that column.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['headerText']    =   '""';

/*
|-------------------------------------------------------------------
| headerLink='URL Encoded Link': If you need to specify a link for the header, you can use this attribute to specify. 
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['headerLink']    =   '""';

/*
|-------------------------------------------------------------------
| headerFont='Font': Defines the font for the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['headerFont']    =   '""';

/*
|-------------------------------------------------------------------
| headerFontSize='Size': Defines the font size for the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['headerFontSize']    =   '""';

/*
|-------------------------------------------------------------------
| headerFontColor='Color': Defines the font color for the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['headerFontColor']    =   '""';

/*
|-------------------------------------------------------------------
| headerIsBold='1/0': Sets whether the header is bold or not.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['headerIsBold']    =   '""';

/*
|-------------------------------------------------------------------
| headerIsUnderline='1/0': Sets whether the header will appear with an underline.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['headerIsUnderline']    =   '""';

/*
|-------------------------------------------------------------------
| headerAlign='left/center/right': Sets the horizontal align position of the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['headerAlign']    =   '""';

/*
|-------------------------------------------------------------------
| headerVAlign='left/center/right': Sets the vertical align position of the header.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['headerVAlign']    =   '""';

/*
|-------------------------------------------------------------------
| headerBgColor='Color': Sets the background color of header cell.
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['headerBgColor']    =   '""';

/*
|-------------------------------------------------------------------
| headerBgAlpha='Numeric Value': Sets the background alpha of header cell. 
|------------------------------------------------------------------- 
*/
$charts['tag']['dataColumn']['headerBgAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| label='URL Encoded String label': This attribute sets the value that would be displayed in the chart, as the contents of that specific cell.
|------------------------------------------------------------------- 
*/
$charts['tag']['text']['label']    =   '""';

/*
|-------------------------------------------------------------------
| link='URL Encoded link': If you need to hyperlink the content of the cell, you can use this attribute to specify the link.
|------------------------------------------------------------------- 
*/
$charts['tag']['text']['link']    =   '""';

/*
|-------------------------------------------------------------------
| bgColor='Hex Color': Defines the background color for the same.
|------------------------------------------------------------------- 
*/
$charts['tag']['text']['bgColor']    =   '""';

/*
|-------------------------------------------------------------------
| bgAlpha='Numeric Value 0-100': Define the background transparency level for the same.
|------------------------------------------------------------------- 
*/
$charts['tag']['text']['bgAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| font='Font Face': Defines the font face in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['text']['font']    =   '""';

/*
|-------------------------------------------------------------------
| fontSize='Numeric Value': Defines the font size in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['text']['fontSize']    =   '""';

/*
|-------------------------------------------------------------------
| fontColor='Hex Color': Defines the color in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['text']['fontColor']    =   '""';

/*
|-------------------------------------------------------------------
| isBold='1/0': Sets whether the text will be shown as bold or not.
|------------------------------------------------------------------- 
*/
$charts['tag']['text']['isBold']    =   '""';

/*
|-------------------------------------------------------------------
| isUnderLine='1/0': Sets whether the text will be shown as underline.
|------------------------------------------------------------------- 
*/
$charts['tag']['text']['isUnderLine']    =   '""';

/*
|-------------------------------------------------------------------
| align='left/center/right': Specifies the horizontal alignment of text.
|------------------------------------------------------------------- 
*/
$charts['tag']['text']['align']    =   '""';

/*
|-------------------------------------------------------------------
| #  vAlign='left/center/right': Specifies the vertical alignment of text.
|------------------------------------------------------------------- 
*/
$charts['tag']['text']['vAlign']    =   '""';





















/*
|-------------------------------------------------------------------
| bgAlpha='Numeric Value 0-100': Define the background transparency level for the same. 
|------------------------------------------------------------------- 
*/
$charts['tag']['processes']['bgAlpha']    =   '"100"';




/*
|-------------------------------------------------------------------
| link='URL Encoded link': If you wish to hyperlink each process name on the chart, you can use this attribute to specify 
| the link for each process name. 
|------------------------------------------------------------------- 
*/
$charts['tag']['process']['link']    =   '""';

/*
|-------------------------------------------------------------------
| font='Font Face': Defines the font face in which text will be rendered. 
|------------------------------------------------------------------- 
*/
$charts['tag']['process']['font']    =   '""';

/*
|-------------------------------------------------------------------
| fontSize='Numeric Value': Defines the font size in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['process']['fontSize']    =   '""';

/*
|-------------------------------------------------------------------
| fontColor='Hex Color': Defines the color in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['process']['fontColor']    =   '""';

/*
|-------------------------------------------------------------------
| isBold='1/0': Sets whether the text will be shown as bold or not.
|------------------------------------------------------------------- 
*/
$charts['tag']['process']['isBold']    =   '""';

/*
|-------------------------------------------------------------------
| isUnderLine='1/0': Sets whether the text will be shown as underline.
|------------------------------------------------------------------- 
*/
$charts['tag']['process']['isUnderLine']    =   '""';

/*
|-------------------------------------------------------------------
| verticalPadding='Numeric Value': Specifies the top margin. 
|------------------------------------------------------------------- 
*/
$charts['tag']['process']['verticalPadding']    =   '""';

/*
|-------------------------------------------------------------------
| align='left/center/right': Specifies the horizontal alignment of text. 
|------------------------------------------------------------------- 
*/
$charts['tag']['process']['align']    =   '""';

/*
|-------------------------------------------------------------------
| vAlign='left/center/right': Specifies the vertical alignment of text.
|------------------------------------------------------------------- 
*/
$charts['tag']['process']['vAlign']    =   '""';

/*
|-------------------------------------------------------------------
| font='Font Face': Defines the font face in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['tasks']['font']    =   '""';

/*
|-------------------------------------------------------------------
| fontSize='Numeric Value': Defines the font size in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['tasks']['fontSize']    =   '""';

/*
|-------------------------------------------------------------------
| fontColor='Hex Color': Defines the color in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['tasks']['fontColor']    =   '""';

/*
|-------------------------------------------------------------------
| #  color='Hex Color': This attribute helps you define the background color for the task bar. If you need to show a gradiented 
| background, just specify the list of colors here using a comma.
|------------------------------------------------------------------- 
*/
$charts['tag']['tasks']['color']    =   '""';

/*
|-------------------------------------------------------------------
| alpha='Numeric Value': This attribute helps you specify the transparency of the task bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['tasks']['alpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| showBorder='1/0': This attribute lets you specify whether a border would appear around the task bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['tasks']['showBorder']    =   '""';

/*
|-------------------------------------------------------------------
| borderColor='Hex Color': Color of the task bar border.
|------------------------------------------------------------------- 
*/
$charts['tag']['tasks']['borderColor']    =   '""';

/*
|-------------------------------------------------------------------
| borderThickness='Numeric Value': Thickness of the task bar border.
|------------------------------------------------------------------- 
*/
$charts['tag']['tasks']['borderThickness']    =   '""';

/*
|-------------------------------------------------------------------
| showTaskNames='1/0': Configuration whether to show the names of the tasks over the task bars.
|------------------------------------------------------------------- 
*/
$charts['tag']['tasks']['showTaskNames']    =   '"0"';

/*
|-------------------------------------------------------------------
| showTaskStartDate='1/0': Configuration whether to show the start dates of the tasks on the left of task bars.
|------------------------------------------------------------------- 
*/
$charts['tag']['tasks']['showTaskStartDate']    =   '"0"';

/*
|-------------------------------------------------------------------
| showTaskEndDate='1/0': Configuration whether to show the end dates of the tasks on the right side of the task bars.
|------------------------------------------------------------------- 
*/
$charts['tag']['tasks']['showTaskEndDate']    =   '"0"';

/*
|-------------------------------------------------------------------
| start='Date': This attribute sets the start date for this particular task. This attribute is compulsory. 
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['start']    =   '""';

/*
|-------------------------------------------------------------------
| end='Date': This attribute sets the end date for this particular task. This attribute is compulsory.  
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['end']    =   '""';

/*
|-------------------------------------------------------------------
| processId='Process Id': Each task needs to belong a process, as we had earlier indicated. For this attribute, you need to specify 
| the process id, against which you want to plot this task. Process id was earlier assigned by you in the <process> element. You 
| need to duplicate that same id here.   
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['processId']    =   '""';

/*
|-------------------------------------------------------------------
| Id='Alphanumeric Value': Each task needs to have a id, so that it can be easily referenced back in XML. You can set the id of the
| task using this attribute.    
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['Id']    =   '""';

/*
|-------------------------------------------------------------------
| name='String Name': This attributes sets the name of the task, which will be displayed on the chart.    
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['name']    =   '""';

/*
|-------------------------------------------------------------------
| hoverText='hover caption text': If you want to display more information as the tool tip of this task bar, you can specify that hover text here.   
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['hoverText']    =   '""';

/*
|-------------------------------------------------------------------
| link='URL Encoded link': If you intend to provide a hyper link for the task bar, you can set the link in this attribute.  
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['link']    =   '""';

/*
|-------------------------------------------------------------------
| animation='1/0': This attribute lets you set whether this particular task bar would animate or not.  
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['animation']    =   '""';

/*
|-------------------------------------------------------------------
| font='Font Face': Defines the font face in which text will be rendered. 
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['font']    =   '""';

/*
|-------------------------------------------------------------------
| fontSize='Numeric Value': Defines the font size in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['fontSize']    =   '""';

/*
|-------------------------------------------------------------------
| fontColor='Hex Color': Defines the color in which text will be rendered.
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['fontColor']    =   '"000000"';

/*
|-------------------------------------------------------------------
|  color='Hex Color': This attribute helps you define the background color for the task bar. If you need 
| to show a gradiented background, just specify the list of colors here using a comma.
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['color']    =   '"FFFFFF"';

/*
|-------------------------------------------------------------------
| alpha='Numeric Value': This attribute helps you specify the transparency of the task bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['alpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| showBorder='1/0': This attribute lets you specify whether a border would appear around the task bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['showBorder']    =   '""';

/*
|-------------------------------------------------------------------
| showBorder='1/0': This attribute lets you specify whether a border would appear around the task bar.  
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['borderColor']    =   '""';

/*
|-------------------------------------------------------------------
| borderThickness='Numeric Value': Thickness of the task bar border.  
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['borderThickness']    =   '""';

/*
|-------------------------------------------------------------------
| borderAlpha='Numeric Value 0-100': Alpha of the task bar border.  
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['borderAlpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| showName='1/0': Configuration whether to show the name of this tasks over the task bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['showName']    =   '"1"';

/*
|-------------------------------------------------------------------
| showStartDate='1/0': Configuration whether to show the start date of this task on the left of task bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['showStartDate']    =   '"0"';

/*
|-------------------------------------------------------------------
| showEndDate='1/0': Configuration whether to show the end date of this task on the right side of the task bar.
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['showEndDate']    =   '"0"';

/*
|-------------------------------------------------------------------
| height='Numeric Value': If you intend to specify an explicit height for the task bar, you can do so using this 
| attribute. Otherwise, FusionCharts automatically calculates the best possible value.
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['height']    =   '""';

/*
|-------------------------------------------------------------------
|  topPadding='Numeric Value': If you intend to specify an explicit top padding for the task bar, you can do so using 
| this attribute. Otherwise, FusionCharts automatically calculates the best possible value.
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['topPadding']    =   '""';

/*
|-------------------------------------------------------------------
|  taskDatePadding='Numeric Value': If you intend to specify an explicit distance between task bar and date textbox, 
| you can do so using this attribute. Otherwise, FusionCharts automatically calculates the best possible value.
|------------------------------------------------------------------- 
*/
$charts['tag']['task']['taskDatePadding']    =   '""';

/*
|-------------------------------------------------------------------
| Color='Hex Code': Color of the connector
|------------------------------------------------------------------- 
*/
$charts['tag']['connectors']['Color']    =   '""';

/*
|-------------------------------------------------------------------
| Thickness='Numeric Value': Thickness of the connector line in pixels.
|------------------------------------------------------------------- 
*/
$charts['tag']['connectors']['Thickness']    =   '""';

/*
|-------------------------------------------------------------------
| Alpha='Numeric Value 0-100': Tranparency of the connector line.
|------------------------------------------------------------------- 
*/
$charts['tag']['connectors']['Alpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| isDashed='1/0': Configuration whether the connector line will appear as dashed/solid line.
|------------------------------------------------------------------- 
*/
$charts['tag']['connectors']['isDashed']    =   '""';

/*
|-------------------------------------------------------------------
| fromTaskId='Task Id': Id of the task (which you had earlier specified as an attribute of <task> element) from where 
| the connector will originate.
|------------------------------------------------------------------- 
*/
$charts['tag']['connector']['fromTaskId']    =   '""';

/*
|-------------------------------------------------------------------
| toTaskId='Task Id': Id of the task (which you had earlier specified as an attribute of <task> element) from where the 
| connector will terminate.
|------------------------------------------------------------------- 
*/
$charts['tag']['connector']['toTaskId']    =   '""';

/*
|-------------------------------------------------------------------
| fromTaskConnectStart='1/0': Configuration whether the connector will join the originating task bar at the start 
| position or end position.
|------------------------------------------------------------------- 
*/
$charts['tag']['connector']['fromTaskConnectStart']    =   '""';

/*
|-------------------------------------------------------------------
| toTaskConnectStart='1/0': Configuration whether the connector will join the terminating task bar at the start 
| position or end position.
|------------------------------------------------------------------- 
*/
$charts['tag']['connector']['toTaskConnectStart']    =   '""';

/*
|-------------------------------------------------------------------
| Color='Hex Code': Color of the connector.
|------------------------------------------------------------------- 
*/
$charts['tag']['connector']['Color']    =   '""';

/*
|-------------------------------------------------------------------
| Thickness='Numeric Value': Thickness of the connector line in pixels.
|------------------------------------------------------------------- 
*/
$charts['tag']['connector']['Thickness']    =   '""';

/*
|-------------------------------------------------------------------
| Alpha='Numeric Value 0-100': Tranparency of the connector line.
|------------------------------------------------------------------- 
*/
$charts['tag']['connector']['Alpha']    =   '"100"';

/*
|-------------------------------------------------------------------
| isDashed='1/0': Configuration whether the connector line will appear as dashed/solid line.
|------------------------------------------------------------------- 
*/
$charts['tag']['connector']['isDashed']    =   '"100"';

/*
|-------------------------------------------------------------------
| date='Date': Date where you want the milestone to be placed.
|------------------------------------------------------------------- 
*/
$charts['tag']['milestone']['date']    =   '""';

/*
|-------------------------------------------------------------------
| taskId='Task Id': The id of the task over whose bar you want the milestone to be placed.
|------------------------------------------------------------------- 
*/
$charts['tag']['milestone']['taskId']    =   '""';

/*
|-------------------------------------------------------------------
| shape = 'star/polygon': Shape of the milestone.
|------------------------------------------------------------------- 
*/
$charts['tag']['milestone']['shape']    =   '""';

/*
|-------------------------------------------------------------------
| numSides='Numeric Value 3-x': Number of sides that the milestone would have. For example, for a diamond, you can 
| set shape to star and then set this value to 4.
|------------------------------------------------------------------- 
*/
$charts['tag']['milestone']['numSides']    =   '""';

/*
|-------------------------------------------------------------------
|  startAngle='Angle': Starting angle of the polygon/star drawn as milestone.
|------------------------------------------------------------------- 
*/
$charts['tag']['milestone']['startAngle']    =   '""';

/*
|-------------------------------------------------------------------
|  radius='Numeric value': Radius of the polygon/star drawn as milestone.
|------------------------------------------------------------------- 
*/
$charts['tag']['milestone']['radius']    =   '""';

/*
|-------------------------------------------------------------------
|  borderColor='Hex Color': Border color of the milestone.
|------------------------------------------------------------------- 
*/
$charts['tag']['milestone']['borderColor']    =   '""';

/*
|-------------------------------------------------------------------
|  borderThickness='Numeric Value': Border thickness of the milestone.
|------------------------------------------------------------------- 
*/
$charts['tag']['milestone']['borderThickness']    =   '""';

/*
|-------------------------------------------------------------------
|  color='Hex Color': Background fill color of the milestone.
|------------------------------------------------------------------- 
*/
$charts['tag']['milestone']['color']    =   '""';

/*
|-------------------------------------------------------------------
|  alpha='Numeric Value 0-100': Transparency level of the milestone.
|------------------------------------------------------------------- 
*/
$charts['tag']['milestone']['alpha']    =   '"100"';






?>
