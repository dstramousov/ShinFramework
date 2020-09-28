<?php /* Smarty version 2.6.26, created on 2011-03-22 12:35:15
         compiled from datatable_smartinit%5Cdialog.tpl */ ?>
<table>
    <tr>
        <th>&nbsp;</th>
        <td><?php echo $this->_tpl_vars['examples_file_tracking_id_hidden']; ?>
</td>
    </tr>
    <tr>
        <th>File id:</th>
        <td>
            <?php echo $this->_tpl_vars['examples_file_tracking_file_id_input']; ?>
<br />
            <span class="validatetion-error" id="examples_file_tracking_file_id_error"></span>
        </td>
    </tr>
    <tr>
        <th>Count:</th>
        <td>
            <?php echo $this->_tpl_vars['examples_file_tracking_count_input']; ?>
<br />
            <span class="validatetion-error" id="examples_file_tracking_count_error"></span> 
        </td>
    </tr>
    <tr>
        <th>Created:</th>
        <td>
            <?php echo $this->_tpl_vars['examples_file_tracking_created_input']; ?>
<br />
            <span class="validatetion-error" id="examples_file_tracking_created_error"></span>
        </td>
    </tr>
</table>
<?php echo $this->_tpl_vars['jsdocready']; ?>