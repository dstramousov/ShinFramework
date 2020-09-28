<?php /* Smarty version 2.6.26, created on 2011-05-10 14:19:32
         compiled from dbusage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'dbusage.tpl', 16, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body id="page">

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>
    <br><br>

	<h1>DB usage demo:</h1>


	<h3>sample 1:</h3>
	<h4>SELECT * FROM fsh_folders LIMIT 20, 10</h4>
	<table>
		<?php unset($this->_sections['mysec']);
$this->_sections['mysec']['name'] = 'mysec';
$this->_sections['mysec']['loop'] = is_array($_loop=$this->_tpl_vars['sample1_res']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mysec']['show'] = true;
$this->_sections['mysec']['max'] = $this->_sections['mysec']['loop'];
$this->_sections['mysec']['step'] = 1;
$this->_sections['mysec']['start'] = $this->_sections['mysec']['step'] > 0 ? 0 : $this->_sections['mysec']['loop']-1;
if ($this->_sections['mysec']['show']) {
    $this->_sections['mysec']['total'] = $this->_sections['mysec']['loop'];
    if ($this->_sections['mysec']['total'] == 0)
        $this->_sections['mysec']['show'] = false;
} else
    $this->_sections['mysec']['total'] = 0;
if ($this->_sections['mysec']['show']):

            for ($this->_sections['mysec']['index'] = $this->_sections['mysec']['start'], $this->_sections['mysec']['iteration'] = 1;
                 $this->_sections['mysec']['iteration'] <= $this->_sections['mysec']['total'];
                 $this->_sections['mysec']['index'] += $this->_sections['mysec']['step'], $this->_sections['mysec']['iteration']++):
$this->_sections['mysec']['rownum'] = $this->_sections['mysec']['iteration'];
$this->_sections['mysec']['index_prev'] = $this->_sections['mysec']['index'] - $this->_sections['mysec']['step'];
$this->_sections['mysec']['index_next'] = $this->_sections['mysec']['index'] + $this->_sections['mysec']['step'];
$this->_sections['mysec']['first']      = ($this->_sections['mysec']['iteration'] == 1);
$this->_sections['mysec']['last']       = ($this->_sections['mysec']['iteration'] == $this->_sections['mysec']['total']);
?>
			<?php echo '<tr bgcolor="'; ?><?php echo smarty_function_cycle(array('values' => "#aaaaaa,#bbbbbb"), $this);?><?php echo '"><td>'; ?><?php echo $this->_tpl_vars['sample1_res'][$this->_sections['mysec']['index']]['id']; ?><?php echo '</td><td>'; ?><?php echo $this->_tpl_vars['sample1_res'][$this->_sections['mysec']['index']]['file_id']; ?><?php echo '</td><td>'; ?><?php echo $this->_tpl_vars['sample1_res'][$this->_sections['mysec']['index']]['count']; ?><?php echo '</td><td>'; ?><?php echo $this->_tpl_vars['sample1_res'][$this->_sections['mysec']['index']]['created']; ?><?php echo '</td></tr>'; ?>

		<?php endfor; endif; ?>
	</table>

	<h3>sample 2:</h3>
	<h4>SELECT id, file_id, tag FROM fsh_tags LIMIT 20</h4>
	<table>
		<?php unset($this->_sections['mysec2']);
$this->_sections['mysec2']['name'] = 'mysec2';
$this->_sections['mysec2']['loop'] = is_array($_loop=$this->_tpl_vars['sample2_res']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mysec2']['show'] = true;
$this->_sections['mysec2']['max'] = $this->_sections['mysec2']['loop'];
$this->_sections['mysec2']['step'] = 1;
$this->_sections['mysec2']['start'] = $this->_sections['mysec2']['step'] > 0 ? 0 : $this->_sections['mysec2']['loop']-1;
if ($this->_sections['mysec2']['show']) {
    $this->_sections['mysec2']['total'] = $this->_sections['mysec2']['loop'];
    if ($this->_sections['mysec2']['total'] == 0)
        $this->_sections['mysec2']['show'] = false;
} else
    $this->_sections['mysec2']['total'] = 0;
if ($this->_sections['mysec2']['show']):

            for ($this->_sections['mysec2']['index'] = $this->_sections['mysec2']['start'], $this->_sections['mysec2']['iteration'] = 1;
                 $this->_sections['mysec2']['iteration'] <= $this->_sections['mysec2']['total'];
                 $this->_sections['mysec2']['index'] += $this->_sections['mysec2']['step'], $this->_sections['mysec2']['iteration']++):
$this->_sections['mysec2']['rownum'] = $this->_sections['mysec2']['iteration'];
$this->_sections['mysec2']['index_prev'] = $this->_sections['mysec2']['index'] - $this->_sections['mysec2']['step'];
$this->_sections['mysec2']['index_next'] = $this->_sections['mysec2']['index'] + $this->_sections['mysec2']['step'];
$this->_sections['mysec2']['first']      = ($this->_sections['mysec2']['iteration'] == 1);
$this->_sections['mysec2']['last']       = ($this->_sections['mysec2']['iteration'] == $this->_sections['mysec2']['total']);
?>
			<?php echo '<tr bgcolor="'; ?><?php echo smarty_function_cycle(array('values' => "#aaaaaa,#bbbbbb"), $this);?><?php echo '"><td>'; ?><?php echo $this->_tpl_vars['sample2_res'][$this->_sections['mysec2']['index']]['id']; ?><?php echo '</td><td>'; ?><?php echo $this->_tpl_vars['sample2_res'][$this->_sections['mysec2']['index']]['file_id']; ?><?php echo '</td><td>'; ?><?php echo $this->_tpl_vars['sample2_res'][$this->_sections['mysec2']['index']]['count']; ?><?php echo '</td><td>'; ?><?php echo $this->_tpl_vars['sample2_res'][$this->_sections['mysec2']['index']]['created']; ?><?php echo '</td></tr>'; ?>

		<?php endfor; endif; ?>
	</table>

	<h3>sample 3:</h3>
	<h4>SELECT * FROM fsh_files WHERE id="2"</h4>
	<table cellpadding="1" cellspacing="1" border="1">
   		<tr>
			<td><?php echo $this->_tpl_vars['sample3_res']['id']; ?>
</td>
			<td><?php echo $this->_tpl_vars['sample3_res']['file_id']; ?>
</td>
			<td><?php echo $this->_tpl_vars['sample3_res']['count']; ?>
</td>
			<td><?php echo $this->_tpl_vars['sample3_res']['created']; ?>
</td>
		</tr>
	</table>

</body>

</html>