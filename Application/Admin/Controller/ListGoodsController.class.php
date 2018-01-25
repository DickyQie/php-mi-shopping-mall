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
	
	
	
	function add() {
		$this->display();
	}
	
	
	function get_edition_edit() {
		if (IS_POST){
			
		}else {
			$this->display('edit');
		}
	}
	
}