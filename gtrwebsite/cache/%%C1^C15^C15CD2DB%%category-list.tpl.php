<?php /* Smarty version 2.6.26, created on 2011-03-04 09:57:03
         compiled from managment/item/category/category-list.tpl */ ?>
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
            <legend><?php echo $this->_tpl_vars['lng_label_item_category_legend']; ?>
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
            <legend><?php echo $this->_tpl_vars['lng_label_item_item_legend']; ?>
</legend>    
            <div class="item-datatable"></div>
        </fieldset>
        
        <!-- init block of crud -->
        <?php echo $this->_tpl_vars['crudData']; ?>

        <!-- init block of crud -->
        
        <?php echo '
            <script type="text/javascript">
                
                $(document).ready(function(){
                    data = dataListCategory.fnGetData();
                    // load items by default for first category
                    $(\'.item-datatable\').load(\''; ?>
<?php echo prep_url(base_url().'/itemmanagment/index'); ?><?php echo '\', {
                        idItemCat:  $(\'#dataListCategory tr td:first\').html(),
                        first:      true
                    });
                })
                
                /**
                * load slave datatable
                */
                function loadItems(idCategory){
                    
                    //destroy all dialogs
                    $(\'.item-datatable\').load(\''; ?>
<?php echo prep_url(base_url().'/itemmanagment/index'); ?><?php echo '\', {
                        idItemCat:  idCategory,
                        first:      false
                    });    
                }
                
            </script>
        '; ?>

    </div>