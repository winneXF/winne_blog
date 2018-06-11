<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\User;

class Login extends Controller
{

    
    public function index()
     {

    	return $this->fetch('login');

    }


    public function log(){
        if(request()->isPost()){
            $user=new User();
            $data=input('post.');  //传入提交的信息
            //dump($data);
            $num=$user->login($data);
            if($num==2){
                // $this->success('信息正确，正在为您跳转...','index/index');
                echo json_encode(array('code'=>2,'msg'=>'信息正确','url'=>'/index/message/index'));
            }elseif($num==3){
                // $this->error('验证码错误');
               echo json_encode(array('code'=>3,'msg'=>'验证码错误'));
            }
            else{
                //$this->error('用户名或者密码错误');
               echo json_encode(array('code'=>0,'msg'=>'用户名或者密码错误'));
            }

        }
    }

    public function logout(){
        session(null);
        echo json_encode(array('code'=>1,'msg'=>'退出登录成功！'));
       // $this->success('退出成功','index/index',0);
    }


}
