<?php /* Smarty version 2.6.26, created on 2011-01-03 14:39:38
         compiled from managment/solution/solution/solution-info.tpl */ ?>
<div>
    <form action="" method="post" class="gtrwebsite-dialog" enctype="multipart/form-data">
        <table>
            <tr>
                <td colspan="2"><?php echo $this->_tpl_vars['gtrwebsite_solution_idSolution_hidden']; ?>
</td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_solution_description']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_solution_description_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_solution_description_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_solution_posx']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_solution_posX_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_solution_posx_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_solution_posy']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_solution_posY_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_solution_posy_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_solution_level']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_solution_level_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_solution_level_error"></span>
                </td>
            </tr>
            <?php if (! empty ( $this->_tpl_vars['gtrwebsite_solution_idSolution'] )): ?>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_solution_img_old']; ?>
:</th>
                <td>
                    <img src="<?php echo prep_url(SHIN_Core::$_config['core']['app_base_url'] . '/' . SHIN_Core::$_config['store']['solutions_images'] . '/'.SHIN_Core::$_config['store']['thumbnails_prefix']); ?><?php echo $this->_tpl_vars['gtrwebsite_solution_img']; ?>
" alt="" title="" />
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_item_img']; ?>
</th>
                <td>
                    <div id="imgUploader"></div><br />
                    <span class="validatetion-error" id="gtrwebsite_solution_img_error"></span>
                </td>
            </tr>
        </fieldset>
    </form>
</div>

<?php echo $this->_tpl_vars['jsdocready']; ?>