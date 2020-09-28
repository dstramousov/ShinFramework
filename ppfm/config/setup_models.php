<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

		$_setup_required_model_list = array(
						'models' => array(
								// ppfm application models
								array('ppfm_account_model', 'ppfm_account_model'),
								array('ppfm_category_model', 'ppfm_category_model'),
								array('ppfm_entry_model', 'ppfm_entry_model'),
								array('ppfm_holder_model', 'ppfm_holder_model'),
								array('ppfm_panel_model', 'ppfm_panel_model'),
								array('ppfm_todolist_model', 'ppfm_todoList_model'),
                                array('ppfm_todolistitem_model', 'ppfm_todoListitem_model'),
							),
						'views' => array(
								array('ppfm_v_entry_objects_model', 'ppfm_v_entry_objects_model'),
							),
						);
