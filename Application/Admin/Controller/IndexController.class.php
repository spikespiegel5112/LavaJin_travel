<?php
namespace Admin\Controller;

class IndexController extends PublicController {
	
	public function _initialize(){
		/**
		 * 判断用户是否登录
		 */				
		if(!$this->check_login()){
			redirect(U('login/index'));
		}
		
	}
	
	/**
	 * 后台首页
	 */
	public function index(){		
		$this->display();
	}
	
	/**
	 * 后台首页欢迎页面
	 */
	public function welcome(){
		$admin_auth_id = session('admin_auth_id');
		$login_count = M("member_login_log")->where("member_id={$admin_auth_id}")->count();
		$login_before = M("member_login_log")->where("member_id={$admin_auth_id}")->order('id desc')->limit('2,1')->find();
		
		$this->assign('login_count',$login_count);
		$this->assign('login_before',$login_before);
		
		$this->display();
	}
	
	public function book_add(){
		
		
		
		
		$this->display();
	}
	
	
    
}