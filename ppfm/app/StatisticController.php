<?php

require "CommonController.php"; 

class StatisticController extends CommonController {
    
    /**
    * user action
    */
    var $userAction =   null;
    
	/**
	* Constructor. Init statistic controller.
	*
	* @access public
	* @params NULL.
	* @return NULL.
	*/
    function __construct() {
	
        parent::__construct();
        
        $nedded_libs = array(
                            'models' => array(array('ppfm_statistic_model', 'ppfm_statistic_model')),
                            
                            'libs' => array(
                                'SHIN_Datatable',                                
                                'SHIN_Tabs',
                                'SHIN_Charts_Single',
                                'SHIN_Charts_Multi',
                            ),
                            
                            'help' => array('date', 'form', 'validate', 'array')
                         );
                         
        SHIN_Core::postInit($nedded_libs);

        SHIN_Core::$_libs['seo']->addToTitle(SHIN_Core::$_language->line('lng_label_ppfm_statistic'));
    }
	
	
	// Protected function ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	* 
	*
	* @access protected
	* @params NULL.
	* @return array.
	*/
	protected function _category_year_summary_action($data=null)
	{   
		$fromSession  = SHIN_Core::$_libs['session']->userdata('categoryYearSummaryActionFrom');
		$toSession    = SHIN_Core::$_libs['session']->userdata('categoryYearSummaryActionTo');
                
		$categoryYearSummaryData = SHIN_Core::$_models['ppfm_statistic_model']->categoryYearSummary($fromSession, $toSession);
                
		// save active tab state
        if($this->userAction == 'category_year_summary_action') {
		    SHIN_Core::$_libs['session']->set_userdata('category_tab', 'category_tab_1');
        }
		SHIN_Core::$_libs['templater']->assign('category_tab', SHIN_Core::$_libs['session']->userdata('category_tab'));
        
        return $categoryYearSummaryData; 
	}
	

	/**
	* 
	*
	* @access protected
	* @params NULL.
	* @return array.
	*/
	protected function _category_monthly_summary_action($data=null)
	{
		$fromSession  = SHIN_Core::$_libs['session']->userdata('categoryMonthlySummaryActionFrom');
                
		$categoryMonthlySummaryData = SHIN_Core::$_models['ppfm_statistic_model']->categoryMonthlySummary($fromSession);
                
		// save active tab state
		if($this->userAction == 'category_monthly_summary_action') {
            SHIN_Core::$_libs['session']->set_userdata('category_tab', 'category_tab_2');
        }
		SHIN_Core::$_libs['templater']->assign('category_tab', SHIN_Core::$_libs['session']->userdata('category_tab'));
        
        return $categoryMonthlySummaryData; 		
	}
		
	/**
	* 
	*
	* @access protected
	* @params NULL.
	* @return array.
	*/
	protected function _category_year_situation_action($data=null)
	{
		$fromSession  = SHIN_Core::$_libs['session']->userdata('categoryDebitCreditYearSummaryActionFrom');
		$toSession    = SHIN_Core::$_libs['session']->userdata('categoryDebitCreditYearSummaryActionTo');
                
		$categoryDebitCreditYearSummaryData = SHIN_Core::$_models['ppfm_statistic_model']->yearDebitCreditSituation($fromSession, $toSession);
			
		// save active tab state
		if($this->userAction == 'category_year_situation_action') {
            SHIN_Core::$_libs['session']->set_userdata('category_tab', 'category_tab_3');
        }
		SHIN_Core::$_libs['templater']->assign('category_tab', SHIN_Core::$_libs['session']->userdata('category_tab'));
        
        return $categoryDebitCreditYearSummaryData;
	}
	
	/**
	* 
	*
	* @access protected
	* @params NULL.
	* @return array.
	*/
	protected function _category_month_situation_action($data=null)
	{            
		$fromSession  = SHIN_Core::$_libs['session']->userdata('categoryDebitCreditMonthlySummaryActionFrom');
                
		$categoryDebitCreditMonthlySummaryData = SHIN_Core::$_models['ppfm_statistic_model']->monthDebitCreditSituation($fromSession);
                
		// save active tab state
		if($this->userAction == 'category_month_situation_action') {
            SHIN_Core::$_libs['session']->set_userdata('category_tab', 'category_tab_4');
        }
		SHIN_Core::$_libs['templater']->assign('category_tab', SHIN_Core::$_libs['session']->userdata('category_tab'));
        
        return $categoryDebitCreditMonthlySummaryData;
	}
	
	/**
	* 
	*
	* @access protected
	* @params NULL.
	* @return array.
	*/
	protected function _holder_year_summary_action($data=null)
	{            
		$fromSession  = SHIN_Core::$_libs['session']->userdata('holderYearSummaryActionFrom');
		$toSession    = SHIN_Core::$_libs['session']->userdata('holderYearSummaryActionTo');
                    
		$holderYearSummaryData = SHIN_Core::$_models['ppfm_statistic_model']->holderYearSummary($fromSession, $toSession);
                
		// save active tab state
		if($this->userAction == 'holder_year_summary_action') {
            SHIN_Core::$_libs['session']->set_userdata('holder_tab', 'holder_tab_1');
        }
		SHIN_Core::$_libs['templater']->assign('holder_tab', SHIN_Core::$_libs['session']->userdata('holder_tab'));
        
        return $holderYearSummaryData; 
	}                
	
	/**
	* 
	*
	* @access protected
	* @params NULL.
	* @return array.
	*/
	protected function _holder_monthly_summary_action($data=null)
	{            
		$fromSession   = SHIN_Core::$_libs['session']->userdata('holderMonthlySummaryActionFrom');
                
		$holderMonthlySummaryData = SHIN_Core::$_models['ppfm_statistic_model']->holderMonthlySummary($fromSession);
                
		// save active tab state
		if($this->userAction == 'holder_monthly_summary_action') {
            SHIN_Core::$_libs['session']->set_userdata('holder_tab', 'holder_tab_2');
        }
		SHIN_Core::$_libs['templater']->assign('holder_tab', SHIN_Core::$_libs['session']->userdata('holder_tab'));
        
        return $holderMonthlySummaryData;
	}
		
	/**
	* 
	*
	* @access protected
	* @params NULL.
	* @return array.
	*/ 
	protected function _account_year_summary_action($data=null)
	{            
		$fromSession   = SHIN_Core::$_libs['session']->userdata('accountYearSummaryActionFrom');
		$toSession     = SHIN_Core::$_libs['session']->userdata('accountYearSummaryActionTo');
                    
		$accountYearSummaryData     = SHIN_Core::$_models['ppfm_statistic_model']->accountYearSummary($fromSession, $toSession);
        
		// save active tab state
		if($this->userAction == 'account_year_summary_action') {
            SHIN_Core::$_libs['session']->set_userdata('account_tab', 'account_tab_1');
        }
		SHIN_Core::$_libs['templater']->assign('account_tab', SHIN_Core::$_libs['session']->userdata('account_tab'));
        
        return $accountYearSummaryData; 
	}
             	
	/**
	* 
	*
	* @access protected
	* @params NULL.
	* @return array.
	*/ 
	protected function _account_monthly_summary_action($data=null)
	{            
		$fromSession   = SHIN_Core::$_libs['session']->userdata('accountMonthlySummaryActionFrom');
                    
		$accountMonthlySummaryData     = SHIN_Core::$_models['ppfm_statistic_model']->accountMonthlySummary($fromSession);
        
		// save active tab state
		if($this->userAction == 'account_monthly_summary_action') {
            SHIN_Core::$_libs['session']->set_userdata('account_tab', 'account_tab_2');
        }
		SHIN_Core::$_libs['templater']->assign('account_tab', SHIN_Core::$_libs['session']->userdata('account_tab'));
        
        return $accountMonthlySummaryData;                
	}	
	
	/**
	* 
	*
	* @access protected
	* @params NULL.
	* @return array.
	*/ 
	protected function _account_situation_action($data=null)
	{                        
		$accountSituationData       = SHIN_Core::$_models['ppfm_statistic_model']->accountSituation();
        
		// save active tab state
		SHIN_Core::$_libs['session']->set_userdata('account_situation', 'account_situation_tab_1');
        SHIN_Core::$_libs['templater']->assign('account_situation', SHIN_Core::$_libs['session']->userdata('account_situation'));
        
        return $accountSituationData;
	}
                	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	

    function index(){
        
        $from             =             SHIN_Core::$_input->post('from_date');
        $to               =             SHIN_Core::$_input->post('to_date');
        $this->userAction = $action =   SHIN_Core::$_input->post('action');
        
        //save input state
        $this->saveInputState($from, $to, $action);
                
        // default data
		$categoryYearSummaryData                = $this->_category_year_summary_action();
        $categoryMonthlySummaryData             = $this->_category_monthly_summary_action();
        $categoryDebitCreditYearSummaryData     = $this->_category_year_situation_action();
        $categoryDebitCreditMonthlySummaryData  = $this->_category_month_situation_action();
        
		$holderYearSummaryData                  = $this->_holder_year_summary_action();
        $holderMonthlySummaryData               = $this->_holder_monthly_summary_action();
                                      
		$accountYearSummaryData                 = $this->_account_year_summary_action();
        $accountMonthlySummaryData              = $this->_account_monthly_summary_action();
        
        $accountSituationData                   = $this->_account_situation_action();
        
        // ------------------------------------------------------- init charts data fo category  --------------------------------------------------------//
        
        // category year summary data
        $options    =   array('caption' => SHIN_Core::$_language->line('lng_label_default_chart_month'),
                              'xName'   => SHIN_Core::$_language->line('lng_label_statistic_category_year_xaxis'),
                              'yName'   => SHIN_Core::$_language->line('lng_label_statistic_category_year_yaxis'));
        $this->drawChart('#categoryYearSummaryColumn2d', 'multi', $options, $categoryYearSummaryData);
        
        
        // category monthly summary data
        $options    =   array('caption' => SHIN_Core::$_language->line('lng_label_statistic_category_monthly_summary'),
                              'xName'   => SHIN_Core::$_language->line('lng_label_statistic_category_year_xaxis'),
                              'yName'   => SHIN_Core::$_language->line('lng_label_statistic_category_year_yaxis'));
        $this->drawChart('#categoryMonthlySummaryColumn2d', 'multi', $options, $categoryMonthlySummaryData);
        
        // category debit/credit year data
        $options    =   array('caption' => SHIN_Core::$_language->line('lng_label_statistic_category_dc_year_situation'),
                              'xName'   => SHIN_Core::$_language->line('lng_label_statistic_category_dc_xaxis'),
                              'yName'   => SHIN_Core::$_language->line('lng_label_statistic_category_year_yaxis'));
        $this->drawChart('#categoryDebutCreditSummaryColumn2d', 'multi', $options, $categoryDebitCreditYearSummaryData);
        
        // category debit/credit monthly data
        $options    =   array('caption' => SHIN_Core::$_language->line('lng_label_statistic_category_dc_monthly_situation'),
                              'xName'   => SHIN_Core::$_language->line('lng_label_statistic_category_dc_xaxis'),
                              'yName'   => SHIN_Core::$_language->line('lng_label_statistic_category_year_yaxis'));
        $this->drawChart('#categoryDebutCreditMonthlySummaryColumn2d', 'multi', $options, $categoryDebitCreditMonthlySummaryData);
        
        // holder year summary data
        $options    =   array('caption' => SHIN_Core::$_language->line('lng_label_statistic_holder_year_situation'),
                              'xName'   => SHIN_Core::$_language->line('lng_label_statistic_holder_xaxis'),
                              'yName'   => SHIN_Core::$_language->line('lng_label_statistic_category_year_yaxis'));
        $this->drawChart('#holderYearSummaryColumn2d', 'multi', $options, $holderYearSummaryData);
        
        // holder monthly summary data
        $options    =   array('caption' => SHIN_Core::$_language->line('lng_label_statistic_holder_monthly_situation'),
                              'xName'   => SHIN_Core::$_language->line('lng_label_statistic_holder_xaxis2'),
                              'yName'   => SHIN_Core::$_language->line('lng_label_statistic_category_year_yaxis'));
        $this->drawChart('#holderMonthlySummaryColumn2d', 'multi', $options, $holderMonthlySummaryData);
        
        // account year summary data
        $options    =   array('caption' => SHIN_Core::$_language->line('lng_label_statistic_account_year_situation'),
                              'xName'   => SHIN_Core::$_language->line('lng_label_statistic_account_year_xaxis'),
                              'yName'   => SHIN_Core::$_language->line('lng_label_statistic_account_year_yaxis'));
        $this->drawChart('#accountYearSummaryColumn2d', 'multi', $options, $accountYearSummaryData);
        
        // account monthly summary data
        $options    =   array('caption' => SHIN_Core::$_language->line('lng_label_statistic_account_month_situation'),
                              'xName'   => SHIN_Core::$_language->line('lng_label_statistic_holder_xaxis2'),
                              'yName'   => SHIN_Core::$_language->line('lng_label_statistic_category_year_yaxis'));
        $this->drawChart('#accountMonthlySummaryColumn2d', 'multi', $options, $accountMonthlySummaryData);
        
        // account situation
        $options    =   array('caption' => SHIN_Core::$_language->line('lng_label_statistic_account_situation'),
                              'xName'   => SHIN_Core::$_language->line('lng_label_statistic_account_account'),
                              'yName'   => SHIN_Core::$_language->line('lng_label_statistic_category_year_yaxis'));
        $this->drawChart('#accountSituationColumn2d', 'single', $options, $accountSituationData);
        // ------------------------------------------------------- init charts data fo category --------------------------------------------------------//
        
        
        // ------------------------------------------------------- init datatables for category --------------------------------------------------------//
        // category year summary data
        $dates  =   array_keys($categoryYearSummaryData);
        $this->drawDatable('categoryYearSummaryDatatable', $categoryYearSummaryData, array_merge(array(SHIN_Core::$_language->line('lng_label_statistic_page_datable_filed_name_1')), $dates), array_merge(array('cat'), $dates));
        
        // category monthly summary data
        $dates  =   array_keys($categoryMonthlySummaryData);
        $this->drawDatable('categoryMonthlySummaryDatatable', $categoryMonthlySummaryData, array_merge(array(SHIN_Core::$_language->line('lng_label_statistic_page_datable_filed_name_1')), $dates), array_merge(array('cat'), $dates));
        
        // category debit/credit year summary data
        $dates  =   array_keys($categoryDebitCreditYearSummaryData);
        $this->drawDatable('categoryDebitCreditYearSummaryDatatable', $categoryDebitCreditYearSummaryData, array_merge(array(SHIN_Core::$_language->line('lng_label_statistic_page_datable_filed_name_2')), $dates), array_merge(array('type'), $dates));
        
        // category debit/credit monthly summary data
        $dates  =   array_keys($categoryDebitCreditMonthlySummaryData);
        $this->drawDatable('categoryDebitCreditMonthlySummaryDatatable', $categoryDebitCreditMonthlySummaryData, array_merge(array(SHIN_Core::$_language->line('lng_label_statistic_page_datable_filed_name_2')), $dates), array_merge(array('type'), $dates));
        
        // holder year summary data
        $dates  =   array_keys($holderYearSummaryData);
        $this->drawDatable('holderYearSummaryDatatable', $holderYearSummaryData, array_merge(array(SHIN_Core::$_language->line('lng_label_statistic_page_datable_filed_name_3')), $dates), array_merge(array('holder'), $dates));
        
        // holder monthly summary data
        $dates  =   array_keys($holderMonthlySummaryData);
        $this->drawDatable('holderMonthlySummaryDatatable', $holderMonthlySummaryData, array_merge(array(SHIN_Core::$_language->line('lng_label_statistic_page_datable_filed_name_3')), $dates), array_merge(array('holder'), $dates));
        
        // account year summary data
        $dates  =   array_keys($accountYearSummaryData);
        $this->drawDatable('accountYearSummaryDatatable', $accountYearSummaryData, array_merge(array(SHIN_Core::$_language->line('lng_label_statistic_page_datable_filed_name_4')), $dates), array_merge(array('account'), $dates));
        
        // account year summary data
        $dates  =   array_keys($accountMonthlySummaryData);
        $this->drawDatable('accountMonthlySummaryDatatable', $accountMonthlySummaryData, array_merge(array(SHIN_Core::$_language->line('lng_label_statistic_page_datable_filed_name_4')), $dates), array_merge(array('account'), $dates));
        
        // account situation
        $dates  =   array();
        $this->drawDatable('accountSituationDatatable', $accountSituationData, array(SHIN_Core::$_language->line('lng_label_statistic_page_datable_filed_name_4'), SHIN_Core::$_language->line('lng_label_statistic_page_datable_filed_name_5')), array('account', 'amount'));
        
        
        // ------------------------------------------------------- init datatables for category --------------------------------------------------------//
        
        // category tabs
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('category_tabs'));
        // holder tabs
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('holder_tabs'));
        // account tabs
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('account_tabs'));
        // account situation tabs
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('account_situation'));
        
        // init years array
        SHIN_Core::$_libs['templater']->assign('yearList', range(2008, 2020, 1));
        
        return 'statistic.tpl';
    }
    
    /**
    * draw chart for each tab
    * 
    * @param string $containerId  - DOM chart container id
    * @param string $type  - chart type can be single|multi
    * @param array $options - array of options
    * @param array $dataIn - array of data
    * @return null
    */
    public function drawChart($containerId, $type = 'multi', $inOptions, $data) {
        
        $startColor = 556677;
        $yval       = array();
        
        $options['width']                               = 1100; 
        $options['height']                              = 300; 
        $options['tag']['graph']['caption']             = $inOptions['caption']; 
        $options['tag']['graph']['xAxisName']           = $inOptions['xName'];
        $options['tag']['graph']['subCaption']          = '""'; 
        $options['tag']['graph']['yAxisName']           = $inOptions['yName'];
        $options['tag']['graph']['decimalSeparator']    = '"' . SHIN_Core::$_config['lang']['currency_separator'] . '"';  
        $options['tag']['graph']['thousandSeparator']   = '"' . SHIN_Core::$_config['lang']['currency_separator'] . '"';
        $options['tag']['graph']['numberPrefix']        = '"' . SHIN_Core::$_config['lang']['currency'] . '"';
        
        if($type == 'multi') {
        
            foreach(current($data) as $key => $value) {
                $xval[]   = array('name' => $key);    
            }
            
            foreach($data as $key => $value) {
                foreach($value as $key2 => $value2) {
                    $yval[$key]['data'][] = array('value' => $value2, 
                                                  'color' => $startColor);
                    $yval[$key]['param']  = array('color' => $startColor);
                }
                
                $startColor +=1000;
            }
            
            $ch_data = array(
                                'type'              => 'c2d',
                                'xval'              => $xval,
                                'yval'              => $yval);
            
            $chart   = SHIN_Core::$_libs['charts_multi']->get_instance();
            
        } else {
            
            foreach(current($data) as $key => $value) {
                $xval[] = array('amount' => $value, 'account' => $key);    
            }
            
            $chart    = SHIN_Core::$_libs['charts_single']->get_instance();
            $ch_data  = array(
                                'type'  =>  'c2d',
                                'data'  =>  $xval,
                                'xval'  =>  'account',
                                'yval'  =>  'amount',
                             );
        }
        
                                             $chart->init($options);
                                             $chart->combinedInit($ch_data);
        SHIN_Core::$_jsmanager->addComponent($chart->render($containerId));
      
            
    }
    
    /**
    * report action for category year summary
    * @access public
    * @return null
    */
    public function categoryYearSummaryReportAction(){
        
        $xlsType      =   SHIN_Core::$_input->post('xls');
        $pdfType      =   SHIN_Core::$_input->post('pdf');
        
        $data         =   $this->_category_year_summary_action();
        $dates        =   array_keys($data);
                    
        if(!empty($xlsType)) {
            $this->makeXlsReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_category_year'), array_merge(array('Cat'), $dates), array_merge(array('cat'), $dates), $data);
        } else {
            $this->makePdfReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_category_year'), array_merge(array('Cat'), $dates), array_merge(array(60), array_fill(0, count($dates), 25)), array_merge(array('cat'), $dates), $data);
        }
    }
    
    /**
    * report action for category monthly summary
    * @access public
    * @return null
    */
    public function categoryMonthlySummaryReportAction(){
        
        $xlsType      =   SHIN_Core::$_input->post('xls');
        $pdfType      =   SHIN_Core::$_input->post('pdf');
        
        $data         =   $this->_category_monthly_summary_action();
        $dates        =   array_keys($data);
                    
        if(!empty($xlsType)) {
            $this->makeXlsReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_category_month'), array_merge(array('Cat'), $dates), array_merge(array('cat'), $dates), $data);
        } else {
            $this->makePdfReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_category_month'), array_merge(array('Cat'), $dates), array_merge(array(30), array_fill(0, count($dates), 20)), array_merge(array('cat'), $dates), $data);
        }
    }
    
    /**
    * report action for category year situation
    * @access public
    * @return null
    */
    public function categoryYearSituationReportAction(){
        
        $xlsType      =   SHIN_Core::$_input->post('xls');
        $pdfType      =   SHIN_Core::$_input->post('pdf');
        
        $data         =   $this->_category_year_situation_action();
        $dates        =   array_keys($data);
                    
        if(!empty($xlsType)) {
            $this->makeXlsReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_category_year_situation'), array_merge(array('Type'), $dates), array_merge(array('type'), $dates), $data);
        } else {
            $this->makePdfReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_category_year_situation'), array_merge(array('Type'), $dates), array_merge(array(60), array_fill(0, count($dates), 40)), array_merge(array('type'), $dates), $data);
        }
    }
    
    /**
    * report action for category month situation
    * @access public
    * @return null
    */
    public function categoryMonthSituationReportAction(){
        
        $xlsType      =   SHIN_Core::$_input->post('xls');
        $pdfType      =   SHIN_Core::$_input->post('pdf');
        
        $data         =   $this->_category_month_situation_action();
        $dates        =   array_keys($data);
                    
        if(!empty($xlsType)) {
            $this->makeXlsReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_category_month_situation'), array_merge(array('Type'), $dates), array_merge(array('type'), $dates), $data);
        } else {
            $this->makePdfReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_category_month_situation'), array_merge(array('Type'), $dates), array_merge(array(30), array_fill(0, count($dates), 20)), array_merge(array('type'), $dates), $data);
        }
    }
    
    /**
    * report action for holder year summary
    * @access public
    * @return null
    */
    public function holderYearSummaryReportAction(){
        
        $xlsType      =   SHIN_Core::$_input->post('xls');
        $pdfType      =   SHIN_Core::$_input->post('pdf');
        
        $data         =   $this->_holder_year_summary_action();
        $dates        =   array_keys($data);
                    
        if(!empty($xlsType)) {
            $this->makeXlsReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_holder_year'), array_merge(array('Holder'), $dates), array_merge(array('holder'), $dates), $data);
        } else {
            $this->makePdfReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_holder_year'), array_merge(array('Holder'), $dates), array_merge(array(60), array_fill(0, count($dates), 40)), array_merge(array('holder'), $dates), $data);
        }
    }
    
    /**
    * report action for holder monthly summary
    * @access public
    * @return null
    */
    public function holderMonthlySummaryReportAction(){
        
        $xlsType      =   SHIN_Core::$_input->post('xls');
        $pdfType      =   SHIN_Core::$_input->post('pdf');
        
        $data         =   $this->_holder_monthly_summary_action();
        $dates        =   array_keys($data);
                    
        if(!empty($xlsType)) {
            $this->makeXlsReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_holder_month'), array_merge(array('Holder'), $dates), array_merge(array('holder'), $dates), $data);
        } else {
            $this->makePdfReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_holder_month'), array_merge(array('Holder'), $dates), array_merge(array(30), array_fill(0, count($dates), 20)), array_merge(array('holder'), $dates), $data);
        }
    }
    
    /**
    * report action for action year summary
    * @access public
    * @return null
    */
    public function accountYearSummaryReportAction(){
        
        $xlsType      =   SHIN_Core::$_input->post('xls');
        $pdfType      =   SHIN_Core::$_input->post('pdf');
        
        $data         =   $this->_account_year_summary_action();
        $dates        =   array_keys($data);
                    
        if(!empty($xlsType)) {
            $this->makeXlsReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_account_year'), array_merge(array('Account'), $dates), array_merge(array('account'), $dates), $data);
        } else {
            $this->makePdfReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_account_year'), array_merge(array('Account'), $dates), array_merge(array(60), array_fill(0, count($dates), 40)), array_merge(array('account'), $dates), $data);
        }
    }
    
    /**
    * report action for action monthly summary
    * @access public
    * @return null
    */
    public function accountMonthlySummaryReportAction(){
        
        $xlsType      =   SHIN_Core::$_input->post('xls');
        $pdfType      =   SHIN_Core::$_input->post('pdf');
        
        $data         =   $this->_account_monthly_summary_action();
        $dates        =   array_keys($data);
                    
        if(!empty($xlsType)) {
            $this->makeXlsReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_account_month'), array_merge(array('Account'), $dates), array_merge(array('account'), $dates), $data);
        } else {
            $this->makePdfReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_account_month'), array_merge(array('Account'), $dates), array_merge(array(30), array_fill(0, count($dates), 20)), array_merge(array('account'), $dates), $data);
        }
    }
    
    /**
    * report action for action year situation
    * @access public
    * @return null
    */
    public function accountSituationReportAction(){
        
        $xlsType      =   SHIN_Core::$_input->post('xls');
        $pdfType      =   SHIN_Core::$_input->post('pdf');
        
        $data         =   $this->_account_situation_action();
        $dates        =   array_keys($data);
                    
        if(!empty($xlsType)) {
            $this->makeXlsReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_account_situation'), array('Account', 'Total Amount'), array('account', 'amount'), $data);
        } else {
            $this->makePdfReport(SHIN_Core::$_language->line('lng_label_statistic_report_file_name_account_situation'), array('Account', 'Total Amount'), array(60, 100), array('account', 'amount'), $data);
        }
    }
    
    /**
    * draw datatable
    * 
    * @param string $id - DOM container id
    * @param array $tableData - array of the data
    * @param array $columnNames - column names
    * @param array $columns - columns indexes
    * @access protected
    * @return null
    */
    protected function drawDatable($id, $tableData, $columnNames, $columns){
        
        $dt = SHIN_Core::$_libs['datatable']->get_instance();
        
        $_element_id    = $id;
        $_tableclass    = 'display';
        $_dom_element   = $id;
        $_css_column    = 'gradeC';
        $_display_data  = array();
        $_table_data    = $columnNames;
        
        // fetch needed data for visualization
        if(!empty($tableData)) {
            $headers = array_keys(current($tableData));
            foreach($headers as $header) {
                $dataColumn = array($header);
                foreach($tableData as $data) {
                    if(!empty($data[$header])) {
                        array_push($dataColumn, $data[$header]);
                    } else {
                        array_push($dataColumn, 0);    
                    }        
                }
                array_push($_display_data, array('csscolumn'=>$_css_column, 'datacolumn' => $dataColumn));
            }
        }
        
        $dt->setLanguage(SHIN_Core::$_current_lang);
        $dt->initDOMStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);    
        SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
            
    }
    
    /**
    * generate PDF reports
    * 
    * @param string $type - report name
    * @param array $headers - headers
    * @param array $columnSizes - column sizes
    * @param array $columnNames - column names
    * @param array $pdfData - data for report
    * @access protected
    * @return null
    */
    protected function makePdfReport($type, $headers, $columnSizes, $columnNames, $pdfData){
        
        // load needed component
        SHIN_Core::postInit(array('libs' => array('SHIN_Pdf')));
        
        SHIN_Core::$_libs['pdf']->SetFont('helvetica', '', 12);
        SHIN_Core::$_libs['pdf']->AddPage();
       
        if($pdfData) {
         
            // Colors, line width and bold font
            SHIN_Core::$_libs['pdf']->SetFillColor(255, 0, 0);
            SHIN_Core::$_libs['pdf']->SetTextColor(255);
            SHIN_Core::$_libs['pdf']->SetDrawColor(128, 0, 0);
            SHIN_Core::$_libs['pdf']->SetLineWidth(0.3);
            SHIN_Core::$_libs['pdf']->SetFont('', 'B');
        
            // draw header
            $numHeaders = count($headers);
            for($i = 0; $i < $numHeaders; ++$i) {
                SHIN_Core::$_libs['pdf']->Cell($columnSizes[$i], 7, $headers[$i], 1, 0, 'C', 1);
            }
            
            // draw data
            SHIN_Core::$_libs['pdf']->Ln();
            // Color and font restoration
            SHIN_Core::$_libs['pdf']->SetFillColor(224, 235, 255);
            SHIN_Core::$_libs['pdf']->SetTextColor(0);
            SHIN_Core::$_libs['pdf']->SetFont('');
            
            $fill    = 0;
            $headers = array_keys(current($pdfData));
            if($headers) {
                foreach($headers as $header) {
                    $column = 0;
                    SHIN_Core::$_libs['pdf']->Cell($columnSizes[$column], 6, $header, 'LR', 0, 'L', $fill);
                    $column++;
                    foreach($pdfData as $data) {
                        if(!empty($data[$header])) {
                            SHIN_Core::$_libs['pdf']->Cell($columnSizes[$column], 6, $data[$header], 'LR', 0, 'L', $fill);
                        } else {
                            SHIN_Core::$_libs['pdf']->Cell($columnSizes[$column], 6, 0, 'LR', 0, 'L', $fill);    
                        }
                        $column++;        
                    }
                    SHIN_Core::$_libs['pdf']->Ln();
                }
            }
        
            // draw table footer
            SHIN_Core::$_libs['pdf']->Cell(array_sum($columnSizes), 0, '', 'T');
        }

        SHIN_Core::$_libs['pdf']->Output($type . '_' . date('YmdHis') . '.pdf', 'D');
        exit;
    }
    
    /**
    * generate XLS report
    * 
    * @param string $type - report name
    * @param array $headers - headers
    * @param array $columns - columns list
    * @param array $reportData - data for report
    * @access proteced
    * @return null
    */
    protected function makeXlsReport($type, $headers, $columns, $reportData){
        // loaded needed component
        SHIN_Core::postInit(array('libs' => array('SHIN_Xls')));
        
        $objPHPExcel = SHIN_Core::$_libs['xls'];
        $objPHPExcel->setActiveSheetIndex(0);
        
        if($reportData) {
            //draw header
            $columnName = 'A';
            foreach($headers as $header) {
                $objPHPExcel->set_cell_value($columnName . '1', $header);
                
                $columnName++;
            }
            
            
            //draw data
            $cellPointer = 2;
            $headers     = array_keys(current($reportData));
            foreach($headers as $header) {
                $columnName = 'A';
                $objPHPExcel->set_cell_value($columnName . $cellPointer, $header);
                $columnName++;
                foreach($reportData as $data) {
                    if(!empty($data[$header])) {
                        $objPHPExcel->set_cell_value($columnName . $cellPointer, $data[$header]);
                    } else {
                        $objPHPExcel->set_cell_value($columnName . $cellPointer, 0);    
                    }
                    $columnName++;        
                }
                $cellPointer++;
            }
        }
        
        $objPHPExcel->set_title('Statistic report');
        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
        $date      = date('YmdHis'); 
        $objWriter->save($type . '_' . $date . '.xls');
        header('Content-type: application/excel');
        header('Content-Disposition: attachment; filename="' . $type . '_' . $date . '.xls"');
        readfile($type . '_' . $date . '.xls');
        unlink($type . '_' . $date . '.xls');
        exit;
    }
    
    /**
    * save all state of each input
    * 
    * @param string $from - input FROM
    * @param string $to - input TO
    * @param string $tab - tab id
    * @access protected
    * @return null
    */
    protected function saveInputState($from, $to, $tab){
        
        // category year 
        $fromSession = SHIN_Core::$_libs['session']->userdata('categoryYearSummaryActionFrom');
        $toSession   = SHIN_Core::$_libs['session']->userdata('categoryYearSummaryActionTo');
        
        if(empty($fromSession) || empty($toSession)) {
            SHIN_Core::$_libs['session']->set_userdata('categoryYearSummaryActionFrom', date('Y'));    
            SHIN_Core::$_libs['session']->set_userdata('categoryYearSummaryActionTo',   date('Y'));    
        
            SHIN_Core::$_libs['templater']->assign('categoryYearSummaryActionFrom', date('Y'));
            SHIN_Core::$_libs['templater']->assign('categoryYearSummaryActionTo',   date('Y'));
        } else {
            SHIN_Core::$_libs['templater']->assign('categoryYearSummaryActionFrom', $fromSession);
            SHIN_Core::$_libs['templater']->assign('categoryYearSummaryActionTo',   $toSession);
        }
        
        // category monthly
        $fromSession = SHIN_Core::$_libs['session']->userdata('categoryMonthlySummaryActionFrom');
        
        if(empty($fromSession) || empty($toSession)) {
            SHIN_Core::$_libs['session']->set_userdata('categoryMonthlySummaryActionFrom', date('Y'));    
            
            SHIN_Core::$_libs['templater']->assign('categoryMonthlySummaryActionFrom', date('Y'));
        } else {
            SHIN_Core::$_libs['templater']->assign('categoryMonthlySummaryActionFrom', $fromSession);
        }
        
        // category year debit/credit
        $fromSession = SHIN_Core::$_libs['session']->userdata('categoryDebitCreditYearSummaryActionFrom');
        $toSession   = SHIN_Core::$_libs['session']->userdata('categoryDebitCreditYearSummaryActionTo');
        
        if(empty($fromSession) || empty($toSession)) {
            SHIN_Core::$_libs['session']->set_userdata('categoryDebitCreditYearSummaryActionFrom', date('Y'));    
            SHIN_Core::$_libs['session']->set_userdata('categoryDebitCreditYearSummaryActionTo',   date('Y'));    
        
            SHIN_Core::$_libs['templater']->assign('categoryDebitCreditYearSummaryActionFrom', date('Y'));
            SHIN_Core::$_libs['templater']->assign('categoryDebitCreditYearSummaryActionTo',   date('Y'));
        } else {
            SHIN_Core::$_libs['templater']->assign('categoryDebitCreditYearSummaryActionFrom', $fromSession);
            SHIN_Core::$_libs['templater']->assign('categoryDebitCreditYearSummaryActionTo',   $toSession);
        }
        
        // category monthly debit/credit
        $fromSession = SHIN_Core::$_libs['session']->userdata('categoryDebitCreditMonthlySummaryActionFrom');
        
        if(empty($fromSession) || empty($toSession)) {
            SHIN_Core::$_libs['session']->set_userdata('categoryDebitCreditMonthlySummaryActionFrom', date('Y'));    
            
            SHIN_Core::$_libs['templater']->assign('categoryDebitCreditMonthlySummaryActionFrom', date('Y'));
        } else {
            SHIN_Core::$_libs['templater']->assign('categoryDebitCreditMonthlySummaryActionFrom', $fromSession);
        }
        
        // holder year
        $fromSession = SHIN_Core::$_libs['session']->userdata('holderYearSummaryActionFrom');
        $toSession   = SHIN_Core::$_libs['session']->userdata('holderYearSummaryActionTo');
        
        if(empty($fromSession) || empty($toSession)) {
            SHIN_Core::$_libs['session']->set_userdata('holderYearSummaryActionFrom', date('Y'));    
            SHIN_Core::$_libs['session']->set_userdata('holderYearSummaryActionTo',   date('Y'));    
        
            SHIN_Core::$_libs['templater']->assign('holderYearSummaryActionFrom', date('Y'));
            SHIN_Core::$_libs['templater']->assign('holderYearSummaryActionTo',   date('Y'));
        } else {
            SHIN_Core::$_libs['templater']->assign('holderYearSummaryActionFrom', $fromSession);
            SHIN_Core::$_libs['templater']->assign('holderYearSummaryActionTo',   $toSession);
        }
        
        // holder monthly
        $fromSession   = SHIN_Core::$_libs['session']->userdata('holderMonthlySummaryActionFrom');
                
        if(empty($fromSession) || empty($toSession)) {
            SHIN_Core::$_libs['session']->set_userdata('holderMonthlySummaryActionFrom', date('Y'));    
            
            SHIN_Core::$_libs['templater']->assign('holderMonthlySummaryActionFrom', date('Y'));
        } else {
            SHIN_Core::$_libs['templater']->assign('holderMonthlySummaryActionFrom', $fromSession);
        }
        
        // account year
        $fromSession   = SHIN_Core::$_libs['session']->userdata('accountYearSummaryActionFrom');
        $toSession     = SHIN_Core::$_libs['session']->userdata('accountYearSummaryActionTo');
                        
        if(empty($fromSession) || empty($toSession)) {
            SHIN_Core::$_libs['session']->set_userdata('accountYearSummaryActionFrom', date('Y'));    
            SHIN_Core::$_libs['session']->set_userdata('accountYearSummaryActionTo',   date('Y'));    
        
            SHIN_Core::$_libs['templater']->assign('accountYearSummaryActionFrom', date('Y'));
            SHIN_Core::$_libs['templater']->assign('accountYearSummaryActionTo',   date('Y'));
        } else {
            SHIN_Core::$_libs['templater']->assign('accountYearSummaryActionFrom', $fromSession);
            SHIN_Core::$_libs['templater']->assign('accountYearSummaryActionTo',   $toSession);
        }
        
        // account monthly
        $fromSession   = SHIN_Core::$_libs['session']->userdata('accountMonthlySummaryActionFrom');
                        
        if(empty($fromSession) || empty($toSession)) {
            SHIN_Core::$_libs['session']->set_userdata('accountMonthlySummaryActionFrom', date('Y'));    
            
            SHIN_Core::$_libs['templater']->assign('accountMonthlySummaryActionFrom', date('Y'));
        } else {
            SHIN_Core::$_libs['templater']->assign('accountMonthlySummaryActionFrom', $fromSession);
        }
        
        // account situation
        $fromSession   = SHIN_Core::$_libs['session']->userdata('accountSituationFrom');
        $toSession     = SHIN_Core::$_libs['session']->userdata('accountSituationTo');
                                
        if(empty($fromSession) || empty($toSession)) {
            SHIN_Core::$_libs['session']->set_userdata('accountSituationFrom', date('Y'));    
            SHIN_Core::$_libs['session']->set_userdata('accountSituationTo',   date('Y'));    
        
            SHIN_Core::$_libs['templater']->assign('accountSituationFrom', date('Y'));
            SHIN_Core::$_libs['templater']->assign('accountSituationTo',   date('Y'));
        } else {
            SHIN_Core::$_libs['templater']->assign('accountSituationFrom', $fromSession);
            SHIN_Core::$_libs['templater']->assign('accountSituationTo',   $toSession);
        }
                
        switch($tab){
            case 'category_year_summary_action':
                
                $fromSession = SHIN_Core::$_libs['session']->userdata('categoryYearSummaryActionFrom');
                $toSession   = SHIN_Core::$_libs['session']->userdata('categoryYearSummaryActionTo');
                
                if($fromSession != $from || $toSession != $to) {
                    SHIN_Core::$_libs['session']->set_userdata('categoryYearSummaryActionFrom', $from);    
                    SHIN_Core::$_libs['session']->set_userdata('categoryYearSummaryActionTo',   $to);
                }
                
                SHIN_Core::$_libs['templater']->assign('categoryYearSummaryActionFrom', $from);
                SHIN_Core::$_libs['templater']->assign('categoryYearSummaryActionTo',   $to);    
                
                break;
            case 'category_monthly_summary_action':
            
                $fromSession = SHIN_Core::$_libs['session']->userdata('categoryMonthlySummaryActionFrom');
                
                if($fromSession != $from || $toSession != $to) {
                    SHIN_Core::$_libs['session']->set_userdata('categoryMonthlySummaryActionFrom', $from);    
                }
                
                SHIN_Core::$_libs['templater']->assign('categoryMonthlySummaryActionFrom', $from);
                
                break;
            case 'category_year_situation_action':
                
                $fromSession = SHIN_Core::$_libs['session']->userdata('categoryDebitCreditYearSummaryActionFrom');
                $toSession   = SHIN_Core::$_libs['session']->userdata('categoryDebitCreditYearSummaryActionTo');
                
                if($fromSession != $from || $toSession != $to) {
                    SHIN_Core::$_libs['session']->set_userdata('categoryDebitCreditYearSummaryActionFrom', $from);    
                    SHIN_Core::$_libs['session']->set_userdata('categoryDebitCreditYearSummaryActionTo',   $to);
                }
                
                SHIN_Core::$_libs['templater']->assign('categoryDebitCreditYearSummaryActionFrom', $from);
                SHIN_Core::$_libs['templater']->assign('categoryDebitCreditYearSummaryActionTo',   $to);
                
                break;
            case 'category_month_situation_action':
                
                $fromSession = SHIN_Core::$_libs['session']->userdata('categoryDebitCreditMonthlySummaryActionFrom');
                
                if($fromSession != $from || $toSession != $to) {
                    SHIN_Core::$_libs['session']->set_userdata('categoryDebitCreditMonthlySummaryActionFrom', $from);    
                }
                
                SHIN_Core::$_libs['templater']->assign('categoryDebitCreditMonthlySummaryActionFrom', $from);
                
                break;
            case 'holder_year_summary_action':
                
                $fromSession = SHIN_Core::$_libs['session']->userdata('holderYearSummaryActionFrom');
                $toSession   = SHIN_Core::$_libs['session']->userdata('holderYearSummaryActionTo');
                
                if($fromSession != $from || $toSession != $to) {
                    SHIN_Core::$_libs['session']->set_userdata('holderYearSummaryActionFrom', $from);    
                    SHIN_Core::$_libs['session']->set_userdata('holderYearSummaryActionTo',   $to);
                }
                
                SHIN_Core::$_libs['templater']->assign('holderYearSummaryActionFrom', $from);
                SHIN_Core::$_libs['templater']->assign('holderYearSummaryActionTo',   $to);
                
                break;
            case 'holder_monthly_summary_action':
                
                $fromSession = SHIN_Core::$_libs['session']->userdata('holderMonthlySummaryActionFrom');
                
                if($fromSession != $from || $toSession != $to) {
                    SHIN_Core::$_libs['session']->set_userdata('holderMonthlySummaryActionFrom', $from);    
                }
                
                SHIN_Core::$_libs['templater']->assign('holderMonthlySummaryActionFrom', $from);
                
                break;
            case 'account_year_summary_action':
                
                $fromSession = SHIN_Core::$_libs['session']->userdata('accountYearSummaryActionFrom');
                $toSession   = SHIN_Core::$_libs['session']->userdata('accountYearSummaryActionTo');
                
                if($fromSession != $from || $toSession != $to) {
                    SHIN_Core::$_libs['session']->set_userdata('accountYearSummaryActionFrom', $from);    
                    SHIN_Core::$_libs['session']->set_userdata('accountYearSummaryActionTo',   $to);
                }
                
                SHIN_Core::$_libs['templater']->assign('accountYearSummaryActionFrom', $from);
                SHIN_Core::$_libs['templater']->assign('accountYearSummaryActionTo',   $to);
                
                break;
            case 'account_monthly_summary_action':
                
                $fromSession = SHIN_Core::$_libs['session']->userdata('accountMonthlySummaryActionFrom');
                
                if($fromSession != $from || $toSession != $to) {
                    SHIN_Core::$_libs['session']->set_userdata('accountMonthlySummaryActionFrom', $from);    
                }
                
                SHIN_Core::$_libs['templater']->assign('accountMonthlySummaryActionFrom', $from);
                
                break;
        }
            
    }
}


?>
