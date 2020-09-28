<?php

require "CommonController.php";

class DefaultController extends CommonController {
    
    function __construct()
	{
        parent::__construct();
    }

    public function index(){
    	return 'index.tpl';
    }
} // end of class

?>
