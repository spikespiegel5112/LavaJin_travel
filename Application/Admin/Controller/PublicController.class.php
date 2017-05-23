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
			$admin_auth = M('user')->find($admin_auth_id);
			if(empty($admin_auth)||data_auth_sign($admin_auth)!=session('admin_auth_sign')){
				session(null);
				return FALSE;
			}else{
				session("admin_auth_id", $admin_auth_id);
				$this->assign('menber',$admin_auth);
				return TRUE;
			}
		}
	}
	
	
	/**
	 * 图片上传
	 */
	public function uploader(){
		$id = I('get.id');
		$savePath = I('get.savePath');
		
		$tmpFolder = I('get.tmpFolder');
	
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
		if(!empty($tmpFolder)){
			$upload->savePath  =     'tmp/'; // 设置附件上传（子）目录
			$upload->subName   = 	 $tmpFolder;
		}else if(!empty($id)){
			$upload->savePath  =     $savePath.'/'; // 设置附件上传（子）目录
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
			$img = $upload->rootPath.$info['file']['savepath'].$info['file']['savename'];			
			$image = new \Think\Image();
			$image->open($img)->text('天马行空','./Public/simhei.ttf',60,'#000000',\Think\Image::IMAGE_WATER_SOUTHEAST)->save($img); 
			
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