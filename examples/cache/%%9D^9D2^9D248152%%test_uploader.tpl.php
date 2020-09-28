<?php /* Smarty version 2.6.26, created on 2011-03-10 10:46:55
         compiled from test_uploader.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <a href="<?php  echo prep_url(shinfw_base_url().'main');  ?>">Back to Main page</a>

    <div id="imageUploader"></div>
    <div class="upload-action" id="upload-action"></div>
    
    <fieldset>
        <legend>Original images</legend>
        <?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
            <a href="<?php echo SHIN_Core::$_config['core']['app_base_url']; ?>/<?php echo $this->_tpl_vars['baseDir']; ?>
/original/<?php echo $this->_tpl_vars['file']; ?>
"><?php echo $this->_tpl_vars['file']; ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
    </fieldset>
    
    <br /><br />
    
    <fieldset>
        <legend>Thumbs images</legend>
        <?php $_from = $this->_tpl_vars['thumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thumb']):
?>
            <a href="<?php echo SHIN_Core::$_config['core']['app_base_url']; ?>/<?php echo $this->_tpl_vars['baseDir']; ?>
/thumbs/<?php echo $this->_tpl_vars['thumb']; ?>
"><?php echo $this->_tpl_vars['thumb']; ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
    </fieldset>
    
    <br /><br />
    
    <fieldset>
        <legend>Log list</legend>
        <?php $_from = $this->_tpl_vars['logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['log']):
?>
            <a href="../shinfw/logs/<?php echo $this->_tpl_vars['log']; ?>
"><?php echo $this->_tpl_vars['log']; ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
    </fieldset>
    
    <?php echo '
        <script type="text/javascript">
            function reloadWindow(){
                window.location = \''; ?>
<?php echo SHIN_Core::$_config['core']['app_base_url']; ?><?php echo '/test_uploader.php\'; 
            }
        </script>
    '; ?>