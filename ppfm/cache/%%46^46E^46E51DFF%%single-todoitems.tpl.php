<?php /* Smarty version 2.6.26, created on 2010-10-20 13:27:16
         compiled from todo/single-todoitems.tpl */ ?>
<?php $_from = $this->_tpl_vars['todoItemList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['todoItem']):
?>
<li id="subitem_<?php echo $this->_tpl_vars['todoItem']['idList']; ?>
" class="b-single-todo-item" position="<?php echo $this->_tpl_vars['todoItem']['position']; ?>
">
    <div class="b-toggle-todolist-item" onclick="toggleInformation(<?php echo $this->_tpl_vars['todoItem']['idList']; ?>
);"></div>
                                
    <div class="b-single-todo-checkbox">
        <input type="checkbox" onclick="clickOnCheckbox(this, <?php echo $this->_tpl_vars['todoItem']['idList']; ?>
, 'sub_item')" value="" id="" name="" <?php if ($this->_tpl_vars['todoItem']['status'] == 'c'): ?> checked="checked" <?php endif; ?>>
    </div>
    
    <div class="b-single-todo-item-name <?php if ($this->_tpl_vars['todoItem']['status'] == 'c'): ?> strikeItem <?php endif; ?>">
        <div class="b-todo-item-name-inner"><?php echo $this->_tpl_vars['todoItem']['item']; ?>
</div>
    </div>
    
    <div class="b-todo-percentage">
        <div class="b-inner">
            <div class="b-progress"><?php echo $this->_tpl_vars['todoItem']['progress']; ?>
%</div>
            <div style="width: <?php echo $this->_tpl_vars['todoItem']['progress']; ?>
%;" class="b-sub-inner-percentage"></div>
        </div>
    </div>
    
    <div class="single-todo-actions">
        <a class="edit" onclick="openTodoItemEditDialog(<?php echo $this->_tpl_vars['todoItem']['idList']; ?>
, 'sub_item', '<?php echo $this->_tpl_vars['todoItem']['item']; ?>
', <?php echo $this->_tpl_vars['todoItem']['progress']; ?>
)" href="javascript:void(0);"></a>
        <a class="delete" onclick="openDeleteDialog(<?php echo $this->_tpl_vars['todoItem']['idList']; ?>
, 'sub_item');" href="javascript:void(0);"></a>
        <div class="clear"></div>
    </div>
    
    <div class="todo-item-details">
        <table>
            <tr>
                <td><?php echo $this->_tpl_vars['lng_label_completition_date']; ?>
</td>
                <td>
                    <?php echo $this->_tpl_vars['todoItem']['completitionDate']; ?>

                </td>
            </tr>
            <tr>
                <td><?php echo $this->_tpl_vars['lng_label_real_completition_date']; ?>
</td>
                <td>
                    <?php echo $this->_tpl_vars['todoItem']['realCompletitionDate']; ?>

                </td>
            </tr>
            <tr>
                <td><?php echo $this->_tpl_vars['lng_label_priority']; ?>
</td>
                <td>
                    <?php echo $this->_tpl_vars['todoItem']['priority']; ?>

                </td>
            </tr>
            <tr>
                <td><?php echo $this->_tpl_vars['lng_label_note']; ?>
</td>
                <td>
                    <?php echo $this->_tpl_vars['todoItem']['note']; ?>

                </td>
            </tr>
        </table>
    </div>
                                
    <div class="clear"></div>
</li>
<?php endforeach; endif; unset($_from); ?>