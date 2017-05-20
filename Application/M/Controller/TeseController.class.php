<?php
namespace M\Controller;
use Think\Controller;
class TeseController extends Controller {
	public function index(){
    	$tese_category = I('get.category');
    	$map = array('tese_status'=>1);    	
    	
    	if(!empty($tese_category)){
    		$map['tese_category'] = $tese_category; 
    		
    	}
    	$tese_list = M("tese")->where($map)->order("tese_sort DESC")->select();
    	foreach ($tese_list as $key => &$val){
    		//查询图片
    		$imageList = getImageList("./Uploads/tese/{$val['id']}",$val['tese_mainimg']);
    		$val['tese_mainimg'] = $imageList[0];
    	} 	
    	$this->assign('tese_list',$tese_list);
    	
    	$this->display();
       
	}

  	public function detail(){
  		$id = I('get.id'); 
  		$map = array('tese_status'=>1,'id'=>$id);
		$tese = M("tese")->where($map)->find();
		$imageList = getImageList("./Uploads/tese/{$tese['id']}",$tese['tese_mainimg']);
		$tese['tese_mainimg'] = $imageList[0];
		$tese_highlights = explode('|',$tese['tese_highlights']);
		$this->assign('tese_highlights',$tese_highlights);
		$this->assign('tese',$tese);
  		$this->display();
  	}
}