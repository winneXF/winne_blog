<?php
namespace app\Admin\controller;
use think\Controller;
use app\admin\model\Admin;
class Login extends Controller
{
    public function index()
    {
        
        return $this->fetch('login');
    }

    public function log(){
        if(request()->isPost()){
            $admin=new Admin();
            $data=input('post.');  //传入提交的信息
            $num=$admin->login($data);
            if($num==3){
                // $this->success('信息正确，正在为您跳转...','index/index');
                echo json_encode(array('code'=>3,'msg'=>'信息正确','url'=>'/admin/index/index'));
            }elseif($num==4){
                // $this->error('验证码错误');
               echo json_encode(array('code'=>4,'msg'=>'验证码错误'));
            }
            else{
                //$this->error('用户名或者密码错误');
               echo json_encode(array('code'=>0,'msg'=>'用户名或者密码错误'));
            }

        }
    }

    



}
