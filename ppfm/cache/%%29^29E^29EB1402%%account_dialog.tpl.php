<?php /* Smarty version 2.6.26, created on 2010-08-23 15:03:29
         compiled from dialogs/account_dialog.tpl */ ?>
<?php echo '
<script type="text/javascript">
    '; ?>
<?php echo $this->_tpl_vars['datepickerJsCode2']; ?>
<?php echo '
</script>
'; ?>


<table>
    <tr>
        <td colspan="2">
        <div id="dialog-errors">
            <div class="b-messages"><?php echo $this->_tpl_vars['jsMessages']; ?>
</div>
            <div class="b-errors"><?php echo $this->_tpl_vars['jsErrors']; ?>
</div>
        </div>
        </td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lng_label_managment_account_account']; ?>
</td>
        <td></td>
        <td>
            <?php echo $this->_tpl_vars['ppfm_account_account_input']; ?>

            <div style="color: red; font-size: 12px; display: none;"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lng_label_managment_account_amount']; ?>
</td>
        <td><?php echo $this->_tpl_vars['currencySymbol']; ?>
</td>
        <td>
            <?php echo $this->_tpl_vars['ppfm_account_curAmount_input']; ?>

            <div style="color: red; font-size: 12px; display: none;"></div>
        </td>
    </tr>
    <tr>
        <td><?php echo $this->_tpl_vars['lng_label_managment_account_last_update']; ?>
</td>
        <td></td>
        <td>
            <?php echo $this->_tpl_vars['ppfm_account_lastUpdate_input']; ?>

            <div style="color: red; font-size: 12px; display: none;"></div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $this->_tpl_vars['ppfm_account_idAccount_hidden']; ?>
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
