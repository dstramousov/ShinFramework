<?php /* Smarty version 2.6.26, created on 2011-03-24 08:51:23
         compiled from sys_manage/list/sys-log-list.tpl */ ?>
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
    
    <div class="actions">
        <a href="" id="delete_all_<?php echo $this->_tpl_vars['tabName']; ?>
_button"></a>
        <a href="" id="delete_selected_<?php echo $this->_tpl_vars['tabName']; ?>
_button"></a>
    </div>
    
    <br/ >
    
    <div class="<?php echo $this->_tpl_vars['tabName']; ?>
-datatable">
        <?php echo $this->_tpl_vars['ssstylemustbehere']; ?>

    </div>
    
    <br />
    
    <fieldset>
        <legend><?php echo $this->_tpl_vars['lng_label_sys_dir_info']; ?>
</legend>
        <div class="dir-info"></div>
    </fieldset>
    
    <!-- dialogs -->
    <div id="<?php echo $this->_tpl_vars['tabName']; ?>
-delete-dialog" class="crud-dialog-class-delete-dialog">
        <div class="inner">
            <center><?php echo $this->_tpl_vars['lng_label_sys_user_delete_really']; ?>
</center>
        </div>
    </div>
    
    <div id="<?php echo $this->_tpl_vars['tabName']; ?>
-edit-dialog" class=""></div>
    <div id="<?php echo $this->_tpl_vars['tabName']; ?>
-add-dialog"  class=""></div>
    <!-- dialogs -->
    
    <!-- init block of crud -->
    <?php echo '
        <script type="text/javascript" language="javascript">
                
                var intervalId = setInterval(function(){
                    if($(\'#dataListSys_log_processing\').css(\'visibility\') == \'hidden\') {
                        clearInterval(intervalId);
                        
                        $(\'.dir-info\').block({message: \''; ?>
<?php echo $this->_tpl_vars['lng_label_sys_app_wait']; ?>
<?php echo '\'});
                    
                        $(\'.dir-info\').load(\''; ?>
<?php echo SHIN_Core::$_config['core']['app_base_url'] . '/' . shinfw_folder(); ?><?php echo '/logmanage/loaddirinfo\', null, function(){
                            $(\'.dir-info\').unblock();
                        });    
                    }
                }, 1000);
        
                var sysLogCrudObj     =   new crudClass({
                
                general: {
                    tabName         : \''; ?>
<?php echo $this->_tpl_vars['tabName']; ?>
<?php echo '\',
                    datatableName   : \'dataListSys_log\',
                    messageObj      : new messageClass(\'#js-message\', \'#js-error\'),
                    dialogObj       : new dialogClass({tabName: \''; ?>
<?php echo $this->_tpl_vars['tabName']; ?>
<?php echo '\'}),
                    dialogMessageObj: new validationClass({errorContainerPrefix: \'_error\', 
                                                           errorClassContainer: \'.validatetion-error\'})    
                },dialogs: {
                    read    :   {
                        url: \''; ?>
<?php echo base_url(); ?><?php echo '/logmanage/read\'    
                    },
                    validate:   {
                        url: \''; ?>
<?php echo base_url(); ?><?php echo '/logmanage/validate\'
                    },
                    write   :   {
                        url: \''; ?>
<?php echo base_url(); ?><?php echo '/logmanage/create\'
                    },
                    del     :   {
                        url:  \''; ?>
<?php echo base_url(); ?><?php echo '/logmanage/delete\'
                    }
                }});
                
                function deleteAll(){
                    
                   // 1. collect data
                   var all =   new Array;
                   $.each($(\'input:checkbox\'), function(){
                    all.push($(this).val()); 
                   })
                   
                   // 2. send data to the server
                   $.getJSON(\''; ?>
<?php echo base_url(); ?><?php echo '/logmanage/deleteall\', {
                     all: all
                   }, function(json){
                        if(json.result) {
                            dataListSys_log.fnDraw();
                        } 
                   })    
                }
                
                function deleteSelected(){
                    var count = $(\'input:checked\').length;
                    
                    if(count > 0) {
                       // 1. collect data
                       var selected =   new Array;
                       $.each($(\'input:checked\'), function(){
                        selected.push($(this).val()); 
                       })
                       
                       // 2. send data to the server
                       $.getJSON(\''; ?>
<?php echo base_url(); ?><?php echo '/logmanage/deleteselected\', {
                         selected: selected
                       }, function(json){
                            if(json.result) {
                                dataListSys_log.fnDraw();
                            } 
                       })
                      
                    } else {
                        alert(\''; ?>
<?php echo $this->_tpl_vars['lng_label_sys_please_select']; ?>
<?php echo '\')
                    }
                }
        </script>

    '; ?>

    <!-- init block of crud -->
</div>