<?php

namespace Admin\Controller;


use Think\Controller;

/***
 * 后台用户管理
 * @author zhangqie
 *
 */
class UserController extends BaseController{
	
	/***
	 * 后台用户列表
	 */
	function admin_user() {
		$key=I("username",'','trim');
		if ($key){
			$map['user_name']=array('like',"%$key%");
		}
		$admin=M('admin_user')->where($map)->select();
		$this->assign("adminuser",$admin);
		$this->display();
	}
	
	
	function index() {
		
			$this->display();
		
	}
	
	
	function add(){
		if (IS_POST){
			$data=I('post.');
			$data['add_time']=time();
			$data['password']=md5($data['user_name'].$data['password']);
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
		if (IS_POST){
			$post=I('post.');
			$res=M('admin_user')->save($post);
			if ($res){
				$this->success("修改成功",U('admin_user'));
			}else {
				$this->error("修改失败");
			}
		}else {
			$id=I("id");
			$data=M('admin_user')->where('user_id='.$id)->find();
			$this->assign('userdata',$data);
			$this->display("edit");
		}
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