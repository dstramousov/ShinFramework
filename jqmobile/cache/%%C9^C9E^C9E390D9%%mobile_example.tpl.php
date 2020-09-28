<?php /* Smarty version 2.6.26, created on 2011-04-05 09:53:57
         compiled from mobile_example.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div data-role="page" id="mainpage">

    <div data-role="header">
        <h1>Mobile test1</h1>
    </div><!-- /header -->

    <div data-role="content">    
        <table width="100%" border="1">
            <tr>
                <td colspan="4"><?php echo $this->_tpl_vars['nav_str_up']; ?>
</td>
            </tr>
            <tr>
                <td>Id</td>
                <td>Customer</td>
                <td>Bill</td>
                <td>Note</td>
            </tr>
            <tr>
                <?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['jqmobile_example_id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
                    <td><?php echo $this->_tpl_vars['jqmobile_example_id'][$this->_sections['id']['index']]; ?>
</td>
                    <td><?php echo $this->_tpl_vars['jqmobile_example_customer'][$this->_sections['id']['index']]; ?>
</td>
                    <td><?php echo $this->_tpl_vars['jqmobile_example_bill'][$this->_sections['id']['index']]; ?>
</td>
                    <td><?php echo $this->_tpl_vars['jqmobile_example_note'][$this->_sections['id']['index']]; ?>
</td>
                <tr></tr>    
                <?php endfor; endif; ?>
            </tr>
            <tr>
                <td colspan="4"><?php echo $this->_tpl_vars['nav_str_down']; ?>
</td>
            </tr>
        </table>
        <a href="#newcustomer" data-rel="dialog" data-role="button" data-inline="true" data-transition="pop">Add New Customer</a>        
    </div><!-- /content -->

    <div data-role="footer">
        <h4>Shin PHP Framework 0.9</h4>
    </div><!-- /footer -->
</div>
<!-- /page -->


<div data-role="page" id="newcustomer">
    <div data-role="header">
        <h1>Mobile test1</h1>
    </div><!-- /header -->
    <div data-role="content">    
        <form action="" method="post">
            <table width="100%" border="1">
                <tr>
                    <th><label for="name">Customer:</label></th>
                    <td>
                        <div data-role="fieldcontain">
                            <input type="text" name="customer" id="customer" value=""  />
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label for="name">Bill:</label></th>
                    <td>
                        <div data-role="fieldcontain">
                            <input type="text" name="bill" id="bill" value=""  />
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label for="name">Notes:</label></th>
                    <td>
                        <div data-role="fieldcontain">
                            <input type="text" name="notes" id="notes" value=""  />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="button" name="add" value="Add customer" id="add" onclick="sendData();" />
                    </td>
                </tr>
            </table>
         </form>        
    </div><!-- /content -->
    <div data-role="footer">
        <h4>Shin PHP Framework 0.9</h4>
    </div><!-- /footer -->
</div>

<?php echo '
<script type="text/javascript">
    function sendData() {
        
        var customer    =   $(\'#customer\').val();
        var bill        =   $(\'#bill\').val();
        var notes       =   $(\'#notes\').val();
        
        if(customer != \'\' && bill != \'\' && notes != \'\') { 
            $.getJSON(\''; ?>
<?php  echo base_url().'/add';  ?><?php echo '\', {
                customer:   $(\'#customer\').val(),
                bill:       $(\'#bill\').val(),
                notes:      $(\'#notes\').val()    
            }, function(json){
                if(json.result){
                    window.location = \''; ?>
<?php  echo base_url().'/table';  ?><?php echo '\';
                }    
            })
        }    
    } 
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>