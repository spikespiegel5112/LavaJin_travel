<?php
/**
 * 租车
 * @author guchunyan
 *
 */
namespace Admin\Controller;

class CarRentalController extends PublicController {
	
	public function _initialize(){
		/**
		 * 判断用户是否登录
		 */				
		if(!$this->check_login()){
			redirect(U('login/index'));
		}
		
	}
	
	/**
	 * 登录租车画面
	 */
	public function carrental_edit(){
		//存在id 更新画面
		$id = I('get.id');
		if($id){
			$carrental = M('carrental')->find($id);
			$imageList = getImageList("./Uploads/carrental/$id",$carrental['travel_mainimg']);
			
			$carrental_category = M('carrental_category')->where(array('travel_carrental_id'=>$id))->order('travel_carrental_category_sort desc')->select();			
			$this->assign('carrental',$carrental);
			$this->assign('carrental_category',$carrental_category);
			
			$this->assign('imageList',$imageList);
		}else{
			$tmpFolder = tmpfolder('./Uploads/tmp');
			$this->assign('tmpFolder',$tmpFolder);
		}
			
		$this->display();
	}
	
	/**
	 * 添加租赁车辆
	 */
	public function carrental_update(){		
		$rst = D('carrental')->update();
		if($rst===TRUE){
			$this->success('数据库操作成功!');
		}else{
			$this->error($rst);
		}
	}
	

	/**
	 * 租赁车辆列表
	 */
	public function carrental_list(){		
		$carrental_list = M('carrental')->select();
		foreach ($carrental_list as $key => &$val){			
			$imageList = getImageList("./Uploads/carrental/{$val['id']}",$val['travel_mainimg']);
			$val['smallImg'] = empty($imageList)?'':$imageList[0];
		}
		$this->assign('carrental_list',$carrental_list);	
		$this->display();
	}
	
	/**
	 * 租车开启 关闭
	 */
	public function carrental_status(){
		$enable = I('post.status');
		$id = I('post.id');
		if($id){
			if($enable=='start'){
				M('carrental')->where("id={$id}")->save(array('carrental_status'=>1));
			}else{
				M('carrental')->where("id={$id}")->save(array('carrental_status'=>0));
			}
			$this->success("更新成功！");
		}else{
			$this->error("类别id不存在！");
		}
	}
	
	/**
	 * 线路删除
	 */
	public function carrental_delete(){
		$id = I('post.id');
		if($id){
			M('carrental')->delete($id);
			delDirAndFile("./Uploads/carrental/$id",TRUE);
			$this->success("删除成功！");
		}else{
			$this->error("类别id不存在！");
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
// 			$upload->savePath  =     'carrental/'; // 设置附件上传（子）目录
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