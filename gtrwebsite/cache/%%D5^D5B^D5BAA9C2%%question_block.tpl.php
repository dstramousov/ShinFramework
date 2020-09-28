<?php /* Smarty version 2.6.26, created on 2010-12-07 08:46:39
         compiled from solutionfinder/question_block.tpl */ ?>
<li>
    <table>
        <tr>
            <td>
                <table class="b-solution-block">
                    <tr>
                        <td class="solution-img"><img src="<?php echo $this->_tpl_vars['question']['img']; ?>
" alt="" title="" /></td>
                        <td class="solution-desc"><?php echo $this->_tpl_vars['question']['description']; ?>
</td>
                    </tr>
                </table>
            </td>
            <?php if (! empty ( $this->_tpl_vars['answers'] )): ?>
            <td>
                <fieldset>
                    <legend>All answers</legend>
                    <?php echo $this->_tpl_vars['answers']; ?>

                </fieldset>
            </td>
            <?php endif; ?>
        </tr>
    </table>
</li>