<?php

$lang['lng_label_zero_string']			= "";
$lang['lng_label_incorrect_password']	= "Incorrect password";
$lang['lng_label_user_not_found']		= "User not found";
$lang['lng_label_user_suspended']		= "User was suspended. Contact pls with Administrator";
$lang['lng_label_user_wauth']			= "System waiting from user confirm of authorization";
$lang['lng_label_user_closed']			= "User was closed. ";

$lang['lng_label_system']				= "System component.  ! CAREFULLY !";
$lang['lng_label_system_g']				= 'Database administrator group';
$lang['lng_label_sys_structapplication_setup'] = 'Database Schema Management';
$lang['lng_label_sys_system_management']	= "System Management";

$lang['lng_label_choice_language']	= 'Choice language';
$lang['lng_label_choice_theme']		= 'Choice theme';
$lang['lng_label_logout']           = 'Logout';
$lang['lng_label_main_page']		= 'Exit to home';

$lang['lng_label_delete_panel']     = "Are you really sure to close panel?";
$lang['lng_label_delete_success']   =   'Record was deleted successfully.';
$lang['lng_label_create_success']   =   'Record was created/edited successfully.';

/* -------------------------- sys controller  --------------------------- */
$lang['lng_label_sys_user_manage']                     =   'Sys User';
$lang['lng_label_sys_role_manage']                     =   'Sys Role';
$lang['lng_label_sys_struct_area_manage']              =   'Sys Struct Area';
$lang['lng_label_sys_struct_subarea_manage']           =   'Sys Struct Sub Area';
$lang['lng_label_sys_struct_application_manage']       =   'Sys Struct Application';
$lang['lng_label_sys_struct_policyarea_manage']        =   'Policy Area';
$lang['lng_label_sys_struct_policysubarea_manage']     =   'Policy Sub Area';
$lang['lng_label_sys_struct_policyapplication_manage'] =   'Policy Application';
$lang['lng_label_sys_struct_policyapplication_menu']   =   'Sys Menu';
$lang['lng_label_sys_struct_policyapplication_menugrp']=   'Sys MenuGrp';
$lang['lng_label_sys_struct_policyapplication_menurows']=  'Sys MenuRows';
$lang['lng_label_sys_struct_menusettings']             =   'Menu Default Settings';
$lang['lng_label_sys_log']                             =   'Sys Log';


/* ---------------------- field names for sys roles datatable --------------------*/
$lang['lng_label_sys_role_id']           =   'Id';
$lang['lng_label_sys_role_name']         =   'Rule';
$lang['lng_label_sys_role_grp']          =   'Group';
/* ---------------------- field names for sys roles datatable --------------------*/

$lang['lng_label_sys_role_add']          =   'Add new role'; 
$lang['lng_label_sys_role_edit']         =   'Role Info'; 
$lang['lng_label_sys_role_add_title']    =   'Add new role';
 
$lang['lng_label_sys_userrole_grp_base']    =   'Base'; 
$lang['lng_label_sys_userrole_grp_acc']     =   'Acc';

$lang['lng_label_sys_role_id_empty_validation']  =   ' must be not empty.'; 
$lang['lng_label_sys_role_id_unique_validation'] =   ' must be unique.';

/* ---------------------- field names for sys area datatable --------------------*/
$lang['lng_label_sys_area_id']           =   'Id';
$lang['lng_label_sys_area_area']         =   'Area';
$lang['lng_label_sys_area_use']          =   'Use';  
/* ---------------------- field names for sys area datatable --------------------*/ 

$lang['lng_label_sys_area_add']          =   'Add new area';  
$lang['lng_label_sys_area_edit']         =   'Edit area information';  
$lang['lng_label_sys_area_add_title']    =   'Add new area';
  
$lang['lng_label_sys_area_id_unique_validation']    =   ' must be unique.';  
$lang['lng_label_sys_area_id_empty_validation']     =   ' must be not empty.';  
$lang['lng_label_sys_area_id_int_validation']       =   ' must be integer.';

/* ---------------------- field names for sys sub area datatable --------------------*/
$lang['lng_label_sys_sub_area_id']       =   'Id';
$lang['lng_label_sys_area_id']           =   'Area';
$lang['lng_label_sys_sub_area']          =   'Sub Area';  
$lang['lng_label_sys_sub_area_uses']     =   'Use';  
/* ---------------------- field names for sys sub area datatable --------------------*/

$lang['lng_label_sys_sub_area_edit_title']           =   'Edit sub area';   
$lang['lng_label_sys_sub_area_add_title']            =   'Add new sub area';   
$lang['lng_label_sys_sub_area_add']                  =   'Add new sub area';   
$lang['lng_label_sys_area_id_empty_validation']      =   ' must be not empty';   
$lang['lng_label_sys_sub_area_id_empty_validation']  =   ' must be not empty';   
$lang['lng_label_sys_sub_area_id_unique_validation'] =   ' + Area must be unique';   
$lang['lng_label_sys_area_id_unique_validation']     =   ' + Sub Area must be unique';

/* ---------------------- field names for struct application area datatable --------------------*/
$lang['lng_label_sys_struct_application_id']            =   'Id';
$lang['lng_label_sys_struct_application_area']          =   'Area';
$lang['lng_label_sys_struct_application_sub_area']      =   'SubArea';
$lang['lng_label_sys_struct_application_application']   =   'Application';
$lang['lng_label_sys_struct_application_file']          =   'File';
$lang['lng_label_sys_struct_application_show_menu']     =   'Show menu';
$lang['lng_label_sys_struct_application_uses']          =   'Uses';
 
/* ---------------------- field names for struct application datatable --------------------*/

$lang['lng_label_struct_application_show']  =   'Show';
$lang['lng_label_struct_application_hide']  =   'Hide';

$lang['lng_label_struct_application_add']       =   'Add struct application';
$lang['lng_label_struct_application_edit']      =   'Edit struct application';
$lang['lng_label_struct_application_add_title'] =   'Add struct application';

/* ---------------------- field names for policy datatable --------------------*/
$lang['lng_label_sys_policy_id']       =   'Id Elem';
$lang['lng_label_sys_policy_type']     =   'Type';
$lang['lng_label_sys_policy_area']     =   'Id Area';  
$lang['lng_label_sys_policy_mode']     =   'Mode';  
/* ---------------------- field names for policy datatable --------------------*/

$lang['lng_label_sys_policy_add']           =   'Add policy';    
$lang['lng_label_sys_policy_edit']          =   'Edit policy';    
$lang['lng_label_sys_policy_add_title']     =   'Add new policy';
    
$lang['lng_label_sys_policyarea_type_user']     =   'User';    
$lang['lng_label_sys_policyarea_type_role']     =   'Role';
    
$lang['lng_label_sys_policyarea_mode_block']     =   'Block';    
$lang['lng_label_sys_policyarea_mode_r-only']    =   'R-only';    
$lang['lng_label_sys_policyarea_mode_par']       =   'Par';    
$lang['lng_label_sys_policyarea_mode_full']      =   'Full';
    
$lang['lng_label_policy_element_empty_validation']    =   ' must be not empty';    
$lang['lng_label_policy_element_unique_validation']   =   ' + ' . $lang['lng_label_sys_policy_area'] . ' must be unique';    
$lang['lng_label_sys_policy_area_empty_validation']   =   ' must be not empty';    
$lang['lng_label_sys_policy_area_unique_validation']  =   ' + ' . $lang['lng_label_sys_policy_id'] . ' must be unique';

/* ---------------------- field names for policy sub area datatable --------------------*/
$lang['lng_label_sys_policy_sub_id']       =   'Elem';
$lang['lng_label_sys_policy_sub_type']     =   'Type';
$lang['lng_label_sys_policy_sub_area']     =   'Area';  
$lang['lng_label_sys_policy_sub_sub_area'] =   'SubArea';  
$lang['lng_label_sys_policy_sub_mode']     =   'Mode';  
/* ---------------------- field names for policy sub area datatable --------------------*/

$lang['lng_label_sub_policy_add']                               =   'Add sub area';     
$lang['lng_label_policy_sub_area_element_empty_validation']     =   ' must be not empty';     
$lang['lng_label_policy_sub_area_element_unique_validation']    =   ' + ' . $lang['lng_label_sys_policy_sub_area'] . ' + ' . $lang['lng_label_sys_policy_sub_sub_area'] . ' must be unique';     
$lang['lng_label_policy_sub_area_empty_validation']             =   ' must be not empty';     
$lang['lng_label_policy_sub_area_unique_validation']            =   ' + ' . $lang['lng_label_sys_policy_sub_id'] . ' + ' . $lang['lng_label_sys_policy_sub_sub_area'] . ' must be unique';     
$lang['lng_label_policy_sub_subarea_empty_validation']          =   ' must be not empty';     
$lang['lng_label_policy_sub_subarea_unique_validation']         =   ' + ' . $lang['lng_label_sys_policy_sub_id'] . ' + ' . $lang['lng_label_sys_policy_sub_area'] . ' must be unique';     

$lang['lng_label_sys_policy_sub_area_edit']                     =   'Edit new policy sub area';     
$lang['lng_label_sys_policy_sub_area_add_title']                =   'Add new policy sub area';

/* ---------------------- field names for policy application datatable --------------------*/
$lang['lng_label_policy_application_id_elem']       =   'Id Elem';
$lang['lng_label_policy_application_type']          =   'Type';
$lang['lng_label_policy_application_id_area']       =   'Id Area';  
$lang['lng_label_policy_application_id_sub_area']   =   'idSubArea';  
$lang['lng_label_policy_application_id_application']=   'Application';  
$lang['lng_label_policy_application_mode']          =   'Mode';  
/* ---------------------- field names for policy application datatable --------------------*/

$lang['lng_label_policy_application_add']           =   'Add new policy application';

$lang['lng_label_sys_policy_application_type_user']     =   'User';    
$lang['lng_label_sys_policy_application_type_role']     =   'Role';
    
$lang['lng_label_sys_policy_application_mode_block']    =   'Block';    
$lang['lng_label_sys_policy_application_mode_r-only']   =   'R-only';    
$lang['lng_label_sys_policy_application_mode_par']      =   'Par';    
$lang['lng_label_sys_policy_application_mode_full']     =   'Full';
     
$lang['lng_label_policy_application_add_title']     =   'Add new policy application';     
$lang['lng_label_policy_application_edit']          =   'Edit policy application';
     
$lang['lng_label_sys_policy_element_empty_validation']  =   ' must be not empty';     
$lang['lng_label_sys_policy_element_unique_validation'] =   ' must be unique';

/* ---------------------- field names for sys menu datatable --------------------*/
$lang['lng_label_sys_menu_id_menu']             =   'Id';
$lang['lng_label_sys_menu_user_name']           =   'User Name';
$lang['lng_label_sys_menu_id_pabel']            =   'Id Panel';
$lang['lng_label_sys_menu_ico']                 =   'Ico';
$lang['lng_label_sys_menu_new_ico']             =   'New Ico(16x16px)';
$lang['lng_label_sys_menu_old_ico']             =   'Old Ico';
$lang['lng_label_sys_menu_panel_header']        =   'Header';
$lang['lng_label_sys_menu_panel_collapsed']     =   'Collapsed';
$lang['lng_label_sys_menu_panel_maximized']     =   'Max';
$lang['lng_label_sys_menu_panel_order_menu']    =   'Order';
$lang['lng_label_sys_menu_panel_column_menu']   =   'Col';
$lang['lng_label_sys_menu_panel_color_class']   =   'Text color';
$lang['lng_label_sys_menu_panel_color_border']  =   'Border color';
$lang['lng_label_sys_menu_panel_color_bg']      =   'Background color';
$lang['lng_label_sys_menu_panel_show']          =   'Show/Hide';
$lang['lng_label_sys_menu_panel_show_max']      =   'Show Max';
$lang['lng_label_sys_menu_panel_show_turn']     =   'Show Turn';
$lang['lng_label_sys_menu_panel_show_info']     =   'Show Info';
 
/* ---------------------- field names for sys menu datatable --------------------*/

$lang['lng_label_sys_menu_show']   =   'Show';     
$lang['lng_label_sys_menu_hide']   =   'Hide';

$lang['lng_label_sys_menu_yes']   =   'Yes';
$lang['lng_label_sys_menu_no']    =   'No';
     
$lang['lng_label_sys_menu_edit']        =   'Edit sys menu';     
$lang['lng_label_sys_menu_add_title']   =   'Add sys menu';     
$lang['lng_label_sys_menu_add']         =   'Add new sys menu';
     
$lang['lng_label_sys_menu_id_menu_empty_validation']         =   'must be not empty';     
$lang['lng_label_sys_menu_id_menu_unique_validation']        =   ' + ' . $lang['lng_label_sys_menu_id_pabel'] . ' must be unique';
$lang['lng_label_sys_menu_id_panel_empty_validation']        =   'must be not empty';     
$lang['lng_label_sys_menu_id_panel_unique_validation']       =   ' + ' . $lang['lng_label_sys_menu_id_menu'] . ' must be unique';     
$lang['lng_label_sys_int_validate']                          =   ' must be int type';
     
$lang['lng_label_sys_menu_last_rec']                         =   ' last id is: ';

$lang['lng_label_menuid_empty_validation']        = 'must be not empty';
$lang['lng_label_menuid_unique_validation']       = ' + ' . $lang['lng_label_sys_menu_user_name'] . ' + ' . $lang['lng_label_sys_menu_id_pabel'] . ' must be unique';
$lang['lng_label_userid_empty_validation']        = 'must be not empty';
$lang['lng_label_userid_unique_validation']       = ' + ' . $lang['lng_label_sys_menu_id_menu'] . ' + ' . $lang['lng_label_sys_menu_id_pabel'] . ' must be unique';
$lang['lng_label_panelid_empty_validation']       = 'must be not empty';
$lang['lng_label_panelid_unique_validation']      = ' + ' . $lang['lng_label_sys_menu_id_menu'] . ' + ' . $lang['lng_label_sys_menu_user_name'] . ' must be unique';

/* ---------------------- field names for sys menu grp datatable --------------------*/
$lang['lng_label_menu_grp_id_menu']         =   'Id Menu';
$lang['lng_label_menu_grp_id_grp']          =   'Id Grp';
$lang['lng_label_menu_grp_id_panel']        =   'Id Panel';
$lang['lng_label_menu_grp_title']           =   'Title';
$lang['lng_label_menu_grp_class']           =   'Class';
$lang['lng_label_menu_grp_ico']             =   'Ico';
$lang['lng_label_menu_grp_old_ico']         =   'Old Ico';
$lang['lng_label_menu_grp_position']        =   'Position';
/* ---------------------- field names for sys menu grp datatable --------------------*/

$lang['lng_label_sys_menu_grp_add']         =   'Add new menu group';      
$lang['lng_label_sys_menu_grp_edit']        =   'Edit menu group';      
$lang['lng_label_sys_menu_grp_add_title']   =   'Add new menu group';
      
$lang['lng_label_sys_menu_grp_id_menu_empty_validation']    =   ' must be not empty';      
$lang['lng_label_sys_menu_grp_id_menu_unique_validation']   =   ' + ' . $lang['lng_label_menu_grp_id_grp'] . ' + ' . $lang['lng_label_menu_grp_id_panel'] . ' must be unique.';      
$lang['lng_label_sys_menu_grp_id_grp_empty_validation']     =   ' must be not empty';      
$lang['lng_label_sys_menu_grp_id_grp_unique_validation']    =   ' + ' . $lang['lng_label_menu_grp_id_menu'] . ' + ' . $lang['lng_label_menu_grp_id_panel'] . ' must be unique.';      
$lang['lng_label_sys_menu_grp_id_panel_empty_validation']   =   ' must be not empty';      
$lang['lng_label_sys_menu_grp_id_panel_unique_validation']  =   ' + ' . $lang['lng_label_menu_grp_id_menu'] . ' + ' . $lang['lng_label_menu_grp_id_grp'] . ' must be unique.';      


/* ---------------------- field names for sys menu rows datatable --------------------*/
$lang['lng_label_menu_rows_id_menu']         =   'Id Menu';
$lang['lng_label_menu_rows_id_grp']          =   'Grp';
$lang['lng_label_menu_rows_id_panel']        =   'Panel';
$lang['lng_label_menu_rows_id_app']          =   'Application';
$lang['lng_label_menu_rows_label']           =   'Label';
$lang['lng_label_menu_rows_new_page']        =   'New Page';
$lang['lng_label_menu_rows_type']            =   'Type';
$lang['lng_label_menu_rows_position']        =   'Position';
$lang['lng_label_menu_rows_active']          =   'Active';
/* ---------------------- field names for sys menu rows datatable --------------------*/

$lang['lng_label_sys_menu_rows_add']         =   'Add new menu row';
$lang['lng_label_sys_menurows_newpage_y']    =   'Yes';
$lang['lng_label_sys_menurows_newpage_n']    =   'No';
$lang['lng_label_sys_menurows_type_l']       =   'Link';
$lang['lng_label_sys_menurows_type_w']       =   'Widget';
$lang['lng_label_sys_menu_rows_edit']        =   'Edit sys menu row';
$lang['lng_label_sys_menu_rows_add_title']   =   'Add new sys menu row';

$lang['lng_label_sys_menu_rows_menu_id_empty_validation']      =   ' must be not empty';
$lang['lng_label_sys_menu_rows_menu_id_unique_validation']     =   ' + ' . $lang['lng_label_menu_rows_id_app'] .' must be unique.';
$lang['lng_label_sys_menu_rows_app_id_empty_validation']       =   ' must be not empty';
$lang['lng_label_sys_menu_rows_app_id_unique_validation']      =   ' + ' . $lang['lng_label_menu_rows_id_menu'] . ' must be unique.';

/* ---------------------- field names for sys user datatable --------------------*/
$lang['lng_label_sys_user_id']          =   'Id';
$lang['lng_label_sys_user_lang']        =   'Lang';
$lang['lng_label_sys_user_status']      =   'Status';
$lang['lng_label_sys_user_type']        =   'Type';
$lang['lng_label_sys_user_name']        =   'Nickname';
$lang['lng_label_sys_user_role']        =   'Role';
$lang['lng_label_sys_user_role_1']      =   'Role 1';
$lang['lng_label_sys_user_role_2']      =   'Role 2';
$lang['lng_label_sys_user_role_3']      =   'Role 3';
$lang['lng_label_sys_user_role_4']      =   'Role 4';
$lang['lng_label_sys_user_role_5']      =   'Role 5';
$lang['lng_label_sys_user_role_6']      =   'Role 6';
$lang['lng_label_sys_user_role_7']      =   'Role 7';
$lang['lng_label_sys_user_role_8']      =   'Role 8';
$lang['lng_label_sys_user_role_9']      =   'Role 9';
$lang['lng_label_sys_user_role_10']     =   'Role 10';
$lang['lng_label_sys_user_lastname']    =   'Last name';
$lang['lng_label_sys_user_email']       =   'Email';
$lang['lng_label_sys_user_username']    =   'User Name';
$lang['lng_label_sys_user_pass']        =   'Password';
$lang['lng_label_sys_user_confirm_pass']=   'Confirm Password';
$lang['lng_label_sys_user_theme']       =   'Theme';
$lang['lng_label_sys_user_host']        =   'Host';
$lang['lng_label_sys_user_updated']     =   'Updated';
$lang['lng_label_sys_user_added']       =   'Added';
$lang['lng_label_sys_user_lastlogin']   =   'Lastlogin';


$lang['lng_label_lang_user_active']     =   'Active';
$lang['lng_label_lang_user_suspend']    =   'Suspend';
$lang['lng_label_lang_user_wauth']      =   'Wauth';
$lang['lng_label_lang_user_closed']     =   'Closed';
/* ---------------------- field names for sys user datatable --------------------*/

$lang['lng_label_application_delete']       =   'Delete Sys User';
$lang['lng_label_application_edit']         =   'Edit Sys User';
$lang['lng_label_sys_user_delete_really']   =   'Are you really want to delete?';
$lang['lng_label_sys_user_cancel']          =   'Cancel';
$lang['lng_label_sys_user_delete_ok']       =   'Ok';

$lang['lng_label_sys_user_edit']            =   'User info';
$lang['lng_label_sys_user_add_title']       =   'New user info';
$lang['lng_label_sys_user_edit_cancel']     =   'Cancel';
$lang['lng_label_sys_user_add_cancel']      =   'Cancel';
$lang['lng_label_sys_user_edit_ok']         =   'Save';
$lang['lng_label_sys_user_add_ok']          =   'Add';
                                                                
$lang['lng_label_sys_user_add']             =   'Add new user';
$lang['lng_label_sys_user_roles']           =   'User Roles';

$lang['lng_label_user_update_success']      =   'User information was successfully updated.';
$lang['lng_label_user_add_success']         =   'New user was successfully added.';

$lang['lng_label_user_pwd_validation']      =   'Password must be equal Confirm.';
$lang['lng_label_user_pwd_empty_validation']=   'Password must be not empty.';
$lang['lng_label_user_pwd_len_validation']  =   'Password must be 8 or more symbols.';

/* ---------------------- field names for sys log datatable --------------------*/
$lang['lng_label_sys_log_file_name']    =   'File Name';
$lang['lng_label_sys_log_last_update']  =   'Last Update';
$lang['lng_label_sys_log_file_size']    =   'File Size';
/* ---------------------- field names for sys log datatable --------------------*/

$lang['lng_label_sys_log_delete_all']       =   'Delete all';
$lang['lng_label_sys_log_delete_selected']  =   'Delete selected';
$lang['lng_label_sys_please_select']        =   'Not selected any logs';
$lang['lng_label_sys_dir_info']             =   'Applications folder informations';
$lang['lng_label_sys_app_path']             =   'App Path:';
$lang['lng_label_sys_app_size']             =   'App Size:';
$lang['lng_label_sys_app_files_count']      =   'Files Count:';
$lang['lng_label_sys_app_dirs_count']       =   'Dirs Count:';
$lang['lng_label_sys_app_wait']             =   'Please whait while we collect dir information';

/* -------------------------- sys controller  --------------------------- */

$lang['lng_label_tools_fw_menu']	= 'Tools framework menu';
$lang['lng_label_main_fw_menu']		= 'List of available applications';
$lang['lng_label_main_page_desc']	= 'Main page of the SHIN framework project.';

$lang['lng_label_name_english'] = 'English';
$lang['lng_label_name_italian'] = 'Italian';
$lang['lng_label_name_russian'] = 'Russian';

$lang['lng_label_lang_en'] = 'English';
$lang['lng_label_lang_it'] = 'Italian';
$lang['lng_label_lang_ru'] = 'Russian';

$lang['lng_label_user_type_admin']  = 'Admin';
$lang['lng_label_user_type_user']   = 'User';

$lang['lng_label_sys_link'] = 'Download XML file with orders';

$lang['lng_label_sys_menurows_active_y'] = 'Enable';
$lang['lng_label_sys_menurows_active_n'] = 'Disable';
$lang['lng_label_sys_menurows_active'] = 'Enable/Disable';

$lang['lang_label_sys_structapplication_idsubarea_mandatory'] = 'For first please select Area.';
$lang['lang_label_sys_structapplication_application_mandatory'] = 'For first please select SubArea.';

$lang['lng_label_sys_structapplication_jqmobile_main'] = 'JQuery mobile UI test.';
$lang['lng_label_sys_structapplication_jqmobile_main2'] = 'JQuery mobile Table test.';
$lang['lng_label_sys_structapplication_jqmobile_main3'] = 'JQuery mobile Map test.';
$lang['lng_label_sys_structapplication_jqmobile_2'] = 'Mobile test application.';
$lang['lng_label_jquerymobile'] = 'JQuery mobile test environment.';
$lang['lng_label_jqmobile'] = 'JQuery mobile test environment.';

$lang['lng_for_delete_title']		='Delete recotrd';
$lang['lng_for_edit_title']		='Edit record';
$lang['lng_for_add_title']		='Add record';

/* End of file app_lang.php */
/* Location: shinfw/lang/en/app_lang.php */
