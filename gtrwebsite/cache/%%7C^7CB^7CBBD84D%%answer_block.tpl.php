<?php /* Smarty version 2.6.26, created on 2010-12-02 12:14:41
         compiled from solutionfinder/answer_block.tpl */ ?>
<table class="b-answer-block" <?php if (empty ( $this->_tpl_vars['answer']['idSolution'] )): ?>onclick="itemClick('answer', <?php echo $this->_tpl_vars['answer']['idAnswer']; ?>
); solutionFinderObj.loadChildrenNodes(<?php echo $this->_tpl_vars['answer']['idNode']; ?>
)"<?php else: ?>onclick="itemClick('answer', <?php echo $this->_tpl_vars['answer']['idAnswer']; ?>
); solutionFinderObj.loadSolutionsNodes(<?php echo $this->_tpl_vars['answer']['idNode']; ?>
, <?php echo $this->_tpl_vars['answer']['idSolution']; ?>
)"<?php endif; ?>>
    <tr>
        <td class="solution-img"><img src="<?php echo $this->_tpl_vars['answer']['img']; ?>
" alt="" title="" /></td>
        <td class="solution-desc"><?php echo $this->_tpl_vars['answer']['description']; ?>
</td>
    </tr>
</table>
