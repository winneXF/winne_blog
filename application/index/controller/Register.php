<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\User;

class Register extends Controller
{

    
    public function index()
     {

    	return $this->fetch('register');

    }


    public function reg(){
        if(request()->isPost()){
            $user=new User();
            $data=input('post.');  //传入提交的信息
            //dump($data);
            $num=$user->register($data);
            if($num==3){
                echo json_encode(array('code'=>3,'msg'=>'验证码错误'));
            }elseif($num==1){
                echo json_encode(array('code'=>1,'msg'=>'用户已存在，注册失败！'));
            }elseif($num==2){

            	$datas = [
                'username' => $data['username'],
 				'password' =>md5($data['password']) ,
                'phone' => $data['phone'],
                'email' => $data['email'],
 				'time' => date("Y-m-d H:i:s"),
	    		];
				
				if(db('user')->insert($datas)){
    			//第二个参数是跳转到当前空间的某个方法
	    			echo json_encode(array('code'=>2,'msg'=>'注册成功'));
	    		}else{
	    			echo json_encode(array('code'=>4,'msg'=>'未知错误'));
	    			//return $this->error('注册失败！'); 
	    		}
				
            }

        }
    }


}
