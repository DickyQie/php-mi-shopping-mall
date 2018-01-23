<?php

namespace Model;

use Think\Model;
class CommodityTypeModel extends Model{
	
	
	
	
	/***
	 * 
	 */
	function admin_user(){
		$admin=M('admin_user')->select();
		return $admin;
	}
	
	/****
	 * 商品类型的总数目
	 * @param unknown $key
	 * @return Ambigous <mixed, boolean, string, NULL, multitype:, unknown, object>|number
	 */
	function getCount($key){
		$res=D('commodity_type')->where($map)->count();
		if ($res){
			return $res;
		}else {
			return 0;
		}
	}
	
	
	/***
	 * 查询商品类型列表
	 * @return Ambigous <mixed, boolean, string, NULL, multitype:, unknown, object>|multitype:
	 */
	function type_list($map,$page) {
		$data=M('commodity_type')->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		if ($data){
			return $data;
		}else {
			return array();
		}
	}
	
	/***
	 * 添加商品类型
	 * @param unknown $data
	 * @return Ambigous <mixed, boolean, unknown, string>
	 */
	function add_type($data){
		$res=M('commodity_type')->add($data);
		return $res;
	}
	
	/***
	 * 指定id查询商品类型数据
	 * @param unknown $id
	 */
	function query_find($id) {
		$res=M('commodity_type')->where('id='.$id)->find();
		if ($res){
			return $res;
		}else {
			return array();
		}
	}
	
	/***
	 * 修改商品类型
	 * @param unknown $data
	 * @return boolean
	 */
	function model_type_update($data) {
		$res=M('commodity_type')->save($data);
		return $res;
	}
	
	/***
	 * 删除商品类型
	 * @param unknown $id
	 */
	function model_delete($id) {
		$res=M('commodity_type')->where('id='.$id)->delete();
		return $res;
	}
	
	
	
	
	
}