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
		 $user = M('user')->order('id DESC')->select();
		 $this->assign('user',$user);
		 $this->display();
	}


	public function edit(){
		$db = M('User');
		if(IS_POST){
			$arr = array(
					'username'=>I('adminname'),
					'password'=>md5(I('password')),
					'realname'=>I('rolename'),
	    			);
			$id=I('post.id');
			if(empty($id)){
				$insert_id = $db->add($arr);
			}else{
				$totlenumber = $db->where("id={$id}")->save($arr);
				
			}	   

		}
		
		$id = I('get.id');
		if($id){
			$this->assign('user',$db->find($id));
		}
		$this->display();
	}


	/**
	 * 删除管理员
	 */
	public function delete(){
		$id = I('post.id');
		if($id){
			M('user')->delete($id);
			$this->success("删除成功！");
		}else{
			$this->error("管理员id不存在！");
		}
	}






}