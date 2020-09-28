<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package		ShinPHP framework
 * @author		
 * @copyright	
 * @license		
 * @link		
 * @since		Version 0.1
 * @filesource  shinfw/libraries/SHIN_Datatable.php
 */
 
/**
 * Constants for define inject in the page style. 
 */
define('CT_DOM_INJT_STYLE', 'DOM');
define('CT_JAS_INJT_STYLE', 'JAVASCRIPTS');
define('CT_AJA_INJT_STYLE', 'AJAX');
define('CT_SES_INJT_STYLE', 'SERVERSIDE');


/**
 * ShinPHP framework datatables library. Realise datatable structure data on the page.
 * More information you can find there http://www.datatables.net/
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		shinfw/libraries/SHIN_Datatable.php
 */
class SHIN_Datatable
{
	/**
	 * Options from config/datepicker.php. 
	 */
	var $sh_Options = array();

	/**
	 * Contain all compiled string for browser. 
	 */
	var $injectionString = ''; 

	/**
	 * HTML id for this object. 
	 */
	var $htmlID = ''; 

	/**
	 * Injection style. Possible values: DOM, JS, AJAX, SERVER
	 */
	var $injectStyle = CT_DOM_INJT_STYLE; 

	/**
	 * Injection string with data. Can be NULL. Work only for $this->injectStyle == DOM or $this->injectStyle == JS 
	 */
	var $injectHTMLData = NULL; 
	
	/**
	 * If you need insert DOM data need wrap place with <div id="htmlIDplacedDOMData"></div>
	 */
	var $htmlIDplacedDOMData = NULL; 
	
	/**
	 * Temporary variable for keeping connectors value
	 */
	var $__connectors_val = NULL;

    /**
     * Needed JS for work current libarary
     */
    var $_needed_js = array();
	
	/**
	 * Constructor. Init datepicker with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
    public function __construct()
    {	
        @include(SHIN_Core::isConfigExists('datatables.php'));

        $_prefix = 'js';
        if(SHIN_Core::$_run_mode == RUNNING_MODE_PRODUCTION){
            $_prefix = 'min_js';
        } 
        
        if(isset($datatable_ext[$_prefix]) && !empty($datatable_ext['js'])){
        	$this->_needed_js = $datatable_ext[$_prefix];
            if(SHIN_Core::$_jsmanager){
                SHIN_Core::$_jsmanager->addIncludes($datatable_ext[$_prefix]);
            }
        }
        
        if($datatable_ext['css']){
	        SHIN_Core::$_cssmanager->addIncludes($datatable_ext['css']);
        }
        
        $this->_config_mapper($datatable);

		Console::logSpeed('SHIN_Datatable begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Datatable. Size of class: ');		        
    }
	
	
	/**
	 * Realise second way of initialization for datatable.
	*  ticket http://binary-studio.office-on-the.net/issues/5286
     * @access public
     * @params $_datatable_options Array with data for initialization.
     * @params $_crud_options Array with CRUD object data.
     * @return NIHUIA.
	 */							
    public function smartInit($_datatable_options, $_crud_options = null)
    {		
        $_tableclass    = 'display';
        $_css_column    = 'gradeC';
        $_element_id    = 'dataList' . isset($_datatable_options['tab_name']) ? $_datatable_options['tab_name'] : '';    
        $_dom_element   = isset($_datatable_options['dom_element']) ? $_datatable_options['dom_element'] : 'datatable';
		
		$_where_condition = '';
		if(isset($_datatable_options['where_condition'])){
			$_where_condition = $_datatable_options['where_condition'];
		}
        
        // initialize ajax type of datatable
        $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                            /* Add some extra data to the sender */
                                            aoData.push( { "name": "model_name",      "value": "' . $_datatable_options['model_name'] . '_model|' . $_datatable_options['model_name'] . '_model" } ),
											aoData.push( { "name": "where_condition", "value": "' . $_where_condition . '" } ),
                                            aoData.push( { "name": "needed_column",   "value": "' . implode(',', array_values($_datatable_options['display_data'])) . '"}),';
        if($_crud_options) {
            
            if(isset($_datatable_options['crud_edit']) && $_datatable_options['crud_edit']) {
                $str    =   'edit';
            }
            
            if(isset($_datatable_options['crud_delete']) && $_datatable_options['crud_delete']) {
                $str   .=   ',delete';
            }
            
            $fnServerData .=               'aoData.push( { "name": "custom_column",   "value": "' . $str . '" }),';
        }
        
        if($_crud_options) {
            $fnServerData .=               'aoData.push( { "name": "crud_obj_name",   "value": "' . $_datatable_options['crud_name'] . '" } ),';
        }
        
            $fnServerData .=               '$.ajax( {
                                                "dataType": \'json\', 
                                                "type": "POST", 
                                                "url": sSource, 
                                                "data": aoData,
                                                "success": fnCallback
                                            } );
                                        }';
        
        $aoColumns = array();
        foreach($_datatable_options['display_data'] as $fieldData) {
            if(empty($fieldData)) {
                array_push($aoColumns, $fieldData); 
            } else {
                array_push($aoColumns, 'null'); 
            }        
        }
        
        if($_crud_options && isset($_datatable_options['crud_edit']) && $_datatable_options['crud_edit']) {
            array_push($aoColumns, '{"bSortable":false}');    
        }
        
        if($_crud_options && isset($_datatable_options['crud_delete']) && $_datatable_options['crud_delete']) {
            array_push($aoColumns, '{"bSortable":false}');    
        }
        
        $aoColumns  =   '[' . implode(',', $aoColumns). ']';
        
        $init_options    = array('bProcessing'  => 'true', 
                                 'bServerSide'  => 'true', 
                                 'fnServerData' => $fnServerData,
                                 'aoColumns'    => $aoColumns,
                                 'sAjaxSource'  => $_datatable_options['connector']);
        
        if($_crud_options) {
            array_push($_datatable_options['table_labels'], '', '');
			SHIN_Core::$_jsmanager->insertJSFromFile(array(SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . shinfw_folder() . '/js/crud/crud.class.js'));
        }
        
        $this->setLanguage(SHIN_Core::$_current_lang);
		$this->init($init_options);
        $this->initSSStyle($_dom_element, $_element_id, $_tableclass, $_datatable_options['display_data'], $_datatable_options['table_labels']);
        
        
        
        if($_crud_options){
			//dump($_crud_options);
			// init JS CRUD object
			$crudInitData   =   array('tab_name'            =>   $_crud_options['tab_name'],
                                      'dialog_css_class'    =>   'crud-dialog-class',
                                      'label_delete_action' =>   $_crud_options['label_delete_action'],
                                      'crud_obj_name'       =>   $_datatable_options['crud_name'],
                                      'datatable_name'      =>   $_element_id,
                                      'message_block'       =>   'application-js-message',
                                      'error_block'         =>   'application-js-error',
                                      'error_prefix'        =>   '_error',
                                      'validation_class'    =>   '.validatetion-error');
            
            if(isset($_crud_options['custom_url'])) {
                $crudInitData = array_merge($crudInitData, array('custom_url' => $_crud_options['custom_url']));
            } else {
                $crudInitData = array_merge($crudInitData, array('controller' => $_crud_options['controller']));     
            }
            
            if(!isset(SHIN_Core::$_models[$_datatable_options['model_name']])){
				// init needed libs
				$nedded_libs = array(   
                                'models' => array(array($_datatable_options['model_name'].'_model', $_datatable_options['model_name']))
								);
				SHIN_Core::postInit($nedded_libs);
			}
            
            SHIN_Core::$_libs['templater']->assign('crudData', SHIN_Core::$_models[$_datatable_options['model_name']]->prepareCodeforCRUD($crudInitData));
			
            // dialog initialization for CRUD //////////////////////////////////////////////////
			//dump(SHIN_Core::$_language);
			SHIN_Core::$_libs['dialog']->confirm_dialog_correct(
																	'example-delete-dialog', 
																	SHIN_Core::$_language->line('lng_for_delete_title'), 
																	SHIN_Core::$_language->line('lng_for_delete_title'), 
																	Array('Cnacel' => 'crudObj.params.general.dialogObj.close("delete-dialog")', 'Ok' => 'crudObj.del(null, null)')
																);
			SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('example-delete-dialog'));
    
			// init edit dialog
			SHIN_Core::$_libs['dialog']->init(array('width' => 500));
			SHIN_Core::$_libs['dialog']->confirm_dialog_correct(
																'example-edit-dialog', 
																SHIN_Core::$_language->line('lng_for_edit_title'), 
																null, 
																Array('Cancel' => 'crudObj.params.general.dialogObj.close("edit-dialog")', 'Save' => 'crudObj.write("edit-dialog")')
															);
			SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('example-edit-dialog'));
    
			// init add dialog
			SHIN_Core::$_libs['dialog']->init(array('width' => 450));
			SHIN_Core::$_libs['dialog']->confirm_dialog_correct(
																'example-add-dialog', 
																SHIN_Core::$_language->line('lng_for_add_title'), 
																null, 
																Array('Cancel' => 'crudObj.params.general.dialogObj.close("add-dialog")', 'Add' => 'crudObj.write("add-dialog")')
															);
			SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('example-add-dialog'));
    
			// add component to the page
			SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['button']->render('#add_example_button'));

			// init messages and errors blocks
			SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock());
			SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock());
    
			// init add button
			$options    = array('click' => 'crudObj.openDialog(null, "add"); return false;',
                                'label' => '"Add new record"');
	
			// init component using needed options
			SHIN_Core::$_libs['button']->init($options);
    
			// add component to the page
			SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['button']->render('#add_example_button'));
			///////////////////////////////////////////////////////////////////////////////////
		} // end if
		
		SHIN_Core::$_jsmanager->addComponent($this->render($_element_id));
		
		return;
	} //end of function 



    /**
     * Return array with list of JS for working this library.
     *
     * @access public
     * @params NULL
     * @return array.
     */
    public function getNeededJS() {        
        return $this->_needed_js;
    }
	

	/**
	 * Post init object. You can make for some parameters customization values.
     *
     * @access public
     * @params $params:array
     * @return NULL.
	 */
    public function init($params)
    {
    	array_push(SHIN_Core::$_jsmanager->real_injected, 'datatable');
		$this->injectionString	= '';
		$this->injectHTMLData	= '';
    	$this->_config_mapper($params);
    }
    
    /**
    * set current language for datatable
    * 
    * @param string $lang - full path to language file
    * @access public
    * @return null
    */
    public function setLanguage($lang){
        
        $this->_config_mapper(array('oLanguage' => '{"sUrl": "' . SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . SHIN_Core::$_config['core']['shinfw_folder'] . '/js/datatables/dataTables.' . $lang . '.txt' . '"}'));
            
    }

	/**
	 * Main method for getting ready datepicker string for browser.
     *
     * @access public
     * @params $_htmlID id of DOM element
     * @return NULL.
	 */
    public function render($_htmlID)
    {
		if ($this->injectStyle == CT_JAS_INJT_STYLE){
			// all needed actions is dome because JS type injection works with SHIN_jsmanager - directly, just return 
			return;
		}
	
    	$this->injectionString = '';
    	$this->htmlID = $_htmlID;
		//dump($this->_body());
    	$this->injectionString .= $this->_body();
				
    	return $this->injectionString;
    }
		
	/**
	 * Prepare and init internal structure with data for JavaScript injection style. Used SHIN_Core::$_jsmanager !!!!
     *
     * @access public
     * @params $_element_id ID of HTML element
     * @params $_tableclass CSS class for HTML element
     * @params $_display_data Array with data for visualization
     * @params $_table_data Array with table data. Name of columns, name of table.  TODO: Talk with Stefano about multilanguages.
     * @return NULL.
	 */							
    public function initSSStyle($_dom_element_id, $_element_id, $_tableclass, $_display_data, $_table_data)
    {		
		$this->injectStyle = CT_SES_INJT_STYLE;
		
		$injectedHTML = '<table cellpadding="0" cellspacing="0" border="0" class="display" id="'.$_element_id.'"><thead><tr>';
		foreach($_table_data as $iterator)
		{
			$injectedHTML .= '<th >'.$iterator.'</th>';
		}		
		$injectedHTML .=	'</tr></thead></table>';
		
		SHIN_Core::$_libs['templater']->assign($_dom_element_id, $injectedHTML);
    	return;
	}

	/**
	 * Prepare and init internal structure with data for JavaScript injection style. Used SHIN_Core::$_jsmanager !!!!
     *
     * @access public
     * @params $_element_id ID of HTML element
     * @params $_tableclass CSS class for HTML element
     * @params $_display_data Array with data for visualization
     * @params $_table_data Array with table data. Name of columns, name of table.  TODO: Talk with Stefano about multilanguages.
     * @return NULL.
	 */							
    public function initAJAXStyle($_dom_element_id, $_element_id, $_tableclass, $_display_data, $_table_data)
    {
		$this->injectStyle = CT_AJA_INJT_STYLE;
//		unset($this->sh_Options['sAjaxSource']);

		/*
		
		$('#example').dataTable( {
		"bProcessing": true,
		"sAjaxSource": '../examples_support/json_source.txt'
		} );
*/
		
	}
		
	
	/**
	 * Prepare and init internal structure with data for JavaScript injection style. Used SHIN_Core::$_jsmanager !!!!
     *
     * @access public
     * @params $_element_id ID of HTML element
     * @params $_tableclass CSS class for HTML element
     * @params $_display_data Array with data for visualization
     * @params $_table_data Array with table data. Name of columns, name of table.  TODO: Talk with Stefano about multilanguages.
     * @return NULL.
	 */							
    public function initJSStyle($_dom_element_id, $_element_id, $_tableclass, $_display_data, $_table_data)
    {
		$this->injectStyle = CT_JAS_INJT_STYLE;

		if(isset($this->sh_Options['sAjaxSource'])){
			$this->__connectors_val = $this->sh_Options['sAjaxSource'];
			unset($this->sh_Options['sAjaxSource']);
		}
		
		$injectedHTML = "$('#".$_dom_element_id."').html( '<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"".$_tableclass."\" id=\"".$_element_id."\"></table>' );";
		
		// options for dataTable js object 
		$_temporary = array();
		$_ret = '';
		foreach($this->sh_Options as $p=>$k)
		{
			 array_push($_temporary, "
			 {$p}: {$k}");
		}
		$_ret	.= implode(', ', $_temporary);
		
		// prepare aaData structure 
		$injectedHTML .= '
		$(\'#'.$_element_id.'\').dataTable( {'.$_ret.', "aaData": [';
		
		$_tmp_aadata_arr = array();
		
		foreach($_display_data as $iterator)
		{
			$_tmp = array();
			foreach($iterator['datacolumn'] as $d){ array_push($_tmp, '"'.$d.'"'); }
			array_push($_tmp_aadata_arr, '['.implode(",", $_tmp).']');
		}
		$injectedHTML .= implode(",", $_tmp_aadata_arr);
		$injectedHTML .= '], "aoColumns": [';

		$_tmp_aacolumn_arr = array();
		foreach($_table_data as $iterator)
		{
			array_push($_tmp_aacolumn_arr, '{ "sTitle": "'.$iterator.'" }');
		}
		$injectedHTML .= implode(",", $_tmp_aacolumn_arr);
		$injectedHTML .= ']} );';

		// restore if it`s need previous value
		if(isset($this->__connectors_val)){
			$this->sh_Options['sAjaxSource'] = $this->__connectors_val;
		}
		
		SHIN_Core::$_jsmanager->addComponent($injectedHTML);
	}
	
	/**
	 * Prepare and init internal structure with data for DOM injection style.
     *
     * @access public
     * @params $_wrap_element_id ID of wrapper HTML element.
     * @params $_table_element_id ID of table who is contain all data.
     * @params $_tableclass CSS class for table.
     * @params $_display_data Array with data for visualization.
     * @params $_table_data Array with table data. Name of columns, name of table.  TODO: Talk with Stefano about multilanguages.
     * @return NULL.
	 */
    public function initDOMStyle($_dom_element, $_table_element_id, $_tableclass, $_display_data, $_table_data)
    {
		$this->injectStyle = CT_DOM_INJT_STYLE;
		
		$injectedHTML = '<table cellpadding="0" cellspacing="0" border="0" class="'.$_tableclass.'" id="'.$_table_element_id.'"><thead><tr>';
			foreach($_table_data as $col_name)
			{
				$injectedHTML .= '<th>'.$col_name.'</th>';
			}

		$injectedHTML .= '</tr></thead><tbody>';
	
		foreach($_display_data as $col_name)
		{
			$injectedHTML .='<tr class="'.$col_name['csscolumn'].'">';
			foreach($col_name['datacolumn'] as $_d)
			{
				$injectedHTML .= '<td>'.$_d.'</td>';
			}
			$injectedHTML .= '</tr>';
		}
		$injectedHTML .= '</tbody>';
		
		$injectedHTML .= '<tfoot><tr>';
			foreach($_table_data as $col_name)
			{
				$injectedHTML .= '<th>'.$col_name.'</th>';
			}
		$injectedHTML .= '</tr></tfoot></table>';

		$this->injectHTMLData = $injectedHTML;
		
				
		SHIN_Core::$_libs['templater']->assign($_dom_element, $this->injectHTMLData);
		
    	return;
    }
	

	/**
	 * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return string.
	 */
    protected function _body()
    {
		if($this->injectStyle == CT_DOM_INJT_STYLE)
		{
			if(isset($this->sh_Options['sAjaxSource'])){
				$this->__connectors_val = $this->sh_Options['sAjaxSource'];
				unset($this->sh_Options['sAjaxSource']);
			}			
			unset($this->sh_Options['oSearch']);
		}
	
    	$_ret = 'window.' . $this->htmlID . " = $(\"#{$this->htmlID}\").dataTable({";
        
        $_temporary = array();

		foreach($this->sh_Options as $p=>$k)
		{
			 array_push($_temporary, "{$p}: {$k}");
		}
		$_ret	.= implode(', ', $_temporary);

		$_ret	.= '});';
	
		// restore if it`s need previous value
		if(isset($this->__connectors_val)){
			$this->sh_Options['sAjaxSource'] = $this->__connectors_val;
		}
		
		return $_ret;
    }


	/**
	 * Fill internal array $this->sh_Options with needed values.
     *
     * @access protected
     * @params param:array
     * @return NULL.
	 */
    protected function _config_mapper($param)
    {
    	if($this->sh_Options){
    		// post init customization variables.
    		$this->sh_Options = array_merge((array)$this->sh_Options, (array)$param);
    	} else {
    		// constructor initialization with default values from config file.
    		$this->sh_Options = $param;
    	}
    }

    /**
     * Return pointer for this class.
     *
     * @access public
     * @param NULL
     * @return pointer for this class.
     */
	public function get_instance()
	{
		return $this;
	}

} // End of class 


/**
 * ShinPHP framework. 
 *
 * This utility class realise fnServerData JavaScript logic for SHIN_Datatable with Ajax and ServerSide ijection type.
 *
 * @package		ShinPHP framework
 * @subpackage	Library
 * @author		
 * @link		shinfw/libraries/SHIN_Datatable.php
 */
 
 /*   Sample of usage:
 
 	$fnServerData = 'function ( sSource, aoData, fnCallback ) {
										aoData.push( { "name": "model_name", "value": "FileTracking_model" } ),
										aoData.push( { "name": "action", "value": "fetchTags" } ),
										$.ajax( {
											"dataType": \'json\', 
											"type": "POST", 
											"url": sSource, 
											"data": aoData,
											"success": fnCallback
										} );
									}';

 */
 
class fnServerData
{
	/**
	 * Constructor. Init datepicker with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
	 */
    public function __construct()
    {
	
	}
	
} // End of class 


/* End of file SHIN_Datatable.php */
/* Location: shinfw/libraries/SHIN_Datatable.php */           	