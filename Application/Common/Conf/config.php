<?php


$funcs="function_a,function_b,function_c";

return array(
	//'配置项'=>'配置值'
	
	//URL大小写设置
	'URL_CASE_INSENSITIVE' =>true,
		
	
	/****
	 * 数据库配置
	 */
	'DB_TYPE'               =>  'mysql',     // 数据库类型
	'DB_HOST'               =>  'localhost', // 服务器地址
	'DB_NAME'               =>  'db_zhangqie',          // 数据库名
	'DB_USER'               =>  'root',      // 用户名
	'DB_PWD'                =>  '123456',          // 密码
	'DB_PORT'               =>  '',        // 端口
	'DB_PREFIX'             =>  'zq_mi_',    // 数据库表前缀
	
	
		
	'LOAD_EXT_FILE' => $funcs,
		
		
);