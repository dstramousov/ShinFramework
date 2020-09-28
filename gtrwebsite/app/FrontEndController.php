<?php

require "CommonController.php";

class FrontEndController extends CommonController {
    
    function __construct()
    {
        parent::__construct();

        if(isset(SHIN_Core::$_libs['seo'])){
	        SHIN_Core::$_libs['seo']->addToTitle(SHIN_Core::$_language->line('lang_label_gtrwebsite_frontend_title'));
	        SHIN_Core::$_libs['seo']->addToTitle(SHIN_Core::$_language->line('lang_label_gtrwebsite_frontend_mainpage'));
	    }

		SHIN_Core::$_config['core']['index_page'] = 'web.php';
    }

    public function index()
    {        
        return 'web/index.tpl';
    }
    
    function getpartners()
    {   
    	if(isset($_REQUEST['count'])){
    		$display_count_record = $_REQUEST['count'];
		} else {
	        $display_count_record = 4;
	    }
        
        // init needed libs
        $nedded_libs = array(
                            'models' => array(
                                array('gtrwebsite_base_model', null, CT_BASE_CLASS),
                                array('gtrwebsite_partners_model', 'gtrwebsite_partners'),
                            ));
        SHIN_Core::postInit($nedded_libs);
        
        $page = SHIN_Core::$_libs['templater']->get_instance();
        
        // step 1. prepare and display PARTNERS information.
        $partners_arr = array();
        
        $partner_model = SHIN_Core::$_models['gtrwebsite_partners']->get_instance();
        $partners_arr = $partner_model->getLastRec($display_count_record);
        
        $html_partner_block = '';
        foreach($partners_arr as $item)
        {
            $page->assign(array('partner_id'              => $item['idPartner']));
            $page->assign(array('partner_description'     => $item['description']));
            $page->assign(array('partner_type'            => $item['partnerType']));
            $page->assign(array('partner_name'            => $item['name']));
            $page->assign(array('partner_link'            => '<a target="_blank" href="'.$item['link'].'">'.$item['link'].'</a>'));
            
            $html_img = '';
            if($item['img']){
                $html_img = '<td width="155" valign="middle"><div align="right"><img src="'.SHIN_Core::$_config['core']['app_base_url'].'/'.str_replace('\\','/', SHIN_Core::$_config['store']['partners_images']).'/'.SHIN_Core::$_config['store']['fr_thumbnails_prefix'].$item['img'].'" vspace="3" alt=""/></div></td>';
                $page->assign(array('partner_img' => $html_img));
            }
            
            $html_partner_block .= $page->setBlock('web/one_partner_block');
        }
        
        echo $_REQUEST['callback'] . '(' . json_encode(array('data'   => $page->setBlock('web/partner_header') . $html_partner_block)) . ')';
        
        exit;
    }
    
    function getnews()
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
                                array('gtrwebsite_news_model', 'gtrwebsite_news_model'),
                            ));
        SHIN_Core::postInit($nedded_libs);
        
        $page = SHIN_Core::$_libs['templater']->get_instance();
        
        $news_model = SHIN_Core::$_models['gtrwebsite_news_model']->get_instance();

        $now = $news_model->db_now_date();
        $q = $news_model->get_expanded_result(array(
                'order_by'    => 'dataIns DESC',
                'where'       => $news_model->class_name.'.newsType IN(' . $display_record_type . ') AND ' .  $news_model->class_name.'.status='.CT_SHOW.' AND '.$news_model->class_name.'.dataStart<='.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($now) .' AND '. $news_model->class_name.'.dataStop>='.SHIN_Core::$_db[SHIN_Core::$_shdb->active_group]->escape($now),
                "limit"       => $display_count_record,
            ));
            
        $html_news_block = '';
        foreach ($q->result_array() as $item)
        {
            
            $page->assign(array('news_id'          => $item['idNews']));
            $page->assign(array('news_title'       => $item['title']));
            $page->assign(array('news_bodyLong'    => $item['bodyLong']));
            $page->assign(array('news_link'        => '<a target="_blank" href="'.$item['link'].'">'.$item['link'].'</a>'));

            $html_img = '';
            if($item['img']){
                $html_img = '<div align="center"><p><img src="'.SHIN_Core::$_config['core']['app_base_url'].'/'.str_replace('\\','/', SHIN_Core::$_config['store']['news_images']).'/'.SHIN_Core::$_config['store']['fr_thumbnails_prefix'].$item['img'].'" width="169" height="112"  alt=""/></p></div>';
                $page->assign(array('news_img' => $html_img));
            }
            
            $html_news_block .= $page->setBlock('web/one_news_block');
        }
        $q->free_result();
        
        echo $_REQUEST['callback'] . '(' . json_encode(array('data'   => $page->setBlock('web/news_header') . $html_news_block)) . ')';
        
        exit;
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