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


