<?php
namespace Admin\Model;
use Think\Model;
/**
 * 分类模型
 *
 */
class CarrentalModel extends Model{	
	const STATUS_DISABLED = 0;	//下架
	const STATUS_OK       = 1;	//上架
	
	protected $_validate = array(
			array('carrental_title', 'require', '租赁汽车标题为必填项'),
			array('carrental_title','2,200','租赁汽车标题长度范围是2~200个字节！',self::MUST_VALIDATE,'length',self::MODEL_BOTH)
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
			rename("./Uploads/tmp/$tmpFolder","./Uploads/carrental/$insert_id");
			$carrental_category_id_arr = array();
		}else{
			$insert_id = $data['id'];
			$this->save();
			$carrental_category_id = M('carrental_category')->where(array('travel_carrental_id'=>$insert_id))->field('id')->select();
			foreach($carrental_category_id as $key => $val){
				$carrental_category_id_arr[] = $carrental_category_id['id'];
			}
		}
		
		//整理租赁车辆的数据
		$travel_carrental_category_id 				= $_POST['travel_carrental_category_id'];
		$travel_carrental_category_title			= $_POST['travel_carrental_category_title'];
		$travel_carrental_category_original_price	= $_POST['travel_carrental_category_original_price'];
		$travel_carrental_category_price 			= $_POST['travel_carrental_category_price'];
		$travel_carrental_category_unit 			= $_POST['travel_carrental_category_unit'];
		$travel_carrental_category_sort 			= $_POST['travel_carrental_category_sort'];	
		//写入的数据
		$dataList = array();		
		foreach($travel_carrental_category_id  as $key => $val){
			if(empty($val)){
				if(!empty($travel_carrental_category_title[$key])){
					$dataList[] = array(
							'travel_carrental_id'						=>	$insert_id,
							'travel_carrental_category_title'			=>	$travel_carrental_category_title[$key],
							'travel_carrental_category_original_price'	=>	$travel_carrental_category_original_price[$key],
							'travel_carrental_category_price'			=>	$travel_carrental_category_price[$key],
							'travel_carrental_category_unit'			=>	$travel_carrental_category_unit[$key],
							'travel_carrental_category_sort'			=>	$travel_carrental_category_sort[$key],
							
					);
				}
			}else{
				$updateData = array(
							'travel_carrental_id'						=>	$insert_id,
							'travel_carrental_category_title'			=>	$travel_carrental_category_title[$key],
							'travel_carrental_category_original_price'	=>	$travel_carrental_category_original_price[$key],
							'travel_carrental_category_price'			=>	$travel_carrental_category_price[$key],
							'travel_carrental_category_unit'			=>	$travel_carrental_category_unit[$key],
							'travel_carrental_category_sort'			=>	$travel_carrental_category_sort[$key],
							
				);
				M('carrental_category')->where(array('id'=>$val))->save($updateData);
				$carrental_category_has_id[] = $val;
			}			
		}
		if(!empty($dataList)){
			M('carrental_category')->addAll($dataList);
		}
		$del_id = array_diff($carrental_category_id_arr, $carrental_category_has_id);
		if(!empty($del_id)){
			M('carrental_category')->where(array('id'=>array('in',$del_id)))->delete();
		}
		return TRUE;
	}
	
	
	
}