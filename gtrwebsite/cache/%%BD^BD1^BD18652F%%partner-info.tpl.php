<?php /* Smarty version 2.6.26, created on 2010-11-24 11:20:00
         compiled from partner/partner-info.tpl */ ?>
<form action="" method="post" class="gtrwebsite-dialog">
    <table>
        <tr>
            <td colspan="2"><?php echo $this->_tpl_vars['gtrwebsite_partners_idPartner_hidden']; ?>
</td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_partners_type']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['gtrwebsite_partners_partnerType_input']; ?>
<br />
                <span class="validatetion-error" id="gtrwebsite_partners_partnerType_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_partners_field']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['gtrwebsite_partners_partnerField_input']; ?>
<br />
                <span class="validatetion-error" id="gtrwebsite_partners_partnerField_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_partners_name']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['gtrwebsite_partners_name_input']; ?>
<br />
                <span class="validatetion-error" id="gtrwebsite_partners_name_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_partners_desc']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['gtrwebsite_partners_description_input']; ?>
<br />
                <span class="validatetion-error" id="gtrwebsite_partners_description_error"></span>
            </td>
        </tr>
        <?php if (! empty ( $this->_tpl_vars['gtrwebsite_partners_idPartner'] )): ?>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_partners_img_old']; ?>
:</th>
            <td>
                <img src="<?php echo prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['partners_images'] . '/'.SHIN_Core::$_config['store']['thumbnails_prefix']); ?><?php echo $this->_tpl_vars['gtrwebsite_partners_img']; ?>
" alt="" title="" />
            </td>
        </tr>
        <?php endif; ?>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_partners_img']; ?>
</th>
            <td>
                <div id="partnerImgUploader"></div><br />
                <span class="validatetion-error" id="gtrwebsite_partners_img_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_partners_link']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['gtrwebsite_partners_link_input']; ?>
<br />
                <span class="validatetion-error" id="gtrwebsite_partners_link_error"></span>
            </td>
        </tr>
        <tr>
            <th><?php echo $this->_tpl_vars['lng_label_partners_clicks']; ?>
:</th>
            <td>
                <?php echo $this->_tpl_vars['gtrwebsite_partners_clicks_ro']; ?>
<br />
                <?php echo $this->_tpl_vars['gtrwebsite_partners_clicks_hidden']; ?>

                <span class="validatetion-error" id="gtrwebsite_partners_clicks_error"></span>
            </td>
        </tr>
    </fieldset>
</form>

<?php echo $this->_tpl_vars['jsdocready']; ?>