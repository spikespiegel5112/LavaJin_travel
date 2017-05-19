<?php
namespace M\Controller;
use Think\Controller;
class CarrentController extends Controller {
	public function index(){
    	$map = array('carrental_status'=>1);
    	$carrental_list = M("carrental")->where($map)->order("carrental_sort DESC")->select();
    	foreach ($carrental_list as $key => &$val){
    		//查询图片
    		$imageList = getImageList("./Uploads/carrental/{$val['id']}",$val['travel_mainimg']);
    		$val['carrental_mainimg'] = $imageList[0];
    	}
    	$this->assign('carrental_list',$carrental_list);    	 
    	$this->display();       
	}

  	public function detail(){
  		$id = I('get.id');
  		$map = array('carrental_status'=>1,'id'=>$id);
  		$carrental = M("carrental")->where($map)->find();
  		$imageList = getImageList("./Uploads/carrental/{$carrental['id']}",$carrental['carrental_mainimg']);
  		$carrental['carrental_mainimg'] = $imageList[0];  		
  		$carrental_category = M('carrental_category')->where(array('travel_carrental_id'=>$id))->select();
  		
  		$this->assign('carrental',$carrental);
  		$this->assign('carrental_category',$carrental_category);
  		$this->display();
  	}
}