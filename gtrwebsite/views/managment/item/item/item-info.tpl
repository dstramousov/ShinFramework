<div>
    <form action="" method="post" class="gtrwebsite-dialog" enctype="multipart/form-data">
        <table>
            <tr>
                <td colspan="2">{$gtrwebsite_items_idItem_hidden}</td>
            </tr>
            <tr>
                <th>{$lng_label_item_id_category}:</th>
                <td>
                    {$gtrwebsite_items_idItemCat_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_items_idItemCat_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_item_description}:</th>
                <td>
                    {$gtrwebsite_items_description_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_items_description_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_item_title}:</th>
                <td>
                    {$gtrwebsite_items_title_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_items_title_error"></span>
                </td>
            </tr>
            {if !empty($gtrwebsite_items_idItem)}
            <tr>
                <th>{$lng_label_item_img_old}:</th>
                <td>
                    <img src="{php}echo prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['items_images'] . '/'.SHIN_Core::$_config['store']['thumbnails_prefix']);{/php}{$gtrwebsite_items_img}" alt="" title="" />
                </td>
            </tr>
            {/if}
            <tr>
                <th>{$lng_label_item_img}</th>
                <td>
                    <div id="imgUploader"></div><br />
                    <span class="validatetion-error" id="gtrwebsite_items_img_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_item_link}:</th>
                <td>
                    {$gtrwebsite_items_link_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_items_link_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_news_clicks}:</th>
                <td>
                    {$gtrwebsite_items_clicks_ro}<br />
                    {$gtrwebsite_items_clicks_hidden}
                    <span class="validatetion-error" id="gtrwebsite_items_clicks_error"></span>
                </td>
            </tr>
        </fieldset>
    </form>
</div>

{$jsdocready}
