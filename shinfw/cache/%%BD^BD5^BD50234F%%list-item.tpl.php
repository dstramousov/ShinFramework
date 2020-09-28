<?php /* Smarty version 2.6.26, created on 2011-03-09 09:17:37
         compiled from sys_manage/list-item.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="">
        <fieldset class="shin-general-menu">
            <legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_tools_fw_menu']; ?>
</b>&nbsp;&nbsp;</legend>
            <?php 
                echo SHIN_Core::runWidget('main_menu', array());
             ?>
            <?php echo $this->_tpl_vars['shinfw_main_menu']; ?>

        </fieldset>
    </div>
    
    <div class="shin-clear"></div>
    
    <div id="tabs">
        <ul>
            <li><a href="<?php echo prep_url(base_url().'/usermanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_user_manage']; ?>
</a></li>
            <li><a href="<?php echo prep_url(base_url().'/rolemanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_role_manage']; ?>
</a></li>
            <li><a href="<?php echo prep_url(base_url().'/areamanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_struct_area_manage']; ?>
</a></li>
            <li><a href="<?php echo prep_url(base_url().'/subareamanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_struct_subarea_manage']; ?>
</a></li>
            <li><a href="<?php echo prep_url(base_url().'/applicationmanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_struct_application_manage']; ?>
</a></li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href="<?php echo prep_url(base_url().'/policyareamanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_struct_policyarea_manage']; ?>
</a></li>
            <li><a href="<?php echo prep_url(base_url().'/policysubareamanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_struct_policysubarea_manage']; ?>
</a></li>
            <li><a href="<?php echo prep_url(base_url().'/policyapplicationmanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_struct_policyapplication_manage']; ?>
</a></li>
            <br />
            <br />
            <li><a href="<?php echo prep_url(base_url().'/menumanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_struct_policyapplication_menu']; ?>
</a></li>
            <li><a href="<?php echo prep_url(base_url().'/menugrpmanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_struct_policyapplication_menugrp']; ?>
</a></li>
            <li><a href="<?php echo prep_url(base_url().'/menurowsmanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_struct_policyapplication_menurows']; ?>
</a></li>
            <li><a href="<?php echo prep_url(base_url().'/menusettingsmanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_struct_menusettings']; ?>
</a></li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href="<?php echo prep_url(base_url().'/logmanage/index'); ?>"><?php echo $this->_tpl_vars['lng_label_sys_log']; ?>
</a></li>
        </ul>
    </div>
    
    <?php echo '
        <script type="text/javascript">
            $(document).ready(function(){
                $("#tabs").tabs({
                    select: function(event, ui) {
                        $(\'.ui-dialog, .crud-dialog\').remove();
                    }
                })    
            })
            
            function makeAjaxRequest(url, data, callback, type){
                    
                    var type = type != undefined ? type : \'json\';
                     
                    $.ajax({
                               type:        "POST",
                               url:         url,
                               data:        data,
                               dataType:    type,
                               success:     callback,
                               beforeSend:  function(){
                                             
                               },
                               complete:    function(){
                                                    
                               }
                           });
            }
        </script>
    '; ?>

    
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>