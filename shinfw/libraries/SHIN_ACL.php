<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_ACL.php
 */


/**
 * ShinPHP framework Privacy library
 *
 * @package        ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link        shinfw/libraries/SHIN_ACL.php
 */

define('CT_PP_FULL_ACCESS', 'full');
define('CT_PP_PARTIAL_ACCESS', 'par');
define('CT_PP_BLOCK_ACCESS', 'block');
define('CT_PP_RONLY_ACCESS', 'r-only');

define('CT_USER', 'user'); 
define('CT_ROLE', 'role'); 

define('CT_AREA', 'Area'); 
define('CT_SUBAREA', 'SubArea'); 
define('CT_APPLICATION', 'Application'); 

class SHIN_ACL extends SHIN_Libs 
{

	/**
	 * 
	 */
	private $userId=NULL;
	
	/**
	 * 
	 */
	private $userCode=NULL;	
	
	/**
	 * 
	 */
	private $userName=NULL;
	
	/**
	 * Role list used by query
	 */
	private $userRoles;
	
	/**
	 * Role list used by some checks into the application
	 */
    private $userRolesArr;
    		
	/**
	 * info about application to authorize
	 */
	private $appData=NULL;
	
	/**
	 * 
	 */
	public $isAuthorized=false;
	
	/**
	 * default access mode
	 */
	private $mode=CT_PP_BLOCK_ACCESS;
	
	/**
	 * 
	 */
	private $menuPolicy=array(CT_AREA => array(), CT_SUBAREA => array(), CT_APPLICATION => array());
	
	/**
	 * 
	 */
	private $appAttrib=array();
	
	/**
	 * 
	 */
	private $workmode;


	/**
	 * information about menu
	 */
	private $sys_menu_information = array();
	
	/**
	 * information about menugrp
	 */
	private $sys_menugrp_information = array();
	
	
    /**
     * Fill internall array on menu grp information.
     *
     * @access private
     * @params NULL
     * @return NULL
     */
	private function _fillMenuGrpInformation()
	{
		//$result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('sys_menugrp', array('idPanel' => $row['idPanel'], 'idGrp' => $row['idGrp']));
		$result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('sys_menugrp');
        foreach ($result->result_array() as $row) {
			array_push($this->sys_menugrp_information, $row);
		}
		
		$result->free_result();
	} // end of function 

    /**
     * Fill internall array on menu information.
     *
     * @access private
     * @params NULL
     * @return NULL
     */
	private function _fillMenuInformation()
	{
		$result = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('sys_menu');
        foreach ($result->result_array() as $row) {
			array_push($this->sys_menu_information, $row);
        }
		$result->free_result();
	} // end of function 
	
	
    /**
     * Cretate Menu Policy main function.
     *
     * @access public
     * @params NULL.
     * @return $granted_links_info ready array for SHIN_Menu visualization.
     */
    public function createMenuPolicy()
    {		
		$this->__fillUserInformation();
		
		$this->userRoles = $this->_getUserRoles();
		
		$this->checkUserPrivMenu(CT_AREA);
              		
		foreach ( $this->menuPolicy[CT_AREA] as $key=>$value ){
			if ($value==CT_PP_PARTIAL_ACCESS) { $this->checkUserPrivMenu(CT_SUBAREA, $key); }
		}                        

       foreach ( $this->menuPolicy[CT_SUBAREA] as $key=>$value ){
			foreach ( $value as $key2=>$value2 ){               
				if ($value2==CT_PP_PARTIAL_ACCESS) { $this->checkUserPrivMenu(CT_APPLICATION, $key, $key2); }
			}
        }   
		$granted_links_info = array();
	
		// Get information about relation between sys_structapplication AND  sys_menurows
		$where = '';
		$_tmp_arr = array();
		foreach($this->menuPolicy[CT_AREA] as $k=>$v){
			if($v != CT_PP_BLOCK_ACCESS)
				array_push($_tmp_arr, $k);
		}
		
		if($_tmp_arr){
			$where	= ' WHERE sys_structapplication.idArea  IN ('.implode(', ', $_tmp_arr).') ';
		} else {
			// TODO Add message for user about situation.
			SHIN_Core::$_libs['auth']->logout(); 
			redirect(shinfw_base_url().'/acces_denied', 'refresh');
		}
		
		$order_by	= ' ORDER BY idMenu, idPanel, idGrp, position ASC';
		
		
		$sql = 'SELECT
					sys_menurows.idMenu,
					sys_menurows.idPanel,
					sys_menurows.idGrp,
					sys_structapplication.idArea,
					sys_structapplication.idSubArea,
					sys_menurows.idApplication,
					sys_structapplication.application,
					sys_structapplication.idModule,
					sys_structapplication.file,
					sys_menurows.newPage,
					sys_menurows.type,
					sys_menurows.position,
					sys_menurows.active
				FROM
					sys_menurows 
				INNER JOIN sys_structapplication ON sys_structapplication.idApplication = sys_menurows.idApplication'. $where.$order_by;
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->sys_database]->query($sql);
		
		$_application_folder = '';
		
		$this->_fillMenuInformation();
		$this->_fillMenuGrpInformation();
		
		foreach ($query->result_array() as $row)
		{
			$granted=false;
									
			if (($this->menuPolicy[CT_AREA][$row['idArea']]==CT_PP_FULL_ACCESS)||($this->menuPolicy[CT_AREA][$row['idArea']]==CT_PP_RONLY_ACCESS)) {
				$granted=true;
			} else {
				if ($this->menuPolicy[CT_AREA][$row['idArea']] != CT_PP_BLOCK_ACCESS) {			
                  if (isset($this->menuPolicy[CT_SUBAREA][$row['idArea']][$row['idSubArea']])){
					if (($this->menuPolicy[CT_SUBAREA][$row['idArea']][$row['idSubArea']]==CT_PP_FULL_ACCESS)||($this->menuPolicy[CT_SUBAREA][$row['idArea']][$row['idSubArea']]==CT_PP_RONLY_ACCESS)) { $granted=true; } 
                    else {
						if ($this->menuPolicy[CT_SUBAREA][$row['idArea']][$row['idSubArea']]!=CT_PP_BLOCK_ACCESS) {
							if(isset($this->menuPolicy[CT_APPLICATION][$row['idApplication']])){
								if (($this->menuPolicy[CT_APPLICATION][$row['idApplication']]==CT_PP_FULL_ACCESS)||($this->menuPolicy[CT_APPLICATION][$row['idApplication']]==CT_PP_RONLY_ACCESS))  $granted=true;
							}
						}
					}
                  }
				}
			}
						
			if($granted)
			{
				foreach($this->sys_menu_information as $item)
				{
					if($item['idMenu'] == $row['idMenu'] && $item['idPanel'] == $row['idPanel']){
						$_application_folder =  $item['app_folder_name'];
						$panel_raw =  $item['panel_header'];
					}
				}
				
				// Try to load from new APPLICATION FOLDER NAME 1 file with  menu information.//
				$this->_isMenuLangFileExists($_application_folder);
				////////////////////////////////////////////////////////////////////////////////
				
				$panel_name = SHIN_Core::$_language->line($panel_raw);
				
				// fetch group name ///////////
				foreach($this->sys_menugrp_information as $item)
				{
					if($item['idPanel'] == $row['idPanel'] && $item['idGrp'] == $row['idGrp']){
						$group_name = $item['title'];
						$_group_name = SHIN_Core::$_language->line($group_name);
						if(!$_group_name){$_group_name = $group_name;}
						$group_ico  = $item['ico'];
					}
				}
				///////////////////////////////
	
				$granted_links_info[$panel_name][$_group_name]['ico'] = $group_ico;
				$row['application'] = SHIN_Core::$_language->line($row['application']);
				
				$granted_links_info[$panel_name][$_group_name][$row['idApplication']] = $row;
			} 			
		}				
		$query->free_result();
		
		return $granted_links_info; // wau! :)
		
	} // end of function
	
    /**
     * Check and load only needed language file for get information about menu.
     *
     * @access private
     * @params $app_name string.
     * @return NULL.
     */
	private function _isMenuLangFileExists($app_name)
	{
		$menu_lng_file = 'main_menu.php';
		
		$_requested_file = SHIN_Core::$_config['core']['base_path'].$app_name.DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.SHIN_Core::$_current_lang.DIRECTORY_SEPARATOR.$menu_lng_file;
		if(is_file($_requested_file)){
			SHIN_Core::$_language->directLoad($_requested_file);
		}
	} // end of function
    
    /**
     * Delete empty panel.
     *
     * @access private
     * @params $panelHtmlData array.
     * @params $panelParams array with raw data for panels.
     * @return ready array for panel visualizatiuon.
     */
    private function checkUserPrivMenu($level,$idArea=NULL,$idSubarea=NULL)
    {		
	
        $polUser=false;
        $mode=CT_PP_BLOCK_ACCESS;
        $currArea=NULL;
        $this->userCode = SHIN_Core::$_libs['auth']->user->idUser;
        
        switch($level){
         case CT_AREA: $table='sys_policyarea';
                   $idToCheck='idArea';
				   $moreCheck='';
                   $filter='';
                    break;
         case CT_SUBAREA: $table='sys_policysubarea';
                   $idParent='idArea';
				   $idToCheck='idSubArea';
				   $moreCheck=',idArea';
                   $filter=" AND idArea='".$idArea."' ";
                    break;
         case CT_APPLICATION: $table='sys_policyapplication';
                   $idToCheck='idApplication';
				   $moreCheck='';
                   $filter=" AND idArea='".$idArea."' AND idSubArea='".$idSubarea."' ";
                    break;        
        }
                 
		$sql = "SELECT idElem, type, ".$idToCheck.$moreCheck.", mode  FROM ".$table." WHERE (idElem='".$this->userCode."' OR idElem IN ('".$this->userRoles."')) ".$filter." ORDER BY ".$idToCheck;
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($sql);
        $rows = $query->num_rows();
		
		foreach ($query->result_array() as $row)
		{
            if ($currArea!=$row[$idToCheck]) {
				$currArea=$row[$idToCheck];
				$polUser=false;
			}

			switch($level)
			{
				case CT_APPLICATION:
				case CT_AREA:
				
					if ($row['type']==CT_USER) {
						$this->menuPolicy[$level][$row[$idToCheck]]=$row['mode'];
						$polUser=true;
					} else {    
			
						if (!$polUser) {
							if (isset($this->menuPolicy[$level][$row[$idToCheck]])) {
								$this->menuPolicy[$level][$row[$idToCheck]]=$this->SetMode($row['mode'],$this->menuPolicy[$level][$row[$idToCheck]]);
							} else {
								$this->menuPolicy[$level][$row[$idToCheck]]=$row['mode'];
							}
						}
					}
				
				break;
				
				case CT_SUBAREA:
				
					if ($row['type']==CT_USER) {
						$this->menuPolicy[$level][$row[$idParent]][$row[$idToCheck]]=$row['mode'];
						$polUser=true;
					} else {    
			
						if (!$polUser) {
							if (isset($this->menuPolicy[$level][$row[$idToCheck]])) {
								//$this->menuPolicy[$level][$row[$idParent]][$row[$idToCheck]]
								$this->menuPolicy[$level][$row[$idParent]][$row[$idToCheck]]=$this->SetMode($row['mode'],$this->menuPolicy[$level][$row[$idParent]][$row[$idToCheck]]);
							} else {
								$this->menuPolicy[$level][$row[$idParent]][$row[$idToCheck]]=$row['mode'];
							}
						}
					}
				break;
			} // switch
		}

	} // end of function 
	

    /**
     * Constructor. Init autocomplete with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($mode = 'normal')
    {
		$this->workmode = $mode;
	
		Console::logSpeed('SHIN_ACL begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_ACL. Size of class: ');		
	} // end of function 
	
	
	/**
	 * Make 'search' logic for 
     *
     * @access private
     * @params NULL
     * @return string $ret Compiled Role string.
	 */
	function _searchAppIdByURL($url)
	{
		$ret = NULL;
		
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->like('file', $url, 'before'); 
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('sys_structapplication');

		foreach ($query->result_array() as $row)
		{
			$ret = $row;
		}		
		$query->free_result();
		
		return $ret;
	} // end of function 
	
	/**
	 * Make first initialization for ACL library. Fill main variable $this->isAuthorized
     *
     * @access public
     * @params NULL
     * @return NULL.
	 */
	public function init($param=null, $events=null)
	{	
		$this->__fillUserInformation();

		if(SHIN_Core::$_config['core']['phys_folder_name']!=''){
			$__url = str_replace('/'.SHIN_Core::$_config['core']['phys_folder_name'].'/', '', SHIN_Core::$_input->server('REQUEST_URI'));
		} else {
			$u = SHIN_Core::$_input->server('REQUEST_URI');
			$__url = substr($u, 1, strlen($u));
		}
		
		// small huck. for start page and setup page we are make switch off SHIN_ACL library.
		dump(2);
		if(strtolower(trim($__url)) == 'index.php/start' || strtolower(trim($__url)) == 'index.php/setup'){
			$this->isAuthorized = TRUE;
			return;
		}
				
		// addons for GET parameters ////////////////////
		$_tmp_val = preg_split('/\?/', $__url);
		/////////////////////////////////////////////////
		
		$this->appData = $this->_searchAppIdByURL($_tmp_val[0]);
		
		if(!$this->appData['idApplication']){
			//SHIN_Core::show_error('Not found addlication ID for this URL');
			SHIN_Core::log('debug', 'Not found application ID for this URL');
			redirect(shinfw_base_url().'/index.php/start', 'refresh');
		}
		
		// Define user access level mode to the selected function
		$this->userRoles = $this->_getUserRoles();
	   
		if (strlen($this->userRoles)==0) $this->userRoles="''";	

		$this->_authorizationCheck();
		
	} // end of function
	
	
	/**
	 * Make up User`s role string from session
     *
     * @access private
     * @params NULL
     * @return string $ret Compiled Role string.
	 */
	function _getUserRoles()
	{
		$count_roles_field = 10;			// count fields for keeping roles in to sys_user
		$tmp_arr = array();
		
		for($iterator=1 ; $iterator <=$count_roles_field ; $iterator++)
		{		
			$field_name = 'role_'.$iterator;
			$val = SHIN_Core::$_libs['auth']->user->{$field_name};
			if($val){
				array_push($tmp_arr,$val);
			}
			
		}

		return implode("','", $tmp_arr);
	} // end of function 
	
	
	function __fillUserInformation() 
	{
		$this->userId		= SHIN_Core::$_libs['session']->userdata('MM_Username');
		$this->userCode		= SHIN_Core::$_libs['session']->userdata('MM_UserCodice');
		$this->userName		= SHIN_Core::$_libs['session']->userdata('MM_Nome');
		
		$this->userRoles='';
		$this->userRolesArr=array();
		$foundRole=false;	
	} // end of function 
			
	/**
	 * Make general check for $this->appData parameters can user have acces or not
     *
     * @access private
     * @params NULL
     * @return $this->isAuthorized bool .
	 */
	function _authorizationCheck()
	{
		$mode = $this->checkUserPriv(CT_AREA);

		if (($mode==CT_PP_FULL_ACCESS)||($mode==CT_PP_RONLY_ACCESS)) {
			$this->isAuthorized=true;
		} else {
			if ($mode != CT_PP_BLOCK_ACCESS) {			
				$mode=$this->checkUserPriv(CT_SUBAREA);
				if (($mode==CT_PP_FULL_ACCESS)||($mode==CT_PP_RONLY_ACCESS)) {
					$this->isAuthorized=true;
				} else {
					if ($mode!=CT_PP_BLOCK_ACCESS){
						$mode=$this->checkUserPriv(CT_APPLICATION);
						if (($mode==CT_PP_FULL_ACCESS)||($mode==CT_PP_RONLY_ACCESS))  $this->isAuthorized=true;
					}		  
				}
			}
		}
		
		// for generate menu logic i make return val
		return $this->isAuthorized;
	} // end of function
	
	/**
	 * Build $menuPolicy array, used as input tu build real main menu
     *
     * @access public
     * @params NULL
     * @return NULL.
	 */
	function getGrantedDataForMenu()
	{		
		$granted_links_info = array();
	
		// Get information about relation between sys_structapplication AND  sys_menurows
		$sql = 'SELECT
					sys_menurows.idMenu,
					sys_menurows.idPanel,
					sys_menurows.idGrp,
					sys_structapplication.idArea,
					sys_structapplication.idSubArea,
					sys_menurows.idApplication,
					sys_structapplication.application,
					sys_structapplication.file,
					sys_menurows.newPage,
					sys_menurows.type,
					sys_menurows.position,
					sys_menurows.active
				FROM
					sys_menurows
				INNER JOIN sys_structapplication ON sys_structapplication.idApplication = sys_menurows.idApplication';
				
		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row)
		{
			// Fill $this->appData Struct idApplication, idArea, idSubArea, application			
			$this->appData['idMenu']		= $row['idMenu'];
			$this->appData['idPanel']		= $row['idPanel'];
			$this->appData['idApplication']	= $row['idApplication'];
			$this->appData['idArea']		= $row['idArea'];
			$this->appData['idSubArea']		= $row['idSubArea'];
			$this->appData['application']	= $row['application'];
			$this->appData['file']			= $row['file'];
						
			if($this->_authorizationCheck()){
				// record granted
				array_push($granted_links_info, $row);
			} 			
		}
		
		return $granted_links_info;		
	} // end of function
		
    /**
     * Delete empty panel.
     *
     * @access private
     * @params $panelHtmlData array.
     * @params $panelParams array with raw data for panels.
     * @return ready array for panel visualizatiuon.
     */
	private function checkUserPriv($level)
	{
		$polUser=false;
		$mode=CT_PP_BLOCK_ACCESS;
		$this->userCode = SHIN_Core::$_libs['auth']->user->idUser;
		
		switch($level){
		 case CT_AREA: $table='sys_policyarea';
				   $idToCheck='idArea';
					break;
		 case CT_SUBAREA: $table='sys_policysubarea';
				   $idToCheck='idSubArea';
					break;
		 case CT_APPLICATION: $table='sys_policyapplication';
				   $idToCheck='idApplication';
					break;		
		}
		
		$sql = "SELECT idElem, type, ".$idToCheck.", mode  FROM ".$table." WHERE ".$idToCheck."='".$this->appData[$idToCheck]."' AND (idElem='".$this->userCode."' OR idElem IN ('".$this->userRoles."')) ";
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($sql);
		$rows = $query->num_rows();
			
		$polUser = false;
		foreach ($query->result_array() as $row)
		{ 		
			if($polUser){break;}
			if ($row['type']==CT_USER) //User rules
			  {			   
				$mode=$row['mode'];	$polUser=true; //Exit from loop
			  }
			 else //Role rules
			 { $mode=$this->SetMode($row['mode'],$mode); }
		}

		return $mode;
	} // end of function 
	
	
	/**
	 * Build $menuPolicy array, used as input tu build real main menu
     *
     * @access private
     * @params NULL
     * @return NULL.
	 */
	private function CreaMenuPolicy()
	{
		$this->AcquireMenuAreaPolicy();
	   
		foreach ( $this->menuPolicy['area'] as $key=>$value ) 
	    {
		   if ($value==M_PAR) 
		    {
		      $this->AcquireMenuSubAreaPolicy($key);
			}
		}				
		
	   foreach ( $this->menuPolicy['subArea'] as $key=>$value ) //Arera=>SubArea
	      foreach ( $value as $key2=>$value2 )  //For each subarea
		   {  		     
			 if ($value2 == M_PAR) 
			   {
				  $this->AcquireMenuApplicationPolicy($key, $key2);
			   }
		   }
	} // end of function 	

	/**
	 * 
     *
     * @access private
     * @params NULL
     * @return NULL.
	 */
	public function getMenuPolicy() { return $this->menuPolicy; }	// end of function 
	
	/**
	 * 
     *
     * @access private
     * @params NULL
     * @return NULL.
	 */
	private function AcquireAppData($app_id=1)
	{
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('sys_structapplication', array('idApplication' => $app_id));
		foreach ($query->result_array() as $row){
			$this->appData = $row;
		}
		$query->free_result();		
	} // end of function 

	/**
	 * Apply restrictive rule system when we have different roles with different access level for the same AREA, SUBAREA or APPLICATION
     *
     * @access private
     * @params NULL
     * @return NULL.
	 */
	 
	private function SetMode($newModo, $oldModo)
	{
	
	   $retModo=$oldModo;
	   
	   switch($newModo)
	   {
	      case CT_PP_FULL_ACCESS: { $retModo=CT_PP_FULL_ACCESS; break; }
	      case CT_PP_RONLY_ACCESS:{ if ($oldModo==CT_PP_BLOCK_ACCESS) $retModo=CT_PP_RONLY_ACCESS; break; }
	      case CT_PP_PARTIAL_ACCESS:  { if ($oldModo!=CT_PP_FULL_ACCESS) $retModo=CT_PP_PARTIAL_ACCESS; break; }
	   }
	   
	   return $retModo;
	} // end of function 
	
  
	/**
	 * 
     *
     * @access private
     * @params NULL
     * @return NULL.
	 */
	public function getApplAttrib($atb)
	{
	   if (!empty($this->appAttrib[$atb])) { return $this->appAttrib[$atb]; }
	   else return false;
	} // end of function 

	/**
	 * Chesk if user has only one role
     *
     * @access private
     * @params NULL
     * @return NULL.
	 */
	public function isRole($role,$escl=false)
	{ 
	  if ($escl) 
	  { 
		  if (isset($this->userRolesArr[$role])) 
		    { if (count($this->userRolesArr)==1) return true;  }
		  return false;
	  }
	  else
	  {
   	      if (isset($this->userRolesArr[$role])) return true;  
		  return false;
	  }
	} // end of function 

} // End of class 

/* End of file SHIN_ACL.php */
/* Location: ./libraries/SHIN_ACL.php */               