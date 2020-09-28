<?php /* Smarty version 2.6.26, created on 2010-12-02 12:42:39
         compiled from solutionfinder/solution_item_block.tpl */ ?>
<table class="b-items-block" onclick="itemClick('items', <?php echo $this->_tpl_vars['item']['idItem']; ?>
)">
    <tr>
        <td class="solution-img"><img src="<?php echo $this->_tpl_vars['item']['img']; ?>
" alt="" title="" /></td>
        <td class="solution-desc"><?php echo $this->_tpl_vars['item']['description']; ?>
</td>
    </tr>
    <tr>
        <td class="solution-desc"><?php echo $this->_tpl_vars['item']['link']; ?>
</td>
    </tr>
</table>
<hr />
