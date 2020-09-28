<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-27 14:15:23
         compiled from "D:\Work\web\shinframework\shinticket/views/admin/list-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199734ca07ccb392fd9-48879697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8ff8594341fc79402b71e1dc9b9c6b681666595' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinticket/views/admin/list-item.tpl',
      1 => 1285585753,
    ),
  ),
  'nocache_hash' => '199734ca07ccb392fd9-48879697',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1"><?php echo $_smarty_tpl->getVariable('lng_label_customer_manage_page')->value;?>
</a></li>
            <li><a href="#tabs-2"><?php echo $_smarty_tpl->getVariable('lng_label_application_manage_page')->value;?>
</a></li>
            <li><a href="#tabs-3"><?php echo $_smarty_tpl->getVariable('lng_label_customer_application_list')->value;?>
</a></li>
        </ul>
        <div id="tabs-1">
            <?php $_template = new Smarty_Internal_Template('admin/customer/customer_manage.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </div>
        <div id="tabs-2">
            <?php $_template = new Smarty_Internal_Template('admin/application/application_manage.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </div>
        <div id="tabs-3">
            <?php $_template = new Smarty_Internal_Template('admin/relation/relation_manage.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        </div>
    </div>


    <script type="text/javascript">
    $(document).ready(function(){
        $("#tabs").tabs('select', '<?php echo $_smarty_tpl->getVariable('active_tab')->value;?>
');    
    })
    </script>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> 