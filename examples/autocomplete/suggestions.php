<?php
/**
 * ShinPHP Demo part
 *
 * This demo show how work with Charts.
 *
 * @package        ShinPHP framework
 * @subpackage    Example
 * @category    Charts
 * @author        
 * @link        
 */
    
    require_once("../../shinfw/shinfw.php");
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url'
                            ),

                            'core' => array(
                                'SHIN_Log',    
                                'SHIN_Benchmark',
                                'SHIN_Database'
                            ),
                        
                            'libs' => array(
                            ),
                         );


    SHIN_Core::init($nedded_libs);

    $begin_string = $_GET['term'];
    $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->query('SELECT tag FROM examples_tags WHERE tag LIKE "%'.strtolower($begin_string).'%"');
    $rows = $query->result_array();
    $query->free_result();
    
    $res = array();
    foreach ($rows as $row)
    {
        $res[] = $row['tag'];
    }
    
    echo (json_encode($res));
    

    
    

/* End of file charts.php */
/* Location: example/charts.php */
