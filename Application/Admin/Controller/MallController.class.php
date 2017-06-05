<?php
namespace Admin\Controller;

class MallController extends PublicController {
	
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
	public function mall_edit(){
		$tese_category = I('get.category',1);
		$tese_name = $tese_category==1?'特产':'特色服务';
		$this->assign('mall_category',$tese_category);
		$this->assign('mall_name',$tese_name);
		//存在id 更新画面
		$id = I('get.id');
		if($id){
			$tese = M('Mall')->find($id);
			$imageList = getImageList("./Uploads/tese/$id",$tese['tese_mainimg']);
			
			$this->assign('tese',$tese);
			$this->assign('imageList',$imageList);
		}else{
			$tmpFolder = tmpfolder('./Uploads/tmp');
			$this->assign('tmpFolder',$tmpFolder);
		}
		
		$this->display();
	}
	
	/**
	 * 添加线路
	 */
	public function mall_update(){		
		$rst = D('Mall')->update();
		if($rst===TRUE){
			$this->success('数据库操作成功!');
		}else{
			$this->error($rst);
		}
	}
	

	/**
	 * 线路列表
	 */
	public function tese_list(){	
		$tese_category = I('get.category',1);
		$tese_name = $tese_category==1?'特产':'特色服务';
		$this->assign('tese_category',$tese_category);
		$this->assign('tese_name',$tese_name);
		
		$tese_list = M('tese')->where(array('tese_category'=>$tese_category))->select();
		foreach ($tese_list as $key => &$val){			
			//查询图片
			$imageList = getImageList("./Uploads/tese/{$val['id']}",$val['travel_mainimg']);
			$val['smallImg'] = empty($imageList)?'':$imageList[0];
		}
		$this->assign('tese_list',$tese_list);	
		$this->display();
	}
	
	/**
	 * 线路上架 下架
	 */
	public function tese_status(){
		$enable = I('post.status');
		$id = I('post.id');
		if($id){
			if($enable=='start'){
				M('tese')->where("id={$id}")->save(array('tese_status'=>1));
			}else{
				M('tese')->where("id={$id}")->save(array('tese_status'=>0));
			}
			$this->success("更新成功！");
		}else{
			$this->error("类别id不存在！");
		}
	}
	
	/**
	 * 线路删除
	 */
	public function tese_delete(){
		$id = I('post.id');
		if($id){
			M('tese')->delete($id);
			delDirAndFile("./Uploads/tese/$id",TRUE);
			$this->success("删除成功！");
		}else{
			$this->error("id不存在！");
		}
	}
	
	
	
// 	/**
// 	 * 图片上传
// 	 */
// 	public function uploader(){
// 		$id = I('get.id');
// 		$tmpFolder = I('get.tmpFolder');		
		
// 		$upload = new \Think\Upload();// 实例化上传类
// 		$upload->maxSize   =     3145728 ;// 设置附件上传大小
// 		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
// 		$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
// 		if(!empty($tmpFolder)){		
// 			$upload->savePath  =     'tmp/'; // 设置附件上传（子）目录
// 			$upload->subName   = 	 $tmpFolder;
// 		}else if(!empty($id)){
// 			$upload->savePath  =     'tese/'; // 设置附件上传（子）目录
// 			$upload->subName   = 	 $id;
// 		}
// 		// 上传文件
// 		$info   =   $upload->upload();
// 		if(!$info) {// 上传错误提示错误信息
// 			$rst = array(
// 				'status'	=> 0,
// 				'error'		=> $upload->getError()
// 			);			
// 		}else{// 上传成功
// 			$rst = array(
// 					'status'	=> 1,
// 					'img'		=> $upload->rootPath.$info['file']['savepath'].$info['file']['savename']
// 			);
// 		}		
// 		echo json_encode($rst);
// 	}
	
	
	
// 	/**
// 	 * 删除图片
// 	 */
// 	public function delImg(){
// 		unlink(I('post.img'));
// 		$this->success("删除成功");
// 	}
    
}