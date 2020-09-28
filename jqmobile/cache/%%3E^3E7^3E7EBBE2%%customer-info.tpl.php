<?php /* Smarty version 2.6.26, created on 2011-04-05 12:38:58
         compiled from customer-info.tpl */ ?>
<form action="" method="post" class="" >
    <table>
        <tr>
            <td colspan="2"><?php echo $this->_tpl_vars['jqmobile_example_id_hidden']; ?>
</td>
        </tr>
        <tr>
            <th>Customer:</th>
            <td>
                <?php echo $this->_tpl_vars['jqmobile_example_customer_input']; ?>
<br />
                <span class="validatetion-error" id="jqmobile_example_customer_error"></span>
            </td>
        </tr>
        <tr>
            <th>Bill:</th>
            <td>
                <?php echo $this->_tpl_vars['jqmobile_example_bill_input']; ?>
<br />
                <span class="validatetion-error" id="jqmobile_example_bill_error"></span>
            </td>
        </tr>
        <tr>
            <th>Note:</th>
            <td>
                <?php echo $this->_tpl_vars['jqmobile_example_note_input']; ?>
<br />
                <span class="validatetion-error" id="jqmobile_example_note_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

<?php echo $this->_tpl_vars['jsdocready']; ?>