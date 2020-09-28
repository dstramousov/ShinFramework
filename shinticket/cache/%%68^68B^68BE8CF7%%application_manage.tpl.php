<?php /* Smarty version 2.6.26, created on 2011-08-25 11:20:32
         compiled from admin/application/application_manage.tpl */ ?>
<div class="application-new">
    <fieldset>
        <legend><?php echo $this->_tpl_vars['lng_label_application_manage_page']; ?>
</legend>
        <div class="add-application-form">
            <form action="<?php echo prep_url(base_url().'/lists/applicationadd'); ?>" method="post">
            <table>
                <tr>
                    <td>
                        <?php echo $this->_tpl_vars['shinticket_applicationlist_applicationName_input']; ?>

                    </td>
                    <td>
                        <input type="submit" name="submit-new-application" value="<?php echo $this->_tpl_vars['lng_label_application_add']; ?>
">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </fieldset>
    
    <fieldset>
        <legend><?php echo $this->_tpl_vars['lng_label_application_list']; ?>
</legend>
        <div class="application-list list">
            <?php echo $this->_tpl_vars['applicationList']; ?>

        </div>
    </fieldset>
    
    <form action="<?php echo prep_url(base_url().'/lists/applicationdelete'); ?>" method="post" id="delete-application">
        <?php echo $this->_tpl_vars['shinticket_applicationlist_idApplication_hidden']; ?>

    </form>
    
    <div id="delete-application-dialog" title="<?php echo $this->_tpl_vars['lng_label_application_delete_really']; ?>
">
        <center><?php echo $this->_tpl_vars['lng_label_application_delete_really']; ?>
</center>
    </div>
</div>
<?php echo '
    <script type="text/javascript">
        function deleteApplication(applicationId){
            $(\'#shinticket_applicationlist_idApplication\').val(applicationId);
            
            $(\'#delete-application-dialog\').dialog(\'open\');    
        }
        
        function deleteApplicationRecord(){
            $(\'#delete-application\').submit();
        }
        
        function closeApplicationDialog(){
            $(\'#delete-application-dialog\').dialog(\'close\');    
        }
    </script>
'; ?>

