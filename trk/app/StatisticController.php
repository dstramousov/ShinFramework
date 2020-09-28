<?php

require "CommonController.php";

class StatisticController extends CommonController {
    
    /**
    * Constructor
    * 
    * @access public
    * @param null
    * @return null
    */
    function __construct() {
        
        parent::__construct();
        
    }
    
    /**
    * Default and main function for manage statistic
    * 
    * @access public
    * @param null
    * @return json result
    */
    function index(){
        
        // init needed libs
        $nedded_libs = array(   
                                'models' => array(array('trk_photo_model', 'trk_photo_model'),
                                                  array('trk_uploadactivity_model', 'trk_uploadactivity_model'))
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        include(SHIN_Core::isConfigExists('limitations.php'));
        
        
        $totalPhoto     =   SHIN_Core::$_models['trk_photo_model']->getPhotoCount();
//		$totalPhotoUsedSpace = SHIN_Core::$_models['snaptrack_uploadactivity_model']->getTotalUploadedSize();
        $totalFileSize  =   SHIN_Core::$_models['trk_uploadactivity_model']->getTotalUploadedSize();
        $monthBandwidth =   SHIN_Core::$_models['trk_uploadactivity_model']->getUsersBandWidth(SHIN_Core::$_user->idUser, date('Y-m-d'));
        
        $remainingQuota      =   $limitations['lim_total_space_quota'] - $totalFileSize; 
        $remainingMonthQuota =   $limitations['lim_total_space_quota'] - $monthBandwidth; 
        
        SHIN_Core::$_libs['templater']->assign('totalPhoto',          $totalPhoto);
//        SHIN_Core::$_libs['templater']->assign('totalPhotoUsedSpace', $this->formatSize($totalPhotoUsedSpace));
        SHIN_Core::$_libs['templater']->assign('totalFileSize',       $this->formatSize($totalFileSize));
        SHIN_Core::$_libs['templater']->assign('remainingQuota',      $this->formatSize($remainingQuota));
        SHIN_Core::$_libs['templater']->assign('remainingMonthQuota', $this->formatSize($remainingMonthQuota));
        SHIN_Core::$_libs['templater']->assign('userQuota',           $this->formatSize($limitations['lim_total_space_quota']));
        
        return 'admin/statistic/index.tpl'; 
    }
    
    /**
    * init statistic datatable
    * 
    * @access public
    * @return rendered template
    * @param null
    * 
    */
    function usersStat(){
        
        // init needed libs
        $nedded_libs = array('libs'     => array('SHIN_Datatable', 'SHIN_Timepicker'));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // init ddatatable for drawing ticket list
        $dt             = SHIN_Core::$_libs['datatable']->get_instance();
        
        $_tableclass    = 'display';
        $_css_column    = 'gradeC';
        $_element_id    = 'statisticList';    
        $_dom_element   = 'ssstylemustbehere';
        $_display_data  = array();
        $_table_data    = array(SHIN_Core::$_language->line('lng_label_statistic_user_name'),
                                SHIN_Core::$_language->line('lng_label_statistic_total_photo'),
                                SHIN_Core::$_language->line('lng_label_statistic_total_size'),
                                SHIN_Core::$_language->line('lng_label_statistic_remaining_quota'),
                                SHIN_Core::$_language->line('lng_label_statistic_user_quota'),
                                SHIN_Core::$_language->line('lng_label_statistic_remaining_month_quota'));
        
        // initialize ajax type of datatable                                                             
        $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                            
                                            $.ajax( {
                                                "dataType": \'json\', 
                                                "type": "POST", 
                                                "url": sSource, 
                                                "data": aoData,
                                                "success": fnCallback
                                            } );
                                        }';

        
        $init_options    = array('bProcessing'      => 'true', 
                                 'bServerSide'      => 'true', 
                                 'fnServerData'     => $fnServerData,
                                 'aoColumns'        => '[null,null,null,null,null,null]',
                                 'sAjaxSource'      => "'" . base_url() . '/statistic/fetchdata'."'");
								 
        $dt->init($init_options);
        
        // initialize datatable with events, selected fields, etc
        $dt->setLanguage(SHIN_Core::$_current_lang);
        $dt->init($init_options);
        $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
        SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
        SHIN_Core::$_libs['templater']->assign('datatbleName', $_element_id);
        
        return 'admin/statistic/users-stat.tpl';
    }
    
    /**
    * get data for statistic datatable
    * 
    * @access public
    * @return json object
    * @param null
    * 
    */
    public function fetchData(){
        
        // init needed libs
        $nedded_libs = array(   
                                'models' => array(array('trk_user_model', 'trk_user_model'),
                                                  array('trk_photo_model', 'trk_photo_model'),
                                                  array('trk_uploadactivity_model', 'trk_uploadactivity_model'))
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        include(SHIN_Core::isConfigExists('limitations.php'));
        
        $count      =   0;
        $statList   =   '';
        $dataList   =   array();   
        $userList   =   SHIN_Core::$_models['trk_user_model']->getUserList();
        
        $search     =   SHIN_Core::$_input->globalarr('sSearch');   
        $start      =   SHIN_Core::$_input->globalarr('iDisplayStart');   
        $length     =   SHIN_Core::$_input->globalarr('iDisplayLength');
        
        $column   =   SHIN_Core::$_input->globalarr('iSortCol_0');
        $type     =   SHIN_Core::$_input->globalarr('sSortDir_0');  
        
		
		//dump($column);
        switch($column) {
            case 0:
                $name   =   'name';
                break;
            case 1:
                $name   =   'total_photo';
                break;
//            case 2:
//                $name   =   'total_gallery';
//                break;
            case 2:
                $name   =   'total_file_size';
                break;
            case 3:
                $name   =   'remaining_quota';
                break;
            case 4:
                $name   =   'remaining_month_quota';
                break;
            case 5:
                $name   =   'total_space_quota';
                break;
            default:
                $name   =   'name';
            
        }
        
		//dump($name);
        $this->orderBy  =   array($name => $type); 
        
        foreach($userList as $user) {
		
            $totalPhoto     =   SHIN_Core::$_models['trk_photo_model']->getPhotoCount($user['userId']);
            //
            $totalFileSize  =   SHIN_Core::$_models['trk_uploadactivity_model']->getTotalUploadedSize($user['userId']);
            $monthBandwidth =   SHIN_Core::$_models['trk_uploadactivity_model']->getUsersBandWidth(SHIN_Core::$_user->idUser, date('Y-m-d'));
            
            $remainingQuota      =   $limitations['lim_total_space_quota'] - $totalFileSize; 
            $remainingMonthQuota =   $limitations['lim_total_space_quota'] - $monthBandwidth; 
			
            
            if(empty($search)) {
                $dataList[] =   array('name'                   =>  $user['sys_user_name'],
                                      'total_photo'             =>  $totalPhoto,
                                      'total_file_size'         =>  $this->formatSize($totalFileSize),
                                      'remaining_quota'         =>  $this->formatSize($remainingQuota),
                                      'remaining_month_quota'   =>  $this->formatSize($remainingMonthQuota),
                                      'total_space_quota'       =>  $this->formatSize($limitations['lim_total_space_quota']));
                                      
            } elseif(stristr($user['name'], $search)) {
                
                $dataList[] =   array('name'                    =>  $user['name'],
                                      'total_photo'             =>  $totalPhoto,
                                      'total_file_size'         =>  $this->formatSize($totalFileSize),
                                      'remaining_quota'         =>  $this->formatSize($remainingQuota),
                                      'remaining_month_quota'   =>  $this->formatSize($remainingMonthQuota),
                                      'total_space_quota'       =>  $this->formatSize($limitations['lim_total_space_quota']));    
            }    
        }
        
        // 2. make sorting
		
        usort($dataList, array($this, '_sort_array'));
        // 3. make pagination using array_slice()
        $dataList  =  array_slice($dataList, $start, $length);
        
        // 4. prepare data  for json
        foreach($dataList as $data)
		{
            $statList   .=  '[' . implode(',', array('"' . $data['name'] . '"',
                                                     '"' . $data['total_photo'] . '"',
                                                     '"' . $data['total_file_size'] . '"',
                                                     '"' . $data['remaining_quota'] . '"',
                                                     '"' . $data['remaining_month_quota'] . '"',
                                                     '"' . $data['total_space_quota'] . '"')) . '],';
            
        }
        
        
        // json return value             
        $sOutput  = '{';
        $sOutput .= '"sEcho": '.intval(SHIN_Core::$_input->post('sEcho')).', ';
        $sOutput .= '"iTotalRecords": '. count($userList) . ', ';
        $sOutput .= '"iTotalDisplayRecords": ' . count($dataList) . ', ';
        $sOutput .= '"aaData": [' . substr($statList, 0, -1) . '] }'; 
        
        echo $sOutput; exit();    
    }
    
    /**
    * sort array by any column
    * 
    * @param array $a - first element
    * @param array $b - seceond element
    * @access protected
    * @return array
    */
    protected function _sort_array($a, $b)
	{	
        $result = 0;
				
        foreach($this->orderBy as $key => $value) {
		
            if($a[$key] == $b[$key]) {
                continue; 
            }
            
            if($key ==  'total_gallery' || $key == 'total_photo' || $key == 'total_file_size' || $key == 'remaining_quota' || $key == 'remaining_month_quota' || $key == 'total_space_quota')
			{	
                $a[$key] = trim(preg_replace('/bytes|KB|MB|GB/', '', $a[$key]));
                $b[$key] = trim(preg_replace('/bytes|KB|MB|GB/', '', $b[$key]));
                
                $result = ((float)$a[$key] < (float)$b[$key])? -1 : 1;
            } else {
                $result = ($a[$key] < $b[$key])? -1 : 1;
            }
            if($value == 'desc') { 
                $result = -$result; 
            }
            break;
        }
		
        return $result;
    
    }
    
    /**
    * format size
    * 
    * @param float $size
    * @access public
    * @return formated string
    */
    function formatSize($size)
	{
		$sight	= '';		
		$ret	= '';
		$_ret	= '';
		
		$_r1	= '';
		$_r2	= '';
	
		if($size < 0){$size = $size*(-1); $sight = '-';$_r1	= '<b>';$_r2 = '</b>';}
	
        if($size<1024){
            return $sight.''.$size." bytes";
        } else if($size<(1024*1024)) {
            $size=round($size/1024,1);
            $_ret = $sight.''.$size." KB";
        } else if($size<(1024*1024*1024)) {
            $size=round($size/(1024*1024),1);
            $_ret = $sight.''.$size." MB";
        } else {
            $size=round($size/(1024*1024*1024),1);
            $_ret = $sight.''.$size." GB";
        }
        		
		return $_r1.$_ret.$_r2;		
    }
}