<?php

/**
 * system\application\models\filetracking_model.php
 *
 * Model Tag. (tagcloud)
 *
 */

class Examples_file_tracking_model extends SHIN_Model {

    /**
     * Physical tablename.
     */
    var $table_name = 'examples_file_tracking';

    function __construct($id=NULL)
    {
        parent::__construct($this->table_name);
		
		// PK Index definition
        $this->primary_key   = 'id';
		
		// Fields definition
		$this->insert_field(array(
			"column" => "id",
			"type"   => "integer",
			"attr"   => "auto_increment",			
		));
		
        $this->insert_field(array(
            'column' => 'file_id',
            'type'   => 'integer',
			'value'  => 0,
        ));
		
        $this->insert_field(array(
            'column' => 'count',
            'type'   => 'integer',
			'value'  => 0,
        ));
		
        $this->insert_field(array(
			'column' => 'created',
            'type'   => 'date',
            'value'  => $this->db_now_date(),
        ));
    }

    public function getNeededData($start, $end)
    {

    	$interval_array = $this->_splitinterval_by_month($start, $end);

    	$_ret = array();

		foreach($interval_array as $interval)
    	{
        	list($begin_date, $end_date) = preg_split('/,/', $interval);

			$query = SHIN_Core::$_db->query('SELECT sum(count) as summ, MONTHNAME(created) as monthname, YEAR(created) as year FROM '.$this->table_name.' WHERE DATE(created) BETWEEN '.SHIN_Core::$_db->escape($begin_date).' AND '.SHIN_Core::$_db->escape($end_date));
			$row = $query->row_array();

			if($row['summ']){
				array_push($_ret, $row);
			} else {
				$query = SHIN_Core::$_db->query('SELECT MONTHNAME('.SHIN_Core::$_db->escape($begin_date).') as monthname, YEAR('.SHIN_Core::$_db->escape($begin_date).') as year');
				$row = $query->row_array();
				$row['summ'] = 0;
				array_push($_ret, $row);
			}

			$query->free_result();
		}

		return $_ret;
    }

    function _splitinterval_by_month($start, $end)
	{
		$count_mileseconds_per_day = 86400;

		$ret = array();

		$_start_date	= preg_split('/\//', $start);
		$_end_date		= preg_split('/\//', $end);

		$start_timestamp	= mktime(0, 0, 0, $_start_date[0], $_start_date[1], $_start_date[2]);
		$end_timestamp		= mktime(0, 0, 0, $_end_date[0], $_end_date[1], $_end_date[2]);

		for($i = $start_timestamp ; $i<=$end_timestamp; $i += $delta)
		{
			$count_current_month_s_day = date("t", $i);
			$current_month = date("m", $i);
			$current_year = date("Y", $i);
			$delta = $count_mileseconds_per_day*$count_current_month_s_day+86400;

			$bp = date("Y-m-d", mktime(0, 0, 0, $current_month, 1, $current_year));
			$ep = date("Y-m-d", mktime(0, 0, 0, $current_month, $count_current_month_s_day, $current_year));
			
			array_push($ret, "$bp,$ep");
		}

		return $ret;
	}

    /**
     * Prepare SQL statement and fetch data for Datatables widget.
     *
     * @access public
     * @param:  NULL
     * @return: $ret array with prepared data
     */
    function fetchCorrectPagingData($customization_fields = NULL, $where_condition = NULL,  $return_answer_type = DB_FETCH_ANSWER_TYPE_JSON)
    {
        $array_data = parent::fetchCorrectPagingData($customization_fields, $where_condition, DB_FETCH_ANSWER_TYPE_ARRAY);
        
        foreach($array_data['data'] as &$data) {
            $data['count'] = '"<a href=javascript:void(0); onclick=loadItems(' . trim($data['id'], '"') . ')>' . trim($data['count'], '"') . '</a>"';
        }
        
        return $this->packToJSONData($array_data);
    }






} // end of class

/* End of file FileTracking_model.php */
/* Location: ./system/application/models/filetracking_model.php */