<?php

namespace Model;

use Think\Model;
class EditionModel extends Model{
	
	/***
	 * 查询总条数
	 * @param unknown $map
	 */
	function getCount($map){
		return M('edition')->where($map)->count();
	}
	
	/***
	 * 查询版本数据
	 * @param unknown $map
	 * @param unknown $page
	 * @return Ambigous <mixed, boolean, string, NULL, multitype:, unknown, object>|multitype:
	 */
	function model_query($map,$page){
		$res=M('edition')->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		if ($res){
			return $res;
		}else {
			return array();
		}
	}
	
	/***
	 * 查询版本单条数据
	 * @param unknown $id
	 * @return Ambigous <mixed, boolean, NULL, string, unknown, multitype:, object>|multitype:
	 */
	function model_query_find($id) {
		$res=M('edition')->where('id='.$id)->find();
		if($res){
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
	 * 添加版本
	 * @param unknown $data
	 * @return Ambigous <mixed, boolean, unknown, string>
	 */
	function model_add($data){
		return M('edition')->add($data);
	}
	
	/***
	 * 修改数据
	 * @param unknown $data
	 * @return boolean
	 */
	function model_update($data) {
		return M('edition')->save($data);
	}
	
	/***
	 * 删除
	 * @param unknown $id
	 * @return Ambigous <mixed, boolean, unknown>
	 */
	function model_delete($id) {
		return M('edition')->where('id='.$id)->delete();
	}
	
}