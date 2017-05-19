<?php
namespace Admin\Controller;

class SystemController extends PublicController {
	
	public function _initialize(){
		/**
		 * 判断用户是否登录
		 */				
		if(!$this->check_login()){
			redirect(U('login/index'));
		}
		
	}	
	
	/**
	 * 首页分类
	 */
	public function index_category(){		
		$category_list = M('index_category')->select();
		$this->assign('category_list',$category_list);		
		$this->display();
	}
	
	
	/**
	 * 首页分类
	 */
	public function index_category_edit(){
		$category_id = I('get.id');
		if($category_id){
			$category = M('index_category')->find($category_id);
			$this->assign('category',$category);
		}
		$this->display();
	}
	
	
	/**
	 * 首页分类更新
	 */
	public function index_category_update(){
		$rst = D('IndexCategory')->update();
		if($rst===TRUE){
			$this->success('数据库操作成功!');			
		}else{
			$this->error($rst);
		}
	}
	
	/**
	 * 改变分类状态
	 */
	public function index_category_enable(){
		$enable = I('post.enable');
		$id = I('post.id');
		if($id){
			if($enable=='start'){
				M('index_category')->where("id={$id}")->save(array('enable'=>1));
			}else{
				M('index_category')->where("id={$id}")->save(array('enable'=>0));
			}
			$this->success("更新成功！");
		}else{
			$this->error("类别id不存在！");
		}
	}
	
	public function index_category_delete(){
		$id = I('post.id');
		if($id){
			M('index_category')->delete($id);
			$this->success("删除成功！");
		}else{
			$this->error("类别id不存在！");
		}
	} 
}