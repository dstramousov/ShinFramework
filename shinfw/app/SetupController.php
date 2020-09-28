<?php

class SetupController {

	var $neededRecord = 50;
	
	var $todo_values = array();
	
	var $content;

	var $modework = 'file';  // possible values 'code' OR 'file'
	
	var $applications	= array();
	var $tables			= array();
	var $needed_libs	= array();
	var $applistfile	= array();
	var $_applistfile	= array();


	var $_setup_required_model_list	= array();	// in this array we are merge all $_setup_required_model_list from each application folder
	
	function fillModels_names_by_app_folder()
	{
		$ret = array();
		$__app_list = array();
		
		// check if needed model exists in to database.
		$tables = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->list_tables();

		if(!in_array('sys_applicationlist1', $tables))
		{
			$__app_list_file = SHIN_Core::$_config['core']['base_path'].SHIN_Core::$_config['core']['shinfw_folder'].DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'applist.txt';
			
			// if file not exist need show big error page.
			if(!is_file($__app_list_file)){
				redirect(base_url().'/error/applistfile', 'refresh');
			}
			
			$handle = @fopen($__app_list_file, "r");
			
			if ($handle) {
				while (!feof($handle))
				{
					$buffer = fgets($handle, 4096);
					$buffer = trim($buffer);
					if($buffer!=''){
						
						// new additional logic for task with number 4395
						//dump($buffer);
						$__tmp_arr = preg_split('/\|/', $buffer);
						if($__tmp_arr){
							$this->applistfile[$__tmp_arr[2]] = array($__tmp_arr[0], $__tmp_arr[1], $__tmp_arr[2]);
						}

						/////////////////////////////////////////////////
					}	
				}
				
				fclose($handle);
			}		
		} else {
		
			$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('sys_modulelist');
			foreach ($query->result_array() as $row)
			{			
				array_push($this->applistfile, $row['applicationName']);
			}		
			$query->free_result();
		}
		
		$this->_applistfile = array_keys($this->applistfile);
        foreach ($this->_applistfile as $row)
		{	
            // try to get all models from this application.
			$__folder = SHIN_Core::$_config['core']['base_path'].$row.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR;
			if(is_dir($__folder)){
			
				$dir = dir($__folder);
				$__arr = array();
				while (False !== ($entry = $dir->read()))
				{
					if( strcmp($entry, ".") && strcmp($entry, '.svn'))
					{
						$pos = strpos($entry, '.php');
						
						if ($pos === false) {
						} else {
							$__cc_name = str_replace('.php', '', $entry);
							
							array_push($__arr, $__cc_name);
							array_push($this->tables, $__cc_name);
							array_push($this->needed_libs, array($__cc_name,$__cc_name));
						}
					}
				}
				$this->applications[$row] = $__arr;
			}
		}
    }

    function __construct()
    {   
		$this->authorize();
		SHIN_Core::log('debug', 'Setup controller <b>Start</b> has initialized.');
				
				
		$file = 'shinfw/documentation/filetags_data.txt';
		if(is_file($file)){
			$this->need_make_test_tags = true;
			$this->content = file_get_contents($file);
		}
				
		$this->fillModels_names_by_app_folder();
		
		$nedded_libs = array(
                            'help'   => array('date', 'dump'),
							'core'   => array('SHIN_Input','SHIN_JSManager','SHIN_CSSManager'),							
                            'libs'   => array('SHIN_DB_forge',
                                              'SHIN_Message',
                                              'SHIN_Constants')
							);


		// new logic
		// ned fetch all information about applications and try to find for each applications 
		// in folder {appname}/config/setup_models.php and merge all array in to one		
		$t = array();
		$r_dir = str_replace(SHIN_Core::$_config['core']['shinfw_folder'].DIRECTORY_SEPARATOR, '', BASEPATH);
		foreach($this->_applistfile as $appname)
		{
			$file_name = $r_dir.$appname.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'setup_models.php';
			if(is_file($file_name)){
				require_once($file_name);
				$this->_setup_required_model_list = array_merge_recursive($this->_setup_required_model_list, $_setup_required_model_list);
			}	

		}
 	    /////////////////////////////////////////////////////////////////////////////////////

 	    $nedded_libs = array_merge($this->_setup_required_model_list, $nedded_libs);
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_jsmanager->addIncludes(SHIN_Core::$_config['core']['app_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery-1.5.1.js');
		
        SHIN_Core::$_libs['templater']->assign('applicationList', $this->_applistfile);
		
    } //end of function
	
    /**
    * @access private
    * @param $input string with html/dom name. 
    * @return NULL
     */
    function _read_image_info($input)
    {
		$ret = array();
        $info = $_FILES[$input];

        $ret['filename'] = $info['name'];
        $__data = preg_split("/\./", $ret['filename']);
        $ret['_name'] = $__data[0];
        $ret['_ext'] = $__data[1];
                
        $ret['filesize']    = $info['size'];
        $ret['type']        = $info['type'];
        $ret['tmp_file']    = $info['tmp_name'];

        $ret['content'] = file_get_contents($ret['tmp_file']);
		
		return $ret;
    }
    
    /**
    * @access private
    * @param $input string with html/dom name. 
    * @return NULL
     */
    function _is_uploaded($input_name)
    {	
        return
            isset($_FILES[$input_name]) &&
            $_FILES[$input_name]['error'] != UPLOAD_ERR_NO_FILE;
    }
	
    /**
     * 
     *
     * @access public
     * @param:  array $fields_to_select
     * @return: object SelectQuery.
     */
	function index()
	{
        $message = SHIN_Core::$_libs['message']->get_instance();
        
        $action  = SHIN_Core::$_input->post('action');
        $appList = SHIN_Core::$_input->post('app-name');
		
        $applicationname = SHIN_Core::$_input->post('applicationname');
		
		// Small hack. If profiller is enabled we can`t run setup procedure
		// just show error page and this is all
		if(SHIN_Core::$_config['core']['profiler_information']){
			return 'setup_error.tpl';
		}		

		if(param('cachecreation'))
		{		
			foreach($appList as $appfoldername)
			{
				$d = SHIN_Core::$_config['core']['base_path'].$appfoldername.DIRECTORY_SEPARATOR.'cache';
			
				if(!is_dir($d)){
					mkdir($d);
				} 				
			}
			
			$message->addMessage('CACHE folders was created for:  <strong>' . implode(', ', $appList) . '</strong>');
		}

		if(param('createapplication'))
		{
            	// this is create logic for application
            	$appname = param('applicationname');
				
				$idMenu		= SHIN_Core::$_input->post('idMenu');
				$idPanel	= SHIN_Core::$_input->post('idPanel');
				$tColumn	= SHIN_Core::$_input->post('tColumn');
				$tOrder		= SHIN_Core::$_input->post('tOrder');
				
				$icoFilename = '';
				// image logic 
				if($this->_is_uploaded('attach_ico_file'))
				{
					$ico_array_info = $this->_read_image_info('attach_ico_file');
					
					$icoFilename = $ico_array_info['filename'];
            
					// copy file to storer
					copy($ico_array_info['tmp_file'], SHIN_Core::$_config['core']['shinfw_folder'].'/images/'.$icoFilename);
            
				} else {
					$icoFilename = NULL;
				}
				
           		//prepare data for insert
				$data = array(
	               'idMenu'				=> $idMenu,
	               'idPanel'			=> $idPanel,
	               'ico'				=> $icoFilename,
	               'panel_header'		=> 'lng_label_'.$appname,
	               'collapsed'			=> 0,
	               'maximized'			=> 0,
	               'order'				=> $tOrder,
	               'column'				=> $tColumn,
	               'color_class'		=> 'color-green',
	               'color_border_class'	=> 'border-color-green',
	               'color_bg_class'		=> 'bg-color-yellow',
	               'show_close'			=> 1,
	               'show_maximize'		=> 1,
	               'show_turn'			=> 1,
	               'show_info'			=> 1,
	               'app_folder_name'	=> $appname,
	            );
				
				SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_menu', $data);				
		}

        if(!empty($appList)) {

            switch($action) {
                case 'delete_tables':
                    foreach($appList as $app) {
					
						if(isset($this->applications[$app])){

							$modelList = $this->applications[$app];
							sort($modelList);							
                        
							$this->delete_table($modelList);
							if($app != 'sys') {
								$message->addMessage('Tables was deleted successfully for application: <strong>' . $app . '</strong>');
							}
						}
						
                    }
                    break;
                
                case 'create_tables':
                    foreach($appList as $app) {
					
						if(isset($this->applications[$app])){
							
							$modelList = $this->applications[$app];
							sort($modelList);							
							$this->create_table($modelList);
							if($app != 'sys') {
								$message->addMessage('Tables was created successfully for application: <strong>' . $app . '</strong>');
							}
						}
                    }
                    
                    /**
                    *  @todo need to midify this code. 
                    *  This is just temperary fix. Please look at #4395 issue
                    */
                    foreach($this->applistfile as $app) {
                        //prepare data for insert
                        $data = array(
							'idModule'		=> $app[0],
							'applicationName'   => $app[1],
							'applicationFolder' => $app[2]
                        );
                        
//                        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_applicationlist', $data);    
						SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_modulelist', $data);    
                    }
                    break;
                
                case 'insert_test':
                    $this->insert_init('testdata');
                    break;
                
                case 'insert_init':
                    $this->insert_init('initdata');
                    break;
                
                case 'update_tables':
                    $appList    = array_merge($appList, array('shinfw'));
					
                    foreach($appList as $app) {
                        
						if(isset($this->applications[$app])){
							$modelList = $this->applications[$app];
						
							$this->update_table($modelList, $app, $message);
						}
                    }
					
                    break;
            }//case
			
        } elseif(!empty($action)) {
            $message->addError('<strong>Error</strong> please select one application at list.');
            $appList    =   array(); 
        } else {
            $appList    =   array(); 
        }
        
        SHIN_Core::$_libs['templater']->assign('selected', $appList);
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['message']->render('message'));

		return 'setup.tpl';
    }//end of function 

    /**
     * 
     *
     * @access public
     * @param:  array $modelList -list of the models
     * @return: object SelectQuery.
     */
	function delete_table($modelList)
	{
		
        foreach($modelList as $model){
			
			if(isset(SHIN_Core::$_models[strtolower($model)])){
				
				//$class = new ReflectionClass(SHIN_Core::$_models[strtolower($model)]);
				
				//dump($class->getParentClass());
				
				if(SHIN_Core::$_models[strtolower($model)]->db_obj_type == DB_OBJ_TYPE_TABLE){
					SHIN_Core::$_models[strtolower($model)]->delete_table();
				} else {
					$_model = str_replace('_model', '', $model);
					if(SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->table_exists($_model)){
						SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('DROP VIEW `'.$_model.'`;');
					}
				}
			} else {
				// this is case for me.
				// don`t edit this.
			}
			
        }
        
	}//end of function 

    /**
     * 
     *
     * @access public
     * @param:  array $modelList -list of the models
     * @return: object SelectQuery.
     */
    function create_table($modelList)
    {		
		foreach($modelList as $model){
			if(isset(SHIN_Core::$_models[strtolower($model)])){
				SHIN_Core::$_models[strtolower($model)]->create_table();
			}    
		}
    }
    
    /**
     * 
     *
     * @access public
     * @param:  array $modelList -list of the models
     * @return: object SelectQuery.
     */
	function update_table($modelList, $app, $message)
	{
        foreach($modelList as $model)
		{
			if(isset(SHIN_Core::$_models[strtolower($model)])){
				$ret = SHIN_Core::$_models[strtolower($model)]->update_table();
				//dump($ret);
			
				if($ret) {
					$message->addMessage('Tables <strong>'.$model.'</strong> was updated successfully for <strong>' . $app . '</strong>');
				} else {
					//$message->addError('Tables <strong>'.$model.'</strong> was updated with error for application: <strong>' . $app . '</strong>');
				}
			} else {
				//echo ($model.'<br/>');
			}
        }    
    }//end of function 


    /**
     * 
     *
     * @access private
     * @param: $app_name   string Application name 
     * @param: $insertmode string Insertion mode -> 'initdata', 'testdata'
     * @param: $model_name string Model name 
     * @return: null
     */
    private function _process_sql_file($app_name, $insertmode, $model_name)
    {
    	$requested_file_name = $app_name.'/setup/'.$insertmode.'/'.$model_name.'.sql';
		dump($requested_file_name);
		
		$buffer_size = 114096;
    	
		$handle = @fopen($searched_folder_name, "r");
		
		if ($handle) {
			while (!feof($handle)) {
				$buffer = fgets($handle, $buffer_size);
				echo $buffer;
			}

			fclose($handle);
		}

    	return;
    }


    /**
     * Make insert init data main chioce. Analyze modework and call needed function.
     *
     * @access public
     * @param:  null
     * @return: null
     */
	function insert_init($insertmode='initdata')
	{
		$addons_for_function = '_insert_';
		
		$mode_insert_from_form = SHIN_Core::$_input->post('onemultiple_ins');
		
		$statuses = array();
		$statuses_err = array();

		$__app_name = SHIN_Core::$_input->post('app-name');
		foreach($this->applications as $app_name=> $data)
		{

			if (!in_array($app_name, $__app_name)) {continue;} 


			$folder_for_scan = $app_name . '/setup/' . $insertmode . '/';
			$dir = dir($folder_for_scan);
			while (False !== ($entry = $dir->read()))
			{
					if( strcmp($entry, ".") && strcmp($entry, '.svn'))
					{
						$pos = strpos($entry, '.sql');
						
						if ($pos === false) {
						} else {

							$sql_data = file_get_contents($folder_for_scan.$entry, true);
//							dump($folder_for_scan, $folder_for_scan.$entry);

							if($sql_data)
							{
								SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_begin();
								
								// one way 
								$r = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->conn_id->multi_query($sql_data);
								
								if (!$r) {
									SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_rollback();
									array_push($statuses_err, 'Insert data ERROR in to model with name: <strong>'.$app_name.' | '.$entry.'</strong>');
								} else {
									array_push($statuses, 'Insert data successfully in to model with name: <strong>'.$app_name.' | '.$entry.'</strong>');
									SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->trans_commit();
								}		
						
							}
						}
					}
			}
		}		

	
        $message	= SHIN_Core::$_libs['message']->get_instance();
		$our_mess	= implode("<br/>", $statuses);
		$message->addMessage($our_mess);
		
		if($statuses_err){
			$our_mess	= implode("<br/>", $statuses_err);
			$message->addError($our_mess);
		}
		return;
    }//end of function 


    /**
     * Universal test generator
     *
     * @access private
     * @param:  null
     * @return: null
     */
    function gen_test_data($neededRecord)
    {
    }//end of function 
	
    /**
     * Make insert init data from file. file keep in to setup/initdata for each application
     *
     * @access private
     * @param:  null
     * @return: null
     */
    private function _insert_init_file()
    {
    }//end of function

    /**
     * Make insert init data from logic code.
     *
     * @access public
     * @param:  null
     * @return: null
     */
    private function _insert_init_code()
    {
    }//end of function

	
    /**
     * Make insert test data main chioce. Analyze modework and call needed function.
     *
     * @access public
     * @param:  null
     * @return: null
     */
	private function insert_test()
	{

		$this->modework = SHIN_Core::$_input->post('modework');
		if($this->modework == 'code'){
			$this->_insert_test_code();
		} else {
			$this->_insert_test_file();
		}				
    }//end of function

    /**
     * Make insert test data from logic code. 
     *
     * @access private
     * @param:  null
     * @return: null
     */
    private function _insert_test_code()
    {

		/*
		$this->_insert_sys_policyapplication();
		$this->_insert_sys_policyarea();
		$this->_insert_sys_policysubarea();
		$this->_insert_sys_structapplication();
		$this->_insert_sys_structarea();
		$this->_insert_sys_structsubarea();
		$this->_insert_sys_userrole();
		*/
	
		$this->_insertAccount();
		$this->_insertCategory();
		$this->_insertEntity();
		$this->_insertHolder();
		$this->_insertTodoList();
		$this->_insertTodoListItem();
		$this->_insertUser();
        $this->_insertPanels();
        $this->_insertFileTracking();
        $this->_insertShedule();
        $this->_insertTags();
        $this->_insertCustomerMasterData();		

    }//end of function


    
    /**
     * Make insert test data from file. file keep in to setup/testdata for each application.
     *
     * @access private
     * @param:  null
     * @return: null
     */
    private function _insert_test_file()
    {
    }//end of function
		



	private function _insert_sys_policyapplication()
	{	
		$arr1 = array('user', 'role');
		$arr2 = array('user','role','block','r-only','par','full');
	
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$idElement		= $i+1000;
			$type			= $this->getRandomValFromArray($arr1);
			$idArea			= rand(10, 120);
			$idSubArea		= rand(10, 120);
			$idApplication	= rand(5, 50);
			$mode			= $this->getRandomValFromArray($arr2);
			
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_policyapplication', array('idElem' => $idElement,
																					 'type'   => $type,
																					 'idArea'  => $idArea,
																					 'idSubArea'  => $idSubArea,
																					 'idApplication'  => $idApplication,
																					 'mode'  => $mode
																					 )
																	);
		
		}
	}//end of function 
	
	
	function _insert_sys_policyarea()
	{
		$arr1 = array('user', 'role');
		$arr2 = array('user','role','block','r-only','par','full');
		
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$idElement		= $i+1000;
			$type			= $this->getRandomValFromArray($arr1);
			$idArea			= rand(10, 120);
			$mode			= $this->getRandomValFromArray($arr2);
			
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_policyarea', array('idElem' => $idElement,
																					 'type'   => $type,
																					 'idArea'  => $idArea,
																					 'mode'  => $mode
																					 )
																	);
		}
	}//end of function 
	
	
	function _insert_sys_policysubarea()
	{
		$arr1 = array('user', 'role');
		$arr2 = array('user','role','block','r-only','par','full');
	
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$idElement		= $i+1000;
			$type			= $this->getRandomValFromArray($arr1);
			$idArea			= rand(10, 120);
			$idSubArea		= rand(10, 120);
			$mode			= $this->getRandomValFromArray($arr2);
			
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_policysubarea', array('idElem' => $idElement,
																					 'type'   => $type,
																					 'idArea'  => $idArea,
																					 'idSubArea'  => $idSubArea,
																					 'mode'  => $mode
																					 )
																	);
		
		}
	}//end of function 
	
	
	function _insert_sys_structapplication()
	{
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$idApplication	= $i;
			$idArea			= rand(10, 120);
			$idSubArea		= rand(10, 120);
			$application	= $this->getRandomStr(3);
			$file			= strtolower($this->getRandomStr(1)).'.php';
			$showMenu		= 's';
			$uso			= 's';
			
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_structapplication', array('idApplication' => $idApplication,
																					 'idArea'   => $idArea,
																					 'idSubArea'  => $idSubArea,
																					 'idSubArea'  => $idSubArea,
																					 'application'  => $application,
																					 'file' => $file, 
																					 'showMenu' => $showMenu, 
																					 'uso' => $uso, 
																					 )
																	);
		}
	}//end of function 
	
	
	function _insert_sys_structarea()
	{
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$idArea			= $i;
			$area			= substr(ucfirst($this->getRandomStr(1)), 0, 9);
			$esteso			= substr(ucfirst($this->getRandomStr(3)), 0, 40);
			$uso			= 's';
			
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_structarea', array('idArea' => $idArea,
																					 'area'   => $area,
																					 'esteso'  => $esteso,
																					 'uso'  => $uso,
																					 )
																	);		
		}
	}//end of function 
	
	
	function _insert_sys_structsubarea()
	{
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$idSubArea		= $i;
			$idArea			= $i+rand(5,56);
			$subarea		= substr(ucfirst($this->getRandomStr(2)), 0, 19);
			$esteco			= substr(ucfirst($this->getRandomStr(3)), 0, 50);
			$uso			= 's';
			
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_structsubarea', array('idSubArea' => $idSubArea,
																					 'idArea' => $idArea,
																					 'subarea'   => $subarea,
																					 'esteco'  => $esteco,
																					 'uso'  => $uso,
																					 )
																	);		
		}
	}//end of function 
	
	
	function _insert_sys_userrole()
	{
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$tmp = $i+1000;
			$idRuolo		= 'r'.$tmp;
			$ruolo			= substr(ucfirst($this->getRandomStr(2)), 0, 28);
			$grp			= 'base';
			
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_userrole', array('idRole' => $idRuolo,
																					 'ruolo'  => $ruolo,
																					 'grp'  => $grp,
																					 )
																	);		
		}
	}//end of function 
	
	///////   insert functions ////////////////////////////	
	function _insertAccount()
	{
		$count = 1;
		
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$created = date('Y-m-d', rand(1151704800, time()));
			$c       = rand(67, 4000);
			$d       = rand(9, 67);			
			$name    = ucfirst($this->getRandomStr(1));
						
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('ppfm_account', array('account'     => $name,
                                                          'curAmount'   => $c . '.' . $d,
                                                          'lastUpdate'  => $created));
        }
    }//end of function 
	
	function getRandomStr($_needed_word)
	{
		$_arr = str_word_count($this->content,1);
		$from = rand(1, count($_arr)-20);
		$out = array_slice($_arr, $from, $_needed_word);  
		return implode(" ", $out);
	}
	
	
	function _insertCategory()
	{
		$count = 1;
		
		$arr = array('en', 'ru', 'it');
		
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$cat  = ucfirst($this->getRandomStr(1));
			
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('ppfm_category', array('cat'   => $cat));
        }
    }//end of function 
	
	function _insertEntity()
	{
		$count = 1;
		
		$arr = array('d', 'c');
		
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$type       = $this->getRandomValFromArray($arr);
			$idHolder   = rand(1, $this->neededRecord/3);
			$idCat      = rand(1, $this->neededRecord/3);
			$text       = ucfirst($this->getRandomStr(6));
			$idAccount  = rand(1, $this->neededRecord/3);
			$c          = rand(67, 4000);
			$d          = rand(9, 67);
			$date       = date('Y-m-d', rand(1151704800, time()));
			$idUser     = rand(1, $this->neededRecord/10);
			
            
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('ppfm_entry', array('type'       => $type,
                                                        'idHolder'   => $idHolder,
                                                        'idCat'      => $idCat,
                                                        'text'       => $text,
                                                        'idAccount'  => $idAccount,
                                                        'amount'     => $c . '.' . $d,
                                                        'date'       => $date,
                                                        'idUser'     => $idUser));
       }
    }//end of function 
	
	function _insertHolder()
	{
		$count = 1;
		
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$holder = ucfirst($this->getRandomStr(1));
			
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('ppfm_holder', array('holder'  => $holder));
     	}
    }//end of function 
	
	function _insertTodoList()
	{
		$count = 1;
		
		$arr = array('s', 'p');
		
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$title      = ucfirst($this->getRandomStr(3));
			$progress   = rand(10, 100);
			array_push($this->todo_values, $progress);
			$type       = $this->getRandomValFromArray($arr);
			
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('ppfm_todolist', array('title'         => $title,
                                                           'progress'      => $progress,
                                                           'type'          => $type,
                                                           'status'        => 'o',
                                                           'position'      => $i));
     	}
    }//end of function 
	
	function _insertTodoListItem()
	{
		$count = 1;
		$needed = 4;
		
		for($j = 0; $j <= $this->neededRecord-1; $j++)
		{
			$current_todo_progress = $this->todo_values[$j];
						
			for($i = 1; $i <= $needed; $i++)
			{
				$item                   = ucfirst($this->getRandomStr(3));
				$current_todo_progress  = $this->todo_values[$j];

				$__j = $j+1;
                
                SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('ppfm_todolistitem', array('idTodo'     => $__j,
                                                                   'item'       => $item,
                                                                   'progress'   => $current_todo_progress,
                                                                   'status'     => 'o',
                                                                   'position'   => $i));
			}
		}
    }//end of function 
	
	function _insertUser()
	{
		$count = 1;
		$arr = array('u', 'a');
		$arr2 = array('en', 'ru', 'it');
        $arr3 = array('lightness', 'darkness', 'smoothness', 'redmond');
		$__roles = array('r0002', 'r0003', 'r0004');
		
		for($i = 1; $i <= $this->neededRecord; $i++)
		{
			$lang       = $this->getRandomValFromArray($arr2);
			$type       = $this->getRandomValFromArray($arr);
			$name       = ucfirst($this->getRandomStr(1));
			$lastname   = ucfirst($this->getRandomStr(1));
			$email      = strtolower(random_string('alnum', 10)).'@'.strtolower(random_string('alnum', 20)).'.'.strtolower(random_string('alnum', 3));
			$username   = ucfirst(strtolower(random_string('alnum', 20)));
			$pwd        = '098f6bcd4621d373cade4e832627b4f6';
            $curTheme   = $this->getRandomValFromArray($arr3);
            
            if($i == 1) {
                $name = $username = 'admin';
                $type = 'a';
                $email= 'shinswtest@gmail.com';    
            }
            
            if($i == 2) {
                $name = $username = 'test';
                $type = 'u';
                $email= 'shinswtest@gmail.com';
            }
			
			//$role_1 = $this->getRandomValFromArray($__roles);
			$role_1 = 'r0001';
			$role_2 = $this->getRandomValFromArray($__roles);
			
			
			 $role_3 = $role_4 = $role_5 = $role_6 = $role_7 = $role_8 = $role_9 = $role_10 = NULL;
            
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('sys_user', array('lang'        => $lang,
                                                      'type'        => $type,
                                                      'name'        => $name,
													  'role_1'		=> $role_1,
													  'role_2'		=> $role_2,
													  'role_3'		=> $role_3,
													  'role_4'		=> $role_4,
													  'role_5'		=> $role_5,
													  'role_6'		=> $role_6,
													  'role_7'		=> $role_7,
													  'role_8'		=> $role_8,
													  'role_9'		=> $role_9,
													  'role_10'		=> $role_10,
                                                      'lastname'    => $lastname,
                                                      'email'       => $email,
                                                      'username'    => $username,
                                                      'pwd'         => $pwd,
                                                      'theme'       => $curTheme));
       }
    }//end of function 
    
    function _insertPanels(){


        // main page of ppfm    
        $data   =  array(array('panel_id' => 'p1', 'panel_header' => 'lng_label_month_situation',       'collapsed' => 0, 'maximized'    =>  0, 'style' => '', 'order' => 0, 'column' => 1, 'color_class' => 'color-white', 'color_border_class'    =>  'border-color-green',  'color_bg_class'    =>  'bg-color-green'),
                         array('panel_id' => 'p2', 'panel_header' => 'lng_label_year_situation',        'collapsed' => 0, 'maximized'    =>  0, 'style' => '', 'order' => 1, 'column' => 1, 'color_class' => 'color-white', 'color_border_class'    =>  'border-color-green',  'color_bg_class'    =>  'bg-color-green'),
                         array('panel_id' => 'p3', 'panel_header' => 'lng_label_last_registration',     'collapsed' => 0, 'maximized'    =>  0, 'style' => '', 'order' => 0, 'column' => 2, 'color_class' => 'color-white', 'color_border_class'    =>  'border-color-green',  'color_bg_class'    =>  'bg-color-green'),
                         array('panel_id' => 'p4', 'panel_header' => 'lng_label_opened_todos',          'collapsed' => 0, 'maximized'    =>  0, 'style' => '', 'order' => 1, 'column' => 2, 'color_class' => 'color-white', 'color_border_class'    =>  'border-color-green',  'color_bg_class'    =>  'bg-color-green')
                         );    
        
        foreach($data as $item) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('ppfm_panellist', $item);    
        }
        
        
        // examples page
        $data   =  array(array('panel_id' => 'feeds',       'panel_header' => 'header1',  'collapsed' => 0, 'maximized'    =>  0, 'style' => '', 'order' => 0, 'column' => 1, 'color_class' => 'color-green',    'color_border_class'    =>  'border-color-green',  'color_bg_class'    =>  'bg-color-green'),
                         array('panel_id' => 'news',        'panel_header' => 'header2',  'collapsed' => 0, 'maximized'    =>  0, 'style' => '', 'order' => 1, 'column' => 1, 'color_class' => 'color-red',      'color_border_class'    =>  'border-color-red',    'color_bg_class'    =>  'bg-color-red'),
                         array('panel_id' => 'shopping',    'panel_header' => 'header3',  'collapsed' => 0, 'maximized'    =>  0, 'style' => '', 'order' => 0, 'column' => 2, 'color_class' => 'color-blue',     'color_border_class'    =>  'border-color-blue',   'color_bg_class'    =>  'bg-color-blue'),
                         array('panel_id' => 'links',       'panel_header' => 'header4',  'collapsed' => 0, 'maximized'    =>  0, 'style' => '', 'order' => 0, 'column' => 2, 'color_class' => 'color-orange',   'color_border_class'    =>  'border-color-orange', 'color_bg_class'    =>  'bg-color-orange'),
                         array('panel_id' => 'images',      'panel_header' => 'header5',  'collapsed' => 0, 'maximized'    =>  0, 'style' => '', 'order' => 1, 'column' => 2, 'color_class' => 'color-yellow',   'color_border_class'    =>  'border-color-yellow', 'color_bg_class'    =>  'bg-color-yellow')
                         );
                             
        foreach($data as $item) {
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('examples_panel', $item);    
        }
    }//end of function 
    
    function _insertFileTracking() {
        
        for($i = 1; $i <= $this->neededRecord; $i++) {
            $fileId     =   rand(1, 20);
            $count      =   rand(1000, 4000);
            $created    =   date('Y-m-d', strtotime('now -' . $i . ' day'));
            
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('examples_file_tracking', array('file_id'      => $fileId,
                                                                     'count'        => $count,
                                                                     'created'      => $created));
       }    
    }//end of function 
    
    function _insertShedule(){
        
        for($i = 1; $i <= $this->neededRecord; $i++) {
            
            $diff         =   rand(2, 10);    
            $startDate    =   date('Y-m-d', strtotime('now +' . $i . ' day'));
            $finishDate   =   date('Y-m-d', strtotime('now +' . $i + $diff . ' day'));  
            
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('examples_schedule', array('startdate'      => $startDate,
                                                              'finishdate'     => $finishDate));
     }    
    }//end of function 
    
    function _insertTags(){
        
        for($i = 1; $i <= $this->neededRecord; $i++) {
            
            $item   = $this->getRandomStr(1);
            $tag    = $this->getRandomStr(1);
            
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('examples_tags', array('file_id' => $i,
                                                           'tag'     => $tag,
                                                           'item'    => $item));
        }    
    }//end of function
    
    function _insertCustomerMasterData(){
        
        $typeArr    =   array('a', 'u');
        
        for($i = 1; $i <= $this->neededRecord; $i++) {
            
            $name               =   ucfirst($this->getRandomStr(1));;    
            $surname            =   ucfirst($this->getRandomStr(1));;
            $company            =   ucfirst($this->getRandomStr(1));;    
            $address            =   ucfirst($this->getRandomStr(1));;    
            $city               =   ucfirst($this->getRandomStr(1));;    
            $date               =   date('Y-m-d', strtotime('now +' . $i . ' day'));    
            $telephone          =   rand(1000000, 4000000);    
            $creditCardNumber   =   rand(1000000, 4000000);    
            $specialNumber      =   rand(1000000, 4000000);
            $debid              =   rand(100, 700) . '.' . rand(9000, 10000);
            $type               =   $this->getRandomValFromArray($typeArr);    
            
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('examples_customer_master_data', array('name'               => $name,
                                                                           'surname'            => $surname,
                                                                           'company'            => $company,
                                                                           'address'            => $address,
                                                                           'city'               => $city,
                                                                           'birth_date'         => $date,
                                                                           'telefon_number'     => $telephone,
                                                                           'credit_card_number' => $creditCardNumber,
                                                                           'special_number'     => $specialNumber,
                                                                           'debit'              => $debid, 
                                                                           'type'               => $type));
        }    
    }//end of function 
	
	///////////////////////////////////////////////////////
	
	function getRandomValFromArray($arr)
	{
		$rand_keys = array_rand($arr, 1);
		return $arr[$rand_keys];
    }//end of function 

    // Auth. functions for setup/admin part /////////////////////////////////////////////
    /**
     * 
     *
     * @access public
     * @param:  array $fields_to_select
     * @return: object SelectQuery.
     */
    function authorize() {
        $this->handleHttpAuth(
            'setup',
            'setup'
        );
    }//end of function 

    /**
     * Check users priv. with type http authorization 
     *
     * @access public
     * @param:  array $fields_to_select
     * @return: object SelectQuery.
     */
    function handleHttpAuth(
        $login, $password, $realm = "Secure Administrator DB area."
    ) {
    	// addodns for fastcgi 
//    	if(SHIN_Core::$_apache_mode == APACHE_TYPE_FASTCGI){
        if(isset($_SERVER['HTTP_AUTHORIZATION']) && !empty($_SERVER['HTTP_AUTHORIZATION'])){
            list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':' , base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));
	    }

        if (
            (!isset($_SERVER["PHP_AUTH_USER"]) || !isset($_SERVER["PHP_AUTH_PW"])) ||
            $_SERVER["PHP_AUTH_USER"] != $login || $_SERVER["PHP_AUTH_PW"] != $password
        ) {
            $this->sendHttpAuthHeaders($realm);
            $this->sendHttpAuthErrorPage();
            exit;
        }
    }//end of function 

    /**
     * Check users priv. with type http authorization 
     *
     * @access public
     * @param:  array $fields_to_select
     * @return: object SelectQuery.
     */
    function sendHttpAuthErrorPage() {
        echo SHIN_Core::$_libs['templater']->displayFile("access_denied");
    }//end of function 

    /**
     * Check users priv. with type http authorization 
     *
     * @access public
     * @param:  array $fields_to_select
     * @return: object SelectQuery.
     */
    function sendHttpAuthHeaders($realm) {
        header("WWW-Authenticate: Basic realm=\"{$realm}\"");
        header("HTTP/1.0 401 Unauthorized");
    }//end of function 
    /////////////////////////////////////////////////////////////////////////////////////
}

?>