<?php

/**
 * shinticket/app/TicketController.php
 *
 * Realise ticket logic. 
 *
 */

require "CommonController.php";

class TicketController extends CommonController
{
    
    /**
     * Constructor.
     *
     * @access public
     * @return void.
     */
    function __construct()
    {
        parent::__construct();
    }


    /**
     * Make logic for "save" OR "update" for some ticket.
     *
     * @access public
     * @return integer Error or Succsessfull.
     */
    public function ticketStore()
    {	
        $nedded_libs = array('help' => array('date', 'validate'), 'models' => array(array('shinticket_ticket_model', 'shinticket_ticket_model')), 'libs' => array('SHIN_session'));
        SHIN_Core::postInit($nedded_libs);
	
        $ticketModel = SHIN_Core::$_models['shinticket_ticket_model']->get_instance();

		          
		          $ticketModel->read_form();
        $result = $ticketModel->validate_form();
        
        if(empty($result)) {
            $ticketModel->save();
        } else {
            // assign error list to the session and some values
            SHIN_Core::$_libs['session']->set_userdata('ticket_errors', $result);
            SHIN_Core::$_libs['session']->set_userdata('ticket_data',   array('title' => $ticketModel->title,
                                                                              'body'  => $ticketModel->body));
        }
        
        if(empty($result)) {
		    redirect(base_url().'/ticket/list', 'refresh');
        } else {
            redirect(base_url().'/ticket/new', 'refresh');    
        }
    }
                       
    /**
     * Print form for input new ticket.
     *
     * @access public
     * @return void redirects if not auth.
     */
    public function newTicket()
    {
    	SHIN_Core::$_libs['seo']->addToTitle('This is a main page');

        // init needed libs
        $nedded_libs = array(
                            'help'   => array('form', 'date'),
                            'models' => array(
                                array('shinticket_ticket_model', 'shinticket_ticket_model'),
                                array('shinticket_relappcus_model', 'shinticket_relappcus_model'),								
                            ),
                            'libs'   => array('SHIN_Text_Editor')
                         );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // restore some values from session
        $ticketData =   SHIN_Core::$_libs['session']->userdata('ticket_data');
        if(!empty($ticketData)) {
            SHIN_Core::$_models['shinticket_ticket_model']->title   =   $ticketData['title'];   
            SHIN_Core::$_models['shinticket_ticket_model']->body    =   $ticketData['body'];
        }
		
		$app_data = array();
		$app_data = SHIN_Core::$_models['shinticket_relappcus_model']->getInfoByCustomerID(SHIN_Core::$_models['shinticket_user_model']->_shticket_idCustomer);
		
		if(!$app_data){
			return 'ticket/new_access_deny.tpl';
		} else {
			SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['shinticket_ticket_model']->write_form());
        
			// get error from session
			SHIN_Core::$_libs['templater']->assign('ticket_errors', SHIN_Core::$_libs['session']->userdata('ticket_errors'));
        
        // clear some session params
        SHIN_Core::$_libs['session']->set_userdata('ticket_errors', array());
        SHIN_Core::$_libs['session']->set_userdata('ticket_data',   array());
        
                
			// render action template
			return 'ticket/new.tpl';    
		}
    }
    
    /**
    * show onw ticket information
    * 
    * @access public
    * @return void
    * 
    */
    public function showTicket()
    {        

    	dump($_SERVER);
        $ticketId   =  $_REQUEST['id'];

        
        if(!empty($ticketId)) {
            // init needed libs
            $nedded_libs = array(
                                'help'   => array('form', 'date'),
                                'models' => array(
                                    array('shinticket_ticket_model', 'shinticket_ticket_model'),
                                    array('shinticket_ticketdetails_model', 'shinticket_ticketdetails_model'),
                                    array('shinticket_applicationlist_model', 'shinticket_applicationlist_model')
                                ),
                                'libs'  =>  array('SHIN_Text_Editor', 'SHIN_Session')
                           );
            // load needed libs
            SHIN_Core::postInit($nedded_libs);
            
            // get ticket details list for current ticket
            $ticketDetailList   =   SHIN_Core::$_models['shinticket_ticketdetails_model']->getDetailsByTicketId($ticketId);
            
            // transfer data to the view
            SHIN_Core::$_models['shinticket_ticket_model']->fetchByID($ticketId);

//           	dump(SHIN_Core::$_models['shinticket_ticket_model']->ticketId);
            if(!isset(SHIN_Core::$_models['shinticket_ticket_model']->ticketId)){
//            	redirect(base_url().'/index.php/ticket/list', 'refresh');
            }

			// 1. body 
            $__body = htmlspecialchars_decode(SHIN_Core::$_models['shinticket_ticket_model']->body);
			
			// 2. priority 
			$__priority = SHIN_Core::$_language->line(SHIN_Core::$_models['shinticket_ticket_model']->fields['priority']['values'][SHIN_Core::$_models['shinticket_ticket_model']->priority]);
            SHIN_Core::$_libs['templater']->assign('shinticket_ticket_priority', $__priority);
			
			// 3. status 
            $__status = SHIN_Core::$_language->line(SHIN_Core::$_models['shinticket_ticket_model']->fields['status']['values'][SHIN_Core::$_models['shinticket_ticket_model']->status]);
            SHIN_Core::$_libs['templater']->assign('shinticket_ticket_status', $__status);
            
            // 4. application 
            SHIN_Core::$_models['shinticket_applicationlist_model']->fetchByID(SHIN_Core::$_models['shinticket_ticket_model']->applicationId);
            SHIN_Core::$_libs['templater']->assign('shinticket_ticket_application_name', SHIN_Core::$_models['shinticket_applicationlist_model']->applicationName);
            
            
            SHIN_Core::$_libs['templater']->assign('userFirstName',                         SHIN_Core::$_libs['auth']->user->name);
            SHIN_Core::$_libs['templater']->assign('userLastName',                          SHIN_Core::$_libs['auth']->user->lastname);
            SHIN_Core::$_libs['templater']->assign('shinticket_ticket_created',             SHIN_Core::$_models['shinticket_ticket_model']->created);
            SHIN_Core::$_libs['templater']->assign('shinticket_ticket_title',               SHIN_Core::$_models['shinticket_ticket_model']->title);
            SHIN_Core::$_libs['templater']->assign('shinticket_ticket_body_html',           $__body);
            SHIN_Core::$_libs['templater']->assign('shinticket_ticket_idTicket',            SHIN_Core::$_models['shinticket_ticket_model']->idTicket);
            SHIN_Core::$_libs['templater']->assign('shinticket_ticket_attachPath',          str_replace('\\', '/', SHIN_Core::$_models['shinticket_ticket_model']->attachPath));
            SHIN_Core::$_libs['templater']->assign('shinticket_ticket_realAttachFileName',  SHIN_Core::$_models['shinticket_ticket_model']->realAttachFileName);
            
            SHIN_Core::$_libs['templater']->assign(SHIN_Core::$_models['shinticket_ticketdetails_model']->write_form());
            
            SHIN_Core::$_libs['templater']->assign('ticketDetailList',   $ticketDetailList);
            
            // restore some values from session
            $ticketDetailData =   SHIN_Core::$_libs['session']->userdata('ticketdetails_data');
            if(!empty($ticketDetailData)) {
                SHIN_Core::$_models['shinticket_ticketdetails_model']->body    =   $ticketDetailData['body'];
                // scroll form to the bottom
                SHIN_Core::$_jsmanager->addIncludes(prep_url(shinfw_base_url() . '/' . shinfw_folder() . '/js/scrollto/jquery.scrollTo-1.4.2-min.js')); 
                SHIN_Core::$_libs['templater']->assign('scroolToBottom', true);
            }
            // get error from session
            SHIN_Core::$_libs['templater']->assign('ticketdetails_errors', SHIN_Core::$_libs['session']->userdata('ticketdetails_errors'));
            
            // clear some session params
            SHIN_Core::$_libs['session']->set_userdata('ticketdetails_errors', array());    
            SHIN_Core::$_libs['session']->set_userdata('ticketdetails_data',   array());    
        
           
            
        }
        
        
        return 'ticket/show.tpl';     
    }
    
    /**
    * save new replay
    * 
    * @param null
    * @access public
    * @return redirect to the show action
    * 
    */
    public function storeReply(){
        
        // init needed libs
        $nedded_libs = array(
                            'help'   => array('form', 'date', 'url'),
                            'models' => array(
                                array('shinticket_ticketdetails_model', 'shinticket_ticketdetails_model')
                            ),
                            'libs'   => array('SHIN_Session')
                       );
					   
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $ticketDetailModel  =   SHIN_Core::$_models['shinticket_ticketdetails_model']->get_instance();
        
                  $ticketDetailModel->read_form();
        $result = $ticketDetailModel->validate_form();
        
        if(empty($result)) {
            $ticketDetailModel->save();
        } else {
            // assign error list to the session and some values
            SHIN_Core::$_libs['session']->set_userdata('ticketdetails_errors', $result);
            SHIN_Core::$_libs['session']->set_userdata('ticketdetails_data',   array('body'  => $ticketDetailModel->body));    
        }
        
        redirect(base_url().'/index.php/ticket/show?id=' . $ticketDetailModel->idTicket, 'refresh');
    }
        
    /**
     * Print page for review all of the ticket for current user
     *
     * @access public
     * @return void .
     */
    public function ticketList(){

    	dump($_REQUEST);
        
        // get filter param from POST and GET array
        $status     = isset($_REQUEST['filter']) ? $_REQUEST['filter'] : SHIN_Core::$_input->post('status-sort');
        
        $priority   = SHIN_Core::$_input->post('priority-sort');  
        $application= SHIN_Core::$_input->post('application-sort');  
        
        // init needed libs
        $nedded_libs = array(
                            'help'   => array('string'),
                            'models' => array(
                                array('shinticket_ticket_model', 'shinticket_ticket_model'),
                                array('shinticket_ticketdetails_model', 'shinticket_ticketdetails_model')
                            ),
                            'libs'   => array('SHIN_Datatable', 'SHIN_Autocomplete')
                         );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        // get all ticket list
        $ticketList =   SHIN_Core::$_models['shinticket_ticket_model']->getTicketList($status, $priority, $application);
        
        // init ddatatable for drawing ticket list
        $dt = SHIN_Core::$_libs['datatable']->get_instance();
        
        $_tableclass    = 'display';
        $_css_column    = 'gradeC';
        $_element_id    = 'ticketList';    
        $_display_data  = array();
        $_table_data    = array('',
                                SHIN_Core::$_language->line('lng_label_datatable_id_ticket'),
                                SHIN_Core::$_language->line('lng_label_datatable_title'),
                                SHIN_Core::$_language->line('lng_label_datatable_body'),
                                SHIN_Core::$_language->line('lng_label_datatable_priority'),
                                SHIN_Core::$_language->line('lng_label_datatable_status'),
                                SHIN_Core::$_language->line('lng_label_datatable_application'),
                                SHIN_Core::$_language->line('lng_label_datatable_created'),
                                SHIN_Core::$_language->line('lng_label_datatable_updated'));
       
       // init options for each column
       $init_options    = array('aoColumns'         => '[{"bSortable":false},null,null,null,{"bVisible":false},{"bSortable":true},null,null,null]',
                                'fnRowCallback'     =>  'fnRowCallback');   
        
        
        // fetch needed data for visualization
        if(!empty($ticketList)) {
            foreach($ticketList as &$ticket) {
                // get count details for each ticked
                $count              =   SHIN_Core::$_models['shinticket_ticketdetails_model']->getCountDetailsByTicketId($ticket['idTicket']);
                $image              =   $count > 0 ? '<img src="' . SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/details_open.png" class="ticket-with-details">' : '<img src="' . SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/details_empty.png" class="ticket-without-details">'; 
                // add link to show action
                $ticket['title']    =   '<a href="' . prep_url(base_url() . '/ticket/show?id=' . $ticket['idTicket'] . '"') . '>' . $ticket['title'] . '</a>';
                array_unshift($ticket, $image);
                array_push($_display_data, array('csscolumn'  => $_css_column, 
                                                 'datacolumn' => $ticket));
            }
        }
        
        // init datatble and render component
        $dt->setLanguage(SHIN_Core::$_current_lang);
        $dt->init($init_options);
        $dt->initDOMStyle($_element_id, $_element_id, $_tableclass, $_display_data, $_table_data);    
        SHIN_Core::$_jsmanager->addComponent($dt->render($_element_id));
        
        // add comboboxes for priority and status
        SHIN_Core::$_libs['templater']->assign('priorityList', SHIN_Core::$_models['shinticket_ticket_model']->getPriorityList());
        SHIN_Core::$_libs['templater']->assign('statusList', SHIN_Core::$_models['shinticket_ticket_model']->getStatusList());
        
        // transfer filter param ti the view
        SHIN_Core::$_libs['templater']->assign('currentPriority', $priority);
        SHIN_Core::$_libs['templater']->assign('currentStatus',   $status);
        SHIN_Core::$_libs['templater']->assign('currentApplication',   $application);
         
         // add autocomplete apllication field
        $options              = array('source'      => base_url() . '/ticket/ajaxapplicationlist',
                                      'source_type' => 'external');  
        
        $defaultAutocomplete  = SHIN_Core::$_libs['autocomplete']->get_instance();
        $defaultAutocomplete->init($options);
        
        SHIN_Core::$_jsmanager->addComponent($defaultAutocomplete->render('#application-sort'));
            
        
        // render main template
        return 'ticket/list.tpl';    
    }
		
    /**
    * Get ticket details list.
    * 
    * @access public
    * @param null
    * @return json response
    * 
    */
    public function ticketDetailsList() {
        
        // init needed libs
        $nedded_libs = array(
                            'help'   => array('string'),
                            'models' => array(
                                array('shinticket_ticketdetails_model', 'shinticket_ticketdetails_model')
                            ));

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
    
        $ticketId   =   SHIN_Core::$_input->post('ticketId');
        
        if(!empty($ticketId)) {
            // get detail list for current ticket
            $detailList = SHIN_Core::$_models['shinticket_ticketdetails_model']->getDetailsByTicketId($ticketId);
            //return json response to client side
            echo json_encode(array('result' => true,  'message' => '', 'data' => $detailList)); exit();    
        }   
            // return error to client side
            echo json_encode(array('result' => false, 'message' => '', 'data' => null)); exit();    
    }
    
    /**
    * force download
    * 
    * @param null
    * @access public
    * @return file for download
    * 
    */
    public function forceDownload(){
        
        // init needed libs
        $nedded_libs = array('help'   => array('download'));

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
        
        $filePath   =   base_url() . '/' . isset($_REQUEST['path']) ? $_REQUEST['path'] : '';
        $fileName   =   isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
        
        if(file_exists($filePath) && !empty($fileName)) {
            force_download($fileName, file_get_contents($filePath));        
        }
        
        exit(); 
            
    }
    
    /**
    * ajax application autocomplete
    * 
    * @param null
    * @access public
    * @return json
    * 
    */
    public function ajaxApplicationAutocomplete(){
       
        // init needed libs
        $nedded_libs = array(
                            'models' => array(
                                array('shinticket_customerlist_model', 'shinticket_customerlist_model'),
                                array('shinticket_relappcus_model', 'shinticket_relappcus_model')
                            ));

        // load needed libs
        SHIN_Core::postInit($nedded_libs);
       
       $applicationList     = array();
       $jsonResult          = array();
       $application         = isset($_REQUEST['term']) ? $_REQUEST['term'] : null;
       $applicationList     = SHIN_Core::$_models['shinticket_customerlist_model']->getAutocompleteCustomerAppLication($application);
       
       foreach($applicationList as $application) {
           $jsonResult[]    =   $application['applicationName'];
       } 
       
       echo json_encode($jsonResult); exit(); 
    }

} // end of class

?>
