<?php /* Smarty version 2.6.26, created on 2011-08-25 11:22:51
         compiled from model_several_test.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "back_url.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <h1>SHIN_Model printCollectionObjects function test page:</h1>
    <h3>data from examples_tag table:</h3>
    <br/>

    <h4>code from server side:</h4>
	<i>
    $m = SHIN_Core::$_models['examples_tag']->get_instance();<br/>
    $m->printCollectionObjects();
	</i>

    <br/>
    <br/>
    <h4>code from template side:</h4>
	<i>
	<?php echo '
		<br/>
		{ section name=id loop=$examples_tags_id }<br/>
			&nbsp;&nbsp;&nbsp;Tag -> <b>{ $examples_tags_tag[id] }</b>   <br/>
		{ /section }<br/>
	'; ?>

	</i>

	<br/><br/>This is all :)

<table width="780" border="0" cellpadding="0" cellspacing="0" style="height: 100%;" align="center">
	<tr>
		<td colspan="2"  align="center">
			<br>
			<table width="990" border="1" cellpadding="0" cellspacing="10" align="center">
				<tr valign="top">
					<td align="center">
						<?php echo $this->_tpl_vars['nav_str_up']; ?>

					</td>
				</tr>
				<tr valign="top">
					<td align="center">
					<!-- main loop for assigned tags object`s -->
                    <ul class="gallery-list">
                    <?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['examples_tags_id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <li>
                            <table>
                                <tr>
                                    <td valign="top" width="150">
                                    Tag -> <b><?php echo $this->_tpl_vars['examples_tags_tag'][$this->_sections['id']['index']]; ?>
</b>
                                    </td>
                                </tr>
                            </table>
					   </li>
                    <?php endfor; endif; ?>
                    <div class="clear"></div>
                    </ul>
					<!-- end loop -->
					</td>
				</tr>
				<tr valign="top">
					<td align="center">
						<?php echo $this->_tpl_vars['nav_str_down']; ?>

					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

</body></html>