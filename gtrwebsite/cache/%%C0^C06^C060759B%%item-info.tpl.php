<?php /* Smarty version 2.6.26, created on 2010-11-25 14:06:31
         compiled from managment/item/item/item-info.tpl */ ?>
<div>
    <form action="" method="post" class="gtrwebsite-dialog" enctype="multipart/form-data">
        <table>
            <tr>
                <td colspan="2"><?php echo $this->_tpl_vars['gtrwebsite_items_idItem_hidden']; ?>
</td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_item_id_category']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_items_idItemCat_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_items_idItemCat_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_item_description']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_items_description_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_items_description_error"></span>
                </td>
            </tr>
            <?php if (! empty ( $this->_tpl_vars['gtrwebsite_items_idItem'] )): ?>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_item_img_old']; ?>
:</th>
                <td>
                    <img src="<?php echo prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['items_images'] . '/'.SHIN_Core::$_config['store']['thumbnails_prefix']); ?><?php echo $this->_tpl_vars['gtrwebsite_items_img']; ?>
" alt="" title="" />
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_item_img']; ?>
</th>
                <td>
                    <div id="imgUploader"></div><br />
                    <span class="validatetion-error" id="gtrwebsite_items_img_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_item_link']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_items_link_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_items_link_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_news_clicks']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_items_clicks_ro']; ?>
<br />
                    <?php echo $this->_tpl_vars['gtrwebsite_items_clicks_hidden']; ?>

                    <span class="validatetion-error" id="gtrwebsite_items_clicks_error"></span>
                </td>
            </tr>
        </fieldset>
    </form>
</div>

<?php echo $this->_tpl_vars['jsdocready']; ?>
