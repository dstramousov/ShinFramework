<?php /* Smarty version 2.6.26, created on 2010-08-25 11:58:27
         compiled from dialogs/entry_dialog.tpl */ ?>
<?php echo '
<script type="text/javascript">
    '; ?>
<?php echo $this->_tpl_vars['datepickerJsCode']; ?>
<?php echo '
</script>
'; ?>

<table>
    <tr>
        <td></td>
        <td></td>
        <td>
            <?php echo $this->_tpl_vars['ppfm_entry_idUser_hidden']; ?>

        </td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lng_label_managment_entry_type']; ?>
</td>
        <td></td>
        <td>
            <?php echo $this->_tpl_vars['ppfm_entry_type_input']; ?>

            <div style="color: red; font-size: 12px; display: none;"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lng_label_managment_entry_holder_id']; ?>
</td>
        <td></td>
        <td>
            <?php echo $this->_tpl_vars['ppfm_entry_idHolder_input']; ?>

            <div style="color: red; font-size: 12px; display: none;"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lng_label_managment_entry_category_id']; ?>
</td>
        <td></td>
        <td>
            <?php echo $this->_tpl_vars['ppfm_entry_idCat_input']; ?>

            <div style="color: red; font-size: 12px; display: none;"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lng_label_managment_entry_text']; ?>
</td>
        <td></td>
        <td>
            <?php echo $this->_tpl_vars['ppfm_entry_text_input']; ?>

            <div style="color: red; font-size: 12px; display: none;"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lng_label_managment_entry_account_id']; ?>
</td>
        <td></td>
        <td>
            <?php echo $this->_tpl_vars['ppfm_entry_idAccount_input']; ?>

            <div style="color: red; font-size: 12px; display: none;"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lng_label_managment_entry_amount']; ?>
</td>
        <td><?php echo $this->_tpl_vars['currencySymbol']; ?>
</td>
        <td>
            <?php echo $this->_tpl_vars['ppfm_entry_amount_input']; ?>

            <div style="color: red; font-size: 12px; display: none;"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lng_label_managment_entry_date']; ?>
</td>
        <td></td>
        <td>
            <?php echo $this->_tpl_vars['ppfm_entry_date_input']; ?>

            <div style="color: red; font-size: 12px; display: none;"></div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $this->_tpl_vars['ppfm_entry_idEntry_hidden']; ?>
</td>
    </tr>
</table>

<?php echo '
    <style type="text/css">
        input{
            width: 250px !important;
        }
    </style>
'; ?>
