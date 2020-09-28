<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-27 14:15:23
         compiled from "D:\Work\web\shinframework\shinticket/views/admin/application/application_manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62834ca07ccb59e059-43192525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ab94ab8ab2e02b0dd257dc715bf7ecd029a3f48' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinticket/views/admin/application/application_manage.tpl',
      1 => 1285585753,
    ),
  ),
  'nocache_hash' => '62834ca07ccb59e059-43192525',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><div class="application-new">
    <fieldset>
        <legend><?php echo $_smarty_tpl->getVariable('lng_label_application_manage_page')->value;?>
</legend>
        <div class="add-application-form">
            <form action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/lists/applicationadd');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" method="post">
            <table>
                <tr>
                    <td>
                        <?php echo $_smarty_tpl->getVariable('shinticket_applicationlist_applicationName_input')->value;?>

                    </td>
                    <td>
                        <input type="submit" name="submit-new-application" value="<?php echo $_smarty_tpl->getVariable('lng_label_application_add')->value;?>
">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </fieldset>
    
    <fieldset>
        <legend><?php echo $_smarty_tpl->getVariable('lng_label_application_list')->value;?>
</legend>
        <div class="application-list list">
            <?php echo $_smarty_tpl->getVariable('applicationList')->value;?>

        </div>
    </fieldset>
    
    <form action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/lists/applicationdelete');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" method="post" id="delete-application">
        <?php echo $_smarty_tpl->getVariable('shinticket_applicationlist_idApplication_hidden')->value;?>

    </form>
    
    <div id="delete-application-dialog" title="<?php echo $_smarty_tpl->getVariable('lng_label_application_delete_really')->value;?>
">
        <center><?php echo $_smarty_tpl->getVariable('lng_label_application_delete_really')->value;?>
</center>
    </div>
</div>

    <script type="text/javascript">
        function deleteApplication(applicationId){
            $('#shinticket_applicationlist_idApplication').val(applicationId);
            
            $('#delete-application-dialog').dialog('open');    
        }
        
        function deleteApplicationRecord(){
            $('#delete-application').submit();
        }
        
        function closeApplicationDialog(){
            $('#delete-application-dialog').dialog('close');    
        }
    </script>


