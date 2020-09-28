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
                 <div class="forgot-password search-form">
                <!-- success join message -->
                <div class="success-message">{$mess}</div>
                <!-- success join message -->
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