<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        $this->display();	
 }
    public function welcome(){

    	$this->display();
    }


    //后台登录
    public function login(){

        $this->display();
    }
 }	