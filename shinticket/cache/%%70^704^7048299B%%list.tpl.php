<?php /* Smarty version 2.6.26, created on 2011-05-11 07:50:07
         compiled from ticket/list.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="legent-list">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ticket/legend.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<div class="filter-list">
    <div class="filter-collaps">
        <a href="javascript:void(0);" onclick="filterCollaps()" title="<?php echo $this->_tpl_vars['lng_label_filet_hide']; ?>
"></a>
    </div>
    <div class="filter-inner">
        <?php if (! empty ( $this->_tpl_vars['currentPriority'] ) || ! empty ( $this->_tpl_vars['currentApplication'] ) || ! empty ( $this->_tpl_vars['currentStatus'] )): ?>
            <a href="javascript:void(0);" onclick="showHideFilter(this);"><?php echo $this->_tpl_vars['lng_label_filet_hide']; ?>
</a>
        <?php else: ?>
            <a href="javascript:void(0);" onclick="showHideFilter(this);"><?php echo $this->_tpl_vars['lng_label_filet_show']; ?>
</a>
        <?php endif; ?>
        <fieldset <?php if (empty ( $this->_tpl_vars['currentPriority'] ) && empty ( $this->_tpl_vars['currentApplication'] ) && empty ( $this->_tpl_vars['currentStatus'] )): ?> class="shin-hide" <?php endif; ?>>
            <legend><?php echo $this->_tpl_vars['lng_label_datatable_filter_list']; ?>
</legend>
            <form action="<?php echo prep_url(base_url().'/ticket/list'); ?>" method="post" id="filter-form">
            <table>
                <tr>
                    <th>
                        <label for="priority-sort"><?php echo $this->_tpl_vars['lng_label_datatable_priority']; ?>
:</label>
                    </th>
                    <td>
                        <select name="priority-sort" id="priority-sort">
                            <option value="">&nbsp;</option>
                            <?php $_from = $this->_tpl_vars['priorityList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['priority']):
?>
                                <?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['currentPriority']): ?>
                                    <option value="<?php echo $this->_tpl_vars['key']; ?>
" selected="selected"><?php echo $this->_tpl_vars['priority']; ?>
</option>
                                <?php else: ?>
                                    <option value="<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['priority']; ?>
</option>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    </td>
                    <th>
                        <label for="priority-sort"><?php echo $this->_tpl_vars['lng_label_datatable_application']; ?>
:</label>
                    </th>
                    <td>
                        <input type="text" value="<?php echo $this->_tpl_vars['currentApplication']; ?>
" name="application-sort" id="application-sort" />
                    </td>
                    <th>
                        <label for="priority-sort"><?php echo $this->_tpl_vars['lng_label_datatable_status']; ?>
:</label>
                    </th>
                    <td>
                        <select name="status-sort" id="status-sort">
                            <option value="">&nbsp;</option>
                            <?php $_from = $this->_tpl_vars['statusList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['status']):
?>
                                <?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['currentStatus']): ?>
                                    <option value="<?php echo $this->_tpl_vars['key']; ?>
" selected="selected"><?php echo $this->_tpl_vars['status']; ?>
</option>
                                <?php else: ?>
                                    <option value="<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['status']; ?>
</option>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="search-filter" value="<?php echo $this->_tpl_vars['lng_label_datatable_search']; ?>
" id="search-filter" />
                        <input type="button" name="search-rest" value="<?php echo $this->_tpl_vars['lng_label_datatable_reset']; ?>
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
        <legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_list_ticket']; ?>
</b>&nbsp;&nbsp;</legend>
        <?php echo $this->_tpl_vars['ticketList']; ?>

    </fieldset>
</div>

<?php echo '
    <script type="text/javascript">
        
        $(document).ready(function() {
            
            /* Add event listener for opening and closing details
             * Note that the indicator for showing which row is open is not controlled by DataTables,
             * rather it is done here
             */
            $(\'td img[class=ticket-with-details]\', ticketList.fnGetNodes()).each( function () {
                $(this).click( function () {
                    var nTr = this.parentNode.parentNode;
                    if ( this.src.match(\'details_close\')) {
                        /* This row is already open - close it */
                        this.src = "'; ?>
<?php  echo prep_url(base_url().'/images/datatable/'); ?><?php echo 'details_open.png";
                        ticketList.fnClose( nTr );
                    } else {
                        /* Open this row */
                        this.src = "'; ?>
<?php  echo prep_url(base_url().'/images/datatable/'); ?><?php echo 'details_close.png";
                        ticketList.fnOpen( nTr, fnFormatDetails(ticketList, nTr), \'details\' );
                    }
                });
            });
        });
        
        function fnRowCallback(nRow, aData, iDisplayIndex, iDisplayIndexFull){
            
            if(!$(\'#ticketList tbody tr:eq(\' + iDisplayIndex + \')\').hasClass(\'ticket-low-priority\') && 
               !$(\'#ticketList tbody tr:eq(\' + iDisplayIndex + \')\').hasClass(\'ticket-normal-priority\') && 
               !$(\'#ticketList tbody tr:eq(\' + iDisplayIndex + \')\').hasClass(\'ticket-hight-priority\') && 
               !$(\'#ticketList tbody tr:eq(\' + iDisplayIndex + \')\').hasClass(\'ticket-asap-priority\')) {
               
               switch(aData[4]) {
                    case \'l\':
                        $(\'#ticketList tbody tr:eq(\' + iDisplayIndex + \')\').addClass(\'ticket-low-priority\');
                        break;
                    case \'n\':
                        $(\'#ticketList tbody tr:eq(\' + iDisplayIndex + \')\').addClass(\'ticket-normal-priority\');
                        break;
                    case \'h\':
                        $(\'#ticketList tbody tr:eq(\' + iDisplayIndex + \')\').addClass(\'ticket-hight-priority\');
                        break;
                    case \'a\':
                        $(\'#ticketList tbody tr:eq(\' + iDisplayIndex + \')\').addClass(\'ticket-asap-priority\');
                        break;
                }
            }
            
            return nRow;
        }
        
        /* Formating function for row details */
        function fnFormatDetails(oTable, nTr) {
        
            var ticketId = $(nTr).find(\'td:eq(1)\').text();
            
            $.ajax({
                url:        \''; ?>
<?php  echo prep_url(base_url().'/ticket/detail-list'); ?><?php echo '\',
                data:       {ticketId:ticketId},
                dataType:   \'json\',
                type:       \'POST\',
                async:      false,
                success:    function(json) {
                    if(json.result) {
                        sOut = \'\';
                        for(index in json.data) {
                            sOut   +=   \'<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">\';
                            
                            if(json.data[index].owner == \'user\') {
                                sOut   +=   \'<tr><td colspan="2" align="left"><img src="'; ?>
<?php  echo SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/'; ?><?php echo 'user.png" /></td></tr>\'
                            } else {
                                sOut   +=   \'<tr><td colspan="2" align="left"><img src="'; ?>
<?php  echo SHIN_Core::$_config['core']['app_base_url'].'/images/datatable/'; ?><?php echo 'user_red.png" /></td></tr>\'
                            }
                            
                            sOut   +=   \'<tr><td>'; ?>
<?php echo $this->_tpl_vars['lng_label_datatable_details_updated']; ?>
:<?php echo '</td><td>\' + json.data[index].created + \'</td><tr>\'     
                            sOut   +=   \'<tr><td>'; ?>
<?php echo $this->_tpl_vars['lng_label_datatable_details_body']; ?>
:<?php echo '</td><td>\' + json.data[index].bodyparced + \'</td><tr>\'     
                            sOut   +=   \'</table><hr />\';
                        }
                    } else {
                    
                    }    
                }
            })
            
            return sOut;
        }
        
        function showHideFilter(target){
            var fieldset = $(\'.filter-list fieldset\');
            
            if($(fieldset).hasClass(\'shin-hide\')) {
                $(target).text(\''; ?>
<?php echo $this->_tpl_vars['lng_label_filet_hide']; ?>
<?php echo '\');
                $(fieldset).removeClass(\'shin-hide\');
            } else {
                $(target).text(\''; ?>
<?php echo $this->_tpl_vars['lng_label_filet_show']; ?>
<?php echo '\');
                $(fieldset).addClass(\'shin-hide\');    
            }        
        }
        
        function resetFilterForm(){
            $(\'#application-sort\').val(\'\');
            $("#priority-sort [value=\'\']").attr("selected", "selected");
            $("#status-sort [value=\'\']").attr("selected", "selected");
            
            $(\'#filter-form\').submit();
            
        }
    </script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>