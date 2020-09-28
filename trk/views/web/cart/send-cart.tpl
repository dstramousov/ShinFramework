        {include file="web/header.tpl"}
        <div class="b-content">
            <!-- header block -->
            <div class="b-header-bar">
                {$proomblock}{$toprightblock}
                <div class="clear"></div>
            </div>
            {include file="web/header_rand_photo.tpl"}
            <!-- .header block -->
            <!-- content block -->
            <div class="b-content-inner">
                <!-- search form-->
                <div class="search-form with-header-photo">
                    {include file="web/common/search-form.tpl"}
                </div>
                <!-- .search form -->
                <!-- cart send seccessfully -->
                <div class="cart-sended">
                    <span class="form-header-red-text">{$lng_label_send_cart_header}</span><br /><br />
                    <span class="form-header-title">{$lng_label_rsend_cart_title}</span>
                    <br />
                    <br />
                    <table align="center" class="cart-table">
                        <tr>
                            <th>{$lng_label_owner_name}</th>
                            <td>{$lng_label_ordered_pictures}</td>
                        </tr>
                        {foreach from=$alreadySended item=result key=nickname}
                        <tr>
                            <td style="border-right: 1px solid #999999;">
                                {$nickname}    
                            </td>
                            <td>
                                {$orderedPictures.$nickname}
                            </td>
                        </tr>
                        {/foreach}
                    </table>
                </div>
                <!-- cart list seccessfully -->
            </div>
            <!-- .content block -->
            <div class="white-delimiter"></div>
            <!-- footer block -->
            {include file="web/footer.tpl"}
            <!-- .footer block -->
        </div>
    </body>
</html>
