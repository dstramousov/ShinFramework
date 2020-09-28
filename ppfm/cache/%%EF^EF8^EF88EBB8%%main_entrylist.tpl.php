<?php /* Smarty version 2.6.26, created on 2010-08-27 09:20:58
         compiled from main_entrylist.tpl */ ?>
<table align="left" width="100%">
    <tr>
        <td style="background-color: #aad5eb;" width="90%"><?php echo $this->_tpl_vars['lng_label_main_page_entry_panel_text_field']; ?>
</td>    
        <td style="background-color: #aad5eb;" width="10%"><?php echo $this->_tpl_vars['lng_label_main_page_entry_panel_amount_field']; ?>
</td>    
    </tr>
<?php $_from = $this->_tpl_vars['entryData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entryIten']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['entryIten']['text']; ?>
</td>
        <td><?php echo $this->_tpl_vars['entryIten']['amount']; ?>
</td>
    </tr>
<?php endforeach; endif; unset($_from); ?>
</table>