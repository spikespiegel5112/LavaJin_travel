<?php
/**
 * +----------------------------------------------------------------------
 * |公共函数
 * +----------------------------------------------------------------------
 * |Copyright (c) 2016 http://www.wx738.com All rights reserved.
 * +----------------------------------------------------------------------
 * |Author: g-star <gucy@wx738.com> <http://www.wx738.com>
 * +----------------------------------------------------------------------
 */


/**
 * 调用系统的API接口方法（静态方法）
 * api('User/getName','id=5'); 调用公共模块的User接口的getName方法
 * api('Admin/User/getName','id=5');  调用Admin模块的User接口
 * @param  string $name 格式 [模块名]/接口名/方法名
 * @param  array|string $vars 参数
 */
function api($name, $vars = array ()) {
	$array     = explode('/', $name);
	$method    = array_pop($array);
	$classname = array_pop($array);
	$module    = $array ? array_pop($array) : 'Common';
	$callback  = $module . '\\Api\\' . $classname . 'Api::' . $method;
	if (is_string($vars)) {
		parse_str($vars, $vars);
	}
	return call_user_func_array($callback, $vars);
}

/**
 * 检测验证码
 * @param  integer $id 验证码ID
 * @return boolean     检测结果
 *
 */
function check_verify($code, $id = 1) {
	$verify = new \Think\Verify();
	return $verify->check($code, $id);
}

/**
 * 数据签名认证
 * @param  array $data 被认证的数据
 * @return string       签名
 *
 */
function data_auth_sign($data) {
	//数据类型检测
	if (!is_array($data)) {
		$data = (array)$data;
	}
	ksort($data); //排序
	$code = http_build_query($data); //url编码并生成query字符串
	$sign = sha1($code); //生成签名
	return $sign;
}


/**
 * 获取
 * @param unknown $clearAction
 * @return string
 */
function get_current_url($clearAction=array()) {
	$url = 'http://';
	if (isset ($_SERVER ['HTTPS']) && $_SERVER ['HTTPS'] == 'on') {
		$url = 'https://';
	}
	
	//REQUEST_URI不必要的参数进行处理
	if(empty($_SERVER ['REQUEST_URI'])||empty($clearAction)){
		$REQUEST_URI = $_SERVER ['REQUEST_URI'];
	}else{
		list($REQUEST_URI,$action) = explode('?',$_SERVER ['REQUEST_URI']);
		if(!empty($action)){
			parse_str($action,$action_list);
			foreach($clearAction as $key => $val){	
				unset($action_list[$val]);
			}			
			if(!empty($action_list)) $REQUEST_URI .= '?'.http_build_query($action_list);			
		}
	}	
	
	if ($_SERVER ['SERVER_PORT'] != '80') {
		$url .= $_SERVER ['HTTP_HOST'] . ':' . $_SERVER ['SERVER_PORT'] . $REQUEST_URI;
	} else {
		$url .= $_SERVER ['HTTP_HOST'] . $REQUEST_URI;
	}
	// 兼容后面的参数组装
	if (stripos($url, '?') === false) {
		$url .= '?t=' . time();
	}
	return $url;
}


/**
 * 将object对象转换成数组
 * @param unknown $object
 * @return unknown
 */
function object2array(&$object) {
	$object =  json_decode( json_encode( $object),true);
	return  $object;
}

/**
 * 字符过滤
 * @param unknown $string
 * @return mixed
 */
function safe_replace($string) {
	if (is_array($string)) {
		$string = implode('，', $string);
		$string = htmlspecialchars(str_shuffle($string));
	} else {
		$string = htmlspecialchars($string);
	}
	$string = str_replace('%20', '', $string);
	$string = str_replace('%27', '', $string);
	$string = str_replace('%2527', '', $string);
	$string = str_replace('*', '', $string);
	$string = str_replace('"', '&quot;', $string);
	$string = str_replace("'", '', $string);
	$string = str_replace('"', '', $string);
	$string = str_replace(';', '', $string);
	$string = str_replace('<', '&lt;', $string);
	$string = str_replace('>', '&gt;', $string);
	$string = str_replace("{", '', $string);
	$string = str_replace('}', '', $string);
	return $string;
}

/**
 * 生成一个临时存放文件的目录
 * @param unknown $tmpDir
 * @param string $delInvalid
 */
function tmpfolder($tmpDir,$delInvalid=true){
	$tmp_image_file = session_id().'_'.rand(10000,99999);
	
	if($delInvalid){
		$folder_list = scandir($tmpDir);	
		foreach ($folder_list as $key => $val){		
			if(in_array($val,array('.','..'))){
				continue;
			}
			if(filemtime($tmpDir.'/'.$val)<time()-86400){
				delDirAndFile($tmpDir.'/'.$val,TRUE);
			}
		}
	}
	
	if(is_dir($tmpDir.'/'.$tmp_image_file)){
		tmpfolder($tmpDir,FALSE);
	}else{
		mkdir($tmpDir.'/'.$tmp_image_file,0777,TRUE);		
		return $tmp_image_file;
	}
	
	
	
}

/**
 * 删除目录及目录下所有文件或删除指定文件
 * @param str $path   待删除目录路径
 * @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
 * @return bool 返回删除状态
 */
function delDirAndFile($path, $delDir = FALSE) {
	$handle = opendir($path);
	if ($handle) {
		while (false !== ( $item = readdir($handle) )) {
			if ($item != "." && $item != "..")
				is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
		}
		closedir($handle);
		if ($delDir)
			return rmdir($path);
	}else {
		if (file_exists($path)) {
			return unlink($path);
		} else {
			return FALSE;
		}
	}
}

/**
 * 获取文件夹下面的所有图片
 */
function getImageList($path,$mainimg=''){
	$imglist = array();
	$handle = opendir($path);
	if ($handle) {
		while (false !== ( $item = readdir($handle) )) {
			if ($item != "." && $item != ".."){
					
				if(strpos($mainimg,$item)){					
					array_unshift($imglist,$item);
				}else{
					$imglist[] = $path.'/'.$item;
				}
			}
		}
		closedir($handle);
	}
	return $imglist;
}
