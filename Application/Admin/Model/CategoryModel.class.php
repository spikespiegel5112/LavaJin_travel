<?php
namespace Admin\Model;
use Think\Model;
/**
 * 分类模型
 *
 */
class CategoryModel extends Model{	
	const STATUS_DISABLED = 0;	//禁用
	const STATUS_OK       = 1;	//启用
	
	protected $_validate = array(
			array('category', 'require', '线路类别为必填项'),
			array('category','','线路类别已经存在！',self::MUST_VALIDATE,'unique',self::MODEL_INSERT),
			array('category','','线路类别长度范围是2~20个字节！',self::MUST_VALIDATE,'unique',self::MODEL_BOTH),
			array('category_code', 'require', '线路类别为必填项'),
			array('category_code','','线路类别已经存在！',self::MUST_VALIDATE,'unique',self::MODEL_INSERT),
			array('category_code','','线路类别长度范围是2~20个字节！',self::MUST_VALIDATE,'unique',self::MODEL_BOTH),
			array('sort', 'require', '排序为必填项'),
	);
	
	public function update(){
		$data = $this->create();
		if(!$data){ //数据对象创建错误
			return $this->getError();
		}
		
		/* 添加或更新数据 */
		if(empty($data['id'])){
			$this->add();
		}else{
			$this->save();
		}
		return TRUE;
	}
	
	
	
}