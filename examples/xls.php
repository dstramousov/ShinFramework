<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Xls.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	Microsoft Exel format demo.
 * @author		
 * @link		
 */    

    // include main fw file
    require_once("../shinfw/shinfw.php");
    // array of libs, models, helpers, core components
    $nedded_libs = array(
                            'help' => array(
                                'dump', 'url'
                            ),

                            'core' => array(
                                'SHIN_Database',
                                'SHIN_Benchmark',
                                'SHIN_Input'
                            ),
                            
                            'libs' => array(
                                array('SHIN_Templater'=>'examples'),
                                'SHIN_Xls'
                            ),
                         );
    // init fw core using needed components                     
    SHIN_Core::init($nedded_libs);  

    // if user press generate button
    $filename = 'test.xlsx';
    if (SHIN_Core::$_input->post('xls'))
    {
        //make instance of component
        $objPHPExcel = SHIN_Core::$_libs['xls'];
        $objPHPExcel->setActiveSheetIndex(0);
        
        // get data from db
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('id, tag');
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('examples_tags');
        $i=1;
        foreach ($query->result() as $row)
        {
            $tag_name = $row->tag;
            // add cell
            $objPHPExcel->set_cell_value('A'.$i, $tag_name);
            $i++;
        }
        $query->free_result();

        // set file to user
        $objPHPExcel->set_title('Xls Shinframework example');
        $objWriter = $objPHPExcel->get_writer($objPHPExcel);
        $objWriter->save($filename);

        output_file($filename, $filename);
    } else {
        // get instance of templater component
        $templater = SHIN_Core::$_libs['templater']->get_instance();
        //render main example template
        SHIN_Core::finalrender('xls');
    }
    
    function output_file($filename, $user_filename)
    {
        header('Content-type: application/ms-excel');
        header('Content-Disposition: attachment; filename="'.$user_filename.'"');
        readfile($filename);
        unlink($filename);
    }

/* End of file xls.php */
/* Location: example/xls.php */