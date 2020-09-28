{include file="header.tpl"}

<body id="page">

	{include file="back_url.tpl"}
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">CRUD ajax example</legend>
        {$errors}
        {$messages}
        <fieldset>
            <legend>One record data</legend>
            <label for="record_id">Enter record ID</label>
            <input type="text" value="{$record_id}" name="record_id" id="record_id" />
            <input type="submit" value="Read" name="action" id="read_btn">
            <hr />
            <div id="one_record_data">
                <table>
                <tr>
                    <td>Name</td>
                    <td>
                        {$examples_customer_master_data_name_input}
                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                    <td>Surname</td>
                    <td>
                        {$examples_customer_master_data_surname_input}
                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                </tr>
                <tr>
                    <td>Company</td>
                    <td>
                        {$examples_customer_master_data_company_input}
                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                    <td>Address</td>
                    <td>
                        {$examples_customer_master_data_address_input}
                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>
                        {$examples_customer_master_data_city_input}
                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                    <td>Birth Date</td>
                    <td>
                        {$examples_customer_master_data_birth_date_input}
                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                </tr>
                <tr>
                    <td>Telephone</td>
                    <td>
                        {$examples_customer_master_data_telefon_number_input}
                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                    <td>Card Number</td>
                    <td>
                        {$examples_customer_master_data_credit_card_number_input}
                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                </tr>
                <tr>
                    <td>Special Number</td>
                    <td>
                        {$examples_customer_master_data_special_number_input}
                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                    <td>Debid</td>
                    <td>
                        {$examples_customer_master_data_debit_input}
                        <div style="color: red; font-size: 12px; display: none;"></div>
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
                        <input type="submit" value="Write" name="action" id="write_btn">
                    </td>
                </tr>
            </table>
            </div> 
        </fieldset>
     
     <fieldset>
            <legend>Test data list</legend>
            {$ssstylemustbehere}
     </fieldset>
    </fieldset>
    {literal}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#read_btn').bind('click', function(){
                id  =   $('#record_id').val();
                
                
                $.ajax({
                    url:        '{/literal}{$basePath}{literal}/crud_ajax.php',
                    dataType:   'json',
                    data:       {id: id, action: 'read'},
                    type:       'POST',
                    success:    function(json){
                        
                        $('#examples_customer_master_data_name').val(json.name);    
                        $('#examples_customer_master_data_surname').val(json.surname);    
                        $('#examples_customer_master_data_company').val(json.company);    
                        $('#examples_customer_master_data_address').val(json.address);    
                        $('#examples_customer_master_data_city').val(json.city);    
                        $('#examples_customer_master_data_birth_date').val(json.birth_date);    
                        $('#examples_customer_master_data_telefon_number').val(json.telefon_number);    
                        $('#examples_customer_master_data_credit_card_number').val(json.credit_card_number);    
                        $('#examples_customer_master_data_special_number').val(json.special_number);    
                        $('#examples_customer_master_data_debit').val(json.debit);    
                        $('input[name=examples_customer_master_data_id]').val(json.id);

                        $('#examples_customer_master_data_note').val(json.note);
                        
                        $('#examples_customer_master_data_type option').each(function(){
                            if($(this).val() == json.type) {
                                $(this).attr('selected', 'selected');
                            }
                        });
                        
                        if(json.note != null) {
                            tinyMCE.activeEditor.setContent(json.note);
                        } else {
                            tinyMCE.activeEditor.setContent('');    
                        }    
                    }    
                })
           })
           
           $('#write_btn').bind('click', function(){
                
                var data    =   {};
                
                $('#one_record_data :input').each(function(){
                    data[$(this).attr("name")] = $(this).val();    
                })
                    data['examples_customer_master_data_type'] = $('#examples_customer_master_data_type option:selected').val();
                    data['examples_customer_master_data_note'] =  tinyMCE.activeEditor.getContent();
                
                $.ajax({
                    url:        '{/literal}{$basePath}{literal}/crud_ajax.php',
                    dataType:   'json',
                    data:       data,
                    type:       'POST',
                    success:    function(json){
                        if(json.result) {
                            alert(json.message);
                            $('tr td div').hide();
                            sample_element.fnDraw();
                        } else {
                            for(key in json.errors) {
                                $div = $('tr td #' + key).parent().find('div');
                                       
                                       $($div).text(json.errors[key]);
                                       $($div).show();     
                            }
                        }    
                    }    
                })
           })    
        })
    </script>
    {/literal}
    
</body>
</html>
