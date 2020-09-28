<?php /* Smarty version 2.6.26, created on 2010-12-17 14:58:36
         compiled from managment/item/item/item-list.tpl */ ?>
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
            <br />
            <strong><?php echo $this->_tpl_vars['lng_label_category_current']; ?>
</strong> <?php echo $this->_tpl_vars['categoryInfo']['idItemCat']; ?>
 - <?php echo $this->_tpl_vars['categoryInfo']['description']; ?>

            <br />
            <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

        </div>
        
        <!-- init block of crud -->
        <?php echo $this->_tpl_vars['crudData']; ?>

        <!-- init block of crud -->
        
        <?php echo '
            <script type="text/javascript">
                
                /**
                *  callback after loading edit data contain
                *  some additional information for each
                *  of the screen
                */
                function afterShowEditDialog(){
                    /**
                    *  this is unique part of each screen for init some
                    *  additional JS libraries. In current case we init
                    *  tinyMCE after dialog opening
                    */
                    
                    tinyMCE.init({
                                    theme: "simple", 
                                    mode:  "textareas"
                                });    
                }

                /**
                * this is collback of collecting additional data from
                * different libraries like: tinyMCE, Uploadify and others  
                */
                function collectItemAdditionalData(){
                    
                    additionalData  =   {
                        gtrwebsite_items_img:      typeof window.imgselected != \'undefined\' && window.imgselected.selected ? window.imgselected.name : \'\'   
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
                    itemCrudObj.save();
                }
            </script>
        '; ?>

    </div>