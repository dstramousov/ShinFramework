<?php /* Smarty version 2.6.26, created on 2011-03-21 10:33:57
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'header.tpl', 7, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>

	<?php echo $this->_tpl_vars['meta']; ?>


    <title><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>

    <?php echo $this->_tpl_vars['cssincludes']; ?>


    <?php echo $this->_tpl_vars['jsincludes']; ?>


    <?php echo $this->_tpl_vars['jsnondocready']; ?>

        
    <?php echo $this->_tpl_vars['jsdocready']; ?>

    
</head>
