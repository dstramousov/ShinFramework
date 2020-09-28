<?php
/**
 * ShinPHP Demo part
 *
 * This demo show how work with Charts.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	Charts
 * @author		
 * @link		
 */
    // include main fw file
    require_once("../shinfw/shinfw.php");
    // array of libs, models, helpers, core components
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'array', 'date'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_JSManager',
                                'SHIN_CSSManager',
	                            'SHIN_Database',
                                'SHIN_Input'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Charts_Single',
                                'SHIN_Charts_Multi',
                                'SHIN_Charts_Stacked',
                                'SHIN_Charts_Combination',
                                'SHIN_Charts_Funnel',
                                'SHIN_Charts_Financial',
                                'SHIN_Charts_Gantt',
                                'SHIN_Datepicker'
                            ),
                         );

    // init fw core using needed components
    SHIN_Core::init($nedded_libs);

    // get instance of templater component
    $page            = SHIN_Core::$_libs['templater']->get_instance();
    
    // single-series charts
    $singleCharts    = SHIN_Core::$_libs['charts_single']->get_instance();
    // multi-serise charts
    $multiCharts     = SHIN_Core::$_libs['charts_multi']->get_instance();
    // stacked charts
    $stackedCharts   = SHIN_Core::$_libs['charts_stacked']->get_instance();
    // combined charts
    $combinedCharts  = SHIN_Core::$_libs['charts_combination']->get_instance();
    // funnel charts
    $funnelCharts    = SHIN_Core::$_libs['charts_funnel']->get_instance(); 
    // financial charts
    $financialCharts = SHIN_Core::$_libs['charts_financial']->get_instance();
    // gantt charts
    $ganttCharts     = SHIN_Core::$_libs['charts_gantt']->get_instance(); 

    if(param('mode')){
		$s = SHIN_Core::$_input->post('from'); 
        $e = SHIN_Core::$_input->post('to');
	} else {
		$s = date(date('n')-1 . '/01/2010');$e = date('n/d/Y');
	}
	$page->assign('datefrom', $s);
	$page->assign('dateto', $e);

    $interval_array = splitinterval_by_month($s, $e);
    
	// get test data from table examples_file_tracking
	$_ret = array();

	foreach($interval_array as $interval)
    {
            list($begin_date, $end_date) = preg_split('/,/', $interval);
            $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('SELECT sum(count) as summ, MONTHNAME(created) as monthname, YEAR(created) as year FROM examples_file_tracking WHERE DATE(created) BETWEEN '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($begin_date).' AND '.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($end_date) . ' GROUP BY count');
			
            foreach ($query->result_array() as $row) {
                if(isset($row['summ'])){
                    if($row['summ']){
                        array_push($_ret, $row);
                    } else {
                        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('SELECT MONTHNAME('.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($begin_date).') as monthname, YEAR('.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($begin_date).') as year');
                        $row = $query->row_array();
                        $row['summ'] = 0;
                        array_push($_ret, $row);
                    }
                }

                $query->free_result();
            }
            
	}
    
    //////////////////////////////////////////////////////

    // single-series charts - init general data for each chart
    $ch_data = array(
                        'type'  =>  'c2d',
						'data'  =>  $_ret,
						'xval'  =>  'year+monthname',
						'yval'  =>  'summ',
					);
    $options['tag']['graph']['caption']     = '"Test Caption"'; 
    $options['tag']['graph']['xAxisName']   = '"xAxis"'; 
    $options['tag']['graph']['yAxisName']   = '"yAxis"'; 
    
                                         $singleCharts->init($options);
                                         $singleCharts->combinedInit($ch_data);
    SHIN_Core::$_jsmanager->addComponent($singleCharts->render('#column2d'));
    
    // only change type of chart
                                         $singleCharts->combinedInit(array_merge($ch_data, array('type' => 'c3d')));
    SHIN_Core::$_jsmanager->addComponent($singleCharts->render('#column3d'));                                     
    
    // only change type of chart
                                         $singleCharts->combinedInit(array_merge($ch_data, array('type' => 'p2d')));
    SHIN_Core::$_jsmanager->addComponent($singleCharts->render('#pie2d'));
    
    // only change type of chart
                                         $singleCharts->combinedInit(array_merge($ch_data, array('type' => 'p3d')));
    SHIN_Core::$_jsmanager->addComponent($singleCharts->render('#pie3d'));
    
    // only change type of chart
                                         $singleCharts->combinedInit(array_merge($ch_data, array('type' => 'l2d')));
    SHIN_Core::$_jsmanager->addComponent($singleCharts->render('#line2d'));
    
    // only change type of chart
                                         $singleCharts->combinedInit(array_merge($ch_data, array('type' => 'b2d')));
    SHIN_Core::$_jsmanager->addComponent($singleCharts->render('#bar2d'));
    
    // only change type of chart
                                         $singleCharts->combinedInit(array_merge($ch_data, array('type' => 'a2d')));
    SHIN_Core::$_jsmanager->addComponent($singleCharts->render('#area2d'));
    
    // only change type of chart
                                         $singleCharts->combinedInit(array_merge($ch_data, array('type' => 'd2d')));
    SHIN_Core::$_jsmanager->addComponent($singleCharts->render('#doughnut2d'));
    
    
    
    
     // multi-series charts - test general data from multiseries charts
     $ch_data = array(
                        'type'              => 'c2d',
                        'xval'              =>  array(array('name' => 'Austria'),
                                                      array('name' => 'Brazil'), 
                                                      array('name' => 'France'), 
                                                      array('name' => 'Germany'), 
                                                      array('name' => 'USA')),
                        'yval'              =>  array('1996' => array('data'    =>  array(array('value' => '123'), 
                                                                                          array('value' => '345', 'color' => '123456'), 
                                                                                          array('value' => '456', 'color' => '123456'), 
                                                                                          array('value' => '567', 'color' => '123456'), 
                                                                                          array('value' => '12',  'color' => '123456')),
                                                                      'param'   =>  array('color' => '444444')                    
                                                                      ),
                                                      '1997' => array('data'    =>  array(array('value' => '333'), 
                                                                                          array('value' => '111', 'color' => '123456'), 
                                                                                          array('value' => '123', 'color' => '123456'), 
                                                                                          array('value' => '541', 'color' => '123456'), 
                                                                                          array('value' => '211', 'color' => '123456')),
                                                                      'param'   =>  array('color' => '666666')
                                                                      )
                                                      ) 
                    );
                    
    // only change type of chart                
                                         $multiCharts->combinedInit($ch_data);
    SHIN_Core::$_jsmanager->addComponent($multiCharts->render('#msColumn2D'));
    
    // only change type of chart                                     
                                         $multiCharts->combinedInit(array_merge($ch_data, array('type' => 'c3d')));
    SHIN_Core::$_jsmanager->addComponent($multiCharts->render('#msColumn3D'));
    
    // only change type of chart
                                         $multiCharts->combinedInit(array_merge($ch_data, array('type' => 'l2d')));
    SHIN_Core::$_jsmanager->addComponent($multiCharts->render('#msLine2D'));
    
    // only change type of chart
                                         $multiCharts->combinedInit(array_merge($ch_data, array('type' => 'a2d')));
    SHIN_Core::$_jsmanager->addComponent($multiCharts->render('#msArea2D'));
    
    // only change type of chart
                                         $multiCharts->combinedInit(array_merge($ch_data, array('type' => 'b2d')));
    SHIN_Core::$_jsmanager->addComponent($multiCharts->render('#msBar2D'));
    
    // stacked charts - test general data for stacked charts
    $ch_data = array(
                        'type'              => 'c2d',
                        'xval'              =>  array(array('name' => 'Austria'), 
                                                      array('name' => 'Brazil'), 
                                                      array('name' => 'France'), 
                                                      array('name' => 'Germany'), 
                                                      array('name' => 'USA')),
                        'yval'              =>  array('1996' => array('data'    =>  array(array('value' => '123'), 
                                                                                          array('value' => '345', 'color' => '123456') , 
                                                                                          array('value' => '456', 'color' => '123456'), 
                                                                                          array('value' => '567', 'color' => '123456'), 
                                                                                          array('value' => '12',  'color' => '123456'))
                                                                      ),
                                                      '1997' => array('data'    =>  array(array('value' => '34'), 
                                                                                          array('value' => '123', 'color' => '123456') , 
                                                                                          array('value' => '476', 'color' => '123456'), 
                                                                                          array('value' => '145', 'color' => '123456'), 
                                                                                          array('value' => '444', 'color' => '123456'))
                                                                      )
                                                      ),
                        'trends'            =>  array(array('startValue' => 124, 'endValue' => 456, 'color' => '123456', 'displayValue' => 'Trend 1', 'thickness' => 1),
                                                      array('startValue' => 333, 'endValue' => 444, 'color' => '0372AB', 'displayValue' => 'Trend 1', 'thickness' => 1))          
                    );
                    
    // only change type of chart
                                         $stackedCharts->combinedInit($ch_data);
    SHIN_Core::$_jsmanager->addComponent($stackedCharts->render('#sColumn2D'));
    
    // only change type of chart
                                         $stackedCharts->combinedInit(array_merge($ch_data, array('type' => 'c3d')));
    SHIN_Core::$_jsmanager->addComponent($stackedCharts->render('#sColumn3D'));
    
    // only change type of chart
                                         $stackedCharts->combinedInit(array_merge($ch_data, array('type' => 'a2d')));
    SHIN_Core::$_jsmanager->addComponent($stackedCharts->render('#sArea2D'));
    
    // only change type of chart
                                        $stackedCharts->combinedInit(array_merge($ch_data, array('type' => 'b2d')));
    SHIN_Core::$_jsmanager->addComponent($stackedCharts->render('#sBar2D'));
    

    $fromDate =   SHIN_Core::$_libs['datepicker']->get_instance();
    $fromDate->init(array('dateFormat' => 'n/d/Y'));
    SHIN_Core::$_jsmanager->addComponent($fromDate->render('datepicker_from'));
	$toDate   =   SHIN_Core::$_libs['datepicker']->get_instance();   
    $toDate->init(array('dateFormat' => 'n/d/Y'));
    SHIN_Core::$_jsmanager->addComponent($toDate->render('datepicker_to'));

    
    // combined charts - test general data for combined charts
    $ch_data = array(
                        'type'              => 'c2dldy',
                        'xval'              =>  array(array('name' => 'Austria'), 
                                                      array('name' => 'Brazil'),
                                                      array('name' => 'France'), 
                                                      array('name' => 'Germany'),
                                                      array('name' => 'USA')),
                        
                        'yval'              =>  array('1996' => array('data'    =>  array(array('value' => '123'), 
                                                                                          array('value' => '345', 'color' => '123456') , 
                                                                                          array('value' => '456', 'color' => '123456'), 
                                                                                          array('value' => '567', 'color' => '123456'), 
                                                                                          array('value' => '12',  'color' => '123456')),
                                                                      'param'   =>  array('parentYAxis' => 'S')),
                                                      '1997' => array('data'    =>  array(array('value' => '34'), 
                                                                                          array('value' => '123', 'color' => '123456') , 
                                                                                          array('value' => '476', 'color' => '123456'), 
                                                                                          array('value' => '145', 'color' => '123456'), 
                                                                                          array('value' => '444', 'color' => '123456')),
                                                                      'param'   =>  array('parentYAxis' => 'P'))
                                                     ) 
                    );
    
    // only change type of chart 
                                         $combinedCharts->combinedInit($ch_data);
    SHIN_Core::$_jsmanager->addComponent($combinedCharts->render('#MSColumn2DLineDY'));
    
    // only change type of chart
                                         $combinedCharts->combinedInit(array_merge($ch_data, array('type' => 'c3dldy')));
    SHIN_Core::$_jsmanager->addComponent($combinedCharts->render('#MSColumn3DLineDY'));
    
    // funnel charts - test general data for funnel charts
    $ch_data = array(
                        'type'  =>  'fn',
                        'data'  =>  $_ret,
                        'xval'  =>  'year+monthname',
                        'yval'  =>  'summ',
                    );
    
                                         $funnelCharts->combinedInit($ch_data);
    SHIN_Core::$_jsmanager->addComponent($funnelCharts->render('#funnel'));
    
    
    // financial charts - test general data for financial chart
    $ch_data = array(
                        'type'              => 'c2d',
                        'xval'              =>  array(array('Name' => '2004', 'xIndex' => 1, 'showLine' => 1), 
                                                      array('Name' => 'Feb',  'xIndex' => 2, 'showLine' => 1), 
                                                      array('Name' => 'March','xIndex' => 3, 'showLine' => 1), 
                                                      array('Name' => 'Split','xIndex' => 4, 'showLine' => 1), 
                                                      array('Name' => 'USA',  'xIndex' => 5, 'showLine' => 1)),
                        
                        'yval'              =>  array(array('open' => 92.57, 'high' => 93.79, 'low' => 92.45, 'close' => 93.39, 'xIndex' => 1, 'color' => '00AA00'),
                                                      array('open' => 92.4, 'high' => 92.7, 'low' => 91.42, 'close' => 92.45, 'xIndex' => 2, 'color' => '00AA00'),
                                                      array('open' => 92.6, 'high' => 92.69, 'low' => 90.88, 'close' => 91.82, 'xIndex' => 3, 'color' => '00AA00'),
                                                      array('open' => 92, 'high' => 93.38, 'low' => 91.68, 'close' => 93.3, 'xIndex' => 4, 'color' => '00AA00'),
                                                      array('open' => 92, 'high' => 92.98, 'low' => 91.15, 'close' => 91.21, 'xIndex' => 5)
                                                     ),
                        
                        'trends'            =>  array(array('startValue' => 124, 'endValue' => 456, 'color' => '123456', 'displayValue' => 'Trend 1', 'thickness' => 1),
                                                      array('startValue' => 333, 'endValue' => 444, 'color' => '0372AB', 'displayValue' => 'Trend 1', 'thickness' => 1))          
                    );
    
                                         $financialCharts->combinedInit($ch_data);
    SHIN_Core::$_jsmanager->addComponent($financialCharts->render('#financial'));
    
    
    // gantt charts - test general data for gantt chart
     $ch_data = array(
                        'type'              => 'c2d',
                        'categories'        => array('date'     =>  array('data'    =>  array(array('start' => '1/9/2004', 'end' => '31/12/2004', 'name' => '2004'),
                                                                                              array('start' => '1/1/2005', 'end' => '31/7/2005', 'name' => '2005')),
                                                                          'param'   =>  array('bgColor' =>  '333333',   'fontColor' =>  '99cc00', 'isBold' => 1, 'fontSize' => 14)),
                                                     
                                                     'month'    =>  array('data'    =>  array(array('start' => '1/9/2004',  'end' => '30/9/2004',  'name' => 'Sep'),
                                                                                              array('start' => '1/10/2004', 'end' => '31/10/2004', 'name' => 'Oct'),
                                                                                              array('start' => '1/11/2004', 'end' => '30/11/2004', 'name' => 'Nov'),
                                                                                              array('start' => '1/12/2004', 'end' => '31/12/2004', 'name' => 'Dec'),
                                                                                              array('start' => '1/1/2005',  'end' => '31/1/2005',  'name' => 'Jan'),
                                                                                              array('start' => '1/2/2005',  'end' => '28/2/2005',  'name' => 'Feb'),
                                                                                              array('start' => '1/3/2005',  'end' => '31/3/2005',  'name' => 'March'),
                                                                                              array('start' => '1/4/2005',  'end' => '30/4/2005',  'name' => 'Apr'),
                                                                                              array('start' => '1/5/2005',  'end' => '31/5/2005',  'name' => 'May'),
                                                                                              array('start' => '1/6/2005',  'end' => '30/6/2005',  'name' => 'June'),
                                                                                              array('start' => '1/7/2005',  'end' => '31/7/2005',  'name' => 'July'))),
                                                                          'param'   =>  array('bgColor' => '99cc00', 'bgAlpha' => '40', 'fontColor' => '333333', 'align' => 'center', 'fontSize' => 10, 'isBold' => 1),
                                                    ),
                        
                        'processes' =>  array('data'    =>  array(array('Name'    => 'Ashok',  'id' => 1),
                                                                  array('Name'    => 'Pallav', 'id' => 2),
                                                                  array('Name'    => 'Akhil',  'id' => 3),
                                                                  array('Name'    => 'Sanket', 'id' => 4),
                                                                  array('Name'    => 'Srishti','id' => 5),
                                                                  array('Name'    =>  'Kisor', 'id' => 6)),
                                              'param'   =>  array('positionInGrid'  => 'right', 'align' => 'center', 'headerText' => 'Leader',  'fontColor' => '333333',     'fontSize' => 11, 
                                                                  'isBold'          => 1,       'isAnimated' => 1,   'bgColor' => '99cc00',     'headerbgColor' => '333333', 'headerFontColor' => '99cc00', 
                                                                  'headerFontSize'  => 16,      'bgAlpha' => 40)),
                        
                        'datatable' =>  array(array('label' => 'MANAGEMENT',      'bgColor' => '345678'), 
                                              array('label' => 'PRODUCT MANAGER', 'bgColor' => '345678'),
                                              array('label' => 'CORE DEVELOPMENT','bgColor' => '345678'),
                                              array('label' => 'Q A / DOC.',      'bgColor' => '345678'),
                                              array('label' => 'WEB TEAM',        'bgColor' => '345678'),
                                              array('label' => 'MANAGEMENT',      'bgColor' => '345678')),
                        
                        'tasks'     =>  array(array('name' => 'Survey',                 'hoverText' => 'Market Survey',                 'processId' => '1', 'start' => '7/9/2004',      'end' => '10/10/2004',  'id' => 'Srvy',         'color' => '', 'alpha' => 60, 'topPadding' => 19),
                                              array('name' => 'Concept',                'hoverText' => 'Develop Concept for Product',   'processId' => '1', 'start' => '25/10/2004',    'end' => '9/11/2004',   'id' => 'Cpt1',         'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'Concept',                'hoverText' => 'Develop Concept for Product',   'processId' => '2', 'start' => '25/10/2004',    'end' => '9/11/2004',   'id' => 'Cpt2',         'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'Design',                 'hoverText' => 'Preliminary Design',            'processId' => '2', 'start' => '12/11/2004',    'end' => '25/11/2004',  'id' => 'Desn',         'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'Product Development',    'hoverText' => '',                              'processId' => '2', 'start' => '6/12/2004',     'end' => '2/3/2005',    'id' => 'PD1',          'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'Product Development',    'hoverText' => '',                              'processId' => '3', 'start' => '6/12/2004',     'end' => '2/3/2005',    'id' => 'PD2',          'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'Doc Outline',            'hoverText' => 'Documentation Outline',         'processId' => '2', 'start' => '6/4/2005',      'end' => '1/5/2005',    'id' => 'DocOut',       'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'Alpha',                  'hoverText' => 'Alpha Release',                 'processId' => '4', 'start' => '15/3/2005',     'end' => '2/4/2005',    'id' => 'alpha',        'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'Beta',                   'hoverText' => 'Beta Release',                  'processId' => '3', 'start' => '10/5/2005',     'end' => '2/6/2005',    'id' => 'beta',         'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'Doc.',                   'hoverText' => 'Documentation',                 'processId' => '4', 'start' => '12/5/2005',     'end' => '29/5/2005',   'id' => 'Doc',          'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'Website Design',         'hoverText' => 'Website Design',                'processId' => '5', 'start' => '18/5/2005',     'end' => '22/6/2005',   'id' => 'Web',          'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'Release',                'hoverText' => 'Product Release',               'processId' => '6', 'start' => '5/7/2005',      'end' => '29/7/2005',   'id' => 'Rls',          'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'Dvlp',                   'hoverText' => 'Development on Beta Feedback',  'processId' => '3', 'start' => '10/6/2005',     'end' => '1/7/2005',    'id' => 'Dvlp',         'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'QA',                     'hoverText' => 'QA Testing',                    'processId' => '4', 'start' => '9/4/2005',      'end' => '22/4/2005',   'id' => 'QA1',          'color' => '', 'alpha' => 60, 'topPadding'),
                                              array('name' => 'QA2',                    'hoverText' => 'QA Testing',                    'processId' => '2', 'start' => '25/6/2005',     'end' => '5/7/2005',    'id' => 'QA2',          'color' => '', 'alpha' => 60, 'topPadding')),
                                              
                        'connectors'=>  array(array('fromTaskId' => 'Cpt1',  'toTaskId' => 'Cpt2',  'color' => '123123', 'thickness' => '2', 'fromTaskConnectStart' => '1'),
                                              array('fromTaskId' => 'PD1',   'toTaskId' => 'PD2',   'color' => '123123', 'thickness' => '2', 'fromTaskConnectStart' => '1'),
                                              array('fromTaskId' => 'PD1',   'toTaskId' => 'alpha', 'color' => '123123', 'thickness' => '2'),
                                              array('fromTaskId' => 'PD2',   'toTaskId' => 'alpha', 'color' => '123123', 'thickness' => '2'),
                                              array('fromTaskId' => 'DocOut','toTaskId' => 'Doc',   'color' => '123123', 'thickness' => '2'),
                                              array('fromTaskId' => 'QA1',   'toTaskId' => 'beta',  'color' => '123123', 'thickness' => '2'),
                                              array('fromTaskId' => 'Dvlp',  'toTaskId' => 'QA2',   'color' => '123123', 'thickness' => '2'),
                                              array('fromTaskId' => 'QA2',   'toTaskId' => 'Rls',   'color' => '123123', 'thickness' => '2')),
                        
                        'milestones'=>  array(array('date' => '29/7/2005', 'taskId' => 'Rls', 'radius' => '10', 'color' => 'FFFFFF', 'shape' => 'Star', 'numSides' => '5', 'borderThickness' => '1'),
                                              array('date' => '2/3/2005',  'taskId' => 'PD1', 'radius' => '10', 'color' => 'FFFFFF', 'shape' => 'Star', 'numSides' => '5', 'borderThickness' => '1'),
                                              array('date' => '2/3/2005',  'taskId' => 'PD2', 'radius' => '10', 'color' => 'FFFFFF', 'shape' => 'Star', 'numSides' => '5', 'borderThickness' => '1'))                 
                     );  
                                          $ganttCharts->combinedInit($ch_data);
    SHIN_Core::$_jsmanager->addComponent($ganttCharts->render('#gannt'));   

    //render main example template
    SHIN_Core::finalrender('charts');
    exit;


	function splitinterval_by_month($start, $end)
	{
		$count_mileseconds_per_day = 86400;

		$ret = array();

		$_start_date	= preg_split('/\//', $start);
		$_end_date		= preg_split('/\//', $end);

		$start_timestamp	= mktime(0, 0, 0, $_start_date[0], $_start_date[1], $_start_date[2]);
		$end_timestamp		= mktime(0, 0, 0, $_end_date[0], $_end_date[1], $_end_date[2]);

		for($i = $start_timestamp ; $i<=$end_timestamp; $i += $delta)
		{
			$count_current_month_s_day = date("t", $i);
			$current_month = date("m", $i);
			$current_year = date("Y", $i);
			$delta = $count_mileseconds_per_day*$count_current_month_s_day+86400;

			$bp = date("Y-m-d", mktime(0, 0, 0, $current_month, 1, $current_year));
			$ep = date("Y-m-d", mktime(0, 0, 0, $current_month, $count_current_month_s_day, $current_year));
			
			array_push($ret, "$bp,$ep");
		}

		return $ret;
	}

/* End of file charts.php */
/* Location: example/charts.php */
