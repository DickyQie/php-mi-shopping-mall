<?php

namespace Admin\Controller;


use Think\Controller;
use Think\Page;
/****
 * 商品类型管理
 * @author zhangqie
 *
 */
class CommodityTypeController extends BaseController{
	
	//每页的条数
	var  $row=5;
	//model 数据库相关操作
	var $model;
	
	function  __construct(){
		parent::__construct();
		$this->model = new \Model\CommodityTypeModel();
	}
	
	/***
	 * 类型列表
	 */
	function typelist(){
		$typename=I('typename','','trim');
		if ($typename){
			$map['type_name']=array('like',"%$typename%");
		}
		$count=$this->model->getCount($map);
		$Page= new Page($count,$this->row);
		$datalist=$this->model->type_list($map,$Page);
		$this->assign('page',$Page->show());
		$this->assign('datalist',$datalist);
		$this->display();
	}
	
	/***
	 *添加商品类型
	 */
	function add() {
		if (IS_POST) {
			$data=I('post.');
			$data['upload_time']=date('Y-m-d');
			$data['admin_id']=$_SESSION['xiaomiadminid'];
			if ($this->model->add_type($data)){
				$this->success("类型添加成功",U('typelist'),1);
			}else {
				$this->error("添加类型失败");
			}
		}else {
			$this->display();
		}
	}
	
	/***
	 * 修改商品类型
	 */
	function get_type_edit() {
		if (IS_POST){
			$post=I('post.');
			$post['admin_id']=$_SESSION['xiaomiadminid'];//修改用户
			$res=$this->model->model_type_update($post);
			if ($res){
				$this->success("修改成功",U('typelist'));
			}else {
				$this->error("修改失败");
			}
		}else {
			$id=I('id');
			$data=$this->model->query_find($id);
			$this->assign('data',$data);
			$this->display('edit');
		}
		
	}
	
	/***
	 * 删除商品类型
	 */
	function get_type_delete() {
		$id=I('id');
		$res=$this->model->model_delete($id);
		if ($res){
			$this->ajaxReturn("删除成功!");
		}else {
			$this->ajaxReturn("删除失败!");
		}
	}
	
	
	
}