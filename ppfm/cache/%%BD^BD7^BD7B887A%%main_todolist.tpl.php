<?php /* Smarty version 2.6.26, created on 2010-10-13 15:42:16
         compiled from main_todolist.tpl */ ?>
<table align="left" width="100%">
    <tr>
		<td style="background-color: #f4f1a6;" width="90%"><?php echo $this->_tpl_vars['lng_label_main_page_todo_panel_title_field']; ?>
</td>
        <td style="background-color: #f4f1a6;" width="10%"><?php echo $this->_tpl_vars['lng_label_main_page_todo_panel_progress_field']; ?>
</td>
    </tr>
<?php $_from = $this->_tpl_vars['todoListData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['todoIten']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['todoIten']['title']; ?>
</td>
        <td><?php echo $this->_tpl_vars['todoIten']['progress']; ?>
 %</td>
    </tr>
<?php endforeach; endif; unset($_from); ?>
</table>