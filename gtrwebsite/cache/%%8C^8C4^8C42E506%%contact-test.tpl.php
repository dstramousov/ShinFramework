<?php /* Smarty version 2.6.26, created on 2011-03-10 07:35:53
         compiled from contact/contact-test.tpl */ ?>
<?php echo $this->_tpl_vars['jsdocready']; ?>


<div>
    <form action="" method="post" class="contact-test-form">
        
        <div class="messages">
            <?php echo $this->_tpl_vars['jsMessages']; ?>

            <?php echo $this->_tpl_vars['jsErrors']; ?>

        </div>
        
        <br />
        
        <table>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_name']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_name_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_stored']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_stored_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_surname']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_surname_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_address']; ?>
</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_address_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_city']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_city_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_provincia']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_provincia_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_postCode']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_postCode_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_tel']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_tel_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_email']; ?>
:</th>
                <td>
                  <?php echo $this->_tpl_vars['gtrwebsite_contact_email_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_info']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_info_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_action']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_action_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_keepUpdated']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_keepUpdated_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_barrier']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_barrier_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_bathroom']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_bathroom_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_kitchen']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_kitchen_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_comfort']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_comfort_input']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_contact_sense']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_contact_sense_input']; ?>

                </td>
            </tr>            
            <tr>
                <td colspan="2"><input type="button" id="add-contact-button" value="" name=""></td>
            </tr>
        </table>
    </form>
</div>

<?php echo '
    <script type="text/javascript">
        function addContact(){
            
            // 1. collect data
            var data = $(\'.contact-test-form\').serialize() + \'&gtrwebsite_contact_info=\' + tinyMCE.activeEditor.getContent();
            
            // 2. send to the server
            $.ajax({
                url:        \''; ?>
<?php echo prep_url(base_url().'/contact/save'); ?><?php echo '\',
                data:       data,
                dataType:   \'jsonp\',
                success:    function(json){
                    if(json.result) {
                        $(\'#contact-js-message p\').text(\''; ?>
<?php echo $this->_tpl_vars['lng_label_contact_add_success']; ?>
<?php echo '\');
                        $(\'#contact-js-message\').show();
                    } else {
                        $(\'#contact-js-error p\').text(\''; ?>
<?php echo $this->_tpl_vars['lng_label_contact_add_error']; ?>
<?php echo '\');
                        $(\'#contact-js-error\').show();    
                    }
                    
                    // close all message boxes
                    setTimeout(function(){
                        $(\'#contact-js-message\').hide();
                        $(\'#contact-js-error\').hide();
                    }, 5000);    
                }        
            })
               
        }
    </script>
'; ?>