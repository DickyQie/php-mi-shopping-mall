<?php

namespace Admin\Controller;



/***
 * 后台商品列表
 * @author zhangqie
 *
 */
class ListGoodsController extends BaseController{
	
	
	
	function __construct(){
		parent::__construct();
		
	}
	
	function index(){
		$this->display();	
	}
	
	
	
}