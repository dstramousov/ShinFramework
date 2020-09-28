<?php /* Smarty version 2.6.26, created on 2011-08-08 16:10:50
         compiled from crud.tpl */ ?>
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
        <legend style="font-size: 30px; font-weight: bold;">CRUD example</legend>
        <?php echo $this->_tpl_vars['errors']; ?>

        <?php echo $this->_tpl_vars['messages']; ?>

        <fieldset>
            <legend>One record data</legend>
            <form action="" method="post" id="crud-form">
            <label for="record_id">Enter record ID</label>
            <input type="text" value="<?php echo $this->_tpl_vars['record_id']; ?>
" name="record_id" id="record_id" />
            <input type="submit" value="Read" name="action" id="read_btn">
            <hr /> 
            <table>
                <tr>
                    <td>Name</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_name_input']; ?>

                        <?php if ($this->_tpl_vars['errorResult']['examples_customer_master_data_name']): ?>
                            <div style="color: red; font-size: 12px;">
                                <?php echo $this->_tpl_vars['errorResult']['examples_customer_master_data_name']; ?>
    
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>Surname</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_surname_input']; ?>

                        <?php if ($this->_tpl_vars['errorResult']['examples_customer_master_data_surname']): ?>
                            <div style="color: red; font-size: 12px;">
                                <?php echo $this->_tpl_vars['errorResult']['examples_customer_master_data_surname']; ?>
    
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Company</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_company_input']; ?>

                        <?php if ($this->_tpl_vars['errorResult']['examples_customer_master_data_company']): ?>
                            <div style="color: red; font-size: 12px;">
                                <?php echo $this->_tpl_vars['errorResult']['examples_customer_master_data_company']; ?>
    
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>Address</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_address_input']; ?>

                        <?php if ($this->_tpl_vars['errorResult']['examples_customer_master_data_address']): ?>
                            <div style="color: red; font-size: 12px;">
                                <?php echo $this->_tpl_vars['errorResult']['examples_customer_master_data_address']; ?>
    
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_city_input']; ?>

                        <?php if ($this->_tpl_vars['errorResult']['examples_customer_master_data_city']): ?>
                            <div style="color: red; font-size: 12px;">
                                <?php echo $this->_tpl_vars['errorResult']['examples_customer_master_data_city']; ?>
    
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>Birth Date</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_birth_date_input']; ?>

                        <?php if ($this->_tpl_vars['errorResult']['examples_customer_master_data_birth_date']): ?>
                            <div style="color: red; font-size: 12px;">
                                <?php echo $this->_tpl_vars['errorResult']['examples_customer_master_data_birth_date']; ?>
    
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Telephone</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_telefon_number_input']; ?>

                        <?php if ($this->_tpl_vars['errorResult']['examples_customer_master_data_telefon_number']): ?>
                            <div style="color: red; font-size: 12px;">
                                <?php echo $this->_tpl_vars['errorResult']['examples_customer_master_data_telefon_number']; ?>
    
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>Card Number</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_credit_card_number_input']; ?>

                        <?php if ($this->_tpl_vars['errorResult']['examples_customer_master_data_credit_card_number']): ?>
                            <div style="color: red; font-size: 12px;">
                                <?php echo $this->_tpl_vars['errorResult']['examples_customer_master_data_credit_card_number']; ?>
    
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Special Number</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_special_number_input']; ?>

                        <?php if ($this->_tpl_vars['errorResult']['examples_customer_master_data_special_number']): ?>
                            <div style="color: red; font-size: 12px;">
                                <?php echo $this->_tpl_vars['errorResult']['examples_customer_master_data_special_number']; ?>
    
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>Debid</td>
                    <td>
                        <?php echo $this->_tpl_vars['examples_customer_master_data_debit_input']; ?>

                        <?php if ($this->_tpl_vars['errorResult']['examples_customer_master_data_debit']): ?>
                            <div style="color: red; font-size: 12px;">
                                <?php echo $this->_tpl_vars['errorResult']['examples_customer_master_data_debit']; ?>
    
                            </div>
                        <?php endif; ?>
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
                        <input type="submit" value="Write" name="action" onclick="sendData();">
                    </td>
             

                </tr>
            </table>
            </form>
        </fieldset>
     
     <fieldset>
            <legend>Test data list</legend>
            <?php echo $this->_tpl_vars['domstylemustbehere']; ?>

     </fieldset>
    </fieldset>
    
    <?php echo '
    <script type="text/javascript">
        function sendData(){
            $(\'#crud-form\').append(\'<input type="hidden" name="examples_customer_master_data_note" value="\' + tinyMCE.activeEditor.getContent() + \'">\')
            $(\'#crud-form\').submit();    
        }
    </script>    
    '; ?>

    
</body>
</html>