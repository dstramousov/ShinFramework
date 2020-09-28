<?php

require "CommonController.php";

class DefaultController extends CommonController {
    
    function __construct()
	{
        parent::__construct();
		
		$nedded_libs = array(
							'models' => array(
								array('ppfm_statistic_model', 'ppfm_statistic_model'),
								array('ppfm_entry_model', 'ppfm_entry_model'),
								array('ppfm_todolist_model', 'ppfm_todolist_model'),
								array('ppfm_todolistitem_model', 'ppfm_todolistitem_model'),
								array('ppfm_panel_model', 'ppfm_panel_model'),
								array('sys_user_model', 'sys_user_model'),
                            ),
							
                            'libs' => array(
	                            'SHIN_Datatable',
								'SHIN_Dialog',
								'SHIN_Panels',
                                'SHIN_Charts_Multi',
                            ),
                            
                            'help' => array('date')
                         );
						 
		SHIN_Core::postInit($nedded_libs);
    }

    public function index(){
                
        // init P1 chart
        $categoryYearSummaryData    = SHIN_Core::$_models['ppfm_statistic_model']->categoryYearSummary(date('Y'), date('Y'));
        $yval       = array();
        $xval       = array();
        $startColor = 556677;
        foreach($categoryYearSummaryData as $data) {
            foreach($data as $cat => $amount) {
                $xval[]   = array('name' => $cat);    
            }
            break;
        }
       
        foreach($categoryYearSummaryData as $year => $data) {
            foreach($data as $cat => $amount) {
                $yval[$year]['data'][] = array('value' => $amount, 'color' => $startColor);
                $yval[$year]['param']  = array('color' => $startColor);
            }
            
            $startColor +=2000;
        }
        
        $data            = array(
                                    'type'  =>  'c3d',
                                    'xval'  =>  $xval,
                                    'yval'  =>  $yval
                                );
                                
        $options = array('width'    => 550,
                         'height'   => 350);
        
        $options['tag']['graph']['caption']             = SHIN_Core::$_language->line('lng_label_default_chart_year');
        $options['tag']['graph']['xAxisName']           = SHIN_Core::$_language->line('lng_label_default_chart_xaxis');
        $options['tag']['graph']['subCaption']          = '""'; 
        $options['tag']['graph']['yAxisName']           = SHIN_Core::$_language->line('lng_label_default_chart_yaxis');
        $options['tag']['graph']['decimalSeparator']    = '"' . SHIN_Core::$_config['lang']['currency_separator'] . '"';  
        $options['tag']['graph']['thousandSeparator']   = '"' . SHIN_Core::$_config['lang']['currency_separator'] . '"';
        $options['tag']['graph']['numberPrefix']        = '"' . SHIN_Core::$_config['lang']['currency'] . '"';
        
        
        $multiCharts     = SHIN_Core::$_libs['charts_multi']->get_instance();                
        
        $multiCharts->init($options);
        $multiCharts->combinedInit($data);
        
        SHIN_Core::$_jsmanager->addComponent($multiCharts->render('#p1c')); 
        
        // init P2 chart
        $categoryMonthlySummaryData    = SHIN_Core::$_models['ppfm_statistic_model']->categoryCurrentMonthSummary(date('n'));
        
        $yval       = array();
        $xval       = array();
        $startColor = 556677;
        foreach($categoryMonthlySummaryData as $data) {
            foreach($data as $cat => $amount) {
                $xval[]   = array('name' => $cat);    
            }
            break;
        }
       
        foreach($categoryMonthlySummaryData as $year => $data) {
            foreach($data as $cat => $amount) {
                $yval[$year]['data'][] = array('value' => $amount, 'color' => $startColor);
                $yval[$year]['param']  = array('color' => $startColor);
            }
            
            $startColor +=2000;
        }
        
        $data            = array(
                                    'type'  =>  'c3d',
                                    'xval'  =>  $xval,
                                    'yval'  =>  $yval);
                                    
        $options = array('width'    => 550,
                         'height'   => 350);
        
        $options['tag']['graph']['caption']             = SHIN_Core::$_language->line('lng_label_default_chart_month'); 
        $options['tag']['graph']['xAxisName']           = SHIN_Core::$_language->line('lng_label_default_chart_xaxis');
        $options['tag']['graph']['subCaption']          = '""'; 
        $options['tag']['graph']['yAxisName']           = SHIN_Core::$_language->line('lng_label_default_chart_yaxis');
        $options['tag']['graph']['decimalSeparator']    = '"' . SHIN_Core::$_config['lang']['currency_separator'] . '"';  
        $options['tag']['graph']['thousandSeparator']   = '"' . SHIN_Core::$_config['lang']['currency_separator'] . '"';
        $options['tag']['graph']['numberPrefix']        = '"' . SHIN_Core::$_config['lang']['currency'] . '"';
        
        
        $multiCharts     = SHIN_Core::$_libs['charts_multi']->get_instance();                
        
        $multiCharts->init($options);
        $multiCharts->combinedInit($data);
        
        SHIN_Core::$_jsmanager->addComponent($multiCharts->render('#p2c'));
        
        // init P3 data
        $entryData      =   SHIN_Core::$_models['ppfm_entry_model']->getLastTenRecords();
        
        // init P4 data
        $todoListData   =    SHIN_Core::$_models['ppfm_todolist_model']->getOpenedItems();
        
        // transfer data into view
        SHIN_Core::$_libs['templater']->assign('entryData', $entryData);
        SHIN_Core::$_libs['templater']->assign('todoListData', $todoListData);
        
        // add panels list
        $panels     = SHIN_Core::$_libs['panels']->get_instance();
        
        $panelData        = array();
        $panelData['p1']  = '<div id="p1c"></div>';
        $panelData['p2']  = '<div id="p2c"></div>'; 
        $panelData['p3']  = '<div id="p3c">' . SHIN_Core::$_libs['templater']->setBlock('main_entrylist') . '</div>'; 
        $panelData['p4']  = '<div id="p4c">' . SHIN_Core::$_libs['templater']->setBlock('main_todolist') . '</div>'; 
        
        $panelParams      = SHIN_Core::$_models['ppfm_panel_model']->getPanelParams();
        
        $options    = array('ajax_url'      => SHIN_Core::$_config['core']['app_base_url'] . '/main/savePanelState',
                            'model_name'    => 'ppfm_panel_model');
        
        $panels->init($options);  
        $panels->setPanelData('panelList', $panelParams, $panelData);
        
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['panels']->render());
        
    	return 'index.tpl';
    }
    
    
    public function savePanelState(){
        
        $modelName =   SHIN_Core::$_input->post('model_name');
        
        $nedded_libs = array(
                            'models' => array(
                                array($modelName, $modelName)
                            ));
                         
        SHIN_Core::postInit($nedded_libs);
         
        $jsonData  =   json_decode(stripslashes(SHIN_Core::$_input->post('data')));
        
        if(!empty($jsonData)) {
              foreach($jsonData->items as $item){
                $data   =   array('idPanel'             =>  $item->id,
                                  'collapsed'           =>  $item->collapsed,
                                  'order_menu'          =>  $item->order,
                                  'column_menu'         =>  $item->column,
                                  'color_class'         =>  $item->color,
                                  'color_border_class'  =>  $item->border,
                                  'color_bg_class'      =>  $item->bg,
                                  'maximized'           =>  $item->maximized,
                                  'style'               =>  $item->style);  
                
                if(!$item->closed) {
                    SHIN_Core::$_models[$modelName]->updateState($data);      
                } else {
                    SHIN_Core::$_models[$modelName]->removeWidget($item->id);    
                }  
              }
        }
        
        exit();    
    }
    
}


?>
