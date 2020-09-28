<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package			ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since			Version 0.1
 * @filesource		shinfw/libraries/SHIN_BlockUI.php
 */


/**
 * ShinPHP framework block some HTML/DOM elements library
 *
 * @package			ShinPHP framework
 * @subpackage		Library
 * @author        
 * @link			shinfw/libraries/SHIN_BlockUI.php
 */

class SHIN_BlockUI extends SHIN_Libs
{
    /**
     * Finished tokken for message 
     */
    var $finish_message = ' ... ';

    
    /**
     * Constructor. Init blockui with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct($css_file = false)
    {   
        parent::__construct('blockui', $css_file);

		Console::logSpeed('SHIN_BlockUI begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_BlockUI. Size of class: ');		        
    }

    /**
     * Binding for any fJS function. 
     *
     * @access public
     * @params $block_function String  Name of the function who is make block.
     * @params $un_block_function Name of the function who is make unblock.
     * @params $lng_label_message String This is language label from lang/app_lang.php.
     * @return string.
     */
    public function bindByFunction($blocked_domid, $block_function, $un_block_function, $lng_label_message=null, $css=null, $overlayCSS=null, $growlCSS=null, $spiner=null)
    {
		// 1. Spinner
		$_spinner_addons = '';
		if($spiner){
			$_spinner_addons = '<img src='.SHIN_Core::$_config['core']['shinfw_base_url'].'/'.SHIN_Core::$_config['core']['shinfw_folder'].'/images/blockui/'.$spiner.'>';
		}
		
		$addons = array();
		// 2. Message
		if($lng_label_message){		
		
			if(isset(SHIN_Core::$_language)){
				$_mess = SHIN_Core::$_language->line($lng_label_message).$this->finish_message ;
			} else {
				$_mess = $lng_label_message.$this->finish_message;
			} 
			
		} else {
			$_mess = '';
		}
		
		array_push($addons, 'message: \''.$_spinner_addons.' '.$_mess.'\'');
		
        // 3. css
		$_css_addons = '';
		if($css){
			$_css_addons = '
css: { ' . $css . '} ';

			array_push($addons, $_css_addons);
		} 
		
		// 4. overlayCSS
		$_overlayCSS_addons = '';
		if($overlayCSS){
			$_overlayCSS_addons = '
overlayCSS: { ' . $overlayCSS . '} ';

			array_push($addons, $_overlayCSS_addons);
		} 
		
		// 4. growlCSS
		$_growlCSS_addons = '';
		if($growlCSS){
			$_growlCSS_addons = '
growlCSS: { ' . $growlCSS . '} ';

			array_push($addons, $_growlCSS_addons);
		} 
					
//var '.$block_function.' = function (){
// $(\'#'.$block_function.'\').click(function() {
		$html = '
	'.$block_function.' = function (){
		$(\'#'.$blocked_domid.'\').block({
			'.implode(", ", $addons).'
		});
 }; 

'.$un_block_function.' = function (){
	$(\'#'.$blocked_domid.'\').unblock();
}

';	

        return $html;
    }
	

    /**
     * Binding by DOM id element.
     *
     * @access public
     * @params $block_function String  Name of the function who is make block.
     * @params $un_block_function Name of the function who is make unblock.
     * @params $lng_label_message String This is language label from lang/app_lang.php.
     * @return string.
     */
    public function bindByDOMID($domid_for_block, $domid_for_unblock, $blocked_domid, $lng_label_message=NULL, $css=NULL)
    {	
		$_arr = array();
		
		if($lng_label_message){
			if(isset(SHIN_Core::$_language)){
				array_push($_arr, "message: '".SHIN_Core::$_language->line($lng_label_message)."'");
			} else {
				array_push($_arr, "message: '".$lng_label_message."'");
			}
		} else {
			array_push($_arr, "message: null");			
		}
	
		if($css){
			array_push($_arr, "css: { ".$css." } ");
		} else {
			// Add default css values
			array_push($_arr, "css: { ".$this->sh_Options['css']." } ");
		}
	
		$html = "
		
$('#{$domid_for_block}').click(function() {
	$('#{$blocked_domid}').block({
		".implode(",", $_arr)."
	}); 
});

";
		
		$html .= "

$('#{$domid_for_unblock}').click(function() {
	$('#{$blocked_domid}').unblock();
}); 		

";

        return $html;
    }
} // End of class 

/* End of file SHIN_BlockUI.php */
/* Location: shinfw/libraries/SHIN_BlockUI.php */               
