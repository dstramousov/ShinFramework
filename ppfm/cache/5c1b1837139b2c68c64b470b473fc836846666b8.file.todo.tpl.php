<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-23 12:25:57
         compiled from "D:\Work\web\shinframework\ppfm/views/todo/todo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:223314c9b1d253843d0-93039765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c1b1837139b2c68c64b470b473fc836846666b8' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/todo/todo.tpl',
      1 => 1285233955,
    ),
  ),
  'nocache_hash' => '223314c9b1d253843d0-93039765',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
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
    
    
    
    <script type="text/javascript">
        var options  = {
            mode:       '<?php echo $_smarty_tpl->getVariable('mode')->value;?>
',
            url:        '<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo base_url().'/index.php/todo/ajaxEvents'; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
'
        };
        
        var todoList    = new todoListClass(options);
        var isDebug     = false;
        var mode        = '<?php echo $_smarty_tpl->getVariable('mode')->value;?>
';
        var activeTodo  = null; 
        
    </script>
    
    
    <?php if ($_smarty_tpl->getVariable('mode')->value=='tree'){?>
        <div class="b-main-wrapper">
            <div class="b-inner">
                <fieldset>
                <legend><?php echo $_smarty_tpl->getVariable('lng_label_todo_list')->value;?>
</legend>
                    <div class="b-single-add-todo">
                        <input type="button" value="<?php echo $_smarty_tpl->getVariable('lng_label_add_todo')->value;?>
" name="" id="add-todo" onclick="openAddDialog();">
                    </div>
                    <ul class="b-todo-list">
                         <?php $_template = new Smarty_Internal_Template("todo/tree-todolist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
                    </ul>
                </fieldset>
            </div>
        </div>
    <?php }else{ ?>
        <div class="b-main-wrapper-single" id="b-main-wrapper-single">
            <div class="b-inner">
                <fieldset style="width: 47%;">
                    <legend><?php echo $_smarty_tpl->getVariable('lng_label_todo_list')->value;?>
</legend>
                    <div class="b-single-add-todo">
                        <input type="button" value="<?php echo $_smarty_tpl->getVariable('lng_label_add_todo')->value;?>
" name="" id="add-todo" onclick="openAddDialog();">
                    </div>
                    <ul class="b-single-todo-list">
                        <?php $_template = new Smarty_Internal_Template("todo/single-todolist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>    
                    </ul>
                </fieldset>
                
                <fieldset  style="width: 50%;">
                    <legend><?php echo $_smarty_tpl->getVariable('lng_label_general_information')->value;?>
</legend>
                    
                    <fieldset style="float: none" class="b-todo-information">
                    <legend><?php echo $_smarty_tpl->getVariable('lng_label_todo_information')->value;?>
</legend>
                        <table>
                            <tr>
                                <td><?php echo $_smarty_tpl->getVariable('lng_label_title')->value;?>
</td>
                                <td id="title_edit"></td>
                            </tr>
                            <tr>
                                <td><?php echo $_smarty_tpl->getVariable('lng_label_percentage')->value;?>
</td>
                                <td id="percantage_edit"></td>
                            </tr>
                        </table>
                        <input type="hidden" name="todo_item_type_edit" id="todo_item_type_edit" value="" />
                        <input type="hidden" name="todo_item_id_edit" id="todo_item_id_edit" value="" />
                        
                        <p>
                            <div class="show-btn">
                                <input type="button" name="chnage-todo-btn" id="chnage-todo-btn" value="<?php echo $_smarty_tpl->getVariable('lng_label_edit_todo')->value;?>
" onclick="enableEditing();" />
                            </div>
                        </p>    
                    </fieldset>
                     
                    <fieldset style="float: none">
                    <legend><?php echo $_smarty_tpl->getVariable('lng_label_todo_item_list')->value;?>
</legend>
                        <div class="b-single-add-todo-item">
                            <input type="button" value="<?php echo $_smarty_tpl->getVariable('lng_label_add_todo_item')->value;?>
" name="" id="add-todo-item" onclick="openAddItemDialog();">
                        </div>
                        <ul class="b-single-todo-list-items">
                            
                        </ul>
                    </fieldset>
                </fieldset>
            </div>
            <div class="clear"></div>
        </div>
    <?php }?>


    <div id="dialog-add">
        <table>
            <tr>
                <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_title')->value;?>
</label></td>
                <td>
                    <input type="text" name="title_add" id="title_add" class="text ui-widget-content ui-corner-all" style="width: 300px;" />
                    <div style="color: red; font-size: 12px; display: none;"></div>
                </td>
            </tr>
        </table>
    </div>
    
    <div id="dialog-add-item">
    <table>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_title')->value;?>
</label></td>
            <td>
                <input type="text" name="item_title_add" id="item_title_add" class="text ui-widget-content ui-corner-all" style="width: 250px;" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_percentage')->value;?>
</label></td>
            <td>
                <input type="text" name="item_percantage_add" id="item_percantage_add" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_completition_date')->value;?>
</label></td>
            <td>
                <input type="text" name="item_completition_date_add" id="item_completition_date_add" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_real_completition_date')->value;?>
</label></td>
            <td>
                <input type="text" name="item_real_completition_date_add" id="item_real_completition_date_add" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_priority')->value;?>
</label></td>
            <td>
                <select name="item_priority_item_add" id="item_priority_item_add" class="text ui-widget-content ui-corner-all">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_note')->value;?>
</label></td>
            <td><textarea rows="10" id="item_note_item_add"  class="text ui-widget-content ui-corner-all" style="width: 250px;"></textarea></td>
        </tr>
    </table>
    </div>
    
    <div id="dialog-edit">
    <table>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_title')->value;?>
</label></td>
            <td>
                <input type="text" name="dialog_title_edit" id="dialog_title_edit" class="text ui-widget-content ui-corner-all" style="width: 300px;" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
    </table>
    <input type="hidden" name="dialog_todo_item_type_edit" id="dialog_todo_item_type_edit" value="" />
    <input type="hidden" name="dialog_todo_item_id_edit" id="dialog_todo_item_id_edit" value="" />
   </div>
    
    <div id="dialog-item-edit">
    <table>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_title')->value;?>
</label></td>
            <td>
                <input type="text" name="title_item_edit" id="title_item_edit" class="text ui-widget-content ui-corner-all" style="width: 250px;" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_percentage')->value;?>
</label></td>
            <td>
                <input type="text" name="percantage_item_edit" id="percantage_item_edit" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_completition_date')->value;?>
</label></td>
            <td>
                <input type="text" name="completition_date_item_edit" id="completition_date_item_edit" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_real_completition_date')->value;?>
</label></td>
            <td>
                <input type="text" name="real_completition_date_item_edit" id="real_completition_date_item_edit" class="text ui-widget-content ui-corner-all" />
                <div style="color: red; font-size: 12px; display: none;"></div>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_priority')->value;?>
</label></td>
            <td>
                <select name="priority_item_edit" id="priority_item_edit" class="text ui-widget-content ui-corner-all">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="name"><?php echo $_smarty_tpl->getVariable('lng_label_note')->value;?>
</label></td>
            <td><textarea rows="10" id="note_item_edit"  class="text ui-widget-content ui-corner-all" style="width: 250px;"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    <input type="hidden" name="todo_sub_item_type_edit" id="todo_sub_item_type_edit" value="" />
    <input type="hidden" name="todo_sub_item_id_edit" id="todo_sub_item_id_edit" value="" />
    </div>
    
    <?php echo $_smarty_tpl->getVariable('dialog_delete')->value;?>

 
	<?php $_template = new Smarty_Internal_Template('tech_info.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

    </body>

</html>
