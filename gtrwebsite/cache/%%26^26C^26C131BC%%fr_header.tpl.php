<?php /* Smarty version 2.6.26, created on 2011-03-03 11:13:16
         compiled from web/fr_header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'web/fr_header.tpl', 7, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<?php echo $this->_tpl_vars['meta']; ?>


    <title><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>

	<script src="<?php echo SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/js/jquery/jquery-1.5.1.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/js/ddmenu/hoverIntent.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/js/ddmenu/superfish.js'; ?>" type="text/javascript"></script>

</head>