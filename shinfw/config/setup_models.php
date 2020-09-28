<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

		$_setup_required_model_list = array(
						'models' => array(
								// general models
//								array('sys_applicationlist_model', 'sys_applicationlist_model'),
								array('sys_modulelist_model', 'sys_modulelist_model'),
								array('sys_user_model', 'sys_user_model'),
								array('sys_session_model', 'sys_session_model'),
								array('sys_policyapplication_model', 'sys_policyapplication_model'),
								array('sys_policyarea_model', 'sys_policyarea_model'),
								array('sys_structapplication_model', 'sys_structapplication_model'),
								array('sys_structarea_model', 'sys_structarea_model'),
								array('sys_structsubarea_model', 'sys_structsubarea_model'),
								array('sys_userrole_model',	 'sys_userrole_model'),
								array('sys_policysubarea_model', 'sys_policysubarea_model'),
								
								array('sys_menu_model','sys_menu_model'),
								array('sys_menusettings_model','sys_menusettings_model'),
								
								array('sys_menugrp_model','sys_menugrp_model'),
								array('sys_menurows_model','sys_menurows_model'),																
							),
						'views' => array(
								array('sys_v_policy_objects_model','sys_v_policy_objects_model'),
							),
						);
