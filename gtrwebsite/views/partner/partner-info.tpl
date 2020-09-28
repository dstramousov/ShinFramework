<form action="" method="post" class="gtrwebsite-dialog">
    <table>
        <tr>
            <td colspan="2">{$gtrwebsite_partners_idPartner_hidden}</td>
        </tr>
        <tr>
            <th>{$lng_label_partners_type}:</th>
            <td>
                {$gtrwebsite_partners_partnerType_input}<br />
                <span class="validatetion-error" id="gtrwebsite_partners_partnerType_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_partners_field}:</th>
            <td>
                {$gtrwebsite_partners_partnerField_input}<br />
                <span class="validatetion-error" id="gtrwebsite_partners_partnerField_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_partners_name}:</th>
            <td>
                {$gtrwebsite_partners_name_input}<br />
                <span class="validatetion-error" id="gtrwebsite_partners_name_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_partners_desc}:</th>
            <td>
                {$gtrwebsite_partners_description_input}<br />
                <span class="validatetion-error" id="gtrwebsite_partners_description_error"></span>
            </td>
        </tr>
        {if !empty($gtrwebsite_partners_idPartner)}
        <tr>
            <th>{$lng_label_partners_img_old}:</th>
            <td>
                <img src="{php}echo prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['partners_images'] . '/'.SHIN_Core::$_config['store']['thumbnails_prefix']);{/php}{$gtrwebsite_partners_img}" alt="" title="" />
            </td>
        </tr>
        {/if}
        <tr>
            <th>{$lng_label_partners_img}</th>
            <td>
                <div id="partnerImgUploader"></div><br />
                <span class="validatetion-error" id="gtrwebsite_partners_img_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_partners_link}:</th>
            <td>
                {$gtrwebsite_partners_link_input}<br />
                <span class="validatetion-error" id="gtrwebsite_partners_link_error"></span>
            </td>
        </tr>
        <tr>
            <th>{$lng_label_partners_clicks}:</th>
            <td>
                {$gtrwebsite_partners_clicks_ro}<br />
                {$gtrwebsite_partners_clicks_hidden}
                <span class="validatetion-error" id="gtrwebsite_partners_clicks_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

{$jsdocready}