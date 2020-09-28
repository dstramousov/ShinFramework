<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-10-07 16:40:09
         compiled from "D:\Work\web\shinframework\ppfm/views/usermanage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9944cadcdb92d4612-72602745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6dce5d0658476fd464d228bbc8075129d8e77462' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/usermanage.tpl',
      1 => 1286356427,
    ),
  ),
  'nocache_hash' => '9944cadcdb92d4612-72602745',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_options')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\function.html_options.php';
if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<body id="page">

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_fw_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
	<?php $_template = new Smarty_Internal_Template("main_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</fieldset>

<br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_ppfm_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
	<?php $_template = new Smarty_Internal_Template("ppfm_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</fieldset>

<br/>

    <br/>
        <div id="page-errors">
            <div class="b-messages"><?php echo $_smarty_tpl->getVariable('messages')->value;?>
</div>
            <div class="b-errors"><?php echo $_smarty_tpl->getVariable('errors')->value;?>
</div>
            <div class="b-messages"><?php echo $_smarty_tpl->getVariable('jsMessages')->value;?>
</div>
            <div class="b-errors"><?php echo $_smarty_tpl->getVariable('jsErrors')->value;?>
</div>
        </div>
        <br />
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1"><?php echo $_smarty_tpl->getVariable('lng_label_user_tab')->value;?>
</a></li>
                <?php if ($_smarty_tpl->getVariable('user')->value->name=='admin'){?>
                <li><a href="#tabs-2"><?php echo $_smarty_tpl->getVariable('lng_label_system_tab')->value;?>
</a></li>
                <?php }?>
            </ul>
            <div id="tabs-1">
                <form method="post" id="generalInfo">
                    <input type="hidden" name="action" value="general-info">
                    <fieldset>
                        <legend><?php echo $_smarty_tpl->getVariable('lng_label_managment_general_info')->value;?>
</legend>
                            <table>
                                <tr>
                                    <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_current_theme')->value;?>
</td>
                                    <td>
                                        <select name="user_theme">
                                            <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->getVariable('themes')->value,'output'=>$_smarty_tpl->getVariable('themes')->value,'selected'=>$_smarty_tpl->getVariable('user')->value->theme),$_smarty_tpl->smarty,$_smarty_tpl);?>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_current_lang')->value;?>
</td>
                                    <td>
                                        <select name="user_lang">
                                            <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->getVariable('langs')->value,'output'=>$_smarty_tpl->getVariable('langs')->value,'selected'=>$_smarty_tpl->getVariable('user')->value->lang),$_smarty_tpl->smarty,$_smarty_tpl);?>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_usermanage_page_save_btn')->value;?>
">
                                    </td>
                                </tr>
                            </table>
                    </fieldset>
                </form>
                <form method="post" id="userPass" name="user-pass">
                    <input type="hidden" name="action" value="user-pass">
                    <fieldset>
                        <legend><?php echo $_smarty_tpl->getVariable('lng_label_managment_change_pass')->value;?>
</legend>
                        <table>
                            <tr>
                                <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_old_pass')->value;?>
</td>
                                <td><input type="password" value="" name="user_old_pass" id="user_old_pass" /></td>
                            </tr>
                            <tr>
                                <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_new_pass')->value;?>
</td>
                                <td><input type="password" value="" name="user_new_pass" id="user_new_pass" /></td>
                            </tr>
                            <tr>
                                <td><?php echo $_smarty_tpl->getVariable('lng_label_managment_re_pass')->value;?>
</td>
                                <td><input type="password" value="" name="user_re_pass" id="user_re_pass" /></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="<?php echo $_smarty_tpl->getVariable('lng_label_usermanage_page_save_btn')->value;?>
" id="" />
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
            <?php if ($_smarty_tpl->getVariable('user')->value->name=='admin'){?>
            <div id="tabs-2">
                <fieldset>
                    <legend><?php echo $_smarty_tpl->getVariable('lng_label_managment_account_table')->value;?>
</legend>
                    <input type="button" name="add-new-record" value="<?php echo $_smarty_tpl->getVariable('lng_label_usermanage_page_add_new_btn')->value;?>
" onclick="addNewRecord('ppfm_account')" />
                    <?php echo $_smarty_tpl->getVariable('ppfm_account_model')->value;?>

                </fieldset>
                <fieldset>
                    <legend><?php echo $_smarty_tpl->getVariable('lng_label_managment_category_table')->value;?>
</legend>
                    <input type="button" name="add-new-record" value="<?php echo $_smarty_tpl->getVariable('lng_label_usermanage_page_add_new_btn')->value;?>
" onclick="addNewRecord('ppfm_category')" />
                    <?php echo $_smarty_tpl->getVariable('ppfm_category_model')->value;?>

                </fieldset>    
                <fieldset>
                    <legend><?php echo $_smarty_tpl->getVariable('lng_label_managment_holder_table')->value;?>
</legend>
                    <input type="button" name="add-new-record" value="<?php echo $_smarty_tpl->getVariable('lng_label_usermanage_page_add_new_btn')->value;?>
" onclick="addNewRecord('ppfm_holder')" />
                    <?php echo $_smarty_tpl->getVariable('ppfm_holder_model')->value;?>

                </fieldset>
                <fieldset>
                    <legend><?php echo $_smarty_tpl->getVariable('lng_label_managment_user_table')->value;?>
</legend>
                    <input type="button" name="add-new-record" value="<?php echo $_smarty_tpl->getVariable('lng_label_usermanage_page_add_new_btn')->value;?>
" onclick="addNewRecord('sys_user')" />
                    <?php echo $_smarty_tpl->getVariable('sys_user_model')->value;?>

                </fieldset>
             </div>
            <?php }?> 
         </div>
         
         <div class="delete-dialog" id="delete-dialog">
            <?php echo $_smarty_tpl->getVariable('lng_label_delete_record')->value;?>

         </div>
         
         <div class="edit-dialog" id="edit-dialog">
            <form action="" method="post">
                
            </form>
         </div>
         
         <div class="add-dialog" id="add-dialog">
            <form action="" method="post">
                
            </form>
         </div>
         
         <div class="" style="display: none;">
            <input type="hidden" id="active_record_id" name="active_record_id" value="" />
            <input type="hidden" id="active_table"     name="active_table" value="" />
         </div>
         
         
            <script type="text/javascript">
                $(document).ready(function(){
                
                    // validate signup form on keyup and submit
                    $("#userPass").validate({
                        rules: {
                            user_new_pass: {
                                required: true,
                                minlength: 8
                            },
                            user_re_pass: {
                                required: true,
                                minlength: 8,
                                equalTo: "#user_new_pass"
                            },
                        },
                        messages: {
                            password: {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 8 characters long"
                            },
                            confirm_password: {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 8 characters long",
                                equalTo: "Please enter the same password as above"
                            },
                        }
                    });
                })
            
                var activeTable    =   null;
                
                function openDialog(id, type, table) {
                    activeTable    =   table;
                    
                    $('#active_record_id').val(id);
                    $('#active_table').val(table);
                    
                    if(type == 'edit') {
                        openEditDialog(id, table);
                    } else {
                        $('#delete-dialog').dialog('open');    
                    }
                }
                
                function openEditDialog(id, table) {
                    
                    makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/usermanage/get', {
                        active_record_id:   id,
                        active_table:       table
                    }, function(html){
                        $('#edit-dialog form').empty().append(html);
                        $('#edit-dialog').dialog('open');
                        $('#edit-dialog :input:first').focus();
                    }, 'html')
                }
                
                function closeDeleteDialog(){
                    $('#delete-dialog').dialog('close');
                }
                
                function closeEditDialog(){
                    $('#edit-dialog').dialog('close');    
                }
                
                
                function deleteRecord(){
                    
                    var id      =   $('#active_record_id').val();
                    var table   =   $('#active_table').val();
                    
                    
                    makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/usermanage/delete', {
                        active_record_id:   id,
                        active_table:       table
                    }, function(json){
                        
                        if(json.result){
                            closeDeleteDialog();
                            reloadDataSet(activeTable);
                            showActionMessages(json.message, 'page-errors');    
                        } else {
                            showActionErrors(json.errors, 'page-errors');
                        }    
                    })            
                }
                
                function saveChanges(){
                    
                    var id      =   $('#active_record_id').val();
                    var table   =   $('#active_table').val();
                    var data    =   {active_record_id: id, active_table: table};
                    
                    $('#edit-dialog form :input').each(function(){
                        data[$(this).attr("name")] = $(this).val();    
                    })
                    
                    makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/usermanage/update', data, function(json){
                        
                        if(json.result) {
                            reloadDataSet(table);
                            closeEditDialog();
                            showActionMessages(json.message, 'page-errors');    
                        } else {
                            showErrors(json.errors);
                        }
                    })
                    
                }
                
                function addNewRecord(table){
                    
                   $('#active_table').val(table);
                    
                    makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/usermanage/new', {
                        active_table:       table
                    }, function(html){
                        
                        $('#add-dialog form').empty().append(html);
                        $('#add-dialog').dialog('open');
                        $('#add-dialog :input:first').focus();
                        
                    }, 'html')        
                }
                
                function closeAddDialog(){
                    $('#add-dialog').dialog('close');    
                }
                
                function saveNewRecord() {
                    var table   =   $('#active_table').val();
                    
                    var data    =   {active_table: table};
                    
                    $('#add-dialog form :input').each(function(){
                        data[$(this).attr("name")] = $(this).val();    
                    })
                    
                    makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/usermanage/savenew', data, function(json){
                        
                        if(json.result) {
                            reloadDataSet(table);
                            closeAddDialog();
                            showActionMessages(json.message, 'page-errors');    
                        } else {
                            if(json.errors) {
                                showErrors(json.errors);
                            } else if(json.generalErrors) {
                                showActionErrors(json.generalErrors, 'dialog-errors');
                            }
                        }
                    })   
                }
                
                function makeAjaxRequest(url, data, callback, type){
                    
                    var type = type != undefined ? type : 'json';
                     
                    $.ajax({
                               type:        "POST",
                               url:         url,
                               data:        data,
                               dataType:    type,
                               success:     callback,
                               beforeSend:  function(){
                                    blockUI()         
                               },
                               complete:    function(){
                                    unBlockUI();                
                               }
                           });
                }
                
                function reloadDataSet(table){
                    switch(table) {
                        case 'ppfm_account':
                            ppfm_account_model.fnDraw();
                            break;
                        case 'ppfm_category':
                            ppfm_category_model.fnDraw();
                            break;
                        case 'ppfm_holder':
                            ppfm_holder_model.fnDraw();
                            break;
                        case 'sys_user':
                            sys_user_model.fnDraw();
                            break;
                    }
                }
                
                function showErrors(errors){
                    hideErrors();
                    for(key in errors) {
                        $div = $('tr td #' + key).parent().find('div');
                               
                               $($div).text(errors[key]);
                               $($div).show();     
                    }
                }
                
                function hideErrors(){
                    $('tr td div').hide();
                }
                
                function showActionMessages(message, blockId){
                    //transfer to global scope
                    window.blockId = blockId
                     
                    $('#' + blockId + ' #js-message p').text(message);
                    $('#' + blockId + ' #js-message').show();
                    
                    setTimeout(hideActionMessages, 5000);
                }
                
                function showActionErrors(message, blockId){
                    //transfer to global scope
                    window.blockId = blockId
                    
                    $('#' + blockId + ' #js-error p').text(message);
                    $('#' + blockId + ' #js-error').show();
                    
                    setTimeout(hideActionMessages, 5000);
                }
                
                function hideActionMessages(){
                     $('#' + window.blockId + ' #js-message').fadeOut('normal');       
                     $('#' + window.blockId + ' #js-error').fadeOut('normal');       
                }
            </script>
         

		<?php $_template = new Smarty_Internal_Template('tech_info.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>

</html>
