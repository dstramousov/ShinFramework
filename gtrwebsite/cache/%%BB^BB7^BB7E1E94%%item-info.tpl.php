<?php /* Smarty version 2.6.26, created on 2010-11-23 09:58:15
         compiled from managment/solution/item/item-info.tpl */ ?>
<div>
    <form action="" method="post" class="gtrwebsite-dialog">
        <table>
            <tr>
                <td colspan="2">
                    <?php echo $this->_tpl_vars['gtrwebsite_solutionitem_idItem_old']; ?>

                    <?php echo $this->_tpl_vars['gtrwebsite_solutionitem_idSolution_old']; ?>

                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_solutionitem_id']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_solutionitem_idSolution_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_solutionitem_idSolution_error"></span>
                </td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_solutionitem_id_item']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_solutionitem_idItem_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_solutionitem_idItem_error"></span>
                </td>
            </tr>
         </fieldset>
    </form>
</div>

<?php echo $this->_tpl_vars['jsdocready']; ?>