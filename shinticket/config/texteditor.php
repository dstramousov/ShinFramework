<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$texteditor_ext['js']       = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                                    SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/tinymce/tiny_mce.js');

$texteditor_ext['min_js']   = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js', 
                                    SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/tinymce/tiny_mce.js');


/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$texteditor_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css');

/*
| -------------------------------------------------------------------
|  Default theme. Possible values: advanced|simple
| -------------------------------------------------------------------
*/
$texteditor['default_theme'] = 'simple';


/*
| -------------------------------------------------------------------
|  This option specifies how elements are converted into TinyMCE WYSIWYG editor instances. This option can be set 
|  to any of the values below. Possible values: textareas|specific_textareas|exact|none 
| -------------------------------------------------------------------
*/
$texteditor['advanced']['mode'] = 'exact';

/*
| -------------------------------------------------------------------
|  This option should contain a comma separated list of element IDs to convert into editor instances. This option is 
|  only used if mode is set to "exact". 
| -------------------------------------------------------------------
*/
$texteditor['advanced']['elements'] =   '';

/*
| -------------------------------------------------------------------
|  This option should contain a comma separated list of plugins. Plugins are loaded from the "tinymce/jscripts/tiny_mce/plugins" 
|  directory, and the plugin name matches the name of the directory. 
| -------------------------------------------------------------------
*/
$texteditor['advanced']['plugins'] =   'imagemanager, filemanager, safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template';

/*
| -------------------------------------------------------------------
|  This option should contain a comma separated list of button/control names to insert into the toolbar. The number 1-n is the row 
|  number to insert the buttons/controls into. Below is a list of built-in controls, plugins may include other controls names that 
|  can be inserted but these are documented in the individual plugins. This option can only be used when theme is set to advanced and 
|  when the theme_advanced_layout_manager  option is set to the default value of "SimpleLayout" 
| -------------------------------------------------------------------
*/
$texteditor['advanced']['theme_advanced_buttons1'] =   'save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect';

/*
| -------------------------------------------------------------------
|  This option should contain a comma separated list of button/control names to insert into the toolbar. The number 1-n is the row 
|  number to insert the buttons/controls into. Below is a list of built-in controls, plugins may include other controls names that 
|  can be inserted but these are documented in the individual plugins. This option can only be used when theme is set to advanced and 
|  when the theme_advanced_layout_manager  option is set to the default value of "SimpleLayout" 
| -------------------------------------------------------------------
*/
$texteditor['advanced']['theme_advanced_buttons2'] =   'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor';

/*
| -------------------------------------------------------------------
|  This option should contain a comma separated list of button/control names to insert into the toolbar. The number 1-n is the row 
|  number to insert the buttons/controls into. Below is a list of built-in controls, plugins may include other controls names that 
|  can be inserted but these are documented in the individual plugins. This option can only be used when theme is set to advanced and 
|  when the theme_advanced_layout_manager  option is set to the default value of "SimpleLayout" 
| -------------------------------------------------------------------
*/
$texteditor['advanced']['theme_advanced_buttons3'] =   'tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen';

/*
| -------------------------------------------------------------------
|  This option should contain a comma separated list of button/control names to insert into the toolbar. The number 1-n is the row 
|  number to insert the buttons/controls into. Below is a list of built-in controls, plugins may include other controls names that 
|  can be inserted but these are documented in the individual plugins. This option can only be used when theme is set to advanced and 
|  when the theme_advanced_layout_manager  option is set to the default value of "SimpleLayout" 
| -------------------------------------------------------------------
*/
$texteditor['advanced']['theme_advanced_buttons4'] =   'insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage';

/*
| -------------------------------------------------------------------
|  This option enables you to specify where the toolbar should be located. This option can be set to "top" or "bottom" (the default) or 
|  "external". This option can only be used when theme is set to advanced and when the theme_advanced_layout_manager  option is set to 
|  the default value of "SimpleLayout" 
| -------------------------------------------------------------------
*/
$texteditor['advanced']['theme_advanced_toolbar_location'] =   'top';

/*
| -------------------------------------------------------------------
|  This option enables you to specify the alignment of the toolbar, this value can be "left", "right" or "center" (the default). 
|  This option can only be used when theme is set to "advanced" and when the theme_advanced_layout_manager  option is set to the 
|  default value of "SimpleLayout
| -------------------------------------------------------------------
*/
$texteditor['advanced']['theme_advanced_toolbar_align'] =   'left';

/*
| -------------------------------------------------------------------
|  This option enables you to specify where the element statusbar with the path and resize tool should be located. This option can 
|  be set to "top", "bottom" or "none". The default value is set to "bottom". This option can only be used when the theme is set 
|  to "advanced" and when the theme_advanced_layout_manager  option is set to the default value of "SimpleLayout"
| -------------------------------------------------------------------
*/
$texteditor['advanced']['theme_advanced_statusbar_location'] =   'bottom';

/*
| -------------------------------------------------------------------
|  This option gives you the ability to enable/disable the resizing button. This option is only useful if the theme_advanced_statusbar_location option 
|  is set to "top" or "bottom". This option is set to false by default.
| -------------------------------------------------------------------
*/
$texteditor['advanced']['theme_advanced_resizing'] =   'false';


/*
| -------------------------------------------------------------------
|  This option enables you to specify make editor instances in readonly mode. When they are in readonly mode nothing 
|  can be changed and the contents are just presented to the user. You can use this in combination with body_class 
|  to present a different visual presentation for the readonly mode.
| -------------------------------------------------------------------
*/
$texteditor['advanced']['readonly'] = false;

/*
| -------------------------------------------------------------------
|  This option enables you to specify a custom CSS file that extends the theme content CSS. This CSS file is the 
|  one used within the editor (the editable area). This option can also be a comma separated list of URLs.
| -------------------------------------------------------------------
*/
$texteditor['advanced']['content_css'] = '';

/*
| -------------------------------------------------------------------
|  This option enables you to specify what skin you want to use with your theme. A skin is basically a CSS file that 
|  gets loaded from the skins directory inside the theme. The advanced theme that TinyMCE comes with has two skins 
|  these are called "default" and "o2k7"
| -------------------------------------------------------------------
*/
$texteditor['advanced']['skin'] = 'o2k7';

/*
| -------------------------------------------------------------------
|  This option enables you to specify a variant for the skin, for example "silver" or "black".
|  "default" skin doesn't offer any variant, whereas "o2k7" default offers "silver" or "black" variants to the default one.
|  When creating a skin, additional variants may also be created, by adding ui_<variant_name>.css files alongside the default ui.css.
| -------------------------------------------------------------------
*/
$texteditor['advanced']['skin_variant'] = '';



/*
| -------------------------------------------------------------------
|  This option specifies how elements are converted into TinyMCE WYSIWYG editor instances. This option can be set 
|  to any of the values below. Possible values: textareas|specific_textareas|exact|none 
| -------------------------------------------------------------------
*/
$texteditor['simple']['mode'] =   'textareas';

/*
| -------------------------------------------------------------------
|  This option should contain a comma separated list of element IDs to convert into editor instances. This option is 
|  only used if mode is set to "exact". 
| -------------------------------------------------------------------
*/
$texteditor['simple']['elements'] =   '';

/*
| -------------------------------------------------------------------
|  This option should contain a comma separated list of plugins. Plugins are loaded from the "tinymce/jscripts/tiny_mce/plugins" 
|  directory, and the plugin name matches the name of the directory. 
| -------------------------------------------------------------------
*/
$texteditor['simple']['plugins'] =   '';

/*
| -------------------------------------------------------------------
|  This option enables you to specify make editor instances in readonly mode. When they are in readonly mode nothing 
|  can be changed and the contents are just presented to the user. You can use this in combination with body_class 
|  to present a different visual presentation for the readonly mode.
| -------------------------------------------------------------------
*/
$texteditor['simple']['readonly'] = false;

/*
| -------------------------------------------------------------------
|  This option enables you to specify a custom CSS file that extends the theme content CSS. This CSS file is the 
|  one used within the editor (the editable area). This option can also be a comma separated list of URLs.
| -------------------------------------------------------------------
*/
$texteditor['simple']['content_css'] = '';

/*
| -------------------------------------------------------------------
|  This option enables you to specify what skin you want to use with your theme. A skin is basically a CSS file that 
|  gets loaded from the skins directory inside the theme. The advanced theme that TinyMCE comes with has two skins 
|  these are called "default" and "o2k7"
| -------------------------------------------------------------------
*/
$texteditor['simple']['skin'] = '';

/*
| -------------------------------------------------------------------
|  This option enables you to specify a variant for the skin, for example "silver" or "black".
|  "default" skin doesn't offer any variant, whereas "o2k7" default offers "silver" or "black" variants to the default one.
|  When creating a skin, additional variants may also be created, by adding ui_<variant_name>.css files alongside the default ui.css.
| -------------------------------------------------------------------
*/
$texteditor['simple']['skin_variant'] = '';



?>
