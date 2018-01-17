<?php

namespace Admin\Controller;


use Think\Controller;

class IndexController extends BaseController{
	
	
	function index(){
		
		$this->assign("adminusername",$_SESSION['xiaomiadminname']);
		
		$this->display();
	}
	
	function user(){
		$this->display();
	}
	
	
	
	
}