<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with customer master data form.
 *
 * @package       ShinPHP framework
 * @subpackage    Example
 * @category      Master Data Record
 * @author        
 */
    
    // include main fw file
    require_once("../shinfw/shinfw.php");
    // array of libs, models, helpers, core components
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url', 'date', 'array', 'validate', 'form'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_JSManager',
                                'SHIN_CSSManager',
                                'SHIN_Database',
                                'SHIN_Input',
                                'SHIN_Language'
                            ),
                        
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Datatable',
                                'SHIN_Session',
                                'SHIN_Message',
                                'SHIN_Autocomplete',
                                'SHIN_Message',
                                'SHIN_Dialog',
                                'SHIN_Maps'
                            ),
                            
                            'models' => array(
                                array('examples_crmmasterdata_model', null, CT_BASE_CLASS),
                                array('examples_crmmasterdata_extended_model', 'examples_crmmasterdata_extended_model'),
                                array('examples_geocity_model', 'examples_geocity_model'),
                                array('examples_geoarea_model', 'examples_geoarea_model'),
                                array('examples_geocountry_model', 'examples_geocountry_model'),
                                array('examples_geoprovince_model', 'examples_geoprovince_model')
                            )
                         );
    
    // init fw core using needed components                 
    SHIN_Core::init($nedded_libs);

    // initialize datatable
    $_element_id    = 'sample_element';
    $_dom_element   = 'datatable';
    $_table_data    = array('ID', 'Company', 'VAT', 'NIN', 'ContactName', 'ContactSurname', 'Address', 'PostalCode', 'Province', 'City', 'Country', 'Tel', 'Fax', 'Mobile', 'Email', 'Website', 'AddInfo', 'UserInsert', 'DataInsert', 'UserMod', 'DataMod', 'Lat', 'Lng', '');
    $_tableclass    = 'display';
    $_display_data  = array();
    
    // init main options for datatable - events, selected fields
    $fnServerData = 'function ( sSource, aoData, fnCallback ) {
                                        aoData.push( { "name": "model_name", "value": "examples_crmmasterdata_model|null|examples_crmmasterdata_model,examples_crmmasterdata_extended_model|examples_crmmasterdata_extended_model" } ),
                                        aoData.push( { "name": "custom_column", "value": "delete" } ),
                                        aoData.push( { "name": "needed_column", "value": "idCustomer,company,vat,nin,contactName,contactSurname,address,postalCode,province,city,examples_geocountry_country,tel,fax,mobile,email,website,addInfo,userInsert,dataInsert,userMod,dataMod,lat,lng" } ),
                                        
                                        $.ajax( {
                                            "dataType": \'json\', 
                                            "type": "POST", 
                                            "url": sSource, 
                                            "data": aoData,
                                            "success": fnCallback
                                        } ); 
                                    }';

    
    // ini ajax source and other datatable events
    $init_options = array(
                                    'sAjaxSource'     => "'".SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/connectors/SHIN_ConnectorJoin.php'."'",
                                    'bProcessing'     => 'true',
                                    'bServerSide'     => 'true',
                                    'fnServerData'    => $fnServerData,
                                    'aoColumns'       => '[null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"bSortable": false }]',
                                    'fnDrawCallback'  => 'datatableRowEvent'
                                );
        
    $datatable = SHIN_Core::$_libs['datatable']->get_instance();
    $datatable->init($init_options);
    
    $data_inject = $datatable->initSSStyle($_dom_element, $_element_id, $_tableclass, $_display_data, $_table_data);
    SHIN_Core::$_jsmanager->addComponent($datatable->render($_element_id));
    
    // get info about user action.
    $action = SHIN_Core::$_input->post('action');
    switch($action) {
        case 'get-record':
            $id         = SHIN_Core::$_input->post('id');
            $data       = SHIN_Core::$_models['examples_crmmasterdata_extended_model']->getRecordById($id);
            
            echo json_encode($data);
            exit();
            
              
            break;
        
        case 'insert-record':
                      SHIN_Core::$_models['examples_crmmasterdata_extended_model']->read_form();
            $result = SHIN_Core::$_models['examples_crmmasterdata_extended_model']->validate_form();
            
            if(empty($result)) {
                $result = SHIN_Core::$_models['examples_crmmasterdata_extended_model']->save();
                
                echo json_encode(array('result'  => true,
                                       'errors'  => null,
                                       'message' => 'Record was successfully inserted.'));    
            } else {
                echo json_encode(array('result'  => false,
                                       'errors'  => $result,  
                                       'message' => ''));    
            }
            
            exit();   
            break;
        
        case 'update-record':
        
                      SHIN_Core::$_models['examples_crmmasterdata_extended_model']->read_form();
            $result = SHIN_Core::$_models['examples_crmmasterdata_extended_model']->validate_form();
            
            if(empty($result)) {
                $result = SHIN_Core::$_models['examples_crmmasterdata_extended_model']->save();
                
                echo json_encode(array('result'  => true,
                                       'errors'  => null,
                                       'message' => 'Record was successfully updated.'));    
            } else {
                echo json_encode(array('result'  => false,
                                       'errors'  => $result,  
                                       'message' => 'Error occure while update record.'));    
            }
            exit();
            break;
        
        case 'delete':
        
            $id =   SHIN_Core::$_input->post('id');
            
            if($id) {
                $result = SHIN_Core::$_models['examples_crmmasterdata_extended_model']->delete($id);
                
                if($result) {
                    echo json_encode(array('result'  => true,
                                           'errors'  => null,
                                           'message' => 'Record was successfully deleted.'));    
                } else {
                    echo json_encode(array('result'  => true,
                                           'errors'  => null,
                                           'message' => 'Error occure while delete record.'));    
                }    
            }
            exit();
            break;
        
        case 'autocomplete':
            $field  =   strtolower(SHIN_Core::$_input->post('field'));
            $value  =   SHIN_Core::$_input->post('term');
            switch($field) {
                case 'vat':
                    $result   =   SHIN_Core::$_models['examples_crmmasterdata_extended_model']->autocompleteVat($value);
                    if(!empty($result)) {
                        $data = array('result' => true);    
                    } else {
                        $data = array('result' => false);
                    }
                    break;
                
                case 'nin':
                    $result   =   SHIN_Core::$_models['examples_crmmasterdata_extended_model']->autocompleteNin($value);
                    if(!empty($result)) {
                        $data = array('result' => true);    
                    } else {
                        $data = array('result' => false);
                    }
                    break;
                
                case 'city':
                    $result   =   SHIN_Core::$_models['examples_geocity_model']->autocompleteCity($value);
                    if(!empty($result)) {
                        $data = $result;    
                    } else {
                        $data = array('result' => '');
                    }
                    break;
                
                case 'cityinfo':
                    $result   =   SHIN_Core::$_models['examples_geocity_model']->getExtendedInfoAboutCity($value);
                    if(!empty($result)) {
                        $data = array('result' => $result);
                    } else {
                        $data = array('result' => '');
                    }
                    break;
            }
            echo json_encode($data);
            exit();
            break;
        
        case 'get-coords':
            $id      =   SHIN_Core::$_input->post('id');
            /**
            *  get data from 3 tables(examples_crmmasterdata, examples_geoprovince, examples_geocountry) using model defination.
            */
            $data    =   SHIN_Core::$_models['examples_crmmasterdata_extended_model']->get_expanded_result(array('where' => 'idCustomer = ' . $id));
            $data    =   $data->row(0, array());
            
            // generate full address for geolocalization
            $address = $data['address'] . ', ' . $data['city'] . ', ' . $data['examples_geoprovince_province'] . ', '. $data['postalCode'] . ', ' . $data['examples_geocountry_country'];
            
            list($lat, $lng, $error) = SHIN_Core::$_models['examples_crmmasterdata_extended_model']->batchGeolocalization($address, $id);
            
            echo json_encode(array('lat' => $lat, 'lng' => $lng, 'error' => $error));
            exit();
            break;
    }
    
    
    /**
    * initialize autocomplete plugin for VAT field
    * init one event with js function for callback
    */
    $options              = array('source'      => 'makeVatAutocomplete');  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#examples_crmmasterdata_vat'));
    
    /**
    *  initialize autocomplete plugin for NIN field
    *  init one event with js function for callback
    */
    $options              = array('source'      => 'makeNinAutocomplete');  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#examples_crmmasterdata_nin'));
    
    /**
    * initialize autocomplete plugin for NIN field
    * init two events with js function for callbak 
    */
    $options              = array('source'      => 'makeCityAutocomplete',
                                  'select'      => 'selectCity');  
    
    $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
    $defaultAutocomplete->init($options);
    
    SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#examples_crmmasterdata_city'));
    
    // init combobox lists
    SHIN_Core::$_libs['templater']->assign('geoCountryList',  SHIN_Core::$_models['examples_geocountry_model']->getCountryList());
    SHIN_Core::$_libs['templater']->assign('geoProvinceList', SHIN_Core::$_models['examples_geoprovince_model']->getProvinceList());
    
    // init main form
    SHIN_Core::$_models['examples_crmmasterdata_extended_model']->fetchByID(0);
    SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['examples_crmmasterdata_extended_model']->write_form());
    
    // init messages and errors blocks
    SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock());
    SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock());
    
    // init delete dialog
    SHIN_Core::$_libs['dialog']->confirm_dialog('delete-dialog', 'Delete record?', null, array('Close' => 'closeDeleteDialog', 'Delete' => 'deleteRecord'));   
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('delete-dialog'));
    
    // init map dialog
    SHIN_Core::$_libs['dialog']->confirm_dialog('map-dialog', 'Client coordinates', null, array('Close' => 'closeMapDialog'));
    SHIN_Core::$_libs['dialog']->init(array('width' => 520));   
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('map-dialog'));
    
    /**
    *  initialize google maps plugin
    *  setup cantainer where map was loaded,
    *  setup with and height of map
    *  show map controls and set top right position
    */
    $maps    = SHIN_Core::$_libs['maps']->get_instance();
    
    $maps->init(array('container'               => 'gmaps', 
                      'width'                   => 500,
                      'height'                  => 500,
                      'zoom'                    => 15,
                      'disableDefaultUI'        => 'true',
                      'navigationControl'       => 'true',
                      'mapTypeControl'          => 'true',
                      'scaleControl'            => 'true',
                      'type_control_position'   => 'TOP_RIGHT'));
    
    SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['maps']->render('gmaps'));
    
    
    // render main example template
    SHIN_Core::finalrender('crm_customer_master_data_geo');
    
    
/* End of file crm_customer_master_data_geo.php */
/* Location: example/crm_customer_master_data_geo.php */