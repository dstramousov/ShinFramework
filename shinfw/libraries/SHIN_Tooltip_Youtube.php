<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.1
 * @filesource   shinfw/libraries/SHIN_Tooltip.php
 */


/**
 * ShinPHP framework fusion charts library
 *
 * @package       ShinPHP framework
 * @subpackage    Libraries
 * @author        
 * @link          shinfw/libraries/SHIN_Tooltip_Youtube.php
 */

require_once("SHIN_Tooltip.php");

class SHIN_Tooltip_Youtube extends SHIN_Tooltip
{
    
    /**
     * Constructor. Init tooltip with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __costruct($css_file = false)
    {
        parent::__construct();

		Console::logSpeed('SHIN_Tooltip_Youtube begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_Tooltip_Youtube. Size of class: ');
    }
    
    /**
    * prepare and render script for youtube tooltip
    * 
    * @access public
    * @param string $id - the id of container element
    * @param string $videoID - video id
    * @param int $width - width of container
    * @param int $height - height of container
    * @param string $style - css style
    * @return null
    */
    public function add_tooltip($id, $videoID, $width = 432, $height = 264, $style = '')
    {
        
         $content = "'<div id=\"youtube-embed-$videoID\">You need Flash player 8+ to view this video.</div>'";
         
         $position = "{
            corner: {
               tooltip: 'bottomMiddle',
               target: 'topMiddle'
            }
         }";
         
         $show = "{
            event: 'click'
         }";
         
         $hide = "'unfocus'";
         
         $style = "{
            padding: 0,
            tip: true,
            name: 'dark',
            classes: '$style'
         }";
         
         $events = "{
            render: function()
            {
               // Setup video paramters
               var params = { allowScriptAccess: 'always', allowfullScreen: 'false' };
               var attrs = { id: 'youtube-video-$videoID' };
               
               // Embed the youtube video using SWFObject script
               swfobject.embedSWF('http://www.youtube.com/v/$videoID&enablejsapi=1&playerapiid=youtube-api-$videoID',
                                 'youtube-embed-$videoID', '$width', '$height', '8', null, null, params, attrs);
            },

            hide: function(){
               // Pause the vide when hidden
               var playerAPI = $('#youtube-video-$videoID').get(0);
               if(playerAPI && playerAPI.pauseVideo) playerAPI.pauseVideo();
            }
         }";
        
        
        
        parent::init(
            array(
                'content'       =>  $content,
                'position'      =>  $position,
                'show'          =>  $show,
                'hide'          =>  $hide,
                'style'         =>  $style,
                'events'        =>  $events
            ));
        return parent::render($id);
    } 
    
       

} // End of class 

/* End of file SHIN_Tooltip_Youtube.php */
/* Location: shinfw/libraries/SHIN_Tooltip_Youtube.php */ 