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
                    <span class="form-header-red-text">{$lng_label_forgot_header}</span><br /><br />
                    <span class="form-header-title">{$lng_label_forgot_title}</span>
                    <br />
                    <br />
                    <!-- forgot password form -->
                    <form action="{php} echo base_url().'/tryrestorepass'; {/php}" name="forgot-form" id="forgot-form" method="post">
						<table class="forgot-form" align="center">
                            <tr>
                                <th style="border-bottom: none;"><label for="forgot-input">{$lng_label_fg}:</label></th>
                                <td style="border-bottom: none;">
                                    <input type="text" name="forgot-input" id="forgot-input" value="" />
                                    <input type="submit" class="reset-pwd-btn" value="Reset Password" name="reset-button" id="reset-button" />
                                </td>
                            </tr>
                        </table>
                    </form>
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
