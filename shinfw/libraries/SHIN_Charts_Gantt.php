<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Charts_Gantt.php
 */


/**
 * ShinPHP framework fusion charts library
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Charts_Gantt.php
 */

/*
	This is properties for visualization this type of charts.
	You can put in to charts.php config file or using directly in the init() function 

Background Properties

    * bgColor='HexColorCode': This attribute sets the background color for the chart. You can set any hex color code as the value of this attribute. Remember that you DO NOT need to assign a "#" at the beginning of the hex color code. In fact, whenever you need to provide any hex color code in FusionCharts XML data document, you do not have to assign the # at the beginning.
      Default value: FFFFFF
    * bgAlpha='NumericalValue(0-100)': This attribute helps you set the alpha (transparency) of the graph. This is particularly useful when you need to load the chart in one of your Flash movies or when you want to set a background image (.swf) for the chart.
      Default value: 100
    * bgSWF='Path of SWF File': This attribute helps you load an external .swf file as a background for the chart. For more information on this, please see Advanced Charting > Setting background SWFs.

Canvas Properties

    * canvasBgColor='HexColorCode': This attribute helps you set the background color of the canvas.
    * canvasBgAlpha='NumericalValue(0-100)': This attribute helps you set the alpha (transparency) of the canvas.
    * canvasBorderColor='HexColorCode': This attribute helps you set the border color of the canvas.
    * canvasBorderThickness='NumericalValue(0-100)': This attribute helps you set the border thickness (in pixels) of the canvas.

General Properties

    * dateFormat='mm/dd/yyyy or dd/mm/yyyy or yyyy/mm/dd': This is the most important attribute, which you'll need to specify for all the Gantt charts that you build. With the help of this attribute, you're basically specifying the format in which you'll be providing your dates to FusionCharts in XML format.
    * animation='1/0': This attribute sets whether the Gantt task bars need to be animated or not.
    * showTaskStartDate='1/0': This attribute sets whether the start date of each task will be shown on the left of the task bar.
    * showTaskEndDate='1/0': This attribute sets whether the end date of each task will be shown on the right of the task bar.
    * showTaskNames='1/0': This attribute sets whether the name of each task will be shown over the task bar.
    * taskDatePadding='1/0': If you opt to show the task start or end date, this attribute helps you configure the distance between the date textbox and the task bar.
    * extendCategoryBg='1/0': This attribute lets you set whether the background for the last sub-category (date range on the top of chart) will extend till the bottom of the chart.

Gantt General Properties

    * ganttWidthPercent='Number between 0-100': The Gantt chart consists of two parts - the Gantt chart and the data table (including process names). This attribute lets you set the width of the gantt part, in percentage, with respect to the whole chart.
    * ganttLineColor='Hex Color': Using this attribute, you can set the color of the lines running through the Gantt chart as background.
    * ganttLineThickness='Numerical Value': Using this attribute, you can set the thickness of the lines running through the Gantt chart as background.
    * ganttLineAlpha='Numerical Value 0-100': Using this attribute, you can set the alpha (transparency) of the lines running through the Gantt chart as background.

Data Table Properties

    * gridBorderColor='Hex Color': This attribute sets the color of the border of data table (which shows the process names and additional information).
    * gridBorderAlpha='Numerical Value 0-100': This attribute sets the alpha of the border of data table (which shows the process names and additional information).
    * gridResizeBarColor='Hex Color': If you show two columns of information in the data table, you'll find that the data table is draggable i.e., you can resize each of the columns using a resize bar. This attribute helps you set the color of that resize bar.
    * gridResizeBarThickness='Numeric Value': This attribute helps you set the thickness of the resize bar.
    * gridResizeBarAlpha='Numeric Value 0-100': This attribute helps you set the alpha of the resize bar.

Font Properties

    * baseFont='FontName': This attribute sets the base font family of the chart font which lies on the canvas i.e., all the values and the names in the chart which lie on the canvas will be displayed using the font name provided here.
    * baseFontSize='FontSize': This attribute sets the base font size of the chart i.e., all the values and the names in the chart which lie on the canvas will be displayed using the font size provided here.
    * baseFontColor='HexColorCode': This attribute sets the base font color of the chart i.e., all the values and the names in the chart which lie on the canvas will be displayed using the font color provided here.

Hover Caption Properties

The hover caption is the tool tip which shows up when the user moves his mouse over a particular data item (column, line, pie, bar etc.).

    * showhovercap='1/0': Option whether to show/hide hover caption box.
    * hoverCapBgColor='HexColorCode': Background color of the hover caption box.
    * hoverCapBorderColor='HexColorCode': Border color of the hover caption box.
    * hoverCapSepChar='Char': The character specified as the value of this attribute separates the name and value displayed in the hover caption box.

*/ 
 
 
require_once("SHIN_Charts.php");


class SHIN_Charts_Gantt extends SHIN_Charts
{
    
    /**
    * list of charts that realize this class
    * 
    * @var array
    */
    private $chartList      =   array('gt' => "'Gantt'");
    
    /**
    * default chart
    * 
    * @var string
    */
    private $defaultChart   =   'gt';
    
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
        
        $data   =   "'<chart " . $this->getTagAttributes('chart') . ">";
        
        //add date section
        if(isset($_arr['categories']['date'])){
            $categoryData   =   $_arr['categories']['date'];
            if(isset($categoryData['data']) && count($categoryData['data']) > 0) {
                $data   .=  '<categories ' . (isset($categoryData['param']) ? $this->getTagAttributes('categories', $categoryData['param']) : $this->getTagAttributes('categories')) . '>';
                    foreach($categoryData['data'] as $value){
                        $data   .=  '<category ' . $this->getTagAttributes('category', $value) . ' />';
                    }
                $data   .=  '</categories>';
            }
        }
        
        //add month section
        if(isset($_arr['categories']['month'])){
            $categoryData   =   $_arr['categories']['month'];
            if(isset($categoryData['data']) && count($categoryData['data']) > 0) {
                $data   .=  '<categories ' . (isset($categoryData['param']) ? $this->getTagAttributes('categories', $categoryData['param']) : $this->getTagAttributes('categories')) . '>';
                    foreach($categoryData['data'] as $value){
                        $data   .=  '<category ' . $this->getTagAttributes('category', $value) . ' />';
                    }
                $data   .=  '</categories>';    
            }    
        }
        
        //add processes section
        if(isset($_arr['processes'])){
            $processesData   =   $_arr['processes'];
            if(isset($processesData['data']) && count($processesData['data']) > 0) {
                $data   .=  '<processes  ' . (isset($processesData['param']) ? $this->getTagAttributes('processes ', $processesData['param']) : $this->getTagAttributes('processes')) . '>';
                    foreach($processesData['data'] as $value){
                        $data   .=  '<process ' . $this->getTagAttributes('process', $value) . ' />';
                    }
                $data   .=  '</processes >';    
            }    
        }
        
        //add dataTable  section
        if(isset($_arr['datatable'])){
            $data   .=  '<dataTable ' . $this->getTagAttributes('dataTable') . '>';
            $data   .=  '<dataColumn ' . $this->getTagAttributes('dataColumn') . '>';
                if(count($_arr['datatable']) > 0){
                    foreach($_arr['datatable'] as $value){
                            $data   .=  '<text ' . $this->getTagAttributes('text', $value) . ' />';
                    }
                }    
            $data   .=  '</dataColumn>';    
            $data   .=  '</dataTable>';     
        }
        
        //add task section
        if(isset($_arr['tasks'])){
            $data   .=  '<tasks ' . $this->getTagAttributes('tasks') . '>';
                if(count($_arr['tasks']) > 0){
                    foreach($_arr['tasks'] as $value){
                        if(!isset($value['color'])){
                            $value['color'] =   $this->getRandomColor();
                        }
                        $data   .=  '<task ' . $this->getTagAttributes('task', $value) . ' />';
                    }
                }
            $data   .=  '</tasks>';
        }
        
        //add task connectors
        if(isset($_arr['connectors'])){
            $data   .=  '<connectors ' . $this->getTagAttributes('connectors') . '>';
                if(count($_arr['connectors']) > 0){
                    foreach($_arr['connectors'] as $value){
                        if(!isset($value['color'])){
                            $value['color'] =   $this->getRandomColor();
                        }
                        $data   .=  '<connector ' . $this->getTagAttributes('connector', $value) . ' />';
                    }
                }
            $data   .=  '</connectors>';
        }
        
        //add task milestones
        if(isset($_arr['milestones'])){
            $data   .=  '<milestones ' . $this->getTagAttributes('milestones') . '>';
                if(count($_arr['milestones']) > 0){
                    foreach($_arr['milestones'] as $value){
                        if(!isset($value['color'])){
                            $value['color'] =   $this->getRandomColor();
                        }
                        $data   .=  '<milestone ' . $this->getTagAttributes('milestone', $value) . ' />';
                    }
                }
            $data   .=  '</milestones>';
        }
          
        $data  .=   "</chart>'";
        
        self::init(array('data'=>$data));
        return;
    }
    
} // End of class 

/* End of file SHIN_Charts_Gantt.php */
/* Location: ./libraries/SHIN_Charts_Gantt.php */