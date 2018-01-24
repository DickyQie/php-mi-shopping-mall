<?php

namespace Model;


use Think\Model;
class ListGoodsModel extends Model{
	
	/***
	 * 查询商品列表
	 * @return Ambigous <mixed, boolean, string, NULL, multitype:, unknown, object>|multitype:
	 */
	function model_list_goods() {
		$res=M('list_goods')->select();
		if ($res){
			return $res;
		}else {
			return array();
		}
	}
	
}