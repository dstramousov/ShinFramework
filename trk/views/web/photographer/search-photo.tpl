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
                <div class="search-list">
                    <div class="search-text">{$lng_label_search_text}</div>
                    <!-- crumbs -->
                    <div class="bread-crumbs">
                        <a href="{php} echo base_url(); {/php}/main">{$lng_label_nav_main_page}</a> -> {$lng_label_nav_search_page}&nbsp;{$total_search_count}&nbsp;{$lng_label_total_search_count}
                    </div>
                    <!-- crumbs -->
                    <!-- navigation box -->
                    <div class="page-navigation">{$nav_str_up}</div>
                    <div class="clear"></div>
                    <!-- navigation box -->
                    <!--<div <!--style="z-index:-9;">-->
                    <div>
                    {if !empty($trk_photo_idPhoto)}
                        <ul>
                            {section name=id loop=$trk_photo_idPhoto}
                               <li>
                                 <a href="{php}echo base_url().'/showphoto?photo=';{/php}{$trk_photo_sysname[id]}"><img src="{$trk_gallery_photo[id]}" /></a>
                               </li>
                            {/section }
                    </ul>
                    {else}
                        <div class="empty-search"><div>{$lng_label_search_empty}</div></div>
                    {/if}
                    </div>
                    <!-- navigation box -->
                    <div class="page-navigation">{$nav_str_down}</div>
                    <!-- navigation box -->
                    <div class="clear"></div>
                    
                </div>
            </div>
            <!-- .content block -->
            <div class="white-delimiter"></div>
            <!-- footer block -->
            {include file="web/footer.tpl"}
            <!-- .footer block -->
        </div>
    </body>
</html>
