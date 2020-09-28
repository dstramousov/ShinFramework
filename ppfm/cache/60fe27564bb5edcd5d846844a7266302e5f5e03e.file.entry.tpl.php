<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-23 12:25:20
         compiled from "D:\Work\web\shinframework\ppfm/views/entry.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147944c9b1d00effe44-62822334%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60fe27564bb5edcd5d846844a7266302e5f5e03e' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\ppfm/views/entry.tpl',
      1 => 1285233919,
    ),
  ),
  'nocache_hash' => '147944c9b1d00effe44-62822334',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<body id="page">

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_fw_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
	<?php $_template = new Smarty_Internal_Template("main_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</fieldset>

<br/>

<fieldset>
	<legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_tools_ppfm_menu')->value;?>
</b>&nbsp;&nbsp;</legend>
	<?php $_template = new Smarty_Internal_Template("ppfm_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

</fieldset>

<br/>

<div class="b-messages"><?php echo $_smarty_tpl->getVariable('jsMessages')->value;?>
</div>
<div class="b-errors"><?php echo $_smarty_tpl->getVariable('jsErrors')->value;?>
</div>

<br />

<input type="button" name="add-new-record" value="<?php echo $_smarty_tpl->getVariable('lng_label_register_add_new_record')->value;?>
" onclick="addNewRecord('ppfm_entry')" />
<?php echo $_smarty_tpl->getVariable('etrylist')->value;?>


<div class="delete-dialog" id="delete-dialog">
    <?php echo $_smarty_tpl->getVariable('lng_label_delete_record')->value;?>

</div>

<div class="add-dialog" id="add-dialog">
    <form action="" method="post">
        
    </form>
</div>

<div class="edit-dialog" id="edit-dialog">
    <form action="" method="post">
        
    </form>
</div>

<div class="" style="display: none;">
    <input type="hidden" id="active_record_id" name="active_record_id" value="" />
    <input type="hidden" id="active_table"     name="active_table" value="" />
</div>


    <script type="text/javascript">
        
        function openDialog(id, type, table) {
            activeTable    =   table;
            
            $('#active_record_id').val(id);
            $('#active_table').val(table);
            
            if(type == 'edit') {
                openEditDialog(id, table);
            } else {
                $('#delete-dialog').dialog('open');    
            }
        }
        
        function openEditDialog(id, table) {
                
            makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/registration/get', {
                active_record_id:   id,
                active_table:       table
            }, function(html){
                
                $('#edit-dialog form').empty().append(html);
                $('#edit-dialog').dialog('open');
                $('#edit-dialog :input:first').focus();
            
            }, 'html')
        }
        
        function closeDeleteDialog(){
            $('#delete-dialog').dialog('close');
        }
            
        function closeEditDialog(){
            $('#edit-dialog').dialog('close');    
        }
        
        function addNewRecord(table){
                
               $('#active_table').val(table);
                
                makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/registration/new', {
                    active_table:       table
                }, function(html){
                    
                    $('#add-dialog form').empty().append(html);
                    $('#add-dialog').dialog('open');
                    $('#add-dialog :input:first').focus();
                    
                }, 'html')        
        }
        
        function saveNewRecord() {
                var table   =   $('#active_table').val();
                
                var data    =   {active_table: table};
                
                $('#add-dialog form :input').each(function(){
                    switch($(this).attr('type')) {
                        case 'select-one':
                            data[$(this).attr("name")] = $(this).find('option:selected').val();
                            break;
                        case 'hidden':
                        case 'text':
                            data[$(this).attr("name")] = $(this).val();
                            break;
                    }
                })
                
                makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/registration/savenew', data, function(json){
                    
                    if(json.result) {
                        reloadDataSet(table);
                        closeAddDialog();
                        showActionMessages(json.message);    
                    } else {
                        showErrors(json.errors);
                    }
                })   
            }
        
        function closeAddDialog(){
            $('#add-dialog').dialog('close');
        }
        
        function deleteRecord(){
                
                var id      =   $('#active_record_id').val();
                var table   =   $('#active_table').val();
                
                
                makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/registration/delete', {
                    active_record_id:   id,
                    active_table:       table
                }, function(json){
                    
                    if(json.result){
                        closeDeleteDialog();
                        reloadDataSet();    
                    } else {
                    
                    }    
                })            
            }
        
        function saveChanges(){
                
            var id      =   $('#active_record_id').val();
            var table   =   $('#active_table').val();
            var data    =   {active_record_id: id, active_table: table};
                
            $('#edit-dialog form :input').each(function(){
                data[$(this).attr("name")] = $(this).val();    
            })
            
            makeAjaxRequest('<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo base_url();<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
/index.php/registration/update', data, function(json){
                if(json.result) {
                    reloadDataSet(table);
                    closeEditDialog();
                    showActionMessages(json.message);    
                } else {
                    showErrors(json.errors);
                }
            })
            
        }
        
        function makeAjaxRequest(url, data, callback, type){
            
            var type = type != undefined ? type : 'json';
             
            $.ajax({
                       type:        "POST",
                       url:         url,
                       data:        data,
                       dataType:    type,
                       success:     callback,
                       beforeSend:  function(){
                            blockUI()         
                       },
                       complete:    function(){
                            unBlockUI();                
                       }
                   });
        }
        
        function reloadDataSet(){
            entry_listing.fnDraw();
        }
        
        function showErrors(errors){
            hideErrors();
            for(key in errors) {
                $div = $('tr td #' + key).parent().find('div');
                       
                       $($div).text(errors[key]);
                       $($div).show();     
            }
        }
        
        function hideErrors(){
            $('tr td div').hide();
        }
        
        function showActionMessages(message){
            $('#js-message p').text(message);
            $('#js-message').show();
            
            setTimeout(hideActionMessages, 5000);
        }
        
        function showActionErrors(){
            $('#js-error p').text(message);
            $('#js-error').show();
            
            setTimeout(hideActionMessages, 5000);
        }
        
        function hideActionMessages(){
             $('#js-message').fadeOut('normal');       
             $('#js-error').fadeOut('normal');       
        }
    </script>


<?php $_template = new Smarty_Internal_Template('tech_info.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>	
</body>

</html>	
