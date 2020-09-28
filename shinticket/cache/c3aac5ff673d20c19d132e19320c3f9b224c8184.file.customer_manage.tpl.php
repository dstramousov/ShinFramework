<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-27 14:15:23
         compiled from "D:\Work\web\shinframework\shinticket/views/admin/customer/customer_manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:282504ca07ccb4ea9c5-50849080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3aac5ff673d20c19d132e19320c3f9b224c8184' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinticket/views/admin/customer/customer_manage.tpl',
      1 => 1285585753,
    ),
  ),
  'nocache_hash' => '282504ca07ccb4ea9c5-50849080',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><div class="customer-new">
    <fieldset>
        <legend><?php echo $_smarty_tpl->getVariable('lng_label_customer_manage_page')->value;?>
</legend>
        <div class="add-customer-form">
            <form action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/lists/customeradd');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" method="post">
            <table>
                <tr>
                    <td>
                        <?php echo $_smarty_tpl->getVariable('shinticket_customerlist_customerName_input')->value;?>

                    </td>
                    <td>
                        <input type="submit" name="submit-new-customer" value="<?php echo $_smarty_tpl->getVariable('lng_label_customer_add')->value;?>
">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </fieldset>
    
    <fieldset>
        <legend><?php echo $_smarty_tpl->getVariable('lng_label_customer_list')->value;?>
</legend>
        <div class="customer-list list">
            <?php echo $_smarty_tpl->getVariable('customerList')->value;?>

        </div>
    </fieldset>
    
    <form action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/lists/customerdelete');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" method="post" id="delete-customer">
        <?php echo $_smarty_tpl->getVariable('shinticket_customerlist_idCustomer_hidden')->value;?>

    </form>
    
    <div id="delete-customer-dialog" title="<?php echo $_smarty_tpl->getVariable('lng_label_customer_delete_really')->value;?>
">
        <center><?php echo $_smarty_tpl->getVariable('lng_label_customer_delete_really')->value;?>
</center>
    </div>
</div>

    <script type="text/javascript">
        function deleteCustomer(customerId){
            $('#shinticket_customerlist_idCustomer').val(customerId);
            $('#delete-customer-dialog').dialog('open');
        }
        
        function deleteCustomerRecord(){
            $('#delete-customer').submit();
        }
        
        function closeCustomerDialog(){
            $('#delete-customer-dialog').dialog('close');    
        }
    </script>

      