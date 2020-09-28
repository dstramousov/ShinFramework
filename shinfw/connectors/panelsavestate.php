<?php

  require_once("../../shinfw/shinfw.php");
  
  $modelName   = $_REQUEST['model_name'];
  
  
  $nedded_libs = array('core'      => array('SHIN_Database', 'SHIN_Input'),
                       'libs'      => array('SHIN_Constants'),  
                       'models'    => array(array($modelName . '_model', 'syspanel_model')),
                       'help'      => array('dump') 
                      );
  
  SHIN_Core::init($nedded_libs);  
  
  $jsonData =   json_decode(stripslashes($_REQUEST['data']));
  
  if(!empty($jsonData)) {
      foreach($jsonData->items as $item){
        
          $data   =   array('idMenu'              =>  $item->menu,
                            'idUser'              =>  1,
                            'idPanel'             =>  $item->id,
                            'collapsed'           =>  ($item->collapsed ? CT_SHOW : CT_HIDE),
                            'maximized'           =>  ($item->maximized ? CT_SHOW : CT_HIDE),
                            'order_menu'          =>  $item->order,
                            'column_menu'         =>  $item->column,
                            'color_class'         =>  $item->color,
                            'color_border_class'  =>  $item->border,
                            'color_bg_class'      =>  $item->bg,
                            'show_close'          =>  ($item->collapsed ? CT_SHOW : CT_HIDE)
                           );  
        
          SHIN_Core::$_models['syspanel_model']->updateState($data);      
      }
  }
?>
