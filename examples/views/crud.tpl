{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">CRUD example</legend>
        {$errors}
        {$messages}
        <fieldset>
            <legend>One record data</legend>
            <form action="" method="post" id="crud-form">
            <label for="record_id">Enter record ID</label>
            <input type="text" value="{$record_id}" name="record_id" id="record_id" />
            <input type="submit" value="Read" name="action" id="read_btn">
            <hr /> 
            <table>
                <tr>
                    <td>Name</td>
                    <td>
                        {$examples_customer_master_data_name_input}
                        {if $errorResult.examples_customer_master_data_name}
                            <div style="color: red; font-size: 12px;">
                                {$errorResult.examples_customer_master_data_name}    
                            </div>
                        {/if}
                    </td>
                    <td>Surname</td>
                    <td>
                        {$examples_customer_master_data_surname_input}
                        {if $errorResult.examples_customer_master_data_surname}
                            <div style="color: red; font-size: 12px;">
                                {$errorResult.examples_customer_master_data_surname}    
                            </div>
                        {/if}
                    </td>
                </tr>
                <tr>
                    <td>Company</td>
                    <td>
                        {$examples_customer_master_data_company_input}
                        {if $errorResult.examples_customer_master_data_company}
                            <div style="color: red; font-size: 12px;">
                                {$errorResult.examples_customer_master_data_company}    
                            </div>
                        {/if}
                    </td>
                    <td>Address</td>
                    <td>
                        {$examples_customer_master_data_address_input}
                        {if $errorResult.examples_customer_master_data_address}
                            <div style="color: red; font-size: 12px;">
                                {$errorResult.examples_customer_master_data_address}    
                            </div>
                        {/if}
                    </td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>
                        {$examples_customer_master_data_city_input}
                        {if $errorResult.examples_customer_master_data_city}
                            <div style="color: red; font-size: 12px;">
                                {$errorResult.examples_customer_master_data_city}    
                            </div>
                        {/if}
                    </td>
                    <td>Birth Date</td>
                    <td>
                        {$examples_customer_master_data_birth_date_input}
                        {if $errorResult.examples_customer_master_data_birth_date}
                            <div style="color: red; font-size: 12px;">
                                {$errorResult.examples_customer_master_data_birth_date}    
                            </div>
                        {/if}
                    </td>
                </tr>
                <tr>
                    <td>Telephone</td>
                    <td>
                        {$examples_customer_master_data_telefon_number_input}
                        {if $errorResult.examples_customer_master_data_telefon_number}
                            <div style="color: red; font-size: 12px;">
                                {$errorResult.examples_customer_master_data_telefon_number}    
                            </div>
                        {/if}
                    </td>
                    <td>Card Number</td>
                    <td>
                        {$examples_customer_master_data_credit_card_number_input}
                        {if $errorResult.examples_customer_master_data_credit_card_number}
                            <div style="color: red; font-size: 12px;">
                                {$errorResult.examples_customer_master_data_credit_card_number}    
                            </div>
                        {/if}
                    </td>
                </tr>
                <tr>
                    <td>Special Number</td>
                    <td>
                        {$examples_customer_master_data_special_number_input}
                        {if $errorResult.examples_customer_master_data_special_number}
                            <div style="color: red; font-size: 12px;">
                                {$errorResult.examples_customer_master_data_special_number}    
                            </div>
                        {/if}
                    </td>
                    <td>Debid</td>
                    <td>
                        {$examples_customer_master_data_debit_input}
                        {if $errorResult.examples_customer_master_data_debit}
                            <div style="color: red; font-size: 12px;">
                                {$errorResult.examples_customer_master_data_debit}    
                            </div>
                        {/if}
                    </td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>{$examples_customer_master_data_type_input}</td>
                    <td>&nbsp;</td>
                    <td>{$examples_customer_master_data_id_hidden}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Note</td>
                    <td>{$examples_customer_master_data_note_input}
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="center">
                        <input type="submit" value="Write" name="action" onclick="sendData();">
                    </td>
             

                </tr>
            </table>
            </form>
        </fieldset>
     
     <fieldset>
            <legend>Test data list</legend>
            {$domstylemustbehere}
     </fieldset>
    </fieldset>
    
    {literal}
    <script type="text/javascript">
        function sendData(){
            $('#crud-form').append('<input type="hidden" name="examples_customer_master_data_note" value="' + tinyMCE.activeEditor.getContent() + '">')
            $('#crud-form').submit();    
        }
    </script>    
    {/literal}
    
</body>
</html>
