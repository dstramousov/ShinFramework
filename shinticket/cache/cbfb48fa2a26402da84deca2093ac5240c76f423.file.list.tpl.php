<?php /* Smarty version Smarty3-SVN$Rev: 3286 $, created on 2010-09-28 14:05:52
         compiled from "D:\Work\web\shinframework\shinticket/views/ticket/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80834ca1cc106861c2-54849419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbfb48fa2a26402da84deca2093ac5240c76f423' => 
    array (
      0 => 'D:\\Work\\web\\shinframework\\shinticket/views/ticket/list.tpl',
      1 => 1285671928,
    ),
  ),
  'nocache_hash' => '80834ca1cc106861c2-54849419',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_php')) include 'D:\Work\web\shinframework\shinfw\libraries\smarty\plugins\block.php.php';
?><?php $_template = new Smarty_Internal_Template('header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<div class="legent-list">
    <?php $_template = new Smarty_Internal_Template('ticket/legend.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>

<div class="filter-list">
    <div class="filter-collaps">
        <a href="javascript:void(0);" onclick="filterCollaps()" title="<?php echo $_smarty_tpl->getVariable('lng_label_filet_hide')->value;?>
"></a>
    </div>
    <div class="filter-inner">
        <?php if (!empty($_smarty_tpl->getVariable('currentPriority')->value)||!empty($_smarty_tpl->getVariable('currentApplication')->value)||!empty($_smarty_tpl->getVariable('currentStatus')->value)){?>
            <a href="javascript:void(0);" onclick="showHideFilter(this);"><?php echo $_smarty_tpl->getVariable('lng_label_filet_hide')->value;?>
</a>
        <?php }else{ ?>
            <a href="javascript:void(0);" onclick="showHideFilter(this);"><?php echo $_smarty_tpl->getVariable('lng_label_filet_show')->value;?>
</a>
        <?php }?>
        <fieldset <?php if (empty($_smarty_tpl->getVariable('currentPriority')->value)&&empty($_smarty_tpl->getVariable('currentApplication')->value)&&empty($_smarty_tpl->getVariable('currentStatus')->value)){?> class="shin-hide" <?php }?>>
            <legend><?php echo $_smarty_tpl->getVariable('lng_label_datatable_filter_list')->value;?>
</legend>
            <form action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
echo prep_url(base_url().'/index.php/ticket/list');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" method="post" id="filter-form">
            <table>
                <tr>
                    <th>
                        <label for="priority-sort"><?php echo $_smarty_tpl->getVariable('lng_label_datatable_priority')->value;?>
:</label>
                    </th>
                    <td>
                        <select name="priority-sort" id="priority-sort">
                            <option value="">&nbsp;</option>
                            <?php  $_smarty_tpl->tpl_vars['priority'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('priorityList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['priority']->key => $_smarty_tpl->tpl_vars['priority']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['priority']->key;
?>
                                <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('currentPriority')->value){?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['priority']->value;?>
</option>
                                <?php }else{ ?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['priority']->value;?>
</option>
                                <?php }?>
                            <?php }} ?>
                        </select>
                    </td>
                    <th>
                        <label for="priority-sort"><?php echo $_smarty_tpl->getVariable('lng_label_datatable_application')->value;?>
:</label>
                    </th>
                    <td>
                        <input type="text" value="<?php echo $_smarty_tpl->getVariable('currentApplication')->value;?>
" name="application-sort" id="application-sort" />
                    </td>
                    <th>
                        <label for="priority-sort"><?php echo $_smarty_tpl->getVariable('lng_label_datatable_status')->value;?>
:</label>
                    </th>
                    <td>
                        <select name="status-sort" id="status-sort">
                            <option value="">&nbsp;</option>
                            <?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('statusList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['status']->key;
?>
                                <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('currentStatus')->value){?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</option>
                                <?php }else{ ?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</option>
                                <?php }?>
                            <?php }} ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="search-filter" value="<?php echo $_smarty_tpl->getVariable('lng_label_datatable_search')->value;?>
" id="search-filter" />
                        <input type="button" name="search-rest" value="<?php echo $_smarty_tpl->getVariable('lng_label_datatable_reset')->value;?>
" id="search-rest" onclick="resetFilterForm();" />
                    </td>
                </tr>
            </table>
            </form>
        </fieldset>
    </div>
</div>

<div class="ticket-list">
    <fieldset>
        <legend>&nbsp;&nbsp;<b><?php echo $_smarty_tpl->getVariable('lng_label_list_ticket')->value;?>
</b>&nbsp;&nbsp;</legend>
        <?php echo $_smarty_tpl->getVariable('ticketList')->value;?>

    </fieldset>
</div>


    <script type="text/javascript">
        
        $(document).ready(function() {
            
            /* Add event listener for opening and closing details
             * Note that the indicator for showing which row is open is not controlled by DataTables,
             * rather it is done here
             */
            $('td img[class=ticket-with-details]', ticketList.fnGetNodes()).each( function () {
                $(this).click( function () {
                    var nTr = this.parentNode.parentNode;
                    if ( this.src.match('details_close')) {
                        /* This row is already open - close it */
                        this.src = "<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo prep_url(base_url().'/images/datatable/');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
details_open.png";
                        ticketList.fnClose( nTr );
                    } else {
                        /* Open this row */
                        this.src = "<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo prep_url(base_url().'/images/datatable/');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
details_close.png";
                        ticketList.fnOpen( nTr, fnFormatDetails(ticketList, nTr), 'details' );
                    }
                });
            });
        });
        
        function fnRowCallback(nRow, aData, iDisplayIndex, iDisplayIndexFull){
            
            if(!$('#ticketList tbody tr:eq(' + iDisplayIndex + ')').hasClass('ticket-low-priority') && 
               !$('#ticketList tbody tr:eq(' + iDisplayIndex + ')').hasClass('ticket-normal-priority') && 
               !$('#ticketList tbody tr:eq(' + iDisplayIndex + ')').hasClass('ticket-hight-priority') && 
               !$('#ticketList tbody tr:eq(' + iDisplayIndex + ')').hasClass('ticket-asap-priority')) {
               
               switch(aData[4]) {
                    case 'l':
                        $('#ticketList tbody tr:eq(' + iDisplayIndex + ')').addClass('ticket-low-priority');
                        break;
                    case 'n':
                        $('#ticketList tbody tr:eq(' + iDisplayIndex + ')').addClass('ticket-normal-priority');
                        break;
                    case 'h':
                        $('#ticketList tbody tr:eq(' + iDisplayIndex + ')').addClass('ticket-hight-priority');
                        break;
                    case 'a':
                        $('#ticketList tbody tr:eq(' + iDisplayIndex + ')').addClass('ticket-asap-priority');
                        break;
                }
            }
            
            return nRow;
        }
        
        /* Formating function for row details */
        function fnFormatDetails(oTable, nTr) {
        
            var ticketId = $(nTr).find('td:eq(1)').text();
            
            $.ajax({
                url:        '<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo prep_url(base_url().'/index.php/ticket/detail-list');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
',
                data:       {ticketId:ticketId},
                dataType:   'json',
                type:       'POST',
                async:      false,
                success:    function(json) {
                    if(json.result) {
                        sOut = '';
                        for(index in json.data) {
                            sOut   +=   '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
                            
                            if(json.data[index].owner == 'user') {
                                sOut   +=   '<tr><td colspan="2" align="left"><img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo prep_url(base_url().'/images/datatable/');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
user.png" /></td></tr>'
                            } else {
                                sOut   +=   '<tr><td colspan="2" align="left"><img src="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; smarty_block_php(array(), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>
 echo prep_url(base_url().'/images/datatable/');<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_php(array(), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
user_red.png" /></td></tr>'
                            }
                            
                            sOut   +=   '<tr><td><?php echo $_smarty_tpl->getVariable('lng_label_datatable_details_updated')->value;?>
:</td><td>' + json.data[index].created + '</td><tr>'     
                            sOut   +=   '<tr><td><?php echo $_smarty_tpl->getVariable('lng_label_datatable_details_body')->value;?>
:</td><td>' + json.data[index].bodyparced + '</td><tr>'     
                            sOut   +=   '</table><hr />';
                        }
                    } else {
                    
                    }    
                }
            })
            
            return sOut;
        }
        
        function showHideFilter(target){
            var fieldset = $('.filter-list fieldset');
            
            if($(fieldset).hasClass('shin-hide')) {
                $(target).text('<?php echo $_smarty_tpl->getVariable('lng_label_filet_hide')->value;?>
');
                $(fieldset).removeClass('shin-hide');
            } else {
                $(target).text('<?php echo $_smarty_tpl->getVariable('lng_label_filet_show')->value;?>
');
                $(fieldset).addClass('shin-hide');    
            }        
        }
        
        function resetFilterForm(){
            $('#application-sort').val('');
            $("#priority-sort [value='']").attr("selected", "selected");
            $("#status-sort [value='']").attr("selected", "selected");
            
            $('#filter-form').submit();
            
        }
    </script>

<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>