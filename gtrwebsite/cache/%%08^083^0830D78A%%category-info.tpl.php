<?php /* Smarty version 2.6.26, created on 2010-11-25 18:17:56
         compiled from managment/item/category/category-info.tpl */ ?>
<div>
    <form action="" method="post" class="gtrwebsite-dialog">
        <table>
            <tr>
                <td colspan="2"><?php echo $this->_tpl_vars['gtrwebsite_itemscategory_idItemCat_hidden']; ?>
</td>
            </tr>
            <tr>
                <th><?php echo $this->_tpl_vars['lng_label_item_category_description']; ?>
:</th>
                <td>
                    <?php echo $this->_tpl_vars['gtrwebsite_itemscategory_description_input']; ?>
<br />
                    <span class="validatetion-error" id="gtrwebsite_itemscategory_description_error"></span>
                </td>
            </tr>
        </fieldset>
    </form>
</div>

<?php echo $this->_tpl_vars['jsdocready']; ?>
