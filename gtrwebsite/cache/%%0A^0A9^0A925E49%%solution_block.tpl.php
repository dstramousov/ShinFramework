<?php /* Smarty version 2.6.26, created on 2010-12-07 08:37:40
         compiled from solutionfinder/solution_block.tpl */ ?>
<table class="b-solution-block">
    <tr>
        <td class="solution-img"><img src="<?php echo $this->_tpl_vars['solution']['img']; ?>
" alt="" title="" /></td>
        <td class="solution-desc"><?php echo $this->_tpl_vars['solution']['description']; ?>
</td>
    </tr>
    <tr>
        <td class="solution-desc">PosX = <?php echo $this->_tpl_vars['solution']['posX']; ?>
</td>
        <td class="solution-desc">PosY = <?php echo $this->_tpl_vars['solution']['posY']; ?>
</td>
    </tr>
    <tr>
        <td colspan="2">
            <?php if (! empty ( $this->_tpl_vars['items'] )): ?>
                <fieldset>
                    <legend>All items</legend>
                    <?php echo $this->_tpl_vars['items']; ?>

                </fieldset>
            <?php endif; ?>
        </td>
    </tr>
</table>

            


