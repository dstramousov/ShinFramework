<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        {$meta}

        <title>{$title|escape}</title>

        {$cssincludes}
        {$jsincludes}
        {$jsnondocready}
        {$jsdocready}
        
        <!--[if IE]>
            <link href="{php}echo prep_url(base_url().'/css/style.ie.css');{/php}" rel="stylesheet" type="text/css" media="all"/>
        <![endif]-->
        
    </head>
    <body>

    <div class="">
        <fieldset class="shin-general-menu">
            <legend>&nbsp;&nbsp;<b>{$lng_label_tools_fw_menu}</b>&nbsp;&nbsp;</legend>
             {php}
                echo SHIN_Core::runWidget('main_menu', array());
             {/php}
             {$shinfw_main_menu}
        </fieldset>
    </div>
    <div class="">
        <fieldset class="shin-ticket-menu">
    	    <legend>&nbsp;&nbsp;<b>{$lng_label_main_page_desc}</b>&nbsp;&nbsp;</legend>
	        {$ticket_ddmenu}
        </fieldset>
    </div>
    <div class="shin-clear"></div>