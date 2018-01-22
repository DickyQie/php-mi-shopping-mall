<?php

namespace Admin\Controller;

use Think\Controller;

/***
 * 后台登录
 * @author zhangqie
 *
 */
class LoginController extends Controller{
	
	function login(){
		if (session('xiaomiadminid') || session("xiaomiadminname")){
			$this->redirect("Index/index");
		}else {
			$this->display();
		}
	}
	
	function test(){
		$map['user_name']="zhangqie";
		$map['password']=md5("123456");
		$admin=M('admin_user')->where($map)->find();
		echo $admin['user_name'];
		echo md5("admin888");
		echo "<hr>";
		echo session('xiaomiadminid');
		echo session('xiaomiadminname');
		dump($admin);
	}
	
	function checkLogin(){
		if (IS_POST){
			$code=I('code',' ','trim');
			$username = I('username',' ','trim');
			$password = I("password",' ','trim'); 
			if (!checkLoginCode($code)){
				$res['status']=0;
				$res['message']="验证码输入有误";
				$this->ajaxReturn($res);
			}else {
				$admin=$this->checkPassword($username, $password);
				if ($admin){
					session("xiaomiadminid",$admin['user_id']);
					session("xiaomiadminname",$admin['user_name']);
					$res['status']=1;
					$res['message']="登录成功";
					$this->ajaxReturn($res);
				}else {
					$res['status']=0;
					$res['message']="登录失败,账号或密码错误";
					$this->ajaxReturn($res);
				}
				
			}
		}else {
			$this->display("login");
		}
		
	}
	
	

	/**
	 * 验证密码
	 * @param unknown $param
	 */
	function checkPassword($user,$pwd) {
		$map['user_name']=$user;
		$admin=M('admin_user')->where($map)->find();
		$ampwd=md5($user.$pwd);
		if($ampwd === $admin['password']){
			return $admin;
		}else {
			return false;
		}
	}
	
	
	/****
	 * 验证码
	 */
	function code(){
		ob_clean();//避免服务器不显示图片
		$virfy=new \Think\Verify(get_image_code());
		$virfy->entry('imgcode');
	}
	
	function logout(){
		unset($_SESSION["xiaomiadminid"]);
		unset($_SESSION["xiaomiadminname"]);
		$this->redirect("login");
		
	}
	
	
	
}