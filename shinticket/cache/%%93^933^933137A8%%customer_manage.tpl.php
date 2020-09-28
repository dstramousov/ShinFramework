<?php /* Smarty version 2.6.26, created on 2011-08-25 11:20:32
         compiled from admin/customer/customer_manage.tpl */ ?>
<div class="customer-new">
    <fieldset>
        <legend><?php echo $this->_tpl_vars['lng_label_customer_manage_page']; ?>
</legend>
        <div class="add-customer-form">
            <form action="<?php echo prep_url(base_url().'/lists/customeradd'); ?>" method="post">
            <table>
                <tr>
                    <td>
                        <?php echo $this->_tpl_vars['shinticket_customerlist_customerName_input']; ?>

                    </td>
                    <td>
                        <input type="submit" name="submit-new-customer" value="<?php echo $this->_tpl_vars['lng_label_customer_add']; ?>
">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </fieldset>
    
    <fieldset>
        <legend><?php echo $this->_tpl_vars['lng_label_customer_list']; ?>
</legend>
        <div class="customer-list list">
            <?php echo $this->_tpl_vars['customerList']; ?>

        </div>
    </fieldset>
    
    <form action="<?php echo prep_url(base_url().'/lists/customerdelete'); ?>" method="post" id="delete-customer">
        <?php echo $this->_tpl_vars['shinticket_customerlist_idCustomer_hidden']; ?>

    </form>
    
    <div id="delete-customer-dialog" title="<?php echo $this->_tpl_vars['lng_label_customer_delete_really']; ?>
">
        <center><?php echo $this->_tpl_vars['lng_label_customer_delete_really']; ?>
</center>
    </div>
</div>
<?php echo '
    <script type="text/javascript">
        function deleteCustomer(customerId){
            $(\'#shinticket_customerlist_idCustomer\').val(customerId);
            $(\'#delete-customer-dialog\').dialog(\'open\');
        }
        
        function deleteCustomerRecord(){
            $(\'#delete-customer\').submit();
        }
        
        function closeCustomerDialog(){
            $(\'#delete-customer-dialog\').dialog(\'close\');    
        }
    </script>
'; ?>

      