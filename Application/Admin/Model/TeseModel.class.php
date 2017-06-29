<?php
namespace Admin\Model;
use Think\Model;
/**
 * 分类模型
 *
 */
class TeseModel extends Model{	
	const STATUS_DISABLED = 0;	//下架
	const STATUS_OK       = 1;	//上架
	
	protected $_validate = array(
			array('tese_title', 'require', '线路类别为必填项'),
			array('tese_title','2,200','线路类别长度范围是2~200个字节！',self::MUST_VALIDATE,'length',self::MODEL_BOTH),		
			array('tese_price', 'require', '排序为必填项'),
	);
	
	public function update(){
		$data = $this->create();
		if(!$data){ //数据对象创建错误
			return $this->getError();
		}
		
		/* 添加或更新数据 */
		if(empty($data['id'])){
			$insert_id = $this->add();
			$tmpFolder = I('post.tmpFolder');
			rename("./Uploads/tmp/$tmpFolder","./Uploads/tese/$insert_id");
		}else{
			$this->save();
		}
		return TRUE;
	}
	
	
	
}