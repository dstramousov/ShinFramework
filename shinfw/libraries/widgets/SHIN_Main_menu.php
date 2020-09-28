<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package       ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since         Version 0.1
 * @filesource    shinfw/libraries/widgets/SHIN_Main_Menu.php
 */


/**
 * ShinPHP framework. Simple widget for visualize main shinfw menu.
 *
 * @package        ShinPHP framework
 * @subpackage     Widgets
 * @author        
 * @link           shinfw/libraries/widgets/SHIN_Main_Menu.php
 */

class SHIN_Main_Menu extends SHIN_Widget
{

    /**
     * Constructor. Init accordion with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($_name)
    {   
        parent::__construct($_name);
    }

    /**
     * Return body of JS with all filled parameters.
     *
     * @access protected
     * @params NULL
     * @return string.
     */
    public function render($params = NULL)
    {   
        $nedded_libs = array(
                            'libs' => array(
                                'SHIN_Menu',
                            )
                         );

                         
        SHIN_Core::postInit($nedded_libs);
         
        // generate general menu with avialable languages and themes. /////////
        $menuData        = array(
                                    array('text' => SHIN_Core::$_language->line('lng_label_choice_language'), 'data' => array(
                                                                                 array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_name_italian'), 'link' => base_url().'/change_language/it'),
                                                                                    array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_name_english'), 'link' => base_url().'/change_language/en'),
                                                                                    array('type' => 'link', 'text' => SHIN_Core::$_language->line('lng_label_name_russian'), 'link' => base_url().'/change_language/ru'),    
                                                                                   )
                                           ),
                                     array('text' => SHIN_Core::$_language->line('lng_label_choice_theme'), 'data' => array(
                                                                                 array('type' => 'link', 'text' => 'Lightness', 'link' => base_url().'/change_theme/lightness'),
                                                                                  array('type' => 'link', 'text' => 'Darkness',  'link' => base_url().'/change_theme/darkness'),
                                                                                  array('type' => 'link', 'text' => 'Redmond',  'link' => base_url().'/change_theme/redmond'),
                                                                                  array('type' => 'link', 'text' => 'Smoothness',  'link' => base_url().'/change_theme/smoothness'),
                                                                               )
                                         ),
                                );
        
        // hide item when we located on main page
        if($params['page'] != 'main') {
            $menuData[] = array('text' => SHIN_Core::$_language->line('lng_label_main_page'),   'link' => base_url().'/main');
        }
            $menuData[] = array('text' => SHIN_Core::$_language->line('lng_label_logout'),   'link' => base_url().'/logout'); 
                                
        $ddmenu          = SHIN_Core::$_libs['ddmenu']->get_instance();
        $ddmenu->setMenuData('shinfw_main_menu', $menuData);
        SHIN_Core::$_jsmanager->addComponent($ddmenu->render());
        
        return $ret;
    }          


} // End of class 

/* End of file SHIN_Main_Menu.php */
/* Location: shinfw/libraries/widgets/SHIN_Main_Menu.php */               