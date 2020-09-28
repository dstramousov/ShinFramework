<?php /* Smarty version 2.6.26, created on 2011-08-02 11:25:06
         compiled from admin/user/user-info.tpl */ ?>
<div>
    <form action="" method="post" class="gtrwebsite-dialog" enctype="multipart/form-data">
    	<?php echo $this->_tpl_vars['trk_user_userId_hidden']; ?>

        <table>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_user_name']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_sys_user_username_input']; ?>

                    <span class="validatetion-error" id="trk_user_sys_user_username_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_user_username']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_sys_user_name_input']; ?>

                    <span class="validatetion-error" id="trk_user_sys_user_username_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_user_lastname']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_sys_user_lastname_input']; ?>

                    <span class="validatetion-error" id="trk_user_sys_user_lastname_error"></span>
                </td>
            </tr>
            
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_datatable_user_type']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_usertype_input']; ?>
<br />
                    <span class="validatetion-error" id="trk_user_usertype_error"></span>
                </td>
            </tr>
            
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_user_lang']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_sys_user_lang_input']; ?>

                    <span class="validatetion-error" id="trk_user_sys_user_lang_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_user_status']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_sys_user_status_input']; ?>

                    <span class="validatetion-error" id="trk_user_sys_user_status_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_user_email']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_sys_user_email_input']; ?>

                    <span class="validatetion-error" id="trk_user_sys_user_email_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_user_pass']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_sys_user_pwd_input']; ?>

                    <span class="validatetion-error" id="trk_user_sys_user_pwd_error"></span>
                </td>
            </tr>
            <tr>
            <th><?php echo $this->_tpl_vars['lng_label_sys_user_confirm_pass']; ?>
:</th>
                <td>
                    <input type="password" name="trk_user_sys_user_pwd_confirm" value="" id="trk_user_sys_user_pwd_confirm" />
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_user_updated_date']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_sys_user_updated_html']; ?>
<br />
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_user_lastlogin_date']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_sys_user_lastlogin_html']; ?>
<br />
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_user_added_date']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_sys_user_added_html']; ?>
<br />
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_sys_user_host']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_sys_user_host_ro']; ?>
<br />
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_watermarkusage_hidden']; ?>
<br />
                </td>
            </tr>

            <!--
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_datatable_user_wm_usage']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_watermarkusage_input']; ?>
<br />
                    <span class="validatetion-error" id="trk_user_watermarkusage_error"></span>
                </td>
            </tr>
            <?php if (! empty ( $this->_tpl_vars['trk_user_wtm_file_name'] )): ?>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_datatable_user_wm_file_old']; ?>
:</th>
                <td>
                    <img src="<?php echo $this->_tpl_vars['trk_user_wtm_file_img']; ?>
" alt="" title="" />
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_datatable_user_wm_file']; ?>
:</th>
                <td>
                    <div id="imgUploader"></div>
                    <span class="validatetion-error" id="trk_user_wtm_file_name_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_datatable_user_wm_status']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_watermark_status_input']; ?>

                    <span class="validatetion-error" id="trk_user_sys_user_status_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_datatable_user_wm_position']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['trk_user_watermark_position_input']; ?>

                    <span class="validatetion-error" id="trk_user_watermark_position_error"></span>
                </td>
            </tr>
            -->
        </table>
    </form>
</div>

<?php echo $this->_tpl_vars['jsdocready']; ?>
