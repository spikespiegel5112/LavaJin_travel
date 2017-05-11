<?php
/**
 * 订单
 * 
 *
 */
namespace Admin\Controller;

class UserController extends PublicController {
	
	public function _initialize(){
		/**
		 * 判断用户是否登录
		 */				
		if(!$this->check_login()){
			redirect(U('login/index'));
		}
	}

		
	public function index(){
		 $userList = M('user')->select();
		 $this->assign('userList',$userList);
		 $this->display();
	}





}