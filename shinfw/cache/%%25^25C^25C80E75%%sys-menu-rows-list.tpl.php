<?php /* Smarty version 2.6.26, created on 2011-03-10 09:17:05
         compiled from sys_manage/list/sys-menu-rows-list.tpl */ ?>
<div id="list">
    <div class="<?php echo $this->_tpl_vars['tabName']; ?>
-js-includes">
        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="messages">
        <?php echo $this->_tpl_vars['jsMessages']; ?>

        <?php echo $this->_tpl_vars['jsErrors']; ?>

    </div>
    
    <div class="<?php echo $this->_tpl_vars['tabName']; ?>
-controls">
        <a href="" id="add_<?php echo $this->_tpl_vars['tabName']; ?>
_button"></a>
    </div>
        
    <div class="<?php echo $this->_tpl_vars['tabName']; ?>
-datatable">
        <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

    </div>
    
    <!-- init block of crud -->
    <?php echo $this->_tpl_vars['crudData']; ?>

    <!-- init block of crud -->
    
    <?php echo '
            <script type="text/javascript">
                /**
                * this is collback of collecting additional data from
                * different libraries like: tinyMCE, Uploadify and others  
                */
                function collectAdditionalData(){
                    additionalData  =   {
                        sys_menurows_idMenu_old:        $(\'#sys_menurows_idMenu_old\').val(),   
                        sys_menurows_idApplication_old: $(\'#sys_menurows_idApplication_old\').val()   
                    };
                    
                    return additionalData;
                }
            </script>
        '; ?>

</div>