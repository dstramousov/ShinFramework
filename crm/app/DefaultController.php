<?php

require "CommonController.php";

class DefaultController extends CommonController {
    
    function __construct()
	{
        parent::__construct();
    }

    public function index(){
    	return 'def.tpl';
    }

    public function test1()
    {
    	return 'def1.tpl';
    }
    public function test2(){
    	return 'def2.tpl';
    }
    public function test3(){
    	return 'def3.tpl';
    }

    public function test4(){
    	return 'def4.tpl';
    }
    
}


?>
