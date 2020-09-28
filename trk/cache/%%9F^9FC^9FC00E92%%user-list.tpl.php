<?php /* Smarty version 2.6.26, created on 2011-05-16 10:23:20
         compiled from admin/user/user-list.tpl */ ?>
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
        
        <br />
        
        <div class="controls">
            <a href="" id="add_user_button"></a>
        </div>
        
        <br />
        
        <div class="<?php echo $this->_tpl_vars['tabName']; ?>
-datatable">
            <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

        </div>
        
        <br />

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
                        trk_user_wtm_file_name: window.imgselected != undefined && window.imgselected.selected ? window.imgselected.name : \'\'   
                       
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
                    $(\'#imgUploader\').uploadifyUpload();
                    onCancelCallback();
                }
            </script>
        '; ?>

    </div>