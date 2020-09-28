<?php /* Smarty version 2.6.26, created on 2010-11-10 11:33:04
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'header.tpl', 7, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<?php echo $this->_tpl_vars['meta']; ?>


    <title><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>

    <?php echo $this->_tpl_vars['cssincludes']; ?>


    <?php echo $this->_tpl_vars['jsincludes']; ?>


    <?php echo $this->_tpl_vars['jsnondocready']; ?>


    <?php echo $this->_tpl_vars['jsdocready']; ?>


</head>