<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

		$_setup_required_model_list = array(
						'models' => array(
								array('shinticket_applicationlist_model', 'shinticket_applicationlist_model'),
								array('shinticket_customerlist_model', 'shinticket_customerlist_model'),
								array('shinticket_relappcus_model', 'shinticket_relappcus_model'),
								array('shinticket_ticket_model', 'shinticket_ticket_model'),
								array('shinticket_ticketdetails_model', 'shinticket_ticketdetails_model'),
                                array('sys_user_model', null, CT_BASE_CLASS),
								array('shinticket_user_model', 'shinticket_user_model'),
							),
						);
