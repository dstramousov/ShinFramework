<?php /* Smarty version 2.6.26, created on 2011-05-10 14:18:22
         compiled from crm_customer_master_data.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>
    <br><br>
    <?php echo $this->_tpl_vars['jsMessages']; ?>

    <?php echo $this->_tpl_vars['jsErrors']; ?>

    
    <fieldset>
        <legend style="font-size: 30px; font-weight: bold;">Customer master data form example</legend>
        <fieldset style="width: 1100px;">
            <legend>Customer master data form</legend>
            <form action="" method="post" id="master_data_form">
                <table style="width: 1100px;">
                    <tr>
                        <td align="right">Company</td>
                        <td>
                            <?php echo $this->_tpl_vars['examples_crmmasterdata_company_input']; ?>

                            <div style="color: red; display: none;" id="examples_crmmasterdata_company_error" class="validation_error"></div>
                        </td>
                        <td align="right">VAT</td>
                        <td>
                            <?php echo $this->_tpl_vars['examples_crmmasterdata_vat_input']; ?>

                            <div style="color: red; display: none;" id="examples_crmmasterdata_vat_error" class="validation_error"></div>
                        </td>
                        <td align="right">NIN</td>
                        <td>
                            <?php echo $this->_tpl_vars['examples_crmmasterdata_nin_input']; ?>

                            <div style="color: red; display: none;" id="examples_crmmasterdata_nin_error" class="validation_error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Contact Name</td>
                        <td>
                            <?php echo $this->_tpl_vars['examples_crmmasterdata_contactName_input']; ?>

                            <div style="color: red; display: none;" id="examples_crmmasterdata_contactName_error" class="validation_error"></div>
                        </td>
                        <td align="right">Contact Surname</td>
                        <td>
                            <?php echo $this->_tpl_vars['examples_crmmasterdata_contactSurname_input']; ?>

                            <div style="color: red; display: none;" id="examples_crmmasterdata_contactSurname_error" class="validation_error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Address</td>
                        <td>
                            <?php echo $this->_tpl_vars['examples_crmmasterdata_address_input']; ?>

                            <div style="color: red; display: none;" id="examples_crmmasterdata_address_error" class="validation_error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">City</td>
                        <td><?php echo $this->_tpl_vars['examples_crmmasterdata_city_input']; ?>
</td>
                        <td align="right">Province</td>
                        <td>
                            <select name="examples_crmmasterdata_province" id="examples_crmmasterdata_province">
                                <option value="" selected="selected"></option>
                            <?php $_from = $this->_tpl_vars['geoProvinceList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['countryKey'] => $this->_tpl_vars['countryItem']):
?>
                                <option value="<?php echo $this->_tpl_vars['countryKey']; ?>
"><?php echo $this->_tpl_vars['countryItem']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                            </select>
                            <div style="color: red; display: none;" id="examples_crmmasterdata_province_error" class="validation_error"></div>
                        </td>
                        <td align="right">Postal Code</td>
                        <td>
                            <?php echo $this->_tpl_vars['examples_crmmasterdata_postalCode_input']; ?>

                            <div style="color: red; display: none;" id="examples_crmmasterdata_postalCode_error" class="validation_error"></div>
                        </td>
                        <td align="right">Country</td>
                        <td>
                            <select name="examples_crmmasterdata_country" id="examples_crmmasterdata_country">
                                <option value="" selected="selected"></option>
                            <?php $_from = $this->_tpl_vars['geoCountryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['countryKey'] => $this->_tpl_vars['countryItem']):
?>
                                <option value="<?php echo $this->_tpl_vars['countryKey']; ?>
"><?php echo $this->_tpl_vars['countryItem']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                            </select>
                            <div style="color: red; display: none;" id="examples_crmmasterdata_country_error" class="validation_error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Telephone</td>
                        <td>
                            <?php echo $this->_tpl_vars['examples_crmmasterdata_tel_input']; ?>

                            <div style="color: red; display: none;" id="examples_crmmasterdata_tel_error" class="validation_error"></div>
                        </td>
                        <td align="right">Email</td>
                        <td>
                            <?php echo $this->_tpl_vars['examples_crmmasterdata_email_input']; ?>

                            <div style="color: red; display: none;" id="examples_crmmasterdata_email_error" class="validation_error"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <?php echo $this->_tpl_vars['examples_crmmasterdata_idCustomer_hidden']; ?>

                            <input type="hidden" value="1" name="examples_crmmasterdata_userInsert" id="examples_crmmasterdata_userInsert">
                            <input type="hidden" value="2" name="examples_crmmasterdata_userMod" id="examples_crmmasterdata_userMod">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8" align="center">
                            <input type="button" name="insert" value="INSERT" id="insert" onclick="insertUpdateRecord('insert-record');" />
                            <input type="button" name="update" value="UPDATE" id="update" onclick="insertUpdateRecord('update-record');" disabled="disabled" />
                            <input type="button" name="reset" value="RESET" id="reset"  onclick="resetRecord();"/>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
        
        <fieldset>
            <legend>Customer data list</legend>
            <div class="b-datatable">
                <?php echo $this->_tpl_vars['datatable']; ?>

            </div>
        </fieldset>
    </fieldset>
    
    <div class="delete-dialog" id="delete-dialog">
        <input type="hidden" name="delete-item" id="delete-item" value="" />
        <div>Are you really whant to delete?</div>
    </div>
    
    <?php echo '
        <script type="text/javascript">
        
            var userAction                  = \'insert\';
            var examples_crmmasterdata_vat  = \'\'; 
            var examples_crmmasterdata_nin  = \'\';
            
            $(document).ready(function(){
                $(\'#examples_crmmasterdata_city\').bind(\'blur\', function(){
                    makeAjaxRequest({
                        action: \'autocomplete\',
                        field:  \'cityinfo\',
                        term:    $(this).val()
                    }, function(json){
                    
                        $(\'#examples_crmmasterdata_province\').val(json.result.province);
                        $(\'#examples_crmmasterdata_country\').val(json.result.country);
                        $(\'#examples_crmmasterdata_postalCode\').val(json.result.postalCode);
                    })    
                })
            })
        
            function datatableRowEvent(){
                $(sample_element.fnGetNodes()).each(function(){
                    $(this).dblclick(function(){
                        // reset all fileds
                        resetRecord();
                        
                        makeAjaxRequest({
                            action: \'get-record\',
                            id:     $(this).find(\'td:first\').text()
                        }, function(json){
                            for(key in json) {
                                $(\'#examples_crmmasterdata_\' + key).val(json[key]);
                            }
                            
                            examples_crmmasterdata_nin = $(\'#examples_crmmasterdata_nin\').val();
                            examples_crmmasterdata_vat = $(\'#examples_crmmasterdata_vat\').val();
                            
                            $(\'#insert\').attr(\'disabled\', \'disabled\');
                            $(\'#update\').removeAttr(\'disabled\');
                            
                            userAction = \'edit\';
                        });
                    })
                })
            }
            
            function makeAjaxRequest(data, callback){
                $.ajax({
                        url:        \''; ?>
<?php echo prep_url(shinfw_base_url()); ?><?php echo '/examples/crm_customer_master_data.php\',
                        dataType:   \'json\',
                        data:       data,
                        type:       \'POST\',
                        success:    callback
                })
            }
            
            function insertUpdateRecord(action){
                
                var data    =   {action:                            action, 
                                 examples_crmmasterdata_province:   $(\'#examples_crmmasterdata_province option:selected\').val(),
                                 examples_crmmasterdata_country:    $(\'#examples_crmmasterdata_country option:selected\').val(),
                                 examples_crmmasterdata_idCustomer: $(\'#examples_crmmasterdata_idCustomer\').val()};
                
                $(\'#master_data_form :input[type=text]\').each(function(){
                    data[$(this).attr("name")] = $(this).val();    
                })
                
                makeAjaxRequest(data, function(json){
                    if(json.result) {
                        hideValidationMessages();
                        showActionMessages(json.message);
                        resetRecord();
                        sample_element.fnDraw();    
                    } else {
                        showValidationMessages(json.errors);
                    }    
                })
                
            }
            
            function resetRecord(){
                $(\'#master_data_form :input[type=text]\').val(\'\');
                $(\'#examples_crmmasterdata_country :first\').attr(\'selected\', \'selected\');
                $(\'#examples_crmmasterdata_province :first\').attr(\'selected\', \'selected\');
                
                $(\'#insert\').removeAttr(\'disabled\');
                $(\'#update\').attr(\'disabled\', \'disabled\');
                
                $(\'#examples_crmmasterdata_vat\').removeClass(\'red\');
                $(\'#examples_crmmasterdata_nin\').removeClass(\'red\');
                
                $(\'#examples_crmmasterdata_idCustomer\').val(\'\');
                
                examples_crmmasterdata_vat  = \'\'; 
                examples_crmmasterdata_nin  = \'\';
                
                userAction = \'insert\';
            }
            
            function makeVatAutocomplete(request, response){
                if(request.term != \'\') {
                    makeAjaxRequest({
                        action: \'autocomplete\',
                        field:  \'vat\',
                        term:    request.term 
                    }, function(json){
                        if(json.result && request.term != examples_crmmasterdata_vat) {
                            $(\'#examples_crmmasterdata_vat\').removeClass(\'white\').addClass(\'red\');
                            
                            if(userAction == \'insert\') {
                                $(\'#insert\').attr(\'disabled\', \'disabled\');
                            } else {
                                $(\'#update\').attr(\'disabled\', \'disabled\');
                            }
                        } else {
                            $(\'#examples_crmmasterdata_vat\').removeClass(\'red\').addClass(\'white\');
                            if(userAction == \'insert\' && !$(\'#examples_crmmasterdata_nin\').hasClass(\'red\')) {
                                $(\'#insert\').removeAttr(\'disabled\');
                            } else if(!$(\'#examples_crmmasterdata_nin\').hasClass(\'red\')) {
                                $(\'#update\').removeAttr(\'disabled\');
                            } 
                        }
                    })
                } else {
                    $(\'#examples_crmmasterdata_vat\').addClass(\'white\');
                }
                
                response({});    
            }
            
            function makeNinAutocomplete(request, response){
                if(request.term != \'\') {
                    makeAjaxRequest({
                        action: \'autocomplete\',
                        field:  \'nin\',
                        term:    request.term 
                    }, function(json){
                        if(json.result && request.term != examples_crmmasterdata_nin) {
                            $(\'#examples_crmmasterdata_nin\').removeClass(\'white\').addClass(\'red\');
                            
                            if(userAction == \'insert\' && !$(\'#examples_crmmasterdata_vat\').hasClass(\'red\')) {
                                $(\'#insert\').attr(\'disabled\', \'disabled\');
                            } else if(!$(\'#examples_crmmasterdata_vat\').hasClass(\'red\')) {
                                $(\'#update\').attr(\'disabled\', \'disabled\');
                            }
                        } else {
                            $(\'#examples_crmmasterdata_nin\').removeClass(\'red\').addClass(\'white\');
                                
                            if(userAction == \'insert\' && !$(\'#examples_crmmasterdata_vat\').hasClass(\'red\')) {
                                $(\'#insert\').removeAttr(\'disabled\');
                            } else if(!$(\'#examples_crmmasterdata_vat\').hasClass(\'red\')) {
                                $(\'#update\').removeAttr(\'disabled\');
                            }
                        }
                    })
                } else {
                    $(\'#examples_crmmasterdata_nin\').addClass(\'white\');
                }
                
                response({});    
            }
            
            function makeCityAutocomplete(request, response){
                if(request.term != \'\') {
                    makeAjaxRequest({
                        action: \'autocomplete\',
                        field:  \'city\',
                        term:    request.term 
                    }, function(json){
                        response(json);    
                    })
                } else {
                    response({});
                }
            }
            
            function selectCity(event, ui){
               
               if(ui.item.value != \'\') {
                    makeAjaxRequest({
                        action: \'autocomplete\',
                        field:  \'cityinfo\',
                        term:    ui.item.value
                    }, function(json){
                    
                        $(\'#examples_crmmasterdata_province\').val(json.result.province);
                        $(\'#examples_crmmasterdata_country\').val(json.result.country);
                        $(\'#examples_crmmasterdata_postalCode\').val(json.result.postalCode);
                    }) 
               }    
            }
            
            function showActionMessages(message){
                $(\'#js-message p\').text(message);
                $(\'#js-message\').show();
                
                setTimeout(hideActionMessages, 5000);
            }
            
            function showActionErrors(message){
                $(\'#js-error p\').text(message);
                $(\'#js-error\').show();
                
                setTimeout(hideActionMessages, 5000);
            }
            
            function hideActionMessages(){
                 $(\'#js-message\').fadeOut(\'normal\');       
                 $(\'#js-error\').fadeOut(\'normal\');       
            }
            
            function showValidationMessages(messages) {
                
                hideValidationMessages();
            
                for(key in messages) {
                    $(\'#\' + key + \'_error\').text(messages[key]).show();
                }
            }
            
            function hideValidationMessages(){
                $(\'.validation_error\').hide();
            }
            
            function openDialog(id, type, table) {
                $(\'#delete-dialog\').dialog(\'open\');
                $(\'#delete-item\').val(id);
            }
            
            function deleteRecord(){
                
                makeAjaxRequest({
                    action: \'delete\',
                    id:      $(\'#delete-item\').val()
                }, function(json){
                    
                    if(json.result){
                        closeDeleteDialog();
                        sample_element.fnDraw();
                        showActionMessages(json.message);    
                    } else {
                        showActionErrors(json.errors);
                    }    
                })    
            }
            
            function closeDeleteDialog(){
                $(\'#delete-dialog\').dialog(\'close\');
            }
        </script>
    '; ?>

    
    <?php echo '
        <style type="text/css">
            input{
                width: 150px; 
            }
            
            #sample_element tbody td{
                cursor: pointer;
            }
            
            .ui-autocomplete {
                max-height: 100px;
                overflow-y: auto;
                font-size: 14px;
                width: 160px !important;
            }
            /* IE 6 doesn\'t support max-height
             * we use height instead, but this forces the menu to always be this tall
             */
            * html .ui-autocomplete {
                height: 100px;
            }
            
            .validation_error {
                font-size: 10px;
            }
            
            .red{
                background-color: #FF0000;
            }
            
            .white{
                background-color: #FFFFFF;
            }
            
            .b-datatable{
                width: 1100px;
            }
            
            td{ white-space: nowrap }
        </style>
    '; ?>

    
</body>
</html>