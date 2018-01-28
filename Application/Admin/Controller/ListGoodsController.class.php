<?php

namespace Admin\Controller;


use Think\Page;
/***
 * 后台商品列表
 * @author zhangqie
 *
 */
class ListGoodsController extends BaseController{
	
	
	
	var $row=10;
	var $model;
	
	function __construct(){
		parent::__construct();
		$this->model=new \Model\ListGoodsModel();
		
	}
	
	function index(){
		$key=I('goodsname','','trim');
		if ($key){
			$map['goods_name']=array('like',"%$key%");
		}
		$count=$this->model->getCount($map);
		$page=new Page($count,$this->row);
		$data=$this->model->model_list_goods($map, $page);
		$this->assign("page",$page->show());
		$this->assign("data",$data);
		
	
		
		$this->display();	
	}
	
	
	/***
	 * 添加商品
	 */
	function add() {
		if (IS_POST){
			$post=I("post.");
			$post['edition_id']=implode(",", $post['edition_id']);
			//echo implode(",", $post['edition_id']);
			//dump($post);
			
			if($_FILES['goods_image']['tmp_name']){
				$info  = $this->image_load();

				/* echo $info['goods_image']['savepath'].$info['goods_image']['savename'];
				 echo "<hr>";
				 dump($info); */
				/*
				 array(1) {
				 ["goods_image"] => array(9) {
				 ["name"] => string(17) "SmartRegister.jpg"
				 ["type"] => string(10) "image/jpeg"
				 ["size"] => int(24307)
				 ["key"] => string(11) "goods_image"
				 ["ext"] => string(3) "jpg"
				 ["md5"] => string(32) "80d31553450c3058e7ee970dd01bc926"
				 ["sha1"] => string(40) "39277beb1ddc8e5249f89c7a8b8e332ed1490168"
				 ["savename"] => string(17) "5a6aa26acf71c.jpg"
				 ["savepath"] => string(11) "2018-01-26/"
				 }
				 }
				 */
				if ($info){
					$post['goods_image']=$info['goods_image']['savepath'].$info['goods_image']['savename'];
				}else {
					$post['goods_image']='';
				}
				
				
			}else {
				$post['goods_image']='';
			}
			$data=function_last_one('list_goods',array("goods_id"));
			$post['goods_sn'] = function_goods_no($data['goods_id']+1);
			$post['user_id'] = $_SESSION['xiaomiadminid'];
			$post['upload_date'] = date('Y-m-d');
			$post['integral'] = function_goods_integral($post['goods_price'],$post['discount']);
			$data=$this->model->model_add($post);
			if ($data){
				$this->success("添加成功",U("index"));
			}else {
				$this->error("添加失败");
			} 
	
		}else {
			$type=$this->model->model_goods_type();
			$this->assign('type',$type);
			$this->display();
		}
	}
	
	
	function showm(){	
		$map['id']=array("in","1,2");
		dump($map);
		$data=M('edition')->where($map)->select();
		dump($data);
	}
	
	
	
	
	function get_edition_edit() {
		if (IS_POST){
			
		}else {
			$this->display('edit');
		}
	}
	
	/***
	 * 联动查询版本
	 */
	function get_edition_info() {
		$id=I('type_id','0','int');
		$data=$this->model->model_edition_info($id);
		$option="";
		foreach($data as $v ){
			$option.="<option value=".$v['id'].">".$v['edition_name']."</option>";
		}
		echo $option;
	}
	
	
	function image_load(){
		if(empty($_FILES)){
			$this->error("请选择上传文件！");
		}else{
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   = 3145728 ;// 设置附件上传大小
			$upload->exts      = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath  = './Uploads/'; // 设置附件上传根目录
			$upload->replace   = true;
			$upload->savePath  = ''; // 设置附件上传（子）目录
			// 上传文件
			$info   =   $upload->upload();
			if(!$info) {// 上传错误提示错误信息
				$this->error($upload->getError());
			}else{// 上传成功 获取上传文件信息
				return $info;
			}
		}
	}
	
	
}