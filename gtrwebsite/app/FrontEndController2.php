<?php

require "CommonController.php";

class FrontEndController2 extends CommonController {
    
    function __construct()
    {
        parent::__construct();

        if(isset(SHIN_Core::$_libs['seo']))
        {
	        SHIN_Core::$_libs['seo']->addToTitle(SHIN_Core::$_language->line('lang_label_gtrwebsite_frontend_title'));
	        SHIN_Core::$_libs['seo']->addToTitle(SHIN_Core::$_language->line('lang_label_gtrwebsite_frontend_mainpage'));
	    }
    }

    public function index()
    {        
        return 'web/index2.tpl';
    }
    
    function getpartners($count = null)
    {
        // init needed libs
        $nedded_libs = array(
                            'models' => array(
                                array('gtrwebsite_base_model', null, CT_BASE_CLASS),
                                array('gtrwebsite_partners_model', 'gtrwebsite_partners'),
                            ));
        SHIN_Core::postInit($nedded_libs);
        
    	if(isset($_REQUEST['count'])){
    		$display_count_record = $_REQUEST['count'];
		} else {
	        $display_count_record = 3;
	    }
        $partners_arr = array();
        
        $partner_model = SHIN_Core::$_models['gtrwebsite_partners']->get_instance();
        $partners_arr = $partner_model->getLastRec($display_count_record);
        
        $partner_block = array();
        foreach($partners_arr as $item)
        {
            
            $html_img = '';
            if($item['img']){
                 $item['thumb'] = SHIN_Core::$_config['core']['app_base_url'].'/'.str_replace('\\','/', SHIN_Core::$_config['store']['partners_images']).'/'.SHIN_Core::$_config['store']['fr_thumbnails_prefix'].$item['img'];
                 $item['img']   = SHIN_Core::$_config['core']['app_base_url'].'/'.str_replace('\\','/', SHIN_Core::$_config['store']['partners_images']).'/'.$item['img'];
            }
            array_push($partner_block, $item);
            
        }
        
        echo $_REQUEST['callback'] . '(' . json_encode(array('data' => $partner_block)) . ')'; exit;
    }
    
    function getnews($count = NULL)
    {   
    	if(isset($_REQUEST['count'])){
    		$display_count_record = $_REQUEST['count'];
		} else {
	        $display_count_record = 3;
	    }
        
        if(isset($_REQUEST['type']) && in_array($_REQUEST['type'], array('news', 'promo'))) {
            $display_record_type  = '"' . $_REQUEST['type'] . '"';        
        } else {
            $display_record_type  = '"news","promo"';      
        }
        
        // init needed libs
        $nedded_libs = array(
                            'models' => array(
                                array('gtrwebsite_base_model', null, CT_BASE_CLASS),
                                array('gtrwebsite_news_model', 'gtrwebsite_news'),
                            ));
        SHIN_Core::postInit($nedded_libs);
        
        $news_model = SHIN_Core::$_models['gtrwebsite_news']->get_instance();

        $now = $news_model->db_now_date();
        $q = $news_model->get_expanded_result(array(
                'order_by'    => 'dataIns DESC',
                'where'        => $news_model->class_name.'.newsType IN(' . $display_record_type . ') AND ' . $news_model->class_name.'.status='.CT_SHOW.' AND '.$news_model->class_name.'.dataStart<='.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($now) .' AND '. $news_model->class_name.'.dataStop>='.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($now),
                "limit"        => $display_count_record,
            ));
            
        $news_block = array();
        foreach ($q->result_array() as $item)
        {
            if($item['img']){
                $item['thumb'] = SHIN_Core::$_config['core']['app_base_url'].'/'.str_replace('\\','/', SHIN_Core::$_config['store']['news_images']).'/'.SHIN_Core::$_config['store']['fr_thumbnails_prefix'].$item['img'];
                $item['img']   = SHIN_Core::$_config['core']['app_base_url'].'/'.str_replace('\\','/', SHIN_Core::$_config['store']['news_images']).'/'.$item['img'];
            }
            array_push($news_block, $item);
        }
        $q->free_result();
        
        echo $_REQUEST['callback'] . '(' . json_encode(array('data' => $news_block)) . ')'; exit;
    }
    
    function click(){
        
        // init needed libs
        $nedded_libs = array(
                            'models' => array(
                                array('gtrwebsite_base_model', null, CT_BASE_CLASS),
                                array('gtrwebsite_news_model', 'gtrwebsite_news_model'),
                                array('gtrwebsite_partners_model', 'gtrwebsite_partners_model'),
                            ));
        SHIN_Core::postInit($nedded_libs);
        
        $itemId =   isset($_REQUEST['id'])      ? $_REQUEST['id']   : null;
        $type   =   isset($_REQUEST['type'])    ? $_REQUEST['type'] : null;
        
        if(!empty($itemId) && in_array($type, array('news', 'partner'))) {
            if($type == 'news') {
                SHIN_Core::$_models['gtrwebsite_news_model']->updateClicks($itemId);    
            } else {
                SHIN_Core::$_models['gtrwebsite_partners_model']->updateClicks($itemId);    
            }    
        }
        
        exit();
    }
        
} //end of class 

/* End of file FrontEndController.php */
/* Location: ./gtrwebsite/app/FrontEndController.php */               
