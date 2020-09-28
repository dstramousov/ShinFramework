<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Charts_Funnel.php
 */


/**
 * ShinPHP framework fusion charts library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Charts_Funnel.php
 */

/*
	This is properties for visualization this type of charts.
	You can put in to charts.php config file or using directly in the init() function 

Background Properties

    * bgColor='HexColorCode': This attribute sets the background color for the chart. You can set any hex color code as the value of this attribute. Remember that you DO NOT need to assign a "#" at the beginning of the hex color code. In fact, whenever you need to provide any hex color code in FusionCharts XML data document, you do not have to assign the # at the beginning.
      Default value: FFFFFF
    * bgAlpha='NumericalValue(0-100)': This attribute helps you set the alpha (transparency) of the graph. This is particularly useful when you need to load the chart in one of your Flash movies or when you want to set a background image (.swf) for the chart.
      Default value: 100
    * bgSWF='Path of SWF File': This attribute helps you load an external .swf file as a background for the chart. For more information on this, please see Advanced Charting > Setting background for Charts.

General Properties

    * showValues='1/0': This parameter sets whether the data values would be displayed on the chart or not, on the corresponding funnel segment.
      Default value: 1, i.e. by default the data values are displayed.
    * showNames='1/0': This parameter sets whether the data names would be displayed on the chart or not.
      Default value: 1, i.e. by default the data names are displayed.
    * animation='1/0': This parameter lets you define whether the chart would be animated or not.
      Default value: 1
    * fillAlpha='value(0-100)': This attribute helps you specify the alpha (transparency) of the funnel chart as a whole, i.e., all the funnel segments would be shown in the alpha mentioned in this attribute.
      Default value: 100
    * isSliced='1/0': This attribute specifies whether the the various funnel segments would be sliced, i.e., separated from each other by a distance.
      Default value: 1
    * slicingDistance='value': If you have set the isSliced attribute to 1 or have not defined it at all (so that it takes the value 1 by default), then this attribute specifies the distance (in pixels) by which the various funnel segments would be separated from each other by.
      Default value: 10
    * funnelBaseWidth='value': This attribute sets the width of the tap, i.e., the bottom part of the funnel.
      Default value: If you don't define this attribute, it would be auto-calculated to the most suitable value for the chart.
    * funnelBaseHeight='value': This attribute sets the height of the tap of the funnel.
      Default value: If you don't define this attribute, it would be auto-calculated to the best value for the chart.

Number Formatting Options

    * numberPrefix='Character': Using this attribute, you could add prefix to all the numbers visible on the graph. For example, to represent all dollars figure on the chart, you could specify this attribute to ' $' to show the numbers as $40000, $50000.
    * numberSuffix='Character': Using this attribute, you could add prefix to all the numbers visible on the graph. For example, to represent all figure quantified as per annum on the chart, you could specify this attribute to ' /a' to show like 40000/a, 50000/a.

      To use special characters for numberPrefix or numberSuffix, you'll need to URL Encode them. That is, suppose you wish to have numberSuffix as % (as you would have in 30%), you'll need to specify it as under:
      numberSuffix='%25'
    * formatNumber='1/0': This configuration determines whether the numbers displayed on the chart will be formatted using commas (or any other separator which you have specified), e.g., 40,000 if formatNumber='1' and 40000 if formatNumber='0'
      Default value: 1. i.e. the numbers gets formatted by default
    * formatNumberScale='1/0': Configuration whether to add K (thousands) and M (millions) to a number after truncating and rounding it - e.g., if formatNumberScale is set to 1, 10434 would become 1.04K (with decimalPrecision set to 2 places). Same with numbers in millions - a M will added at the end.
    * decimalSeparator='Character': This option helps you specify the character to be used as the decimal separator in a number.
      Default value: "."
    * thousandSeparator='Character': This option helps you specify the character to be used as the thousands separator in a number.

Font Properties

    * baseFont='FontName': This attribute sets the base font family for all the text in the chart i.e., all the values and the labels in the chart will be displayed using the font name provided here.
      Default value: Verdana
    * baseFontSize='FontSize': This attribute sets the base font size for all the text in the chart.
      Default value: 9
    * baseFontColor='HexColorCode(without the '#' sign)': This attribute sets the base font color for all the text in the chart.
      Default value: 000000

Hover Caption Properties

The hover caption is the tool tip which shows up when the user moves his mouse over a funnel segment.

    * showhovercap='1/0': Option whether to show/hide hover caption box.
      Default value: 1, i.e. the hover caption box is displayed by default.
    * hoverCapBgColor='HexColorCode': Background color of the hover caption box.
      Default value: F1F1F1
    * hoverCapBorderColor='HexColorCode': Border color of the hover caption box.
      Default value: 666666
    * hoverCapSepChar='Char': The character specified as the value of this attribute separates the name and value displayed in the hover caption box.
      Default value: ,

Border Properties

    * showBorder='1/0': This attribute sets whether a border would be shown around the funnel segments or not.
      Default value: 0
    * borderColor='Hex Color': This attribute sets the color of the border, which is displayed around the funnel segments when showBorder is set as 1.
      Default value: By default, the border color of each funnel segment is the same as their background color.
    * borderThickness='Numerical Value': This attribute sets the thickness, in pixels, of the border, which is displayed around the funnel segments when showBorder is set as 1.
      Default value: 1
    * borderAlpha='value(0-100)': This attribute sets the alpha of the border, which is displayed around the color range when showBorder is set as 1.
      Default value: 100

Chart Margins

Chart Margins refer to the empty spaces left on the top, bottom, left and right of the chart. That means, that much amount of space would be left empty on the chart, before it starts plotting.

    * chartLeftMargin='Numerical Value (in pixels)': Space to be left unplotted on the left side of the chart.
    * chartRightMargin='Numerical Value (in pixels)': Empty space to be left on the right side of the chart
    * chartTopMargin='Numerical Value (in pixels)': Empty space to be left on the top of the chart.
    * chartBottomMargin='Numerical Value (in pixels)': Empty space to be left at the bottom of the chart.

*/ 
 
 
require_once("SHIN_Charts.php");


class SHIN_Charts_Funnel extends SHIN_Charts
{
    /**
    * list of charts that realize this class
    * 
    * @var array
    */
    private $chartList      =   array('fn' => "'Funnel'");
    
    /**
    * default chart
    * 
    * @var string
    */
    private $defaultChart   =   'fn';
    
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
        
        $__data = '';

        $__preinit_vals = preg_split('/\+/', $_arr['xval']);
        $__init_vals_name_arr = array();
        foreach ($__preinit_vals as $i) {
            array_push($__init_vals_name_arr, '$iterator[\''.$i.'\']');
        }
        $__init_vals_name = implode(".' '.", $__init_vals_name_arr);

        $__preinit_vals = preg_split('/\+/', $_arr['yval']);
        $__init_vals_val = '';
        foreach ($__preinit_vals as $i) {
            $__init_vals_val .= '$iterator[\''.$i.'\'] ' ;
        }

        foreach($_arr['data'] as $iterator)
        {
            eval("\$__v = $__init_vals_val;");
            eval("\$__n = $__init_vals_name;");

            if(!isset($iterator['color'])){
                $iterator['color'] = $this->getRandomColor();
            }
            
            $__data .= '<set' . $this->getTagAttributes('set') . ' name="' .  $__n . '" value="' . $__v . '" color="' . $iterator['color'] . '" />';
        }
        
        $data   = "'<chart " . $this->getTagAttributes('chart') . ">" . $__data . "</chart>'";
        
        self::init(array('data' =>  $data));
        
        return;
    }
} // End of class 

/* End of file SHIN_Charts_Funnel.php */
/* Location: ./libraries/SHIN_Charts_Funnel.php */