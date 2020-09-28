<?php

class Gtrwebsite_Solutionitem_model extends SHIN_MPKModel {

    /**                                                                 
     * Physical tablename.
     */
    var $table_name = 'gtrwebsite_solutionitem';

    function __construct()
    {
        parent::__construct($this->table_name);
        
        // PK Index definition
        $this->primary_key   = array('idSolution', 'idItem');
        
        // Fields definition
        $this->insert_field(array(
            "column"    => "idSolution",
            "type"      => "integer",
            "null"      => 0,
            'validate'  => 'validate_idsolution',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'gtrwebsite_solution',
                'column' => 'idSolution',
            ),
            'input'  => array(
                'type'          => 'select',
                'from'          => 'gtrwebsite_solution',
                'data'          => 'idSolution',
                'caption'       => 'description',
                'nonset_id'     => '',
                'nonset_name'   => '',
            ),
        ));
        
        $this->insert_field(array(
            'table'     => 'gtrwebsite_solution',
            'type'      => 'varchar',
            'column'    => 'description',
            'null'      => 0,
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            "column"    => "idItem",
            "type"      => "integer",
            "null"      => 0,
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'gtrwebsite_items',
                'column' => 'idItem',
            ),
            'validate'  => 'validate_iditem',
            'input'  => array(
                'type'          => 'select',
                'from'          => 'gtrwebsite_items',
                'data'          => 'idItem',
                'caption'       => 'description',
                'nonset_id'     => '',
                'nonset_name'   => '',
            ),
        ));
        
        $this->insert_field(array(
            'table'     => 'gtrwebsite_items',
            'type'      => 'varchar',
            'column'    => 'description',
            'null'      => 0,
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            'table'     => 'gtrwebsite_items',
            'type'      => 'varchar',
            'column'    => 'title',
            'null'      => 0,
            'virtual'   => TRUE,
        ));
        
        $this->insert_field(array(
            'column' => 'userIns',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
                'as'     => 'sys_user_ins'
            ),
            'null'  => 1
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user_ins',
            'type'      => 'varchar',
            'column'    => 'name',
            'null'      => 0,
            'virtual'   => TRUE,
        ));

        $this->insert_field(array(
            'column'	=> 'dataIns',
            'type'		=> 'datetime',
			'value'		=> $this->db_now_datetime(),
            'null'		=> 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_solutionitem_datains',
        ));

        $this->insert_field(array(
            'column' => 'userMod',
            'type'   => 'integer',
            'join'   => array(
                'mode'   => 'left',
                'table'  => 'sys_user',
                'column' => 'idUser',
                'as'     => 'sys_user_mod'
            ),
            'null'  =>  1
            
        ));
        
        $this->insert_field(array(
            'table'     => 'sys_user_mod',
            'type'      => 'varchar',
            'column'    => 'name',
            'null'      => 0,
            'virtual'   => TRUE,
        ));

        $this->insert_field(array(
            'column'	=> 'dataMod',
            'type'		=> 'timestamp',
			'value'		=> $this->db_now_datetime(),
            'null'		=> 1,
            'info_field_ico'	=> 'images/help.png',
            'info_field_txt'	=> 'lang_label_gtrwebsite_solutionitem_datamod',
        ));
    }
    
    /**
    * validare idSolution
    * 
    * @param string $data
    * @access public
    * @return array
    */
    function validate_idsolution($data){
        
       if(empty($this->idSolution)) {
            return array('result' => false, 'value' => 'lng_label_solutionitems_id_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_solutionitems_id_unique_validation');
       } 
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validare idItem
    * 
    * @param int $data
    * @access public
    * @return array
    */
    function validate_iditem($data){
        
       if(empty($this->idItem)) {
            return array('result' => false, 'value' => 'lng_label_solutionitems_idtem_empty_validation');    
       }
       
       if(!$this->_checkMultiPK()) {
           return array('result' => false, 'value' => 'lng_label_solutionitems_idtem_unique_validation');
       } 
       
       return array('result' => true, 'value' => '');    
    }
    
    /**
    * validate idSolution and idItem as single PK
    * 
    * @param null
    * @access private
    * @return boolean
    * 
    */
    function _checkMultiPK(){
        
        if((!isset($this->idSolutionOld) && !isset($this->idItemOld)) || 
          ($this->idSolution != $this->idSolutionOld || $this->idItemOld != $this->idItem)) {
           
            SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('COUNT(*) as count');
                        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->from($this->table_name);
                        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idSolution', $this->idSolution);
                        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->where('idItem ',    $this->idItem);
           $query     = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get();
           $result    = $query->row(0, 'array');
           
           if($result['count'] > 0) {
               return false;
           }
        }
        
        return true;
    } 
        
        
    /**
    * Call Validation
    *
    * @access public
    * @param $fields needed fields for validation. By default - all with properties [validate].
    * @return $h hash.
    * @sa SHIN_Model::validate_form()
     */
    function validate_form($fields_to_validate = null)
    {
        $h = parent::validate_form($fields_to_validate);

        return $h;
    }

    /**
    * Prepare html for edit/add current object information.
    *
    * @access public
    * @param $fields needed fields for write to template. By default - ALL.
    * @return $h hash.
    * @sa SHIN_Model::write_form()
     */
    function write_form($fields_to_write = null, $mode=WRITE_NORMAL)
    {
        $h = parent::write_form($fields_to_write, $mode);
        
        $solutionList                   = SHIN_Core::$_models['gtrwebsite_solution_model']->getSolutionListForDD();
        $gtrwebsite_solution_idSolution = '<select id="gtrwebsite_solutionitem_idSolution" name="gtrwebsite_solutionitem_idSolution"><option value=""></option>';
        
        if(isset($this->idSolution) && isset($this->idItem) && !empty($this->idSolution) && !empty($this->idItem)) {
            foreach($solutionList as $key => $value) {
                if($this->idSolution == $key) {
                    $gtrwebsite_solution_idSolution  .=  '<option value="' . $key . '" selected="selected">' . $value . '</option>';    
                } else {
                    $gtrwebsite_solution_idSolution  .=  '<option value="' . $key . '">' . $value . '</option>';    
                }    
            }    
        } else {
            $currentCat = SHIN_Core::$_libs['session']->userdata('idSolution');
            foreach($solutionList as $key => $value) {
                if($currentCat == $key) {
                    $gtrwebsite_solution_idSolution  .=  '<option value="' . $key . '" selected="selected">' . $value . '</option>';    
                } else {
                    $gtrwebsite_solution_idSolution  .=  '<option value="' . $key . '">' . $value . '</option>';    
                }    
            }    
        }
        
        $gtrwebsite_solution_idSolution .= '</select>';
        $h[$this->table_name . '_idSolution_input'] =    $gtrwebsite_solution_idSolution;
        
        // create custom grouped DD for id Item
        $h[$this->table_name . '_idItem_input'] =   '<select id="' . $this->table_name . '_idItem" name="' . $this->table_name . '_idItem"><option value=""></option>';
        $categoryList   =   SHIN_Core::$_models['gtrwebsite_itemscategory_model']->getCategoryListForDD();
        foreach($categoryList as $categoryId => $category) {
            $h[$this->table_name . '_idItem_input'] .=   '<optgroup label="' . $category . '">';
            $h[$this->table_name . '_idItem_input'] .=   SHIN_Core::$_models['gtrwebsite_items_model']->getItemListByCategoryId($categoryId, isset($this->idItem) ? $this->idItem : null);
            $h[$this->table_name . '_idItem_input'] .=   '</optgroup>';    
        }
        $h[$this->table_name . '_idItem_input'].=   '</select>'; 
        return $h;
    }

    /**
    * Read given fields from CGI query.
    *
    * @access public
    * @param $fields needed fields for reading from form. 
    * @return NULL
    * @sa SHIN_Model::read_form()
     */
    function read_form($fields_to_read = null)
    {
        $h = parent::read_form($fields_to_read);

        return $h;
    }
    
    /**
    * Save given fields from CGI query.
    *
    * @access public
    * @param $fields needed fields for saving from form. 
    * @return NULL
    * @sa SHIN_Model::save()
     */
    function save($fields_to_save = null) {
        
        $fields_to_save = array('idSolution', 'idItem');
        
        if($this->isDefinite()) {
        
            $this->dataMod  =   $this->db_now_datetime();
            $this->userMod  =   SHIN_Core::$_libs['auth']->user->idUser;
        
            $fields_to_save = array_merge($fields_to_save , array('userMod', 'dataMod'));
            
        } else {
            $this->dataIns  =   $this->db_now_datetime();    
            $this->userIns  =   SHIN_Core::$_libs['auth']->user->idUser;    
        
            $fields_to_save = array_merge($fields_to_save , array('dataIns', 'userIns'));
        }
        
        $h = parent::save($fields_to_save);
        
        return $h;    
    }
    
    /**
    * get table list
    * 
    * @access public
    * @param null
    * @return array
    * 
    */
    function getTableList($params = null)
    {
        $resultObj = $this->get_expanded_result($params);
       
        return $resultObj->result_array();
    }
} // end of class

/* End of file Gtrwebsite_Solutionitem_model.php */