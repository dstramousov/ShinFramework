<form action="{php}echo prep_url(base_url().'/menugrpmanage/savemenugrpinfo');{/php}" method="post" class="sys-dialog">
    <table>
        <tr>
            <th></th>
            <td>
                <input type="hidden" name="sys_menugrp_idMenu_old"  value="{$sys_menugrp_idMenu}" id="sys_menugrp_idMenu_old" />
                <input type="hidden" name="sys_menugrp_idPanel_old" value="{$sys_menugrp_idPanel}" id="sys_menugrp_idPanel_old" />
                <input type="hidden" name="sys_menugrp_idGrp_old" value="{$sys_menugrp_idGrp}" id="sys_menugrp_idGrp_old" />
                <input type="hidden" name="sys_menugrp_ico_old" value="{$sys_menugrp_ico}" id="sys_menugrp_ico_old" />
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_grp_id_menu}:</th>
            <td>
                {$sys_menugrp_idMenu_input}<br />
                <span class="validatetion-error" id="sys_menugrp_idMenu_error"></span> 
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_grp_id_panel}:</th>
            <td>
                {$sys_menugrp_idPanel_input}<br />
                <span class="validatetion-error" id="sys_menugrp_idPanel_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_grp_id_grp}:</th>
            <td>
                {$sys_menugrp_idGrp_input}&nbsp;<span class="last-rec">{$lng_label_sys_menu_last_rec}{$lastRec.idGrp}</span><br />
                <span class="validatetion-error" id="sys_menugrp_idGrp_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_grp_title}:</th>
            <td>
                {$sys_menugrp_title_input}<br />
                <span class="validatetion-error" id="sys_menugrp_title_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_grp_class}:</th>
            <td>
                {$sys_menugrp_class_input}<br />
                <span class="validatetion-error" id="sys_menugrp_class_error"></span> 
            </td>
        </tr>
        {if !empty($sys_menugrp_ico)}
        <tr>
            <th>{$lng_label_menu_grp_old_ico}</th>
            <td><img src="{php}echo prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . shinfw_folder() . '/images/');{/php}{$sys_menugrp_ico}" alt="{$sys_menugrp_ico}" title="{$sys_menugrp_ico}" width="16" height="16" /></td>
        </tr>
        {/if}
        <tr>
            <th>{$lng_label_menu_grp_ico}:</th>
            <td>
                <div id="imgUploader"></div>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_menu_grp_position}:</th>
            <td>
                {$sys_menugrp_position_input}<br />
                <span class="validatetion-error" id="sys_menugrp_position_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

{$jsdocready}

{literal}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sys_menugrp_idMenu').change(function(){
                $.getJSON('{/literal}{php}echo prep_url(base_url().'/menumanage/getpanellist');{/php}{literal}', {
                    menuId: $(this).val()
                }, function(json) {
                    $('#sys_menugrp_idPanel').empty();
                    $('#sys_menugrp_idGrp').empty();
                    $('#sys_menugrp_idPanel').append('<option value=""></option>');    
                    for(index in json) {
                        $('#sys_menugrp_idPanel').append('<option value="' + index + '">' +  json[index] + '</option>');    
                    }
                })
            })
        })
    </script>
{/literal}
