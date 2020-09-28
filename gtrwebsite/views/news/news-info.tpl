<div>
    <form action="" method="post" class="gtrwebsite-dialog">
        <table>
            <tr>
                <td colspan="2">{$gtrwebsite_news_idNews_hidden}</td>
            </tr>
            <tr>
                <th>{$lng_label_news_type}:</th>
                <td>
                    {$gtrwebsite_news_newsType_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_news_newsType_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_news_title}:</th>
                <td>
                    {$gtrwebsite_news_title_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_news_title_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_news_body_long}:</th>
                <td>
                    {$gtrwebsite_news_bodyLong_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_news_bodyLong_error"></span>
                </td>
            </tr>
            {if !empty($gtrwebsite_news_idNews)}
            <tr>
                <th>{$lng_label_news_img_old}:</th>
                <td>
                    <img src="{php}echo prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['news_images'] . '/'.SHIN_Core::$_config['store']['thumbnails_prefix']);{/php}{$gtrwebsite_news_img}" alt="" title="" />
                </td>
            </tr>
            {/if}
            <tr>
                <th>{$lng_label_news_img}</th>
                <td>
                    <div id="imgUploader"></div><br />
                    <span class="validatetion-error" id="gtrwebsite_news_img_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_news_link}:</th>
                <td>
                    {$gtrwebsite_news_link_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_news_link_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_news_status}:</th>
                <td>
                    {$gtrwebsite_news_status_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_news_status_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_news_date_start}:</th>
                <td>
                    {$gtrwebsite_news_dataStart_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_news_dataStart_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_news_date_stop}:</th>
                <td>
                    {$gtrwebsite_news_dataStop_input}<br />
                    <span class="validatetion-error" id="gtrwebsite_news_dataStop_error"></span>
                </td>
            </tr>
            <tr>
                <th>{$lng_label_news_clicks}:</th>
                <td>
                    {$gtrwebsite_news_clicks_ro}<br />
					{$gtrwebsite_news_clicks_hidden}
                    <span class="validatetion-error" id="gtrwebsite_news_clicks_error"></span>
                </td>
            </tr>
        </fieldset>
    </form>
</div>

{literal}
    {/literal}{$jsdocready}{literal}
{/literal}
