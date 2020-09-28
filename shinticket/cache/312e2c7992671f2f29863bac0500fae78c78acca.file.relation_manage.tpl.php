<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-27 14:15:23
         compiled from "D:\Work\web\shinframework\shinticket/views/admin/relation/relation_manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:321044ca07ccb650874-97534670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '312e2c7992671f2f29863bac0500fae78c78acca' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinticket/views/admin/relation/relation_manage.tpl',
      1 => 1285585753,
    ),
  ),
  'nocache_hash' => '321044ca07ccb650874-97534670',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><div class="customer-new">
    
    <fieldset>
        <legend><?php echo $_smarty_tpl->getVariable('lng_label_customer_application_list')->value;?>
</legend>
        <div class="relation-messages">
            <?php echo $_smarty_tpl->getVariable('jsMessages')->value;?>

            <?php echo $_smarty_tpl->getVariable('jsErrors')->value;?>

        </div>
        <div class="relation-list list">
            <?php echo $_smarty_tpl->getVariable('customerListRel')->value;?>

        </div>
    </fieldset>
    
    <div id="manage-relations">
        <input type="hidden" name="current-customer" value="" id="current-customer" />
        <table>
            <?php  $_smarty_tpl->tpl_vars['application'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('allApplicationList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['application']->key => $_smarty_tpl->tpl_vars['application']->value){
?>
                <tr>
                    <td><input type="checkbox" name="application[]" value="<?php echo $_smarty_tpl->tpl_vars['application']->value['idApplication'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['application']->value['idApplication'];?>
"></td>
                    <td><label for="<?php echo $_smarty_tpl->tpl_vars['application']->value['idApplication'];?>
"><?php echo $_smarty_tpl->tpl_vars['application']->value['applicationName'];?>
</label></td>
                </tr>
            <?php }} ?>
        </table>
    </div>
    
</div>

    <script type="text/javascript">
        function closeDialog(customerId){
            $('#manage-relations').dialog('close');    
        }
        
        function saveRelations(){
            var customerId      = $('#manage-relations #current-customer').val(customerId);
            var applicationList = new Array;
            
            
            $('#manage-relations input:checkbox:checked').each(function(){
                applicationList.push($(this).val());       
            });
            
            $.getJSON('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/lists/ajaxsaveapplicationlist');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
', {
                customerId:         customerId,
                applicationList:    applicationList.join(',') 
            }, function(json){
                if(json.result) {
                    showMessages(json.message);
                } else {
                    showErrors(json.message);
                }
                
                $('#manage-relations').dialog('close');
            });        
        }
        
        function loadRelations(customerId){
            $.getJSON('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/lists/ajaxapplicationlist');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
', {
                customerId: customerId 
            }, function(json){
                $('#manage-relations #current-customer').val(customerId);
                $('#manage-relations input:checked').removeAttr('checked');
                for(index in json.data) {
                    $('#manage-relations input[value=' + json.data[index]  + ']').attr('checked', 'checked');
                }
                
                $('#manage-relations').dialog('open');    
            });
        }
        
        function showMessages(message){
            $('.relation-messages #js-message p').text(message);
            $('.relation-messages #js-message').show();
            
            setTimeout(hideActionMessages, 5000);
        }
        
        function showErrors(message){
            
            $('.relation-messages #js-error p').text(message);
            $('.relation-messages #js-error').show();
            
            setTimeout(hideActionMessages, 5000);
        }
        
        function hideActionMessages(){
             $('.relation-messages #js-message').fadeOut('normal');       
             $('.relation-messages #js-error').fadeOut('normal');       
        }         
    </script>

   