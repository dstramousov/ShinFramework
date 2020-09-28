<div class="customer-new">
    <fieldset>
        <legend>{$lng_label_customer_manage_page}</legend>
        <div class="add-customer-form">
            <form action="{php}echo prep_url(base_url().'/lists/customeradd');{/php}" method="post">
            <table>
                <tr>
                    <td>
                        {$shinticket_customerlist_customerName_input}
                    </td>
                    <td>
                        <input type="submit" name="submit-new-customer" value="{$lng_label_customer_add}">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </fieldset>
    
    <fieldset>
        <legend>{$lng_label_customer_list}</legend>
        <div class="customer-list list">
            {$customerList}
        </div>
    </fieldset>
    
    <form action="{php}echo prep_url(base_url().'/lists/customerdelete');{/php}" method="post" id="delete-customer">
        {$shinticket_customerlist_idCustomer_hidden}
    </form>
    
    <div id="delete-customer-dialog" title="{$lng_label_customer_delete_really}">
        <center>{$lng_label_customer_delete_really}</center>
    </div>
</div>
{literal}
    <script type="text/javascript">
        function deleteCustomer(customerId){
            $('#shinticket_customerlist_idCustomer').val(customerId);
            $('#delete-customer-dialog').dialog('open');
        }
        
        function deleteCustomerRecord(){
            $('#delete-customer').submit();
        }
        
        function closeCustomerDialog(){
            $('#delete-customer-dialog').dialog('close');    
        }
    </script>
{/literal}
      