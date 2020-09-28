<?php
date_default_timezone_set("Europe/Kiev");
    
$connector = new SHIN_ConnectorJoin();
exit;


/**
 * shinfw\connectors\SHIN_ConnectorJoin.php
 *
 * This class contain main logic for all datatable connectors with join logic with model.
 *
 * @version 0.1
 * @package SHIN_ConnectorJoin
 */

class SHIN_ConnectorJoin
{
	/**
	 * Requested model. 
	 */
	var $req_model = NULL;

	/**
	 * Customization fields. 
	 */
	var $customization_fields = array();
	
	/**
	 * Application name. 
	 */
	var $app_model = NULL;
	
	/**
	 * Constructor. Init SHIN_ConnectorJoin with default values.
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
    public function __construct()
    {
		require_once("../shinfw.php");

		$nedded_libs = array(
								'help' => array('dump', 'url', 'date'),
								'core' => array('SHIN_Database', 'SHIN_Log', 'SHIN_Input'),
								'libs' => array('SHIN_Constants'),
							);
                     
		SHIN_Core::init($nedded_libs);
				
		$__tmp = SHIN_Core::$_input->post('model_name');
		if(isset($__tmp)){
			$this->req_model = explode(",", $__tmp);
		} else {
			exit;			
		}
		
		$__tmp = SHIN_Core::$_input->post('custom_column');
        if($__tmp){
			$this->customization_fields = explode(',', $__tmp);
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
	
		$req_model_alias = null;
	
		// 1. need load model
		$n_l = array();
		foreach($this->req_model as $model_data){
			$_tmp_arr = preg_split("/\|/", $model_data);
			
			if($_tmp_arr[1] == 'null'){
				array_push($n_l, array($_tmp_arr[0], null, CT_BASE_CLASS));
			} else {
				array_push($n_l, array($_tmp_arr[0], $_tmp_arr[1]));
			}
		}
		
		$req_model_alias = $_tmp_arr[1];
		
		$nedded_libs = array('models'=> $n_l);
		
		SHIN_Core::postInit($nedded_libs);
		
		if(!isset(SHIN_Core::$_models[$req_model_alias])){
			exit;
		}
			
		$sOutput = SHIN_Core::$_models[$req_model_alias]->fetchPagingData($this->customization_fields);
				
		echo $sOutput;
	}
	
} // End of class

/* End of file SHIN_ConnectorJoin */
/* Location: shinfw/connectors/SHIN_ConnectorJoin.php */           	