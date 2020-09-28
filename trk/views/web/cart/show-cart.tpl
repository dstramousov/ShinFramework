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
                
                <!-- cart list -->
                <div class="cart-list">
                    <table align="center">
                        <tr>
                            <td align="left" colspan="3">
                                <a href="{php} echo base_url(); {/php}/main">{$lng_label_nav_main_page}</a> -> {$lng_label_show_cart}
                                <br /><br />
                            </td>
                        </tr>
                    {foreach from=$cartList item=photo}
                        <tr id="imgblock_{$photo.idPhoto}">
                            <td width="20%">
                                <img src="{php}echo SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['gallery']['photo_storer_folder'] . '/'{/php}{$photo.userId}/{$photo.folder}{php}echo '/' . SHIN_Core::$_config['store']['thumbnails_prefix'];{/php}{$photo.sysname}" alt="" title="" />
                            </td>
                            <td width="70%"> 
                                {$photo.description}
                            </td>
                            <td width="10%" align="center">
                                <a href="javascript:deleteFromCart({$photo.idPhoto});"><img src="{php}echo SHIN_Core::$_config['core']['app_base_url'] . '/images/delete.png';{/php}" alt="Delete fom the Cart" title="Dlete from the cart" /></a>
                            </td>
                        </tr>
                    {/foreach}
                        <tr>
                            <td colspan="3" align="center">
                                <form action="{php}echo base_url(){/php}/cart/sendcart" method="post">
                                    <input type="submit" class="send-picture" name="send-pictures" value="Send picture order" id="send-pictures" />
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- cart list -->
            </div>
            <!-- .content block -->
            <div class="white-delimiter"></div>
            <!-- footer block -->
            {include file="web/footer.tpl"}
            <!-- .footer block -->
        </div>
        {literal}
        <script type="text/javascript">
            function deleteFromCart(idPhoto) {
                $.getJSON({/literal}'{php} echo base_url(); {/php}/cart/deletefromcart'{literal}, {
                    idPhoto: idPhoto
                }, function(json) {
                    if(json.result) {
                        // 1. remove image block
                        $('#imgblock_' + idPhoto).remove();
                        
                        // 2. update total count
                        $('.total-cart-items').text(json.count);    
                    }    
                })   
            } 
        </script> 
    {/literal}
    </body>
</html>
