<?php
namespace Admin\Controller;
use Think\Controller;

class MemberController extends Controller{

	 public function index(){

	     $member=M('Member');

         $list = $member->select();

         $this->assign('list',$list);

         $this->display();
	 }

	 public function add(){


	 	 $this->display();
	}

	public function insert(){

        $member =M('Member');

        $data = array(
             'id'       =>I('id'),
             'memberid' =>I('memberid'),
             'username' =>I('username'),
             'tjname'   =>I('tjname'),
             'area'     =>I('area'),
             'sex'      =>I('sex'),
             'mobile'   =>I('mobile'),
             'email'    =>I('email'),
             'level'    =>I('level'),
             'address'  =>I('address'),
             'create_time'=>time(),
             'password' =>md5(I('password')),
         );

        $res = $member->add($data);

         if($res){

             $this->success('添加成功!',U('Member/index'));
         }else{
             $this->error('添加失败!',U('Member/add'));
         }
    }
      //后台修改用户
	public function edit(){

	    $member = M('Member');

        $list = $member->select();

        $this->assign('list',$list);

	    $this->display();
    }

	public function save(){



    }
     //后台删除用户
	public function delete(){

	    $member=M('Member');

        $res = $member->delete();

        var_dump($res);

		 $this->display();
	}

	  //后台修改用户密码

	public function  changePassword(){



        $this->display();

    }
}