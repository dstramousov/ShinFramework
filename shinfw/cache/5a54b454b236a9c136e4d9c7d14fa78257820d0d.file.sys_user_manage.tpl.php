<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-10-13 15:43:19
         compiled from "D:\Work\web\shinframework\shinfw/views/sys_manage/list/sys_user_manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63754cb5a9676a43c2-83745930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a54b454b236a9c136e4d9c7d14fa78257820d0d' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinfw/views/sys_manage/list/sys_user_manage.tpl',
      1 => 1286356426,
    ),
  ),
  'nocache_hash' => '63754cb5a9676a43c2-83745930',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty3\plugins\block.php.php';
?>    <div class="js-includes">
        <?php echo $_smarty_tpl->getVariable('cssincludes')->value;?>

        <?php echo $_smarty_tpl->getVariable('jsincludes')->value;?>

        <?php echo $_smarty_tpl->getVariable('jsdocready')->value;?>

        <?php echo $_smarty_tpl->getVariable('jsnondocready')->value;?>

    </div>
    
    <div class="sys-manage-controls">
        <a href="" id="add-user-button"></a>
    </div>
        
    <div class="sys-manage-datatable">
        <?php echo $_smarty_tpl->getVariable('sysUserList')->value;?>

    </div>
    
    <div id="delete-sys-user-dialog" class="dialog-template">
        <form action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/usermanage/deleteuser');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" method="post" id="delete-sys-user-form">
            <input type="hidden" name="sys-user-id" value="" id="sys-user-id" />
        </form>
        <center><?php echo $_smarty_tpl->getVariable('lng_label_sys_user_delete_really')->value;?>
</center>
    </div>
    
    <div id="edit-sys-user-dialog" class="dialog-template"></div>
    <div id="add-sys-user-dialog" class="dialog-template"></div>
    
    
        <script type="text/javascript">
            function deleteSysUser(userId){
                $('#sys-user-id').val(userId);
                $('#delete-sys-user-dialog').dialog('open');
            }
            
            function editSysUser(userId) {
                $('#edit-sys-user-dialog').load('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/usermanage/loaduserdata');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
', {
                    userId: userId
                }, function(){
                    $('#edit-sys-user-dialog').dialog('open');    
                });    
            }
            
            function closeDeleteDialog(){
                $('#delete-sys-user-dialog').dialog('close');
            }
            
            function deleteSysUserRecord(){
                $('#delete-sys-user-form').submit();        
            }
            
            function closeSysUserEditDialog () {
                $('#edit-sys-user-dialog').dialog('close');    
            }
            
            function saveSysUserInfo() {
                var data    =   {};
                $('#edit-sys-user-dialog :input, select').each(function(){
                    data[$(this).attr('name')] = $(this).val();
                })
                
                makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/usermanage/saveuserinfo');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
', data, function(json){
                    if(json.result) {
                        window.location = '<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-1');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
';   
                    } else {
                        $('#edit-sys-user-dialog .validatetion-error').text('');
                        for(index in json.errors) {
                            $('#edit-sys-user-dialog #' + index + '_error').text(json.errors[index]).show();    
                        }
                    }
                })        
            }
            
            function showAddSysUserDialog(){
                $('#add-sys-user-dialog').load('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/usermanage/loadnewuserdata');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
', {}, 
                function(){
                    $('#add-sys-user-dialog').dialog('open');    
                });
                
                return false;
            }
            
            function closeSysUserAddDialog(){
                $('#add-sys-user-dialog').dialog('close');
            }
            
            function saveNewSysUserInfo(){
                var data    =   {};
                $('#add-sys-user-dialog :input, select').each(function(){
                    data[$(this).attr('name')] = $(this).val();
                })
                
                makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/usermanage/saveuserinfo');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
', data, function(json){
                    if(json.result) {
                        window.location = '<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/sysmanage?tab=ui-tabs-1');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
';   
                    } else {
                        $('#add-sys-user-dialog .validatetion-error').text('');
                        for(index in json.errors) {
                            $('#add-sys-user-dialog #' + index + '_error').text(json.errors[index]).show();    
                        }
                    }
                })    
            }
        </script>
    
