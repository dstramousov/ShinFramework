<?php /* Smarty version 2.6.26, created on 2011-02-14 14:59:04
         compiled from contact/contact-list.tpl */ ?>
<div id="list">
    <div class="contact-js-includes">
        <?php echo $this->_tpl_vars['jsdocready']; ?>

        <?php echo $this->_tpl_vars['jsnondocready']; ?>

    </div>
    
    <div class="contact-datatable">
        <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

    </div>
    
    <!-- init block of crud -->
    <?php echo $this->_tpl_vars['crudData']; ?>

    <!-- init block of crud -->
    
    <?php echo '
        <script type="text/javascript">
            $(\'#dataListContact tr\').live(\'dblclick\', function(){
                // 1. get id
                var id = $(this).find(\'td:first\').text();
                
                // send CRUD request
                contactCrudObj.openDialog({id : id}, \'edit\');
            })
        </script>
    '; ?>

</div>