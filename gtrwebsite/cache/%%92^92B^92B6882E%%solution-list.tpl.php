<?php /* Smarty version 2.6.26, created on 2011-03-04 11:25:24
         compiled from managment/solution/solution/solution-list.tpl */ ?>
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
        
        <fieldset>
            <legend><?php echo $this->_tpl_vars['lng_label_solution_legend']; ?>
</legend>
            <div class="messages">
                <?php echo $this->_tpl_vars['jsMessages']; ?>

                <?php echo $this->_tpl_vars['jsErrors']; ?>

            </div>
            <?php echo $this->_tpl_vars['messages']; ?>

            <br />    
            <div class="<?php echo $this->_tpl_vars['tabName']; ?>
-datatable">
                <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

            </div>
        </fieldset>
        
        <fieldset>
            <legend><?php echo $this->_tpl_vars['lng_label_solutionitem_legend']; ?>
</legend>    
            <div class="item-datatable"></div>
        </fieldset>
        
        <!-- init block of crud -->
        <?php echo $this->_tpl_vars['crudData']; ?>

        <!-- init block of crud -->
        
        <?php echo '
            <script type="text/javascript">
            
                $(document).ready(function(){
                    
                    // load items by default for first category
                    $(\'.item-datatable\').load(\''; ?>
<?php echo prep_url(base_url().'/solutionitemmanagment/index'); ?><?php echo '\', {
                        idSolution:  $(\'#dataListSolution tr td:first\').html(),
                        first:       true
                    });
                })
                
                /**
                *  callback after loading edit data contain
                *  some additional information for each
                *  of the screen
                */
                function afterShowDialog(){
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
                
                function loadItems(idSolution){
                    
                    //destroy all dialogs
                    $(\'#add_solutionitem_dialog\').remove();
                    $(\'#edit_solutionitem_dialog\').remove();
                    $(\'#delete_solutionitem_dialog\').remove();
                    
                    $(\'.item-datatable\').load(\''; ?>
<?php echo prep_url(base_url().'/solutionitemmanagment/index'); ?><?php echo '\', {
                        idSolution:  idSolution,
                        first:       false
                    });    
                }
                
                /**
                * this is collback of collecting additional data from
                * different libraries like: tinyMCE, Uploadify and others  
                */
                function collectAdditionalData(){
                    
                    additionalData  =   {
                        gtrwebsite_solution_img:      window.imgselected != undefined && window.imgselected.selected ? window.imgselected.name : \'\'   
                    };
                    
                    return additionalData;
                }
                
                function onSelect(event, ID, fileObj){
                    window.imgselected  = {
                        selected:  true,
                        name:      fileObj.name 
                    };
                }
                
                function onCancel(){
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
                        onCancel();
                        return true;
                    } else {
                        return false;    
                    }
                }
                
                function onAllComplete(){
                    solutionCrudObj.save();
                }
            </script>
        '; ?>

    </div>