<?php
return array(
	//'配置项'=>'配置值'


    /* 模板相关配置 */
	'TMPL_PARSE_STRING'     => array (
			'__HUIADMIN__'	=> __ROOT__ . '/Public/Admin/H-ui.admin_v3.0',
			'__IMG__'    	=> __ROOT__ . '/Public/' . MODULE_NAME . '/images',
			'__CSS__'		=> __ROOT__ . '/Public/' . MODULE_NAME . '/css',
			'__JS__'		=> __ROOT__ . '/Public/' . MODULE_NAME . '/js',
			'__TITLE__'		=> '西藏旅游',			
			'__VERSION__'	=> 'v1.0'
	),
		
	
		
	/* URL配置 */
	'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
	'URL_MODEL'            => 3, //URL模式
	'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
	'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符
	
	/* 全局过滤配置 */
	'DEFAULT_FILTER' => '', 	//全局过滤函数
	
	/* 数据库配置 */
	'DB_TYPE'   => 'mysqli', 	// 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'travel', 		// 数据库名
	'DB_USER'   => 'root', 		// 用户名
	'DB_PWD'    => 'redhat',  	// 密码
	'DB_PORT'   => '3306', 		// 端口
	'DB_PREFIX' => 'travel_', 		// 数据库表前缀
		
	'SESSION_OPTIONS'    => array (
			'type'   => 'Db',//session采用数据库保存
			'expire' => 3600,//session过期时间，如果不设就是php.ini中设置的默认值
	),
	'SESSION_TABLE'      => 'think_session',
	'SESSION_AUTO_START' => true,
	

);