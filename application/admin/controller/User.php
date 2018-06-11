<?php
namespace app\admin\controller;
use app\admin\controller\Base;
//use app\admin\model\User as UserModel;
class User extends Base
{

    public function user_list()
    {
    	//内置分页
    	$list = db('user')->paginate(6);
    	$this->assign('list',$list); //把list传到模板页进行循环输出
    	return $this->fetch('user_list');

    }
    public function user_add()
    {
    	if(request()->isPost()){
    		$data = [
 				'username' => input('username'),
 				'password' =>md5(input('password')) ,
                'phone' => input('phone'),
                'email' => input('email'),
                'time' => date("Y-m-d H:i:s"),
    		];

    		$validate = validate('user');
			if(!$validate->scene('addF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}
			// 查询用户名称是否重复了
			if( db('user')->where('username',input('username'))->find() ){
				$this->error('用户信息已存在，不能重复!');
			}else{
				if(db('user')->insert($data)){
    			//第二个参数是跳转到当前空间的某个方法
	    			return $this->success('添加用户成功！','user_list'); 
	    		}else{
	    			return $this->error('添加用户失败！'); 
	    		}
			}

    		
    		return;
    	}
    	return $this->fetch('user_add');

    }

    //修改用户信息操作
    public function user_edit(){

    	$editId = input('id');
    	$editName = input('username');
    	$users = db('user')->find($editId); //根据id在数据库中找出那条数据
    	
    	if(request()->isPost()){  //判断是否是提交信息

    		$data = [
    			'id' => $editId,
                'username' => $editName,
                'phone' => input('phone'),
    			'email' =>input('email'),
    		];
            //判断是否输入新密码，有的话就替换之前的，没有的话留还是使用之前的密码
    		if( input('password') ){
    			$data['password'] = md5(input('password'));
    		}else{
    			$data['password'] = $users['password'];
    		}

            //判断是否禁用
            if(input('state') == 'on'){
                $data['state'] = 0;
            }else{
                 $data['state'] = 1;
            }
    		//修改信息的验证
    		$validate = validate('user');
			if(!$validate->scene('editF')->check($data)){
			    $this->error($validate->getError());
			    die;
			}

			if( db('user')->where('username',$editName)->where('id','neq',$editId)->find() ){
				$this->error('用户信息已存在，不能重复!');
			}else{
				$save = db('user')->update($data);
				if($save !== false){ //用变量存储，这样就算原来的保持不变，那么也是修改成功 
				//update 方法返回影响数据的条数，没修改任何数据返回 0
	    			$this->success('用户信息修改成功！','user/user_list');  //成功后跳转到listF页面
	    		}else{  //当修改的数据完全没有变化时，返回0，就是没有影响数据更新
	    			dump($data);
	    			$this->error('用户信息修改失败!');
	    		}
			}
			
    	}

    	$this->assign('users',$users); //把变量输出给view模板使用,使用时不是循环就要加$
    	return $this->fetch('user_edit');
    }




    //删除操作
    public function user_del(){
    	$delId = input('id');
    	//echo $delId;
    	
		if(db('user')->delete($delId)){  //删除操作是返回删除的条数
			$this->success('用户删除成功！');
		}else{
			$this->error('用户删除失败！');
		}
    	
    	
    }


}
