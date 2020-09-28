<?php

require "CommonController.php";

class NotificationController extends CommonController {
    
    function __construct()
    {
        parent::__construct();
    }
                       
    public function mailNotification(){
    
        return 'notification/mail.tpl';    
    }
    
} // end of class

?>
