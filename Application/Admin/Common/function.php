<?php




/****
 * 验证码 设置
 * @return multitype:number string boolean
 */
function get_image_code(){
	$config=array(
			'fontSize' =>15,
			'imageH' => 42,
			'imageW' => 108,
			'length' => 4,
			'fontttf' => '5.ttf',
			'useNoise' => true,
			'codeSet' => '0123456789'
	);
	return $config;	
}


/****
 *
 * 验证用户名
 * @param unknown 验证码
 */
function checkLoginCode($code){
	$virfy=new \Think\Verify();
	return $virfy->check($code,"imgcode");
}


/****
 * 获取用户名
 * @param unknown $admin_id
 * @return Ambigous <>
 */
function get_admin_name($admin_id){
	$adminname=M('admin_user')->field('user_name')->where('user_id='.$admin_id)->find();
	return $adminname['user_name'];
}

/***
 * 获取商品类型名称
 * @param unknown $typeid
 * @return Ambigous <mixed, boolean, NULL, string, unknown, multitype:, object>
 */
function function_goods_type_name($typeid) {
	$res=M('commodity_type')->field('type_name')->where('id='.$typeid)->find();
	return $res['type_name'];		
}


/****
 * 时间戳转为 日期+时间
 * @param unknown $date
 * @return string
 */
function get_gate_time($date){
	return date("Y-m-d H:i:s",$date);
}


function function_goods_no($id) {
	$length=strlen($id);
	$goods_no="ZQ000000";
	$goods_no=substr($goods_no, 0,(8-$length));
	$goods_no=$goods_no.$id;
	return $goods_no;
}

/****
 * 计算商品积分
 * @param unknown $price
 * @param unknown $zcod
 * @return number
 */
function function_goods_integral($price,$zcod){
	return round($price/10*$zcod/100);
}

/****
 * 计算商品折扣价格
 * @param unknown $price
 * @param unknown $zcod
 * @return number
 */
function function_goods_discount($price,$zcod){
	return number_format($price/10*$zcod,2,".","");
}

/***
 * 查询某表的最后一条数据
 * @param unknown $tablename
 * @param unknown $array
 * @return unknown|multitype:
 */
function function_last_one($tablename,$array){
	$res=M($tablename)->field($array)->order($array[0]." desc")->find();
	if ($res) {
		return $res;
	}else {
		return array();
	}
}


