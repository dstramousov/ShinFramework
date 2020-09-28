<?php /* Smarty version 2.6.26, created on 2011-05-05 10:19:46
         compiled from web/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'web/header.tpl', 5, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->_tpl_vars['meta']; ?>

    <title><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php  echo SHIN_Core::$_config['core']['app_base_url'];  ?>/css/reset.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php  echo SHIN_Core::$_config['core']['app_base_url'];  ?>/css/site.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php  echo SHIN_Core::$_config['core']['app_base_url'];  ?>/css/pag_text.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php  echo SHIN_Core::$_config['core']['app_base_url'];  ?>/css/fr_style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php  echo SHIN_Core::get_theme_url_path() ?>/css/jqueryUI/jquery.ui.all.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php  echo SHIN_Core::get_theme_url_path() ?>/css/timepicker/jquery.timeentry.css" />
    <?php echo $this->_tpl_vars['jsincludes']; ?>

    <?php echo $this->_tpl_vars['jsnondocready']; ?>

    <?php echo $this->_tpl_vars['jsdocready']; ?>
	

	<meta id="facebookimage" property="og:image" content="<?php echo $this->_tpl_vars['facebook_img_url']; ?>
" />

</head>