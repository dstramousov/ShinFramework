<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Charts_Financial.php
 */


/**
 * ShinPHP framework fusion charts library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Charts_Financial.php
 */

/*
    This is properties for visualization this type of charts.
    You can put in to charts.php config file or using directly in the init() function 

Background Properties

    * bgColor="HexColorCode" : This attribute sets the background color for the chart. You can set any hex color code as the value of this attribute. Remember that you DO NOT need to assign a "#" at the beginning of the hex color code. In fact, whenever you need to provide any hex color code in FusionCharts XML data document, you do not have to assign the # at the beginning.
    * bgAlpha="NumericalValue(0-100)" : This attribute helps you set the alpha (transparency) of the graph. This is particularly useful when you need to load the chart in one of your Flash movies or when you want to set a background image (.swf) for the chart.
    * bgSWF="Path of SWF File" : This attribute helps you load an external .swf file as a background for the chart.

Canvas Properties

    * canvasBgColor="HexColorCode" : This attribute helps you set the background color of the canvas.
    * canvasBgAlpha="NumericalValue(0-100)" : This attribute helps you set the alpha (transparency) of the canvas.
    * canvasBorderColor="HexColorCode" : This attribute helps you set the border color of the canvas.
    * canvasBorderThickness="NumericalValue(0-100)" : This attribute helps you set the border thickness (in pixels) of the canvas.

Chart and Axis Titles

    * caption="String" : This attribute determines the caption of the chart that would appear at the top of the chart.
    * subCaption="String" : Sub-caption of the chart
    * xAxisName= "String" : x-Axis text title (if the chart supports axis)
    * yAxisName= "String" : y-Axis text title (if the chart supports axis)

Chart Numerical Limits

    * yAxisMinValue="value": This attribute determines the lower limit of y-axis.
    * yAxisMaxValue="value" : This attribute determines the upper limit of y-axis.
      If you don't specify any of the above values, it is automatically calculated by FusionCharts based on the data provided by you.

Generic Properties

    * shownames="1/0" : This attribute can have either of the two possible values: 1,0. It sets the configuration whether the x-axis values (for the data sets) will be displayed or not. By default, this attribute assumes the value 1, which means that the x-axis names will be displayed.
    * showValues="1/0" : This attribute can have either of the two possible values: 1,0. It sets the configuration whether the data numerical values will be displayed along with the columns, bars, lines and the pies. By default, this attribute assumes the value 1, which means that the values will be displayed.
    * showLimits="1/0" : Option whether to show/hide the chart limit textboxes.
    * rotateNames="1/0" : Configuration that sets whether the category name text boxes would be rotated or not.
    * animation="1/0" : This attribute sets whether the animation is to be played or whether the entire chart would be rendered at one go.
    * showLegend="1/0" : This attribute sets whether the legend would be displayed at the bottom of the chart.
    * showColumnShadow="1/0": Whether the 2D shadow for the columns would be shown or not.

Font Properties

    * baseFont="FontName" : This attribute sets the base font family of the chart font which lies on the canvas i.e., all the values and the names in the chart which lie on the canvas will be displayed using the font name provided here.
    * baseFontSize="FontSize" : This attribute sets the base font size of the chart i.e., all the values and the names in the chart which lie on the canvas will be displayed using the font size provided here.
    * baseFontColor="HexColorCode" : This attribute sets the base font color of the chart i.e., all the values and the names in the chart which lie on the canvas will be displayed using the font color provided here.
    * outCnvBaseFont = "FontName" : This attribute sets the base font family of the chart font which lies outside the canvas i.e., all the values and the names in the chart which lie outside the canvas will be displayed using the font name provided here.
    * outCnvBaseFontSze="FontSize" : This attribute sets the base font size of the chart i.e., all the values and the names in the chart which lie outside the canvas will be displayed using the font size provided here.
    * outCnvBaseFontColor="HexColorCode": This attribute sets the base font color of the chart i.e., all the values and the names in the chart which lie outside the canvas will be displayed using the font color provided here.

Number Formatting Options

    * numberPrefix="$" : Using this attribute, you could add prefix to all the numbers visible on the graph. For example, to represent all dollars figure on the chart, you could specify this attribute to ' $' to show like $40000, $50000.
    * numberSuffix="p.a" : Using this attribute, you could add prefix to all the numbers visible on the graph. For example, to represent all figure quantified as per annum on the chart, you could specify this attribute to ' /a' to show like 40000/a, 50000/a.
      To use special characters for numberPrefix or numberSuffix, you'll need to URL Encode them. That is, suppose you wish to have numberSuffix as % (like 30%), you'll need to specify it as under:
      numberSuffix='%25'
    * formatNumber="1/0" : This configuration determines whether the numbers displayed on the chart will be formatted using commas, e.g., 40,000 if formatNumber='1' and 40000 if formatNumber='0 '
    * formatNumberScale="1/0" : Configuration whether to add K (thousands) and M (millions) to a number after truncating and rounding it - e.g., if formatNumberScale is set to 1, 10434 would become 1.04K (with decimalPrecision set to 2 places). Same with numbers in millions - a M will added at the end.
    * decimalSeparator="." : This option helps you specify the character to be used as the decimal separator in a number.
    * thousandSeparator="," : This option helps you specify the character to be used as the thousands separator in a number.
    * decimalPrecision="2" : Number of decimal places to which all numbers on the chart would be rounded to.
    * divLineDecimalPrecision="2": Number of decimal places to which all divisional line (horizontal) values on the chart would be rounded to.
    * limitsDecimalPrecision="2" : Number of decimal places to which upper and lower limit values on the chart would be rounded to.

Zero Plane

The zero plane is a simple plane (line) that signifies the 0 position on the chart. If there are no negative numbers on the chart, you won't see a visible zero plane.

    * zeroPlaneThickness="Numeric Value" : Thickness (in pixels) of the line indicating the zero plane.
    * zeroPlaneColor="Hex Code" : The intended color for the zero plane.
    * zeroPlaneAlpha="Numerical Value 0-100" : The intended transparency for the zero plane.

Divisional Lines (Horizontal)

Divisional Lines are horizontal or vertical lines running through the canvas. Each divisional line signfies a smaller unit of the entire axis thus aiding the users in interpreting the chart.

    * numdivlines="NumericalValue" : This attribute sets the number of divisional lines to be drawn.
    * divlinecolor="HexColorCode" : The color of grid divisional line.
    * divLineThickness="NumericalValue" : Thickness (in pixels) of the grid divisional line.
    * divLineAlpha="NumericalValue0-100" : Alpha (transparency) of the grid divisional line.
    * showDivLineValue="1/0" : Option to show/hide the textual value of the divisional line.
    * showAlternateHGridColor="1/0" : Option on whether to show alternate colored horizontal grid bands.
    * alternateHGridColor="HexColorCode" : Color of the alternate horizontal grid bands.
    * alternateHGridAlpha="NumericalValue0-100" : Alpha (transparency) of the alternate horizontal grid bands.

Hover Caption Properties

The hover caption is the tool tip which shows up when the user moves his mouse over a particular data item (column, line, pie, bar etc.).

    * showhovercap="1/0" : Option whether to show/hide hover caption box.
    * hoverCapBgColor="HexColorCode" : Background color of the hover caption box.
    * hoverCapBorderColor="HexColorCode" : Border color of the hover caption box.
    * hoverCapSepChar="Char" : The character specified as the value of this attribute separates the name and value displayed in the hover caption box.

Chart Margins

Chart Margins refers to the empty space left on the top, bottom, left and right of the chart. That means, FusionCharts would leave that much amount of empty space on the chart, before it starts plotting.

    * chartLeftMargin="Numerical Value (in pixels)" : Space to be left unplotted on the left side of the chart.
    * chartRightMargin="Numerical Value (in pixels)" : Empty space to be left on the right side of the chart
    * chartTopMargin="Numerical Value (in pixels)" : Empty space to be left on the top of the chart.
    * chartBottomMargin="Numerical Value (in pixels)" : Empty space to be left at the bottom of the chart.


*/ 
 
 
require_once("SHIN_Charts.php");


class SHIN_Charts_Financial extends SHIN_Charts
{
    
    /**
    * list of charts that realize this class
    * 
    * @var array
    */
    private $chartList      =   array('ck' => "'Candlestick'");
    
    /**
    * default chart
    * 
    * @var string
    */
    private $defaultChart   =   'ck';
    
    /**
     * Constructor. Init charts with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct()
    {    
        parent::__construct();
    }

    /**
     * Compile string for data.
     *
     * @access public
     * @param $_arr array with .
     * @return string Compiled string.
     */
    public function combinedInit($_arr)
    {
        if(isset($_arr['type']) && array_key_exists($_arr['type'], $this->chartList)) {
            $this->setDiagram($this->chartList[$_arr['type']]);    
        } else {
            $this->setDiagram($this->chartList[$this->defaultChart]);    
        }
        
        $data   =   "'<graph " . $this->getTagAttributes('graph') . ">";
        
          
        //add x values
        if(isset($_arr['xval']) && count($_arr['xval']) > 0) {
            $data  .=   "<categories " . $this->getTagAttributes('categories') . ">";
         
                foreach($_arr['xval'] as $value){
                    $data   .=  '<category ' . $this->getTagAttributes('category', $value) . ' />';
                }
                
            $data  .=   "</categories>";
        }
        
        //add y values
        if(isset($_arr['yval']) && count($_arr['yval']) > 0) {
            $data  .=  '<data ' . $this->getTagAttributes('data') . '>';
                foreach($_arr['yval'] as $key => $value){
                    if(!isset($value['color'])){
                        $value['color']   =    $this->getRandomColor();    
                    }
                     $data   .=  '<set ' .  $this->getTagAttributes('set', $value). '/>';
                }
            $data   .=  "</data>";
        }
        
        //add trends
        if(isset($_arr['trends']) && count($_arr['trends']) > 0) {
            $data   .= '<trendLines>';
                foreach($_arr['trends'] as $value){
                    if(!isset($value['color'])){
                        $value['color']   =    $this->getRandomColor();    
                    }
                    
                    $data   .=  '<line ' .  $this->getTagAttributes('line', $value). '/>';
                }
            $data   .= '</trendLines>';
        }
        
                            
        $data  .=   "</graph>'";
        
        self::init(array('data'=>$data));
        return;
    }

} // End of class 

/* End of file SHIN_Charts_Financial.php */
/* Location: ./libraries/SHIN_Charts_Financial.php */               