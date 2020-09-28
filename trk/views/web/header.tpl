<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    {$meta}
    <title>{$title|escape}</title>
    <link rel="stylesheet" type="text/css" media="all" href="{php} echo SHIN_Core::$_config['core']['app_base_url']; {/php}/css/reset.css" />
    <link rel="stylesheet" type="text/css" media="all" href="{php} echo SHIN_Core::$_config['core']['app_base_url']; {/php}/css/site.css" />
    <link rel="stylesheet" type="text/css" media="all" href="{php} echo SHIN_Core::$_config['core']['app_base_url']; {/php}/css/pag_text.css" />
    <link rel="stylesheet" type="text/css" media="all" href="{php} echo SHIN_Core::$_config['core']['app_base_url']; {/php}/css/fr_style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="{php} echo SHIN_Core::get_theme_url_path(){/php}/css/jqueryUI/jquery.ui.all.css" />
	<link rel="stylesheet" type="text/css" media="all" href="{php} echo SHIN_Core::get_theme_url_path(){/php}/css/timepicker/jquery.timeentry.css" />
    {$jsincludes}
    {$jsnondocready}
    {$jsdocready}	

	<meta id="facebookimage" property="og:image" content="{$facebook_img_url}" />

</head>
