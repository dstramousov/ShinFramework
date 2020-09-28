<?php

require "CommonController.php";

class SysShinTicketUserManageController extends CommonController {
   
   
    /**
    * show sys user list
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function sysShinTicketUserManage(){
        
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
        
        return 'sys_manage/list/sys_shinticket_user_manage.tpl'; 
    
    }

    /**
    * delete sys user
    * 
    * @access public
    * @param null
    * @return redirect
    * 
    */
    public function deleteShinticketUser(){
        
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
        
        redirect(base_url().'/sysmanage?tab=ui-tabs-13', 'refresh');    
    }
    
    /**
    * load user data
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function loadShinticketUserInfo(){
        
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
        
        return 'sys_manage/dialog/shinticket-user-info.tpl';
    }
    
    /**
    * load user empty form
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function loadShinticketUserForm(){
        
        // init needed libs
        $nedded_libs = array(   'help'   => array('form'),
                                'models' => array(
                                    array('shinticket_user_model', 'shinticket_user_model'),
                                )
                             );
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['shinticket_user_model']->write_form());
        
        return 'sys_manage/dialog/shinticket-user-info.tpl';    
    }
    
    /**
    * save user information
    * 
    * @access public
    * @param null
    * @return json result
    * 
    */
    public function saveShinticketUserInformation(){
        
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
}

?>
