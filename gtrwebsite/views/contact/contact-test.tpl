{$jsdocready}

<div>
    <form action="" method="post" class="contact-test-form">
        
        <div class="messages">
            {$jsMessages}
            {$jsErrors}
        </div>
        
        <br />
        
        <table>
            <tr>
                <th>{$lng_label_contact_name}:</th>
                <td>
                    {$gtrwebsite_contact_name_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_stored}:</th>
                <td>
                    {$gtrwebsite_contact_stored_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_surname}:</th>
                <td>
                    {$gtrwebsite_contact_surname_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_address}</th>
                <td>
                    {$gtrwebsite_contact_address_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_city}:</th>
                <td>
                    {$gtrwebsite_contact_city_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_provincia}:</th>
                <td>
                    {$gtrwebsite_contact_provincia_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_postCode}:</th>
                <td>
                    {$gtrwebsite_contact_postCode_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_tel}:</th>
                <td>
                    {$gtrwebsite_contact_tel_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_email}:</th>
                <td>
                  {$gtrwebsite_contact_email_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_info}:</th>
                <td>
                    {$gtrwebsite_contact_info_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_action}:</th>
                <td>
                    {$gtrwebsite_contact_action_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_keepUpdated}:</th>
                <td>
                    {$gtrwebsite_contact_keepUpdated_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_barrier}:</th>
                <td>
                    {$gtrwebsite_contact_barrier_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_bathroom}:</th>
                <td>
                    {$gtrwebsite_contact_bathroom_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_kitchen}:</th>
                <td>
                    {$gtrwebsite_contact_kitchen_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_comfort}:</th>
                <td>
                    {$gtrwebsite_contact_comfort_input}
                </td>
            </tr>
            <tr>
                <th>{$lng_label_contact_sense}:</th>
                <td>
                    {$gtrwebsite_contact_sense_input}
                </td>
            </tr>            
            <tr>
                <td colspan="2"><input type="button" id="add-contact-button" value="" name=""></td>
            </tr>
        </table>
    </form>
</div>

{literal}
    <script type="text/javascript">
        function addContact(){
            
            // 1. collect data
            var data = $('.contact-test-form').serialize() + '&gtrwebsite_contact_info=' + tinyMCE.activeEditor.getContent();
            
            // 2. send to the server
            $.ajax({
                url:        '{/literal}{php}echo prep_url(base_url().'/contact/save');{/php}{literal}',
                data:       data,
                dataType:   'jsonp',
                success:    function(json){
                    if(json.result) {
                        $('#contact-js-message p').text('{/literal}{$lng_label_contact_add_success}{literal}');
                        $('#contact-js-message').show();
                    } else {
                        $('#contact-js-error p').text('{/literal}{$lng_label_contact_add_error}{literal}');
                        $('#contact-js-error').show();    
                    }
                    
                    // close all message boxes
                    setTimeout(function(){
                        $('#contact-js-message').hide();
                        $('#contact-js-error').hide();
                    }, 5000);    
                }        
            })
               
        }
    </script>
{/literal}