<?php
namespace Admin\Controller;

class TravelController extends PublicController {
	
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
	public function travel_edit(){
		//存在id 更新画面
		$id = I('get.id');
		if($id){
			$travel = M('travel')->find($id);
			$imageList = getImageList("./Uploads/travel/$id",$travel['travel_mainimg'],$travel['travel_mainimg']);
			
			$this->assign('travel',$travel);
			$this->assign('imageList',$imageList);
		}else{
			$tmpFolder = tmpfolder('./Uploads/tmp');
			$this->assign('tmpFolder',$tmpFolder);
		}
		
		$category_list = M('category')->select();
		$this->assign('category_list',$category_list);		
		$this->display();
	}
	
	/**
	 * 添加线路
	 */
	public function travel_update(){		
		$rst = D('travel')->update();
		if($rst===TRUE){
			$this->success('数据库操作成功!');
		}else{
			$this->error($rst);
		}
	}
	

	/**
	 * 线路列表
	 */
	public function travel_list(){		
		$travel_list = M('travel')->select();
		foreach ($travel_list as $key => &$val){
			$val['category'] = M('category')->where(array('category_code'=>$val['travel_column']))->getField('category');
			//查询图片
			$imageList = getImageList("./Uploads/travel/{$val['id']}",$val['travel_mainimg']);
			$val['smallImg'] = empty($imageList)?'':$imageList[0];
		}
		$this->assign('travel_list',$travel_list);	
		$this->display();
	}
	
	/**
	 * 线路上架 下架
	 */
	public function travel_status(){
		$enable = I('post.status');
		$id = I('post.id');
		if($id){
			if($enable=='start'){
				M('travel')->where("id={$id}")->save(array('travel_status'=>1));
			}else{
				M('travel')->where("id={$id}")->save(array('travel_status'=>0));
			}
			$this->success("更新成功！");
		}else{
			$this->error("类别id不存在！");
		}
	}
	
	/**
	 * 线路删除
	 */
	public function travel_delete(){
		$id = I('post.id');
		if($id){
			M('travel')->delete($id);
			delDirAndFile("./Uploads/travel/$id",TRUE);
			$this->success("删除成功！");
		}else{
			$this->error("类别id不存在！");
		}
	}
	
	
	/**
	 * 图书分类
	 */
	public function travel_category(){		
		$category_list = M('category')->select();
		$this->assign('category_list',$category_list);		
		$this->display();
	}
	
	
	/**
	 * 图书分类
	 */
	public function travel_category_edit(){
		$category_id = I('get.id');
		if($category_id){
			$category = M('category')->find($category_id);
			$this->assign('category',$category);
		}
		$this->display();
	}
	
	
	/**
	 * 图书分类更新
	 */
	public function travel_category_update(){
		$rst = D('Category')->update();
		if($rst===TRUE){
			$this->success('数据库操作成功!');			
		}else{
			$this->error($rst);
		}
	}
	
	/**
	 * 改变分类状态
	 */
	public function travel_category_enable(){
		$enable = I('post.enable');
		$id = I('post.id');
		if($id){
			if($enable=='start'){
				M('Category')->where("id={$id}")->save(array('enable'=>1));
			}else{
				M('Category')->where("id={$id}")->save(array('enable'=>0));
			}
			$this->success("更新成功！");
		}else{
			$this->error("类别id不存在！");
		}
	}
	
	public function travel_category_delete(){
		$id = I('post.id');
		if($id){
			M('category')->delete($id);
			$this->success("删除成功！");
		}else{
			$this->error("类别id不存在！");
		}
	}
	
	/**
	 * 图片上传
	 */
	public function uploader(){
		$id = I('get.id');
		$tmpFolder = I('get.tmpFolder');
		
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
		if(!empty($tmpFolder)){		
			$upload->savePath  =     'tmp/'; // 设置附件上传（子）目录
			$upload->subName   = 	 $tmpFolder;
		}else if(!empty($id)){
			$upload->savePath  =     'travel/'; // 设置附件上传（子）目录
			$upload->subName   = 	 $id;
		}
		// 上传文件
		$info   =   $upload->upload();
		if(!$info) {// 上传错误提示错误信息
			$rst = array(
				'status'	=> 0,
				'error'		=> $upload->getError()
			);			
		}else{// 上传成功
			$rst = array(
					'status'	=> 1,
					'img'		=> $upload->rootPath.$info['file']['savepath'].$info['file']['savename']
			);
		}		
		echo json_encode($rst);
	}
	
	/**
	 * 删除图片
	 */
	public function delImg(){
		unlink(I('post.img'));
		$this->success("删除成功");
	}
    
}