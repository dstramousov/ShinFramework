        {include file="web/header.tpl"}

        {literal}
        <script type="text/javascript">
            $(document).ready(function(){
            	var docMode = document.documentMode;
            	if(docMode == 7){alert("{/literal}{$lng_label_compatibilitymode}{literal}");}
            })    
        </script>    
        {/literal}

        <div class="b-content">
            <!-- header block -->
            <div class="b-header-bar">
                {$proomblock}{$toprightblock}
                <div class="clear"></div>
            </div>
            <div class="b-header">
                <div class="b-logo">
                    <a onfocus="blur();" href="{php} echo base_url();{/php}"><img src="{php} echo SHIN_Core::$_config['core']['app_base_url'];{/php}/images/site/Logone.png" alt="" title="" /></a>
                </div>
            </div>
            <!-- .header block -->
            <!-- content block -->
            <div class="b-content-inner">
                <!-- search form-->
                <div class="search-form">
                    {include file="web/common/search-form.tpl"}
                </div>
                <!-- .search form -->
                	
                	<img src="{php}echo SHIN_Core::$_config['core']['app_base_url']{/php}/mainphoto/image001.jpg" alt="" title="" />
            </div>
            <!-- .content block -->
            <div class="white-delimiter"></div>
            <!-- footer block -->
            {include file="web/footer.tpl"}
            <!-- .footer block -->
        </div>
    </body>
</html>
