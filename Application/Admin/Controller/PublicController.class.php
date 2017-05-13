<?php
namespace Admin\Controller;


use Think\Controller;

class PublicController extends Controller {
	
	/**
	 *	判断用户登录
	 */
	protected function check_login(){
		$admin_auth_id = session("admin_auth_id");
		$admin_auth_sign = session('admin_auth_sign');
		
		if(empty($admin_auth_id)){
			session('admin_auth_id',null);
			session('admin_auth_sign',null);
			return FALSE;
		}else{
			$admin_auth = M('user')->where(array('id'=>$admin_auth_id))->find();
			if(empty($admin_auth)||data_auth_sign($admin_auth)!=session('admin_auth_sign')){
				session(null);
				return FALSE;
			}else{
				$this->assign('menber',$admin_auth);
				return TRUE;
			}
		}
	}
    
}