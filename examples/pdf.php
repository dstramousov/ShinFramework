<?php

/**
 * ShinPHP Demo part
 *
 * This demo show how work with PDF.
 *
 * @package		ShinPHP framework
 * @subpackage	Example
 * @category	PDF generation demo.
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
                                'SHIN_Pdf'
                            ),
                         );
    // init fw core using needed components                     
    SHIN_Core::init($nedded_libs);                   


    // if user press to the Get PDF button
    if (SHIN_Core::$_input->post('pdf'))
    {
        // get instance of component
        $pdf = SHIN_Core::$_libs['pdf'];
        // add new page
        $pdf->AddPage();
        
        // get data from DB
        SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->select('id, tag');
        $query = SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->get('examples_tags');
        foreach ($query->result() as $row)
        {
            $tag_name = $row->tag;
            $pdf->Cell(0, 12, $tag_name, 1, 1, 'C');
        }
        $query->free_result();
        // generate PDF and open in browser
        $pdf->Output('shin_pdf.pdf', 'I');
        
    } else {
        // get instance of templater component
        $templater = SHIN_Core::$_libs['templater']->get_instance();
        //render main example template
        SHIN_Core::finalrender('pdf');
    }

/* End of file pdf.php */
/* Location: example/pdf.php */