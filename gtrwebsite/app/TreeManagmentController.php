<?php

class TreeManagmentController {
   
    /**
    * tab name
    */
    protected $tabName  =   'tree';
    
    
    /**
     * 
     */
    var $_tree_info_array = array();
    
    
    
    /**
    * Make recurcevily tree
    * 
    * @access public
    * @param null
    * @return array
    */
    public function getTree()
    {
        // 1 step get root node
        $treemodel            = SHIN_Core::$_models['gtrwebsite_tree_model']->get_instance();
        
        // fetch special information
        $this->_tree_info_array = $treemodel->getSpecialRelationArray();
        
        $html = '';
        $rootNode = $treemodel->getNodeRoot();
        
        $node_name = $rootNode['idNode']. ' | ' .get_shortened($this->_tree_info_array[$rootNode['idNode']]['question_info']['description']);
        $html .= '<ul><li id="elem_'.$rootNode['idNode'].'" class="open" root="true">';
        $html .= '<a href="javascript:void(0)" id="' . $rootNode['idNode'] . '">'.$node_name.'</a><ul>';
                
        $html .= $this->getSubTree($rootNode['idNode']);
        $html .= '</ul></li></ul>';
        
        return $html;  
    }
	
    function getSubTree($_idNode)
    {
        $html = '';
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get_where('gtrwebsite_tree', array('idParent'=>$_idNode));
        foreach ($query->result_array() as $row)
        {
            $anwer_body        = $this->_tree_info_array[$row['idNode']]['answer_info']['description'];
            $question_body    = $this->_tree_info_array[$row['idNode']]['question_info']['description'];
                
            if($question_body == ''){$question_body = SHIN_Core::$_language->line('lng_label_new_node_q');}
            if($anwer_body == ''){$anwer_body = SHIN_Core::$_language->line('lng_label_new_node_a');}
                
            $node_name = $row['idNode']. ' | ' .get_shortened($anwer_body, 30) . ' | ' . get_shortened($question_body, 30);
            $html .= '<li id="elem_'.$row['idNode'].'"><a href="javascript:void(0);" id="' . $row['idNode'] . '"><ins></ins>'.$node_name.'</a>';
            
            $tmp_html = $this->getSubTree($row['idNode']);
            
            if($tmp_html == ''){
                $html .= $tmp_html.'</li>';
            } else {
                $html .= '<ul>'.$tmp_html.'</ul></li>';
            }
            
        }
        $query->free_result();
        
        return $html;        
    }
    
    
    /**
    * Show tree with "gtrwebsite_tree" -> "gtrwebsite_answers" -> "gtrwebsite_question" information.
    * 
    * @access public
    * @param null
    * @return rendered template
    * 
    */
    public function index(){
        
        // init needed libs
        $nedded_libs = array(   
                                'help'   => array('form', 'date'),
                                'libs'   => array('SHIN_Js_Tree', 'SHIN_DDMenu', 'SHIN_Dialog', 'SHIN_Upload'),
                                'models' => array(
				                                  array('gtrwebsite_answers_model', 'gtrwebsite_answers'),
                                                  array('gtrwebsite_question_model', 'gtrwebsite_question_model'),
                                                  array('gtrwebsite_solution_model', 'gtrwebsite_solution_model'),
                                                  array('gtrwebsite_tree_model', 'gtrwebsite_tree_model'),
                                                 )
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);

        $page               = SHIN_Core::$_libs['templater']->get_instance();
        
        // MAKE TREE /////////////////////////////////////////////////////////////////////////////////////
        $tree = array();
        $tree = $this->getTree();
        /////////////////////////////////////////////////////////////////////////////////////////////////
        $name_dom_id = 'gtrwebsite_tree_dom_structure';
        $page->assign(array('tree_html' => $tree));

        // test !!!!!  d&d
        SHIN_Core::$_libs['js_tree']->init(array(
                                                    'core'      => 'core',
                                                    'json_data' => 'json_data',
                                                    'plugins'   => 'plugins',
                                                    'themes'    => '{url:"' .  SHIN_Core::get_theme_url_path() . '/css/jstree/default/style.css"}',
                                                    'html_data' => '{ajax : {"url" : "' . base_url() . '/treemanagment/loadtree"}}',
                                                    'ui'        => 'ui'
                                                 ), 
                                           array('create.jstree'        => 'function(e, data) {createNode(e, data, "' . prep_url(base_url().'/treemanagment/create') . '", "' . SHIN_Core::$_language->line('lng_label_new_node') . '")}',
                                                 'select_node.jstree'   => 'function(e, data) {getQAInfo(data.args[0].id);}',
                                                 'remove.jstree'        => 'function(e, data) {removeNode(e, data, "' . prep_url(base_url().'/treemanagment/delete') . '", "' . SHIN_Core::$_language->line('lng_label_delete_root_node_prompt') . '")}',
                                                 'move_node.jstree'     => 'function(e, data) {moveNode(e, data, "' . prep_url(base_url().'/treemanagment/movenode') . '", "' . SHIN_Core::$_language->line('lng_label_node_not_double_root_node') . '")}')
                                          );
        
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['js_tree']->render($name_dom_id));		
        // add UF solution input ///////////////////////////////////////
        $answer_solution_input = SHIN_Core::$_models['gtrwebsite_solution_model']->getSolutionInput();
		//dump($answer_solution_input);
        $page->assign(array('answer_solution_custom_input'=>$answer_solution_input));
        ////////////////////////////////////////////////////////////////
        
        
        $html_tree_block = $page->setBlock('managment/tree/tree_management');
        $page->assign(array('treestructure'=>$html_tree_block));

        
        // init add dialog
        SHIN_Core::$_libs['dialog']->init(array('width' => 500));
        SHIN_Core::$_libs['dialog']->confirm_dialog('add_node_dialog', SHIN_Core::$_language->line('lng_label_add_node_title'), null, Array(SHIN_Core::$_language->line('lng_label_add_node_cancel') => 'closeAddNodeDialog', SHIN_Core::$_language->line('lng_label_add_node') => 'addNewNode'));
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['dialog']->render('add_node_dialog'));
        
        // init uploaders
        $uploaderOptions = array('fileDataName'     => '"gtrwebsite_answers_img"',
                                 'multi'            => 'false',
                                 'auto'             => 'false',
                                 'queueSizeLimit'   => 1,
                                 'script'           => "'" . prep_url(base_url().'/treemanagment/uploada') . "'",
                                 'fileExt'          => "'*.jpg;*.gif;*.png;'",
                                 'onSelect'         => 'function(event, ID, fileObj){window.answerimgselected = {selected: true,name: fileObj.name}}',
                                 'onCancel'         => 'function(){window.answerimgselected.selected = false;}');
    
        // init uploader first button                         
        SHIN_Core::$_libs['upload']->init($uploaderOptions);
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('answerImg'));
        
        $uploaderOptions = array('fileDataName'     => '"gtrwebsite_question_img"',
                                 'multi'            => 'false',
                                 'auto'             => 'false',
                                 'queueSizeLimit'   => 1,
                                 'script'           => "'" . prep_url(base_url().'/treemanagment/uploadq') . "'",
                                 'fileExt'          => "'*.jpg;*.gif;*.png;'",
                                 'onSelect'         => 'function(event, ID, fileObj){window.questionimgselected = {selected: true,name: fileObj.name}}',
                                 'onCancel'         => 'function(){window.questionimgselected.selected = false;}');
    
        // init uploader first button                         
        SHIN_Core::$_libs['upload']->init($uploaderOptions);
        SHIN_Core::$_jsmanager->addComponent(SHIN_Core::$_libs['upload']->render('questionImg'));
         
        return 'managment/tree/index.tpl';     
    } // end of function.
    
    public function loadTree(){
        
        // init needed libs
        $nedded_libs = array(   
                                'help'   => array('form', 'date'),
                                'models' => array(
                                                  array('gtrwebsite_answers_model', 'gtrwebsite_answers'),
                                                  array('gtrwebsite_question_model', 'gtrwebsite_question_model'),
                                                  array('gtrwebsite_solution_model', 'gtrwebsite_solution_model'),
                                                  array('gtrwebsite_tree_model', 'gtrwebsite_tree_model'),
                                                 )
                            );

        // load needed libs
        SHIN_Core::postInit($nedded_libs);

        echo $this->getTree(); exit();
    }
    
    
    /**
    * Get information about Answers and Question for idNode
    * 
    * @access public
    * @param null
    * @return redirect
    * 
    */
    public function getQAInformation()
    {
        // init needed libs
        $nedded_libs = array('help'   => array('form', 'validate', 'array', 'date'),
                             'models' => array(array('gtrwebsite_answers_model', 'gtrwebsite_answers_model'),
                                               array('gtrwebsite_question_model', 'gtrwebsite_question_model')));
        SHIN_Core::postInit($nedded_libs);
        
        $idNode         =  isset($_REQUEST['idNode']) ? $_REQUEST['idNode'] : null;
        
        if(!empty($idNode)) {            
            $answerInfo     =  SHIN_Core::$_models['gtrwebsite_answers_model']->getAnswerByIdNode($idNode);     $aCount = count($answerInfo); 
            $questionInfo   =  SHIN_Core::$_models['gtrwebsite_question_model']->getQuestionByIdNode($idNode);  $qCount = count($questionInfo);
        } else {
            $answerInfo     =   array(); $aCount = 0;
            $questionInfo   =   array(); $qCount = 0;
        }
        
        if(!isset($answerInfo['description'])){
            $answerInfo   =   array('description' => SHIN_Core::$_language->line('lng_label_new_node_a'));
            $aCount       =   0;
        }
        
        if(!isset($questionInfo['description'])){
        	$questionInfo =   array('description' => SHIN_Core::$_language->line('lng_label_new_node_q'));
            $qCount       =   0;
        }
        
        echo json_encode(array('answer' => array('data' => $answerInfo, 'count' => $aCount), 'question' => array('data' => $questionInfo, 'count' => $qCount))); exit();
    }
    
    /**
    * Delete 
    * 
    * @access public
    * @param idNode inetger
    * @return json answer with 'ret' = TRUE/FALSE
    */
    public function delete()
    {
        // init needed libs
        $nedded_libs = array('help'   => array('form', 'validate', 'array', 'date'),
                             'models' => array(array('gtrwebsite_tree_model', 'gtrwebsite_tree'),
                                               array('gtrwebsite_answers_model', 'gtrwebsite_answers'),
                                               array('gtrwebsite_question_model', 'gtrwebsite_question')
                                               ));
        
        SHIN_Core::postInit($nedded_libs);
        
        $idNode =  isset($_REQUEST['idNode'])   ?   $_REQUEST['idNode'] : null;
        $isRoot =  isset($_REQUEST['root'])     ?   $_REQUEST['root'] : null;
        
        if(!empty($idNode) && empty($isRoot)) {
            $status =   true;
            $id     =   SHIN_Core::$_models['gtrwebsite_tree']->delCascading($idNode);    
        } elseif($isRoot == 'true'){
            $status =   true;
            SHIN_Core::$_models['gtrwebsite_tree']->delRoot();        
        } else {
            $status =   false;
        }
        
        echo json_encode(array('status' => $status)); exit();
    }    
    
    /**
    * Create
    * 
    * @access public
    * @param parentID inetger
    * @param nameNodeName string
    * @return json answer with 'ret' = TRUE/FALSE
    */
    public function create()
    {
        
        // init needed libs
        $nedded_libs = array('help'   => array('form', 'validate', 'array', 'date'),
                             'models' => array(array('gtrwebsite_tree_model', 'gtrwebsite_tree_model')));
        
        SHIN_Core::postInit($nedded_libs);
        
        $parent =  isset($_REQUEST['parent'])   ?   $_REQUEST['parent'] : null;
        
        if(!empty($parent)) {
            $status =   true;
            $id     =   SHIN_Core::$_models['gtrwebsite_tree_model']->createNode($parent);    
        } else {
            $status =   false;
            $id     =   null;
        }
        
        echo json_encode(array('status' => $status, 'id' => $id)); exit();
    }    
    
    /**
    * Move note in to new placement.
    * 
    * @access public
    * @param idNode inetger
    * @param oldParentID inetger
    * @param newParentID inetger
    * @return json answer with 'ret' = TRUE/FALSE
    */
    public function movenode() {
        
        // init needed libs
        $nedded_libs = array('help'   => array('form', 'validate', 'array', 'date'),
                             'models' => array(array('gtrwebsite_tree_model', 'gtrwebsite_tree_model')));
        
        SHIN_Core::postInit($nedded_libs);
        
        $status =   false;
        
        $id   =   isset($_REQUEST['id'])   ? $_REQUEST['id']   : '';
        $ref  =   isset($_REQUEST['ref'])  ? $_REQUEST['ref']  : '';
        $copy =   isset($_REQUEST['copy']) ? $_REQUEST['copy'] : '';
        
        if(!empty($id) && !empty($ref) && empty($copy)) {
            $status = true; SHIN_Core::$_models['gtrwebsite_tree_model']->moveNode($id, $ref);
        } elseif(!empty($id) && !empty($ref) && !empty($copy)) {
            $status = true; SHIN_Core::$_models['gtrwebsite_tree_model']->copyNode($id, $ref);
        }
        
        echo json_encode(array('status' => $status, 'id' => $id)); exit();
    }
    
    /**
    * upload answer img file
    * 
    * @access public
    * @return null
    * @param null
    * 
    */
    public function uploadAnswerImg(){
        // init needed libs
        $nedded_libs = array('libs'   => array('SHIN_Upload'),   
                             'help'   => array('form', 'validate', 'array', 'date'),
                             'models' => array(array('gtrwebsite_answers_model', 'gtrwebsite_answers_model')));
        
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['gtrwebsite_answers_model']->uploadImg();    
    }
    
    /**
    * upload question img file
    * 
    * @access public
    * @return null
    * @param null
    * 
    */
    public function uploadQuestionImg(){
        // init needed libs
        $nedded_libs = array('libs'   => array('SHIN_Upload'),
                             'help'   => array('form', 'validate', 'array', 'date'),
                             'models' => array(array('gtrwebsite_question_model', 'gtrwebsite_question_model')));
        
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['gtrwebsite_question_model']->uploadImg();
    }
    
    /**
    * save new question info
    * 
    * @access public
    * @return json
    * @param null
    * 
    */
    public function saveQuestion(){
        
        // init needed libs
        $nedded_libs = array('libs'   => array(),
                             'help'   => array('form', 'validate', 'array', 'date'),
                             'models' => array(array('gtrwebsite_question_model', 'gtrwebsite_question_model')));
        
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['gtrwebsite_question_model']->read_form();
        SHIN_Core::$_models['gtrwebsite_question_model']->save();
        
        echo json_encode(array('result'  => true, 'errors'  => null)); exit();    
    }
    
    /**
    * save new answer info
    * 
    * @access public
    * @return json
    * @param null
    * 
    */
    public function saveAnswer(){
        
        // init needed libs
        $nedded_libs = array('libs'   => array(),
                             'help'   => array('form', 'validate', 'array', 'date'),
                             'models' => array(array('gtrwebsite_answers_model', 'gtrwebsite_answers_model')));
        
        SHIN_Core::postInit($nedded_libs);
        
        SHIN_Core::$_models['gtrwebsite_answers_model']->read_form();
        SHIN_Core::$_models['gtrwebsite_answers_model']->save();
        
        echo json_encode(array('result'  => true, 'errors'  => null)); exit();    
    }
    
    /**
    * validate answer information
    * 
    * @access public
    * @param null
    * @return json
    * 
    */
    public function validateAnswer(){
        
        // init needed libs
        $nedded_libs = array('help'   => array('form', 'validate', 'array', 'date'),
                             'models' => array(array('gtrwebsite_answers_model', 'gtrwebsite_answers_model')));
        SHIN_Core::postInit($nedded_libs);
        
                  SHIN_Core::$_models['gtrwebsite_answers_model']->read_form();
        $result = SHIN_Core::$_models['gtrwebsite_answers_model']->validate_form();
        
        if(empty($result)) {
            echo json_encode(array('result'  => true,
                                   'errors'  => null));    
        } else {
            echo json_encode(array('result'  => false,
                                   'errors'  => $result));    
        }
        exit();    
    }
    
    /**
    * validate question information
    * 
    * @access public
    * @param null
    * @return json
    * 
    */
    public function validateQuestion(){
        
        // init needed libs
        $nedded_libs = array('help'   => array('form', 'validate', 'array', 'date'),
                             'models' => array(array('gtrwebsite_question_model', 'gtrwebsite_question_model')));
        SHIN_Core::postInit($nedded_libs);
        
                  SHIN_Core::$_models['gtrwebsite_question_model']->read_form();
        $result = SHIN_Core::$_models['gtrwebsite_question_model']->validate_form();
        
        if(empty($result)) {
            echo json_encode(array('result'  => true,
                                   'errors'  => null));    
        } else {
            echo json_encode(array('result'  => false,
                                   'errors'  => $result));    
        }
        exit();    
    }
} // end of class

/* End of file TreeManagmentController.php */
?>
