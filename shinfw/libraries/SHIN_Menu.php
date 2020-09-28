<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource  shinfw/libraries/SHIN_Menu.php
 */


/**
 * ShinPHP framework main menu realisation
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          shinfw/libraries/SHIN_Menu.php
 */

define('CT_APP_TYPE_LINK', 'l');
define('CT_APP_TYPE_WIDGET', 'w'); 

define('CT_APP_NEWPAGE_YES', 'y');
define('CT_APP_NEWPAGE_NO', 'n'); 
 
class SHIN_Menu extends SHIN_Libs
{

    /**
     * Constructor.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct()
    {
		$nedded_libs = array(
                            'help' => array('array'),
                            'libs' => array(
								'SHIN_Panels',
                            ),
                            'models'=> array(
												array('sys_menu_model', 'sys_menu_model'), 
												array('sys_menugrp_model', 'sys_menugrp_model'), 
                                                array('sys_menurows_model', 'sys_menurows_model'),
												array('sys_menusettings_model', 'sys_menusettings_model'),
                                                array('sys_modulelist_model', 'sys_modulelist_model'),
											 )
                         );
						 
		Console::logSpeed('SHIN_Menu begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Menu. Size of class: ');

		SHIN_Core::postInit($nedded_libs);	
    }
	
	
     /**
     * 
     *
     * @access private
     * @params NULL
     * @return hash.
     */
	function __get_modules()
	{
		$ret = array();
		
		
				
		return $ret;
	}

	
     /**
     * Main method for getting ready string for browser.
     *
     * @access public
     * @params $params:array
     * @return NULL.
     */
    function render($_htmlID = null)
    {
		$granted_links = SHIN_Core::$_libs['acl']->createMenuPolicy();

		$panels        = SHIN_Core::$_libs['panels']->get_instance();
        
        // firstly get data from default table
        $defaultPanelParams   = SHIN_Core::$_models['sys_menu_model']->getPanelParams();
        $currentPanelParams   = SHIN_Core::$_models['sys_menusettings_model']->getPanelParams(SHIN_Core::$_libs['auth']->user->idUser);
        $panelParams          = SHIN_Core::$_models['sys_menusettings_model']->mergeParams($defaultPanelParams, $currentPanelParams);
        
        $options      = array('ajax_url'   =>  SHIN_Core::$_config['core']['app_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/connectors/'.'panelsavestate.php',
                              'model_name' =>  'sys_menusettings',
                              'width'      =>  '33%');
		
        $panelHtmlData    = array();
		
		$moduleFolder = SHIN_Core::$_models['sys_modulelist_model']->getApplicationList();
        foreach($granted_links as $panelName => $panelData)
		{
			foreach($panelData as $categoryKey => $categoryData)
			{
				$pictureForCategory = '';
				if(isset($panelData[$categoryKey]['ico'])){
					$pictureForCategory = '<img src='.SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/images/'.$panelData[$categoryKey]['ico'].' border="0" />&nbsp;';
				}
                $html = $pictureForCategory.'<b>'.$categoryKey.'</b><br/>';
				
                foreach($categoryData as $linksKey => $linksData)
				{
					
					if($linksData['type'] == CT_APP_TYPE_LINK){
					
						if($linksData['active'] != 'y'){continue;}
						
						$newPageSight = '';
						if($linksData['newPage'] == CT_APP_NEWPAGE_YES){$newPageSight = ' target="_blank" ';}
						
						if(SHIN_Core::$_apache_mode == APACHE_TYPE_FASTCGI){
							if(isset($moduleFolder[$linksData['idModule']])){
								if($moduleFolder[$linksData['idModule']] == SHIN_Core::$_config['core']['shinfw_folder']){
									$html .= '' . '<a class="shin-examples-list"'.$newPageSight.' href="'.base_url().'/'.$linksData['file'].'">'.$linksData['application'].'</a><br/>';
								} else {
									$html .= '' . '<a class="shin-examples-list"'.$newPageSight.' href="'.base_url().'/'.$moduleFolder[$linksData['idModule']].'/'.$linksData['file'].'">'.$linksData['application'].'</a><br/>';
								}
							} else {
								// TODO need think !!!!!!!!!!!!!!!
								//dump($linksData);
							}
						} else {
							// small fix for url who is contained different entry point
							$pos = strpos($linksData['file'], '.php');
							if ($pos === false) {
								//dump($moduleFolder);
								if(isset($moduleFolder[$linksData['idModule']])){
									if($moduleFolder[$linksData['idModule']] == SHIN_Core::$_config['core']['shinfw_folder']){
										$html .= '' . '<a class="shin-examples-list"'.$newPageSight.' href="'.SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['index_page'].'/'.$linksData['file'].'">'.$linksData['application'].'</a><br/>';
									} else {
										$html .= '' . '<a class="shin-examples-list"'.$newPageSight.' href="'.SHIN_Core::$_config['core']['shinfw_base_url'].'/'.$moduleFolder[$linksData['idModule']].'/'.SHIN_Core::$_config['core']['index_page'].'/'.$linksData['file'].'">'.$linksData['application'].'</a><br/>';
									}
								}
							} else {
								$html .= '' . '<a class="shin-examples-list"'.$newPageSight.' href="'.SHIN_Core::$_config['core']['shinfw_base_url'].'/'.$moduleFolder[$linksData['idModule']].'/'.$linksData['file'].'">'.$linksData['application'].'</a><br/>';
							}							
						}
						
					} elseif($linksData['type'] == CT_APP_TYPE_WIDGET) {						
						if($linksData['active'] != 'y'){continue;}
 						$html .= '<div id="wdg_'.$linksData['application'].'" name="wdg_'.$linksData['application'].'" class="wdg">'.SHIN_Core::runWidget($linksData['file'], array('mode'=>'AM')).'</div>';
					}
					
                }
				
                if(array_key_exists($linksData['idPanel'], $panelHtmlData)) {
                    $panelHtmlData[$linksData['idPanel']] = $panelHtmlData[$linksData['idPanel']] . $html;    
                } else {
                    $panelHtmlData[$linksData['idPanel']] = $html;
                }
            }
        }
		
		// delete empty panels
		$__tmpPanelParams = $this->_deleteEmptyPanel($panelHtmlData, $panelParams);

        $panels->init($options);
		$panels->setPanelData($_htmlID, $__tmpPanelParams, $panelHtmlData);
        
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['panels']->render());
	}
	
    /**
     * Delete empty panel.
     *
     * @access private
     * @params $panelHtmlData array.
     * @params $panelParams array with raw data for panels.
     * @return ready array for panel visualizatiuon.
     */
	function _deleteEmptyPanel($panelHtmlData, $panelParams)
	{
		if(is_array($panelHtmlData)){
			$needed_show_panel_id = array_keys($panelHtmlData);
		} else {
			SHIN_Core::show_error('No any links for this user');			
		}
		
		foreach($panelParams['data'] as $id=>$i){
			if(!in_array($i['idPanel'], $needed_show_panel_id)){
				unset($panelParams['data'][$id]);
			}
		}

		return $panelParams;
	}
			
} // End of class 

/* End of file SHIN_Menu.php */
/* Location: shinfw/libraries/SHIN_Menu.php */               
