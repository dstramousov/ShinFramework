<?php

require "CommonController.php";

class SysLogManageController extends CommonController {
   
    /**
    * tab name
    */
    protected $tabName  =   'sys_log';
    
    /**
    * show policy application list
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function index(){
        
        // init needed libs
        $nedded_libs = array(   
                                'help'   => array('form', 'date'),
                                'libs'   => array('SHIN_Datatable',
                                                  'SHIN_Dialog',
                                                  'SHIN_Button',
                                                  'SHIN_Message',
                                                  'SHIN_BlockUI')
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // init ddatatable for drawing ticket list
        $dt             = SHIN_Core::$_libs['datatable']->get_instance();
        
        $_tableclass    = 'display';
        $_css_column    = 'gradeC';
        $_element_id    = 'dataList' . ucfirst($this->tabName);    
        $_dom_element   = 'ssstylemustbehere';
        $_display_data  = array();
        $_table_data    = array('',
                                SHIN_Core::$_language->line('lng_label_sys_log_file_name'),
                                SHIN_Core::$_language->line('lng_label_sys_log_last_update'),
                                SHIN_Core::$_language->line('lng_label_sys_log_file_size'),
                                '');
        
        // initialize ajax type of datatable                                                             
        $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                            /* Add some extra data to the sender */
                                            aoData.push( { "name": "crud_obj_name",   "value": "sysLogCrudObj" } ),
                                            
                                            $.ajax( {
                                                "dataType": \'json\', 
                                                "type": "POST", 
                                                "url": sSource, 
                                                "data": aoData,
                                                "success": fnCallback
                                            } );
                                        }';


//		dump(prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/logmanage/datatabledata'));
        $init_options    = array('bProcessing'  => 'true', 
                                 'bServerSide'  => 'true', 
                                 'fnServerData' => $fnServerData,
                                 'aoColumns'    => '[{"bSortable":false},null,null,null,{"bSortable":false}]',
                                 'sAjaxSource'  => "'" . prep_url(SHIN_Core::$_config['core']['app_base_url'] .'/'. shinfw_folder(). '/logmanage/datatabledata') . "'");
        $dt->init($init_options);
        
        // initialize datatable with events, selected fields, etc
        $dt->setLanguage(SHIN_Core::$_current_lang);
        $dt->init($init_options);
        $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
        SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
        SHIN_Core::$_libs['templater']->assign('datatbleName', $_element_id);
        
        // init notify dialog for delete action
        SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_' . $this->tabName . '_delete'));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct($this->tabName . '-delete-dialog', SHIN_Core::$_language->line('lng_label_customer_delete_really'), 'Content', Array(SHIN_Core::$_language->line('lng_label_sys_user_cancel') => 'sysLogCrudObj.params.general.dialogObj.close("delete-dialog")', SHIN_Core::$_language->line('lng_label_sys_user_delete_ok') => 'sysLogCrudObj.del(null, null)'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render($this->tabName . '-delete-dialog'));
        
        // init edit dialog
        SHIN_Core::$_libs['dialog']->init(array('width' => 500));
        SHIN_Core::$_libs['dialog']->confirm_dialog_correct($this->tabName . '-edit-dialog', SHIN_Core::$_language->line('lng_label_sys_user_edit'), null, Array(SHIN_Core::$_language->line('lng_label_sys_user_edit_cancel') => 'sysLogCrudObj.params.general.dialogObj.close("edit-dialog")'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render($this->tabName . '-edit-dialog'));
        
        // init messages and errors blocks
        SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock());
        SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock());
        
        // init delete all button
        $options    = array('click' => 'deleteAll(); return false;',
                            'label' => '"' . SHIN_Core::$_language->line('lng_label_sys_log_delete_all') . '"');
        // init component using needed options
        SHIN_Core::$_libs['button']->init($options);
        
        // add component to the page
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['button']->render('#delete_all_' . $this->tabName .'_button'));
        
        // init delete selected button
        $options    = array('click' => 'deleteSelected(); return false;',
                            'label' => '"' . SHIN_Core::$_language->line('lng_label_sys_log_delete_selected') . '"');
        // init component using needed options
        SHIN_Core::$_libs['button']->init($options);
        
        // add component to the page
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['button']->render('#delete_selected_' . $this->tabName .'_button'));
        
        // transfer some base params to the view
        SHIN_Core::$_libs['templater']->assign('tabName', $this->tabName);
        
        return 'sys_manage/list/sys-log-list.tpl'; 
    
    } 
    
    /**
    * delete log
    * 
    * @access public
    * @param null
    * @return json
    * 
    */
    public function delete(){
        
        $logFileName    =   SHIN_Core::$_input->globalarr('fileName');
        if(!empty($logFileName)) {
            $result = unlink(SHIN_Core::$_config['log']['log_path'] . DIRECTORY_SEPARATOR . $logFileName);
        }
        
        echo json_encode(array('result' => $result, 'message' => SHIN_Core::$_language->line('lng_label_delete_success'))); exit();
    }
    
    /**
    * delete selected log file
    * 
    * @access public
    * @return json
    * @param null
    * 
    */
    public function deleteSelected(){
        
        $selected   =   SHIN_Core::$_input->globalarr('selected');
        
        if(!empty($selected)) {
            foreach($selected as $log) {
                if(is_file(SHIN_Core::$_config['log']['log_path'] . DIRECTORY_SEPARATOR . $log)) {
                    unlink(SHIN_Core::$_config['log']['log_path'] . DIRECTORY_SEPARATOR . $log);
                }
            }
        }
        
        echo json_encode(array('result' => true)); exit();
    }
    
    /**
    * delete all log files
    * 
    * @access public
    * @return json
    * @param null
    * 
    */
    public function deleteAll(){
        
        $all   =   SHIN_Core::$_input->globalarr('all');
        
        if(!empty($all)) {
            foreach($all as $log) {
                if(is_file(SHIN_Core::$_config['log']['log_path'] . DIRECTORY_SEPARATOR . $log)) {
                    unlink(SHIN_Core::$_config['log']['log_path'] . DIRECTORY_SEPARATOR . $log);
                }
            }
        }
        
        echo json_encode(array('result' => true)); exit();
    }
    
    /**
    * download log file
    * 
    * @access public
    * @return file
    * @param null
    * 
    */
    public function download(){
        
         // init needed libs
        $nedded_libs = array(   
                                'help'   => array('archive'),
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $logFile    =   SHIN_Core::$_input->globalarr('file');
        $tempFile   =   tempnam(sys_get_temp_dir(), $logFile);
        
        if(!empty($logFile)) {
            makearchive(array(SHIN_Core::$_config['log']['log_path'] . DIRECTORY_SEPARATOR . $logFile => $logFile), $tempFile);
            force_download(preg_replace('/\.([^\.]+)$/', '.zip', $logFile), file_get_contents($tempFile));
        }
        
        exit();    
    }
    
    public function getDatatableData(){
        
        $column   =   SHIN_Core::$_input->globalarr('iSortCol_0');
        $type     =   SHIN_Core::$_input->globalarr('sSortDir_0');  
        switch($column) {
            case 1:
                $name   =   'file';
                break;
            case 2:
                $name   =   'date';
                break;
            case 3:
                $name   =   'size';
                break;
            default:
                $name   =   'file';
            
        }
        
        $this->orderBy  =   array($name => $type);   
        $start          =   SHIN_Core::$_input->globalarr('iDisplayStart');   
        $length         =   SHIN_Core::$_input->globalarr('iDisplayLength');   
        $search         =   SHIN_Core::$_input->globalarr('sSearch');   
        $crudObjName    =   SHIN_Core::$_input->globalarr('crud_obj_name');   
       
        $logFolder      =   SHIN_Core::$_config['log']['log_path'];
        $dir            =   dir($logFolder);
        
        $files          =   array();
        // 1. callect all data
        while (false !== ($entry = $dir->read())) {
            if($entry != '.' && $entry != '..' && $entry != '.svn') {
                $files[] =   array('file' => $entry,
                                   'date' => date ("F d Y H:i:s.", filemtime($logFolder . DIRECTORY_SEPARATOR . $entry)),
                                   'size' => filesize($logFolder . DIRECTORY_SEPARATOR . $entry)
                                   );    
            }
        }
        
        // 2. make sorting
        usort($files, array($this, '_sort_array'));
        
        // 3. make pagination using array_slice()
        $files          =   array_slice($files, $start, $length);
        // 4. prepare data  for json
        $logList        =   '';
        $count          =   0;
        foreach($files as $file){
            if(empty($search)) {
                $logList .=   '[' . implode(',', array('"<input type=\'checkbox\' name=\'logs[]\' id=\'' . $file['file'] . '\' value=\'' . $file['file'] . '\'/>"', 
                                                       '"' . $file['file'] . '"', 
                                                       '"' . $file['date'] . '"',
                                                       '"' . $this->_sizeFormat($file['size']) . '"',
                                                       '"<a href=\"' . base_url() . '/logmanage/download?file=' . $file['file'] . '\"><img height=\'16\' border=\'0\' width=\'16\' src=\'' . SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . SHIN_Core::$_config['core']['shinfw_folder'] . '/images/log_open.png\'></a>"')) . '],';
                $count++;
            } else {
                if(stristr($file['file'], $search)) {
                    $logList .=   '[' . implode(',', array('"<input type=\'checkbox\' name=\'logs[]\' id=\'' . $file['file'] . '\' value=\'' . $file['file'] . '\'/>"', 
                                                           '"' . $file['file'] . '"', 
                                                           '"' . $file['date'] . '"',
                                                           '"' . $this->_sizeFormat($file['size']) . '"',
                                                           '"<a href=\"' . base_url() . '/logmanage/download?file=' . $file['file'] . '\"><img height=\'16\' border=\'0\' width=\'16\' src=\'' . SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . SHIN_Core::$_config['core']['shinfw_folder'] . '/images/log_open.png\'></a>"')) . '],';
                    $count++;
                }
            }
        }
        
        $dir->close();
        
        // json return value             
        $sOutput  = '{';
        $sOutput .= '"sEcho": '.intval(SHIN_Core::$_input->post('sEcho')).', ';
        $sOutput .= '"iTotalRecords": '. $count .', ';
        $sOutput .= '"iTotalDisplayRecords": ' . $count . ', ';
        $sOutput .= '"aaData": [' . substr($logList, 0, -1) . '] }'; 
        
        echo $sOutput; exit();
    
    }
    
    public function loadDirInfo() {
      
      // init needed libs
      $nedded_libs = array(   
                            'models' => array(array('sys_modulelist_model', 'sys_applicationlist_model')) 
                           );
      
      // load needed libs
      SHIN_Core::postInit($nedded_libs);
      
      $appList   =  SHIN_Core::$_models['sys_applicationlist_model']->getApplicationList();
      $appList[] =  shinfw_folder() . DIRECTORY_SEPARATOR .  'logs';
      
      $appInfo = array(); 
      foreach($appList as $app) {
        $data                               =   $this->_getDirectorySize($app);
        
        $data['path']                       =   $app;
        $data['size']                       =   $this->_sizeFormat($data['size']);
        
        $appInfo[$app] =   $data;
      }
      
        ksort($appInfo, SORT_STRING);
      
      SHIN_Core::$_libs['templater']->assign('appInfo', $appInfo);
      
      return 'sys_manage/list/sys-log-info.tpl';
      
    }
    
    /**
    * collect directory size
    * 
    * @param string $path - directory path
    * @access protected
    * @return array
    */
    protected function _getDirectorySize($path)
	{
      
          $totalsize    = 0;
          $totalcount   = 0;
          $dircount     = 0;

          if ($handle = opendir($path)) {
              
            while (false !== ($file = readdir($handle))) {
                
				$nextpath = $path . DIRECTORY_SEPARATOR . $file;
              if ($file != '.svn' && $file != '.' && $file != '..' && !is_link ($nextpath)) {
                  
                if (is_dir ($nextpath)) {
                  $dircount++;
                  $result       = $this->_getDirectorySize($nextpath);
                  $totalsize   += $result['size'];
                  $totalcount  += $result['count'];
                  $dircount    += $result['dircount'];
                } elseif (is_file ($nextpath)) {
                  $totalsize   += filesize ($nextpath);
                  $totalcount++;
                }
              }
            }
            
            closedir ($handle);          
          }
          
          $total['size']     = $totalsize;
          $total['count']    = $totalcount;
          $total['dircount'] = $dircount;
          
          return $total;
    }

    /**
    * make formating
    * 
    * @param int $size
    * @access protected
    * @return string
    */
    protected function _sizeFormat($size)
    {
        if($size<1024){
            return $size." bytes";
        } else if($size<(1024*1024)) {
            $size=round($size/1024,1);
            return $size." KB";
        } else if($size<(1024*1024*1024)) {
            $size=round($size/(1024*1024),1);
            return $size." MB";
        } else {
            $size=round($size/(1024*1024*1024),1);
            return $size." GB";
        }
    }
    
    /**
    * sort array by any column
    * 
    * @param array $a - first element
    * @param array $b - seceond element
    * @access protected
    * @return array
    */
    protected function _sort_array($a, $b) {
        
        $result = 0;
        foreach($this->orderBy as $key => $value) {
            if($a[$key] == $b[$key]) { 
                continue; 
            }
            
            if($key ==  'size') {
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
        
}

?>
