<?php

require "CommonController.php";

class ExampleController extends CommonController {
    
    protected $modelName  =   'jqmobile_example_model';
    
    function __construct()
    {
        parent::__construct();
    }

    public function index() {
        
        SHIN_Core::$_current_lang   =   'en';
        
        SHIN_Core::$_language->load('app');
        
        if($this->mobileDetect()) {
            // array of libs, models, helpers, core components
            $nedded_libs = array('help'   => array('dump', 'url', 'form', 'string'),
                                 'libs'   => array('SHIN_JQueryMobile', 'SHIN_Session'),
                                 'models' => array(array($this->modelName, $this->modelName)));
            
            // init fw core using needed components.
            SHIN_Core::postInit($nedded_libs);
            
            SHIN_Core::$_models['jqmobile_example_model']->printCollectionObjects();
            
            return 'mobile_example.tpl';
        
        }
            
            $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'form', 'date', 'array'
                            ),
               
                            'libs' => array(
                                'SHIN_Datatable',
                                'SHIN_Dialog',
                                'SHIN_Message',
                                'SHIN_Button'
                            ));
    
            // init fw core using needed components                 
            SHIN_Core::postInit($nedded_libs);
            
            $init_data = array(
                                'tab_name'      => 'jqmobile_example',
                                'model_name'    => 'jqmobile_example',
                                'dom_element'   => 'domelement',
                                'crud_edit'     => true,
                                'crud_delete'   => true,
                                'crud_name'     => 'crudObj',
                                'connector'     => '"' . SHIN_Core::$_config['core']['shinfw_base_url'] . '/' . shinfw_folder()  . '/connectors/SHIN_CorrectConnectorJoin.php' . '"',
                                'display_data'  => array('id', 'customer', 'bill', 'note'),
                                'table_labels'  => array('ID', 'Customer', 'Bill', 'Note')
            );
            
            $crud_data = array('tab_name'              => 'example',
                               'controller'            => 'example',  
                               'label_delete_action'   => 'lng_label_delete_really',
                               'lng_for_delete'        => 'lng_label_delete_really',
                               'lng_for_edit'          => 'lng_label_edit_really',
                               'lng_for_add'           => 'lng_label_add_really',                        
                               ); 
            
            SHIN_Core::$_libs['datatable']->smartInit($init_data, $crud_data);
        
            return 'pc_example.tpl';
    }
    
    public function addCustomer(){
        
        $customer   =   SHIN_Core::$_input->globalarr('customer');    
        $bill       =   SHIN_Core::$_input->globalarr('bill');    
        $notes      =   SHIN_Core::$_input->globalarr('notes'); 
        
        $result     =   false;
        
        if(!empty($customer) && !empty($bill) && !empty($notes)) {
            
            $nedded_libs = array('models' => array(array($this->modelName, $this->modelName)));
    
            // init fw core using needed components                 
            SHIN_Core::postInit($nedded_libs);
            
            $result = SHIN_Core::$_models[$this->modelName]->addCustomer(array('customer' => $customer, 'bill' => $bill, 'note' => $notes));        
        
        }
        
            echo json_encode(array('result' => $result)); exit();   
    }
    
    
    /**
    * delete customer
    * 
    * @access public
    * @param null
    * @return redirect
    * 
    */
    public function delete(){
        
        // init needed libs
        $nedded_libs = array(
                                'models' => array(array($this->modelName, $this->modelName))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $keys   =   !is_array(SHIN_Core::$_models[$this->modelName]->primary_key) ? (array)SHIN_Core::$_models[$this->modelName]->primary_key : SHIN_Core::$_models[$this->modelName]->primary_key;
        $where  =   array();
        foreach($keys as $key) {
            $where[$key]    =   SHIN_Core::$_input->post($key);    
        }
        
        $result = SHIN_Core::$_models[$this->modelName]->deleteRec($where);
        
        echo json_encode(array('result' => $result, 'message' => SHIN_Core::$_language->line('lng_label_delete_success'))); exit();
    }
    
    /**
    * read data
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function read(){
        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'date'),
                                'models' => array(array($this->modelName, $this->modelName))         
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        if(is_array(SHIN_Core::$_models[$this->modelName]->primary_key)) {
            $where  =   array();
            foreach(SHIN_Core::$_models[$this->modelName]->primary_key as $key) {
                $where[$key]    =   SHIN_Core::$_input->post($key);    
            }
        } else {
            $where  =   SHIN_Core::$_input->post(SHIN_Core::$_models[$this->modelName]->primary_key);   
        }
        
        
        SHIN_Core::$_models[$this->modelName]->fetchByID($where);
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models[$this->modelName]->write_form());
        
        return 'customer-info.tpl';
    }
    
    /**
    * save user information
    * 
    * @access public
    * @param null
    * @return json result
    * 
    */
    public function create(){
        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array($this->modelName, $this->modelName))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models[$this->modelName]->read_form();
        SHIN_Core::$_models[$this->modelName]->save();
        
        echo json_encode(array('result' => true, 'message' => SHIN_Core::$_language->line('lng_label_create_success'))); exit();
    
    }
    
    /**
    * save user information
    * 
    * @access public
    * @param null
    * @return json result
    * 
    */
    public function validate(){
        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array', 'date'),
                                'models' => array(array($this->modelName, $this->modelName))
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
                  SHIN_Core::$_models[$this->modelName]->read_form();
        $result = SHIN_Core::$_models[$this->modelName]->validate_form();
        
        if(empty($result)) {
            echo json_encode(array('result'  => true,
                                   'errors'  => null));    
        } else {
            echo json_encode(array('result'  => false,
                                   'errors'  => $result));    
        }
        exit();
        
    }
    
    public function map(){
        
        if($this->mobileDetect()) {
        
            // array of libs, models, helpers, core components
            $nedded_libs = array('help'   => array('dump', 'url', 'form', 'string'),
                                 'libs'   => array('SHIN_JQueryMobile', 'SHIN_Session'),
                                 'models' => array(array('jqmobile_map_example_model', 'jqmobile_map_example_model')));
            
            // init fw core using needed components.
            SHIN_Core::postInit($nedded_libs);
            
                SHIN_Core::$_models['jqmobile_map_example_model']->printCollectionObjects();
            
            return 'mobile_map.tpl';     
        }
            
            $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'form', 'date', 'array'
                            ),
               
                            'libs' => array(
                                'SHIN_Datatable',
                                'SHIN_Dialog',
                            ));
    
            // init fw core using needed components                 
            SHIN_Core::postInit($nedded_libs);
            
            // get instance of datatable component
            $dt = SHIN_Core::$_libs['datatable']->get_instance();
            
            $_element_id    = 'sample_element3';
            $_dom_element   = 'ssstylemustbehere';
            $_table_data    = array('Id', 'Customer', 'Lat', 'Lng');
            $_tableclass    = 'display';
            $_display_data  = array();
            
            $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                                /* Add some extra data to the sender */
                                                aoData.push( { "name": "model_name", "value": "jqmobile_map_example_model|jqmobile_map_example_model" } ),
                                                aoData.push( { "name": "needed_column", "value": "id,customer,lat,lng" } ),
                                            
                                                $.ajax( {
                                                    "dataType": \'json\', 
                                                    "type": "POST", 
                                                    "url": sSource, 
                                                    "data": aoData,
                                                    "success": fnCallback
                                                } );
                                            }';

            
            $init_options    = array('bProcessing'  => 'true', 
                                     'bServerSide'  => 'true', 
                                     'fnServerData' => $fnServerData, 
                                     'sAjaxSource'  => "'".SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/connectors/SHIN_CorrectConnectorJoin.php'."'");    
            $dt->init($init_options);
            
            $data_inject = $dt->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
            SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
            
            
            // init map dialog
            SHIN_Core::$_libs['dialog']->confirm_dialog('map-dialog', 'Client coordinates', null, array('Close' => 'closeMap'));
            SHIN_Core::$_libs['dialog']->init(array('width' => 520, 'modal' => 'false'));   
            SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('map-dialog'));
            
            return 'pc_map.tpl';
        
            
    }
} // end of class

?>
