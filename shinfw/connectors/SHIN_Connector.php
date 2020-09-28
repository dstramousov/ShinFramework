<?php

$connector = new SHIN_Connector();
exit;


/**
 * shinfw\connectors\SHIN_Connector.php
 *
 * This class contain main logic for all datatable connectors .
 *
 * @version 0.1
 * @package SHIN_Connector
 */

class SHIN_Connector
{
	/**
	 * Requested model. 
	 */
	var $req_model = NULL;
	
	/**
	 * Application name. 
	 */
	var $app_model = NULL;
	
	/**
	 * Constructor. Init SHIN_Connector with default values.
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
    public function __construct()
    {
		require_once("../shinfw.php");

		$nedded_libs = array(
								'help' => array('dump', 'url'),
								'core' => array('SHIN_Database', 'SHIN_Log', 'SHIN_Input'),
								'libs' => array(),
							);
                     
		SHIN_Core::init($nedded_libs);
				
		// parse needed params
		$__tmp = SHIN_Core::$_input->post('model_name');
		if(isset($__tmp)){
			$this->req_model = $__tmp;
		} else {
			exit;			
		}
		
						
		// TODO. Need talk about auth modules. Security question!!!
		$this->_fetchData();		
	}
	
	/**
	 * Main data for fetch data from needed model.
     *
     * @access private
     * @params NULL.
     * @return JSON answer.
	 */
	function _fetchData()
	{
		$_ret = NULL;
		$_requested_model_fields = array();		
		
		// First need be sure if requested table exists !
		$tables = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->list_tables();
		if(!in_array($this->req_model, $tables)){
			die('Table not found');
		}
		
		$nedded_libs = array(
                            'models'=> array(array($this->req_model.'_model', $this->req_model))
                         );
						 
		SHIN_Core::postInit($nedded_libs);
		
		// Filling internal structure for fields
		foreach (SHIN_Core::$_models[$this->req_model]->fields as $row=>$data)
		{
			array_push($_requested_model_fields, $row);
		}
		///////////////////////////////////////////////////////////	
		
		/* Paging */
		$sLimit = "";
		$iDisplayStart = SHIN_Core::$_input->post('iDisplayStart');
		if ( isset( $iDisplayStart ) )
		{
			$sLimit = "LIMIT ".SHIN_Core::$_input->post('iDisplayStart') .", ".SHIN_Core::$_input->post('iDisplayLength');
		}
	
		/* Ordering */
		$sOrder = "";
		$iSortCol_0 = SHIN_Core::$_input->post('iSortCol_0');
		if ( isset( $iSortCol_0 ) )
		{
			$sOrder = "ORDER BY ";
			for ( $i=0 ; $i<SHIN_Core::$_input->post('iSortingCols') ; $i++ )
			{
				$sOrder .= $_requested_model_fields[SHIN_Core::$_input->post('iSortCol_'.$i)]." ".SHIN_Core::$_input->post('sSortDir_'.$i).", ";
			}
			$sOrder = substr_replace( $sOrder, "", -2 );
		}
	
		/* Filtering - NOTE this does not match the built-in DataTables filtering which does it
		* word by word on any field. It's possible to do here, but concerned about efficiency
		* on very large tables, and MySQL's regex functionality is very limited
		*/
		$sWhere = "";
		$sSearch = SHIN_Core::$_input->post('sSearch');
		if(isset($sSearch)){
			if ( $sSearch != "" )
			{
				$__tmp_arr = array();
				
				foreach($_requested_model_fields as $field_name){
					array_push($__tmp_arr, $field_name." LIKE '%".SHIN_Core::$_input->post('sSearch')."%' ");
				}
				
				$sWhere = 'WHERE '.implode(" OR ", $__tmp_arr);
			}
		}
		
		$_addons_str = '';
		if(!empty($sWhere)){
			$_addons_str .= $sWhere.' ';
		}
		if(!empty($sOrder)){
			$_addons_str .= $sOrder.' ';
		}
		if(!empty($sLimit)){
			$_addons_str .= $sLimit.' ';
		}
			
		$sQuery = "SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $_requested_model_fields)."
			FROM  ".$this->req_model." ".$_addons_str;
			
		$rResult = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($sQuery);		
	
		////////////////////////////////////////////////////////
		$sQuery = "SELECT FOUND_ROWS() as total";
		
		$rResultFilterTotal = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($sQuery);
		$aResultFilterTotal = $rResultFilterTotal->row_array();
		$iFilteredTotal = $aResultFilterTotal['total'];
		$rResultFilterTotal->free_result();
	
		////////////////////////////////////////////////////////
		$sQuery = " SELECT COUNT(id) as count FROM ".$this->req_model;
		
		$rResultTotal = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query($sQuery);
		$aResultTotal = $rResultTotal->row_array();
		$iTotal = $aResultTotal['count'];
		$rResultTotal->free_result();
		////////////////////////////////////////////////////////
		
		$sOutput = '{';
		$sOutput .= '"sEcho": '.intval(SHIN_Core::$_input->post('sEcho')).', ';
		$sOutput .= '"iTotalRecords": '.$iTotal.', ';
		$sOutput .= '"iTotalDisplayRecords": '.$iFilteredTotal.', ';
		$sOutput .= '"aaData": [ ';
		
		$__arr = array();
		foreach ($rResult->result_array() as $aRow)
		{
			foreach($aRow as $key=>$value){
				$__arr[$key] = '"'.addslashes($value).'",';
			}
			$sOutput .= "[". substr(implode(' ', $__arr), 0, -1) ."],";
		}
		$sOutput = substr_replace( $sOutput, "", -1);
		$sOutput .= '] }';
		$rResult->free_result();
		
		echo $sOutput;
	}
	
} // End of class

/* End of file SHIN_Connector */
/* Location: shinfw/connectors/SHIN_Connector.php */           	