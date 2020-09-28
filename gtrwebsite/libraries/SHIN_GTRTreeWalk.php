<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package        ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since        Version 0.2
 * @filesource   gtrwebsite/libraries/SHIN_GTRTreeWalk.php
 */


/**
 * GTR website class for get useful information about tree. 
 *
 * @package       ShinPHP framework
 * @subpackage    Library
 * @author        
 * @link          gtrwebsite/libraries/SHIN_GTRTreeWalk.php
 */

class SHIN_GTRTreeWalk 
{

    /**
    * Flag to turn on sortable methods
    * 
    * @var bool
    */
    var $_sortable =  false;


    /**
     * Constructor. Init accordion with default values from config file.
     *
     * @access public
     * @params NULL.
     * @return NULL.
     */
    public function __construct()
    {   
		Console::logSpeed('SHIN_GTRTreeWalk begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_GTRTreeWalk. Size of class: ');		        
    } // end of function 

    /**
    * Method make an ajax call and retrieve question node (with id equal to curId) and related answer nodes, in a good json format.
		Server side return a similar (proposed json): 
			{
				"type":"node", //values are "node" or "leaf"
				"nchild":"3", //Number of childs nodes (answers node)
				"node": ["id":"1", ... all node info],
				"childs": [["id":"2", ...all first child node info],[ ...all second child node info],...] //if the retieved node is aa leaf "childs" array is NULL
			}
    * 
    * @param integer $_nodeID
    * @access public
    * @return NULL
    */
    public function getNodeInfo($_nodeID)
    {
		$ret = array();
		
		// 1. check params
		if(!$_nodeID){echo '';die();}
		
        // init needed libs
        $nedded_libs = array(
							'models' => array(
								array('gtrwebsite_tree', 'gtrwebsite_tree'),
                            ));
        
        // load needed libs
        SHIN_Core::postInit($nedded_libs);
		
		
		
		echo $ret;
		die();
    } // end of function 
	
	
    /**
    * Make an ajax call and retrieve all solution informations in a good json.
    * 
    * @param bollean $sortable
    * @access public
    * @return NULL
    */
    private function _getAllChildrenInfo($_nodeID)
    {
		$ret = array();
		
		$query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_tree', array('idParent' => $_nodeID));
		foreach ($query->result_array() as $row)
		{
			array_push($ret, $row['id']);
			array_push($ret, $row['idPartent']);
		}
		$query->free_result();
		
		return $ret;
	} // end of function 

    /**
    * Make an ajax call and retrieve all solution informations in a good json.
    * 
    * @param bollean $sortable
    * @access public
    * @return NULL
    */
    public function getSolutionInfo($_solutionID)
    {
		$ret = '';
		
		echo $ret;
		die();
    } // end of function 

} // End of class 

/* End of file SHIN_Accordion.php */
/* Location: shinfw/libraries/SHIN_Accordion.php */               
