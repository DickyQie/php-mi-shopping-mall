<?php

namespace Admin\Controller;


use Think\Controller;
use Think\Page;

/***
 * 商品版本管理
 * @author zhangqie
 *
 */
class EditionController extends BaseController{
	
	var $row=5;
	var $model;
	
	function __construct() {
		parent::__construct();
		$this->model=new \Model\EditionModel();
	}
	
	/***
	 * 版本列表
	 */
	function index(){
		$key=I('edition_name','','trim');
		if ($key){
			$map['edition_name']=array('like',"%$key%");
		}
		$count=$this->model->getCount($map);
		$Page= new Page($count,$this->row);
		$this->assign("page",$Page->show());
		$this->assign("data",$this->model->model_query($map, $Page));
		$this->display();	
	}
	
	
	/***
	 * 添加版本
	 */
	function add(){
		if (IS_POST){
			$post=I('post.');
			$post['user_id']=$_SESSION['xiaomiadminid'];
			$res=$this->model->model_add($post);
			if ($res){
				$this->success("添加成功!",U('index'));
			}else {
				$this->error("添加失败!");
			}
		}else {
			$type=$this->model->model_goods_type();
			$this->assign('type',$type);
			$this->display();
		}
	}
	
	/***
	 * 修改版本信息
	 */
	function get_edition_edit(){
		if (IS_POST){
			$post=I('post.');
			$post['user_id']=$_SESSION['xiaomiadminid'];//修改用户
			$res=$this->model->model_update($post);
			if ($res){
				$this->success("修改成功!",U('index'));
			}else {
				$this->error("修改失败!");
			}
		}else {
			$id=I('id');
			$data=$this->model->model_query_find($id);
			$type=$this->model->model_goods_type();
			$this->assign('type',$type);
			$this->assign('data',$data);
			$this->display('edit');
		}
	}
	
	/***
	 * 删除单条数据
	 */
	function get_edition_delete() {
		$id=I('id');
		$res=$this->model->model_delete($id);
		if ($res){
			$this->ajaxReturn("删除成功");
		}else {
			$this->ajaxReturn("删除失败");
		}
	}
		
}

