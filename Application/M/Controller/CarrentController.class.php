<?php
namespace M\Controller;
use Think\Controller;
class CarrentController extends Controller {
    public function index(){
   		 $this->display();
       
}

  	public function detail(){


  		header("Content-type: text/html; charset=utf-8"); 
  		echo '紧急开发中';
  		exit();


  		 $this->dispaly();
  	}


  

}