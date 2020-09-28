<?php /* Smarty version 2.6.26, created on 2010-12-13 10:47:32
         compiled from managment/solution/item/item-list.tpl */ ?>
    <div id="list">
        <div class="<?php echo $this->_tpl_vars['tabName']; ?>
-js-includes">
            <?php echo $this->_tpl_vars['jsdocready']; ?>

            <?php echo $this->_tpl_vars['jsnondocready']; ?>

        </div>
        
        <div class="<?php echo $this->_tpl_vars['tabName']; ?>
-controls">
            <a href="" id="add_<?php echo $this->_tpl_vars['tabName']; ?>
_button"></a>
        </div>
        
        <div class="<?php echo $this->_tpl_vars['tabName']; ?>
-datatable">
            <br />
            <strong><?php echo $this->_tpl_vars['lng_label_solutionitem_current']; ?>
</strong> <?php echo $this->_tpl_vars['solutionInfo']['idSolution']; ?>
 - <?php echo $this->_tpl_vars['solutionInfo']['description']; ?>

            <br />
            <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

        </div>
        
        <!-- init block of crud -->
        <?php echo $this->_tpl_vars['crudData']; ?>

        <!-- init block of crud -->
            
    </div>