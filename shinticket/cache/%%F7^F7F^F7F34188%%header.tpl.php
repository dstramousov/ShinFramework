<?php /* Smarty version 2.6.26, created on 2010-10-13 16:08:40
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

        
        <!--[if IE]>
            <link href="<?php echo prep_url(base_url().'/css/style.ie.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
        <![endif]-->
        
    </head>
    <body>

    <div class="">
        <fieldset class="shin-general-menu">
            <legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_tools_fw_menu']; ?>
</b>&nbsp;&nbsp;</legend>
             <?php 
                echo SHIN_Core::runWidget('main_menu', array());
              ?>
             <?php echo $this->_tpl_vars['shinfw_main_menu']; ?>

        </fieldset>
    </div>
    <div class="">
        <fieldset class="shin-ticket-menu">
    	    <legend>&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['lng_label_main_page_desc']; ?>
</b>&nbsp;&nbsp;</legend>
	        <?php echo $this->_tpl_vars['ticket_ddmenu']; ?>

        </fieldset>
    </div>
    <div class="shin-clear"></div>