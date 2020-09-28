<?php

require "CommonController.php";

class SFController2 extends CommonController {
    
    /**
    * Constructor for this class.
    * 
    * @access public
    * @param
    * @return NULL
    */
    function __construct()
    {
        parent::__construct();

        //SHIN_Core::$_libs['seo']->addToTitle(SHIN_Core::$_language->line('lang_label_gtrwebsite_sf_title'));
        //SHIN_Core::$_libs['seo']->addToTitle(SHIN_Core::$_language->line('lang_label_gtrwebsite_sf_mainpage'));
    }

    /**
    * Index method for solution finder controller. Print first Question and this is all.
    * 
    * @access public
    * @param
    * @return rendered template
    */
    public function index()
    {    
        $nedded_libs = array(
                            'models' => array(
                                array('gtrwebsite_tree_model', 'gtrwebsite_tree'),
                            ));
        SHIN_Core::postInit($nedded_libs);
        
        return 'solutionfinder2/index.tpl';
    }
    
    public function getr() {
        
        $nedded_libs = array(
                            'models' => array(
                                array('gtrwebsite_tree_model', 'gtrwebsite_tree'),
                            ));
        SHIN_Core::postInit($nedded_libs);
        
        // fetch root node and display it.
        $rootNode = SHIN_Core::$_models['gtrwebsite_tree']->getNodeRoot();
        
        // fetch Q and A for this node 
        $data = $this->_getTreeObject($rootNode['idNode']);
        echo $_REQUEST['callback'] . '(' . json_encode($data) . ')'; exit();
    }
    
    /**
    * action for get solution list
    * 
    * @access public
    * @return json
    * @param null
    * 
    */
    public function gets(){
        
        $nedded_libs = array(
                            'models' => array(
                                array('gtrwebsite_answers_model', 'gtrwebsite_news'),
                                array('gtrwebsite_question_model', 'gtrwebsite_question'),
                                array('gtrwebsite_tree_model', 'gtrwebsite_tree'),
                            ));
        SHIN_Core::postInit($nedded_libs);
        
        $page = SHIN_Core::$_libs['templater']->get_instance();
        
//       	if(!SHIN_Core::$_input->post('idSolution')){echo '';die();}
        // 1. get solution list
        $data   = $this->_getSolutionInormation(SHIN_Core::$_input->globalarr('idSolution'));
        if(!empty($data['items'])) {
            foreach($data['items'] as &$sa) {
                $sa['thumb'] = SHIN_Core::$_config['core']['app_base_url'] . '/' . str_replace('\\','/', SHIN_Core::$_config['store']['items_images']) . '/' . SHIN_Core::$_config['store']['thumbnails_prefix'] . $sa['img'];
                $sa['img']   = SHIN_Core::$_config['core']['app_base_url'] . '/' . str_replace('\\','/', SHIN_Core::$_config['store']['items_images']) . '/' . $sa['img'];
            }
        }
        $data['solution']['thumb']    =   SHIN_Core::$_config['core']['app_base_url'] . '/' . str_replace('\\','/', SHIN_Core::$_config['store']['solutions_images']) . '/' . SHIN_Core::$_config['store']['thumbnails_prefix'] . $data['solution']['img'];
        $data['solution']['img']      =   SHIN_Core::$_config['core']['app_base_url'] . '/' . str_replace('\\','/', SHIN_Core::$_config['store']['solutions_images']) . '/' . $data['solution']['img'];
//        dump($data);
        
        // 2. get parent information for navigation
        $parent      = SHIN_Core::$_models['gtrwebsite_tree']->getParentIdforCurrentLevel(SHIN_Core::$_input->globalarr('idNode'));

      
        echo $_REQUEST['callback'] . '(' . json_encode(array('data' => $data, 'parent' => $parent['idNode'])) . ')'; exit();
    }
    
    /**
    * action for each get children step
    * 
    * @access public
    * @return json
    * @param null
    * 
    */
    public function getc(){
        
        $nedded_libs = array(
                            'models' => array(
                                array('gtrwebsite_answers_model', 'gtrwebsite_news'),
                                array('gtrwebsite_question_model', 'gtrwebsite_question'),
                                array('gtrwebsite_tree_model', 'gtrwebsite_tree'),
                            ));
        SHIN_Core::postInit($nedded_libs);
        
        // 1. get object data
        $data = $this->_getTreeObject(SHIN_Core::$_input->globalarr('idParent'));
        
        // 2. get parent information for navigation
        $parent      = SHIN_Core::$_models['gtrwebsite_tree']->getParentIdforCurrentLevel(SHIN_Core::$_input->globalarr('idParent'));
      
        echo $_REQUEST['callback'] . '(' . json_encode(array('data' => $data, 'parent' => $parent['idNode'])) . ')'; exit();
    }
    
    /**
    * action for each previous step
    * 
    * @access public
    * @return json
    * @param null
    * 
    */
    public function getp(){
        
        $nedded_libs = array(
                            'models' => array(
                                array('gtrwebsite_answers_model', 'gtrwebsite_news'),
                                array('gtrwebsite_question_model', 'gtrwebsite_question'),
                                array('gtrwebsite_tree_model', 'gtrwebsite_tree'),
                            ));
        SHIN_Core::postInit($nedded_libs);
        
        // 1. get object data
        $data = $this->_getTreeObject(SHIN_Core::$_input->globalarr('idNode'));
        
        // 2. get parent information for navigation
        $parent      = SHIN_Core::$_models['gtrwebsite_tree']->getParentIdforCurrentLevel(SHIN_Core::$_input->globalarr('idNode'));
      
        echo $_REQUEST['callback'] . '(' . json_encode(array('data' => $data, 'parent' => $parent['idNode'])). ')'; exit();
    }
    
    /**
    * get array of data
    * 
    * @param mixed $idNode
    * @access protected
    * @return html
    */
    private function _getTreeObject($idParent) {
        
        // 1. get question list 
       $questionsList   = $this->_getAllQusetionsByNodeID($idParent);
       $data            = array();
       
       // when question list is empty - this is leaf and we need to get all answers
       if(!empty($questionsList)) {
           foreach($questionsList as &$q) {
               // 2. get childrens of parent node
               $childrenList    = SHIN_Core::$_models['gtrwebsite_tree']->getChildrenforCurrentLevel($q['idNode']);
               foreach($childrenList as $c) {
                   $answers         =   $this->_getAllAnswersByNodeID($c['idNode']);
                   if(!empty($answers)) {
                       // fetch all answer for current question
                       foreach($answers as &$a) {
                            $a['thumb']    =   SHIN_Core::$_config['core']['app_base_url'] . '/' . str_replace('\\','/', SHIN_Core::$_config['store']['answers_images']) . '/' . SHIN_Core::$_config['store']['thumbnails_prefix'] . $a['img'];
                            $a['img']      =   SHIN_Core::$_config['core']['app_base_url'] . '/' . str_replace('\\','/', SHIN_Core::$_config['store']['answers_images']) . '/' . $a['img'];
                       }
                       $q['answers'][]  =   $a;
                   }
               }
               
               $q['thumb']  =   SHIN_Core::$_config['core']['app_base_url'] . '/' . str_replace('\\','/', SHIN_Core::$_config['store']['questions_images']) . '/' . SHIN_Core::$_config['store']['thumbnails_prefix'] . $q['img'];
               $q['img']    =   SHIN_Core::$_config['core']['app_base_url'] . '/' . str_replace('\\','/', SHIN_Core::$_config['store']['questions_images']) . '/' . $q['img'];
           }
           
           $data['question']    =   $questionsList;
       } else {
           
           $answersList         =   $this->_getAllAnswersByNodeID($idParent);
           // fetch all answer for current question
           foreach($answersList as &$a) {
                $a['thumb']    =   SHIN_Core::$_config['core']['app_base_url'] . '/' . str_replace('\\','/', SHIN_Core::$_config['store']['answers_images']) . '/' . SHIN_Core::$_config['store']['thumbnails_prefix'] . $a['img'];
                $a['img']      =   SHIN_Core::$_config['core']['app_base_url'] . '/' . str_replace('\\','/', SHIN_Core::$_config['store']['answers_images']) . '/' . $a['img'];
           }
           $data['answer']    =   $answersList;    
       }
       
       return $data;
    }
    
    /**
    * Get all question for some node.
    * 
    * @access protected
    * @param idNode integer -> requested node id.
    * @return $_ret array with all question or empty array: 
    */
    private function _getAllQusetionsByNodeID($idNode)
    {        
        $_ret = array();
        
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_question', array('idNode' => $idNode));
        foreach ($query->result_array() as $row)
        {
            array_push($_ret, $row);
        }
        $query->free_result();
        
        return $_ret;
    }
    
    /**
    * Get all answers for some node.
    * 
    * @access protected
    * @param idNode integer -> requested node id.
    * @return $_ret array with all answers or empty array: 
    */
    private function _getAllAnswersByNodeID($idNode)
    {        
        $_ret = array();
        
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_answers', array('idNode' => $idNode));
        foreach ($query->result_array() as $row)
        {
            array_push($_ret, $row);
        }
        $query->free_result();
        
        return $_ret;
    }
    
    /**
    * Get combined information about solution.
    * 
    * @access protected
    * @param idNode integer -> requested solution id.
    * @return $_ret array with all information: 
    */
    private function _getSolutionInormation($idSolution)
    {        
        $_ret = array('solution'=>NULL, 'items'=>NULL);
        
        // fetch solution info 
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_solution', array('idSolution' => $idSolution));
        foreach ($query->result_array() as $row)
        {
            $_ret['solution'] = $row;
        }
        $query->free_result();
        
        // fetch all iditems
        $__tmp_arr = array();
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_solutionitem', array('idSolution' => $idSolution));
        foreach ($query->result_array() as $row)
        {
            array_push($__tmp_arr, $row['idItem']);
        }
        $query->free_result();
        
        // fetch all items information
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where_in('idItem', $__tmp_arr);
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('gtrwebsite_items');
        
        foreach ($query->result_array() as $row)
        {
            $_ret['items'][] = $row;
        }
        
        $query->free_result();

        return $_ret;
    }
    
    function click(){
        
        // init needed libs
        $nedded_libs = array(
                            'models' => array(
                                array('gtrwebsite_answers_model', 'gtrwebsite_answers_model'),
                                array('gtrwebsite_items_model', 'gtrwebsite_items_model')
                            ));
        SHIN_Core::postInit($nedded_libs);
        
        $itemId =   isset($_REQUEST['id'])      ? $_REQUEST['id']   : null;
        $type   =   isset($_REQUEST['type'])    ? $_REQUEST['type'] : null;
        
        if(!empty($itemId) && in_array($type, array('answer', 'items'))) {
            if($type == 'answer') {
                SHIN_Core::$_models['gtrwebsite_answers_model']->updateClicks($itemId);    
            } else {
                SHIN_Core::$_models['gtrwebsite_items_model']->updateClicks($itemId);    
            }    
        }
        
        exit();
    }
    
    
} //end of class 

/* End of file SFController.php */
/* Location: ./gtrwebsite/app/SFController.php */               