<?php
namespace app\index\model;
use think\Model;
use think\Db;
class User extends Model
{

	public function register($data){
		$captcha = new \think\captcha\Captcha();
        if (!$captcha->check($data['code'])) {
            return 3;   //验证码错误
        } 
		$user=Db::name('user')->where('username','=',$data['username'])->find();
		if($user){			
			return 1; //用户已存在
		}else{
			return 2; //用户不存在（可以注册）
		}
	}

    public function login($data){
        $captcha = new \think\captcha\Captcha();
        if (!$captcha->check($data['code'])) {
            return 3;   //验证码错误
        } 
        $user=Db::name('user')->where('username','=',$data['username'])->find();
        if($user){          
            if($user['password'] == md5($data['password'])){
                session('username',$user['username']);
                session('userid',$user['id']);
                session('state',$user['state']);
                return 2; //信息正确(可以登录)
            }else{
                return 1; //密码错误
            }
        }else{
            return 4; //用户不存在
        }
    }

   

}
