<?php /* Smarty version 2.6.26, created on 2011-08-25 11:20:32
         compiled from admin/relation/relation_manage.tpl */ ?>
<div class="customer-new">
    
    <fieldset>
        <legend><?php echo $this->_tpl_vars['lng_label_customer_application_list']; ?>
</legend>
        <div class="relation-messages">
            <?php echo $this->_tpl_vars['jsMessages']; ?>

            <?php echo $this->_tpl_vars['jsErrors']; ?>

        </div>
        <div class="relation-list list">
            <?php echo $this->_tpl_vars['customerListRel']; ?>

        </div>
    </fieldset>
    
    <div id="manage-relations">
        <input type="hidden" name="current-customer" value="" id="current-customer" />
        <table>
            <?php $_from = $this->_tpl_vars['allApplicationList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['application']):
?>
                <tr>
                    <td><input type="checkbox" name="application[]" value="<?php echo $this->_tpl_vars['application']['idApplication']; ?>
" id="<?php echo $this->_tpl_vars['application']['idApplication']; ?>
"></td>
                    <td><label for="<?php echo $this->_tpl_vars['application']['idApplication']; ?>
"><?php echo $this->_tpl_vars['application']['applicationName']; ?>
</label></td>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>
    </div>
    
</div>
<?php echo '
    <script type="text/javascript">
        function closeDialog(customerId){
            $(\'#manage-relations\').dialog(\'close\');    
        }
        
        function saveRelations(){
            var customerId      = $(\'#manage-relations #current-customer\').val(customerId);
            var applicationList = new Array;
            
            
            $(\'#manage-relations input:checkbox:checked\').each(function(){
                applicationList.push($(this).val());       
            });
            
            $.getJSON('; ?>
'<?php echo prep_url(base_url().'/lists/ajaxsaveapplicationlist'); ?>'<?php echo ', {
                customerId:         customerId,
                applicationList:    applicationList.join(\',\') 
            }, function(json){
                if(json.result) {
                    showMessages(json.message);
                } else {
                    showErrors(json.message);
                }
                
                $(\'#manage-relations\').dialog(\'close\');
            });        
        }
        
        function loadRelations(customerId){
            $.getJSON('; ?>
'<?php echo prep_url(base_url().'/lists/ajaxapplicationlist'); ?>'<?php echo ', {
                customerId: customerId 
            }, function(json){
                $(\'#manage-relations #current-customer\').val(customerId);
                $(\'#manage-relations input:checked\').removeAttr(\'checked\');
                for(index in json.data) {
                    $(\'#manage-relations input[value=\' + json.data[index]  + \']\').attr(\'checked\', \'checked\');
                }
                
                $(\'#manage-relations\').dialog(\'open\');    
            });
        }
        
        function showMessages(message){
            $(\'.relation-messages #js-message p\').text(message);
            $(\'.relation-messages #js-message\').show();
            
            setTimeout(hideActionMessages, 5000);
        }
        
        function showErrors(message){
            
            $(\'.relation-messages #js-error p\').text(message);
            $(\'.relation-messages #js-error\').show();
            
            setTimeout(hideActionMessages, 5000);
        }
        
        function hideActionMessages(){
             $(\'.relation-messages #js-message\').fadeOut(\'normal\');       
             $(\'.relation-messages #js-error\').fadeOut(\'normal\');       
        }         
    </script>
'; ?>

   