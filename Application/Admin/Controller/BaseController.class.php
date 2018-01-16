<?php

namespace Admin\Controller;

use Think\Controller;

/****
 * 
 * 父类===> 初始相关设置
 * @author zhangqie
 *
 */
class BaseController extends Controller{
	
	/***
	 * 验证是否登录，未登录先登录
	 */
	function _initialize(){
		if (!isset($_SESSION['xiaomiadminid']) || !isset($_SESSION['xiaomiadminname'])){
			$this->redirect("Admin/Login/login");
		}
	}
	
	
	
	
}