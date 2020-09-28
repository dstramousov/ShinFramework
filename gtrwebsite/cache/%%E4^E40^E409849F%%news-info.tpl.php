<?php /* Smarty version 2.6.26, created on 2010-11-23 09:55:54
         compiled from news/news-info.tpl */ ?>
<div>
    <form action="" method="post" class="gtrwebsite-dialog">
        <table>
            <tr>
                <td colspan="2"><?php echo $this->_tpl_vars['gtrwebsite_news_idNews_hidden']; ?>
</td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_news_type']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_news_newsType_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_news_newsType_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_news_title']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_news_title_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_news_title_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_news_body_long']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_news_bodyLong_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_news_bodyLong_error"></span>
                </td>
            </tr>
            <?php if (! empty ( $this->_tpl_vars['gtrwebsite_news_idNews'] )): ?>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_news_img_old']; ?>
:</th>
                <td>
                    <img src="<?php echo prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['news_images'] . '/'.SHIN_Core::$_config['store']['thumbnails_prefix']); ?><?php echo $this->_tpl_vars['gtrwebsite_news_img']; ?>
" alt="" title="" />
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_news_img']; ?>
</th>
                <td>
                    <div id="imgUploader"></div><br />
                    <span class="validatetion-error" id="gtrwebsite_news_img_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_news_link']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_news_link_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_news_link_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_news_status']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_news_status_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_news_status_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_news_date_start']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_news_dataStart_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_news_dataStart_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_news_date_stop']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_news_dataStop_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_news_dataStop_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_news_clicks']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_news_clicks_ro']; ?>
<br />
					<?php echo $this->_tpl_vars['gtrwebsite_news_clicks_hidden']; ?>

                    <span class="validatetion-error" id="gtrwebsite_news_clicks_error"></span>
                </td>
            </tr>
        </fieldset>
    </form>
</div>

<?php echo '
    '; ?>
<?php echo $this->_tpl_vars['jsdocready']; ?>
<?php echo '
'; ?>
