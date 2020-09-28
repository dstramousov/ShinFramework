<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| ToDo config file with default values
| -------------------------------------------------------------------
| 
*/

/*
| -------------------------------------------------------------------
|  Depends from JS
| -------------------------------------------------------------------
*/                                                                  
$todo_ext['js']     = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.js',
                            SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.js',
                            SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/todolist/todolist.js',
                            SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/todolist/functions.js');
                        
$todo_ext['min_js'] = array(SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jquery/jquery.min.js',
                            SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/jqueryUI/jquery-ui.min.js',
                            SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/todolist/todolist.js',
                            SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'] . '/js/todolist/functions.js');


/*
| -------------------------------------------------------------------
|  Depends from CSS
| -------------------------------------------------------------------
*/
$todo_ext['css'] = array(SHIN_Core::$_config['theme']['theme_root_dir'] . '/' . SHIN_Core::get_theme_path().'/css/todolist/r-style.css',
                         SHIN_Core::$_config['theme']['theme_root_dir'] . '/' . SHIN_Core::get_theme_path().'/css/todolist/l-style.css',
                         SHIN_Core::$_config['theme']['theme_root_dir'] . '/' . SHIN_Core::get_theme_path().'/css/todolist/t-style.css');


/*
| -------------------------------------------------------------------
| ToDo list mode - single|tree 
| -------------------------------------------------------------------
*/
$todo['mode'] = 'single';

?>
