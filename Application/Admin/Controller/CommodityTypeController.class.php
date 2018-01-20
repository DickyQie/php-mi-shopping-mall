<?php

namespace Admin\Controller;


use Think\Controller;
/****
 * 商品类型管理
 * @author zhangqie
 *
 */
class CommodityTypeController extends BaseController{
	
	/***
	 * 类型列表
	 */
	function typelist(){
		
		$this->display();
	}
	
	/***
	 *添加商品类型
	 */
	function add() {
		if (IS_POST) {
			
			
		}else {
			$model=new \Model\CommodityTypeModel();
			$userdata=$model->admin_user();
			dump($userdata);
			$this->display();
		}
	}
	
	
	
}