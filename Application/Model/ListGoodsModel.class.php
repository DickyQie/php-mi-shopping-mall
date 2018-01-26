<?php

namespace Model;


use Think\Model;
class ListGoodsModel extends Model{
	
	/***
	 * 查询数目
	 * @param unknown $where
	 */
	function getCount($where){
		return M('list_goods')->where($where)->count();
	}
	
	
	/***
	 * 查询商品列表
	 * @return Ambigous <mixed, boolean, string, NULL, multitype:, unknown, object>|multitype:
	 */
	function model_list_goods($map,$page) {
		$res=M('list_goods')->where($map)->limit($page.firstRow.','.$page->listRow)->select();
		if ($res){
			return $res;
		}else {
			return array();
		}
	}
	
	
	/***
	 * 查询商品类型
	 * @return Ambigous <mixed, boolean, string, NULL, multitype:, unknown, object>|multitype:
	 */
	function model_goods_type() {
		$res=M('commodity_type')->select();
		if ($res){
			return $res;
		}else {
			return array();
		}
	}
	
	/***
	 * 查询版本
	 * @param unknown $type_id
	 * @return Ambigous <mixed, boolean, string, NULL, multitype:, unknown, object>|multitype:
	 */
	function model_edition_info($type_id) {
		$res=M('edition')->where('type_id='.$type_id)->select();
		if($res){
			return $res;
		}else {
			return array();
		}
	}
	
	/***
	 * 添加商品
	 * @param unknown $data
	 * @return Ambigous <mixed, boolean, unknown, string>
	 */
	function model_add($data) {
		$model=M('list_goods')->add($data);
		return $model;
	}
	
	
}