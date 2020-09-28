<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with Word.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	Microsoft Word format demo.
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
                                'SHIN_Word'
                            ),
                         );
    
    // init fw core using needed components
    SHIN_Core::init($nedded_libs);  

    // if user press generate button
    $filename = 'BasicTable';
    if (SHIN_Core::$_input->post('word'))
    {
        
        //make instance of component
        $PHPWord = new PHPWord();
        $section = $PHPWord->createSection();
        
        // create table
        $table = $section->addTable();
        
        // get data from db
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('id, tag');
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('examples_tags');
        $i=1;
        foreach ($query->result() as $row)
        {   
            $tag_name = $row->tag;
            $table->addRow();
            // add ceel
            $table->addCell(1750)->addText("Row $i, Cell $tag_name");
            $i++;
        }
        $query->free_result();

        // send generated file to user
        $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save($filename);

        header('Content-type: application/msword');
        header('Content-Disposition: attachment; filename="example.docx"');
        readfile($filename);
        unlink($filename);
    } else {
        // get templater component instance
        $templater = SHIN_Core::$_libs['templater']->get_instance();
        //render main example template
        SHIN_Core::finalrender('word');
    }

/* End of file word.php */
/* Location: example/word.php */