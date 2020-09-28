<?php if (!defined('BASEPATH')) exit('Base path is not defined');
/**
 * @package			ShinPHP framework
 * @author        
 * @copyright    
 * @license        
 * @link        
 * @since			Version 0.1
 * @filesource		shinfw/libraries/SHIN_SelectQuery.php
 */


/**
 * ShinPHP framework accordion library
 *
 * @package			ShinPHP framework
 * @subpackage		Library
 * @author        
 * @link			shinfw/libraries/SHIN_SelectQuery.php
 */


class SHIN_SelectQuery {

    var $select;
    var $from;
    var $where;
    var $group_by;
    var $order_by;
    var $limit;

    var $sub_queries;


    /**
     * Constructor.
     *
     * @access public
     * @input:  $q array with needed values
     * @output: NULL
     */
    function __construct($q)
	{
        $this->select   = isset($q['select'  ]) ? $q['select'  ] : '*';
        $this->from     = isset($q['from'    ]) ? $q['from'    ] : '' ;
        $this->where    = isset($q['where'   ]) ? $q['where'   ] : '1=1';
        $this->group_by = isset($q['group_by']) ? $q['group_by'] : '' ;
        $this->having   = isset($q['having'])   ? $q['having']   : '' ;
        $this->order_by = isset($q['order_by']) ? $q['order_by'] : '' ;
        $this->limit    = isset($q['limit'   ]) ? $q['limit'   ] : '' ;

        $this->sub_queries = array();

		Console::logSpeed('SHIN_SelectQuery begin work, Time taken to get to line: '.__FILE__.'::'.__LINE__);
		Console::logMemory($this, 'SHIN_SelectQuery. Size of class: ');
    }


    /**
     * Add new sub-query (creating temporary table with given name).
     * The query is based on given SELECT, FROM and GROUP BY clauses,
     * merged with FROM and WHERE clauses of the main query.
     * (Really, FROM in merged, while ORDER BY and LIMIT is ignored.)
     *
     * @access public
     * @input:  $t_name string Temporary name, $q array with needed values
     * @output: NULL
     */
    function add_sub_query($t_name, $q)
	{
        $str =
            "create temporary table $t_name " .
            '  (primary key(id)) ' .
            "select    $q[select]   " .
            "    from  $this->from  " . $q['from'] .
            "    where $this->where " .
            ($q['group_by'] ? " group by $q[group_by]": '') .
            ($this->limit   ? " limit    $this->limit": '');

        $this->sub_queries[$t_name] = $str;
    }


    /**
     * Return complete query string assembled from clauses.
     *
     * @access public
     * @input:  NULL
     * @output: string 
     */
    function str()
	{
        return
            "SELECT $this->select" .
            " FROM $this->from  " .
            " WHERE $this->where " .
            ($this->group_by ? " GROUP BY $this->group_by": '') .
            ($this->having   ? " HAVING $this->having"    : '') .
            ($this->order_by ? " ORDER BY $this->order_by": '') .
            ($this->limit    ? " LIMIT $this->limit": '');			
    }


    /**
     * Add more statements to the clauses using given array.
     *
     * @access public
     * @input:  NULL
     * @output: string 
     */
    function expand($q)
	{
        $this->select .= isset($q['select'  ]) ? " , $q[select] " : '';
        $this->from   .= isset($q['from'    ]) ? " $q[from] " : '';
        $this->where  .= isset($q['where'   ]) ? " AND $q[where] " : '';
        $this->limit  .= isset($q['limit'   ]) ? " $q[limit] "  : '';

        $qwote = empty($this->order_by) ? '' : ', ';
        $this->order_by .= isset($q['order_by']) ? $qwote." $q[order_by]" : '';

        $qwote = empty($this->group_by) ? '' : ', ';
        $this->group_by .= isset($q['group_by']) ? $qwote." $q[group_by]" : '';

        $qwote = empty($this->having) ? '' : ' and ';
        $this->having .= isset($q['having']) ? $qwote."$q[having]" : '';
    }
}

// END SHIN_SelectQuery Class

/* End of file SHIN_SelectQuery.php */
/* Location: ./shinfw/libraries/SHIN_SelectQuery.php */