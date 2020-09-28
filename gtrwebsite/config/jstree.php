<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/
$jstree_ext['js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.custom.js',
                          
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jstree/lib/jquery.cookie.js',
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jstree/lib/jquery.hotkeys.js',
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jstree/lib/jquery.metadata.js',
                          
                          SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jstree/jquery.tree.js',
                          
                          );


$jstree_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js', 
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.custom.min.js',
                              
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jstree/lib/jquery.cookie.min.js',
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jstree/lib/jquery.hotkeys.min.js',
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jstree/lib/jquery.metadata.min.js',
                              
                              SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jstree/jquery.tree.min.js',
                          
                          );
/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$jstree_ext['css'] = array(SHIN_Core::get_theme_url_path().'/css/jqueryUI/jquery.ui.all.css');


/*
| -------------------------------------------------------------------
| Path to the theme CSS file 
| -------------------------------------------------------------------
*/
$jstree['themes']['url'] = '"' . SHIN_Core::get_theme_url_path() . '/css/jstree/default/style.css"';

/*
| -------------------------------------------------------------------
| Needed plugins 
| -------------------------------------------------------------------
*/
$jstree['plugins'] = '["themes", "html_data", "dnd"]';

/*
| -------------------------------------------------------------------
| Sight for automaticaly render function: Possible values TRUE / FALSE
| -------------------------------------------------------------------
*/
$jstree['render_sight'] = TRUE;
