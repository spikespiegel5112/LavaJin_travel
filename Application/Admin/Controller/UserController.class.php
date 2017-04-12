<?php
namespace Admin\Controller;
use Think\Controller;



class UserController extends controller{


     public function index(){

         $user = M('User');

         $list = $user->select();


         $this ->assign('list',$list);


         $this->display();

     }


     public function add(){

         $this->display();

     }

     public function insert(){

         $user = M('User');

         $data = array(
             'id'       =>I('id'),
             'username' =>I('username'),
             'password' =>md5(I('password')),
             'create_time'=>time(),
         );

         $res = $user->add($data);

         if($res){

             $this->success('添加管理员成功!',U('User/index'));
         }else{

             $this->error('error',U('User/index'));
         }

     }


}