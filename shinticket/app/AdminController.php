<?php

/**
 * shinticket/app/CustomerController.php
 *
 * Realise ticket logic. 
 *
 */

require "CommonController.php";

class AdminController extends CommonController {
    
    /**
     * Constructor.
     *
     * @access public
     * @return void.
     */
    function __construct() {
        
        parent::__construct();
    }
    
    function lists(){
        // init needed libs
        $nedded_libs = array(
                                'help'   => array('form', 'date'),
                                'models' => array(
                                    array('shinticket_customerlist_model', 'shinticket_customerlist_model'),
                                    array('shinticket_applicationlist_model', 'shinticket_applicationlist_model'),
                                    array('shinticket_relappcus_model', 'shinticket_relappcus_model')),
                                'libs'   => array('SHIN_Datatable',
                                                  'SHIN_Dialog',
                                                  'SHIN_Tabs',
                                                  'SHIN_Message',
                                                  'SHIN_Session')
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // add component to the page 
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['tabs']->render('tabs'));
        
        // call action
        $this->customerManage();
        $this->applicationManage();
        $this->relationManage();
        $this->userManage();
        
        // get active tab from session or from request
        SHIN_Core::$_libs['templater']->assign('active_tab', isset($_REQUEST['tab']) ? $_REQUEST['tab'] : SHIN_Core::$_libs['session']->userdata('active_tab'));
        
        
        // reset active tab to default
        SHIN_Core::$_libs['session']->set_userdata('active_tab', 'tabs-1');
        
        return 'admin/list-item.tpl';    
    }
    
    /**
    * manage customers
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    function customerManage(){
       

         // get all customer list
        $resultObj    =   SHIN_Core::$_models['shinticket_customerlist_model']->get_expanded_result();
        $customerList =   $resultObj->result_array();
        
         // init ddatatable for drawing ticket list
        $dt = SHIN_Core::$_libs['datatable']->get_instance();
        
        $_tableclass    = 'display';
        $_css_column    = 'gradeC';
        $_element_id    = 'customerList';    
        $_display_data  = array();
        $_table_data    = array(SHIN_Core::$_language->line('lng_label_customer_name'),
                                ''
                                );
        
        // init options for each column
       $init_options    = array('aoColumns'         => '[null,{"bSortable":false}]');
       
       // init options for each column for datatable
       foreach($customerList as $customer) {
           array_push($_display_data, array('csscolumn'  => $_css_column, 
                                            'datacolumn' => array('customerName'    =>  $customer['customerName'],
                                                                  'delete'          =>  '<img src="' . prep_url(shinfw_base_url() . '/' . shinfw_folder() . '/images/') .'delete.png' . '" alt="' . SHIN_Core::$_language->line('lng_label_application_delete') . '" title="' . SHIN_Core::$_language->line('lng_label_application_delete') . '" onclick="deleteCustomer(' . $customer['idCustomer'] . ');" class="shin-pointer" />')));    
       }
       
       // init datatble and render component
       $dt->setLanguage(SHIN_Core::$_current_lang);
       $dt->init($init_options);
       $dt->initDOMStyle($_element_id, $_element_id, $_tableclass, $_display_data, $_table_data);    
       SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
       
       // init notify dialog for delete action
       SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_customer_delete_really'));
       SHIN_Core::$_libs['dialog']->confirm_dialog('delete-customer-dialog', SHIN_Core::$_language->line('lng_label_customer_delete_really'), 'Content', Array(SHIN_Core::$_language->line('lng_label_application_delete_cancel') => 'closeCustomerDialog', SHIN_Core::$_language->line('lng_label_application_delete_ok') => 'deleteCustomerRecord'));
       SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('delete-customer-dialog')); 
    
       
       // initialize form
       $newCustomerForm = SHIN_Core::$_models['shinticket_customerlist_model']->write_form();
        
       // transfer parameters to the view
       SHIN_Core::$_libs['templater']->assign($newCustomerForm);
         
       return null;    
    }
    
    /**
    * add new customer
    * 
    * @access public
    * @param null
    * @return redirect to customer list
    * 
    */
    function customerAdd(){
        // init needed libs
        $nedded_libs = array(
                            'help'   => array('form', 'date'),
                            'models' => array(
                                array('shinticket_customerlist_model', 'shinticket_customerlist_model')
                            )
                       );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $customermodel  =   SHIN_Core::$_models['shinticket_customerlist_model']->get_instance();   
        
        $customermodel->read_form();
        $customermodel->save();
        
        // save active tab
        SHIN_Core::$_libs['session']->set_userdata('active_tab', 'tabs-1');    
        
        redirect(base_url().'/index.php/lists', 'refresh');        
    }
    
    /**
    * delete customer
    * 
    * @access public
    * @param null
    * @return redirect to customer list
    * 
    */
    function customerDelete(){
        
        $customerId  =   SHIN_Core::$_input->post('shinticket_customerlist_idCustomer');
        
        // init needed libs
        $nedded_libs = array(
                                'models' => array(
                                    array('shinticket_customerlist_model', 'shinticket_customerlist_model')
                                )
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $applicationId  =   SHIN_Core::$_input->post('shinticket_applicationlist_idApplication');
                            SHIN_Core::$_models['shinticket_customerlist_model']->deleteRec($customerId);
        
        // save active tab
        SHIN_Core::$_libs['session']->set_userdata('active_tab', 'tabs-1');
        
        redirect(base_url().'/index.php/lists', 'refresh');    
    }
    
    /**
    * manage applications
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    function applicationManage(){
        
       // get all application list
       $resultObj       =   SHIN_Core::$_models['shinticket_applicationlist_model']->get_expanded_result();
       $applicationList =   $resultObj->result_array();
        
       // init ddatatable for drawing ticket list
       $dt = SHIN_Core::$_libs['datatable']->get_instance();
        
       $_tableclass    = 'display';
       $_css_column    = 'gradeC';
       $_element_id    = 'applicationList';    
       $_display_data  = array();
       $_table_data    = array(SHIN_Core::$_language->line('lng_label_application_name'),
                               ''
                               );
                                
       // init options for each column
       $init_options    = array('aoColumns'         => '[null,{"bSortable":false}]');
       
       // init options for each column for datatable
       foreach($applicationList as $application) {
            array_push($_display_data, array('csscolumn'  => $_css_column, 
                                             'datacolumn' => array('applicationName' => $application['applicationName'],
                                                                   'delete'          => '<img src="' . prep_url(shinfw_base_url() . '/' . shinfw_folder() . '/images/') .'delete.png' . '" alt="' . SHIN_Core::$_language->line('lng_label_application_delete') . '" title="' . SHIN_Core::$_language->line('lng_label_application_delete') . '" onclick="deleteApplication(' . $application['idApplication'] . ')" class="shin-pointer" />')));    
       }
       
       // init datatble and render component
       $dt->setLanguage(SHIN_Core::$_current_lang);
       $dt->init($init_options);
       $dt->initDOMStyle($_element_id, $_element_id, $_tableclass, $_display_data, $_table_data);    
       SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
       
       // init notify dialog for delete action
       SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_application_delete_really'));
       SHIN_Core::$_libs['dialog']->confirm_dialog('delete-application-dialog', SHIN_Core::$_language->line('lng_label_application_delete_really'), 'Content', Array(SHIN_Core::$_language->line('lng_label_application_delete_cancel') =>'closeApplicationDialog', SHIN_Core::$_language->line('lng_label_application_delete_ok') => 'deleteApplicationRecord'));
       SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('delete-application-dialog')); 
    
       
       // initialize form
       $newApplicationForm = SHIN_Core::$_models['shinticket_applicationlist_model']->write_form();
        
       // transfer parameters to the view
       SHIN_Core::$_libs['templater']->assign($newApplicationForm);
        
       return null;
    }
    
    /**
    * show shinticket user list
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    function userManage(){
        
        // init needed libs
        $nedded_libs = array(   
                                'help'   => array('form', 'date'),
                                'libs'   => array('SHIN_Datatable',
                                                  'SHIN_Dialog',
                                                  'SHIN_Button'),
                                'models' => array(
                                    array('sys_userrole_model', 'sys_userrole_model'),
                                    array('sys_user_model', 'sys_user_model'),
                                    array('shinticket_user_model', 'shinticket_user_model')
                                )
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // init ddatatable for drawing ticket list
        $shinTicketUserList    = SHIN_Core::$_models['shinticket_user_model']->getCustomerList();
        $dt             = SHIN_Core::$_libs['datatable']->get_instance();
        
        $_tableclass    = 'display';
        $_css_column    = 'gradeC';
        $_element_id    = 'shinTicketList';    
        $_display_data  = array();
        $_table_data    = array('',
                                SHIN_Core::$_language->line('lng_label_sys_shinticket_user_id'),
                                '',
                                SHIN_Core::$_language->line('lng_label_sys_shinticket_customer_id'),
                                '', '');
        
        // init options for each column
        $init_options    = array('aoColumns'         => '[{"bVisible":false}, null, {"bVisible":false}, null, {"bSortable":false}, {"bSortable":false}]');
       
       // init options for each column for datatable
        foreach($shinTicketUserList as &$ticketUser) {
           $ticketUser['delete'] = '<img src="' . prep_url(shinfw_base_url() . '/' . shinfw_folder() . '/images/') .'delete.png' . '" alt="' . SHIN_Core::$_language->line('lng_label_application_delete') . '" title="' . SHIN_Core::$_language->line('lng_label_application_delete') . '" onclick="deleteShinticketUser(' . $ticketUser['userId'] . ', ' . $ticketUser['idCustomer'] . ');" class="shin-pointer" />'; 
           $ticketUser['edit']   = '<img src="' . prep_url(shinfw_base_url() . '/' . shinfw_folder() . '/images/') .'edit.png'   . '" alt="' . SHIN_Core::$_language->line('lng_label_application_edit') . '" title="' . SHIN_Core::$_language->line('lng_label_application_edit') . '" onclick="editShinticketUser(' . $ticketUser['userId'] . ', ' . $ticketUser['idCustomer'] . ');" class="shin-pointer" />'; 
           array_push($_display_data, array('csscolumn'  => $_css_column, 
                                            'datacolumn' => $ticketUser));    
        }
        
        // init datatble and render component
        $dt->setLanguage(SHIN_Core::$_current_lang);
        $dt->init($init_options);
        $dt->initDOMStyle($_element_id, $_element_id, $_tableclass, $_display_data, $_table_data);    
        SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
        
        // init notify dialog for delete action
        SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_customer_delete_really'));
        SHIN_Core::$_libs['dialog']->confirm_dialog('delete-shinticket-user-dialog', SHIN_Core::$_language->line('lng_label_customer_delete_really'), 'Content', Array(SHIN_Core::$_language->line('lng_label_sys_user_cancel') => 'closeDeleteDialog', SHIN_Core::$_language->line('lng_label_sys_user_delete_ok') => 'deleteShinticketUserRecord'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('delete-shinticket-user-dialog'));
        
        // init edit dialog
        SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_shintiket_user_edit'));
        SHIN_Core::$_libs['dialog']->init(array('width' => 450));
        SHIN_Core::$_libs['dialog']->confirm_dialog('edit-shinticket-user-dialog', SHIN_Core::$_language->line('lng_label_shintiket_user_edit'), 'Content', Array(SHIN_Core::$_language->line('lng_label_sys_user_edit_cancel') => 'closeShinticketUserEditDialog', SHIN_Core::$_language->line('lng_label_sys_user_edit_ok') => 'saveShinticketUserInfo'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('edit-shinticket-user-dialog'));
        
        
        // init add dialog
        SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_shintiket_user_add_title'));
        SHIN_Core::$_libs['dialog']->init(array('width' => 450));
        SHIN_Core::$_libs['dialog']->confirm_dialog('add-shinticket-user-dialog', SHIN_Core::$_language->line('lng_label_shintiket_user_add_title'), 'Content', Array(SHIN_Core::$_language->line('lng_label_sys_user_add_cancel') => 'closeShinticketUserAddDialog', SHIN_Core::$_language->line('lng_label_sys_user_add_ok') => 'saveNewShinticketUserInfo'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('add-shinticket-user-dialog'));
        
        // init add button
        // add click event to the button
        $options    = array('click' => 'return showAddShinticketUserDialog',
                            'label' => '"' . SHIN_Core::$_language->line('lng_label_sys_user_add') . '"');
        // init component using needed options
        SHIN_Core::$_libs['button']->init($options);
        
        // add component to the page
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['button']->render('#add-shin-user-button'));
        
    }
    
    /**
    * add new pplication
    * 
    * @access public 
    * @param null
    * @return redirect to application list
    * 
    */
    function applicationAdd(){
        // init needed libs
        $nedded_libs = array(
                            'help'   => array('form', 'date'),
                            'models' => array(
                                array('shinticket_applicationlist_model', 'shinticket_applicationlist_model')
                            )
                       );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $customermodel  =   SHIN_Core::$_models['shinticket_applicationlist_model']->get_instance();   
        
        $customermodel->read_form();
        $customermodel->save();
        
        // save active tab
        SHIN_Core::$_libs['session']->set_userdata('active_tab', 'tabs-2');    
        
        redirect(base_url().'/index.php/lists', 'refresh');        
    }
    
    /**
    * delete one application
    * 
    * @access public
    * @param null
    * @return redirect to application list
    * 
    */
    function applicationDelete()
	{
        // init needed libs
        $nedded_libs = array(
                                'models' => array(
                                    array('shinticket_applicationlist_model', 'shinticket_applicationlist_model')
                                )
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $applicationId  =   SHIN_Core::$_input->post('shinticket_applicationlist_idApplication');
                            SHIN_Core::$_models['shinticket_applicationlist_model']->deleteRec($applicationId);
                            
        // save active tab
        SHIN_Core::$_libs['session']->set_userdata('active_tab', 'tabs-2');
            
        
        redirect(base_url().'/index.php/lists', 'refresh');
    }

    /**
     * Manage relation between application and customer.
     *
     * @access public
     * @return void.
     */
    function relationManage()
	{
		// get all customer list
		$resultObj      =   SHIN_Core::$_models['shinticket_customerlist_model']->get_expanded_result();
        $customerList   =   $resultObj->result_array();
        
        // get all application list
        $resultObj       =   SHIN_Core::$_models['shinticket_applicationlist_model']->get_expanded_result();
        $applicationList =   $resultObj->result_array();
        
         // init ddatatable for drawing ticket list
        $dt = SHIN_Core::$_libs['datatable']->get_instance();
        
        $_tableclass    = 'display';
        $_css_column    = 'gradeC';
        $_element_id    = 'customerListRel';    
        $_display_data  = array();
        $_table_data    = array(SHIN_Core::$_language->line('lng_label_customer_name'),
                                ''
                                );
        
        // init options for each column
       $init_options    = array('aoColumns'         => '[null,{"bSortable":false}]');
       
       // init options for each column for datatable
       foreach($customerList as $customer) {
           array_push($_display_data, array('csscolumn'  => $_css_column, 
                                            'datacolumn' => array('customerName' => $customer['customerName'],
                                                                  'delete'       => '<img src="' . prep_url(shinfw_base_url() . '/' . shinfw_folder() . '/images/') .'edit.png' . '" alt="' . SHIN_Core::$_language->line('lng_label_relation_manage') . '" title="' . SHIN_Core::$_language->line('lng_label_relation_manage') . '" onclick="loadRelations(' . $customer['idCustomer'] . ');" class="shin-pointer" />')));    
       }
       
       // init datatble and render component
       $dt->setLanguage(SHIN_Core::$_current_lang);
       $dt->init($init_options);
       $dt->initDOMStyle($_element_id, $_element_id, $_tableclass, $_display_data, $_table_data);    
       SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
       
       // init manage relations dialog
       SHIN_Core::$_libs['dialog']->set_title(SHIN_Core::$_language->line('lng_label_relation_title'));
       SHIN_Core::$_libs['dialog']->confirm_dialog('manage-relations', SHIN_Core::$_language->line('lng_label_relation_title'), 'Content', Array(SHIN_Core::$_language->line('lng_label_relation_cancel') => 'closeDialog', SHIN_Core::$_language->line('lng_label_relation_save') => 'saveRelations'));
       SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('manage-relations')); 
    
       //init message and error block
       SHIN_Core::$_libs['templater']->assign('jsMessages',  SHIN_Core::$_libs['message']->getMessageBlock());
       SHIN_Core::$_libs['templater']->assign('jsErrors',    SHIN_Core::$_libs['message']->getErrorBlock());
            
       
       //tranfer data to the view
       SHIN_Core::$_libs['templater']->assign('allApplicationList', $applicationList);
	   
	   return 'admin/relation/relation_manage.tpl';
    } // end of function
    
    /**
    * get application list for current customer
    * 
    * @access public
    * @param null
    * @return json data
    * 
    */
    function getCustomerApplicationList(){
        
        // init needed libs
        $nedded_libs = array(
                                'models' => array(
                                        array('shinticket_customerlist_model', 'shinticket_customerlist_model'),
                                        array('shinticket_relappcus_model', 'shinticket_relappcus_model')
                                    )
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $customerId =   isset($_REQUEST['customerId']) ? $_REQUEST['customerId'] : ''; 
        $result     =   array();
        
        if(!empty($customerId)) {
            $result['data'] =   SHIN_Core::$_models['shinticket_customerlist_model']->getCustomerAppLication($customerId);           
        } else {
            $result['data'] =   array();    
        }
        
        echo json_encode($result);
        exit();            
    }
    
    /**
    * save new customer application list
    * 
    * @access public
    * @param null
    * @return json result
    * 
    */
    function saveCustomerApplicationList()
	{        
		$_ret_result	= TRUE;
		$_ret_messg		= 'lng_label_relation_save_ok';
		
        $customerId         =   isset($_REQUEST['customerId'])      ? $_REQUEST['customerId']       : '';        
        $applicationList    =   isset($_REQUEST['applicationList']) ? $_REQUEST['applicationList']  : '';
        $result             =   array();
		
		// 1. need delete old relation
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idCustomer', $customerId);
		SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->delete('shinticket_relappcus'); 		
		
		// 2. add received parameters
		if($applicationList){
			$_applicationListArr = explode(',', $applicationList);
		
			foreach($_applicationListArr as $appID)
			{
				$data = array(
						'idCustomer'	=> $customerId,
						'idApplication'	=> $appID,
	            );
				
				SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->insert('shinticket_relappcus', $data);
			}
		}
    
        $result['result']   = $_ret_result;
        $result['message']  = SHIN_Core::$_language->line($_ret_messg);
        
        echo json_encode($result); exit();
    }
    
    /**
    * delete user
    * 
    * @access public
    * @param null
    * @return redirect
    * 
    */
    public function deleteUser(){
        
        $sysUserId   =   SHIN_Core::$_input->post('sys-user-id');
        $customerId  =   SHIN_Core::$_input->post('shinticket-customer-id');
        
        // init needed libs
        $nedded_libs = array(
                                'models' => array(
                                    array('shinticket_user_model', 'shinticket_user_model')
                                )
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['shinticket_user_model']->deleteShinticketUser($sysUserId, $customerId);
        
        redirect(base_url().'/index.php/lists?tab=tabs-4', 'refresh');    
    }
    
    /**
    * load user data
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function loadUserInfo(){
        
        $sysUserId  =   SHIN_Core::$_input->post('userId');
        $customerId =   SHIN_Core::$_input->post('customerId');
        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form'),
                                'models' => array(
                                    array('shinticket_user_model', 'shinticket_user_model'),
                                )
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['shinticket_user_model']->fetchByID(array('userId' => $sysUserId, 'idCustomer' => $customerId));
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['shinticket_user_model']->write_form());
        
        return 'admin/user/user-info.tpl';
    }
    
    /**
    * load user empty form
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function loadUserForm(){
        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form'),
                                'models' => array(
                                    array('shinticket_user_model', 'shinticket_user_model'),
                                )
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['shinticket_user_model']->write_form());
        
        return 'admin/user/user-info.tpl';    
    }
    
    /**
    * save user information
    * 
    * @access public
    * @param null
    * @return json result
    * 
    */
    public function saveUserInformation(){
        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form', 'validate', 'array'),
                                'models' => array(
                                    array('shinticket_user_model', 'shinticket_user_model')
                                )
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
                  SHIN_Core::$_models['shinticket_user_model']->oldUserId       =   SHIN_Core::$_input->post('old_user_id');
                  SHIN_Core::$_models['shinticket_user_model']->oldCustomerId   =   SHIN_Core::$_input->post('old_customer_id');
                  SHIN_Core::$_models['shinticket_user_model']->read_form();
        $result = SHIN_Core::$_models['shinticket_user_model']->validate_form();
        
        if(empty($result)) {
            SHIN_Core::$_models['shinticket_user_model']->storeShinticketUser();
            
            echo json_encode(array('result'  => true,
                                   'errors'  => null));    
        } else {
            echo json_encode(array('result'  => false,
                                   'errors'  => $result));    
        }
        exit();    
    }
	
} // end of class
