<?php /* Smarty version 2.6.26, created on 2010-11-29 12:51:47
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'header.tpl', 18, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="SHIN framework examples" />
	<meta http-equiv="Expires" content="Thu, Jan 1 1970 00:00:01 GMT" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta name="keywords" content="SHIN,framework,examples" />
	<meta name="robots" content="all-index" />
	<meta name="revisit-after" content="1 days" />
	<meta name="distribution" content="global" /> 
	<meta name="rating" content="general" />
	<meta name="content-language" content="en" />
	<meta name="author" content="shinframework" />
	<meta name="copyright" content="shinframework" />

    <title><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>

    <?php echo $this->_tpl_vars['cssincludes']; ?>


    <?php echo $this->_tpl_vars['jsincludes']; ?>


    <?php echo $this->_tpl_vars['jsnondocready']; ?>


    <?php echo $this->_tpl_vars['jsdocready']; ?>


</head>

<?php echo '
<style type="text/css">
#content code {
	background-color:#F9F9F9;
	border:1px solid #D0D0D0;
	color:#002166;
	display:block;
	font-family:Monaco,Verdana,Sans-serif;
	font-size:12px;
	margin:14px 0;
	padding:12px 10px;
}
</style>
'; ?>
