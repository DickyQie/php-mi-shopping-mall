<?php

namespace Admin\Controller;


use Think\Controller;


class UserController extends BaseController{
	
	/***
	 * 后台用户管理
	 */
	function admin_user() {
		$key=I("username",'','trim');
		if ($key){
			$map['user_name']=array('like',"%$key%");
		}
		$admin=M('admin_user')->where($map)->select();
		$this->assign("adminuser",$admin);
		$this->display();
		//dump($admin);
		
	}
	
	
	function index() {
		
			$this->display();
		
	}
	
	
	function add(){
		if (IS_POST){
			$data=I('post.');
			$data['add_time']=time();
			$data['password']=md5($data['user_name'].$data['password']);
			
			echo $data['password'];
			echo "--".md5("admin123456");
			dump($data);
			exit();
			$res=M('admin_user')->add($data);
			if ($res){
				$this->success("添加成功",U('admin_user'),1);
			}else {
				$this->error("添加失败");
			}
			
			
		}else {
			$this->display();
		}
	}
	
	/***
	 * 修改管理员信息
	 */
	function get_user_edit(){
		$this->display("edit");
	}
	
	/****
	 * 删除管理员
	 */
	function get_user_del(){
		$id=I("id");
		$res=M('admin_user')->where('user_id='.$id)->delete();
		if ($res){
			$this->ajaxReturn("删除成功!");
		}else {
			$this->ajaxReturn("删除失败!");
		}
	}

	
}