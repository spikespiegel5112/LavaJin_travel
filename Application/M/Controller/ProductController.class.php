<?php
namespace M\Controller;
use Think\Controller;
class ProductController extends Controller {
	public function index(){
    	$category_code = I('get.category_code');
    	$map = array('travel_status'=>1);    	
    	
    	if(!empty($category_code)){
    		$map['travel_column'] = $category_code; 
    	}
    	$travel_list = M("travel")->where($map)->order("travel_sort DESC")->select();
    	foreach ($travel_list as $key => &$val){
    		//查询图片
    		$imageList = getImageList("./Uploads/travel/{$val['id']}",$val['travel_mainimg']);
    		$val['travel_mainimg'] = $imageList[0];
    	} 	
    	$this->assign('travel_list',$travel_list);
    	
    	$this->display();
       
	}

  	public function detail(){
  	   $id = I('get.id'); 
      $map = array('travel_status'=>1,'id'=>$id);
    $travel = M("travel")->where($map)->find();
    $imageList = getImageList("./Uploads/travel/{$travel['id']}",$travel['travel_mainimg']);
    $travel['travel_mainimg'] = $imageList[0];
    $travel_highlights = explode('|',$travel['travel_highlights']);
    $this->assign('travel_highlights',$travel_highlights);
    $this->assign('travel',$travel);
      $this->display();
  	}

    public function category(){

      $category_list = M("category")->where(array('enable'=>1))->select();
      $this->assign("category_list",$category_list);
      $this->display();
    }

}