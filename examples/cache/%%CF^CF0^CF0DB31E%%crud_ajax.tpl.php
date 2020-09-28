<?php /* Smarty version 2.6.26, created on 2011-05-20 11:43:54
         compiled from crud_ajax.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "back_url.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">CRUD ajax example</legend>
        <?php echo $this->_tpl_vars['errors']; ?>

        <?php echo $this->_tpl_vars['messages']; ?>

        <fieldset>
            <legend>One record data</legend>
            <label for="record_id">Enter record ID</label>
            <input type="text" value="<?php echo $this->_tpl_vars['record_id']; ?>
" name="record_id" id="record_id" />
            <input type="submit" value="Read" name="action" id="read_btn">
            <hr />
            <div id="one_record_data">
                <table>
                <tr>
                    <td>Name</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_name_input']; ?>

                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                    <td>Surname</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_surname_input']; ?>

                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                </tr>
                <tr>
                    <td>Company</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_company_input']; ?>

                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                    <td>Address</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_address_input']; ?>

                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_city_input']; ?>

                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                    <td>Birth Date</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_birth_date_input']; ?>

                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                </tr>
                <tr>
                    <td>Telephone</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_telefon_number_input']; ?>

                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                    <td>Card Number</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_credit_card_number_input']; ?>

                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                </tr>
                <tr>
                    <td>Special Number</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_special_number_input']; ?>

                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                    <td>Debid</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_debit_input']; ?>

                        <div style="color: red; font-size: 12px; display: none;"></div>
                    </td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><?php echo $this->_tpl_vars['examples_customer_master_data_type_input']; ?>
</td>
                    <td>&nbsp;</td>
                    <td><?php echo $this->_tpl_vars['examples_customer_master_data_id_hidden']; ?>
</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Note</td>
                    <td><?php echo $this->_tpl_vars['examples_customer_master_data_note_input']; ?>

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
            <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

     </fieldset>
    </fieldset>
    <?php echo '
    <script type="text/javascript">
        $(document).ready(function(){
            $(\'#read_btn\').bind(\'click\', function(){
                id  =   $(\'#record_id\').val();
                
                
                $.ajax({
                    url:        \''; ?>
<?php echo $this->_tpl_vars['basePath']; ?>
<?php echo '/crud_ajax.php\',
                    dataType:   \'json\',
                    data:       {id: id, action: \'read\'},
                    type:       \'POST\',
                    success:    function(json){
                        
                        $(\'#examples_customer_master_data_name\').val(json.name);    
                        $(\'#examples_customer_master_data_surname\').val(json.surname);    
                        $(\'#examples_customer_master_data_company\').val(json.company);    
                        $(\'#examples_customer_master_data_address\').val(json.address);    
                        $(\'#examples_customer_master_data_city\').val(json.city);    
                        $(\'#examples_customer_master_data_birth_date\').val(json.birth_date);    
                        $(\'#examples_customer_master_data_telefon_number\').val(json.telefon_number);    
                        $(\'#examples_customer_master_data_credit_card_number\').val(json.credit_card_number);    
                        $(\'#examples_customer_master_data_special_number\').val(json.special_number);    
                        $(\'#examples_customer_master_data_debit\').val(json.debit);    
                        $(\'input[name=examples_customer_master_data_id]\').val(json.id);

                        $(\'#examples_customer_master_data_note\').val(json.note);
                        
                        $(\'#examples_customer_master_data_type option\').each(function(){
                            if($(this).val() == json.type) {
                                $(this).attr(\'selected\', \'selected\');
                            }
                        });
                        
                        if(json.note != null) {
                            tinyMCE.activeEditor.setContent(json.note);
                        } else {
                            tinyMCE.activeEditor.setContent(\'\');    
                        }    
                    }    
                })
           })
           
           $(\'#write_btn\').bind(\'click\', function(){
                
                var data    =   {};
                
                $(\'#one_record_data :input\').each(function(){
                    data[$(this).attr("name")] = $(this).val();    
                })
                    data[\'examples_customer_master_data_type\'] = $(\'#examples_customer_master_data_type option:selected\').val();
                    data[\'examples_customer_master_data_note\'] =  tinyMCE.activeEditor.getContent();
                
                $.ajax({
                    url:        \''; ?>
<?php echo $this->_tpl_vars['basePath']; ?>
<?php echo '/crud_ajax.php\',
                    dataType:   \'json\',
                    data:       data,
                    type:       \'POST\',
                    success:    function(json){
                        if(json.result) {
                            alert(json.message);
                            $(\'tr td div\').hide();
                            sample_element.fnDraw();
                        } else {
                            for(key in json.errors) {
                                $div = $(\'tr td #\' + key).parent().find(\'div\');
                                       
                                       $($div).text(json.errors[key]);
                                       $($div).show();     
                            }
                        }    
                    }    
                })
           })    
        })
    </script>
    '; ?>

    
</body>
</html>