<?php
namespace Admin\Controller;


class LoginController extends PublicController {
	
	
	/**
	 * 用户登录
	 */
	public function index(){
		if($this->check_login()){
			$this->success("您已经成功登录,即将去往后台首页..", U('Index/index'));
		}		

		if(IS_POST){
			$username = safe_replace(I('post.username'));//过滤
			if (!$username) {
				$this->error("必须有帐号!");
			}
			
			/* 检测验证码 */
			if(!check_verify(I('post.verify'),1)){
				$this->error("验证码输入错误！");
			}
				
			$member = M('member')->where(array('username'=>I('post.username')))->find();
			if(!empty($member)&&$member['password']==md5(I('post.password'))){
				//获取当前连接的ip
				$client_ip = get_client_ip(0,true);
				
				if (I('post.remember')) {
					cookie('username', $member['username'], 2592000); // 指定cookie保存30天时间
					cookie('password', $member['password'], 2592000); // 指定cookie保存30天时间
				}
				/* 登录用户 */
				M('member')->where('id='.$member['id'])->save(array(
												"last_login_time"	=> time(),
												"last_login_ip"		=> $client_ip
											));
				
				M("member_login_log")->add(array (
												"member_id"  => $member['id'],
												"time" => time(),
												"ip" => $client_ip
											));
				session("admin_auth_id", $member['id']);
				session('admin_auth_sign', data_auth_sign(M('member')->find($member['id'])));
				$this->redirect('index/index');
			}else{
				$this->error("登录失败,请检查用户名或者密码是否正确!");
			}
		}else{
			$this->display();
		}
	}
	
	/**
	 * 退出登录状态
	 */
	public function logout(){
		session(null);
		redirect(U('login/index'));
	}
	
    /**
     * 判断验证码
     */
    public function verify(){
    	ob_clean();
    	$verify = new \Think\Verify();
    	$verify->entry(1);
    }
    
}