<?php

namespace Model;

use Think\Model;

class LoginModel extends Model{
	
	
	/****
	 *
	 * 验证用户名
	 * @param unknown 验证码
	 */
	function checkLogin($username,$pwd){
		$map['user_name']=$username;
		$map['user_name']="zhangqie";
		$admin=M('admin_user')->where($map)->find();
		if ($admin['password'] === $pwd){
			return $admin;
		}else {
			return false;
		}
	}
	
	
	function amsg() {
		return "aaa1";
	}
	
}