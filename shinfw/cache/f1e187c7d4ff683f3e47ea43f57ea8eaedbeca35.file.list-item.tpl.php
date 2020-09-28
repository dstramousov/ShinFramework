<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-10-13 15:43:17
         compiled from "D:\Work\web\shinframework\shinfw/views/sys_manage/list-item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102414cb5a965dd28f0-76042116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1e187c7d4ff683f3e47ea43f57ea8eaedbeca35' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinfw/views/sys_manage/list-item.tpl',
      1 => 1286881306,
    ),
  ),
  'nocache_hash' => '102414cb5a965dd28f0-76042116',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty3\plugins\block.php.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <div class="">
        <fieldset class="shin-general-menu">
            <legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_fw_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>

                echo SHIN_Core::runWidget('main_menu', array());
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <?php echo $_smarty_tpl->getVariable('shinfw_main_menu')->value;?>

        </fieldset>
    </div>
    
    <div class="shin-clear"></div>
    
    <div id="tabs">
        <ul>
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/usermanage/sysusermanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_user_manage')->value;?>
</a></li>
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/rolemanage/sysrolemanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_role_manage')->value;?>
</a></li>
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/areamanage/sysareamanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_struct_area_manage')->value;?>
</a></li>
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/subareamanage/syssubareamanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_struct_subarea_manage')->value;?>
</a></li>
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/applicationmanage/applicationmanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_struct_application_manage')->value;?>
</a></li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/policyareamanage/policyareamanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_struct_policyarea_manage')->value;?>
</a></li>
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/policysubareamanage/policysubareamanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_struct_policysubarea_manage')->value;?>
</a></li>
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/policyapplicationmanage/policyapplicationmanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_struct_policyapplication_manage')->value;?>
</a></li>
            <br />
            <br />
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/menumanage/menumanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_struct_policyapplication_menu')->value;?>
</a></li>
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/menugrpmanage/menugrpmanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_struct_policyapplication_menugrp')->value;?>
</a></li>
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/menurowsmanage/menurowsmanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_struct_policyapplication_menurows')->value;?>
</a></li>
            <li><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/policyareamanage/policyareamanage');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><?php echo $_smarty_tpl->getVariable('lng_label_sys_struct_menusettings')->value;?>
</a></li>
        </ul>
        <div id="tabs-9"></div>
    </div>
    
    
        <script type="text/javascript">
            $(document).ready(function(){
                $("#tabs").tabs('select', '<?php echo $_smarty_tpl->getVariable('active_tab')->value;?>
');
                $("#tabs").tabs({
                    select: function(event, ui) {
                        $('.ui-dialog').remove();
                        $('.dialog-template').remove();
                    }
                })    
            })
            
            function makeAjaxRequest(url, data, callback, type){
                    
                    var type = type != undefined ? type : 'json';
                     
                    $.ajax({
                               type:        "POST",
                               url:         url,
                               data:        data,
                               dataType:    type,
                               success:     callback,
                               beforeSend:  function(){
                                             
                               },
                               complete:    function(){
                                                    
                               }
                           });
            }
        </script>
    
    
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
