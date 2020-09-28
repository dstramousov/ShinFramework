<?php /* Smarty version 2.6.26, created on 2011-03-09 10:46:15
         compiled from sys_manage/list/sys-menu-grp-list.tpl */ ?>
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
                        sys_menugrp_idMenu_old:    $(\'#sys_menugrp_idMenu_old\').val(),   
                        sys_menugrp_idPanel_old:   $(\'#sys_menugrp_idPanel_old\').val(),   
                        sys_menugrp_idGrp_old:     $(\'#sys_menugrp_idGrp_old\').val(),
                        sys_menugrp_ico_old:       $(\'#sys_menugrp_ico_old\').val(),
                        sys_menugrp_ico:           window.imgselected != undefined && window.imgselected.selected ? window.imgselected.name : \'\'   
                       
                    };
                    
                    return additionalData;
                }
                
                /**
                *  callback for additional field - uploadify select event
                */
                function onSelectCallback(event, ID, fileObj){
                    window.imgselected  = {
                        selected:  true,
                        name:      fileObj.name 
                    };
                }
                
                /**
                *  callback for additional field - uploadify cancel event
                */
                function onCancelCallback(){
                    if(typeof window.imgselected != \'undefined\') {
                        window.imgselected.selected = false;
                        window.imgselected.name     = \'\';
                    }
                }
                
                /**
                * callback for uploading files befor saving data
                */
                function uploadCallback(){
                    if(typeof window.imgselected != \'undefined\' && window.imgselected.selected) {
                        $(\'#imgUploader\').uploadifyUpload();
                        onCancelCallback();
                        return true;
                    } else {
                        return false;    
                    }
                }
                
                function onAllComplete(){
                    sysMenuGrpCrudObj.save();
                }
            </script>
        '; ?>

</div>